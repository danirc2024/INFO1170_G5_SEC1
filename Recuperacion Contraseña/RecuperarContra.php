<?php
// Incluir archivo de conexión a la base de datos
include 'Conex.inc';
require 'PHPMailer/PHPMailerAutoload.php'; // Asegúrate de tener PHPMailer instalado

if (isset($_POST['email'])) {
    $correo = $_POST['email'];

    // Verificar si el correo existe en la base de datos
    $sql = "SELECT nombre FROM Taller_Int_Usuarios WHERE correo = ?";
    $stmt = mysqli_prepare($db, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 's', $correo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        // Comprobar si el usuario existe
        if (mysqli_stmt_num_rows($stmt) > 0) {
            // Generar token único para el enlace de recuperación
            $token = bin2hex(random_bytes(50)); // Token de 50 caracteres

            // Guardar el token en la base de datos (puedes tener una tabla de tokens si prefieres)
            // Aquí deberías agregar lógica para almacenar el token en la base de datos

            // Configurar PHPMailer
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->Host = 'smtp.tudominio.com'; // Cambia esto por el servidor SMTP de tu elección
            $mail->SMTPAuth = true;
            $mail->Username = 'tu_correo@dominio.com'; // Cambia esto por tu dirección de correo
            $mail->Password = 'tu_contraseña'; // Cambia esto por tu contraseña
            $mail->SMTPSecure = 'tls'; // o 'ssl'
            $mail->Port = 587; // o 465 si usas SSL

            $mail->setFrom('tu_correo@dominio.com', 'Nombre del Remitente'); // Cambia esto
            $mail->addAddress($correo);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Recuperación de Contraseña';
            $mail->Body    = 'Para recuperar tu contraseña, haz clic en este enlace: <a href="http://tu_dominio.com/restablecer.php?token=' . $token . '">Restablecer Contraseña</a>';

            // Enviar el correo
            if ($mail->send()) {
                echo "<script>alert('Se ha enviado un enlace de recuperación a tu correo.'); window.location.href = 'InicioSesion.html';</script>";
            } else {
                echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
            }
        } else {
            echo "<script>alert('El correo electrónico no está registrado.'); window.location.href = 'RecuperarContraseña.html';</script>";
        }

        // Cerrar el statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la preparación de la consulta.";
    }
} else {
    echo "Por favor, completa todos los campos.";
}

// Cerrar la conexión
mysqli_close($db);
?>
