<!DOCTYPE html>
<!-
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 8</title>
    </head>
    <body>
        <?php

        function cuenta_letras_e($cadena) {
            $numeroletrasE = substr_count($cadena, 'e');
            return $numeroletrasE;
        }

        if (isset($_REQUEST['cadena'])) {
            $cadena = $_REQUEST['cadena'];
            if (is_string($cadena)) {
                echo "<p>La cadena es: ".$cadena."</p>\n";
                echo "<p>Esta cadena tiene " .cuenta_letras_e($cadena)." letras 'e' </p>\n";
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
