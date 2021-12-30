<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Película</title>
    <link rel="stylesheet" href="EstiloPaginasSecundarias.css"> <!-- Enlace al archivo de estilos para páginas secundarias -->
    <link rel="icon" type="image/x-icon" href="icono.ico">
</head>
<body>
    <h1>Editar Película</h1>
    <form action="" method="post">
        <label for="videoclubes">Escoge el videoclub que contenga la película que quieres buscar : </label>
        <?php
            require_once "../Pelicula.php";
            require_once "../Actor.php";
            require_once "../Videoclub.php";
            require_once "../Utils.php";

            session_start();
            $listaDeActores = $_SESSION['listaDeActores'];
            $listaDeVideoclubes = $_SESSION['listaDeVideoclubes'];

            videoclubesEnRadioButtons($listaDeVideoclubes);
        ?>
        <br><br>

        <label for="txtCodigoBuscar">Código para buscar la película : </label>
        <input type="text" name="txtCodigoBuscar"><br>

        <input type="submit" name="submitCodigo" value="Enviar">
    </form>
        

    <?php // Comprobación de los formularios
        // Cuando se busca la película a editar
        if (isset($_POST["submitCodigo"])) {
            if (count($listaDeVideoclubes) != 0) { // Compruebo si existen videoclubes guardados
                $videoclub = $listaDeVideoclubes[$_POST['videoclubes']]; // Guardo en una variable el videoclub seleccionado
                $_SESSION['videoclub'] = $videoclub; // Lo guardo en session para que persista
                if (count($videoclub->getLista()) != 0) { // Compruebo si hay películas guardadas en el videoclub seleccionado
                    foreach ($videoclub->getLista() as $key => $value) { // Recorro la lista de películas del videoclub seleccionado
                        if ($value->getCodigo() == $_POST["txtCodigoBuscar"]) {
                            $peliculaBuscada = $value; // Guardo en una variable la película en cuestión
                            $_SESSION['peliculaBuscada'] = $peliculaBuscada; // La guardo en session para que persista
                            
                            // Entonces muestro el formulario para editar la película buscada :
                            echo "
                            <form action='' method='post'>
                                <label for='txtTitutlo'>Título : </label> <br>
                                <input type='text' name='txtTitulo' placeholder='".$peliculaBuscada->getTitulo()."'> <br><br>
                        
                                <label for='txtDirector'>Director : </label> <br>
                                <input type='text' name='txtDirector' placeholder='".$peliculaBuscada->getDirector()."'> <br><br>
                        
                                <label for='estado'>Estado :</label> <br>
                                <input type='radio' name='estado' value='Alquilada'>Alquilada
                                <input type='radio' name='estado' value='Disponible'>Disponible
                                <br> <br>
                        
                                <label for='txtFechaDevolucion'>Fecha de devolución : </label> <br>
                                <input type='date' name='txtFechaDevolucion'> <br> <br>
                        
                                <input type='submit' name='submitEditar' value='Editar'>
                            </form>
                            ";
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

        // Cuando se edita la película buscada
        if (isset($_POST["submitEditar"])) {
            $peliculaBuscada = $_SESSION['peliculaBuscada']; // Recojo el dato de la película buscada anteriormente

            // Establezco los valores de la película que se hayan indicado
            // Primero compruebo la fecha de devolución
            $valido = true; // Variable para controlar si la fecha es válida
            if (isset($_POST['txtFechaDevolucion'])) {
                $peliculaBuscada->setFechaDevolucion($_POST['txtFechaDevolucion']);
                if ($peliculaBuscada->getFechaDevolucion() == "<i style='color:red'>Fecha de devolución inválida</i>") {
                    echo "<script>alert('La fecha de devolución es inválida')</script>"; // Si la fecha de devolución es inválida, muestro una alerta
                    $valido = false;
                }
            }

            if ($valido) {
                if (isset($_POST["txtTitulo"])) {
                    $peliculaBuscada->setTitulo($_POST["txtTitulo"]);
                }
    
                if (isset($_POST["txtDirector"])) {
                    $peliculaBuscada->setDirector($_POST["txtDirector"]);
                }
    
                if (isset($_POST["estado"])) {
                    $peliculaBuscada->setEstado($_POST["estado"]);
                }
            }
        }
    ?>


    <a href="Index.php" id="back"><div>Volver al Menú</div></a>
</body>
</html>