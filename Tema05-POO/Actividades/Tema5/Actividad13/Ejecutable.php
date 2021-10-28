<?php

require_once './Futbolista.php';
require_once './Aficionado.php';
require_once './Libro.php';

//Referencias de objetos

$persona1 = new Aficionado('Ramón', 'Celta', 123);
$persona2 = clone($persona1);

if ($persona1 == $persona2) {
    echo "Operador de comparacion simple: TRUE <br>";
}
 else {
    echo "Operador de comparacion simple: FALSE <br>";
}

if ($persona1 === $persona2) {
    echo "Operador de identidad: TRUE <br>";
}
 else {
    echo "Operador de identidad: FALSE <br>";
}