<?php

namespace Clases;

class Videoclub
{

    private string $nombre;
    private array $productos;
    private int $numProductos;
    private array $socios;
    private int $numSocios;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
        $this->productos = array();
        $this->numProductos = 0;
        $this->socios = array();
        $this->numSocios = 0;
    }

    private function incluirProducto(Soporte $producto)
    {
        $this->productos[] = $producto;
        echo "Incluido soporte " . $this->numProductos . "<br>";
        $this->numProductos++;
    }

    public function incluirCintaVideo($titulo, $precio, $duracion)
    {
        $cintaVideo = new CintaVideo($titulo, $this->numProductos, $precio, $duracion);
        $this->incluirProducto($cintaVideo);
    }

    public function incluirDvd($titulo, $precio, $idiomas, $formatoPantalla)
    {
        $dvd = new Dvd($titulo, $this->numProductos, $precio, $idiomas, $formatoPantalla);
        $this->incluirProducto($dvd);
    }

    public function incluirJuego($titulo, $precio, $consola, $minNumJugadores, $maxNumJugadores)
    {
        $juego = new Juego($titulo, $this->numProductos, $precio, $consola, $minNumJugadores, $maxNumJugadores);
        $this->incluirProducto($juego);
    }

    public function incluirSocio($nombre, $maxAlquileresConcurrentes = 3)
    {
        $socio = new Cliente($nombre, $this->numSocios, $maxAlquileresConcurrentes);
        $this->socios[] = $socio;
        echo "Incluido socio " . $this->numSocios . "<br>";
        $this->numSocios++;
    }

    public function listarProductos(): void
    {
        echo "<br>";
        foreach ($this->productos as $producto) {
            $producto->muestraResumen();
            echo "<br>";
        }
        echo "<br>";
    }

    public function listarSocios(): void
    {
        echo "<br>";
        foreach ($this->socios as $socio) {
            echo "Socio " . $socio->getNumero() . ": " . $socio->nombre;
            $socio->listaAlquileres();
            echo "<br>";
        }
        echo "<br>";
    }

    public function alquilaSocioProducto($numeroCliente, $numeroSoporte): Videoclub
    {
        $cliente = $this->socios[$numeroCliente];
        $soporte = $this->productos[$numeroSoporte];
        
        $cliente->alquilar($soporte);
        return $this;
    }
}

