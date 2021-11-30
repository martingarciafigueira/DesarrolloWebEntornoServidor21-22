<?php

class Persona{
    protected $nombre;
    protected $apellidos;
    
    public function __construct($nombre, $apellidos) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __toString() {
        return $this->nombre." ".$this->apellidos;
    }
    
    protected function miMetodo(){
        return "Soy un metodo de la clase padre";
    }
}
