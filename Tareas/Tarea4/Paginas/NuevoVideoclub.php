<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Videoclub</title>
    <link rel="stylesheet" href="EstiloPaginasSecundarias.css"> <!-- Enlazo el archivo de estilos para las páginas secundarias -->
    <link rel="icon" type="image/x-icon" href="icono.ico">
</head>
<body>
    <h1>Añadir Nuevo Videoclub</h1>
    <form action="Index.php" method="post"> <!-- Formulario para añadir el nuevo videoclub -->
        <label for="txtCodigo">Código : </label>
        <input type="text" name="txtCodigo" id="txtCodigo" placeholder="A000a" required> <br><br>

        <label for="generos">Géneros : </label><br>

        <?php
            require_once "../Pelicula.php";
            require_once "../Actor.php";
            require_once "../Videoclub.php";
            
            // Si viene desde el index...
            if (isset($_POST["submitCargarNuevoVideoclub"])) {
                foreach (Videoclub::GENEROS as $key => $value) { // Recorro el array de posibles géneros para mostrarlos como checkbox
                    echo "<input type='checkbox' name='genero".$key."' value='".$value."'>".$value."<br>";
                }
            }
        ?>

        <input type="submit" name="submitNuevoVideoclub" value="Enviar">
    </form>

    <a href="Index.php" id="back"><div>Volver al Menú</div></a>
</body>
</html>