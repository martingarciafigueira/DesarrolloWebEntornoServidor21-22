<?php

include("biblioteca.php");

function borraTodoMySQL($db)
{
    global $dbDb, $dbTabla, $tamUsuario, $tamContraseña;

    $consulta = "DROP DATABASE $dbDb";
    if ($db->query($consulta)) {
        print "<p>Base de datos borrada correctamente.</p>\n";
    } else {
        print "<p>Error al borrar la base de datos.</p>\n";
    }
    $consulta = "CREATE DATABASE $dbDb";
    if ($db->query($consulta)) {
        print "<p>Base de datos creada correctamente.</p>\n";
        $consulta = "CREATE TABLE $dbTabla (
            id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
            user VARCHAR($tamUsuario),
            password VARCHAR($tamContraseña),
            PRIMARY KEY(id)
            )";
        if ($db->query($consulta)) {
            print "<p>Tabla creada correctamente.</p>\n";
        } else {
            print "<p>Error al crear la tabla.</p>\n";
        }
    } else {
        print "<p>Error al crear la base de datos.</p>\n";
    }
}

function borraTodoSqlite($db)
{
    global $dbTabla, $tamUsuario, $tamContraseña;

    $consulta = "DROP TABLE $dbTabla";
    if ($db->query($consulta)) {
       print "<p>Tabla borrada correctamente.</p>\n";
    } else {
        print "<p>Error al borrar la tabla.</p>\n";
    }
    $consulta = "CREATE TABLE $dbTabla (
        id INTEGER PRIMARY KEY,
        user VARCHAR($tamUsuario),
        password VARCHAR($tamContraseña)
        )";
    if ($db->query($consulta)) {
       print "<p>Tabla creada correctamente.</p>\n";
    } else {
        print "<p>Error al crear la tabla.</p>\n";
    }
}

if (!isset($_REQUEST["si"])) {
    header("Location:index.php");
    exit();
} else {
    $db = conectaDb();
    cabecera("Borrar todo 2", MENU_VOLVER, CABECERA_SIN_CURSOR);
    if ($dbMotor == MYSQL) {
        borraTodoMySQL($db);
    } elseif ($dbMotor == SQLITE) {
        borraTodoSqlite($db);
    }
    $db = NULL;
    pie();
}
?>
