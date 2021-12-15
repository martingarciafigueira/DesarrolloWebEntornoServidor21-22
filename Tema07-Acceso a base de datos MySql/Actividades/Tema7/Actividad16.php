<?php

$db = new mysqli('localhost','root','','recetas');
$error = $db->connect_errno;

if ($error != NULL) {
    echo "Se ha producido el error ".$error.": ".$db->connect_error;
    exit();
}
else {
    echo "Conectamos!<br>";
    
    //Vamos a crear una transacción para insertar un chef
    $query = $db->stmt_init();
    $query->prepare('INSERT INTO receta VALUES (?,?,?,?,?,?,?)');
    $codigo = 19;
    $nombre="LUBINA AL HORNO";
    $codigoGrupo=1;
    $dificultad="DIFICILÍSIMO";
    $tiempo=60;
    $elaboracion="METERLO AL HORNO Y LISTO";
    $codigoChef=10;
    $query->bind_param('isisisi', $codigo, $nombre, $codigoGrupo,$dificultad, $tiempo, $elaboracion, $codigoChef);
    $query->execute();
    $query->close();
    $db->query($consulta);
    $db->close();
}

$db->close();