<?php
// Incluir archivo de conexión a la base de datos
include 'Conex.inc';

// Verifica si el formulario fue enviado
if(isset($_POST['nombre'],$_POST['password'],$_POST('correo'))) {
    $nombre = $_POST['nombre'];
    $contra = $_POST['contra'];
    $correo = $_POST['correo'];

    mysqli_set_charset($db, "utf8");

    $InsertarDatos = "INSERT INTO Taller_Int_Usuarios (nombre,contra,correo) VALUES ('$Nombre', '$Correo', '$Artista', '$Edad')";

    $EjecutarInsert = mysqli_query($db, $InsertarDatos);

    
    if ($EjecutarInsert) {
        echo "<script>
                alert('Datos insertados correctamente.');
                setTimeout(function() {
                    window.location.href = 'index.html';
                }, 1000);
              </script>";
    } else {
        echo "Error al insertar los datos: " . mysqli_error($db);
    }
} else {
    echo "Por favor, completa todos los campos.";
}

?>
