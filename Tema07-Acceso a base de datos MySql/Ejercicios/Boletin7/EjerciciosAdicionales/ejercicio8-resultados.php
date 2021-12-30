<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 8 - Resultados</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
        <?PHP
        // Incluir bibliotecas de funciones
        include ("lib/fecha.php");
        ?>        
    </head>
    <body>

<H1>Encuesta. Resultados de la votación</H1>

<?PHP

   // Conectar con la base de datos
      $conexion = mysqli_connect("localhost", "alumnoMontecastelo", "", "ejerciciosmontecastelo") or die("No se puede conectar con el servidor");

   // Obtener datos actuales de la votaci�n
      $instruccion = "select * from votos";
      $consulta = mysqli_query($conexion, $instruccion) or die ("Fallo en la selección");
      $resultado = mysqli_fetch_array($consulta);

      $votos1 = $resultado["votos1"];
      $votos2 = $resultado["votos2"];
      $totalVotos = $votos1 + $votos2;

   // Mostrar resultados
      print ("<TABLE>\n");

      print ("<TR>\n");
      print ("<TH>Respuesta</TH>\n");
      print ("<TH>Votos</TH>\n");
      print ("<TH>Porcentaje</TH>\n");
      print ("<TH>Representación gráfica</TH>\n");
      print ("</TR>\n");

      $porcentaje = round (($votos1/$totalVotos)*100,2);
      print ("<TR>\n");
      print ("<TD CLASS='izquierda'>Sí</TD>\n");
      print ("<TD CLASS='derecha'>$votos1</TD>\n");
      print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
      print ("<TD CLASS='izquierda'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='" .
         $porcentaje*4 . "'></TD>\n");
      print ("</TR>\n");

      $porcentaje = round (($votos2/$totalVotos)*100,2);
      print ("<TR>\n");
      print ("<TD CLASS='izquierda'>No</TD>\n");
      print ("<TD CLASS='derecha'>$votos2</TD>\n");
      print ("<TD CLASS='derecha'>$porcentaje%</TD>\n");
      print ("<TD CLASS='izquierda'><IMG SRC='img/puntoamarillo.gif' HEIGHT='10' WIDTH='" .
         $porcentaje*4 . "'></TD>\n");
      print ("</TR>\n");

      print ("</TABLE>\n");

      print ("<P>Número total de votos emitidos: $totalVotos </P>\n");

      print ("<P><A HREF='ejercicio8.php'>Página de votación</A></P>\n");

   // Desconectar
      mysqli_close($conexion);

?>

</BODY>
</HTML>
