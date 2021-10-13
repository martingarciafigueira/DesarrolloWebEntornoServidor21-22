<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 15
  </title>
  <link rel="stylesheet" href="css/style.css" title="Color">
</head>

<body>
  <h1>Ejercicio 15</h1>

  <form action="Ejercicio15_2.php" method="get">
    <p>Indique su dirección de correo: <input type="email" name="correo" size="40"></p>

    <p>Confirme su dirección de correo: <input type="email" name="correo2" size="40"></p>

    <p>Indique si quiere recibir correos nuestros:
      <select name="recibir">
        <option value="-1">...</option>
        <option value="1">Sí</option>
        <option value="0">No</option>
      </select>
    </p>

    <p>
      <input type="submit" value="Enviar">
      <input type="reset" value="Borrar">
    </p>
  </form>
</body>
</html>
