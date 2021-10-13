<!DOCTYPE html>
<!-
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 12</title>
    </head>
    <body>

        <?php

        function recoge($var) {
            $tmp = (isset($_REQUEST[$var])) ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8")) : "";
            return $tmp;
        }

        $unidades = ["km", "m", "cm", "mm", "milla", "yarda", "pie", "pulgada"];

        $numero = recoge("numero");
        $inicial = recoge("inicial");
        $final = recoge("final");

        $numeroOk = false;
        $inicialOk = false;
        $finalOk = false;

        if ($numero == "") {
            print "  <p class=\"aviso\">No ha escrito nada.</p>\n";
            print "\n";
        } elseif (!is_numeric($numero)) {
            print "  <p class=\"aviso\">No ha escrito un número.</p>\n";
            print "\n";
        } else {
            $numeroOk = true;
        }

        if (!in_array($inicial, $unidades)) {
            print "  <p class=\"aviso\">No ha elegido una unidad inicial válida.</p>\n";
            print "\n";
        } else {
            $inicialOk = true;
        }

        if (!in_array($final, $unidades)) {
            print "  <p class=\"aviso\">No ha elegido una unidad final válida.</p>\n";
            print "\n";
        } else {
            $finalOk = true;
        }

        if ($numeroOk && $inicialOk && $finalOk) {
            // La unidad intermedia es el metro
            $numeroIntermedio = 0;
            if ($inicial == "km") {
                $numeroIntermedio = $numero * 1000;
            } elseif ($inicial == "m") {
                $numeroIntermedio = $numero;
            } elseif ($inicial == "cm") {
                $numeroIntermedio = $numero / 100;
            } elseif ($inicial == "mm") {
                $numeroIntermedio = $numero / 1000;
            } elseif ($inicial == "milla") {
                $numeroIntermedio = $numero * 1609;
            } elseif ($inicial == "yarda") {
                $numeroIntermedio = $numero / 1.09361;
            } elseif ($inicial == "pie") {
                $numeroIntermedio = $numero / 3.28084;
            } elseif ($inicial == "pulgada") {
                $numeroIntermedio = $numero / 39.3701;
            }

            if ($final == "km") {
                $numeroFinal = $numeroIntermedio / 1000;
            } elseif ($final == "m") {
                $numeroFinal = $numeroIntermedio;
            } elseif ($final == "cm") {
                $numeroFinal = $numeroIntermedio * 100;
            } elseif ($final == "mm") {
                $numeroFinal = $numeroIntermedio * 1000;
            } elseif ($final == "milla") {
                $numeroFinal = $numeroIntermedio / 1609;
            } elseif ($final == "yarda") {
                $numeroFinal = $numeroIntermedio * 1.09361;
            } elseif ($final == "pie") {
                $numeroFinal = $numeroIntermedio * 3.28084;
            } elseif ($final == "pulgada") {
                $numeroFinal = $numeroIntermedio * 39.3701;
            }


            $resultado = round($numeroFinal);
            print "  <p>$numero $inicial = $resultado $final.</p>\n";
            print "\n";
        }
        ?>
        <p><a href="ejercicio12-1.php">Volver al formulario.</a></p>
    </body>
</html>
