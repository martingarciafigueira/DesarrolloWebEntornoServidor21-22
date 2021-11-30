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
  <h1>Ejercicio 8 - 2</h1>

  <form action="ejercicio8_d.php" method="get">
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
      <input type="submit" value="Siguiente">
      <input type="reset" value="Borrar">
    </p>
  </form>

</body>
</html>
