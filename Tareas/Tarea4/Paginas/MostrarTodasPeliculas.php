<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Todas las Películas</title>
    <link rel="stylesheet" href="EstiloPaginasSecundarias.css"> <!-- Enlazo el archivo de estilos para las páginas secundarias -->
    <link rel="icon" type="image/x-icon" href="icono.ico">
</head>
<body>
    <h1>Mostrar todas las películas de un videoclub</h1>
    <form action="" method="post"> <!-- Formulario para escoger videoclub del que mostrar las películas -->
        <label for="videoclubes">Escoge el videoclub : </label>
        <?php
            require_once "../Pelicula.php";
            require_once "../Actor.php";
            require_once "../Videoclub.php";
            require_once "../Utils.php";

            if (isset($_POST["submitCargarMostrarTodasPeliculas"])) { // Compruebo si viene desde el menú
                session_start(); // Inicio la sesión 
                $listaDeVideoclubes = $_SESSION['listaDeVideoclubes']; // Y recibo la lista de videoclubes

                videoclubesEnRadioButtons($listaDeVideoclubes); // Llamo a la función de Utils para mostrar los videoclubes guardados como radio buttons
            }
        ?>

        <input type="submit" name="submitMostrarTodasPeliculas" value="Mostrar">
    </form>
   
    <!-- Compruebo el form donde se elige el videoclub -->
    <?php
        if (isset($_POST["submitMostrarTodasPeliculas"])) { // Si ya he elegido un videoclub del que mostrar las películas
            session_start(); // Inicio la sesión 
            $listaDeVideoclubes = $_SESSION['listaDeVideoclubes']; // Y recibo la lista de videoclubes

            if (isset($_POST['videoclubes'])) { // Compruebo que se haya escogido un videoclub, para mostrarlo correctamente
                $videoclub = $listaDeVideoclubes[$_POST['videoclubes']]; // Guardo en una variable el videoclub seleccionado

                if (count($videoclub->getLista()) != 0) {
                    // Y muestro las películas del videoclub seleccionado
                    echo "<p>";
                    foreach ($videoclub->getLista() as $key => $value) {
                        $value->mostrarPelicula();
                    }
                    echo "</p>";
                }
                else {
                    echo "<p style='color:red'>El videoclub con código ".$videoclub->getCodigo()." no tiene películas guardadas</p>";
                }
            }
            else { // Muestro una alerta para cuando no hay videoclubes guardados y por lo tanto no se escoge videoclub
                echo "<script>alert('No se ha elegido videoclub')</script>";
            }        
        }
    ?>


    <a href="Index.php" id="back"><div>Volver al Menú</div></a>
</body>
</html>