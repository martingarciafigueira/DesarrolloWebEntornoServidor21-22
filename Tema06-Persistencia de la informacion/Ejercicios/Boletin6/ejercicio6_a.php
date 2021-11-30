<?php

session_name("ejercicio6");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 6
  </title>
  <style>input { text-align: right; }</style>
</head>

<body>
  <h1>Ejercicio 6</h1>

  <form action="ejercicio6_b.php" method="get">
    <p>Escriba el resultado de la siguiente multiplicación:</p>

<?php
$_SESSION["a"] = rand(1, 9);
$_SESSION["b"] = rand(1, 9);

print "    <table class=\"grande derecha\">\n";
print "      <tbody>\n";
print "        <tr>\n";
print "          <td></td>\n";
print "          <td>$_SESSION[a]</td>\n";
print "        </tr>\n";
print "        <tr>\n";
print "          <td>x</td>\n";
print "          <td>$_SESSION[b]</td>\n";
print "        </tr>\n";
print "        <tr>\n";
print "          <td colspan=\"2\" style=\"border-top: black 2px solid;\">\n";
print "            <input type=\"text\" name=\"respuesta\" size=\"3\"></td>\n";
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
