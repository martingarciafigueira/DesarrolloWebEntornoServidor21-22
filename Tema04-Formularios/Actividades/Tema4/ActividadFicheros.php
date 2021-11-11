<?php

$nombre_fichero_rutaAbsoluta = "C:/xampp/htdocs/Actividades/Tema4/recursos/ficheritoPrueba.txt";
$nombre_fichero = "recursos/ficheritoPrueba.txt";

//Comprobamos la ruta relativa
if (file_exists($nombre_fichero)) {
    echo "La ruta relativa del fichero es: ".$nombre_fichero."<br>";
}
else{
    echo "El fichero no existe";
}

//Comprobamos la ruta absoluta
if (file_exists($nombre_fichero_rutaAbsoluta)) {
    echo "La ruta absoluta del fichero es: ".$nombre_fichero_rutaAbsoluta."<br>";
}
else{
    echo "El fichero no existe";
}

// //Creamos una carpeta
// if (mkdir("HolaATodos") === false) {
// } 

//Abrimos un fichero
$fichero = fopen($nombre_fichero, "rw+");

//Leer un fichero
if ($fichero) {
    $linea = fgets($fichero);
    echo $linea;
}

//Escribir en un fichero
//Abrimos un fichero
fwrite($fichero, 'Navidad Navidad otra vez');
fclose($fichero);
