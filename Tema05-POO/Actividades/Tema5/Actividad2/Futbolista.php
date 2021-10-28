<?php

class Futbolista
{
    public $nombre;
    public $apellidos;
    public $partidosDirigidos;
    const EDAD_MINIMA = 16;
    
    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
}
