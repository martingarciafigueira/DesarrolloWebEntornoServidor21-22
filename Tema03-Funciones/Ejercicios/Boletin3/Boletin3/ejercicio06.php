<!DOCTYPE html>
<!-
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 6</title>
    </head>
    <body>
        <?php

        function corregir_primera_letra($cadena) {
            $letra = substr($cadena, 0, 1);
            $letra = strtoupper($letra);
            $resto = substr($cadena, 1);
            $cadena_corregida = $letra . $resto;
            return $cadena_corregida;
        }

        if (isset($_REQUEST['cadena'])) {
            $cadena = $_REQUEST['cadena'];
            if (is_string($cadena)) {
                echo "<p>La cadena es: ".$cadena."</p>\n";
                echo "<p>La cadena corregida es: " .corregir_primera_letra($cadena)."</p>\n";
                echo "<br />\n";
            } else {
                echo "<p>Debes introducir una cadena.</p>";
            }
            echo "<p><a href=\"ejercicio6.php\">Volver al formulario</a></p>\n";
        } else {
            ?>
            <form action="" method="get">
                <p>Introduzca una cadena: <input type="text" name="cadena" /></p>
                <p><input type="submit" value="Enviar" /></p>
            </form>
<?php } ?>
    </body>
</html>
