<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$numero1 = recoge("numero1");
$numero2 = recoge("numero2");
$numero3 = recoge("numero3");

$numero1Ok = false;
$numero2Ok = false;
$numero3Ok = false;

if ($numero1 == "") {
    print "  <p class=\"aviso\">No ha escrito el primer número.</p>\n";
    print "\n";
} elseif (!is_numeric($numero1)) {
    print "  <p class=\"aviso\">No ha escrito el primer número como número.</p>\n";
    print "\n";
} elseif ($numero1 <= -1000 || $numero1 >= 1000) {
    print "  <p class=\"aviso\">El primer número no está entre -1.000 y 1.000.</p>\n";
    print "\n";
} else {
    $numero1Ok = true;
}

if ($numero2 == "") {
    print "  <p class=\"aviso\">No ha escrito el segundo numero.</p>\n";
    print "\n";
} elseif (!is_numeric($numero2)) {
    print "  <p class=\"aviso\">No ha escrito el segundo número como número.</p>\n";
    print "\n";
} elseif ($numero2 <= -1000 || $numero2 >= 1000) {
    print "  <p class=\"aviso\">El segundo número no está entre -1.000 y 1.000.</p>\n";
    print "\n";
} else {
    $numero2Ok = true;
}

if ($numero3 == "") {
    print "  <p class=\"aviso\">No ha escrito el tercer numero.</p>\n";
    print "\n";
} elseif (!is_numeric($numero3)) {
    print "  <p class=\"aviso\">No ha escrito el tercer número como número.</p>\n";
    print "\n";
} elseif ($numero3 <= -1000 || $numero3 >= 1000) {
    print "  <p class=\"aviso\">El tercer número no está entre -1.000 y 1.000.</p>\n";
    print "\n";
} else {
    $numero3Ok = true;
}

if ($numero1Ok && $numero2Ok && $numero3Ok) {
    print "  <p>Primer número: <strong>$numero1</strong></p>\n";
    print "\n";
    print "  <p>Segundo número: <strong>$numero2</strong></p>\n";
    print "\n";
    print "  <p>Tercer número: <strong>$numero3</strong></p>\n";
    print "\n";
    if ($numero1 == $numero2 && $numero2 == $numero3) {
        print "  <p>Ha escrito tres números iguales.</p>\n";
    } elseif ($numero1 == $numero2 ||  $numero2 == $numero3 || $numero1 == $numero3) {
        print "  <p>Ha escrito dos números iguales.</p>\n";
    } else {
        print "  <p>Ha escrito tres números distintos.</p>\n";
    }
    print "\n";
}
?>