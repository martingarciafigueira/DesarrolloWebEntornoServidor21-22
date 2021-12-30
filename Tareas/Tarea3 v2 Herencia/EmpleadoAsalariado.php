<?php

require_once("Empleado.php");

class EmpleadoAsalariado extends Empleado
{

    const PAGAS_ANUALES = 14;
    private $salarioAnual;

    public function __construct($nombre, $apellidos, $numeroSS, $salarioAnual, $porcentajeIncremento = 10)
    {
        parent::__construct($nombre, $apellidos, $numeroSS, $porcentajeIncremento);
        $this->salarioAnual = $salarioAnual;
    }

    public function getSalarioMes()
    {
        return $this->salarioAnual / self::PAGAS_ANUALES;
    }

    public function incrementarSalario()
    {
        $cantidadAIncrementar = $this->salarioAnual * ($this->porcentajeIncremento / 100);
        $this->salarioAnual += $cantidadAIncrementar;
    }

    public function comparar(EmpleadoAsalariado $empleadoAComparar){
        $diferenciaSalario = abs($this->salarioAnual - $empleadoAComparar->salarioAnual);
        return $diferenciaSalario;
    }
}