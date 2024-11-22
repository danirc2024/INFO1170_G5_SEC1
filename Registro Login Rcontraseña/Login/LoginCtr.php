<?php

include("Conex.inc");
$user = $_POST['nombre'];
$password = $_POST['contra'];

$password_encriptada = md5($password);

$sql = "SELECT * FROM Taller_Int_Usuarios WHERE usuario = ? AND contraseña = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param("ss", $user, $password_encriptada);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    header("Location: Redirije a la pagina principal");
    exit();
} else {
    echo "<script>
        alert('Usuario o contraseña incorrectos');
        window.location.href = 'Login.php';
    </script>";
}

$stmt->close();
$db->close();
?> 