<?php
session_name("ejercicio4");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 5
  </title>
</head>

<body>
  <h1>Ejercicio 5</h1>

<?php
// Si hay un texto guardado en la sesión, se muestra
if (isset($_SESSION["texto"])) {
    print "  <p>El texto es: <strong>$_SESSION[texto]</strong>.</p>\n";
    print "\n";
}
?>

  <form action="ejercicio5_b.php" method="get">
    <p><label>Escriba texto: <input type="text" name="texto" size="20" maxlength="20"></label></p>

    <p>
      <input type="submit" value="Siguiente">
      <input type="reset" value="Borrar">
    </p>
  </form>
</body>
</html>
