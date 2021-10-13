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
    . "    width=\"{$ancho}px\" height=\"{$ancho}px\">\n";
print "    <rect x=\"0\" y=\"0\" width=\"$ancho\" height=\"$ancho\" fill=\"black\" />\n";
print "  </svg>\n";
?>
