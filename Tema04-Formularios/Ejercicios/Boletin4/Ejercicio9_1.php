<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Ejercicio 9
        </title>
        <link rel="stylesheet" href="css/style.css" title="Color">
    </head>

    <body>
        <h1>Ejercicio 9</h1>


        <form action="Ejercicio9_2.php" method="get">
            <p>Elija los colores a cambiar:<br>
                <label><input type="checkbox" name="fondo" value="hsl(103, 100%, 90%)"> Color del fondo de la página</label><br>
                <label><input type="checkbox" name="letra" value="hsl(103, 100%, 30%)"> Color de la letra de la página</label>
            </p>

            <p>
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar">
            </p>
        </form>
    </body>
</html>
