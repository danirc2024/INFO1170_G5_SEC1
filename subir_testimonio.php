<?php

// Incluir el archivo de conexión a la base de datos
include("conex.php");

// Guardar un nuevo testimonio
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autor = $_POST['autor'];
    $calificacion = $_POST['calificacion'];
    $contenido = $_POST['contenido'];

    $sql = "INSERT INTO Taller_Int_Testimonios (Autor, Calificacion, Contenido, FechaPublicacion) VALUES (?, ?, ?, NOW())";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sis", $autor, $calificacion, $contenido);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }
    $stmt->close();
    exit;
}

// Recuperar todos los testimonios
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $conexion->query("SELECT * FROM Taller_Int_Testimonios ORDER BY FechaPublicacion DESC");
    $testimonios = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($testimonios);
    exit;
}

$conexion->close();
?>