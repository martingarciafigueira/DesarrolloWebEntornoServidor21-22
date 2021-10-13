<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 18
  </title>
  <link rel="stylesheet" href="css/style.css" title="Color">
</head>

<body>
  <h1>Ejercicio 18</h1>

  <form action="Ejercicio18_2.php" method="get">

    <table>
      <tbody>
        <tr>
          <td>Tamaño de la figura:</td>
          <td><input type="number" name="lado" min="20" max="500" value="200"></td>
        </tr>
        <tr>
          <td>Color inicial:</td>
          <td><input type="color" name="inicial" value="#ffffff"></td>
        </tr>
        <tr>
          <td>Color final:</td>
          <td><input type="color" name="final" value="#000000"></td>
        </tr>
      </tbody>
    </table>

    <p>
      <input type="submit" value="Enviar">
      <input type="reset" value="Borrar">
    </p>
  </form>
</body>
</html>
