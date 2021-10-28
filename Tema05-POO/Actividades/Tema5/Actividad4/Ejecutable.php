<?php

require_once './Futbolista.php';
require_once './Directiva.php';

$futbolista1 = new Futbolista();
$directiva1 = new Directiva();

echo Futbolista::EDAD_MINIMA;
echo $futbolista1::EDAD_MINIMA;

echo Directiva::PATRIMONIO_MINIMO;
echo $directiva1::PATRIMONIO_MINIMO;
