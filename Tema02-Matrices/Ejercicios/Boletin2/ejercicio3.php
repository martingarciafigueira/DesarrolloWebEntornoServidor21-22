<?php ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Ejercicio 3
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" title="Color">
    </head>

    <body>
        <h1>Ejercicio 3</h1>
        <p>Pulsa el botón para mostrar un nuevo animal</p>
        <form action="">
            <p><input type="submit" value="Nuevo animal"></p>
        </form>
    
    <?php
    $dibujos = [
        "ballena.svg", "caballito-mar.svg", "camello.svg", "cebra.svg", "elefante.svg",
        "hipopotamo.svg", "jirafa.svg", "leon.svg", "leopardo.svg", "medusa.svg",
        "mono.svg", "oso.svg", "oso-blanco.svg", "pajaro.svg", "pinguino.svg",
        "rinoceronte.svg", "serpiente.svg", "tigre.svg", "tortuga-marina.svg", "tortuga.svg"
    ];

    $animal = rand(0, count($dibujos) - 1);

    print "  <p><img src=\"img/animales/$dibujos[$animal]\" alt=\"Animal\" title=\"Animal\" height=\"250\"></p>\n";
    ?>
</body>
</html>
