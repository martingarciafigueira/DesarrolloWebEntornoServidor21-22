<?php

abstract class Usuario {
    protected $puntos = 0;
    protected $numeroArticulos = 0;
    
    function getPuntos() {
        return $this->puntos;
    }

    function getNumeroArticulos() {
        return $this->numeroArticulos;
    }

    function setPuntos($puntos) {
        $this->puntos = $puntos;
    }

    function setNumeroArticulos($numeroArticulos) {
        $this->numeroArticulos = $numeroArticulos;
    }
    
    abstract public function calculaPuntos();
    
}
