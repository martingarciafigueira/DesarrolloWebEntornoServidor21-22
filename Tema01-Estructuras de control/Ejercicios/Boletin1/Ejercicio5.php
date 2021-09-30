<html>
    <head>
        <meta charset="UTF-8">
        <title> Práctica</title>
    </head>
    <body>
        <h1>Convertidor de divisas - Resultado</h1>
        <?php
        $cantidad = (isset($_REQUEST['cantidad'])) ? $_REQUEST['cantidad'] : "";
        $origen = (isset($_REQUEST['origen'])) ? $_REQUEST['origen'] : "";
        $destino = (isset($_REQUEST['destino'])) ? $_REQUEST['destino'] : "";
        $cantidadOk = false;
        $origenOk = false;
        $destinoOk = false;
        $maximo = 1000000;
        if ($cantidad == "") {
            print "<p class=\"error\">No ha escrito la cantidad de dinero.</p>\n";
        } elseif (!is_numeric($cantidad)) {
            print "<p class=\"error\">No ha escrito la cantidad de dinero como número.</p>\n";
        } elseif (!ctype_digit($cantidad)) {
            print "<p class=\"error\">No ha escrito la cantidad de dinero "
                    . " como número entero positivo.</p>\n";
        } elseif ($cantidad >= $maximo) {
            print "<p class=\"error\">La cantidad de dinero no es inferior a "
                    . number_format($maximo, 0, ",", ".") . ".</p>\n";
        } else {
            $cantidadOk = true;
        }
        if ($origen != "EUR" && $origen != "USD" && $origen != "GBP" && $origen != "JPY" && $origen != "ESP") {
            print " <p class=\"error\">No ha escrito correctamente la moneda de origen.</p>\n";
        } else {
            $origenOk = true;
        }
        if ($destino != "EUR" && $destino != "USD" && $destino != "GBP" && $destino != "JPY" && $destino != "ESP") {
            print " <p class=\"error\">No ha escrito correctamente la moneda de destino.</p>\n";
        } else {
            $destinoOk = true;
        }
        if ($cantidadOk && $origenOk && $destinoOk) {
            $factor = array(
                "EUR" => 1,
                "USD" => 1.31481,
                "GBP" => 0.89807,
                "JPY" => 132.113,
                "ESP" => 166.366
            );
            $nombreMoneda = array(
                "EUR" => "euros",
                "USD" => "dólares USA",
                "GBP" => "libras esterlinas",
                "JPY" => "yenes japoneses",
                "ESP" => "antiguas pesetas españolas");
            $result = round($cantidad / $factor[$origen] * $factor[$destino], 2);
            print "<p>" . number_format($cantidad, 0, ",", ".") . " $nombreMoneda[$origen] "
                    . "son " . number_format($result, 1, ",", ".") . " $nombreMoneda[$destino].</p>\n";
            print "<p>Gracias por utilizar este convertidor.</p>\n";
        }
        print "<p><a href=\"Ejercicio5.html\">Volver al formulario.</a></p>\n";
        ?>
    </body>
</html>