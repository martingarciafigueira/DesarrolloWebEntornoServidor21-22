<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$temperatura = recoge("temperatura");
$unidad      = recoge("unidad");

$temperaturaOk = false;
$unidadOk      = false;

if ($temperatura == "") {
    print "  <p class=\"aviso\">No ha escrito la temperatura.</p>\n";
    print "\n";
} elseif (!is_numeric($temperatura)) {
    print "  <p class=\"aviso\">No ha escrito la temperatura como número.</p>\n";
    print "\n";
} elseif ($temperatura < -273.15 && $unidad == "c") {
    print "  <p class=\"aviso\">Una temperatura no puede ser tan baja.</p>\n";
    print "\n";
} elseif ($temperatura <- 459.67 && $unidad == "f") {
    print "  <p class=\"aviso\">Una temperatura no puede ser tan baja.</p>\n";
    print "\n";
} elseif ($temperatura >= 10000) {
    print "  <p class=\"aviso\">La temperatura no es inferior a 10.000.</p>\n";
    print "\n";
} else {
    $temperaturaOk = true;
}

if ($unidad == "") {
    print "  <p class=\"aviso\">No ha escrito la unidad.</p>\n";
    print "\n";
} elseif ($unidad != "c" && $unidad != "f") {
    print "  <p class=\"aviso\">La unidad no es correcta.</p>\n";
    print "\n";
} else {
    $unidadOk = true;
}

if ($temperaturaOk && $unidadOk) {
    if ($unidad == "c") {
        $fahrenheit = round(1.8 * $temperatura + 32, 2);
        print "  <p>$temperatura ºC son $fahrenheit ºF</p>\n";
    } else {
        $celsius = round(($temperatura - 32) / 1.8, 2);
        print "  <p>$temperatura ºF son $celsius ºC</p>\n";
    }
    print "\n";
}
?>