<?php

/** Inserción de una nueva receta usando transacciones **/

$db = new mysqli("localhost", "alumno", "abc123.", "recetas");

if ($db->connect_error) {
   die ('Error en la conexión a base de datos.');
} else {
    $bandera=true;
    $sql="SELECT MAX(CODIGO)+1 AS COD FROM RECETA";
    $resultado = $db->query($sql);
    $fila = $resultado -> fetch_array();
    $codigo=$fila["COD"];
    $db->autocommit(FALSE);
    $db->set_charset("utf8");
    $sql1="INSERT INTO RECETA (CODIGO,NOMBRE, COD_GRUPO, DIFICULTAD,
           COD_CHEF) VALUES (".$codigo.",'ENSALADA ESPECIAL',
          (SELECT CODIGO FROM GRUPO WHERE NOMBRE='ENTRANTES'),'Media',
          (SELECT CODIGO FROM CHEF WHERE NOMBREARTISTICO='SEOANE'))";
    $resultado = $db->query($sql1);  
    if ($db->errno) {  
       $bandera = false;  
       echo '<br/>ERROR en la primera operación ('.$db->errno.')->'.$db->error;  
    }
   $sql2="INSERT INTO RECETA_INGREDIENTE (COD_RECETA, COD_INGREDIENTE,
          CANTIDAD, MEDIDA) VALUES (".$codigo.",(SELECT CODIGO 
          FROM INGREDIENTE WHERE NOMBRE='GARBANZOS'),200,'gramos')";
   $resultado = $db->query($sql2);  
    if ($db->errno) {  
       $bandera = false;  
       echo '<br/>ERROR en la segunda operación ('.$db->errno.')->'.$db->error;  
    }
   $sql3="INSERT INTO RECETA_INGREDIENTE (COD_RECETA, COD_INGREDIENTE,
          CANTIDAD, MEDIDA) VALUES (".$codigo.",(SELECT CODIGO 
          FROM INGREDIENTE WHERE NOMBRE='PIMIENTOS'),70,'gramos')";
   $resultado = $db->query($sql3);  
    if ($db->errno) {  
       $bandera = false;  
       echo '<br/>ERROR en la tercera operación ('.$db->errno.')->'.$db->error;  
    }
   $sql4="INSERT INTO RECETA_INGREDIENTE (COD_RECETA, COD_INGREDIENTE,
          CANTIDAD, MEDIDA) VALUES (".$codigo.",(SELECT CODIGO 
          FROM INGREDIENTE WHERE NOMBRE='CEBOLLA'),40,'gramos')";
   $resultado = $db->query($sql4);  
    if ($db->errno) {  
       $bandera = false;  
       echo '<br/>ERROR en la cuarta operación ('.$db->errno.')->'.$db->error;  
    }
   $sql5="INSERT INTO RECETA_INGREDIENTE (COD_RECETA, COD_INGREDIENTE,
          CANTIDAD, MEDIDA) VALUES (".$codigo.",(SELECT CODIGO 
          FROM INGREDIENTE WHERE NOMBRE='SAL'),1,'pizca')";
   $resultado = $db->query($sql5);  
    if ($db->errno) {  
       $bandera = false;  
       echo '<br/>ERROR en la quinta operación ('.$db->errno.')->'.$db->error;  
    }
    if ($bandera == true){
        $db->commit();
        echo 'Transacción ejecutada con éxito!.';
    } else {
        $db->rollback();
        echo '<div>Error en algún punto de la transacción.</div>';
    }
    $db->autocommit(TRUE);
    $db->close();
}

?>

