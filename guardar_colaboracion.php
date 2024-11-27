<?php
// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "", "prueba");

// Verifica si hubo error en la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre_empresa = mysqli_real_escape_string($conexion, $_POST['nombre_empresa']);
    $direccion_empresa = mysqli_real_escape_string($conexion, $_POST['direccion_empresa']);
    $email_empresa = mysqli_real_escape_string($conexion, $_POST['email_empresa']);
    $telefono_empresa = mysqli_real_escape_string($conexion, $_POST['telefono_empresa']);
    $descripcion_empresa = mysqli_real_escape_string($conexion, $_POST['descripcion_empresa']);
    
    // Insertar los datos en la base de datos
    $sql = "INSERT INTO empresas_colaboradoras (nombre_empresa, direccion_empresa, email_empresa, telefono_empresa, descripcion_empresa) 
            VALUES ('$nombre_empresa', '$direccion_empresa', '$email_empresa', '$telefono_empresa', '$descripcion_empresa')";

    if ($conexion->query($sql) === TRUE) {
        echo "Gracias por colaborar con nosotros. ¡Nos pondremos en contacto pronto!";
    } else {
        echo "Error al registrar la empresa: " . $conexion->error;
    }
}

$conexion->close();
?>
