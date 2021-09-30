<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Ejercicio 7
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" title="Color">
    </head>

    <body>
        <h1>Ejercicio 7</h1>
        <p>Pulsa el botón para mostrar una nueva tirada</p>
        <form action="">
            <p><input type="submit" value="Tirar los dados"></p>
        </form>

<?php
$numero = rand(2, 7);

// Creamos la matriz de dados aleatorios
$dados = [];
for ($i = 0; $i < $numero; $i++) {
    $dados[$i] = rand(1, 6);
}

// Mostramos los dados
print "  <h2>Tirada de $numero dados</h2>\n";
print "\n";
print "  <p>\n";
foreach ($dados as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" title=\"$dado\" width=\"140\" height=\"140\">\n";
}
print "  </p>\n";
print "\n";

// Ordenamos los dados
sort($dados);

// Mostramos los dados ordenados
print "  <h2>Tirada ordenada</h2>\n";
print "\n";
print "  <p>\n";
foreach ($dados as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" title=\"$dado\" width=\"140\" height=\"140\">\n";
}
print "  </p>\n";
?>

</body>
</html>
