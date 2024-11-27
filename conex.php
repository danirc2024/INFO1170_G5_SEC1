<?php
// Conexión a la base de datos
$servidor = "mysql.inf.uct.cl";
$user     = "cdarwitg";
$password = "EgyKlAukGjQJ1s8de";
$basedato = "A2024_cdarwitg";

$conexion = new mysqli($host, $usuario, $password, $base_de_datos);


if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
} else {
    echo "Conexión a la base de datos exitosa";  
}
?>
