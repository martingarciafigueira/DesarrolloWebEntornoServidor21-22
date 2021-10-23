<?php

if (!empty($_POST)) {

    if (!empty($_POST['usuario'])) {
        echo $_POST['usuario'] . "<br>";
    }
    else
    {
        echo "Ha habido un error";
    }

    echo $_POST['password'] . "<br>";
}
