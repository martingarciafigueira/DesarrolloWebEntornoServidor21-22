<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Actor</title>
    <link rel="stylesheet" href="EstiloPaginasSecundarias.css"> <!-- Enlazo el archivo de estilos para las páginas secundarias -->
    <link rel="icon" type="image/x-icon" href="icono.ico">
</head>
<body>
    <h1>Añadir Nuevo Actor</h1>
    <form action="Index.php" method="post"> <!-- Formulario para añadir el nuevo actor -->
        <label for="txtFechaNacimiento">Fecha de Nacimiento : </label>
        <input type="date" name="txtFechaNacimiento" id="txtFechaNacimiento" required>

        <br>

        <label for="txtNombre">Nombre : </label>
        <input type="text" name="txtNombre" id="txtNombre" required>

        <br>

        <label for="txtNIF">NIF : </label>
        <input type="text" name="txtNIF" id="txtNIF" placeholder="00000000A" required>

        <hr>

        <input type="submit" name="submitNuevoActor" value="Enviar">
    </form>

    <a href="Index.php" id="back"><div>Volver al Menú</div></a>
</body>
</html>