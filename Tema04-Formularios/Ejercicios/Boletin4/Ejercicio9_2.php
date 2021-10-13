<?php
$color = rand(0, 360);
print "  <p>Se han cambiado los colores elegidos.</p>\n";
print "  <p><a href='Ejercicio9_1.php'>Volver al formulario.</a></p>\n";
?>

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
