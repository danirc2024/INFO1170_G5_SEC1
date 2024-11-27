<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "prueba");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener los datos del usuario (ejemplo con id_usuario = 1)
$id_usuario = 2; // Cambiar según tu lógica de usuarios
$sql = "SELECT nombre, email, telefono, bio, foto_perfil, tema, idioma FROM usuarios WHERE id_usuario = $id_usuario";
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
    <title>Perfil del Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: <?php echo $usuario['tema'] === 'dark' ? '#2c2c2c' : '#ffffff'; ?>;
            color: <?php echo $usuario['tema'] === 'dark' ? '#ffffff' : '#000000'; ?>;
            margin: 20px;
        }
        .perfil-container {
            max-width: 600px;
            margin: auto;
            text-align: center;
        }
        img {
            max-width: 150px;
            border-radius: 50%;
            margin: 20px auto;
        }
        h1, h2 {
            margin: 10px 0;
        }
        p {
            margin: 5px 0;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="perfil-container">
        <h1>Perfil de Usuario</h1>
        <?php if (!empty($usuario['foto_perfil'])): ?>
            <img src="<?php echo $usuario['foto_perfil']; ?>" alt="Foto de Perfil">
        <?php else: ?>
            <img src="https://via.placeholder.com/150" alt="Sin Foto de Perfil">
        <?php endif; ?>
        
        <h2><?php echo htmlspecialchars($usuario['nombre']); ?></h2>
        <p><strong>Correo Electrónico:</strong> <?php echo htmlspecialchars($usuario['email']); ?></p>
        <p><strong>Teléfono:</strong> <?php echo htmlspecialchars($usuario['telefono']); ?></p>
        <p><strong>Biografía:</strong> <?php echo htmlspecialchars($usuario['bio']); ?></p>
        <p><strong>Idioma Preferido:</strong> <?php echo htmlspecialchars($usuario['idioma'] === 'es' ? 'Español' : ($usuario['idioma'] === 'en' ? 'Inglés' : 'Francés')); ?></p>

        <a href="editar_peerfil.php">Editar Perfil</a>
    </div>
</body>
</html>
