<?php
session_start();

// Verifica si el usuario tiene el rol de administrador
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Verifica si el ID de la empresa ha sido proporcionado
if (isset($_POST['id'])) {
    $id_empresa = $_POST['id'];

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "prueba");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Consulta para eliminar la empresa
    $consulta = "DELETE FROM empresas_colaboradoras WHERE id = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("i", $id_empresa); // Bind el parámetro ID como entero

    // Ejecuta la consulta y verifica si fue exitosa
    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Empresa eliminada exitosamente.";
    } else {
        $_SESSION['mensaje'] = "Error al eliminar la empresa: " . $stmt->error;
    }

    // Cierra la conexión
    $stmt->close();
    $conexion->close();

    // Redirige al panel de administrador con el mensaje
    header("Location: panel_admin.php");
    exit();
} else {
    echo "ID de empresa no proporcionado.";
}
?>
<?php
session_start();

// Verifica si el usuario tiene el rol de administrador
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Verifica si el ID de la empresa ha sido proporcionado
if (isset($_POST['id'])) {
    $id_empresa = $_POST['id'];

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "prueba");

    // Verifica la conexión
    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Consulta para eliminar la empresa
    $consulta = "DELETE FROM empresas_colaboradoras WHERE id = ?";
    $stmt = $conexion->prepare($consulta);
    $stmt->bind_param("i", $id_empresa); // Bind el parámetro ID como entero

    // Ejecuta la consulta y verifica si fue exitosa
    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "Empresa eliminada exitosamente.";
    } else {
        $_SESSION['mensaje'] = "Error al eliminar la empresa: " . $stmt->error;
    }

    // Cierra la conexión
    $stmt->close();
    $conexion->close();

    // Redirige al panel de administrador con el mensaje
    header("Location: admin_dashboard.php");
    exit();
} else {
    echo "ID de empresa no proporcionado.";
}
?>
