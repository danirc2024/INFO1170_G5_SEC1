<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "prueba");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_usuario = 2; // Cambiar según la lógica de usuarios
    
    // Sanitizar y obtener los valores del formulario
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $email = $conexion->real_escape_string($_POST['email']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $bio = $conexion->real_escape_string($_POST['bio']);
    $tema = $conexion->real_escape_string($_POST['tema']);
    $idioma = $conexion->real_escape_string($_POST['idioma']);

    // Verificar si se subió una imagen de perfil
    $foto_perfil = null;
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
        $ruta_destino = 'uploads/' . basename($_FILES['foto_perfil']['name']);
        if (move_uploaded_file($_FILES['foto_perfil']['tmp_name'], $ruta_destino)) {
            $foto_perfil = $conexion->real_escape_string($ruta_destino);
        }
    }

    // Actualizar los datos del usuario
    $sql = "UPDATE usuarios SET 
                nombre = '$nombre', 
                email = '$email', 
                telefono = '$telefono', 
                bio = '$bio', 
                tema = '$tema', 
                idioma = '$idioma'" .
                ($foto_perfil ? ", foto_perfil = '$foto_perfil'" : "") . 
           " WHERE id_usuario = $id_usuario";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la página de ver perfil
        header("Location: ver_perfil.php");
        exit;
    } else {
        echo "Error al actualizar los datos: " . $conexion->error;
    }
}

// Obtener los datos actuales del usuario
$id_usuario = 2; // Cambiar según la lógica de usuarios
$sql = "SELECT nombre, email, telefono, bio, tema, idioma FROM usuarios WHERE id_usuario = $id_usuario";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
} else {
    die("Usuario no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #4CAF50;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }
        input, textarea, select, button {
            width: 100%;
            margin-top: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Perfil</h1>
        <form method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" value="<?php echo htmlspecialchars($usuario['telefono']); ?>">

            <label for="bio">Biografía:</label>
            <textarea name="bio" id="bio"><?php echo htmlspecialchars($usuario['bio']); ?></textarea>

            <label for="foto_perfil">Foto de Perfil:</label>
            <input type="file" name="foto_perfil" id="foto_perfil">

            <label for="tema">Tema:</label>
            <select name="tema" id="tema">
                <option value="light" <?php echo $usuario['tema'] === 'light' ? 'selected' : ''; ?>>Claro</option>
                <option value="dark" <?php echo $usuario['tema'] === 'dark' ? 'selected' : ''; ?>>Oscuro</option>
            </select>

            <label for="idioma">Idioma:</label>
            <select name="idioma" id="idioma">
                <option value="es" <?php echo $usuario['idioma'] === 'es' ? 'selected' : ''; ?>>Español</option>
                <option value="en" <?php echo $usuario['idioma'] === 'en' ? 'selected' : ''; ?>>Inglés</option>
                <option value="fr" <?php echo $usuario['idioma'] === 'fr' ? 'selected' : ''; ?>>Francés</option>
            </select>

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</body>
</html>
