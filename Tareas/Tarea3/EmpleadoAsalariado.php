<?php

class EmpleadoAsalariado
{

    const PAGAS_ANUALES = 14;
    private $nombre;
    private $apellidos;
    private $numeroSS;
    private $salarioAnual;
    private $porcentajeIncremento;

    public function __construct($nombre, $apellidos, $numeroSS, $salarioAnual, $porcentajeIncremento = 10)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->numeroSS = $numeroSS;
        $this->salarioAnual = $salarioAnual;
        $this->porcentajeIncremento = $porcentajeIncremento;
    }

    public function __set($name, $value)
    {
        if (property_exists(__CLASS__,$name)) {
            $this->$name = $value;
        }
    }

    public function __get($name)
    {
        if (property_exists(__CLASS__,$name)) {
            return $this->$name;
        }
    }

    public function getNombreCompleto()
    {
        return $this->nombre . " " . $this->apellidos;
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
