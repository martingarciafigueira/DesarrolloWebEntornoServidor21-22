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
        for ($i = 1; $i <= 10; $i++) {
            print '<h1>' . $i . '</h1>';
            echo '<br>';
            if ($i == 8) {
                break;
            }
        }
        ?>
    </body>
</html>
