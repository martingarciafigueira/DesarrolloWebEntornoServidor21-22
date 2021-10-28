<?php

require_once './Persona.php';
require_once './Futbolista.php';
require_once './Aficionado.php';
require_once './Libro.php';

//Referencias de objetos

$futbolista1 = new Futbolista('Cristiano', 'Ronaldo', 400, 20);

echo $futbolista1;

echo $futbolista1->goles;

echo $futbolista1;