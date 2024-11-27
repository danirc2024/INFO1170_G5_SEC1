<?php
session_start();

// Verifica si el usuario tiene el rol de administrador
if (!isset($_SESSION['usuario_rol']) || $_SESSION['usuario_rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "prueba");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consultas para estadísticas
$consulta_usuarios = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
$resultado_usuarios = $conexion->query($consulta_usuarios)->fetch_assoc();

$consulta_empresas = "SELECT COUNT(*) AS total_empresas FROM empresas_colaboradoras";
$resultado_empresas = $conexion->query($consulta_empresas)->fetch_assoc();

$consulta_eventos = "SELECT COUNT(*) AS total_eventos FROM eventos";
$resultado_eventos = $conexion->query($consulta_eventos)->fetch_assoc();

// Consultas para listar usuarios, empresas y eventos
$consulta_lista_usuarios = "SELECT * FROM usuarios";
$lista_usuarios = $conexion->query($consulta_lista_usuarios);

$consulta_lista_empresas = "SELECT * FROM empresas_colaboradoras";
$lista_empresas = $conexion->query($consulta_lista_empresas);

$consulta_lista_eventos = "SELECT * FROM eventos";
$lista_eventos = $conexion->query($consulta_lista_eventos);

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Panel de Control - Administrador</h1>
        <a href="logout.php">Cerrar Sesión</a>
    </header>
    <main>
        <section class="estadisticas">
            <h2>Estadísticas</h2>
            <ul>
                <li><strong>Total de Usuarios:</strong> <?php echo $resultado_usuarios['total_usuarios']; ?></li>
                <li><strong>Total de Empresas:</strong> <?php echo $resultado_empresas['total_empresas']; ?></li>
                <li><strong>Total de Eventos:</strong> <?php echo $resultado_eventos['total_eventos']; ?></li>
            </ul>
        </section>

        <!-- Sección de Empresas Asociadas -->
        <section class="empresas">
            <h2>Empresas Asociadas</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($empresa = $lista_empresas->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($empresa['id']); ?></td>
                            <td><?php echo htmlspecialchars($empresa['nombre_empresa']); ?></td>
                            <td><?php echo htmlspecialchars($empresa['telefono_empresa']); ?></td>
                            <td>
                                <form method="post" action="eliminar_empresa.php">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($empresa['id']); ?>">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <!-- Sección de Eventos -->
        <section class="eventos">
            <h2>Eventos</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Ubicación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($evento = $lista_eventos->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($evento['id']); ?></td>
                            <td><?php echo htmlspecialchars($evento['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($evento['fecha']); ?></td>
                            <td><?php echo htmlspecialchars($evento['ubicacion']); ?></td>
                            <td>
                                <form method="post" action="eliminar_evento.php">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($evento['id']); ?>">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <!-- Sección de Gestión de Usuarios -->
        <section class="gestion-usuarios">
            <h2>Gestión de Usuarios</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($usuario = $lista_usuarios->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($usuario['id_usuario']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
                            <td><?php echo htmlspecialchars($usuario['rol']); ?></td>
                            <td>
                                <form method="post" action="eliminar_usuario.php">
                                    <input type="hidden" name="id_usuario" value="<?php echo htmlspecialchars($usuario['id_usuario']); ?>">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
