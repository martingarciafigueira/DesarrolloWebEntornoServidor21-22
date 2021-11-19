<?php

class Empleado_horas {
    //Declaro las propiedades de la clase
    private $nombre;
    private $apellidos;
    private $numeroSS;
    private $numeroHoras;
    private $importeHora; // El importe que cobra por hora (por defecto 25 horas trabajadas)
    private $porcentajeIncremento;


    //Genero el constructor
    function __construct($nombre,$apellidos,$numeroSS,$importeHora,$porcentajeIncremento,$numeroHoras=25)
    {
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->numeroSS=$numeroSS;
        $this->numeroHoras=$numeroHoras;
        $this->importeHora=$importeHora;
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


    function getNumeroHoras(){
        return $this->numeroHoras;
    }
    function setNumeroHoras($numeroHoras1){
        $this->numeroHoras=$numeroHoras1; 
    }

    function getImporteHora(){
        return $this->importeHora;
    }
    function setImporteHora($importeHora1){
        $this->importeHora=$importeHora1; 
    }

    function getPorcentajeIncremento(){
        return $this->porcentajeIncremento;
    }
    function setPorcentajeIncremento($porcentajeIncremento1){
        $this->porcentajeIncremento=$porcentajeIncremento1; 
    }





    

    function getNombreCompleto(){
        return $this->nombre." ".$this->apellidos;
    }

    function getSalarioMes(){
        return round($this->numeroHoras * $this->importeHora);
    }
    
    function incrementarSalario(){
       $sueldo=($this->importeHora * $this->porcentajeIncremento)/100;
       return $this->importeHora + $sueldo;
    }
    
    function comparar($Empleado){
        $horasEmpleado1 = $this->numeroHoras;
        $horasEmpleado2 = $Empleado->getNumeroHoras();

        $nombreEmpleado1= $this->getNombreCompleto();
        $nombreEmpleado2 = $Empleado->getNombreCompleto();

        if($horasEmpleado1 < $horasEmpleado2){
            $diferencia= $horasEmpleado2-$horasEmpleado1;
            print $nombreEmpleado1." trabajó ".$diferencia." horas menos que ".$nombreEmpleado2;
        }
        else if($horasEmpleado1 > $horasEmpleado2){
            $diferencia2= $horasEmpleado1-$horasEmpleado2;
            print $nombreEmpleado2." trabajó ".$diferencia2." horas menos que ".$nombreEmpleado1;
        }
        else{
            print $nombreEmpleado1." trabajó las mismas horas que ".$nombreEmpleado2;
        }
    }
    

}

?>