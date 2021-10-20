<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 17
  </title>
  <link rel="stylesheet" href="css/style.css" title="Color">
</head>

<body>
  <h1>Ejercicio 17</h1>

  <form action="Ejercicio17_2.php" method="get">
    <p>Tamaño de la figura: <input type="number" name="lado" min="20" max="500" value="50"></p>

    <p>Forma de la figura:
      <label><input type="radio" name="forma" value="cuadrado">Cuadrado</label>
      <label><input type="radio" name="forma" value="circulo">Círculo </label>
    </p>

    <p>
      <input type="submit" value="Enviar">
      <input type="reset" value="Borrar">
    </p>
  </form>
</body>
</html>
