<?php
// Incluir el archivo de conexión
include("Conex.inc");

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$contra = $_POST['contra'];

// Consultar la base de datos para verificar las credenciales
$sql = "SELECT * FROM Taller_Int_Usuarios WHERE usuario = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $nombre);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    if (password_verify($contra, $fila['contra'])) {
        header("Location: hola.html");
        exit();
    } else {
        // Mostrar alerta y permanecer en la misma página
        echo "<script> alert('Usuario o contraseña incorrectos'); window.location.href = 'index.php'; </script>";
    }
} else {
    // Mostrar alerta y permanecer en la misma página
    echo "<script> alert('Usuario o contraseña incorrectos'); window.location.href = 'index.php'; </script>";
}

// Cerrar la conexión
$stmt->close();
$db->close();
?>