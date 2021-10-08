<!DOCTYPE html>
<!-
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 7</title>
    </head>
    <body>
        <?php

        function convertir_cadena($cadena) {
            $letra = substr($cadena, 0, 1);
            $letraMayuscula = strtoupper($letra);
            $resto = substr($cadena, 1);
            $cadenaMinuscula = strtolower($resto);
            $cadenaFinal = $letraMayuscula . $cadenaMinuscula;
            return $cadenaFinal;
        }

        if (isset($_REQUEST['cadena'])) {
            $cadena = $_REQUEST['cadena'];
            if (is_string($cadena)) {
                echo "<p>La cadena es: ".$cadena."</p>\n";
                echo "<p>La cadena con la primera letra en mayúsculas y el resto en minúsculas es: " .convertir_cadena($cadena)."</p>\n";
                echo "<br />\n";
            } else {
                echo "<p>Debes introducir una cadena.</p>";
            }
            echo "<p><a href=\"ejercicio7.php\">Volver al formulario</a></p>\n";
        } else {
            ?>
            <form action="" method="get">
                <p>Introduzca una cadena: <input type="text" name="cadena" /></p>
                <p><input type="submit" value="Enviar" /></p>
            </form>
<?php } ?>
    </body>
</html>
