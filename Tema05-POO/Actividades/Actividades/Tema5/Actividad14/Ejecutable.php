<?php

require_once './Futbolista.php';
require_once './Aficionado.php';
require_once './Libro.php';

//Referencias de objetos

$persona1 = new Aficionado('Ramón', 'Celta', 123);

echo $persona1->getNombre()."<br>";
echo $persona1->getEquipo()."<br>";
echo $persona1->getNumeroAbono()."<br>";
