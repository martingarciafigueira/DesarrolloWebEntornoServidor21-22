<?php
require_once 'Persona.php';
require_once 'Baile.php';
final class Profesor extends Persona {
    private $nif;
    private $bailes=array();
    public function __construct($nom, $ape, $movil,$nif)
    {     
        parent::__construct($nom, $ape, $movil);
        $this->nif=$nif;
    }
     //El importe de la hora podría no indicarse
    public function calcularSueldo($horas,$importeHora=16) {
        return $horas*$importeHora;
    }
    public function anhadirBaile($nombreBaile,$edadMinima=8) {
        if (!empty($this->bailes)) {
            foreach($this->bailes as $baile)  
            {
                if ($baile->getNombre()==$nombreBaile) { return; }
            }
        } 
        $this->bailes[]=new Baile($nombreBaile,$edadMinima);
    }
    public function eliminarBaile($nombreBaile)
    {
        foreach($this->bailes as $baile)  
        {
            if ($baile->getNombre()==$nombreBaile) {
                $key = array_search($baile,$this->bailes,TRUE);
                unset($this->bailes[$key]);
            }
        }
    }
    public function getBailes() {
        $cad='<br />';
        foreach($this->bailes as $baile)
        {
            $cad=$cad. $baile->getNombre().' (edad min:'.$baile->getEdadMinima().
                  ' años)<br />';
        }
        return $cad;
    }
}
