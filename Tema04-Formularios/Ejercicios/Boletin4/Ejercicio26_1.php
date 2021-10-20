<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Ejercicio 26
  </title>
  <link rel="stylesheet" href="css/style.css" title="Color">
</head>

<body>
  <h1>Ejercicio 26</h1>

  <form action="Ejercicio26_2.php" method="get">
    <p>Escriba un número de jugadores (3 &lt; número &le; 10) y repartiré tres
    cartas a cada jugador.</p>

    <table>
      <tbody>
        <tr>
          <td><strong>Número de jugadores:</strong></td>
          <td><input type="number" name="jugadores" min="3" max="10" value="6"> </td>
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
