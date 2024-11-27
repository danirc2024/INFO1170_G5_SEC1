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
        <div class="row">
            <!-- Sección de información del voluntario -->
            <div class="col-md-6">
                <section class="informacion-voluntario mb-4">
                    <?php 
                    include("Conex.inc");

                    $sql = $db->query("SELECT * FROM Taller_Int_Usuarios WHERE id=1");
                    if ($sql) {
                        if ($sql->num_rows > 0) {
                            while ($datos = $sql->fetch_object()) { ?>
                            <h2>Bienvenido, <?php echo $datos->nombre?></h2>
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
            </div>

            <!-- Nueva sección al lado para el carousel -->
            <div class="col-md-6">
                <h4>Nos Complace tenerte con nosotros</h4>
                <p>Disfruta estos gatitos ╰(*°▽°*)╯</p>
                <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="IMG1.png" class="d-block w-100" alt="Imagen 1">
                        </div>
                        <div class="carousel-item">
                            <img src="IMG2.png" class="d-block w-100" alt="Imagen 2">
                        </div>
                        <div class="carousel-item">
                            <img src="IMG3.png" class="d-block w-100" alt="Imagen 3">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <section class="acciones-perfil mb-4">
            <h2>¿Que podemos Hacer?</h2>
            <div class="d-flex gap-3">
                <button id="verMisiones" class="btn btn-warning btn-lg">Misiones</button>
                <button id="verNoticias" class="btn btn-warning btn-lg">Noticias</button>
                <button id="otroBoton" class="btn btn-success btn-lg">Conoce nuestras Maquinas</button>
            </div>

            
        </section>
    </div>

    <footer class="text-center mt-5">
        <p>&copy; 2024 Alterra</p>
    </footer>

    <script src="Perfil.js"></script>                
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
