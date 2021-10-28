<?php
require_once 'Persona.php';
final class Alumno extends Persona {
    private $numClases;
    public function setNumClases($num) {
        $this->numClases=$num;
    }
    public function aPagar(){
        if (isset($this->numClases)) {
              if ($this->numClases===1) {return 20;}
              elseif ($this->numClases===2) {return 32;}
              else {return 40;}
        }
        else { return 'Debe indicar previamente o número de clases';}
    }
}
