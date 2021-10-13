<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 25
  </title>
  <link rel="stylesheet" href="css/style.css" title="Color">
</head>

<body>
  <h1>Ejercicio 25</h1>

  <form action="Ejercicio26_2.php" method="get">
    <p>Escriba un número (0 &lt; número &le; 100) y mostraré la tabla de
      multiplicar hasta ese número.</p>

    <table>
      <tbody>
        <tr>
          <td><strong>Número:</strong></td>
          <td><input type="number" name="numero" min="1" max="100" value="10"></td>
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
