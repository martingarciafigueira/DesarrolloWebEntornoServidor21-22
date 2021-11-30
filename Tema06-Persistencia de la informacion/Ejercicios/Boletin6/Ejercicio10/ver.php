<?php

session_name("ejercicio10");
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ver datos
  </title>
</head>

<body>
  <h1>Ver datos</h1>

<?php
if (!isset($_SESSION["nombre"]) and !isset($_SESSION["apellidos"])) {
    print "  <p>Usted no ha escrito todavía ni su nombre ni sus apellidos</p>\n";
} elseif (isset($_SESSION["nombre"]) and !isset($_SESSION["apellidos"])) {
    print "  <p>Usted <strong>sólo</strong> ha escrito que su nombre es: <strong>$_SESSION[nombre]</strong></p>\n";
} elseif (!isset($_SESSION["nombre"]) and isset($_SESSION["apellidos"])) {
    print "  <p>Usted <strong>sólo</strong> ha escrito que sus apellidos son: <strong>$_SESSION[apellidos]</strong></p>\n";
} else {
    print "  <p>Usted ha escrito que su nombre es: <strong>$_SESSION[nombre]</strong></p>\n";
    print "\n";
    print "  <p>Usted ha escrito que sus apellidos son: <strong>$_SESSION[apellidos]</strong></p>\n";
}
?>

  <p><a href="index.php">Volver al inicio.</a></p>

</body>
</html>
