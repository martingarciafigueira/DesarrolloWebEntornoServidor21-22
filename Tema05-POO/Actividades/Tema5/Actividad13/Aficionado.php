<?php

class Aficionado
{
    private $nombre;
    private $equipo;
    private $numeroAbono;
    
    function Aficionado($nombre, $equipo, $numeroAbono) {
        $this->nombre = $nombre;
        $this->equipo = $equipo;
        $this->numeroAbono = $numeroAbono;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getEquipo() {
        return $this->equipo;
    }

    public function getNumeroAbono() {
        return $this->numeroAbono;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEquipo($equipo) {
        $this->equipo = $equipo;
    }

    public function setNumeroAbono($numeroAbono) {
        $this->numeroAbono = $numeroAbono;
    }

    static function celebrarGol()
    {
        echo "Celebro un gol!";
    }
}
