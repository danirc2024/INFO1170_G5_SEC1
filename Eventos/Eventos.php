<?php
include 'Conex.inc';
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['mision']) && isset($data['cuposRestantes'])) {
    $mision = $data['mision'];
    $cuposRestantes = $data['cuposRestantes'];

    $sql = "INSERT INTO Taller_Int_Eventos (mision,cupos) VALUES ('$mision', '$cuposRestantes')";
    $stmt = $conn->prepare($sql);
    

    // Verifica si la preparación de la consulta fue exitosa
    if ($stmt) {
        $stmt->bind_param("si", $mision, $cuposRestantes);

        // Ejecuta la consulta
        if ($stmt->execute()) {
            echo json_encode(["id" => $stmt->insert_id, "mision" => $mision, "cuposRestantes" => $cuposRestantes]);
        } else {
            echo json_encode(["error" => "Error al ejecutar la consulta: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Error al preparar la consulta: " . $conn->error]);
    }
} else {
    echo json_encode(["error" => "Datos incompletos"]);
}

$conn->close();
?>
