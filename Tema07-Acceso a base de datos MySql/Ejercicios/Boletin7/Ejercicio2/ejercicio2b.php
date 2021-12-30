<?php

/* establecemos conexión con la base de datos recetas */
$db = mysqli_connect("localhost", "alumno", "abc123.", "recetas");

/* comprobando la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión a base de datos recetas. ERROR(%d): %s\n", 
             mysqli_connect_errno(),mysqli_connect_error());
    exit();
}

/* Ejecutamos la consulta de inserción */
$consulta = "INSERT INTO libro (titulo, editorial, paginas, cod_chef)
    VALUES ('Recetas para torpes','Cocina para estudiantes', NULL, 
    (select codigo from chef where nombreartistico='EL TITO'));";  
$resultado= mysqli_query($db, $consulta);

/* Comprobamos si hubo algún error */
 if(mysqli_errno($db)) 
     {die('<br/>ERRO('.mysqli_errno($db).') ->'.mysqli_error($db));}

/* Comprobamos que el número de filas afectadas fue 1 */
 if(mysqli_affected_rows($db)!=1) 
     {die ('Error: no es el resultado esperado.');}
 else {
        printf("<br/>Insertado %d registro con el código %d",mysqli_affected_rows($db),mysqli_insert_id($db));}
mysqli_close($db); 
?>

