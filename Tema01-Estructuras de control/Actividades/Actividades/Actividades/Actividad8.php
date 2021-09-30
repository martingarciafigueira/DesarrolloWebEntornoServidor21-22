<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        $edadCarlos = 18;
        
        print '<h1>Edad Carlos: ' . $edadCarlos . '</h1>';

        switch ($edadCarlos) {
            case 18:
                print 'Carlos acaba de ser mayor de edad<br>';
                break;
            case 40:
                print 'Carlos está en la crisis de los 40. A currar.<br>';
                break;
            case 65:
                print 'Bienvenidos viajes del IMSERSO<br>';
                break;
        }
        ?>
    </body>
</html>
