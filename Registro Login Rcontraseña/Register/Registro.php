<?php
include 'Conex.inc';

if (!empty($_POST['nombre']) && !empty($_POST['contra']) && !empty($_POST['correo']) && !empty($_POST['roluser'])) {
    $nombre = trim($_POST['nombre']);
    $contra = trim($_POST['contra']);
    $correo = trim($_POST['correo']);
    $roluser = intval($_POST['roluser']);

    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $stmt = $db->prepare("INSERT INTO Taller_Int_Usuarios (nombre, contra, correo, roluser) VALUES (?, ?, ?, ?)");
        if ($stmt && $stmt->bind_param("sssi", $nombre, $contra, $correo, $roluser) && $stmt->execute()) {
            echo "Usuario registrado exitosamente.";
            echo '<script>alert("Usuario Creado"); window.location.href = "DIRECCION A REDIRIJIR";</script>';
        } else {
            echo "Error al registrar.";
        }
    } else {
        echo "Correo electrónico no válido.";
    }
} else {
    echo "Por favor, completa todos los campos.";
}
?>