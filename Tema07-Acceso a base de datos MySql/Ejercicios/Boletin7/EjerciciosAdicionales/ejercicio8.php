<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 8</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <LINK REL="stylesheet" TYPE="text/css" HREF="css/estilo.css">
        <?PHP
        // Incluir bibliotecas de funciones
        include ("lib/fecha.php");
        ?>        
    </head>
    <body>

        <?PHP
        
        if (isset($_REQUEST['enviar'])){
            $enviar = $_REQUEST['enviar'];
            print ("<H1>Encuesta. Voto registrado</H1>\n");

            // Conectar con la base de datos
            $conexion = mysqli_connect("localhost", "alumnoMontecastelo", "", "ejerciciosmontecastelo") or die("No se puede conectar con el servidor");

            // Obtener votos actuales
            $instruccion = "select votos1, votos2 from votos";
            $consulta = mysqli_query($conexion, $instruccion) or die("Fallo en la selección");
            $resultado = mysqli_fetch_array($consulta);

            // Actualizar votos
            $votos1 = $resultado["votos1"];
            $votos2 = $resultado["votos2"];
            $voto = $_REQUEST['voto'];
            if ($voto == "si")
                $votos1 = $votos1 + 1;
            else if ($voto == "no")
                $votos2 = $votos2 + 1;
            $instruccion = "update votos set votos1=$votos1, votos2=$votos2";
            $actualizacion = mysqli_query($conexion, $instruccion) or die("Fallo en la modificaci�n");

            // Desconectar
            mysqli_close($conexion);

            // Mostrar mensaje de agradecimiento
            print ("<P>Su voto ha sido registrado. Gracias por participar</P>\n");
            print ("<A HREF='ejercicio8-resultados.php'>Ver resultados</A>\n");
        }
        else {
            ?>

            <H1>Encuesta</H1>

            <P>¿Crees que el precio de la vivienda seguirá subiendo al ritmo actual?</P>

            <FORM ACTION="ejercicio8.php" METHOD="POST">
                <INPUT TYPE="RADIO" NAME="voto" VALUE="si" CHECKED>Sí<BR>
                <INPUT TYPE="RADIO" NAME="voto" VALUE="no">No<BR><BR>
                <INPUT TYPE="SUBMIT" NAME="enviar" VALUE="votar">
            </FORM>

            <A HREF="ejercicio8-resultados.php">Ver resultados</A>

    <?PHP
}
?>

    </BODY>
</HTML>
