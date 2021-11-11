<?php

class EmpleadoHoras {
    
    private $nombre;
    private $apellidos;
    private $numeroSS;
    private $importeHora;
    private $numeroHorasTrabajadas;
    private $porcentajeIncremento;

    public function __construct($nombre, $apellidos, $numeroSS, $importeHora, $numeroHorasTrabajadas = 25, $porcentajeIncremento = 10)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->numeroSS = $numeroSS;
        $this->importeHora = $importeHora;
        $this->numeroHorasTrabajadas = $numeroHorasTrabajadas;
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