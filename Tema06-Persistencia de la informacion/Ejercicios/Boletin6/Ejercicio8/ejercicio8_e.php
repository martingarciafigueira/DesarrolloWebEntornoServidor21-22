<?php

session_name("ejercicio8");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 8
  </title>
</head>

<body>
  <h1>Ejercicio 8 - Resultado</h1>

<?php
    print "  <p>Su nombre y apellidos son: <strong>$_SESSION[nombre] $_SESSION[apellidos]</strong>.</p>\n";
    print "\n";
?>
  <p><a href="ejercicio8_a.php">Volver al principio.</a></p>

</body>
</html>
