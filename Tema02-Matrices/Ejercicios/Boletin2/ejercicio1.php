<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>
            Ejercicio 1
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css" title="Color">
    </head>
    <body>
        <h1>Ejercicio 1</h1>
        <p>Definición de arrays</p>
        
        <?php
            //Array indexado
            $amigos=array("Antonio","Rosalía","Juan");
            echo "<h2>El tercer amigo es: " . $amigos[2]."</h2>";
            
            //Array asociativo
            $dnisAmigos=array("Antonio"=>"12345678X","Rosalía"=>"11112222X","Juan"=>"99997777X");
            echo "<h2>El DNI de Rosalía es: " . $dnisAmigos['Rosalía']."</h2>";

            // Array de dos dimensiones:
            $cochesAmigos = array
              (
              "Antonio"=>array
              (
              "Fiat 500",
              "Audi A3",
              "Peugeot 208"
              ),
              "Rosalía"=>array
              (
              "Audi TT"
              ),
              "Juan"=>array
              (
              "Jaguar XF",
              "BMW 520d",
              "Seat Ibiza"
              )
              ); 

            echo "<h2>El segundo coche de Juan es un: " . $cochesAmigos['Juan'][1] ."</h2>";
            
        ?>
    </body>
</html>
