<?php

class CintaVideo extends Soporte{

    private int $duracion;

    public function __construct($titulo, $numero, $precio, $duracion)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;

    }

    public function getDuracion(): int
    {
        return $this->duracion;
    }

    public function muestraResumen() : void{
        echo "<br>Película en VHS: ";
        echo "<br><i>$this->titulo</i>";
        echo "<br>".$this->getPrecio()."€ (IVA no incluido)";
        echo "<br>Duracion: ".$this->getDuracion()." minutos";
    }
}