<?php
if (!empty($_POST['color'])) {
    setcookie("color", $_POST['color']);

    header('Location: ejercicio3.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 3</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style type="text/css">
            #nuevacookie {
                width: 200px;
                float: left;
                margin-left: 20px;
            }

            input[type=text] {
                width: 80%;
                display: block;
            }
            body{
                color: <?php echo $_COOKIE["color"]; ?>
            }
        </style>    
    </head>
    <body>
        <?php echo "El color que ha introducido es: ".$_COOKIE['color'] ?>
        <h1>Ejercicio 3</h1>
        <div id="nuevacookie">    
            <form method='post'>
                <p>Selecciona un color de fondo:</p>
                <fieldset>
                    <label for="color">Color:</label>
                    <input id="color" type="text" name="color" />
                </fieldset>
                <fieldset>
                    <input type="submit" value="Enviar" />
                </fieldset>
            </form>
        </div>
    </body>
</html>
