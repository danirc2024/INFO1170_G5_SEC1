<?php

include 'Conex.inc';

if (isset($_POST['NombreEmpresa'], $_POST['CorreoEmpresa'], $_POST['Monto'], $_POST['Clave'])) {
    $nombreEmpresa = $_POST['NombreEmpresa'];
    $correoEmpresa = $_POST['CorreoEmpresa'];
    $monto = $_POST['Monto'];
    $clave = $_POST['Clave'];

    mysqli_set_charset($db, "utf8");

    $insertarDatos = "INSERT INTO Taller_Int_RegEmpresa (NombreEmpresa, EmailEmpresa, Monto, Clave) 
                      VALUES ('$nombreEmpresa', '$correoEmpresa', '$monto', '$clave')";

    $EjecutarInsert = mysqli_query($db, $insertarDatos);

    if ($EjecutarInsert) {
        echo "<script>
                alert('Monto Enviado Correctamente, Muchas Gracias.');
              </script>";
    } else {
        echo "Error al insertar los datos: " . mysqli_error($db);
    }
} else {
    echo "Por favor, completa todos los campos.";
}
?>