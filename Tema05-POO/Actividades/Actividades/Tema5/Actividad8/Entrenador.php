<?php

class Entrenador
{
    private $nombre;
    private $apellidos;
    private $partidosDirigidos;
    const EDAD_MINIMA = 16;
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getPartidosDirigidos() {
        return $this->partidosDirigidos;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setPartidosDirigidos($partidosDirigidos) {
        $this->partidosDirigidos = $partidosDirigidos;
    }
    
}
