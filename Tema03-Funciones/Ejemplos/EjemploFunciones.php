<?php

//Tenemos una variable $cambios

$cambios = 25;

//Creamos una función por valor

function SumarUno($cambios){
    $cambios++;
}

//Creamos una función por referencia

function SumarDos(&$cambios){
    $cambios = $cambios + 2;
}

//Creamos una función por defecto

function SumarLoQueSea($cambios, $cantidadASumar = 100){
    $cambios = $cambios + $cantidadASumar;
}

//Creamos una función por defecto y por referencia

function SumarLoQueSeaPorReferencia(&$cambios, $cantidadASumar = 100){
    $cambios = $cambios + $cantidadASumar;
}

//Llamamos a las funciones

echo "Valor de la variable cambios es: ".$cambios."<br>";

SumarUno($cambios);

echo "Valor de la variable cambios es: ".$cambios."<br>";

SumarDos($cambios);

echo "Valor de la variable cambios es: ".$cambios."<br>";

SumarLoQueSea($cambios, 250);

echo "Valor de la variable cambios es: ".$cambios."<br>";

SumarLoQueSeaPorReferencia($cambios, 250);

echo "Valor de la variable cambios es: ".$cambios."<br>";

SumarLoQueSeaPorReferencia($cambios);

echo "Valor de la variable cambios es: ".$cambios."<br>";

?>