<?php
session_name("ejercicio8");
session_start();
// Borramos los datos por si estamos volvendo a empezar
unset($_SESSION["nombre"]);
unset($_SESSION["apellidos"]);

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
  <h1>Ejercicio 8</h1>

  <form action="ejercicio8_b.php" method="get">
    <p>Escriba su propio nombre:</p>

<?php
if (isset($_SESSION["avisoNombre"])) {
    print "    <p><strong>Nombre:</strong> <input type=\"text\" name=\"nombre\" size=\"20\" maxlength=\"20\"> "
        . "<span class=\"aviso\">$_SESSION[avisoNombre]</span></p>\n";
    print "\n";
} else {
    print "    <p><strong>Nombre:</strong> <input type=\"text\" name=\"nombre\" size=\"20\" maxlength=\"20\"></p>\n";
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
