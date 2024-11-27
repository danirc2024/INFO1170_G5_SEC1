<?php
    session_start();
    
    
    include 'Conex.inc';


    $nombre=$_GET['nombre'];
    $password=$_GET['contra'];

    $validar_login = mysqli_query($db, "SELECT * FROM Taller_Int_Usuarios WHERE nombre='ADRIAN' AND contra='123'");


    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['nombre'] = $nombre;
        header("location: hola.html");
        exit;

    }else{
        echo '
        <script>
             alert("Usuario inexistente, favor verificar sus datos correctamente");
             setTimeout(() => {
                 window.location = "login.php";
             }, 4000); // 4000 milisegundos = 4 segundos
        </script>
     ';
            exit;
    }
?>