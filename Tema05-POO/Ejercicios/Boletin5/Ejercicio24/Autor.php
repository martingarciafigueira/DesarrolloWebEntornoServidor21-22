<?php

require_once './Usuario.php';

class Autor extends Usuario {

    public function calculaPuntos() {
        return $this->puntos = $this->numeroArticulos * 10 + 20;
    }

}

$autor1 = new Autor();
$autor1 ->setNumeroArticulos(8);
echo $autor1->calculaPuntos();
