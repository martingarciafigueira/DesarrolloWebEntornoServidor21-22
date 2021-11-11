<?php

class Directiva
{
    private $nombre;
    private $rol;
    private $dineroGanado;
    const PATRIMONIO_MINIMO = 1000000;
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getRol() {
        return $this->rol;
    }

    public function getDineroGanado() {
        return $this->dineroGanado;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function setDineroGanado($dineroGanado) {
        $this->dineroGanado = $dineroGanado;
    }


    
}
