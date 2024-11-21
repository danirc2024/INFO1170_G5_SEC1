<?php

if (!empty($_POST["login-btn"])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo '<div class="alert alert-danger">Campos Vacíos</div>';
    } else {
        $user = $_POST["username"];
        $pass = $_POST["password"];
        $sql = $db->query("SELECT * FROM Taller_Int_Usuario WHERE username='$user' AND pass='$pass'");

        if ($datos = $sql->fetch_object()) {
            $rol = $datos->rol;
            if ($rol == 1) { 
                header("Location: usuario.php");
            } elseif ($rol == 2) {
                header("Location: empresa.php");
            } else {
                echo '<div class="alert alert-danger">Rol no válido</div>';
            }
        } else {
            echo '<div class="alert alert-danger">Acceso Denegado</div>';
        }
    }
}
?>
