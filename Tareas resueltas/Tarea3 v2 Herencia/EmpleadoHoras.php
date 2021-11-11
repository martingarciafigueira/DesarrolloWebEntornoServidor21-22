<?php

require_once("Empleado.php");

class EmpleadoHoras extends Empleado {
    
    private $importeHora;
    private $numeroHorasTrabajadas;

    public function __construct($nombre, $apellidos, $numeroSS, $importeHora, $numeroHorasTrabajadas = 25, $porcentajeIncremento = 10)
    {
        parent::__construct($nombre, $apellidos, $numeroSS, $porcentajeIncremento);
        $this->importeHora = $importeHora;
        $this->numeroHorasTrabajadas = $numeroHorasTrabajadas;
    }

    public function getSalarioMes()
    {
        $salarioMes = $this->importeHora * $this->numeroHorasTrabajadas;
        return $salarioMes;
    }

    public function incrementarSalario()
    {
        $cantidadAIncrementar = $this->importeHora * ($this->porcentajeIncremento / 100);
        $this->importeHora += $cantidadAIncrementar;
    }

    public function comparar(EmpleadoHoras $empleadoAComparar){
        $diferenciaHoras = abs($this->numeroHorasTrabajadas - $empleadoAComparar->numeroHorasTrabajadas);
        return $diferenciaHoras;
    }
}