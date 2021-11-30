<?php

class Directiva extends Persona
{
    private $rol;
    private $dineroGanado;
    const PATRIMONIO_MINIMO = 1000000;
    
    public function __construct($nombre, $apellidos, $rol, $dineroGanado) {
        parent::__construct($nombre, $apellidos);
        $this->rol = $rol;
        $this->dineroGanado = $dineroGanado;
    }
}
