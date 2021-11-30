<?php

class Futbolista extends Persona
{
    private $goles= 0;
    private $asistencias;
    const EDAD_JUBILACION=40;
    
    public function __construct($nombre, $apellidos, $goles, $asistencias) {
        parent::__construct($nombre, $apellidos);
        $this->goles = $goles;
        $this->asistencias = $asistencias;
    }
    
    function marcaUnGol()
    {
        $this->goles++;
    }
    function obtenerGoles()
    {
        return $this->goles;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __get($name) {
        return $this->$name;
    }
}
