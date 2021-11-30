<?php
session_name("ejercicio4");
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 4
  </title>
</head>

<body>
  <h1>Ejercicio 4</h1>

<?php
// Funciones auxiliares 1
function recoge($var, $m = "")
{
    if (!isset($_REQUEST[$var])) {
        $tmp = (is_array($m)) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
        $tmp = $_REQUEST[$var];
    }
    return $tmp;
}

// Recogemos el texto
$texto   = recoge("texto");
$textoOk = false;

// Comprobamos el texto y escribimos avisos si es necesario
if ($texto == "") {
    print "  <p class=\"aviso\">No ha escrito su nombre.</p>\n";
} else {
    $textoOk = true;
}

// Si el texto es válido ...
if ($textoOk) {
  // guardamos el texto en la sesión 2
    $_SESSION["texto"] = $texto;
    // y lo mostramos
    print "  <p>El texto es: <strong>$texto</strong>.</p>\n";
}
?>

  <p><a href="ejercicio4_a.php">Volver a la primera página.</a></p>
</body>
</html>
