<?php

include("EmpleadoAsalariado.php");
include("EmpleadoHoras.php");

$empAsa1 = new EmpleadoAsalariado("Fran", "Rocha", "12345", 100000, 50);
$empAsa2 = new EmpleadoAsalariado("Alberto", "Alvarez", "12345", 10000);

$empleadosAsalariados = array($empAsa1, $empAsa2);

foreach ($empleadosAsalariados as $empleado) {
    echo "Nombre y apellidos empAsa1: ";
    echo $empleado->getNombreCompleto();
    echo "<br>";
    echo "Salario al mes empAsa1: ";
    echo $empleado->getSalarioMes();
    echo "<br>";
    echo "Voy a incrementar el salario anual: ";
    echo "<br>";
    echo "Salario actual: ";
    echo $empleado->salarioAnual;
    echo "<br>";
    $empleado->incrementarSalario();
    echo "Salario incrementado: ";
    echo $empleado->salarioAnual;
    echo "<br>";
    echo "La diferencia de salario entre empAs1 y empAs2 es: ";
    echo $empleado->comparar($empAsa2);
    echo "<br>";
}

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$empHoras1 = new EmpleadoHoras("Tacio", "Camba", "12345", 20, 100, 75);
$empHoras2 = new EmpleadoHoras("Ramon", "Rios", "12345", 50, 50, 60);

$empleadosHoras = array($empHoras1, $empHoras2);

foreach ($empleadosHoras as $empleado) {
    echo "Nombre y apellidos empleadoHoras: ";
    echo $empleado->getNombreCompleto();
    echo "<br>";
    echo "Salario al mes empleadoHoras: ";
    echo $empleado->getSalarioMes();
    echo "<br>";
    echo "Voy a incrementar el importe por hora: ";
    echo "<br>";
    echo "Importe por hora actual: ";
    echo $empleado->importeHora;
    echo "<br>";
    $empleado->incrementarSalario();
    echo "Importe por hora incrementado: ";
    echo $empleado->importeHora;
    echo "<br>";
    echo "La diferencia de horas entre empAs1 y empAs2 es: ";
    echo $empleado->comparar($empHoras2);
    echo "<br>";
}




