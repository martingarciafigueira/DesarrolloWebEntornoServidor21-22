<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 4</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="Actividad4_Recibir.php">
        <p>Nombre:<input type="text" name="usuario" required></p> 
        <p>Password:<input type="password" name="password" required></p> 
        <p>Fichero a enviar: <input type="file" name="fichero"></p>
        <p>Imagen a enviar: <input type="file" name="imagen"></p> 
        <input type="submit" value="Enviar datos">
    </form>
</body>
</html>