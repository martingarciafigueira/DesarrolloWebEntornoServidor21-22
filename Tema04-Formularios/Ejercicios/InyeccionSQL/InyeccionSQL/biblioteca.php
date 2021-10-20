<?php

define("CABECERA_CON_CURSOR", TRUE);   // Para función cabecera()
define("CABECERA_SIN_CURSOR", FALSE);  // Para función cabecera()
define("FORM_METHOD",         "get");  // Formularios se envían con GET
//define("FORM_METHOD",         "post"); // Formularios se envían con POST
define("MENU_PRINCIPAL",      "menuPrincipal"); // Menú principal
define("MENU_VOLVER",         "menuVolver");    // Menú Volver a inicio
define("MYSQL",               "MySQL");
define("SQLITE",              "SQLite");
define("MAX_REG_TABLA",       20);  // Número máximo de registros en la tabla
$tamUsuario    = 80; // Tamaño del campo Usuario
$tamContraseña = 80; // Tamaño del campo Contraseña
$recorta = array(
    "user"     => $tamUsuario,
    "password" => $tamContraseña);

$dbMotor = MYSQL;                        // Base de datos empleada

if ($dbMotor == MYSQL) {
    define("MYSQL_HOST", "mysql:host=localhost"); // Nombre de host MYSQL
    define("MYSQL_USUARIO", "root");       // Nombre de usuario de MySQL
    define("MYSQL_PASSWORD", "");          // Contraseña de usuario de MySQL
    $dbDb    = "recetas";  // Nombre de la base de datos
    $dbTabla = $dbDb.".chef";             // Nombre de la tabla
}

function conectaDb()
{
    global $dbMotor, $dbDb;

    try {
        if ($dbMotor == MYSQL) {
            $db = new PDO(MYSQL_HOST, MYSQL_USUARIO, MYSQL_PASSWORD);
            $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
        } elseif ($dbMotor == SQLITE) {
            $db = new PDO("sqlite:".$dbDb);
        }
        return($db);
    } catch (PDOException $e) {
        cabecera("Error grave", MENU_PRINCIPAL, CABECERA_SIN_CURSOR);
        print "<p>Error: No puede conectarse con la base de datos.</p>\n";
        print "<p>Error: " . $e->getMessage() . "</p>\n";
        pie();
        exit();
    }
}

function recorta($campo, $cadena)
{
    global $recorta;

    $tmp = isset($recorta[$campo])
    ? substr($cadena, 0, $recorta[$campo])
    : $cadena;
    return $tmp;
}

function recoge($var, $var2="")
{
    $tmp = (isset($_REQUEST[$var]) && trim(strip_tags($_REQUEST[$var])) != "")
    ? strip_tags(trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "ISO-8859-1")))
    : strip_tags(trim(htmlspecialchars($var2, ENT_QUOTES, "ISO-8859-1")));
    if (get_magic_quotes_gpc()) {
        $tmp = stripslashes($tmp);
    }
    $tmp = recorta($var, $tmp);
    return $tmp;
}

function recogeMatriz($var)
{
    $tmpMatriz = array();
    if (isset($_REQUEST[$var]) && is_array($_REQUEST[$var])) {
        foreach ($_REQUEST[$var] as $indice => $valor) {
            $tmp = strip_tags(trim(htmlspecialchars($indice, ENT_QUOTES, "ISO-8859-1")));
            if (get_magic_quotes_gpc()) {
                $tmp = stripslashes($tmp);
            }
            $tmp = recorta($var, $tmp);
            $indiceLimpio = $tmp;

            $tmp = strip_tags(trim(htmlspecialchars($valor, ENT_QUOTES, "ISO-8859-1")));
            if (get_magic_quotes_gpc()) {
                $tmp = stripslashes($tmp);
            }
            $tmp = recorta($var, $tmp);
            $valorLimpio = $tmp;

            $tmpMatriz[$indiceLimpio] = $valorLimpio;
        }
    }
    return $tmpMatriz;
}

function cabecera($texto, $menu, $conCursor)
{
    print "<!DOCTYPE html>
<html>
<head>
  <meta charset=utf-8\" />
  <title>Ejemplo Inyección SQL</title>
  <link href=\"css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
</head>\n\n";
    if ($conCursor) {
        print "<body onload=\"document.getElementById('cursor').focus()\">\n";
    } else {
        print "<body>\n";
    }
    print "<h1>Inyección SQL</h1>
<div id=\"menu\">
  <ul>\n";
    if ($menu == MENU_PRINCIPAL) {
        print "    <li><a href=\"entrar1.php\">Entrar</a></li>
    <li><a href=\"insertar1.php\">Añadir usuarios</a></li>
    <li><a href=\"borrartodo1.php\">Borrar todo</a></li>\n";
    } elseif ($menu == MENU_VOLVER) {
        print "    <li><a href=\"index.php\">Página inicial</a></li>\n";
    } else {
        print "    <li>Error en la selección de menú</li>\n";
    }
    print "  </ul>
</div>

<div id=\"contenido\">\n";
}
