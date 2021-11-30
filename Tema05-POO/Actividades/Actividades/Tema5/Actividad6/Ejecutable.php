<?php

require_once './Futbolista.php';
require_once './Aficionado.php';
require_once './Libro.php';

//$futbolista1 = new Futbolista('Raul','Gonzalez');
//$futbolista2 = new Futbolista('Luis','Figo');
//$futbolista3 = new Futbolista('Zinedine','Zidane');
//
//$aficionado1 = new Aficionado();
//
//echo "Ha metido ".$futbolista1->obtenerGoles()." goles";
//
//$futbolista1->marcaUnGol();
//$futbolista1->marcaUnGol();
//$futbolista1->marcaUnGol();
//$futbolista1->marcaUnGol();
//$futbolista1->marcaUnGol();
//$futbolista1->marcaUnGol();
//
//echo "Ha metido ".$futbolista1->obtenerGoles()." goles";
//
//echo $futbolista1::EDAD_JUBILACION;
//echo Futbolista::EDAD_JUBILACION;
//
//echo Aficionado::celebrarGol();

$libro1 = new Libro('Harry Potter y la piedra filosofal');
$libro2 = new Libro('Harry Potter y la cámara secreta');
$libro3 = new Libro('Harry Potter y el prisionero de Azkaban');
$libro4 = new Libro('Harry Potter y el cáliz de fuego');
$libro5 = new Libro('Harry Potter y la orden del Fénix');
$libro6 = new Libro('Harry Potter y el misterio del príncipe');
$libro7 = new Libro('Harry Potter y las reliquias de la muerte');
$libro8 = new Libro('Harry Potter y el Montecastelo');

echo "De la saga HP hay ".Libro::getContador()." libros";

echo "<br>";

unset($libro8);

echo "De la saga HP hay ".Libro::getContador()." libros";



