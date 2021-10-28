<?php
//Clase que representa a unha Persoa
class Persona {
    protected $nombre;
    protected $apellidos;
    protected $movil;
    public function __construct($nom, $ape, $movil)
    { 
        $this->nombre=$nom;
        $this->apellidos=$ape;
        $this->movil=$movil;
    }
    public function verInformacion()
    {
        return $this->nombre.' '.$this->apellidos.' ('.$this->movil.')';
    }
}
?>
