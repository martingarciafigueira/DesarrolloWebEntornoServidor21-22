<?php // Este archivo sirve para trabajar con todas las demás páginas
    require_once "../Pelicula.php";
    require_once "../Actor.php";
    require_once "../Videoclub.php";

    session_start(); // Inicio la sesión para pasar objetos desde esta página hasta las demás

    $listaDeActores = array(); // Array de todos los actores creados
    $listaDeVideoclubes = array(); // Array de los videoclubes creados

    // Compruebo si las listas de actores y videoclubes ya están en SESSION, y en ese caso las establezco
    if (isset($_SESSION['listaDeActores']) && isset($_SESSION['listaDeVideoclubes'])) {
        $listaDeActores = $_SESSION['listaDeActores'];
        $listaDeVideoclubes = $_SESSION['listaDeVideoclubes'];
    }
    

    // Cuando viene de vuelta de la página de añadir una nueva película :
    if (isset($_POST['submitNuevaPelicula'])) {
        if (isset($_POST['videoclubes'])) { // Compruebo que haya videoclubes guardados, para guardar correctamente la película en el videoclub
            $videoclub = $listaDeVideoclubes[$_POST['videoclubes']]; // Guardo en una variable el videoclub seleccionado

            // Creo una nueva película que guardar en el videoclub, llamando a su constructor
            $nuevaPelicula = new Pelicula($_POST["txtTitulo"], $_POST["txtCodigo"], $_POST["txtDirector"]);
            // Y voy estableciendo los valores de las diferentes propiedades de la película
            for ($i=0; $i < count($listaDeActores); $i++){  // Recorro la lista de actores para comprobar si se ha añadido a alguno a la película
                if (isset($_POST["actor".$i])) {
                    $nuevaPelicula->setActores($listaDeActores[$i]);
                }
            }
            $nuevaPelicula->setEstado($_POST["estado"]);
            $nuevaPelicula->setFechaDevolucion($_POST["txtFechaDevolucion"]);

            // Compruebo la fecha de devolución introducida para poder guardar la película en el videoclub seleccionado
            if ($nuevaPelicula->getFechaDevolucion() == "<i style='color:red'>Fecha de devolución inválida</i>") {
                echo "<script>alert('La fecha de devolución es inválida')</script>"; // Si la fecha de devolución es inválida, muestro una alerta
            }
            else { // Si la fecha de devolución está OK
                $videoclub->setLista($nuevaPelicula); // Añado la nueva película al videoclub
    
                $listaDeVideoclubes[$_POST['videoclubes']] = $videoclub; // Actualizo la lista de videoclubes                
            }
        }
        else { // Alerta de que no hay videoclubes guardados
            echo "<script>alert('No has elegido videoclub en el que guardar la nueva película')</script>";
        }        
    }




    // Cuando viene de vuelta desde la página de crear un nuevo actor :
    if (isset($_POST['submitNuevoActor'])) {
        // Uso los datos del formulario para crear un nuevo objeto Actor y establacer los valores de sus propiedades
        $nuevoActor = new Actor();
        $nuevoActor->setFechaNacimiento($_POST["txtFechaNacimiento"]);

        if ($nuevoActor->getFechaNacimiento() == "<i style='color:red'>Fecha de nacimiento inválida</i>") { // Compruebo si la fecha de nacimiento es inválida
            echo "<script>alert('La fecha de nacimiento del actor es inválida')</script>"; // Y muestro una alerta en caso afirmativo
        }
        else { // En el caso de que la fecha de nacimiento del actor sea válida, sigo estableciendo valores
            $nuevoActor->setNombre($_POST["txtNombre"]);
    
            $nifRepetido = false; // Así compruebo si el NIF del nuevo actor está repetido
            foreach ($listaDeActores as $key => $value) {
                if ($_POST["txtNIF"] == $value->getNIF()) {
                    $nifRepetido = true;
                }
            }
    
            if ($nifRepetido) { // Si el NIF del nuevo actor está repetido, muestro un alert
                echo "<script>alert('El NIF del nuevo actor está repetido')</script>";
            }
            else {
                $nuevoActor->setNIF($_POST["txtNIF"]);
                if ($nuevoActor->getNIF() == "<i style='color:red'>NIF inválido</i>") { // Ahora compruebo si el NIF del nuevo actor es inválido
                    echo "<script>alert('El NIF del nuevo actor es inválido')</script>";
                }
                else {
                    $listaDeActores[] = $nuevoActor; // Añado el nuevo actor a la lista de actores                            
                }
            }            
        }
    }




    // Cuando viene de vuelta desde la página de crear un nuevo videoclub :
    if (isset($_POST['submitNuevoVideoclub'])) {
        $codigoRepetido = false; // Así compruebo si el código del nuevo videoclub está repetido
        foreach ($listaDeVideoclubes as $key => $value) {
            if ($_POST['txtCodigo'] == $value->getCodigo()) {
                $codigoRepetido = true;
            }
        }

        if ($codigoRepetido) { // Si efectivamente el código está repetido, muestro un alert
            echo "<script>alert('El código del nuevo videoclub está repetido')</script>";
        }
        else {
            // Creo un nuevo videoclub y establezco el valor de su propiedad Codigo
            $nuevoVideoclub = new Videoclub();
            
            // Añado los géneros que estén marcados
            for ($i=0; $i <= 7; $i++) { 
                if (isset($_POST["genero".$i])) {
                    $nuevoVideoclub->setGeneros($_POST["genero".$i]);
                }
            }
            
            $nuevoVideoclub->setCodigo($_POST['txtCodigo']);
            if ($nuevoVideoclub->getCodigo() == "<i style='color:red'>Código inválido</i>") { // Ahora compruebo si el código del nuevo videoclub es inválido
                echo "<script>alert('El código del nuevo videoclub es inválido')</script>";
            }
            else {
                $listaDeVideoclubes[] = $nuevoVideoclub; // Añado el nuevo videoclub a la lista de videoclubes
            }
        }
    }  


    $_SESSION['listaDeActores'] = $listaDeActores; // Establezco la lista de actores en SESSION
    $_SESSION['listaDeVideoclubes'] = $listaDeVideoclubes; // Establezco la lista de videoclubes en SESSION
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 4 - Menú</title>
    <link rel="icon" type="image/x-icon" href="icono.ico">
    <style>
        *{
            font-family: Arial;
        }

        h1{
            text-align:center;
            margin-top:2em;
            margin-bottom:2em;
        }

        #menu{
            /* Uso Grid para colocar los elementos */
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-template-rows: repeat(5, 1fr);
            gap: 2em;
        }

        .elementos{ /* Estilo de los elementos */
            border:1px solid black;
            background-color:#C9CACC;
            display:inline-block;
            font-size: 1.5em;
            width: 100%;
            height: 5em;

            text-align: center;
            line-height:5em;
        }
        a:link, a:visited{ /* Estilo de los enlaces */
            color:black;
            text-decoration: none;
        }

        /* Colocación de los elementos en el grid */
        #nuevaPelicula{
            grid-area: 1 / 2 / 1 / 3;
        }
        #nuevoActor{
            grid-area: 2 / 2 / 2 / 3;
        }
        #nuevoVideoclub{
            grid-area: 3 / 2 / 3 / 3;
        }
        #editarPelicula{
            grid-area: 1 / 3 / 1 / 4;
        }
        #mostrarPelicula{
            grid-area: 2 / 3 / 2 / 4;
        }
        #mostrarTodasPeliculas{
            grid-area: 3 / 3 / 3 / 4;
        }
        #peliculasAlmacenadas{
            grid-area: 4 / 2 / 4 / span 2;
        }
    </style>
</head>
<body>
    <h1>Menú de gestión de Videoclub</h1>
    <div id="menu">
        <form action="NuevaPelicula.php" method="post" id="nuevaPelicula">
            <input type="submit" name="submitCargarNuevaPelicula" value="Nueva Película" class="elementos">
        </form>

        <form action="NuevoActor.php" method="post" id="nuevoActor">
            <input type="submit" name="submitCargarNuevoActor" value="Nuevo Actor" class="elementos">
        </form>

        <form action="NuevoVideoclub.php" method="post" id="nuevoVideoclub">
            <input type="submit" name="submitCargarNuevoVideoclub" value="Nuevo Videoclub" class="elementos">
        </form>

        <form action="EditarPelicula.php" method="post" id="editarPelicula">
            <input type="submit" name="submitCargarEditarPelicula" value="Editar Película" class="elementos">
        </form>

        <form action="MostrarPelicula.php" method="post" id="mostrarPelicula">
            <input type="submit" name="submitCargarMostrarPelicula" value="Mostrar Película" class="elementos">
        </form>

        <form action="MostrarTodasPeliculas.php" method="post" id="mostrarTodasPeliculas">
            <input type="submit" name="submitCargarMostrarTodasPeliculas" value="Mostrar todas las películas" class="elementos">
        </form>

        <form action="PeliculasAlmacenadas.php" method="post" id="peliculasAlmacenadas">
            <input type="submit" name="submitCargarPeliculasAlmacenadas" value="Películas Almacenadas" class="elementos" id="elementoPeliculasAlmacenadas">
        </form>
    </div>
</body>
</html>