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
    //Establecemos la conexión con el servidor
    $db= new PDO('mysql:host='.$servidor.';dbname='.$base.';charset=utf8', $usuario, $contrasinal);
    $sql = 'SELECT receta.codigo, receta.nombre, dificultad,tiempo, nombreartistico '
            . 'FROM receta inner join chef on cod_chef=chef.codigo'
            . ' order by nombreartistico';
    $stmt = $db->query($sql);
    //Volcamos el resultado de la consulta en un array de arrays 
    $filas = $stmt->fetchAll();
     foreach ($filas as $fila) {  
         echo "<tr> 
             <td><a href=ejercicio2_a_infoReceta.php?cod=".$fila['codigo'].
                    " title='Ver la receta completa'>"
                        .$fila['nombre'].
                     "</a></td> 
             <td>".$fila['dificultad']."</td> 
             <td>".$fila['tiempo']."</td> 
             <td>".$fila['nombreartistico']."</td> 
             </tr>";   
      }
   $db = null;
}catch(PDOException $e) 
{ 
 print $e->getMessage(); 
} 
?>
    </table>
</div>
</body>
</html>