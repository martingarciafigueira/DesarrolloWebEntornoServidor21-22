<?php

require_once './Futbolista.php';
require_once './Directiva.php';

$futbolista1 = new Futbolista();
$directiva1 = new Directiva();

//Metodo no estatico
//echo $futbolista1->obtenerGoles();

echo Futbolista::obtenerGoles();


