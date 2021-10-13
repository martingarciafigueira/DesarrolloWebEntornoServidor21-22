<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$ancho  = recoge("ancho");
$grosor = recoge("grosor");

print "  <svg width=\"" . ($ancho + 2 * $grosor) ."px\" height=\"" . ($ancho + 2 * $grosor) ."px\">\n";
print "    <rect fill=\"white\" stroke=\"black\" stroke-width=\"$grosor\" "
  . "x=\"" . ($grosor / 2) . "\" y=\"" . ($grosor / 2) . "\" width=\"" . ($ancho + $grosor) . "\" height=\"" . ($ancho + $grosor) . "\" />\n";
print "  </svg>\n";
