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
    }else if(isset($_SESSION['cliente'])){
        header('Location:mainCliente.php');
        return;
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
    <title>mainAdmin - Videoclub</title>
</head>
<body>
    <div class="container" style="width: 700px !important;">
        <h1>Hola <?=$usuario?></h1>
        <h2>Tabla de socios</h2>
        <?php
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th>Número Socio</th>";
            echo "<th>Nombre/Usuario</th>";
            echo "<th>Acciones</th>";
            echo "</tr>";
            foreach($videoclub->getSocios() as $socio){
                echo "<tr>";
                echo "<td>". $socio->getNumero() ."</td>";
                echo "<td>". $socio->nombre ."</td>";
                echo "<td>
                    <form action='formUpdateCliente.php' method='get'><button type='submit' name='id' value=".$socio->getNumero().">Modificar</button></form>
                    <form name='deleteForm' action='removeCliente.php' method='get'><button type='submit' name='id' value=".$socio->getNumero().">Eliminar</button></form>
                    </td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
        <h2>Tabla de soportes</h2>
        <?php
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th>Número soporte</th>";
            echo "<th>Titulo soporte</th>";
            echo "<th>Precio</th>";
            echo "</tr>";
            foreach($videoclub->getProductos() as $soporte){
                echo "<tr>";
                echo "<td>". $soporte->getNumero() ."</td>";
                echo "<td>". $soporte->titulo ."</td>";
                echo "<td>". $soporte->getPrecio() ."</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
        <form action="logout.php" method="post">
            <div style="display: flex">
                <button type="button" onclick="location.href='formCreateCliente.php'">Crear cliente</button>
                <button type="submit" name="salir">Salir</button>
            </div>
        </form>
    </div>
    <script src="js/index.js"></script>
</body>
</html>
