<?php

require_once './Futbolista.php';
require_once './Aficionado.php';
require_once './Libro.php';

//Referencias de objetos

$persona1 = new Aficionado('Ramón', 'Celta', 123);

echo $persona1;

if (isset($persona1->numeroAbono)) {
    echo "El atributo numeroAbono está definido";
}
else{
    echo "El atributo numeroAbono NO está definido";
}