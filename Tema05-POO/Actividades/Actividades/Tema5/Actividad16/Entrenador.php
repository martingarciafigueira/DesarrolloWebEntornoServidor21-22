<?php

class Entrenador extends Persona
{
    private $partidosDirigidos;
    const EDAD_MINIMA = 16;
    
    public function __construct($nombre, $apellidos, $partidosDirigidos) {
        parent::__construct($nombre, $apellidos);
        $this->partidosDirigidos = $partidosDirigidos;
    }
}
