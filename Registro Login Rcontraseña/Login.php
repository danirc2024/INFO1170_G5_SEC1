<?php
// Incluir archivo de conexión a la base de datos
include 'Conex.inc';

// Verificar si el formulario fue enviado
if (isset($_POST['correo'], $_POST['contra'])) {
    $correo = $_POST['correo'];
    $contra = $_POST['contra'];

    // Preparar la consulta para buscar al usuario
    $sql = "SELECT contra FROM Taller_Int_Usuarios WHERE correo = ?";
    $stmt = mysqli_prepare($db, $sql);

    if ($stmt) {
        // Asignar los parámetros y ejecutar la consulta
        mysqli_stmt_bind_param($stmt, 's', $correo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        // Verificar si el usuario existe
        if (mysqli_stmt_num_rows($stmt) > 0) {
            // Obtener la contraseña encriptada de la base de datos
            mysqli_stmt_bind_result($stmt, $hashedPassword);
            mysqli_stmt_fetch($stmt);

            // Verificar la contraseña ingresada
            if (password_verify($contra, $hashedPassword)) {
                echo "<script>
                        alert('Inicio de sesión exitoso.');
                        window.location.href = 'dashboard.html'; // Página principal tras iniciar sesión
                      </script>";
            } else {
                echo "<script>
                        alert('Contraseña incorrecta.');
                        window.location.href = 'InicioSesion.html';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Usuario no encontrado.');
                    window.location.href = 'InicioSesion.html';
                  </script>";
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
