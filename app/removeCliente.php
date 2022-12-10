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
            $ind = -1;
            foreach($socios as $indice=>$socio){
                if($socio->getNumero() == $id){
                    $eliminarCliente = $socio;
                    $ind = $indice;
                    break;
                }
            }
            if(isset($eliminarCliente)){
                unset($socios[$ind]);
                $videoclub->setSocios($socios);
                $_SESSION['videoclub'] = serialize($videoclub);
            }
        }
    }

    header('Location:mainAdmin.php');