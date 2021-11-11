<?php
abstract class Calculo {
    protected $operando1;
    protected $operando2;
    protected $resultado;

    public function setOperando1($op1) {
        $this->operando1=$op1;
    }
    public function setOperando2($op2) {
        $this->operando2=$op2;
    }
    public function getResultado() {
        return $this->resultado;
    }
    abstract public function calcular();
}
?>
