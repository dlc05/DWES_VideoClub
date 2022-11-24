<?php

include "autoload.php";

use Clases\CintaVideo;
use Clases\Dvd;
use Clases\Juego;

    //Parte 320

    //No se puede instanciar la clase soporte por que en el ejercicio 328 se transformo en abstracta
    /*$soporte1 = new Soporte("Tenet", 22, 3);
    echo "<strong>" . $soporte1->titulo . "</strong>";
    echo "<br>Precio: " . $soporte1->getPrecio() . " euros";
    echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " euros";
    $soporte1->muestraResumen();*/

    echo "<br><br>------------------------<br><br>";
    //Parte 321

    $miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107);
    echo "<strong>" . $miCinta->titulo . "</strong>";
    echo "<br>Precio: " . $miCinta->getPrecio() . " euros";
    echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " euros";
    $miCinta->muestraResumen();

    echo "<br><br>------------------------<br><br>";
    //Parte 322

    $miDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
    echo "<strong>" . $miDvd->titulo . "</strong>";
    echo "<br>Precio: " . $miDvd->getPrecio() . " euros";
    echo "<br>Precio IVA incluido: " . $miDvd->getPrecioConIva() . " euros";
    $miDvd->muestraResumen();

    echo "<br><br>------------------------<br><br>";
    //Parte 323

    $miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
    echo "<strong>" . $miJuego->titulo . "</strong>";
    echo "<br>Precio: " . $miJuego->getPrecio() . " euros";
    echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " euros";
    $miJuego->muestraResumen();
