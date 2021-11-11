<?php

require_once './Futbolista.php';
require_once './Aficionado.php';
require_once './Libro.php';

if (class_exists('Futbolista')){
    echo "La clase futbolista existe<br>";
    $futbolista4 = new Futbolista('Iago', 'Aspas', 500, 100);
    $futbolista4->nombre = "Pepe";
    echo "La clase del objeto es: ".get_class($futbolista4)."<br>";
}