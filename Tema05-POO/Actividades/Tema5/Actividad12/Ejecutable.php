<?php

require_once './Futbolista.php';
require_once './Aficionado.php';
require_once './Libro.php';

//Referencias de objetos

$persona1 = new Aficionado('Ramón', 'Celta', 123);
$persona3 = new Aficionado('Ramón', 'Celta', 123);

$persona2 = clone($persona1);

echo $persona1->getNombre()."<br>";
echo $persona1->getEquipo()."<br>";
echo $persona1->getNumeroAbono()."<br><br>";
echo $persona2->getNombre()."<br>";
echo $persona2->getEquipo()."<br>";
echo $persona2->getNumeroAbono()."<br>";

$persona2->setEquipo('Real Madrid');

echo $persona1->getNombre()."<br>";
echo $persona1->getEquipo()."<br>";
echo $persona1->getNumeroAbono()."<br><br>";
echo $persona2->getNombre()."<br>";
echo $persona2->getEquipo()."<br>";
echo $persona2->getNumeroAbono()."<br>";