<?php
    include "../autoload.php";

    if(!isset($_POST['crearCliente'])) {
        header('Location:mainAdmin.php');
        return;
    }

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if(empty($usuario) || empty($password)){
        $mensajeError = "Debes introducir un usuario y contraseña";
        include('formCreateCliente.php');
        return;
    }

    session_start();
    if(isset($_SESSION['videoclub'])){
        $videoclub = unserialize($_SESSION['videoclub']);
    }

    foreach($videoclub->getSocios() as $socio){
        if($socio->nombre == $usuario){
            $mensajeError = "Ese usuario ya esta registrado!";
            include('formCreateCliente.php');
            return;
        }
    }

    $videoclub->incluirSocio($usuario, $password);

    $_SESSION['videoclub'] = serialize($videoclub);

    header('Location:mainAdmin.php');