<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las películas almacenadas</title>
    <link rel="stylesheet" href="EstiloPaginasSecundarias.css"> <!-- Enlazo el archivo de estilos para las páginas secundarias -->
    <link rel="icon" type="image/x-icon" href="icono.ico">
</head>
<body>
    <h1>Películas Almacenadas</h1>
    <?php
        require_once "../Pelicula.php";
        require_once "../Actor.php";
        require_once "../Videoclub.php"; 
        
        session_start(); // Inicio la sesión
        $listaDeVideoclubes = $_SESSION['listaDeVideoclubes']; // Obtengo la lista de videoclubes
        
        // Compruebo si hay videoclubes creados y en caso afirmativo recorro sus listas de películas mostrando cada una de ellas
        if (count($listaDeVideoclubes) == 0) {
            echo "<i style='color:red'>No hay videoclubes creados</i>";
        }
        else {
            foreach ($listaDeVideoclubes as $key => $value) {
                if (count($value->getLista()) != 0) { // Compruebo si la lista de películas del videoclub en cuestión está vacía o no
                    echo "<p>";
                    foreach ($value->getLista() as $key2 => $value2) {
                        $value2->mostrarPelicula();
                    }
                    echo "</p>";
                }
                else { // En el caso de que esté vacía muestro un mensaje
                    echo "<p style='color:red'>El videoclub con código ".$value->getCodigo()." no tiene películas almacenadas</p>";
                }
            }
        }
    ?>

    <a href="Index.php" id="back"><div>Volver al Menú</div></a>
</body>
</html>