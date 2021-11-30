<?php

session_name("ejercicio7");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 7
  </title>
  <style>input { text-align: right; }</style>
</head>

<body>
  <h1>Ejercicio 7</h1>

  <form action="ejercicio7_b.php" method="get">
    <p>Escriba el resultado de la siguiente división:</p>

<?php
$_SESSION["a"] = rand(10, 99);
$_SESSION["b"] = rand(1, 9);

print "    <table class=\"grande derecha\">\n";
print "      <tbody>\n";
print "        <tr>\n";
print "          <td>$_SESSION[a]</td>\n";
print "          <td style=\"border-left: black 2px solid; border-bottom: black 2px solid;\">$_SESSION[b]</td>\n";
print "        </tr>\n";
print "        <tr>\n";
print "          <td><input type=\"text\" name=\"resto\" size=\"3\"></td>\n";
print "          <td><input type=\"text\" name=\"cociente\" size=\"3\"></td>\n";
print "        </tr>\n";
print "      </tbody>\n";
print "    </table>\n";
?>

    <p>
      <input type="submit" value="Corregir">
      <input type="reset" value="Borrar">
    </p>
  </form>

</body>
</html>
