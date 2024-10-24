<?php
$host = "localhost";  
$usuario = "root";    
$password = "";       
$base_de_datos = "taller";  


$conexion = new mysqli($host, $usuario, $password, $base_de_datos);


if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "Conexión a la base de datos exitosa";  
}
?>
