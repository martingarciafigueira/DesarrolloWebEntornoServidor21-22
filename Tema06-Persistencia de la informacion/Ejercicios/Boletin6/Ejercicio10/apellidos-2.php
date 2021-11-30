<?php

session_name("ejercicio10");
session_start();

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

$apellidos = recoge("apellidos");

if ($apellidos == "") {
    $_SESSION["avisoApellido"] = "No ha escrito sus apellidos";
    header("Location:apellidos-1.php");
    exit;
} else {
    unset($_SESSION["avisoApellido"]);
    $_SESSION["apellidos"] = $apellidos;
    header("Location:index.php");
    exit;
}
?>
