<?php

    include "../autoload.php";
    use Clases\Videoclub;

    if(isset($_COOKIE['usuario'])){
        $usuario = $_COOKIE['usuario'];
    }else{
        header('Location:index.php');
        return;
    }

    session_start();
    if(isset($_SESSION['videoclub'])){
        $videoclub = unserialize($_SESSION['videoclub']);
    }else{
        header('Location:main.php');
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
    <title>Proyecto 1</title>
</head>
<body>
<form action="logout.php" method="post">
    <div class="container">
        <h1>Hola <?=$usuario?></h1>
        <?php
            $videoclub->listarSocios();
            $videoclub->listarProductos();
        ?>
        <button type="submit" name="salir">Salir</button>
    </div>
</form>
</body>
</html>
