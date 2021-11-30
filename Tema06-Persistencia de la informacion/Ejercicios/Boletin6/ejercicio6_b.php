<?php

session_name("ejercicio6");
session_start();

// Si algún número no está guardado en la sesión, vuelve al formulario
if (!isset($_SESSION["a"]) || !isset($_SESSION["b"])) {
    header("Location:multiplicar-1-1.php");
    exit;
}

function recoge($var, $m = "")
{
    if (!isset($_REQUEST[$var])) {
        $tmp = (is_array($m)) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}

$respuesta = recoge("respuesta");

$respuestaOk = false;

if ($respuesta == "" || !is_numeric($respuesta)) {
    header("Location:multiplicar-1-1.php");
    exit;
} else {
    $respuestaOk = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 6
  </title>
  <style>input { text-align: right; }</style>
</head>

<body>
  <h1>Ejercicio 6 -  Resultado</h1>

<?php
if ($respuestaOk) {
    $respuestaCorrecta = $_SESSION["a"] * $_SESSION["b"];
    if ($respuesta == $respuestaCorrecta) {
        print "  <p>¡Respuesta correcta!</p>\n";
        print "\n";
    } else {
        print "  <p class=\"aviso\">¡Respuesta incorrecta!</p>\n";
        print "\n";

        print "  <p>La respuesta correcta no es <strong>$respuesta</strong>. "
            . "La respuesta correcta es <strong>$respuestaCorrecta</strong>.</p>\n";
        print "\n";

        print "  <table class=\"grande\">\n";
        print "    <tbody>\n";
        print "      <tr>\n";
        print "        <td></td>\n";
        print "        <td>$_SESSION[a]</td>\n";
        print "      </tr>\n";
        print "      <tr>\n";
        print "        <td>x</td>\n";
        print "        <td>$_SESSION[b]</td>\n";
        print "      </tr>\n";
        print "      <tr>\n";
        print "        <td colspan=\"2\" style=\"border-top: black 2px solid;\">"
            . "$respuestaCorrecta</td>\n";
        print "      </tr>\n";
        print "    </tbody>\n";
        print "  </table>\n";
    }
}
?>

  <p><a href="ejercicio6_a.php">Volver al formulario.</a></p>

</body>
</html>
