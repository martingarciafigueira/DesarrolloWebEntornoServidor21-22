<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$lado    = recoge("lado");
$esquina = recoge("esquina");

$ladoOk    = false;
$esquinaOk = false;

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
} elseif ($lado < $esquina * 2) {
    print "  <p class=\"aviso\">El tamaño del lado debe ser al menos el doble que el de la esquina.</p>\n";
    print "\n";
} else {
    $ladoOk = true;
}

if ($esquina == "") {
    print "  <p class=\"aviso\">No ha escrito el tamaño de la esquina.</p>\n";
    print "\n";
} elseif (!is_numeric($esquina)) {
    print "  <p class=\"aviso\">No ha escrito el tamaño de la esquina como número.</p>\n";
    print "\n";
} elseif (!ctype_digit($esquina)) {
    print "  <p class=\"aviso\">No ha escrito el tamaño de la esquina como número entero.</p>\n";
    print "\n";
} elseif ($esquina < 10 || $esquina > 250) {
    print "  <p class=\"aviso\">El tamaño de la esquina no está entre 20 y 500 px.</p>\n";
    print "\n";
} else {
    $esquinaOk = true;
}

if ($ladoOk && $esquinaOk) {
    print "  <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" \n"
        . "    width=\"" . ($lado + 10) . "px\" height=\"" . ($lado + 10) . "px\">\n";
    print "    <rect fill=\"white\" stroke=\"black\" stroke-width=\"10\" "
    . "x=\"5\" y=\"5\" width=\"$lado\" height=\"$lado\" rx=\"$esquina\" ry=\"$esquina\" />\n";
    print "  </svg>\n";
    print "\n";
}
?>
