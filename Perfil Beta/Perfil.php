<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Voluntario</title>
    <link rel="stylesheet" href="Perfil.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header class="header-personalizado">
        <h1>Perfil del Voluntario</h1>
        <nav class="navbar-custom">
            <a href="#">Inicio</a>
            <a href="#">Noticias</a>
            <a href="#">Nosotros</a>
            <a href="#">Contacto</a>
            <a href="#">Eventos</a>
        </nav>
    </header>
    
    <div class="container mt-5">
        <section class="informacion-voluntario mb-4">
            <h2>Información del Voluntario</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nombre:</strong> Juan Pérez</li>
                <li class="list-group-item"><strong>Correo Electrónico:</strong> juanperez@ejemplo.com</li>
                <li class="list-group-item"><strong>Edad:</strong> 25 años</li>
                <li class="list-group-item"><strong>Participaciones en Eventos:</strong> 3 eventos completados</li>
            </ul>
        </section>

        <section class="mision-completa mb-4">
            <h2>Mis Misiones Completadas</h2>
            <ul id="mis-misiones" class="list-group">
                <li class="list-group-item">Misión: Recolección de Basura en INACAP - Fecha: 17 de octubre de 2024</li>
                <li class="list-group-item">Misión: Vaciar Contenedor de Máquina 1 - Fecha: 20 de octubre de 2024</li>
                <li class="list-group-item">Misión: Se solicita Mecánico en Mackena - Fecha: 25 de octubre de 2024</li>
            </ul>
        </section>

        <section class="acciones-perfil mb-4">
            <h2>Acciones Disponibles</h2>
            <div class="d-flex gap-3">
                <button id="editarPerfil" class="btn btn-warning btn-lg">Editar Perfil</button>
                <button id="verMision" class="btn btn-success btn-lg">Ver Misiones Disponibles</button>
            </div>
        </section>
    </div>

    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2024 Alterra</p>
    </footer>

    <script src="Perfil.js"></script>                
</body>
</html>
