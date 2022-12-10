<?php

    include "../autoload.php";

    session_start();
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
    }

    if(isset($id)){
        if(isset($_SESSION['videoclub'])){
            $videoclub = unserialize($_SESSION['videoclub']);
            $socios = $videoclub->getSocios();
            foreach($socios as $socio){
                if($socio->getNumero() == $id){
                    $eliminarCliente = $socio;
                }
            }
            if(isset($eliminarCliente)){
                unset($socios[$id]);
                $videoclub->setSocios($socios);
                $_SESSION['videoclub'] = serialize($videoclub);
            }
        }
    }

    header('Location:mainAdmin.php');