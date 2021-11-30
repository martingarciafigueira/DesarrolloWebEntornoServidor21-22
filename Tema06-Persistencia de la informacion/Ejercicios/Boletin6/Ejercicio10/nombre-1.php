<?php
session_name("ejercicio10");
session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Nombre (1)
        </title>
    </head>

    <body>
        <h1>Nombre (1)</h1>

        <?php
        if (isset($_SESSION["nombre"])) {
            print "  <p>Usted ya ha escrito que su nombre es: <strong>$_SESSION[nombre]</strong></p>\n";
        }
        ?>

        <form action="nombre-2.php" method="get">
            <p>Escriba su nombre:</p>

            <?php
            if (isset($_SESSION["avisoNombre"])){
                print "    <p><strong>Nombre:</strong> <input type=\"text\" name=\"nombre\" size=\"20\" maxlength=\"20\"> "
                        . "<span class=\"aviso\">$_SESSION[avisoNombre]</span></p>\n";
                print "\n";
            } else {
                print "    <p><strong>Nombre:</strong> <input type=\"text\" name=\"nombre\" size=\"20\" maxlength=\"20\"></p>\n";
                print "\n";
            }
            ?>
            <p>
                <input type="submit" value="Guardar">
                <input type="reset" value="Borrar">
            </p>
        </form>

        <p><a href="index.php">Volver al inicio.</a></p>

    </body>
</html>
