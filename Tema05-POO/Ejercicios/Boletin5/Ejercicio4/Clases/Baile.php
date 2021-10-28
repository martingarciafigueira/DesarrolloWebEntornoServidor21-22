<?php
class Baile {
    private $nombre;
    private $edadMinima;
    public function __construct($nom,$edadMin=8) {
        $this->nombre=$nom;
        $this->edadMinima=$edadMin;
    }
    public function getEdadMinima() {
        return $this->edadMinima;
    }
    public function getNombre() {
        return $this->nombre;
    }
}
