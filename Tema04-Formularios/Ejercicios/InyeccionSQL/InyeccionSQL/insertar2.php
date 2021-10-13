<?php
include("biblioteca.php");

$db = conectaDb();
cabecera("Añadir 2", MENU_VOLVER, CABECERA_SIN_CURSOR);

$usuario    = recoge("usuario");
$contraseña = recoge("contraseña");

if ($usuario == "" || $contraseña == "") {
    print "<p>Hay que rellenar los dos campos. "
        . "No se ha guardado el registro.</p>\n";
} else {
    $consulta = "SELECT COUNT(*) FROM $dbTabla";
    $result = $db->query($consulta);
    if (!$result) {
        print "<p>Error en la consulta.</p>\n";
    } elseif ($result->fetchColumn() >= MAX_REG_TABLA) {
        print "<p>Se ha alcanzado el número máximo de registros que se pueden "
            . "guardar.</p>\n<p>Por favor, borre algún registro antes.</p>\n";
    } else {
        $consulta = "SELECT COUNT(*) FROM $dbTabla
            WHERE user='$usuario'";
        $result = $db->query($consulta);
        if (!$result) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($result->fetchColumn() != 0) {
            print "<p>El registro ya existe.</p>\n";
        } else {
            $consulta = "INSERT INTO $dbTabla
                VALUES (NULL, '$usuario', '$contraseña')";
            if ($db->query($consulta)) {
                print "<p>Registro creado correctamente.</p>\n";
            } else {
                print "<p>Error al crear el registro.</p>\n";
            }
        }
    }
}

$db = NULL;
pie();
?>
