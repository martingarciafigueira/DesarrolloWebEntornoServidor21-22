<?php
include("biblioteca.php");

cabecera("Borrar todo 1", MENU_VOLVER, CABECERA_SIN_CURSOR);

print "<form action=\"borrartodo2.php\" method=\"" . FORM_METHOD . "\">
  <p>¿Está seguro?</p>
  <p><input type=\"submit\" value=\"Sí\" name=\"si\" />
    <input type=\"submit\" value=\"No\" name=\"no\" /></p>
</form>\n";

pie();
?>
