<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <link rel="stylesheet" href="RecuperContra.css">
</head>

<body>
    <div class="recover-container">
        <h2>Recuperación de Contraseña</h2>

        <form id="recoverForm" action="RecuperContra.php" method="POST">
            <div class="input-group">
                <label for="email">Correo electrónico:</label>
                <input type="email" id="email" name="email" required placeholder="Ingresa tu correo">
            </div>

            <button type="submit" class="recover-btn" name="enviar">Enviar enlace de recuperación</button>

            <div class="message" id="message"></div>

            <div class="back-to-login">
                <a href="InicioSesion.html">¿Recordaste tu contraseña? Inicia sesión</a>
            </div>
        </form>

        <?php
        if(isset($_POST["enviar"])){
            $email=$_POST["email"];

            $destinatario="$email";
            $asunto="Nuevo Mensaje de Alterra";

            $contenido="Nombre:Usuario \n";
            $contenido.="Email: $email \n";
            $contenido.="Mensaje: Ustes solicito un cambio";

            $header="From: NoReply@soft.com";

            $mail=mail($destinatario, $asunto, $contenido, $header);

            if($mail){
                echo "<script>alert('El correo se envio correctamente');</script>";
            }else{
                echo "<script>alert('El correo no se envio');</script>";
            }

        }
        
        ?>

    </div>
</body>

</html>
