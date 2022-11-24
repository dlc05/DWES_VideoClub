<?php

namespace Clases;

include_once "Soporte.php";

class Dvd extends Soporte
{

    public string $idiomas;
    private string $formatoPantalla;

    public function __construct($titulo, $numero, $precio, $idiomas, $formatoPantalla)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->idiomas = $idiomas;
        $this->formatoPantalla = $formatoPantalla;
    }

    public function muestraResumen(): void
    {
        echo "<br>Película en DVD: ";
        echo "<br><i>$this->titulo</i>";
        echo "<br>" . $this->getPrecio() . "€ (IVA no incluido)";
        echo "<br>Idiomas: " . $this->idiomas;
        echo "<br>Formato Pantalla: " . $this->formatoPantalla;
    }
}