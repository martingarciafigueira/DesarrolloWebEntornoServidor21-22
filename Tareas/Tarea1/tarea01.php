<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 01</title>
</head>
<body>
    <header>
        <h1>Ejercicios de la Tarea 01</h1>
    </header>
    <main>
        <h3>Ejercicio 1.1</h3>
        <article>
            <?php
                $min=0;
                $max=10;
                $notas = array ("Diseño de Interfaces" => rand($min,$max), "DW Servidor" => rand($min,$max), "DW Cliente" => rand($min,$max), "Desplieque aplicaciones" => rand($min,$max), "Proyecto" => rand($min,$max));
                $notaMayor=0;       //valor mínimo posible de nota más alta
                $notaMenor=10;      //valor máximo posible para la menor nota
                foreach ($notas as $asignatura => $nota){
                    $notaMedia+=$nota;                      //suma cada nota para después obtener la media
                    if ($nota>$notaMayor){         //actualiza la nota mayor si la supera este valor
                        $notaMayor=$nota;
                    }
                    else if($nota<$notaMenor){         //actualiza la nota menor si este valor es más bajo
                        $notaMenor=$nota;
                    }
                }
                $notaMedia=$notaMedia/count($notas);  //temina el cálculo de la media
            ?>
            <table>
                <thead>
                    <th>Asignatura</th>
                    <th>Nota</th>
                </thead>
                <tbody>
                    <?php foreach($notas as $asignatura=>$nota): ?>
                    <tr>
                        <td><?= $asignatura; ?></td>
                        <td><?= $nota; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Nota Media</td>
                        <td><?= $notaMedia; ?></td>
                    </tr>
                    <tr>
                        <td>Mejor nota</td>
                        <td><?= $notaMayor; ?></td>
                    </tr>
                    <tr>
                        <td>Peor nota</td>
                        <td><?= $notaMenor; ?></td>
                    </tr>
                </tfoot>
            </table>

        </article>  
        <h3>Ejercicio 1.2</h3>
        <article>
            <?php
                $semana = array("lunes", "martes", "miércoles", "jueves", "viernes");
                $diaInv=count($semana)-1;       //asigna la última posición de la matriz $semana
                foreach ($semana as $dia) {     //recorre $semana desde la posición 0 y $semanaInversa desde el final
                    $semanaInversa[$diaInv]=$dia; 
                    $diaInv--;              //decrece variable para recorrer la matriz de manera inversa
                }
            ?>
            <table>
                <tr>
                    <td>Semana normal:</td>
                    <?php for($i=0; $i<count($semana); $i++): ?>
                    <td><?= $semana[$i]; ?></td>
                    <?php endfor; ?>
                </tr>
                <tr>
                    <td>Semana inversa:</td>
                    <?php for($i=0; $i<count($semanaInversa); $i++): ?>
                    <td><?= $semanaInversa[$i]; ?></td>
                    <?php endfor; ?>
                </tr>
            </table>
        </article>
        <h3>Ejercicio 1.3</h3>
        <article>
            <?php
                $tamanoMatriz=10;
                $min=0;
                $max=99;
                for ($i=0; $i <$tamanoMatriz ; $i++) {
                    $numeros[$i]=rand($min, $max);      // va asignando valores aleatorios a cada posición según parámetros
                }
                sort($numeros);     //ordena la matriz
            ?>        
            <table>
                <tr>
                    <td>Matriz aleatoria ordenada:</td>
                    <?php foreach($numeros as $numero): ?>
                    <td><?= $numero; ?></td>
                    <?php endforeach; ?>
                </tr>    
            </table>
        </article>
        <h3>Ejercicio 1.4</h3>
        <article>
            <p>Conductores y sus kms:</p>
            <div>
            <?php    
                $nombres = array("Jose", "Manuel", "Rosa", "Miguel");
                $minKmDia = 0;
                $maxKmDia = 1200;
                $diasSemana = 5;
                foreach ($nombres as $nombre) { // crea matriz $kms con los nombres como clave y una matriz de kms aleatorios en cada posición
                    for ($i=0; $i < $diasSemana; $i++) { 
                        $kms[$nombre][] = (rand($minKmDia,$maxKmDia));
                    }                    
                }
                foreach ($kms as $conductor => $kms) {
                    $kmTotal=0;
                    foreach ($kms as $dia => $kmDia) {
                        $kmTotal+=$kmDia;   //suma el total de kms de cada día por cada conductor, reiniciando a 0 cuando cambia de conductor
                    }
                    $totalKms[] = array ($conductor, $kmTotal); // $totalKms es una matriz de matrices, con un nombre y el total de kms en cada posición
                }
                foreach ($totalKms as $fichaConductor) {
                    foreach ($fichaConductor as $dato) {
                        echo $dato . " ";
                    }
                    echo " kms<br>";
                }
            ?>
            </div>
        </article>
        <h3>Ejercicio 1.5</h3>
        <article>
                <?php
                    $numeros = array (1,2,3,4,5,6,7,10,11,12);
                    $palos = array ("oros", "bastos", "espadas", "copas");
                    foreach ($palos as $palo) {
                        foreach ($numeros as $numero) {
                            $baraja[] = array ($palo, $numero); // guarda en cada posición una matriz con dos posiciones: un palo y un número
                        }
                    }
                    echo ("Baraja creada:<br><br>| ");
                    foreach ($baraja as $carta) {
                        foreach ($carta as $valor) {
                            echo ($valor . " ");
                        }
                        echo("| ");
                    }
                    echo "<br><br>";
                    shuffle($baraja);      //desordena la matriz
                    echo ("Baraja desordenada:<br><br>| ");
                    foreach ($baraja as $carta) {
                        foreach ($carta as $valor) {
                            echo ($valor . " ");
                        }
                        echo("| ");
                    }
                    echo "<br><br>";
                    sort($baraja);      //ordena la matriz
                    echo ("Baraja ordenada:<br><br>| ");
                    foreach ($baraja as $carta) {
                        foreach ($carta as $valor) {
                            echo ($valor . " ");
                        }
                        echo("| ");
                    }
                ?>
        </article>
    </main>
</body>
</html>

