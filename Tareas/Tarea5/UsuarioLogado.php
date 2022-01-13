<?php
include './funciones.php';
if (isset($_COOKIE['PHPSESSID'])) {
    session_start();
} else {
    header('Location: ./Login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Logado</title>
</head>

<body>
    <form action="./Login.php" method="post">
        <input hidden name="cerrarSesion">
        <button type="submit">Cerrar Sesion</button>
    </form>
    <form action="#" method="post">
        <input hidden name="cambiarContrasenha">
        <input type="password" name="oldClave" id="oldClave" placeholder="Contraseña Actual">
        <input type="password" name="newClave" id="newClave" placeholder="Nueva Contraseña">
        <input type="password" name="repetClave" id="repetClave" placeholder="repet Contraseña">
        <button type="submit">Cambiar Contraseña </button>
    </form>
    <?php
    if (isset($_POST['cambiarContrasenha'])) {
        if (password_verify($_POST['oldClave'], $_SESSION['clave']) == FALSE) {
            echo "<h2 style='color:red'>Usuario no encontrado</h2>";
        } elseif (is_bool(verificarContrasenha($_POST['newClave'], $_POST['repetClave'])) == false) {
            echo "<h2 style='color:red'>" . verificarContrasenha($_POST['newClave'], $_POST['repetClave']) . "</h2>";
        } else {
            $has = password_hash($_POST['newClave'], PASSWORD_DEFAULT);
            $_SESSION['clave'] = $has;
            sobreEscribirFichero($_SESSION['usuario'], $has);
            echo "<h2 style='color:green'>Contraseña cambiada</h2>";
        }
    }
    ?>
    <p>Usuario conectado: <?php echo $_SESSION['usuario'] ?></p>
    <p>Duracion: <?php echo $_SESSION['duracion'] ?> </p>
</body>

</html>