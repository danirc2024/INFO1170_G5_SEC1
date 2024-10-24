<?php
include('conex.php'); 


$titulo = $_POST['titulo'];
$mensaje = $_POST['mensaje'];
$fecha_hora = $_POST['fecha_hora'];
$tipo = $_POST['tipo'];
$id_usuario = 1; 


$sql = "INSERT INTO Notificaciones (Titulo, Mensaje, FechaHora, Tipo, IDUsuario) VALUES (?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssi", $titulo, $mensaje, $fecha_hora, $tipo, $id_usuario);

if ($stmt->execute()) {
    echo "Notificación guardada exitosamente.";
} else {
    echo "Error: " . $stmt->error;
}


$stmt->close();
$conexion->close();
?>
