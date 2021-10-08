<!DOCTYPE html>
<!-
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 11</title>
    </head>

    <body>
        <h1>Convertidor de distancias</h1>

        <form action="ejercicio11-2.php" method="get">
            <p>
                Quiero convertir:
                <input type="number" name="numero" size="40">
                <select name="inicial">
                    <option value="km">km</option>
                    <option value="m">m</option>
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                </select>
                a
                <select name="final">
                    <option value="km">km</option>
                    <option value="m" selected>m</option>
                    <option value="cm">cm</option>
                    <option value="mm">mm</option>
                </select>
            </p>

            <p>
                <input type="submit" value="Convertir">
                <input type="reset" value="Borrar">
            </p>
        </form>
    </body>
</html>
