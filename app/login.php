<?php

include "../autoload.php";
use Clases\Videoclub;

$usuario = $_POST['usuario'];
$password = $_POST['password'];
$videoclub = insertVideoclubData();
$cliente = null;

$usuarioCorrecto = false;
$esCliente = false;
$esAdmin = false;

if(empty($usuario) || empty($password)){
    $mensajeError = "Debes introducir un usuario y contraseña";
    include('index.php');
    return;
}

if($usuario == "admin" && $password == "admin") {
    $usuarioCorrecto = true;
    $esAdmin = true;
}

foreach ($videoclub->getSocios() as $socio){
    if($usuario == $socio->nombre){
        if($password == $socio->password){
            $cliente = $socio;
            $usuarioCorrecto = true;
            $esCliente = true;
        }
    }
}

$direccionArchivo = "./credenciales/credenciales.txt";
$archivo = fopen($direccionArchivo, "r");

$mensajeError = "Usuario no registrado";
while (!feof($archivo)){
    $linea = explode(",", fgets($archivo));

    if(strcmp($usuario, trim($linea[0])) == 0){
        if(strcmp($password, trim($linea[1])) == 0){
            $usuarioCorrecto = true;
        }else{
            $mensajeError = "Contraseña incorrecta";
        }
        break;
    }
}

if(!$usuarioCorrecto){
    include('index.php');
    return;
}

setcookie("usuario", $usuario, time()+60*60*24*90);
setcookie("password", $password, time()+60*60*24*90);
if($esAdmin){
    session_start();
    $_SESSION['videoclub'] = serialize($videoclub);
    header('Location:mainAdmin.php');
}else if($esCliente){
    session_start();
    $_SESSION['cliente'] = serialize($cliente);
    header('Location:mainCliente.php');
}else{
    header('Location:main.php');
}

function insertVideoclubData(){
    $vc = new Videoclub("Severo 8A");

    $vc->incluirJuego("God of War", 19.99, "PS4", 1, 1);
    $vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
    $vc->incluirDvd("Torrente", 4.5, "es","16:9");
    $vc->incluirDvd("Origen", 4.5, "es,en,fr", "16:9");
    $vc->incluirDvd("El Imperio Contraataca", 3, "es,en","16:9");
    $vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107);
    $vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140);

    $vc->incluirSocio("Amancio Ortega", "amancio");
    $vc->incluirSocio("Pablo Picasso", "pablo", 2);

    $arraySoportes = array();
    $arraySoportes[] = $vc->getProductos()[1];
    $arraySoportes[] = $vc->getProductos()[2];

    $vc->alquilarSocioProducto(1, $arraySoportes);

    return $vc;
}