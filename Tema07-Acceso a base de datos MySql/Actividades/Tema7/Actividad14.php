<?php

$db = new mysqli('localhost','root','','recetas');
$error = $db->connect_errno;

if ($error != NULL) {
    echo "Se ha producido el error ".$error.": ".$db->connect_error;
    exit();
}
else {
    echo "Conectamos!<br>";
    
    //Obtener todos los chefs
    $consulta = "SELECT * FROM receta";
    $resultado = $db->query($consulta);
    
    while ($fila = $resultado->fetch_object("Consulta_Chef"))
    {
        echo "NOMBRE Y ELABORACION: ".$fila->nombre." | ".$fila->elaboración."<br>";
    }
}

$db->close();