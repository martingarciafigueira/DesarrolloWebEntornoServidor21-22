<?php

class Staff extends Persona
{
    private $equipo;
    
    public function __construct($nombre, $apellidos) {
        parent::__construct($nombre, $apellidos);
        $this->equipo = $equipo;
    }
}
