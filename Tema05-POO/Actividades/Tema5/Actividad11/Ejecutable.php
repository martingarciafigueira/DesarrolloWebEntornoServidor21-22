<?php

require_once './Futbolista.php';
require_once './Aficionado.php';
require_once './Libro.php';

//Referencias de objetos

$persona1 = new Aficionado('Ramón', 'Celta', 123);
$persona2 = $persona1;

echo $persona1->getNombre()."<br>"; //Ramón
echo $persona2->getNombre()."<br>"; //Ramón

$persona2->setNombre('Kike');

echo $persona1->getNombre()."<br>"; //Kike
echo $persona2->getNombre()."<br>"; //Kike

$persona2 = null;

echo $persona1->getNombre()."<br>"; //Ramón

//Referencias de variables

$var1 = 'Hola';
$var2 = $var1;

echo $var1."<br>"; //Hola
echo $var2."<br>"; //Hola

$var2 = 'Adiós';

echo $var1."<br>"; //Hola
echo $var2."<br>"; //Adiós