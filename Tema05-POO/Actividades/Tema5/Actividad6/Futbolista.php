<?php

class Futbolista
{
    private $nombre;
    private $apellidos;
    private $goles= 0;
    private $asistencias;
    const EDAD_JUBILACION=40;
    
    function marcaUnGol()
    {
        $this->goles++;
    }
    function obtenerGoles()
    {
        return $this->goles;
    }
    
    
}
