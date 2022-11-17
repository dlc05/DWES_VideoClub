<?php
class Cliente{

    public string $nombre;
    private int $numero;
    private array $soportesAlquilados;
    private int $numSoportesAlquilados;
    private int $maxAlquilerConcurrente;

    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3)
    {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getNumSoportesAlquilados(): int
    {
        return $this->numSoportesAlquilados;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function muestraResumen() : void{
        echo "<br><strong>Nombre: </strong>$this->nombre";
        echo "<br>Cantidad de alquileres:". count($this->soportesAlquilados);
    }

}