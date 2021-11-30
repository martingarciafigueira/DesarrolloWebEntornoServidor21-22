<?php

session_start();
require_once('funciones.php');

if (!empty($_POST)) {
    if (!empty($_POST['contrasenha2'])) {
        // Nuevo registro
        guarda_usuario($_POST['nombreusuario'], $_POST['contrasenha'], $_POST['contrasenha2']);
    } else if (!empty($_POST['nombreusuario'])) {
        // Log in
        if (verifica_usuario($_POST['nombreusuario'], $_POST['contrasenha'])) {
            $_SESSION['nombre_usuario'] = $_POST['nombreusuario'];

            // Comprobamos si se definió un tiempo de caducidad de la sesión
            if (!empty($_POST['tiempo_caducidad'])) {
                if ($_POST['tiempo_caducidad'] > 0)
                    $_SESSION['tiempo_caducidad'] = $_POST['tiempo_caducidad'];
                else
                    unset($_SESSION['tiempo_caducidad']);
            }
        }
    }
    if (!empty($_POST['logout'])) {
        // Log out
        session_unset();
        session_destroy();
    }
}

header('Location: login.php');
?>