<?php

session_name("ejercicio9");
session_start();
// Borrramos los datos por si estamos volvendo a empezar
unset($_SESSION["palabra1"]);
unset($_SESSION["palabra2"]);

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

  <form action="ejercicio9_b.php" method="get">
    <p>Escriba una palabra (con letras mayúsculas, letras minúsculas y números):</p>

<?php
if (isset($_SESSION["aviso1"])) {
    print "    <p><strong>Palabra:</strong> <input type=\"text\" name=\"palabra1\" size=\"20\" maxlength=\"20\"> "
        . "<span class=\"aviso\">$_SESSION[aviso1]</span></p>\n";
    print "\n";
} else {
    print "    <p><strong>Palabra:</strong> <input type=\"text\" name=\"palabra1\" size=\"20\" maxlength=\"20\"></p>\n";
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
