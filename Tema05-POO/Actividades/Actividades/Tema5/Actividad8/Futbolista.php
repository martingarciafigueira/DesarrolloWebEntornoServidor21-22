<?php

class Futbolista
{
    private $nombre;
    private $apellidos;
    private $goles= 0;
    private $asistencias;
    const EDAD_JUBILACION=40;
    
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
    
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getGoles() {
        return $this->goles;
    }

    public function getAsistencias() {
        return $this->asistencias;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setGoles($goles) {
        $this->goles = $goles;
    }

    public function setAsistencias($asistencias) {
        $this->asistencias = $asistencias;
    }


    
}
