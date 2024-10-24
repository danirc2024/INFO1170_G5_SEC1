<?php
// Datos de conexión a la base de datos
$host = "mysql.inf.uct.cl";  // Servidor de la base de datos
$user = "marevalo";       // Usuario de la base de datos
$password = "JEpfpGQcFn2qD8dWn";       // Contraseña de la base de datos
$dbname = "A2024_marevalo"; // Nombre de la base de datos

// Crear una conexión a MySQL
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si los datos se enviaron por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Encriptar la contraseña

    // Preparar la consulta SQL para insertar el usuario
    $sql = "INSERT INTO usuarios (NombreUsuario, Email, Password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password);

    // Ejecutar la consulta y manejar el resultado
    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente.";
    } else {
        // Verificar si el error es debido a un correo duplicado
        if ($conn->errno === 1062) {
            echo "El correo electrónico ya está registrado. Por favor, usa otro.";
        } else {
            echo "Error al registrar usuario: " . $conn->error;
        }
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
