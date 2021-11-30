<?php
$alumno = array("Martin", "Garcia", 666666666);
setcookie('alumno[nombre]', $alumno[0], time() + 3600);
setcookie('alumno[apellido]', $alumno[1], time() + 3600);
setcookie('alumno[telefono]', $alumno[2], time() + 3600);
?>

<html>
    <head>
        <title>Actividad 5</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
        <?php
        if (isset($_COOKIE['alumno'])) {
            foreach ($_COOKIE['alumno'] as $clave => $value) {
                echo "Clave: " . $clave . ", Valor: " . $value."<br>";
            }
        }
        ?>
        </div>
    </body>
</html>
