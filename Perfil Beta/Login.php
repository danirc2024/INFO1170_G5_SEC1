<?php
session_start();
include("Conex.inc"); // Asegúrate de tener la conexión a la base de datos

// Verificamos si el usuario ya está logueado
if (isset($_SESSION['usuario_id'])) {
    header("Location:Perfil.php"); // Si ya está logueado, lo redirigimos al perfil
    exit;
}

// Verificamos si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $contra = $_POST['contra'];

    // Validamos que los campos no estén vacíos
    if (!empty($correo) && !empty($contra)) {
        // Consultamos el usuario en la base de datos
        $stmt = $db->prepare("SELECT * FROM Taller_Int_Usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        // Verificamos si el usuario existe
        if ($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();

            // Verificamos la contraseña (sin encriptación)
            if ($contra == $usuario['contra']) {
                // Si la contraseña es correcta, creamos la sesión
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                header("Location: Perfil.php"); // Redirigimos al perfil
                exit;
            } else {
                $error = "Contraseña incorrecta.";
            }
        } else {
            $error = "El usuario no existe.";
        }
    } else {
        $error = "Por favor, ingrese todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>

    <?php
    // Mostramos el error si hay alguno
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>

    <form action="Login.php" method="POST">
        <div>
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required>
        </div>
        <div>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contra" required>
        </div>
        <div>
            <button type="submit">Iniciar sesión</button>
        </div>
    </form>

    <p>No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>

</body>
</html>
