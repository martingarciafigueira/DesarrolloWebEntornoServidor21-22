<?php

session_name("ejercicio10");
session_start();

function recoge($var, $m = "")
{
    if (!isset($_REQUEST[$var])){
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

$nombre = recoge("nombre");

if ($nombre == "") {
    $_SESSION["avisoNombre"] = "No ha escrito su nombre";
    header("Location:nombre-1.php");
    exit;
} else {
    unset($_SESSION["avisoNombre"]);
    $_SESSION["nombre"] = $nombre;
    header("Location:index.php");
    exit;
}
?>
