<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Ejercicio 5
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" title="Color">
    </head>

    <body>
        <h1>Ejercicio 5</h1>
        <p>Pulsa el botón para mostrar una nueva tirada</p>
        <form action="">
            <p><input type="submit" value="Tirar los dados"></p>
        </form>

<?php
$numero = rand(2, 7);

// Guardamos los valores de los dados en la matriz $dados
$dados = [];
for ($i = 0; $i < $numero; $i++) {
    $dados[$i] = rand(1, 6);
}

// Mostramos las imágenes de los dados obtenidos
print "  <h2>Tirada de $numero dados</h2>\n";
print "\n";
print "  <p>\n";
foreach ($dados as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" title=\"$dado\" width=\"140\" height=\"140\">\n";
}
print "  </p>\n";
print "\n";

// Mostramos los valores numéricos de los dados obtenidos
print "  <h2>Resultado</h2>\n";
print "\n";
print "  <p>Los valores obtenidos son: ";
foreach ($dados as $dado) {
    print "$dado ";
}
print "</p>\n";
?>

</body>
</html>
