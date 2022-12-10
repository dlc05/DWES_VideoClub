<?php
    if(isset($_COOKIE['usuario'])){
        $usuario = $_COOKIE['usuario'];
    }else{
        header('Location:index.php');
        return;
    }
    session_start();
    if(!isset($_SESSION['videoclub'])){
        header('Location:mainAdmin.php');
        return;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/styles.css"/>
    <title>Crear cliente - Videoclub</title>
</head>
<body>
<form action="createCliente.php" method="post">
    <div class="container">
        <h1>Crear cliente</h1>
        <input type="text" name="usuario" placeholder="Introduce el nombre">
        <input type="password" name="password" placeholder="Introduce la contraseña">

        <?php
        if(isset($mensajeError)) {
            echo '<div id="container-box" class="error">';
            echo '<label id="container-msg">' . $mensajeError . '</label>';
            echo '</div>';
        }
        ?>
        <div style="display: flex">
            <button type="submit" name="crearCliente">Registrar</button>
            <button type="button" onclick="location.href='mainAdmin.php'">Volver</button>
        </div>
    </div>
</form>
</body>
</html>
