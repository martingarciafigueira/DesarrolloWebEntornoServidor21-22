<?php

/** Inserción de una nueva receta usando transacciones **/

$db = new mysqli("localhost", "alumno", "abc123.", "recetas");

if ($db->connect_error){
   die ('Error en la conexión a base de datos.');
} else {
    $bandera=true;
    $db->set_charset("utf8");
    $sql="SELECT MAX(CODIGO)+1 AS COD FROM RECETA";
    $resultado = $db->query($sql);
    $fila = $resultado ->fetch_array();
    $codigo=$fila["COD"];
    $db->autocommit(FALSE);
    $sql1="INSERT INTO RECETA (CODIGO,NOMBRE, COD_GRUPO, DIFICULTAD,
           COD_CHEF) VALUES (".$codigo.",'ENSALADA ESPECIAL',
          (SELECT CODIGO FROM GRUPO WHERE NOMBRE='ENTRANTES'),'Media',
          (SELECT CODIGO FROM CHEF WHERE NOMBREARTISTICO='SEOANE'))";
    $resultado = $db->query($sql1);  
    if ($db->errno) {  
       $bandera = false;  
       echo '<br/>ERROR en la primera operación ('.$db->errno.')->'.$db->error;  
    }
    
/** Como tenemos que insertar varios ingredientes para cada receta haremos
 *  una consulta preparada**/
    $stmt = $db->stmt_init();
    if (!$stmt->prepare('INSERT INTO RECETA_INGREDIENTE 
                        (COD_RECETA, COD_INGREDIENTE, CANTIDAD, MEDIDA) 
                         SELECT ?, CODIGO, ?, ? 
                         FROM INGREDIENTE WHERE NOMBRE=?')) {
         echo "Falló el prepare de stmt: (" . $db->errno . ") " 
              . $db->error;
    }
    if (!$stmt->bind_param('iiss', $codigo, $cantidad, $medida ,
                            $ingrediente)) {
         echo "Falló la vinculación de parámetros: (" . $db->errno . ") " 
              . $db->error;
    }
    $cantidad = 200;
    $medida='gramos';
    $ingrediente='GARBANZOS';
    $stmt->execute();
    if ($db->errno) {  
       $bandera = false;  
       echo '<br/>ERROR en la segunda operación ('.$db->errno.')->'.$db->error;  
    }

    $cantidad = 70;
    $medida='gramos';
    $ingrediente='PIMIENTOS';
    $stmt->execute();
    if ($db->errno) {  
       $bandera = false;  
       echo '<br/>ERROR en la tercera operación ('.$db->errno.')->'.$db->error;  
    }
    
    $cantidad = 40;
    $medida='gramos';
    $ingrediente='CEBOLLA';
    $stmt->execute();
    if ($db->errno) {  
       $bandera = false;  
       echo '<br/>ERROR en la cuarta operación ('.$db->errno.')->'.$db->error;  
    }   

    $cantidad = 1;
    $medida='pizca';
    $ingrediente='SAL';
    $stmt->execute();
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
    $stmt->close();
    $db->autocommit(TRUE);
    $db->close();
}
?>

