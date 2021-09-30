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
        $edadCarlos = 30;
        $edadSandra = 30;
        $edadMarcos = 20;

        print '<h1>Edad Carlos: ' . $edadCarlos . '</h1>';
        print '<h1>Edad Sandra: ' . $edadSandra . '</h1>';
        echo '<h2>Edad Marcos: ' . $edadMarcos . '</h2>';

        for ($edadCarlos = 1; $edadCarlos <=65; $edadCarlos++)
        {
            print '<h1>Edad Carlos: ' . $edadCarlos . '</h1>';
            echo '<br>';
        }
            
        ?>
    </body>
</html>
