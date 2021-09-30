<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Ejercicio 4
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" title="Color">
    </head>

    <body>
        <h1>Ejercicio 4</h1>
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

$nombres = [
    "Ballena", "Caballito de mar", "Camello", "Cebra", "Elefante",
    "Hipopótamo", "Jirafa", "León", "Leopardo", "Medusa",
    "Mono", "Oso", "Oso blanco", "Pájaro", "Pingüino",
    "Rinoceronte", "Serpiente", "Tigre", "Tortuga marina", "Tortuga"
];

$animal = rand(0, count($dibujos) - 1);

print "  <h2>$nombres[$animal]</h2>\n";
print "\n";
print "  <p><img src=\"img/animales/$dibujos[$animal]\" alt=\"$nombres[$animal]\" title=\"$nombres[$animal]\" height=\"250\"></p>\n";
?>
</body>
</html>
