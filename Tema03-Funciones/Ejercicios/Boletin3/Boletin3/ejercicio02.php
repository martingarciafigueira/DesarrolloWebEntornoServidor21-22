<!DOCTYPE html>
<!-
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <?php

        function sumaNumeros($numeros) {
            $suma = 0;
            echo "<p>Los números que se van a sumar son: ". implode(",",$numeros) ."</p>\n";
            foreach ($numeros as $value) {
                $suma += $value;
            }
            return $suma;
        }

        if (isset($_REQUEST['numero'])) {
            $numeros = explode(',', $_REQUEST['numero']);
            if (count($numeros) == 5) {
                echo "<p>La suma es:".sumaNumeros($numeros)."</p>\n";
                echo "<br />\n";
            } else {
                echo "<p>Debes introducir 5 números.</p>";
            }
            echo "<p><a href=\"ejercicio2.php\">Volver al formulario</a></p>\n";
        } else {
        ?>
        <form action="" method="get">
            <p>Numero: <input type="text" name="numero" /></p>
            <p><input type="submit" value="Enviar" /></p>
        </form>
        <?php } ?>
    </body>
</html>
