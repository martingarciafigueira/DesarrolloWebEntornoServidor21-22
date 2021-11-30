<?php

session_name("ejercicio10");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Borrar datos (1)
  </title>
</head>

<body>
  <h1>Borrar datos (1)</h1>

<?php
if (isset($_SESSION["apellidos"])) {
    print "  <p>Usted ya ha escrito que sus apellidos son: <strong>$_SESSION[apellidos]</strong></p>\n";
    print "\n";
}
?>
  <form action="apellidos-2.php" method="get">
    <p>Escriba sus apellidos:</p>

<?php
if (isset($_SESSION["avisoApellido"])) {
    print "    <p><strong>Apellidos:</strong> <input type=\"text\" name=\"apellidos\" size=\"30\" maxlength=\"30\"> "
        . "<span class=\"aviso\">$_SESSION[avisoApellido]</span></p>\n";
    print "\n";
} else {
    print "    <p><strong>Apellidos:</strong> <input type=\"text\" name=\"apellidos\" size=\"30\" maxlength=\"30\"></p>\n";
    print "\n";
}
?>
    <p>
      <input type="submit" value="Guardar">
      <input type="reset" value="Borrar">
    </p>
  </form>

  <p><a href="index.php">Volver al inicio.</a></p>

</body>
</html>
