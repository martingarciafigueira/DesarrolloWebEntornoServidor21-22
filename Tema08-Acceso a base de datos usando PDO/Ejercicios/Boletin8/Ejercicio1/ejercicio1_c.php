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
 class receta{  
   public $nombre;  
   public $dificultad;  
   public $tiempo;  
   public $nombreartistico;  
   public function formatearNombre() {  
     return substr($this->nombre,0,1).mb_strtolower(substr($this->nombre,1,strlen($this->nombre)));  
   }  
   public function formatearChef() {  
     return substr($this->nombreartistico,0,1).mb_strtolower(substr($this->nombreartistico,1,strlen($this->nombreartistico)));  
   }  
  }

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
    //Volcamos el resultado de la consulta en un objeto Receta
    while ($resultado = $stmt->fetchObject('receta')) {  
         echo "<tr> 
             <td>".$resultado->formatearNombre()."</td> 
             <td>".$resultado->dificultad."</td> 
             <td>".$resultado->tiempo."</td> 
             <td>".$resultado->formatearChef()."</td> 
             </tr>";   
      }
    echo '</table>';
   $db = null;
}catch(PDOException $e) 
{ 
 print $e->getMessage(); 
} 
?>
