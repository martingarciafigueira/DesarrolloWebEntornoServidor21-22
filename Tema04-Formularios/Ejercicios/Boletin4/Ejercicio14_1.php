<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Ejercicio 14
        </title>
        <link rel="stylesheet" href="css/style.css" title="Color">
    </head>

    <body>
        <h1>Ejercicio 14</h1>

        <form action="Ejercicio14_2.php" method="get">
            <p>Indique su sexo y aficiones:</p>

            <p><strong>Sexo:</strong>
                <label><input type="radio" name="genero" value="hombre">Hombre</label>
                <label><input type="radio" name="genero" value="mujer">Mujer</label></p>

            <p><strong>Aficiones:</strong>
                <label><input type="checkbox" name="cine">Cine</label>
                <label><input type="checkbox" name="literatura">Literatura</label>
                <label><input type="checkbox" name="musica">Música</label>
            </p>

            <p>
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar">
            </p>
        </form>
    </body>
</html>
