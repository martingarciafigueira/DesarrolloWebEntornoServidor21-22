<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Película</title>
    <link rel="stylesheet" href="EstiloPaginasSecundarias.css"> <!-- Enlazo el archivo de estilos para las páginas secundarias -->
    <link rel="icon" type="image/x-icon" href="icono.ico">
</head>
<body>
    <h1>Mostrar Película</h1>
    <form action="" method="post">
        <label for="videoclubes">Escoge el videoclub que contenga la película que quieres mostrar : </label>
        <?php
            require_once "../Pelicula.php";
            require_once "../Actor.php";
            require_once "../Videoclub.php";
            require_once "../Utils.php";

            session_start();
            $listaDeActores = $_SESSION['listaDeActores'];
            $listaDeVideoclubes = $_SESSION['listaDeVideoclubes'];
            
            videoclubesEnRadioButtons($listaDeVideoclubes); // Llamo a la función de Utils para mostrar los videoclubes guardados como radio buttons
        ?>
        <br><br>

        <label for="txtCodigoBuscar">Código para buscar la película : </label>
        <input type="text" name="txtCodigoBuscar"><br>

        <input type="submit" name="submitCodigo" value="Enviar">
    </form>


    <?php
        // Comprobación del formulario
        if (isset($_POST["submitCodigo"])) {
            if (count($listaDeVideoclubes) != 0) { // Compruebo si existen videoclubes guardados
                $videoclub = $listaDeVideoclubes[$_POST['videoclubes']]; // Guardo en una variable el videoclub seleccionado
                if (count($videoclub->getLista()) != 0) { // Compruebo si hay películas guardadas en el videoclub seleccionado
                    foreach ($videoclub->getLista() as $key => $value) { // Recorro la lista de películas del videoclub seleccionado
                        if ($value->getCodigo() == $_POST["txtCodigoBuscar"]) {
                            echo "<p>".$value->mostrarPelicula()."</p>";
                        }
                        else {
                            echo "<script>alert('No existe la película con ese código')</script>";
                        }
                    }
                }
                else {
                    echo "<script>alert('Este videoclub no tiene películas guardadas')</script>";
                }
            }
            else {
                echo "<script>alert('No hay videoclubes creados')</script>";
            }
        }
    ?>


    <a href="Index.php" id="back"><div>Volver al Menú</div></a>
</body>
</html>