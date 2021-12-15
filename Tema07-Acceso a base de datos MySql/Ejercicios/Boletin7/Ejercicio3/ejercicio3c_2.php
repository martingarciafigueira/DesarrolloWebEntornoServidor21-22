<html>   
<head>   
    <TITLE>Cocineros de la provincia.</TITLE>   
    <link rel="stylesheet" href="css/style.css" />
</head>   
<body>   
<div  id="contenido">   
<?php  
    $provincia = $_POST['provincia']; 
    $db = mysqli_connect('localhost','alumno','abc123.','recetas');
    $db->set_charset("utf8");
    if (mysqli_connect_error($db)) {
        echo "Error en la conexión a base de datos: (mysqli_connect_errno($db))
                mysqli_connect_error($db)\n";
        exit;
   }   
   
   $sql = "select nombre from provincia where codigo = '$provincia'"; 
    $resultado = mysqli_query($db, $sql);   
      if(mysqli_errno($db)) 
            {die('<br/>ERROR('.mysqli_errno($db).') ->'.mysqli_error($db));}
    $fila = mysqli_fetch_assoc($resultado);
    echo  '<h1>Provincia de '.$fila['nombre'].'</h1>';
    
    echo '<h2>CHEFS</h2>';
    $sql = "select CONCAT(nombre,' ',apellido1,' ',IFNULL(apellido2,'')) as chef, nombreartistico, localidad "
           . "from chef where cod_provincia = '$provincia'"; 
    $resultado = mysqli_query($db, $sql);   
    if(mysqli_errno($db)) 
         {die('<br/>ERROR('.mysqli_errno($db).') ->'.mysqli_error($db));}
    echo "<table><tr><th>NOMBRE</th>"
         . "<th>NOMBRE ARTÍSCICO</th>"
         . "<th>LOCALIDAD</th></tr>";      
    while($fila = mysqli_fetch_assoc($resultado)){   
         echo "<tr><td>".$fila['chef']."</td>"
         . "<td>".$fila['nombreartistico']."</td>"
         . "<td>".$fila['localidad']."</td></tr>";   
    }   
    mysqli_close($db);  
?>   
</div>   
</body>   
</html>


