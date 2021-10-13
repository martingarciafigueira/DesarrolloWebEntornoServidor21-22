<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Ejercicio 27
        </title>
        <link rel="stylesheet" href="css/style.css" title="Color">
    </head>

    <body>
        <h1>Ejercicio 27</h1>

        <form action="Ejercicio27_2.php" method="get">
            <p>Escriba su peso en kilogramos y su altura en centímetros para calcular su índice de masa corporal.</p>

            <table>
                <tbody>
                    <tr>
                        <td><strong>Peso:</strong></td>
                        <td><input type="number" name="peso" min="1"> kg</td>
                    </tr>
                    <tr>
                        <td><strong>Altura:</strong></td>
                        <td><input type="number" name="altura" min="1"> cm</td>
                    </tr>
                </tbody>
            </table>

            <p>
                <input type="submit" value="Calcular">
                <input type="reset" value="Borrar">
            </p>
        </form>
    </body>
</html>
