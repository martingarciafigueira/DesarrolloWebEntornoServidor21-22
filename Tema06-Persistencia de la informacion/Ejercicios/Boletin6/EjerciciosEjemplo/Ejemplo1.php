<?php

if (isset($_COOKIE['visita'])) {
    echo "Bienvenido otra vez!";
}
else{
    setcookie('visita', 'ok', time() + 3600);
    echo "Bienvenido por primera vez!";
}