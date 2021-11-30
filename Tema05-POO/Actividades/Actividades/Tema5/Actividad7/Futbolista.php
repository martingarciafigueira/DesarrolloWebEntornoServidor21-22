<?php

class Futbolista
{
    private $nombre;
    private $apellidos;
    private $goles= 0;
    private $asistencias;
    const EDAD_JUBILACION=40;
    
//    public function Futbolista($nombre, $apellidos){
//        $this->nombre = $nombre;
//        $this->apellidos = $apellidos;
//    }
    
    public function __construct($nombre, $apellidos, $goles, $asistencias){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->goles = $goles;
        $this->asistencias = $asistencias;
    }
    
    function __destruct() {
        echo "Se ha destruido un futbolista";
    }
    
    function marcaUnGol()
    {
        $this->goles++;
    }
    function obtenerGoles()
    {
        return $this->goles;
    }
    
    
}
