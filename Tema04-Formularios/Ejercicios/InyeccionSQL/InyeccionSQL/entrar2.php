<?php
include("biblioteca.php");

$db = conectaDb();
cabecera("Entrar 2", MENU_VOLVER, CABECERA_SIN_CURSOR);

// Esta página no desinfecta la entrada del usuario
// por lo que puede sufrir inyecciones SQL
// Utiliza la biblioteca PDO

// Esta función permite los ataques de inyección SQL que inyectan varias
// consultas en una. Normalmente pdo no ejecuta más que la primera consulta
function pdo_query_multi($db, $query) {
    $pattern = '/^(.*;)(.*;)/s';
    if (preg_match($pattern,$query,$match)) {
        $result = $db->query($match[1]);
        // Hacemos fetchAll() porque si no la segunda consulta da error
        // $db->errorInfo() dice que es error HY000 (database table is locked)
        if ($result) {
            $result->fetchAll();
        }
        $result2 = $db->query($match[2]);
        // Hacemos fetchAll() y repetimos la primera consulta
        // que es la que espera el programa y con el fetchAll() anterior
        // hemos perdido el resultado
        if ($result2) {
            $result2->fetchAll();
        }
        $result = $db->query($match[1]);
    } else {
        $result = $db->query($query);
    }
    return (@$result);
}

$usuario    = $_REQUEST["usuario"];
$contraseña = $_REQUEST["contraseña"];

if ($usuario == "" || $contraseña == "") {
    print "<p>Hay que rellenar los dos campos.</p>\n";
} else {
    $consulta = "SELECT COUNT(*) FROM $dbTabla
        WHERE user='$usuario'
        AND password='$contraseña'";
    $result = pdo_query_multi($db, $consulta);
    if (!$result) {
        print "<p>Error en la consulta.</p>\n";
    } else {
        if ($result->fetchColumn() > 0) {
            print "<p>Nombre de usuario y contraseña correctos.</p>\n";
        } else {
            $consulta = "SELECT COUNT(*) FROM $dbTabla
                WHERE user='$usuario'";
            $result = pdo_query_multi($db, $consulta);
            if (!$result) {
                print "<p>Error en la consulta.</p>\n";
            } elseif ($result->fetchColumn() > 0) {
                print "<p>Contraseña incorrecta.</p>\n";
            } else {
                print "<p>Nombre de usuario incorrecto.</p>\n";
            }
        }
    }
}

$db = NULL;
?>
