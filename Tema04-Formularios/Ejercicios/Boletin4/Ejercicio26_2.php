<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$jugadores = recoge("jugadores");

$jugadoresOk = false;

$jugadoresMinimo = 3;
$jugadoresMaximo = 10;

if ($jugadores == "") {
    print "  <p class=\"aviso\">No ha escrito el número de jugadores.</p>\n";
    print "\n";
} elseif (!is_numeric($jugadores)) {
    print "  <p class=\"aviso\">No ha escrito el número de jugadores como número.</p>\n";
    print "\n";
} elseif (!ctype_digit($jugadores)) {
    print "  <p class=\"aviso\">No ha escrito el número de jugadores "
        . "como número entero positivo.</p>\n";
    print "\n";
} elseif ($jugadores < $jugadoresMinimo || $jugadores > $jugadoresMaximo) {
    print "  <p class=\"aviso\">El número de jugadores debe estar entre "
     . "$jugadoresMinimo y $jugadoresMaximo.</p>\n";
    print "\n";
} else {
    $jugadoresOk = true;
}

if ($jugadoresOk) {
    $c1 = [];
    $c2 = [];
    $c3 = [];
    $total = [];

    for ($i = 1; $i <= $jugadores; $i++) {
        $c1[$i] = rand(1, 10);
        $c2[$i] = rand(1, 10);
        $c3[$i] = rand(1, 10);
        $total[$i] = $c1[$i] + $c2[$i] + $c3[$i];
    }

    $maximo = max($total);

    print "  <p>La puntuación máxima ha sido <strong>$maximo puntos</strong>.</p>\n";
    print "\n";

    for ($i = 1; $i <= $jugadores; $i++) {
        print "  <p>Jugador $i:\n";
        print "    <img src=\"img/c$c1[$i].svg\" alt=\"$c1[$i]\">\n";
        print "    <img src=\"img/c$c2[$i].svg\" alt=\"$c2[$i]\">\n";
        print "    <img src=\"img/c$c3[$i].svg\" alt=\"$c3[$i]\">\n";
        print "  </p>\n";
    }
    print "\n";
}
?>