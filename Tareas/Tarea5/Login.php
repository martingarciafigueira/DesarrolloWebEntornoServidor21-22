<?php
if (isset($_POST['cerrarSesion'])) {
    session_start();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    session_destroy();
} elseif (isset($_COOKIE['PHPSESSID'])) {
    header("Location: ./UsuarioLogado.php");
}
?>

<!doctype html>
<html lang="es">

<head>
    <title>Log-in</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Registro -->
            <div class="card col" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Registro</h5>
                    <form action="#" method="POST">

                        <input type="text" name="registro" id="registro" hidden>

                        <div class="mb-3">
                            <label for="regNombre" class="form-label">Nombre</label>
                            <input type="nombre" class="form-control" id="nombre" name="nombre">
                        </div>

                        <div class="mb-3">
                            <label for="regClave" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="clave" name="clave">
                        </div>

                        <div class="mb-3">
                            <label for="repetClave" class="form-label">Repetir contraseña</label>
                            <input type="password" class="form-control" id="repetClave" name="repetClave">

                        </div>
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                    </form>
                </div>
            </div>
            <!-- Log In -->
            <div class="card col" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Inicio de sesion</h5>

                    <form action="#" method="POST" name="Log-ing">

                        <input type="text" name="login" id="login" hidden>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="nombre" class="form-control" id="nombre" name="nombre">
                        </div>

                        <div class="mb-3">
                            <label for="clave" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="clave" name="clave">
                        </div>

                        <div class="mb-3">
                            <p> <input type="checkbox" name="mantenerSesion" id="mantenerSesion">Mantener Sesion iniciada</p>
                        </div>
                        <div class="mb-3">
                            <input type="number" name="tiempoDeSesion" id="tiempoDeSesion" placeholder="Indica temp sesion">
                        </div>
                        <button type="submit" class="btn btn-success" name="manternerSesion" id="mantenerSesion">Iniciar sesion</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include './funciones.php';

    if (!empty($_POST)) {
        if (isset($_POST['registro'])) {
            if (is_bool(verificarNombre($_POST['nombre'])) == false || is_bool(verificarContrasenha($_POST['clave'], $_POST['repetClave'])) == false) {
                if (is_string(verificarNombre($_POST['nombre']))) {
                    echo "<h2 style='color:red'>" . verificarNombre($_POST['nombre']) . "</h2>";
                }

                if (is_string(verificarContrasenha($_POST['clave'], $_POST['repetClave']))) {
                    echo "<h2 style='color:red'>" . verificarContrasenha($_POST['clave'], $_POST['repetClave']) . "</h2>";
                }
            } else {
                $clave = $_POST['clave'];
                escribirArchivo($_POST['nombre'], password_hash($clave, PASSWORD_DEFAULT));
                echo "<h2 style='color:green'>Usuario Agregado</h2>";
            }
        }

        if (isset($_POST['login'])) {
            if ($_POST['nombre'] != null) {
                if (buscarUsuario($_POST['nombre'])[0]) {
                    if (password_verify($_POST['clave'], explode("\n", explode("|", buscarUsuario($_POST['nombre'])[1])[1])[0])) {
                        if (isset($_POST['mantenerSesion'])) {
                            session_set_cookie_params(999999999999);
                            session_start();
                            $_SESSION['duracion'] = 'Mucho tiempo';
                        } elseif ($_POST['tiempoDeSesion'] != null) {
                            session_set_cookie_params($_POST['tiempoDeSesion']);
                            session_start();
                            $_SESSION['duracion'] = $_POST['tiempoDeSesion'] . 'sec';
                        } else {
                            session_start();
                            $_SESSION['duracion'] = 'Dura la sesion del navegador';
                        }

                        $_SESSION['usuario'] = $_POST['nombre'];
                        $_SESSION['clave'] = explode("\n", explode("|", buscarUsuario($_POST['nombre'])[1])[1])[0];
                        header("Location: ./UsuarioLogado.php");
                    } else {
                        echo "<h2 style='color:red'>La contraseña no coincide con el registro</h2>";
                    }
                } else {
                    echo "<h2 style='color:red'>Usuario no encontrado</h2>";
                }
            }
        }
    }

    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>