<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 24
  </title>
  <link rel="stylesheet" href="css/style.css" title="Color">
</head>

<body>
  <h1>Ejercicio 24</h1>

  <form action="Ejercicio24_2.php" method="get">
    <p>Escriba un número (0 &lt; número &le; 200) y mostraré una tabla de una columna
      y tantas filas como indique.</p>

    <table>
      <tbody>
        <tr>
          <td><strong>Número de filas:</strong></td>
          <td><input type="number" name="filas" min="1" max="200" value="10"> </td>
        </tr>
      </tbody>
    </table>

    <p>
      <input type="submit" value="Mostrar">
      <input type="reset" value="Borrar">
    </p>
  </form>
</body>
</html>
