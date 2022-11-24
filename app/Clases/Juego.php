<?php

namespace Clases;

include_once "Soporte.php";

class Juego extends Soporte
{

    public string $consola;
    private int $minNumJugadores;
    private int $maxNumJugadores;

    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores)
    {
        parent::__construct($titulo, $numero, $precio);
        $this->consola = $consola;
        $this->minNumJugadores = $minNumJugadores;
        $this->maxNumJugadores = $maxNumJugadores;
    }

    public function muestraJugadoresPosible(): string
    {
        if ($this->minNumJugadores == 1 && $this->maxNumJugadores == 1) {
            return "Para un jugador";
        }
        if ($this->minNumJugadores == 1) {
            return "Para " . $this->maxNumJugadores . " jugadores";
        }
        if ($this->minNumJugadores > 1) {
            return "De " . $this->minNumJugadores . " a " . $this->maxNumJugadores . " jugadores";
        }

        return "Error en la muestra de jugadores";
    }

    public function muestraResumen(): void
    {
        echo "<br>Juego para: " . $this->consola;
        echo "<br><i>$this->titulo</i>";
        echo "<br>" . $this->getPrecio() . "€ (IVA no incluido)";
        echo "<br>" . $this->muestraJugadoresPosible();
    }
}