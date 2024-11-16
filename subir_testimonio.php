<?php
// Incluir el archivo de conexión a la base de datos
require 'conex.php';

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener y validar los datos del formulario
    $nombre = trim($_POST['nombre']);
    $estrellas = intval($_POST['calificacion']); // Asegúrate de que el campo 'calificacion' coincida con el formulario
    $mensaje = trim($_POST['mensaje']);

    // Validar que los campos no estén vacíos y que la calificación esté en el rango de 1 a 5
    if (!empty($nombre) && !empty($mensaje) && $estrellas >= 1 && $estrellas <= 5) {
        // Escapar caracteres especiales para evitar inyecciones SQL
        $nombre = mysqli_real_escape_string($db, $nombre);
        $mensaje = mysqli_real_escape_string($db, $mensaje);

        // Preparar la consulta de inserción
        $query = "INSERT INTO Taller_Int_Testimonios (Autor, Contenido, FechaPublicacion, Calificacion) 
                  VALUES ('$nombre', '$mensaje', NOW(), $estrellas)";

        // Ejecutar la consulta
        if (mysqli_query($db, $query)) {
            echo "Testimonio agregado exitosamente.";
        } else {
            echo "Error al agregar el testimonio: " . mysqli_error($db);
        }
    } else {
        echo "Por favor, complete todos los campos y asegúrese de que la calificación esté entre 1 y 5.";
    }
}
?>
