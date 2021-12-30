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
    $consulta = "SELECT * FROM CHEF";
    $resultado = $db->query($consulta);
    
    while ($fila = $resultado->fetch_assoc())
    {
        echo "NOMBRE Y APELLIDOS: ".$fila["nombre"]." ".$fila["apellido1"]." ".$fila["apellido2"]."<br>";
    }
}

$db->close();