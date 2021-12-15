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
    $QUERY = "insert into alumnos values (".$nombre.",".$apellido1.")";
    
    $db->autocommit(false);
    $consulta = "INSERT INTO chef VALUES (21, 'QUIQUE','RIOS','SIEIRO','MONCHO','H','01-01-1980','VIGO',36)";
    $db->query($consulta);
    
    if ($db->errno) {
        echo "Ha fracasado";
        $db->rollback();
    }
    else{
        echo "Ha insertado";
        $db->commit();
    }
}

$db->close();