<?php

class Empleado{
    private $nombre;
    private $apellidos;
    private $numeroSS;
    private $porcentajeIncremento;
    
    public function __construct($nombre, $apellidos, $numeroSS, $porcentajeIncremento = 10)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->numeroSS = $numeroSS;
        $this->porcentajeIncremento = $porcentajeIncremento;
    }

    public function __set($name, $value)
    {
        if (property_exists(__CLASS__,$name)) {
            $this->$name = $value;
        }
    }

    public function __get($name)
    {
        if (property_exists(__CLASS__,$name)) {
            return $this->$name;
        }
    }

    public function getNombreCompleto()
    {
        return $this->nombre . " " . $this->apellidos;
    }
}