<html>   
<head>   
    <TITLE>Recetas</TITLE>   
    <link rel="stylesheet" href="css/style.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>   
<body>   
<div id="contenido">  
    <h1>LISTA DE RECETAS</h1>
  <table> 
     <tr>    
      <th>RECETA</th> 
      <th>DIFICULTAD</th> 
      <th>TIEMPO</th> 
      <th>CHEF</th>   
      <th/>
    </tr>

<?php

  $servidor = "localhost"; 
  $base = "recetas"; 
  $usuario = "alumno"; 
  $contrasinal = "abc123."; 
  try{ 
    //Conectamos con el servidor
    $db= new PDO('mysql:host='.$servidor.';dbname='.$base.';charset=utf8', $usuario, $contrasinal);
    $sql = 'SELECT receta.nombre, dificultad,tiempo, nombreartistico '
            . 'FROM receta inner join chef on cod_chef=chef.codigo'
            . ' order by nombreartistico';
    $stmt = $db->query($sql);
    //Volcamos el resultado de la consulta en el array
         $filas = $stmt->fetchAll();
     foreach ($filas as $fila) {  
         echo "<tr> 
             <td>".$fila['nombre']."</td> 
             <td>".$fila['dificultad']."</td> 
             <td>".$fila['tiempo']."</td> 
             <td>".$fila['nombreartistico']."</td> 
             </tr>";   
      }
    echo '</table>';
   $db = null;   
}catch(PDOException $e) 
{ 
 print $e->getMessage(); 
} 
?>


