<?php

if (isset($_COOKIE['numerovisita'])) {
    $numerovisita = $_COOKIE['numerovisita'];
    $numerovisita++;
    setcookie('numerovisita', $numerovisita, time() + 3600);
    echo "Esta es tu ".$numerovisita." visita!";
}
else{
    setcookie('numerovisita', 0, time() + 3600);
    echo "Es tu primera visita!";
}