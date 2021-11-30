<?php

session_name("ejercicio9");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 9
  </title>
</head>

<body>
  <h1>Ejercicio 9 - Resultado</h1>

<?php
    print "  <p>Ha escrito y confirmado la palabra: <strong>$_SESSION[palabra1]</strong>.</p>\n";
    print "\n";
?>
  <p><a href="ejercicio9_a.php">Volver al principio.</a></p>

</body>
</html>
