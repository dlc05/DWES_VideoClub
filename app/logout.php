<?php
    if(isset($_COOKIE['usuario'])){
        setcookie("usuario", "", time()-3600);
        unset($_COOKIE['usuario']);
        setcookie("password", "", time()-3600);
        unset($_COOKIE['password']);
    }

    session_start();
    session_destroy();

    header('Location:index.php');