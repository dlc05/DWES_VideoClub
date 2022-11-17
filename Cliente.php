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
        $this->numSoportesAlquilados = 0;
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

    public function tieneAlquilado(Soporte $soporte) : bool{
        foreach ($this->soportesAlquilados as $s){
            if($s == $soporte){
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $soporte): bool{
        if($this->tieneAlquilado($soporte)){
            echo "<br>El cliente ya tiene alquilado el soporte";
            return false;
        }
        if($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente){
            echo "<br>El cliente ha alcanzado el numero maximo de alquileres concurrentes";
            return false;
        }
        $this->numSoportesAlquilados++;
        $this->soportesAlquilados[] = $soporte;
        echo "<br>El cliente ha alquilado el soporte" .$soporte->titulo;
        return true;
    }

}