<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$lado    = recoge("lado");
$inicial = recoge("inicial");
$final   = recoge("final");

$ladoOk    = false;
$inicialOk = false;
$finalOk   = false;

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

if ($inicial == "") {
    print "  <p class=\"aviso\">No ha elegido el color inicial.</p>\n";
    print "\n";
} else {
    $inicialOk = true;
}

if ($final == "") {
    print "  <p class=\"aviso\">No ha elegido el color final.</p>\n";
    print "\n";
} else {
    $finalOk = true;
}

if ($ladoOk && $inicialOk && $finalOk) {
    print "  <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" \n"
        . "    width=\"" . ($lado + 10) . "px\" height=\"" . ($lado + 10) . "px\">\n";
    print "    <defs>\n"
        . "      <linearGradient id=\"gradiente\">\n"
        . "        <stop offset=\"5%\" stop-color=\"$inicial\" />\n"
        . "        <stop offset=\"95%\" stop-color=\"$final\" />\n"
        . "      </linearGradient>\n"
        . "    </defs>\n";
    print "    <rect fill=\"url(#gradiente)\" stroke=\"black\" stroke-width=\"10\" "
        . "x=\"5\" y=\"5\" width=\"$lado\" height=\"$lado\" />\n";
    print "  </svg>\n";
    print "\n";
}
?>
