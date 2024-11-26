<?php
$host = "localhost";  
$usuario = "root";    
$password = "";       
$base_de_datos = "taller";  


$conexion = new mysqli($host, $usuario, $password, $base_de_datos);


if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "Conexión a la base de datos exitosa";  
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["name"];
    $email = $_POST["email"];
    $foto = $_FILES["profilePic"];

    // Procesar la foto de perfil si se subió
    $fotoRuta = null;
    if ($foto["error"] == 0) {
        $fotoRuta = "uploads/" . basename($foto["name"]);
        move_uploaded_file($foto["tmp_name"], $fotoRuta);
    }

    // Actualizar los datos del usuario
    $sql = "UPDATE usuarios SET nombre=?, email=?, foto=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $idUsuario = 1; // Cambia esto por el ID del usuario autenticado
    $stmt->bind_param("sssi", $nombre, $email, $fotoRuta, $idUsuario);

    if ($stmt->execute()) {
        echo "Perfil actualizado correctamente.";
    } else {
        echo "Error al actualizar el perfil: " . $conn->error;
    }
}

$conn->close();
?>
