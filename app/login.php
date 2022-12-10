<?php

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$usuarioCorrecto = false;

if($usuario == "admin" && $password == "admin") $usuarioCorrecto = true;
if($usuario == "usuario" && $password == "usuario") $usuarioCorrecto = true;

if($usuarioCorrecto){
    setcookie("usuario", $usuario, time()+60*60*24*90);
    setcookie("password", $password, time()+60*60*24*90);
    header('Location:main.php');
    return;
}

$mensajeError = "Usuario o contraseña incorrectos";

include ('index.php');