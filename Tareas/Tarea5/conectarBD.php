<?php

$servidor = "localhost";
$usuario = "root";
$contrasenha = "";
$basededatos = "montecastelo";
$db = mysqli_connect("$servidor", "$usuario", "$contrasenha", "$basededatos");
if (!$db->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $db->error);
    exit();
}
if (mysqli_connect_error($db)) {
    die("Error en la conexión a base de datos: (mysqli_connect_errno($db))mysqli_connect_error($db)\n");
}
?>
