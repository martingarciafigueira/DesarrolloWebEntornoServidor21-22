<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Ejercicio 8
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" title="Color">
    </head>

    <body>
        <h1>Ejercicio 8</h1>
        <p>Pulsa el botón para mostrar una nueva tirada de Risk</p>
        <form action="">
            <p><input type="submit" value="Jugar a Risk!"></p>
        </form>

<?php
// Mostramos con cuántos dados va a jugar el Atacante
print "  <h2>Atacante</h2>\n";
print "\n";
$numero1 = rand(1, 3);
if ($numero1 == 1) {
    print "  <p>El atacante ataca con $numero1 dado:</p>\n";
} else {
    print "  <p>El atacante ataca con $numero1 dados:</p>\n";
}
print "\n";

// Guardamos los valores del Atacante en la matriz $dados1
$dados1 = [];
for ($i = 0; $i < $numero1; $i++) {
    $dados1[$i] = rand(1, 6);
}

// Ordenamos la matriz  $dados2 y mostramos los resultados obtenidos por el Atacante
rsort($dados1);
print "  <p>\n";
foreach ($dados1 as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" title=\"$dado\" width=\"140\" height=\"140\">\n";
}
print "  </p>\n";
print "\n";

// Mostramos con cuántos dados va a jugar el Defensor
print "  <h2>Defensor</h2>\n";
print "\n";
$numero2 = rand(1, 2);
if ($numero2 == 1) {
    print "  <p>El defensor defiende con $numero2 dado:</p>\n";
} else {
    print "  <p>El defensor defiende con $numero2 dados:</p>\n";
}
print "\n";

// Guardamos los valores del Defensor en la matriz $dados2
$dados2 = [];
for ($i = 0; $i < $numero2; $i++) {
    $dados2[$i] = rand(1, 6);
}

// Ordenamos la matriz $dados2 y mostramos los resultados obtenidos por el Defensor
rsort($dados2);
print "  <p>\n";
foreach ($dados2 as $dado) {
    print "    <img src=\"img/$dado.svg\" alt=\"$dado\" title=\"$dado\" width=\"140\" height=\"140\">\n";
}
print "  </p>\n";
print "\n";

// En los acumuladores $bajasAtacante $bajasDefensor contamos cuántas partidas ha perdido cada uno
// El número de dados que se compara es el menor de los números de dados tirados
$menor = min($numero1, $numero2);
$bajasAtacante = 0;
$bajasDefensor = 0;
for ($i = 0; $i < $menor; $i++) {
    if ($dados1[$i] > $dados2[$i]) {
        $bajasDefensor++;
    } else {
        $bajasAtacante++;
    }
}

// Mostramos cuántas partidas bajas ha tenido cada jugador
print "  <h2>Resultado</h2>\n";
print "\n";
print "  <p>El atacante pierde <strong>$bajasAtacante</strong> unidad";
if ($bajasAtacante != 1) {
    print "es";
}
print ". El defensor pierde <strong>$bajasDefensor</strong> unidad";
if ($bajasDefensor != 1) {
    print "es";
}
print ".</p>\n";
?>

</body>
</html>
