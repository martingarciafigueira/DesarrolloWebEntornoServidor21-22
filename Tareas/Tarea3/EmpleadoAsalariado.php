<?php

class Empleado_Asalariado {
    //Declaro las propiedades de la clase
    private $nombre;
    private $apellidos;
    private $numeroSS;
    private $sueldo; //14 pagas anuales
    private $porcentajeIncremento;
    
    //Constructor
    function __construct($nombre,$apellidos,$numeroSS,$sueldo,$porcentajeIncremento)
    {
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->numeroSS=$numeroSS;
        $this->sueldo=$sueldo; 
        $this->porcentajeIncremento=$porcentajeIncremento;
    }

    //Set y Get
    function getNombre(){
        return $this->nombre;
    }
    function setNombre($nombre1){
        $this->nombre=$nombre1; 
    }


    function getApellidos(){
        return $this->nombre;
    }
    function setApellidos($apellidos1){
        $this->apellidos=$apellidos1; 
    }


    function getNumeroSS(){
        return $this->nombre;
    }
    function setNumeroSS($numeroSS1){
        $this->numeroSS=$numeroSS1; 
    }


    function getSueldo(){
        return $this->sueldo;
    }
    function setSueldo($sueldo1){
        $this->sueldo=$sueldo1; 
    }


    function getPorcentajeIncremento(){
        return $this->porcentajeIncremento;
    }
    function setPorcentajeIncremento($porcentaje1){
        $this->porcentajeIncremento=$porcentaje1; 
    }

    
    //Métodos solicitados

    function getNombreCompleto(){
        return $this->nombre." ".$this->apellidos;
    }

    function getSalarioMes(){
        return round($this->sueldo/14);
    }

    function incrementarSalario(){
        $importe= ($this->sueldo * $this->porcentajeIncremento)/100;
        return $this->importeHora + $importe;
    }

    function comparar($Empleado){
        $sueldoEmpleado1 = $this->getSalarioMes();
        $sueldoEmpleado2 = $Empleado->getSalarioMes();

        $nombreEmpleado1= $this->getNombreCompleto();
        $nombreEmpleado2 = $Empleado->getNombreCompleto();

        if($sueldoEmpleado1 < $sueldoEmpleado2){
            $diferencia= $sueldoEmpleado2-$sueldoEmpleado1;
            print $nombreEmpleado1." gana ".$diferencia." euros menos que ".$nombreEmpleado2;
        }
        else if($sueldoEmpleado1 > $sueldoEmpleado2){
            $diferencia2= $sueldoEmpleado1-$sueldoEmpleado2;
            print $nombreEmpleado2." gana ".$diferencia2." euros menos que ".$nombreEmpleado1;
        }
        else{
            print $nombreEmpleado1." gana lo mismo que ".$nombreEmpleado2;
        }
    }
}

?>