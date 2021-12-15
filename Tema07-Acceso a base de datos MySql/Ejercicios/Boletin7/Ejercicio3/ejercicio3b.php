<?php

$db = new mysqli('localhost', 'alumno', 'abc123.', 'recetas');
if ($db->connect_error) 
   {die('Error de conexión: ' . $db->connect_error);}

$db->set_charset("utf8");
$sql="SELECT * from provincia";
$resultado = $db->query($sql);
if ($resultado->num_rows > 0) 
{
    $combo="";
    while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
    {
        $combo .= " <option value='"
                  .$row['codigo']."'>".$row['nombre']."</option>"; 
    }
}
else
{
    echo "La tabla Provincia no tiene datos";
}
$db->close(); 
?>
<html>
<head>
   <title>Selección por provincia</title>
</head>
<body>
   <select name="provincia">
       <?php echo $combo; ?>
   </select>
</body>
</html>


