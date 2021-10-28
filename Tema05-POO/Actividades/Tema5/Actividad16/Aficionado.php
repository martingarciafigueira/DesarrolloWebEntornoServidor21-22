<?php

class Aficionado extends Persona
{
    private $equipo;
    private $numeroAbono;
    
    function Aficionado(string $nombre, string $apellidos, string $equipo, int $numeroAbono) {
        $this->equipo = $equipo;
        $this->numeroAbono = $numeroAbono;
        parent::__construct($nombre, $apellidos);
    }

    static function celebrarGol()
    {
        echo "Celebro un gol!";
    }
    
    public function __isset($name) {
        return isset($this->$name);
    }
    
    public function __toString() {
        return $this->nombre." ".$this->equipo." ".$this->numeroAbono;
    }
}
