<?php

require_once 'accesoBD.php';  

$db = new accesoBD('alumno', 'abc123.', 'recetas');
$mysqli = $db->abrirConexion();
$consulta='CREATE TABLE libro
    	(codigo SMALLINT NOT NULL AUTO_INCREMENT,  
    	titulo VARCHAR(100) NOT NULL,  
        editorial VARCHAR(50) NOT NULL,
    	paginas SMALLINT NULL,
    	cod_chef tinyint NOT NULL,
    	CONSTRAINT pk_libro PRIMARY KEY(codigo));'; 
$mysqli->query($consulta);  
if($mysqli->errno) 
    {die('<br/>ERROR('.$mysqli->errno.') ->'.$mysqli->error);}
$db->cerrarConexion($mysqli);
?>


