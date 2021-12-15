<html>   
<head>   
    <TITLE>Cocineros</TITLE>   
    <link rel="stylesheet" href="css/style.css" />
</head>   
<body>   
<div id="contido">  
    <h1>LISTADO DE COCINEROS</h1>
  <table> 
     <tr>    
      <th>NOMBRE</th> 
      <th>APELLIDOS</th> 
      <th>NOMBREARTÍSTICO</th> 
      <th/>
    </tr>

<?php

 require_once 'conectarPDO.php';
  try{ 
    
    $db=dbConnect(); 
    $sql = 'SELECT codigo, nombre, apellido1, apellido2, nombreartistico '
            . 'FROM chef order by apellido1, apellido2, nombre';
    $stmt = $db->query($sql);
    
    $filas = $stmt->fetchAll();
     foreach ($filas as $fila) {  
         echo "<tr> 
             <td>".$fila['nombre']."</td> 
             <td>".$fila['apellido1']." ".$fila['apellido2']."</td> 
             <td>".$fila['nombreartistico']."</td> 
             <td><a href=editarChef.php?cod=".$fila['codigo'].
                    " title='Editar chef'>"
                        .'Editar'.
                     "</a></td>    
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