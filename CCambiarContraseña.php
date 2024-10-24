<?php
//PILOTO

// Conexión a la base de datos
$servername = "mysql.inf.uct.cl";  
$username = "cdarwitg";   
$password = "EgyKlAukGjQJ1s8de";  
$dbname = "A2024_cdarwitg";  

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = $_POST['email'];
    $emergency_password = $_POST['emergency-password'];
    $new_password = $_POST['new-password'];

    // Validar que los campos no estén vacíos
    if (empty($email) || empty($emergency_password) || empty($new_password)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Consulta para actualizar la contraseña en la base de datos
        $sql = "UPDATE Taller_Int_Usuario SET Password = ? WHERE Email = ? AND `emergency-password` = ?";

        // Preparar la declaración SQL
        $stmt = $conn->prepare($sql);
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Hash de la nueva contraseña
        $stmt->bind_param("sss", $hashed_password, $email, $emergency_password);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "¡Contraseña cambiada con éxito!";
        } else {
            echo "Error al cambiar la contraseña: " . $conn->error;
        }

        $stmt->close();
    }
}

// Cerrar conexión
$conn->close();


