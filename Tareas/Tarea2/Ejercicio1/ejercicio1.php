<!DOCTYPE html>
<!--
Escribe una función PHP Ejecuta_Operacion() que reciba varios parámetros:
a. Numero: Número entero sobre el que se va a operar
b. Operacion: Caracter con la operación que se va a realizar

Las operaciones que existirán serán:
a. Operación A: Calcular el cuadrado del número (1 punto)
b. Operación B: Calcular si el número es un número primo.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> TAREA 2 - EJERCICIO 1 - OSCAR ALVAREZ ALVAREZ </title>
    </head>
    <body>
        <?php
        
        $numero = isset($_POST['numero']) ? $_POST['numero'] : '';;
        $operacion = isset($_POST['operacion']) ? $_POST['operacion'] : '';;
        
        function ejecutaOperacion($numero, $operacion) 
        {
            if($operacion=="a")
            {
                $resultado = $numero * $numero;
                return 'El cuadrado de '. $numero .' es '. $resultado;
            }
            
            if($operacion=="b")
            {
                $primo=0;
                for($i = 1;$i < $numero; $i++)
                {
                    if($numero % $i == 0) $primo++;
                }
                
                if($primo >= 2 ) return 'El '. $numero .' no es un numero primo';
                else return 'El '. $numero .' es un numero primo';
            }
        }
        
        echo ejecutaOperacion($numero, $operacion);
        print "<p><a href=\"ejercicio1.html\">Volver al formulario.</a></p>\n";
        
        ?>
    </body>
</html>
