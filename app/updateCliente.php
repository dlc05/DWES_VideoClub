<?php
include "../autoload.php";

if(!isset($_POST['modificarCliente'])) {
    header('Location:mainAdmin.php');
    return;
}

if(isset($_POST['id'])) {
    $id = intval($_POST['id']);
}
$usuario = $_POST['usuario'];
$password = $_POST['password'];

if(empty($usuario) || empty($password)){
    $mensajeError = "Debes introducir un usuario y contraseña";
    include('formUpdateCliente.php');
    return;
}

session_start();
if(isset($_SESSION['videoclub'])){
    $videoclub = unserialize($_SESSION['videoclub']);
    foreach($videoclub->getSocios() as $socio){
        if($socio->getNumero() == $id){
            $socio->nombre = $usuario;
            $socio->password = $password;
            break;
        }
    }
    $_SESSION['videoclub'] = serialize($videoclub);
}else{
    $cliente = unserialize($_SESSION['cliente']);
    $cliente->nombre = $usuario;
    $cliente->password = $password;

    $_COOKIE['usuario'] = $usuario;
    $_COOKIE['password'] = $password;

    $_SESSION['cliente'] = serialize($cliente);
}






header('Location:mainAdmin.php');