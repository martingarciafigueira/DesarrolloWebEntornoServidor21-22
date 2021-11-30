<?php

function division($dividendo, $divisor)
{
    //echo $dividendo/$divisor;

    try {
        echo $dividendo / $divisor;
    } catch (Throwable $th) {
        echo "No se puede introducir un 0 en el denominador. Vuelve a intentarlo";
    }
    finally{
        echo "<br> Yo me muestro de todas formas";
    }
}

division(2, 5);
