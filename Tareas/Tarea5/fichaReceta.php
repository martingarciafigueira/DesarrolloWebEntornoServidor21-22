<!DOCTYPE html>
<html>
    <head>
        <title>Ficha del empleado</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="contenido">   
            <h1>Ficha del empleado</h1> 
            <?php
            $codigo = $_GET['cod'];
            include('conectarBD.php');

            $sql = "select receta.codigo,receta.nombre as receta, 
             CONCAT(chef.nombre,' ',chef.apellido1) as chef, "
                    . "tiempo, elaboración, dificultad,grupo.nombre as grupo "
                    . "from receta inner join chef on cod_chef=chef.codigo "
                    . "inner join grupo on cod_grupo=grupo.codigo "
                    . "where receta.codigo = '$codigo'";
            $resultado = mysqli_query($db, $sql);
            if (mysqli_errno($db)) {
                die('<br/>ERROR(' . mysqli_errno($db) . ') ->' . mysqli_error($db));
            }
            while ($fila = mysqli_fetch_assoc($resultado)) {
               echo "<table>";
               echo "<tr><td colspan=2>".$fila['receta'] . "</td>";
               echo "<td>CHEF: " . $fila['chef'] . "</td></tr>";
               echo "<tr><td>GRUPO: " . $fila['grupo'] . "</td>". "<td>DIFICULTAD: " . $fila['dificultad'] . "</td>";
               echo "<td>TIEMPO: " . $fila['tiempo'] . " minutos</td></tr>";
               echo "<tr><td colspan=3>ELABORACIÓN:<br/>" . $fila['elaboración'] ."<br/></td></tr></table>";
            }
            echo "<h2>INGREDIENTES</h2>";
            $sql = "select ingrediente.nombre, cantidad, medida  "
                   ."from receta inner join receta_ingrediente 
                   on cod_receta=receta.codigo "
                   . "inner join ingrediente on cod_ingrediente=ingrediente.codigo "
                   . " where receta.codigo = '$codigo'";
            $resultado = mysqli_query($db, $sql);
            if (mysqli_errno($db)) {
                die('<br/>ERROR(' . mysqli_errno($db) . ') ->' . mysqli_error($db));
            }
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<p class='ingredientes'>" . $fila['nombre'] . ": "
                . $fila['cantidad'] . " " . $fila['medida'] . "</p>";
            }
            mysqli_close($db);
            ?>   
        </div>   
    </body>   
</html>
