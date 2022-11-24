<?php

namespace Clases;

include_once "Resumible.php";

abstract class Soporte implements Resumible
{

    public string $titulo;
    protected int $numero;
    private float $precio;
    const IVA = 1.21;

    public function __construct($titulo, $numero, $precio)
    {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getPrecioConIVA(): float
    {
        return $this->precio * Soporte::IVA;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function muestraResumen(): void
    {
        echo "<br><i>$this->titulo</i>";
        echo "<br>$this->precio € (IVA no incluido)";
    }
}

