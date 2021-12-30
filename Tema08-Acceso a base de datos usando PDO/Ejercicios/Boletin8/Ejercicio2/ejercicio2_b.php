<html>   
<head>   
    <TITLE>Cocineros</TITLE>   
    <link rel="stylesheet" href="css/style.css" />
</head>   
<body>   
<div id="contenido">  
    <h1>LISTADO DE COCINEROS</h1>
  <table> 
     <tr>    
      <th>NOMBRE</th> 
      <th>APELLIDOS</th> 
      <th>NOMBREARTISTICO</th> 
      <th/>
    </tr>

<?php

 require_once 'ejercicio2_b_conectarPDO.php';
  try{ 
    
    $db=dbConnect(); 
    $sql = 'SELECT codigo, nombre, apellido1, apellido2, nombreartistico '
            . 'FROM chef ORDER BY apellido1, apellido2, nombre';
    $stmt = $db->query($sql);
    
    $filas = $stmt->fetchAll();
     foreach ($filas as $fila) {  
         echo "<tr> 
             <td>".$fila['nombre']."</td> 
             <td>".$fila['apellido1']." ".$fila['apellido2']."</td> 
             <td>".$fila['nombreartistico']."</td> 
             <td><a href=ejercicio2_b_editarChef.php?cod=".$fila['codigo'].
                    " title='Editar al chef'>"
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