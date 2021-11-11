<?php

require_once '../Ejercicio23/Usuario.php';
require_once './Autor.php';
require_once './Editor.php';

class AutorEditor extends Usuario implements Autor,Editor {
    private $privilegiosAutor = array();
    private $privilegiosEditor = array();
    
    function getPrivilegiosAutor() {
        return $this->privilegiosAutor;
    }

    function getPrivilegiosEditor() {
        return $this->privilegiosEditor;
    }

    function setPrivilegiosAutor($privilegiosAutor) {
        $this->privilegiosAutor = $privilegiosAutor;
    }

    function setPrivilegiosEditor($privilegiosEditor) {
        $this->privilegiosEditor = $privilegiosEditor;
    }
}

$user1 = new AutorEditor();
$user1->setUsername("Ramon");
$user1->setPrivilegiosAutor(array("Leer","Escribir"));
$user1->setPrivilegiosEditor(array("Corregir","Escribir"));

$userName  = $user1->getUsername();
$privilegiosUsuario = array_merge($user1->getPrivilegiosAutor(),$user1->getPrivilegiosEditor());
 
echo $userName ." tiene los privilegios: ";
echo implode(", ", $privilegiosUsuario);
echo ".";
