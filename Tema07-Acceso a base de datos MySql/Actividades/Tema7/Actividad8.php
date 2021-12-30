<?php


$db = new mysqli('localhost','root','','recetas');
echo "Conectado!";

$db->select_db('ejerciciosmontecastelo');
echo "Cambiamos a la BD ejerciciosmontecastelo";