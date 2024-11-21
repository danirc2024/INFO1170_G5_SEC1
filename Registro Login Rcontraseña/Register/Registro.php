<?php
// Incluir archivo de conexión a la base de datos
include 'Conex.inc';

// Verifica si el formulario fue enviado
if(isset($_POST['nombre'],$_POST['contra'],$_POST['correo'],$_POST['roluser'])) {
    $nombre = $_POST['nombre'];
    $contra = $_POST['contra'];
    $correo = $_POST['correo'];
    $roluser = $_POST['roluser']
 
    $sql=$db->query("INSERT INTO Taller_Int_Usuarios (nombre,contra,correo,roluser) VALUES ('$nombre', '$contra', '$correo', '$roluser')");
        if ($sql==1) {
            echo "Usuario Registrado";
        } else {
            echo "Error al Registrar";
        }
    }
?>
