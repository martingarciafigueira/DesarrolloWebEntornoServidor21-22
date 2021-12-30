<html>
 <head>
   <title>Paginar resultados - Ejercicio_3a</title>
   <link rel="stylesheet" href="css/style.css" />
 </head>
 <body>
   <div id="contenido">  
       <h1>RECETAS</h1>
       <?php
          $numRegistros = 5; //Rexistros por página
          $pagina = 1; //por defecto la página será la primera
          //primero obtenemos el parámetro que nos dice en qué página estamos
          if(array_key_exists('pag', $_GET)){
              $pagina = $_GET['pag']; 
          }
          // necesitamos saber el número de registros que devuelve la consulta
          $db = mysqli_connect("localhost", "alumno", "abc123.", 
                               "recetas");
          
          $db->set_charset("utf8");
          
          $resultado = mysqli_query($db,"SELECT * FROM receta");
          $totalRegistros = mysqli_num_rows($resultado);

          $totalPaginas = ceil($totalRegistros/$numRegistros); 
          // obtenemos el segmento paginado que corresponde a esta página
          $resultado = mysqli_query($db,"SELECT nombre, dificultad, tiempo 
               FROM receta 
               LIMIT ".(($pagina-1)*$numRegistros).", $numRegistros ");
          echo '<table>';
          while($row = mysqli_fetch_array($resultado))
          {
             echo '<tr>
                         <td>'.$row['nombre'].'</td>
                         <td>'.$row['dificultad'].'</td>
                         <td>'.$row['tiempo'].' minutos</td>
                   </tr>'; 
          }
          echo '</table><br/><br/><div id="paginado">';
          //enlaces para el paginado
          for($i=0; $i<$totalPaginas;$i++){
            echo '<a href="ejercicio3a.php?pag='.($i+1).'">'.($i+1).'</a> | ';
          } 
          echo '</div>'
       ?>
   </div>
 </body>
</html>


