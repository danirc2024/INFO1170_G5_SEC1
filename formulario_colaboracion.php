<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Colaboración</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.form-container {
    width: 50%;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #4CAF50;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

label {
    font-weight: bold;
}

input, textarea {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>

    <div class="form-container">
        <h1>Formulario de Colaboración</h1>
        <p>Si su empresa desea colaborar con nosotros, complete el siguiente formulario:</p>
        
        <form action="guardar_colaboracion.php" method="POST">
            <label for="nombre_empresa">Nombre de la Empresa:</label>
            <input type="text" name="nombre_empresa" id="nombre_empresa" required>

            <label for="direccion_empresa">Dirección:</label>
            <textarea name="direccion_empresa" id="direccion_empresa"></textarea>

            <label for="email_empresa">Correo Electrónico:</label>
            <input type="email" name="email_empresa" id="email_empresa" required>

            <label for="telefono_empresa">Teléfono:</label>
            <input type="tel" name="telefono_empresa" id="telefono_empresa">

            <label for="descripcion_empresa">Descripción de la Empresa:</label>
            <textarea name="descripcion_empresa" id="descripcion_empresa"></textarea>

            <button type="submit">Enviar</button>
        </form>
    </div>

</body>
</html>
