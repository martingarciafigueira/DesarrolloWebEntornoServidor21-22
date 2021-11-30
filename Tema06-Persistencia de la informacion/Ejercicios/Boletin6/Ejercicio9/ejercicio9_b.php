<?php
session_name("ejercicio9");
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

$palabra1 = recoge("palabra1");

if ($palabra1 == "") {
    $_SESSION["aviso1"] = "No ha escrito nada";
    header("Location:ejercicio9_a.php");
    exit;
} elseif (!ctype_alnum($palabra1)) {
    $_SESSION["aviso1"] = "No ha escrito una sola palabra con letras y números";
    header("Location:ejercicio9_a.php");
    exit;
} else {
    unset($_SESSION["aviso1"]);
    $_SESSION["palabra1"] = $palabra1;
    header("Location:ejercicio9_c.php");
    exit;
}
