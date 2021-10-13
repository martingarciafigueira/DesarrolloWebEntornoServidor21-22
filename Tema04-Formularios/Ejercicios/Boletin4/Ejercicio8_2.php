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

if ($fondo != "" && $letra != "") {
  print "  <p>Usted quiere cambiar: $fondo y $letra</p>\n";
} elseif ($fondo != "") {
  print "  <p>Usted quiere cambiar: $fondo</p>\n";
} elseif ($letra != "") {
  print "  <p>Usted quiere cambiar: $letra</p>\n";
} else {
  print "  <p>Usted no quiere cambiar nada</p>\n";
}
?>
