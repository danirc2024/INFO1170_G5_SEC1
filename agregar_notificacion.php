<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Notificaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            color: #333;
        }
        .notificacion {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            background-color: #f9f9f9;
        }
        .formulario {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f1f1f1;
        }
        .formulario input, .formulario textarea, .formulario select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
        }
        .formulario input[type="submit"] {
            width: auto;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Sistema de Notificaciones</h2>

    <?php
    include('conex.php'); 

    
    $sql = "SELECT Titulo, Mensaje, FechaHora, Tipo FROM notificaciones ORDER BY FechaHora DESC";
    $result = $conexion->query($sql);

    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="notificacion">';
            echo '<strong>Título:</strong> ' . htmlspecialchars($row['Titulo']) . '<br>';
            echo '<strong>Mensaje:</strong> ' . htmlspecialchars($row['Mensaje']) . '<br>';
            echo '<strong>Fecha y Hora:</strong> ' . htmlspecialchars($row['FechaHora']) . '<br>';
            echo '<strong>Tipo:</strong> ' . htmlspecialchars($row['Tipo']);
            echo '</div>';
        }
    } else {
        echo '<p>No hay notificaciones.</p>';
    }

    $conexion->close(); 
    ?>

    <div class="formulario">
        <h3>Agregar Nueva Notificación</h3>
        <form method="post" action="guardar_notificacion.php">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required><br>

            <label for="mensaje">Mensaje:</label>
            <textarea name="mensaje" id="mensaje" required></textarea><br>

            <label for="fecha_hora">Fecha y Hora:</label>
            <input type="datetime-local" name="fecha_hora" id="fecha_hora" required><br>

            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo">
                <option value="recordatorio">Recordatorio</option>
                <option value="actividad">Actividad</option>
                <option value="evento">Evento</option>
            </select><br>

            <input type="submit" value="Agregar Notificación">
        </form>
    </div>
</body>
</html>
