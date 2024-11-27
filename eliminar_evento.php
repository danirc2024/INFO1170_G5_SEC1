<?php
session_start();

// Verifica si el usuario tiene el rol de administrador
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Verifica si el ID del evento ha sido proporcionado
if (isset($_POST['id'])) {
    $id_evento = $_POST['id'];

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "prueba");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Consulta para eliminar el evento
    $consulta = "DELETE FROM eventos WHERE id = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("i", $id_evento); // Bind el parámetro ID como entero

    // Ejecuta la consulta y verifica si fue exitosa
    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Evento eliminado exitosamente.";
    } else {
        $_SESSION['mensaje'] = "Error al eliminar el evento: " . $stmt->error;
    }

    // Cierra la conexión
    $stmt->close();
    $conexion->close();

    // Redirige al panel de administrador con el mensaje
    header("Location: admin_dashboard.php");
    exit();
} else {
    echo "ID de evento no proporcionado.";
}
?>
