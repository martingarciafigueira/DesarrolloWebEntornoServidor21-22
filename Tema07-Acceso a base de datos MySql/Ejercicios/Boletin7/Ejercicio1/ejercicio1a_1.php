<?php

$db = new mysqli("localhost", "alumno", "abc123.", "recetas");

if ($db->connect_error) {
    printf("Falló la conexión a base de datos recetas. ERROR(%d): %s\n", $db->connect_errno, $db->connect_error);
    exit();
}
printf("Conectado a base de datos recetas con éxito");
$db->close();
?>


