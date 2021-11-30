<?php

trait Vehiculo{
    private $numeroRuedas;
    private $categoriaVehiculo;
    public function getNumeroRuedas(){
        return $this->numeroRuedas;
    }
}

abstract class Coche{

    use Vehiculo;

    protected $gasolina = 50;

    public function setGasolina($gasolina){
        $this->gasolina = $gasolina;
    }
    public function getGasolina(){
        return $this->gasolina;
    }
}

class Ferrari extends Coche{
    public function arrancar(){
        $this->gasolina -= 5;
    }
}

class Citroen extends Coche{
    public function arrancar(){
        $this->gasolina -= 1;
    }
}

//$coche1 = new Coche();
$coche2 = new Ferrari();
$coche3 = new Citroen();

function mostrarCoche(Coche $coche){
    echo "La gasolina del coche es: ".$coche->getGasolina()."<br>";
}

$coche2->getNumeroRuedas();

//mostrarCoche($coche1); //funciona

mostrarCoche($coche2); //funciona

mostrarCoche($coche3); //funciona
