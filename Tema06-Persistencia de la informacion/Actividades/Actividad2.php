<?php

if (isset($_COOKIE['fechaultimavisita'])) {
    $date1 = new DateTime($_COOKIE['fechaultimavisita']);
    $date2 = new DateTime(date('Y-m-d H:i:s'));
    $diff = $date1->diff($date2);
    echo "Hola de nuevo! Tu última visita fue hace: ".$diff->days . ' días ';
} else {
    $fechavisita = date('Y-m-d H:i:s');
    setcookie('fechaultimavisita', $fechavisita, time() + 3600);
    echo "Bienvenido por primera vez!";
}