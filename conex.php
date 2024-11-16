<?php
// Conexión a la base de datos
$servidor = "mysql.inf.uct.cl";
$user     = "cdarwitg";
$password = "EgyKlAukGjQJ1s8de";
$basedato = "A2024_cdarwitg";

$db = mysqli_connect($servidor, $user, $password, $basedato);

// Verificar la conexión
if (!$db) {
    die("Error de conexión a la BD: ". mysqli_connect_error());
} else {
    echo "Conexión exitosa a la base de datos.";
}
?>