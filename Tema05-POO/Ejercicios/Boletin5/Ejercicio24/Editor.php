<?php

require_once './Usuario.php';

class Editor extends Usuario {

    public function calculaPuntos() {
        return $this->puntos = $this->numeroArticulos * 5 + 10;
    }

}

$editor1 = new Editor();
$editor1 ->setNumeroArticulos(10);
echo $editor1->calculaPuntos();