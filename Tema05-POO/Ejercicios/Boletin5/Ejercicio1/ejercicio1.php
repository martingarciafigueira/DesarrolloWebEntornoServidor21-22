<!DOCTYPE html>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Uso de propiedades y métodos estáticos</title>
        <?php require_once("ejercicio1_data.php"); ?>
    </head>
    <body>
        <?php
          echo "Usamos el calendario: ". Data::getCalendario()."<br />";
          echo Data::getDataHora();
        ?>
    </body>
</html>
