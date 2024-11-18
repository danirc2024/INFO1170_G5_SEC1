<?php
// Mostrar errores de PHP en la página para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir el archivo de conexión a la base de datos
include("conex.php");

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos directamente de la solicitud POST
    $nombre = $_POST['nombre'];
    $estrellas = $_POST['calificacion'];
    $mensaje = $_POST['mensaje'];

    // Preparar la consulta de inserción
    $query = "INSERT INTO Taller_Int_Testimonios (Autor, Contenido, FechaPublicacion, Calificacion) 
              VALUES ('$nombre', '$mensaje', NOW(), $estrellas)";

    // Ejecutar la consulta
    if (mysqli_query($db, $query)) {
        echo "Testimonio agregado exitosamente.";
    } else {
        echo "Error al agregar el testimonio: " . mysqli_error($db);
    }
}
?>

