<?php

include("EmpleadoHoras.php");
include("EmpleadoAsalariado.php");

$empleadoAsalariado1=new Empleado_Asalariado("Pepe","Alvarez",445678,40000,5);
$empleadoAsalariado2=new Empleado_Asalariado("Alejandro","Perez",124567,28000,2);


$empleadoHoras1=new Empleado_horas("Alicia","Murilla",589032,40,1);
$empleadoHoras2=new Empleado_horas("Cabra","Maravilla",234561,50,5,30);


$array1=array($empleadoHoras1,$empleadoHoras2);
$array2=array($empleadoAsalariado1,$empleadoAsalariado2);

print "El empleado ".$array2[1]->getNombreCompleto()." es un empleado asalariado que cobra ".$array2[1]->getSalarioMes()." euros al mes.<br>";
print "El empleado ".$array1[0]->getNombreCompleto()." es un empleado contratado por horas que cobra ".$array1[0]->getSalarioMes()." euros al mes.<br>";
print "El empleado ".$array2[0]->getNombreCompleto()." es un empleado asalariado que cobra ".$array2[0]->getSalarioMes()." euros al mes.<br>";
$array1[0]->comparar($array1[1]);

?>