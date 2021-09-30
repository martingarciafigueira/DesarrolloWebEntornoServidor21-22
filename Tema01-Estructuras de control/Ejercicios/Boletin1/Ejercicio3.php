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
            $suma = 0;
            for ($i = 1; $i <=50; $i++)
            {
                $suma += $i;
            }
            echo 'LA SUMA ES: '.$suma;
        ?>
    </body>
</html>