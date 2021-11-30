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
  <h1>Ejercicio 9</h1>

  <form action="ejercicio9_d.php" method="get">
    <p>Repita la palabra que acaba de escribir:</p>

<?php
if (isset($_SESSION["aviso2"])) {
    print "    <p><strong>Escriba de nuevo:</strong> <input type=\"text\" name=\"palabra2\" size=\"30\" maxlength=\"30\"> "
        . "<span class=\"aviso\">$_SESSION[aviso2]</span></p>\n";
    print "\n";
} else {
    print "    <p><strong>Escriba de nuevo:</strong> <input type=\"text\" name=\"palabra2\" size=\"30\" maxlength=\"30\"></p>\n";
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
