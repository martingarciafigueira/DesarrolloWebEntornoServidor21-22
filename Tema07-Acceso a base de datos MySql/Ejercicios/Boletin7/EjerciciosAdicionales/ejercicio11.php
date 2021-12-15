<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 11</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
        <?PHP
        // Incluir bibliotecas de funciones
        include ("lib/fecha.php");
        ?>        
    </head>
    <body>

        <H1>Consulta de noticias</H1>

        <?PHP
        // Conectar con el servidor de base de datos
        $conexion = mysqli_connect("localhost", "alumnoMontecastelo", "", "ejerciciosmontecastelo") or die("No se puede conectar con el servidor");

        // Establecer el n�mero de filas por p�gina y la fila inicial
        $num = 5; // n�mero de filas por p�gina
        if (!isset($_REQUEST['comienzo']))
        {
            $comienzo = 0;
        }

        // Calcular el n�mero total de filas de la tabla
        $instruccion = "select * from noticias";
        $consulta = mysqli_query($conexion, $instruccion) or die("Fallo en la consulta");
        $nfilas = mysqli_num_rows($consulta);

        if ($nfilas > 0) {

            // Mostrar n�meros inicial y final de las filas a mostrar
            print ("<P>Mostrando noticias " . ($comienzo + 1) . " a ");
            if (($comienzo + $num) < $nfilas)
                print ($comienzo + $num);
            else
                print ($nfilas);
            print (" de un total de $nfilas.\n");

            // Mostrar botones anterior y siguiente
            $estapagina = $_SERVER['PHP_SELF'];
            if ($nfilas > $num) {
                if ($comienzo > 0)
                    print ("[ <A HREF='$estapagina?comienzo=" . ($comienzo - $num) . "'>Anterior</A> | ");
                else
                    print ("[ Anterior | ");
                if ($nfilas > ($comienzo + $num))
                    print ("<A HREF='$estapagina?comienzo=" . ($comienzo + $num) . "'>Siguiente</A> ]\n");
                else
                    print ("Siguiente ]\n");
            }
            print ("</P>\n");
        }

        // Enviar consulta
        $instruccion = "select * from noticias order by fecha desc limit $comienzo, $num";
        $consulta = mysqli_query($conexion, $instruccion) or die("Fallo en la consulta");

        // Mostrar resultados de la consulta
        $nfilas = mysqli_num_rows($consulta);
        if ($nfilas > 0) {
            print ("<TABLE>\n");
            print ("<TR>\n");
            print ("<TH>Título</TH>\n");
            print ("<TH>Texto</TH>\n");
            print ("<TH>Categoría</TH>\n");
            print ("<TH>Fecha</TH>\n");
            print ("<TH>Imagen</TH>\n");
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

                print ("</TR>\n");
            }

            print ("</TABLE>\n");
        } else
            print ("No hay noticias disponibles");

// Cerrar conexi�n
        mysqli_close($conexion);
        ?>

    </BODY>
</HTML>
