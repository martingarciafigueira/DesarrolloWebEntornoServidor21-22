<?php

if (!empty($_POST)) {

    if (!empty($_POST['usuario'])) {
        echo $_POST['usuario'] . "<br>";
    }
    if (!empty($_POST['password'])) {
        echo $_POST['password'] . "<br>";
    }

    echo $_FILES['fichero']['name'] . "<br>";
    echo $_FILES['fichero']['size'] . "<br>";

    echo $_FILES['imagen']['name'] . "<br>";
    echo $_FILES['imagen']['size'] . "<br>";
}


