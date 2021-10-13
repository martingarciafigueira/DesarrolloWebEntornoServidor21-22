<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$lado  = recoge("lado");
$forma = recoge("forma");

$ladoOk  = false;
$formaOk = false;

if ($lado == "") {
    print "  <p class=\"aviso\">No ha escrito el tamaño del lado.</p>\n";
    print "\n";
} elseif (!is_numeric($lado)) {
    print "  <p class=\"aviso\">No ha escrito el tamaño del lado como número.</p>\n";
    print "\n";
} elseif (!ctype_digit($lado)) {
    print "  <p class=\"aviso\">No ha escrito el tamaño del lado como número entero.</p>\n";
    print "\n";
} elseif ($lado < 20 || $lado > 500) {
    print "  <p class=\"aviso\">El tamaño del lado no está entre 20 y 500 px.</p>\n";
    print "\n";
} else {
    $ladoOk = true;
}

if ($forma == "") {
    print "  <p class=\"aviso\">No ha elegido ninguna forma.</p>\n";
    print "\n";
} elseif ($forma != "circulo" && $forma != "cuadrado") {
    print "  <p class=\"aviso\">Por favor, indique si quiere dibujar un cuadrado o un círculo.</p>\n";
    print "\n";
} else {
    $formaOk = true;
}

if ($ladoOk && $formaOk) {
    print "  <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" \n"
        . "    width=\"" . ($lado + 10) . "px\" height=\"" . ($lado + 10) . "px\">\n";
    if ($forma == "cuadrado") {
        print "  <rect fill=\"white\" stroke=\"black\" stroke-width=\"10\" "
        . "x=\"5\" y=\"5\" width=\"$lado\" height=\"$lado\" />\n";
    } else {
        print "    <circle cx=\"" . ($lado + 10) / 2 . "\" cy=\"" . ($lado + 10) / 2
            . "\" r=\"" . $lado / 2 . "\" stroke=\"black\" stroke-width=\"10\" fill=\"white\" />\n";
    }
    print "  </svg>\n";
    print "\n";
}
?>
