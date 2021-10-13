<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$fondo = recoge("fondo");
$letra = recoge("letra");

print "  <style>body { background-color: $fondo; color: $letra; }</style>\n";
?>
