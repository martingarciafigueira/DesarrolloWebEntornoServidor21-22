<?php

$db = new mysqli('localhost','root','','recetas');
$error = $db->connect_errno;

if ($error != NULL) {
    echo "Se ha producido el error ".$error.": ".$db->connect_error;
    exit();
}
else {
    echo "Conectamos!";
    
    //Insertar una receta
    $consulta = "INSERT INTO receta VALUES (17, 'SPAGUETTIS', 4,"
            . "'Fácil', 20, 'Se preparan los spaguettis', 10);";
    mysqli_query($db, $consulta);
    if (mysqli_errno($db)) {
        die("ERROR:".  mysqli_errno($db)." : ".  mysqli_error($db));
    }
    if (mysqli_affected_rows($db) != 1) {
        die("ERROR: No es el resultado esperado");
    }
    
    //Borrar una receta
    $consulta = "DELETE FROM receta WHERE Codigo = 17";
    $db->query($consulta);
    if ($db->errno) {
        die("ERROR:".  $db->errno." : ".$db->error);
    }
    if ($db->affected_rows != 1) {
        die("ERROR: No es el resultado esperado");
    }
}

$db->close();