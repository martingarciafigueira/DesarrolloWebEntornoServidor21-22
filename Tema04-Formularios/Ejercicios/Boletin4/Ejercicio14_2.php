<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$sexo       = recoge("genero"); // El control no se llama sexo para evitar el proxy de Conselleria
$cine       = recoge("cine");
$literatura = recoge("literatura");
$musica     = recoge("musica");

$sexoOk       = false;
$cineOk       = false;
$literaturaOk = false;
$musicaOk     = false;

if ($sexo == "") {
    print "  <p class=\"aviso\">No ha indicado su sexo.</p>\n";
    print "\n";
} elseif ($sexo != "hombre" && $sexo != "mujer") {
    print "  <p class=\"aviso\">Por favor, indique si su sexo es hombre o mujer.</p>\n";
    print "\n";
} else {
    $sexoOk = true;
}

if ($cine != "" && $cine != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no el cine.</p>\n";
    print "\n";
} else {
    $cineOk = true;
}

if ($literatura != "" && $literatura != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no la literatura.</p>\n";
    print "\n";
} else {
    $literaturaOk = true;
}

if ($musica != "" && $musica != "on") {
    print "  <p class=\"aviso\">Por favor, indique si le gusta o no la música.</p>\n";
    print "\n";
} else {
    $musicaOk = true;
}

if ($sexoOk && $cineOk && $literaturaOk && $musicaOk) {
    if ($sexo == "hombre") {
        print "  <p>Es un <strong>hombre</strong>.</p>\n";
    } else {
        print "  <p>Es una <strong>mujer</strong>.</p>\n";
    }
    print "\n";

    if ($cine == "on") {
        print "  <p>Le gusta <strong>el cine</strong>.</p>\n";
    }
    print "\n";

    if ($literatura == "on") {
        print "  <p>Le gusta <strong>la literatura</strong>.</p>\n";
    }
    print "\n";

    if ($musica == "on") {
        print "  <p>Le gusta <strong>la música</strong>.</p>\n";
    }
    print "\n";

    if ($cine != "on" && $literatura != "on" && $musica != "on") {
        print "  <p>No ha marcado ninguna afición.</p>\n";
    }
    print "\n";
}
?>
