<?php

$db = mysqli_connect("localhost", "alumno", "abc123.", "recetas");

if (mysqli_connect_errno()) {

    printf("Falló la conexión a base de datos recetas. ERRO(%d): %s\n", mysqli_connect_errno(), mysqli_connect_error());
    exit();
}
printf("Conectado a base de datos recetas con éxito");
if (mysqli_close($db)) {
    print "<br>Cerrada la conexión con la base de datos";
}
?>


