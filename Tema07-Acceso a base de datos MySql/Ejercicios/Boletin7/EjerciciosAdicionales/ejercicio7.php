<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 7</title>
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

        // Enviar consulta
        $instruccion = "select * from noticias order by fecha desc";

        $consulta = mysqli_query($conexion, $instruccion);

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

// Cerrar conexión
        mysqli_close($conexion);
        ?>

    </BODY>
</HTML>
