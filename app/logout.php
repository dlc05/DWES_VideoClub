<?php
    if(isset($_COOKIE['usuario'])){
        setcookie("usuario", "", time()-3600);
        unset($_COOKIE['usuario']);
        setcookie("password", "", time()-3600);
        unset($_COOKIE['password']);
    }

    session_start();
    if(isset($_SESSION['videoclub'])){
        session_destroy();
    }

    header('Location:index.php');