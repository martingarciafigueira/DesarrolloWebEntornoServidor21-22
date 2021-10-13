<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 20
  </title>
  <link rel="stylesheet" href="css/style.css" title="Color">
</head>

<body>
  <h1>Ejercicio 20</h1>

  <form action="Ejercicio20_2.php" method="get">
    <p>Escriba un número de pies y pulgadas para convertir a centímetros.</p>

    <table>
      <tbody>
        <tr>
          <td><strong>Pies:</strong></td>
          <td><input type="number" name="pies" min="0"> </td>
        </tr>
        <tr>
          <td><strong>Pulgadas:</strong></td>
          <td><input type="number" name="pulgadas" min="0" step="any"> </td>
        </tr>
      </tbody>
    </table>

    <p>
      <input type="submit" value="Convertir">
      <input type="reset" value="Borrar">
    </p>
  </form>
</body>
</html>
