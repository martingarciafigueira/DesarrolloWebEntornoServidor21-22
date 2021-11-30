<?php

class Aficionado
{
    private $nombre;
    private $equipo;
    private $numeroAbono;
    
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
    
}
