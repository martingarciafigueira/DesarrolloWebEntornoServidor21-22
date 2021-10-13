<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$filas = recoge("filas");

$filasOk = false;

$filasMinimo = 1;
$filasMaximo = 200;

if ($filas == "") {
    print "  <p class=\"aviso\">No ha escrito el número de filas.</p>\n";
    print "\n";
} elseif (!is_numeric($filas)) {
    print "  <p class=\"aviso\">No ha escrito el número de filas como número.</p>\n";
    print "\n";
} elseif (!ctype_digit($filas)) {
    print "  <p class=\"aviso\">No ha escrito el número de filas "
        . "como número entero positivo.</p>\n";
    print "\n";
} elseif ($filas < $filasMinimo || $filas > $filasMaximo) {
    print "  <p class=\"aviso\">El número de filas debe estar entre "
        . "$filasMinimo y $filasMaximo.</p>\n";
    print "\n";
} else {
    $filasOk = true;
}

if ($filasOk) {
    print "  <table class=\"conborde\">\n";
    print "    <tbody>\n";
    for ($i = 1; $i <= $filas; $i++) {
        print "      <tr>\n";
        print "        <td>$i</td>\n";
        print "      </tr>\n";
    }
    print "    </tbody>\n";
    print "  </table>\n";
    print "\n";
}
?>