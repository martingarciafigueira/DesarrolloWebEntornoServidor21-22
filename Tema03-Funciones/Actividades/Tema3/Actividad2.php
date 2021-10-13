<?php

$edad = 30;

function Aumentar_Edad(&$edad)
{
    $edad += 10;
}

echo $edad;
echo "<br>";
Aumentar_Edad($edad);
echo "<br>";
echo $edad;

