<!DOCTYPE html>
<!--
Escribe un programa en PHP con un formulario para que el usuario pueda
introducir una cadena de caracteres. Invoque una función void Convertir_Mayusculas() 
que reciba por referencia la cadena y la convierta a mayúsculas. 
Debe mostrar la cadena antes y después de entrar en la función
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title> TAREA 2 - EJERCICIO 2 - OSCAR ALVAREZ ALVAREZ </title>
    </head>
    <body>
        <?php
        
        $cadena = isset($_POST['cadena']) ? $_POST['cadena'] : '';;
        
        function convertir_Mayusculas(&$cadena)
        {
            return mb_strtoupper($cadena, "utf-8");
             /* mb_strtoupper($cadena, $codificacion), a diferencia de strtoupper($cadena), 
             funciona también con la letra ñ y las tildes */
        }
        
        echo 'Cadena de caracteres sin entrar en la función: '. $cadena . '</br>';
        echo 'Cadena de caracteres al salir de la función: '. convertir_Mayusculas($cadena);
        
        print "<p><a href=\"ejercicio2.html\">Volver al formulario.</a></p>\n";
        ?>
    </body>
</html>
