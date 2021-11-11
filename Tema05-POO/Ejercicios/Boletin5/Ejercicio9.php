<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 9</title>
    </head>
    <body>
        <?php

        class Factura {

            const IVA = 21;

            private $importeBase;
            private $fecha;
            private $impuestos;
            private $importeBruto;
            private $estado;

            public function creaFactura($importeBase, $fecha) {
                $this->importeBase = $importeBase;
                $this->fecha = $fecha;
                $this->impuestos = $importeBase * (Factura::IVA / 100);
                $this->importeBruto = $this->importeBase + $this->impuestos;
                $this->estado = "PENDIENTE";
            }

            public function pagarFactura() {
                $this->estado = "PAGADA";
            }

            public function imprimeFactura() {
                echo "El importe base de la factura es: ".$this->importeBase."<br>";
                echo "La fecha de la factura es: ".$this->fecha."<br>";
                echo "Los impuestos de la factura son: ".$this->impuestos."<br>";
                echo "El importe bruto de la factura es: ".$this->importeBruto."<br>";
                echo "El estado de la factura es: ".$this->estado."<br>";
                echo "<br>";
            }

        }

        $factura1 = new Factura();
        $factura1->creaFactura(1000, "01/01/1990");
        echo "Se imprime la factura1 <br>";
        $factura1->imprimeFactura();
        
        $factura2 = new Factura();
        $factura2->creaFactura(2500, "01/01/2020");
        $factura2->pagarFactura();
        echo "Se imprime la factura2 <br>";
        $factura2->imprimeFactura();
        ?>
    </body>
</html>



