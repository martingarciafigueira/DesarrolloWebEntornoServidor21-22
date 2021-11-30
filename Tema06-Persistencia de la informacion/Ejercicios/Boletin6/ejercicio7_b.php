<?php

session_name("ejercicio7");
session_start();

// Si algún número no está guardado en la sesión, vuelve al formulario
if (!isset($_SESSION["a"]) || !isset($_SESSION["b"])) {
    header("Location:ejercicio7_a.php");
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

$cociente    = recoge("cociente");
$resto       = recoge("resto");
$respuestaOk = false;

if ($cociente == "" || !is_numeric($cociente) || $resto == "" || !is_numeric($resto)) {
    header("Location:ejercicio7_a.php");
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
    Ejercicio 7
  </title>
  <style>input { text-align: right; }</style>
</head>

<body>
  <h1>Ejercicio 7 - Resultado</h1>

<?php
if ($respuestaOk) {
    $cocienteCorrecto = floor($_SESSION["a"] / $_SESSION["b"]);
    $restoCorrecto    = $_SESSION["a"] % $_SESSION["b"];
    if ($cociente == $cocienteCorrecto && $resto == $restoCorrecto) {
        print "  <p>¡Respuesta correcta!</p>\n";
        print "\n";
    } else {
        print "  <p class=\"aviso\">¡Respuesta incorrecta!</p>\n";
        print "\n";

        print "  <p>La respuesta correcta no es <strong>$cociente</strong> y <strong>$resto</strong>. "
            . "La respuesta correcta es <strong>$cocienteCorrecto</strong> y <strong>$restoCorrecto</strong>.</p>\n";
        print "\n";

        print "  <table class=\"grande derecha\">\n";
        print "    <tbody>\n";
        print "      <tr>\n";
        print "        <td>$_SESSION[a]</td>\n";
        print "        <td style=\"border-left: black 2px solid; border-bottom: black 2px solid;\">$_SESSION[b]</td>\n";
        print "      </tr>\n";
        print "      <tr>\n";
        print "        <td>$restoCorrecto</td>\n";
        print "        <td>$cocienteCorrecto</td>\n";
        print "      </tr>\n";
        print "    </tbody>\n";
        print "  </table>\n";
    }
}
?>

  <p><a href="ejercicio7_a.php">Volver al formulario.</a></p>

</body>
</html>
