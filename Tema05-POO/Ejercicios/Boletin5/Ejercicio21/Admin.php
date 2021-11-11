<?php

require_once './Usuario.php';

class Admin extends Usuario {
    
    public function muestraTuRol(){
        return strtolower(__CLASS__);
    }
    
    public function saluda(){
        return "Hola ".strtolower(__CLASS__).", ".$this->username;
    }
}

$admin1 = new Admin();
$admin1->setUsername("Ramon");
echo $admin1->saluda();
