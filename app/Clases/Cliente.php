<?php

namespace Clases;

use Exception;

class Cliente
{

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
        $this->soportesAlquilados = array();
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

    public function muestraResumen(): void
    {
        echo "<br><strong>Nombre: </strong>$this->nombre";
        echo "<br>Cantidad de alquileres:" . count($this->soportesAlquilados);
    }

    public function tieneAlquilado(Soporte $soporte): bool
    {
        foreach ($this->soportesAlquilados as $s) {
            if ($s == $soporte) {
                return true;
            }
        }
        return false;
    }

    public function alquilar(Soporte $soporte): Cliente
    {
        if ($this->tieneAlquilado($soporte)) {
            //echo cambiado por throw en el ejercicio 330
            //echo "<br>El cliente ya tiene alquilado el soporte";
            throw new Exception("El cliente ya tiene alquilado el soporte");
        }
        if ($this->numSoportesAlquilados >= $this->maxAlquilerConcurrente) {
            //echo cambiado por throw en el ejercicio 330
            //echo "<br>El cliente ha alcanzado el numero maximo de alquileres concurrentes";
            throw new Exception("El cliente ha alcanzado el numero maximo de alquileres concurrentes");
        }
        $this->numSoportesAlquilados++;
        $this->soportesAlquilados[] = $soporte;
        echo "<br>El cliente ha alquilado el soporte " . $soporte->titulo;
        return $this;
    }

    public function devolver(int $numeroSoporte): bool
    {
        $indice = -1;
        $soporte = null;
        foreach ($this->soportesAlquilados as $llave => $s) {
            if ($s == null) continue;
            if ($s->getNumero() == $numeroSoporte) {
                $indice = $llave;
                $soporte = $s;
            }
        }

        if ($soporte == null || !$this->tieneAlquilado($soporte)) {
            echo "<br>El cliente no tiene alquilado el soporte";
            return false;
        }
        $this->numSoportesAlquilados--;
        unset($this->soportesAlquilados[$indice]);
        echo "<br>El cliente ha devuelto el soporte " . $numeroSoporte;
        return true;
    }

    public function listaAlquileres(): void
    {
        echo "<br>El cliente tiene alquilados " . $this->numSoportesAlquilados . " soportes<br>";
        foreach ($this->soportesAlquilados as $soporte) {
            if ($soporte == null) continue;
            $soporte->muestraResumen();
            echo "<br><br>";
        }
    }

}