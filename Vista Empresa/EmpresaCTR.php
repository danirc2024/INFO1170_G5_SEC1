<?php
include('Conex.inc'); // Conexión a la base de datos

$nombre = $_POST['NombreEmpresa'];
$correo = $_POST['CorreoEmpresa'];
$monto = $_POST['Monto'];

if (!$nombre || !$correo || !$monto) {
    die("Datos incompletos. Verifica el formulario.");
}

$sql = $db->prepare("INSERT INTO Taller_Int_RegEmpresa (NombreEmpresa, CorreoEmpresa, Monto) VALUES (?, ?, ?)");

if (!$sql) {
    die("Error al preparar la consulta: " . $db->error);
}

$sql->bind_param("ssd", $nombre, $correo, $monto);

if ($sql->execute()) {
    // Si los datos se insertaron correctamente, mostrar la alerta y redirigir
    echo "<script type='text/javascript'>
            alert('Gracias por su aporte ;)');
            window.location.href = 'Empresa.html'; // Redirige a la página principal después de la alerta
          </script>";
} else {
    echo "<script type='text/javascript'>
            alert('Error al guardar los datos. Por favor, intente nuevamente.');
            window.location.href = 'Empresas.php'; // Redirige a la página principal después de la alerta
          </script>";
}
?>
