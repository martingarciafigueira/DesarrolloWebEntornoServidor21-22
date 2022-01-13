<!DOCTYPE html>
<html>
    <head>
        <title>Listado de recetas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/estilos.css" rel="stylesheet" type="text/css">
    </head>
    <body>  
        <div id="contenido">  
            <h1>Listado de recetas</h1>
            <table> 
                <tr>    
                    <th>Receta</th>    
                    <th>Chef</th>   
                    <th></th>
                </tr>   
                <?php
                include('conectarBD.php');
                $numRegistros = 8; //Registros por página
                $pagina = 1; //Por defecto la página será la primera
                if (array_key_exists('pag', $_GET)) {
                    $pagina = $_GET['pag'];
                }
                // Necesitamos saber el número de recetas
                $resultado = mysqli_query($db, "SELECT * FROM receta");
                $totalRegistros = mysqli_num_rows($resultado);
                //calculamos el número de páginas
                $totalPaginas = ceil($totalRegistros / $numRegistros);
                
                $sql = "select * from empleados";
                $resultado = mysqli_query($db, $sql);
                if (mysqli_errno($db)) {
                    die('<br/>ERROR(' . mysqli_errno($db) . ') ->' . mysqli_error($db));
                }
                while ($fila = mysqli_fetch_assoc($resultado))
                {
                    echo "<tr>";
                    echo "<td>".$fila['receta'] . "</td>";
                    echo "<td>".$fila['chef'] . "</td>";
                    echo "<td><a href=fichaReceta.php?cod=".$fila['codigo']." title='Ver la receta completa'>";
                    echo "Más información</a></td></tr>";
                }
                echo '</table><br/><br/><div id="paginado">';
                //enlaces para o paginado
                for ($i = 0; $i < $totalPaginas; $i++) {
                    echo '<a href="ListadoRecetas.php?pag=' . ($i + 1) . '">' . ($i + 1) .
                    '</a> | ';
                }
                echo '</div>';
                mysqli_close($db);
                ?>
            </table>
        </div>   
    </body>   
</html>
