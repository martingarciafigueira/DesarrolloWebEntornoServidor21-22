<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Película</title>
    <link rel="stylesheet" href="EstiloPaginasSecundarias.css"> <!-- Enlazo el archivo de estilos para las páginas secundarias -->
    <link rel="icon" type="image/x-icon" href="icono.ico">
</head>
<body>
    <h1>Añadir Nueva Película</h1>
    <form action="Index.php" method="post">

        <label for="videoclubes">Escoge el videoclub : </label>
        <?php
            require_once "../Pelicula.php";
            require_once "../Actor.php";
            require_once "../Videoclub.php";
            require_once "../Utils.php";   

            if (isset($_POST['submitCargarNuevaPelicula'])) { // Compruebo si viene desde el menú
                session_start(); // Inicio la sesión para recibir la lista de videoclubes

                $listaDeVideoclubes = $_SESSION['listaDeVideoclubes']; 

                // Compruebo si hay videoclubes creados y en caso afirmativo, los muestro en RadioButtons
                if (count($listaDeVideoclubes) == 0) {
                    echo "<i>No hay videoclubes creados</i>";
                }
                else {
                    foreach ($listaDeVideoclubes as $key => $value) {
                        echo "<input type='radio' id='html' name='videoclubes' value='".$key."' required>".$value->getCodigo();
                    }
                }
            }
        ?>

        <br>

        <label for="txtTitulo">Título : </label>
        <input type="text" name="txtTitulo" id="txtTitulo" required>

        <br><br>

        <label for="txtCodigo">Código : </label>
        <input type="text" name="txtCodigo" id="txtCodigo" required>

        <br><br>

        <label for="txtDirector">Director : </label>
        <input type="text" name="txtDirector" id="txtDirector" required>

        <br><br>

        <label for="actores">Actores :</label>
        <?php
            $listaDeActores = $_SESSION['listaDeActores']; // Obtengo la lista de actores creados
            actoresEnCheckboxes($listaDeActores); // Llamo a la función establecida en Utils para mostrar los actores de la lista como checkboxes para elegir
        ?>
        
        <br><br>
        
        <label for="txtEstado">Estado :</label>
        <input type="radio" name="estado" value="Alquilada" required>Alquilada <br>
        <input type="radio" name="estado" value="Disponible" required>Disponible

        <br><br>

        <label for="txtFechaDevolucion">Fecha de Devolución : </label>
        <input type="date" name="txtFechaDevolucion" id="txtFechaDevolucion" required>

        <hr>
        
        <input type="submit" name="submitNuevaPelicula" value="Enviar">
    </form>

    <a href="Index.php" id="back"><div>Volver al Menú</div></a>
</body>
</html>