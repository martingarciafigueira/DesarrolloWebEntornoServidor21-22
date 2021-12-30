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
    
    while ($fila = $resultado->fetch_array(MYSQLI_BOTH))
    {
        echo "NOMBRE Y DIFICULTAD: ".$fila["nombre"]." | ".$fila["dificultad"]."<br>";
        echo "NOMBRE Y DIFICULTAD: ".$fila[1]." | ".$fila[3]."<br>";
    }
}

$db->close();