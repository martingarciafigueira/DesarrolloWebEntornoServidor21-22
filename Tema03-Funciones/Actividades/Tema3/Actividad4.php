<?php

function obtener_pvp($precioBruto, $IVA){
    return $precioBruto + ($precioBruto * ($IVA/100));
}

$precio_final = obtener_pvp(100,21);

echo 'El precio final es: '.$precio_final;

