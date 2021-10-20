<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$edad = recoge("edad");
$peso = recoge("peso");

$edadOk = false;
$pesoOk = false;

if ($edad == "") {
    print "  <p class=\"aviso\">No ha escrito su edad.</p>\n";
    print "\n";
} elseif (!is_numeric($edad)) {
    print "  <p class=\"aviso\">No ha escrito su edad como número.</p>\n";
    print "\n";
} elseif (!ctype_digit($edad)) {
    print "  <p class=\"aviso\">No ha escrito su edad como número entero.</p>\n";
    print "\n";
} elseif ($edad < 5|| $edad > 130) {
    print "  <p class=\"aviso\">Su edad no está entre 5 y 130 años.</p>\n";
    print "\n";
} else {
    $edadOk = true;
}

if ($peso == "") {
    print "  <p class=\"aviso\">No ha escrito su peso.</p>\n";
    print "\n";
} elseif (!is_numeric($peso)) {
    print "  <p class=\"aviso\">No ha escrito su peso como número.</p>\n";
    print "\n";
} elseif ($peso < 10|| $peso > 150) {
    print "  <p class=\"aviso\">Su peso no está entre 10 y 150 kilos.</p>\n";
    print "\n";
} else {
    $pesoOk = true;
}

if ($edadOk && $pesoOk) {
    print "  <p>Su edad es <strong>$edad</strong> años.</p>\n";
    print "\n";
    print "  <p>Su peso es <strong>$peso</strong> kilos.</p>\n";
    print "\n";
}
?>
