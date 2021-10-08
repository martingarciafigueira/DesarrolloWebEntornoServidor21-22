<!DOCTYPE html>
<!-
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <?php

        function contadorMayusculas($cadena) {
            //Convierto la cadena entera a minúsculas
            $lowerCase = mb_strtolower($cadena);
            //Descarto aquellas letras que son minúsculas, siendo el resto mayúsculas
            return strlen($lowerCase) - similar_text($cadena, $lowerCase);
        }

        if (isset($_REQUEST['cadena'])) {
            $cadena = $_REQUEST['cadena'];
            if (is_string($cadena)) {
                echo "<p>La cadena es: " . $cadena . "</p>\n";
                echo "<p>Esta cadena tiene " . contadorMayusculas($cadena) . " letras mayúsculas </p>\n";
                echo "<br />\n";
            } else {
                echo "<p>Debes introducir una cadena.</p>";
            }
            echo "<p><a href=\"ejercicio9.php\">Volver al formulario</a></p>\n";
        } else {
            ?>
            <form action="" method="get">
                <p>Introduzca una cadena: <input type="text" name="cadena" /></p>
                <p><input type="submit" value="Enviar" /></p>
            </form>
<?php } ?>
    </body>
</html>
