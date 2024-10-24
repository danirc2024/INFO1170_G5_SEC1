<?php
//PILOTO

// Conexión a la base de datos
$servername = "db.inf.uct.cl";  
$username = "cdarwitg";   
$password = "EgyKlAukGjQJ1s8de";  
$dbname = "A2024_cdarwitg";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si la conexión es exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Obtén el email del formulario

    // Consulta para verificar si el correo ya está en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Este correo ya está registrado.";
    } else {
        // Insertar nuevo usuario si el correo no está duplicado
        $username = $_POST['username']; // Obtén otros datos del formulario
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hashea la contraseña

        $sql = "INSERT INTO usuarios (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            echo "Registro exitoso.";
        } else {
            echo "Error al registrar: " . $conn->error;
        }
    }
    $stmt->close();
}
$conn->close();

