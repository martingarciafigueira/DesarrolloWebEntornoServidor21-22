<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$ancho = recoge("ancho");

print "  <svg version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" \n"
    . "    width=\"" . ($ancho + 8) . "px\" height=\"" . ($ancho + 8) . "px\">\n";
print "    <rect fill=\"white\" stroke=\"black\" stroke-width=\"4\" "
    . "x=\"2\" y=\"2\" width=\"" . ($ancho + 4) . "\" height=\"" . ($ancho + 4) . "\" />\n";
print "  </svg>\n";
?>
