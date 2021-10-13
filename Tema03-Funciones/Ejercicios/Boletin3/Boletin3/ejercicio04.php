<!DOCTYPE html>
<!-
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 4</title>
    </head>
    <body>
        <?php

        function imprimeMultiplos($num, $multiplo) {
            echo "<p>Múltiplos de $multiplo menores que $num:</p>\n";
            for ($i = 1; $i < $num; $i++) {
                if ($i % $multiplo == 0) {
                    echo "$i ";
                }
            }
            echo "<br />\n";
        }

        if (isset($_REQUEST['numero'])) {
            $numero = $_REQUEST['numero'];
            if (is_numeric($numero)) {
                imprimeMultiplos($numero, 2);
                imprimeMultiplos($numero, 3);
                imprimeMultiplos($numero, 4);
            } else {
                echo "<p>Debes introducir un valor numérico.</p>";
            }
            echo "<p><a href=\"ejercicio4.php\">Volver al formulario</a></p>\n";
        } else {
        ?>
        <form action="" method="get">
            <p>Numero: <input type="text" name="numero" /></p>
            <p><input type="submit" value="Enviar" /></p>
        </form>
        <?php } ?>
    </body>
</html>
