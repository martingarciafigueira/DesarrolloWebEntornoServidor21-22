<?php


require_once './Usuario.php';

class Admin extends Usuario {
    public function estableceRol() {
        return __CLASS__;
    }
}

$admin1 = new Admin();
$admin1->setUsername("Ramon");
echo $admin1->estableceRol();
