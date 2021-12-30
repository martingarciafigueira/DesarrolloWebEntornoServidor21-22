<?php
function dbConnect (){
    $servidor = "localhost"; 
    $base = "recetas"; 
    $usuario = "alumno"; 
    $contrasinal = "abc123."; 
    try {
        $db = new PDO('mysql:host='.$servidor.';dbname='.$base.';charset=utf8', $usuario, $contrasinal);
    }
    catch (PDOException $e) {
        echo '<p>No conectado !!</p>';
        echo $e->getMessage();
        exit;
    }
    return $db;
 }

 ?>

