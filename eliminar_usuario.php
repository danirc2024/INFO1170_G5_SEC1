<?php
$conexion = new mysqli("localhost", "root", "", "prueba");

// Verificar si se recibió el ID de usuario
if (isset($_POST['id_usuario'])) {
    $id_usuario = intval($_POST['id_usuario']); // Sanitizar el valor del ID

    // Preparar la consulta de eliminación
    $consulta = $conexion->prepare("DELETE FROM usuarios WHERE id_usuario = ?");
    $consulta->bind_param("i", $id_usuario);

    if ($consulta->execute()) {
        // Redirigir de vuelta al dashboard con un mensaje
        header("Location: admin_dashboard.php?mensaje=usuario_eliminado");
        exit();
    } else {
        echo "Error al eliminar el usuario: " . $conexion->error;
    }
} else {
    echo "ID de usuario no proporcionado.";
}
?>
