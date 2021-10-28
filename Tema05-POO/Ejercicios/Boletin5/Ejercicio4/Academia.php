<?php
require_once 'Clases/Profesor.php';  
require_once 'Clases/Alumno.php';  
class Academia {
   const NOME="ESCUELA DE BAILE MONTECASTELO"; 
   function anhadirProfesor($nom, $ape, $movil,$nif) {
       $p =new Profesor($nom, $ape, $movil, $nif);
       return $p;
   }
   function anhadirAlumno($nom, $ape, $movil) {
       $a=new Alumno($nom, $ape, $movil);
       return $a;
   }
}
