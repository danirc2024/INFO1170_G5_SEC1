<?php
include('Conex.inc');

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$monto = $_POST['monto'];

// Insertar el nuevo registro en la base de datos
$sql = $db->prepare("INSERT INTO Taller_Int_RegEmpresa (nombre, correo, monto) VALUES (?, ?, ?)");
$sql->bind_param("ssd", $nombre, $correo, $monto);

if ($sql->execute()) {
    header("Location: Empresas.php"); // Redirigir a la página principal
} else {
    echo "Error: " . $sql->error;
}
?>
