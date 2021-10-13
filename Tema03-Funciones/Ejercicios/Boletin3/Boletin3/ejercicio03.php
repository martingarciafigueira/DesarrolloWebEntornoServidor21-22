<!DOCTYPE html>
<!-
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        <?php

        define('numeroPi', 3.1416);

        function calculaVolumen($radioBase, $alturaCilindro) {
            $volumenCilindro = 0;
            echo "<p>El radio de la base es: ".$radioBase."</p>\n";
            echo "<p>La altura del cilindro es: ".$alturaCilindro."</p>\n";
            
            $volumenCilindro = numeroPi * $radioBase * $radioBase * $alturaCilindro;
            return $volumenCilindro;
        }

        if (isset($_REQUEST['radio']) && isset($_REQUEST['altura'])) {
            $radio = $_REQUEST['radio'];
            $altura = $_REQUEST['altura'];
            if (is_numeric($radio) && is_numeric($altura)) {
                echo "<p>El volumen del cilindro es: ".calculaVolumen($radio, $altura)."</p>\n";
            } else {
                echo "<p>Debes introducir números</p>";
            }
            echo "<p><a href=\"ejercicio3.php\">Volver al formulario</a></p>\n";
        } else {
        ?>
        <form action="" method="get">
            <p>Radio de la base: <input type="text" name="radio" /></p>
            <p>Altura del cilindro: <input type="text" name="altura" /></p>
            <p><input type="submit" value="Enviar" /></p>
        </form>
        <?php } ?>
    </body>
</html>
