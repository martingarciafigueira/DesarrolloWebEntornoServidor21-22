<?php

function funcion_multifuncion($tipoFuncion, $texto) {
    switch ($tipoFuncion) {
        case 1:
            return strlen($texto);
        case 2:
            return substr($texto, 8);
        case 3:
            return strpos($texto, "viernes");
        case 4:
            return strtoupper($texto);
        case 5:
            return strtolower($texto);
        case 6:
            return trim($texto);
        case 7:
            return ltrim($texto);
        case 8:
            return str_replace("viernes","lunes",$texto);
        case 9:
            return strrev($texto);
    }
}

echo "Función strlen: ".funcion_multifuncion(1, "Por fin viernes")."<br>";
echo "Función substr: ".funcion_multifuncion(2, "Por fin viernes")."<br>";
echo "Función strpos: ".funcion_multifuncion(3, "Por fin viernes")."<br>";
echo "Función strtoupper: ".funcion_multifuncion(4, "Por fin viernes")."<br>";
echo "Función strtolower: ".funcion_multifuncion(5, "Por fin viernes")."<br>";
echo "Función trim: ".funcion_multifuncion(6, "         Por fin viernes             ")."<br>";
echo "Función ltrim: ".funcion_multifuncion(7, "         Por fin viernes             ")."<br>";
echo "Función str_replace: ".funcion_multifuncion(8, "Por fin viernes")."<br>";
echo "Función strrev: ".funcion_multifuncion(9, "Por fin viernes")."<br>";
