<?php
include("biblioteca.php");

$db = conectaDb();

$consulta = "SELECT COUNT(*) FROM $dbTabla";
$result = $db->query($consulta);
if (!$result) {
    cabecera("Añadir 1", MENU_VOLVER, CABECERA_SIN_CURSOR);
    print "<p>Error en la consulta.</p>\n";
} elseif ($result->fetchColumn() >= MAX_REG_TABLA) {
    cabecera("Añadir 1", MENU_VOLVER, CABECERA_SIN_CURSOR);
    print "<p>Se ha alcanzado el número máximo de registros que se pueden "
        . "guardar.</p>\n<p>Por favor, borre algún registro antes.</p>\n";
} else {
    cabecera("Añadir 1", MENU_VOLVER, CABECERA_CON_CURSOR);
    print "<form action=\"insertar2.php\" method=\"" . FORM_METHOD . "\">
  <p>Escriba los datos del nuevo registro:</p>
  <table>
    <tbody>
      <tr>
        <td>Usuario:</td>
        <td><input type=\"text\" name=\"usuario\" size=\"$tamUsuario\" "
        . "maxlength=\"$tamUsuario\" id=\"cursor\" /></td>
      </tr>
      <tr>
        <td>Contraseña:</td>
        <td><input type=\"text\" name=\"contraseña\" size=\"$tamContraseña\" "
        . "maxlength=\"$tamContraseña\" /></td>
      </tr>
    </tbody>
  </table>
  <p><input type=\"submit\" value=\"Añadir\" /></p>
</form>\n";
}

$db = NULL;
pie();
?>
