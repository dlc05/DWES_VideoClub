<?php
    if(!isset($_POST['registrar'])){
        header('Location:register.php');
        return;
    }

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //Si el usuario o contraseña estan vacios se le envia un mensaje de error
    if(empty($usuario) || empty($password)){
        $mensajeError = "Debes introducir un usuario y contraseña";
        include('register.php');
        return;
    }

    //Si el usuario o contraseña contiene espacios se le envia un mensaje de error
    if(str_contains($usuario, ' ') || str_contains($password, ' ')){
        $mensajeError = "El usuario o contraseña no puede contener espacios";
        include('register.php');
        return;
    }

    $direccionArchivo = "./credenciales/credenciales.txt";
    $archivo = fopen($direccionArchivo, "r");

    $mensajeError = "";
    $registrado = false;
    //Se comprueba si el usuario esta registrado
    //Si esta registrado se marca la variable a true, si no permanece en false
    while (!feof($archivo)){
        $linea = explode(",", fgets($archivo));

        if(strcmp($usuario, trim($linea[0])) == 0){
            $registrado = true;
            break;
        }
    }
    fclose($archivo);

    //Si el usuario esta registrado se manda un mensaje de error
    //Si no esta se le registra y redirecciona a index.php para proceder al login
    if($registrado){
        $mensajeError = "Usuario ya registrado";
        include ('register.php');
    }else{
        $contenido = "\n".$usuario.','.$password;
        $archivo = fopen($direccionArchivo, "a");
        fwrite($archivo, $contenido);
        fclose($archivo);
        header('Location:index.php');
    }