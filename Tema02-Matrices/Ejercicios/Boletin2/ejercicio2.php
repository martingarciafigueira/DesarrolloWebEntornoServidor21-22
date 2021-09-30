<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Ejercicio 2
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" title="Color">
    </head>

    <body>
        <h1>Ejercicio 2</h1>
        <p>Pulsa el botón para mostrar una nueva tirada</p>
        <form action="">
            <p><input type="submit" value="Tirar los dados"></p>
        </form>

        <?php
        //Creo la matriz con números aleatorios del 1 al 6
        $dado = rand(1, 6);
        
        //Creo la matriz con los números del 1 al 6 en letras
        $nombre = ["", "uno", "dos", "tres", "cuatro", "cinco", "seis"];

        print "  <p><img src=\"img/$dado.svg\" alt=\"$dado\" title=\"$dado\" width=\"140\" height=\"140\"></p>\n";
        print "\n";
        print "  <p>Has sacado un <strong>$nombre[$dado]</strong>.</p>\n";
        ?>
    </body>
</html>
