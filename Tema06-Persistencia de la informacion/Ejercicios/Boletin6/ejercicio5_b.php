<?php
session_name("ejercicio4");
session_start();

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

// Comprobamos el texto
if ($texto == "") {
  // Si el texto es vacío, no es correcto, pero no hacemos nada especial 2
} else {
    $textoOk = true;
}

// Si el texto no es válido ...
if (!$textoOk) {
    header("Location:ejercicio5_a.php");
    exit;
} else {
    // ... guardamos el texto en la sesión 4
    $_SESSION["texto"] = $texto;
    header("Location:ejercicio5_a.php");
    exit;
}

?>

  <p><a href="ejercicio5_a.php">Volver a la primera página.</a></p>
</body>
</html>
