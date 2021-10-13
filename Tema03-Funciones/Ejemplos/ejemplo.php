<?php

function imprimirBarajaPorValor($baraja){
    unset($baraja[0]);
}

function imprimirBarajaPorReferencia(&$baraja){
    unset($baraja[0]);
}

$baraja = array('uno','dos');

imprimirBarajaPorValor($baraja);
echo "Despues de llamar a la funcion imprimirBarajaPorValor: ".count($baraja);
//Elementos de baraja: 

echo "<br>";

imprimirBarajaPorReferencia($baraja);
echo "Despues de llamar a la funcion imprimirBarajaPorReferencia: ".count($baraja);
//Elementos de baraja:

?>