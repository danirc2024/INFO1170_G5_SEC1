<?php
//Busca el Servidos, el user, la contraseña del user y la base de datos
   $servidor = "mysql.inf.uct.cl";
   $user     = "cdarwitg";
   $password = "EgyKlAukGjQJ1s8de";
   $basedato = "A2024_cdarwitg";
   
//Crea una variable "db" que utiliza todos los datos ingresados
$db = mysqli_connect($servidor, $user, $password, $basedato);

   //Si no se puede conectar a la base de datos soltara un error
   if(!$db) {
         echo "Error de conexión a la BD";
         exit();
   }
?>