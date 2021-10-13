<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 23
  </title>
  <link rel="stylesheet" href="css/style.css" title="Color">
</head>

<body>
  <h1>Ejercicio 23</h1>

  <form action="Ejercicio23_2.php" method="get">
        <p>Escriba una temperatura en grados Celsius o Fahrenheit (-273.15 &le; Celsius &lt; 10.000;
      -459.67 &le; Fahrenheit &lt; 10.000) para convertila a la otra unidad (Fahrenheit o Celsius).</p>

    <table>
      <tbody>
        <tr>
          <td><strong>Temperatura:</strong></td>
          <td>
            <input type="number" name="temperatura" min="-500" max="10000" step="any">
            <select name="unidad">
              <option value="c" selected>Celsius</option>
              <option value="f">Fahrenheit</option>
            </select>
          </td>
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
