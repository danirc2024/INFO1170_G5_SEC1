
<!DOCTYPE html>
<html lang="en">
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
        <?php 
        include("Conex.inc");

        $sql = $db->query("SELECT * FROM Taller_Int_Usuarios");
        if ($sql) {
            if ($sql->num_rows > 0) {
                while ($datos = $sql->fetch_object()) { ?>
                <h1>Bienvendo <?php echo $datos->nombre?></h1>
                <ul class="list-group">
                    <li class="list-group-item">Nombre: <?php echo $datos->nombre; ?></li>
                    <li class="list-group-item">Correo: <?php echo $datos->correo; ?></li>
                    <li class="list-group-item"><strong>Participaciones en Eventos: <b>0</b></strong></li>
                </ul>
            <?php }
        } else { ?>
            <p>No hay información disponible de voluntarios.</p>
        <?php }
    } else { ?>
        <p>Error al ejecutar la consulta.</p>
    <?php } ?>
</section>


        <section class="mision-completa mb-4">
            <h2>Mis Misiones Completadas</h2>
            <ul id="mis-misiones" class="list-group">
                <li class="list-group-item"></li>
                <li class="list-group-item"></li>
                <li class="list-group-item"></li>
            </ul>
        </section>

        <section class="acciones-perfil mb-4">
            <h2>Acciones Disponibles</h2>
            <div class="d-flex gap-3">
                <button id="editarPerfil" class="btn btn-warning btn-lg">Editar Perfil</button>
                <!--<button id="EventosSoli.html" class="btn btn-success btn-lg">Ver Misiones Disponibles</button> -->
                <button id="CAUTION" class="btn btn-danger btn-lg">Ponte al Dia</button>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 Alterra</p>
    </footer>

    <script src="Perfil.js"></script>                
</body>
</html>
