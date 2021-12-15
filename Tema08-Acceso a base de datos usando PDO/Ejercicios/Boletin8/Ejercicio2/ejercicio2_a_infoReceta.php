<html>   
<head>   
    <TITLE>Recetas</TITLE>   
    <link rel="stylesheet" href="css/style.css" />
</head>   
<body>
   <?php
        $servidor = "localhost"; 
        $base = "recetas"; 
        $usuario = "alumno"; 
        $contrasinal = "abc123."; 
        $db= new PDO('mysql:host='.$servidor.';dbname='.$base.';charset=utf8', $usuario, $contrasinal);
	// Si existe el código de la receta...
	if (isset($_GET['cod'])) {
            $sql = 'SELECT cod_receta, cod_ingrediente, receta.nombre as receta,' 
                 . 'ingrediente.nombre as ingrediente, cantidad, medida '
                 . 'FROM receta inner join receta_ingrediente '
                 . 'on receta.codigo=cod_receta inner join ingrediente '
                 . 'on ingrediente.codigo=cod_ingrediente '
                 . 'WHERE receta.codigo = ?';
		$stmt = $db->prepare($sql);
		// Ejecutamos la consulta pasándole como parámetro el código
		$resultado = $stmt->execute(array($_GET['cod']));
		// Obtenemos los resultados
		$fila = $stmt->fetch();
		echo "<div id='contenido'><h1>".$fila['receta']."</h1>
                      <h2>Ingredientes de la receta</h2>";
                echo "<p class='ingredientes'>".$fila['ingrediente'].": ".$fila['cantidad']." ".$fila['medida']."</p>";
                while($fila = $stmt->fetch()) { 
                    echo "<p class='ingredientes'>".$fila['ingrediente'].": ".$fila['cantidad']." ".$fila['medida']."</p>";
                } 
                echo "</div>";
        }
        ?>

    <div id="paxinado">
    	<p><a href="ejercicio2_a.php">&lt;&lt; Volver</a></p>
    </div>
    <body>
</html>