<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="Login.css">
</head>

<body>
    <div class="login-container">
        <h2>Inicio de Sesión</h2>

        <form action="Login.php" method="POST">
            <?php
            include ("Conex.inc");
            include ("LoginCtr.php");
            ?>

            <div class="input-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required placeholder="Ingresa tu usuario">
            </div>

            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required placeholder="Ingresa tu contraseña">
            </div>

            <button type="submit" class="login-btn">Iniciar Sesión</button>

            <div class="registro">
                <a href="Register.html">¿No tienes cuenta? Regístrate aquí</a>
            </div>

            <div class="forgot-password">
                <a href="RecuperContra.html">¿Olvidaste tu contraseña?</a>
            </div>
        </form>
    </div>
</body>

</html>
