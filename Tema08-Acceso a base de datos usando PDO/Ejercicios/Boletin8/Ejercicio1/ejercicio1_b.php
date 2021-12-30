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
    //Asignamos el resultado de la consulta a variables
    $stmt->bindColumn(1, $nombre);
    $stmt->bindColumn(2, $dificultad);
    $stmt->bindColumn(3, $tiempo);
    $stmt->bindColumn(4, $nombreartistico);
    while ($registro = $stmt->fetch(PDO::FETCH_BOUND)) {
             echo "<tr> 
             <td>".$nombre."</td> 
             <td>".$dificultad."</td> 
             <td>".$tiempo."</td> 
             <td>".$nombreartistico."</td> 
             </tr>";
    }
    echo '</table>';
   $db = null;   
}catch(PDOException $e) 
{ 
 print $e->getMessage(); 
} 
?>

