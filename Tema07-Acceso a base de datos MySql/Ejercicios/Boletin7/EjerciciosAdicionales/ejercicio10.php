<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 10</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
        <?PHP
        // Incluir bibliotecas de funciones
        include ("lib/fecha.php");
        ?>        
    </head>
    <body>

        <H1>Eliminación de noticias</H1>

        <?PHP
        if (isset($_REQUEST['eliminar'])) {
            $eliminar = $_REQUEST['eliminar'];

            // Conectar con el servidor de base de datos
            $conexion = mysqli_connect("localhost", "alumnoMontecastelo", "", "ejerciciosmontecastelo") or die("No se puede conectar con el servidor");

            // Obtener n�mero de noticias a borrar
            $borrar = $_REQUEST['borrar'];
            $nfilas = count($borrar);

            // Mostrar noticias a borrar
            for ($i = 0; $i < $nfilas; $i++) {

                // Obtener datos de la noticia i-�sima
                $instruccion = "select * from noticias where id = $borrar[$i]";
                $consulta = mysqli_query($conexion, $instruccion) or die("Fallo en la consulta");
                $resultado = mysqli_fetch_array($consulta);

                // Mostrar datos de la noticia i-�sima
                print ("Noticia eliminada:\n");
                print ("<UL>\n");
                print ("   <LI>Título: " . $resultado['titulo']);
                print ("   <LI>Texto: " . $resultado['texto']);
                print ("   <LI>Categoría: " . $resultado['categoria']);
                print ("   <LI>Fecha: " . date2string($resultado['fecha']));
                if ($resultado['imagen'] != "")
                    print ("   <LI>Imagen: " . $resultado['imagen']);
                else
                    print ("   <LI>Imagen: (no hay)");
                print ("</UL>\n");

                // Eliminar noticia
                $instruccion = "delete from noticias where id = $borrar[$i]";
                $consulta = mysqli_query($conexion, $instruccion) or die("Fallo en la eliminaci�n");

                // Borrar imagen asociada si existe
                if ($resultado['imagen'] != "") {
                    $nombreFichero = "img/" . $resultado['imagen'];
                    unlink($nombreFichero);
                }
            }
            print ("<P>Número total de noticias eliminadas: " . $nfilas . "</P>\n");

            // Cerrar conexi�n
            mysqli_close($conexion);

            print ("<P>[ <A HREF='ejercicio10.php'>Eliminar m�s noticias</A> ]</P>\n");
        } else {

            $conexion = mysqli_connect("localhost", "alumnoMontecastelo", "", "ejerciciosmontecastelo") or die("No se puede conectar con el servidor");

            // Enviar consulta
            $instruccion = "select * from noticias order by fecha desc";
            $consulta = mysqli_query($conexion, $instruccion) or die("Fallo en la consulta");

            // Mostrar resultados de la consulta
            $nfilas = mysqli_num_rows($consulta);
            if ($nfilas > 0) {
                print ("<FORM ACTION='ejercicio10.php' METHOD='post'>\n");

                print ("<TABLE>\n");
                print ("<TR>\n");
                print ("<TH>Título</TH>\n");
                print ("<TH>Texto</TH>\n");
                print ("<TH>Categoría</TH>\n");
                print ("<TH>Fecha</TH>\n");
                print ("<TH>Imagen</TH>\n");
                print ("<TH>Borrar</TH>\n");
                print ("</TR>\n");

                for ($i = 0; $i < $nfilas; $i++) {
                    $resultado = mysqli_fetch_array($consulta);
                    print ("<TR>\n");
                    print ("<TD>" . $resultado['titulo'] . "</TD>\n");
                    print ("<TD>" . $resultado['texto'] . "</TD>\n");
                    print ("<TD>" . $resultado['categoria'] . "</TD>\n");
                    print ("<TD>" . date2string($resultado['fecha']) . "</TD>\n");

                    if ($resultado['imagen'] != "")
                        print ("<TD><A TARGET='_blank' HREF='img/" . $resultado['imagen'] .
                                "'><IMG BORDER='0' SRC='img/ico-fichero.gif' ALT='Imagen asociada'></A></TD>\n");
                    else
                        print ("<TD>&nbsp;</TD>\n");

                    print ("<TD><INPUT TYPE='CHECKBOX' NAME='borrar[]' VALUE='" .
                            $resultado['id'] . "'></TD>\n");

                    print ("</TR>\n");
                }

                print ("</TABLE>\n");

                print ("<BR>\n");
                print ("<INPUT TYPE='SUBMIT' NAME='eliminar' VALUE='Eliminar noticias marcadas'>\n");
                print ("</FORM>\n");
            } else
                print ("No hay noticias disponibles");

            // Cerrar conexi�n
            mysqli_close($conexion);
        }
        ?>

    </BODY>
</HTML>
