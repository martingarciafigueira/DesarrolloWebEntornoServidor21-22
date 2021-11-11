<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 12</title>
    </head>
    <body>
        <?php

        class CabeceraPagina {

            private $titulo;
            private $ubicacion;

            public function inicializar($tit, $ubi) {
                $this->titulo = $tit;
                $this->ubicacion = $ubi;
            }

            public function graficar() {
                echo '<div style="font-size:40px;text-align:' . $this->ubicacion . '">';
                echo $this->titulo;
                echo '</div>';
            }

        }

        $cabecera = new CabeceraPagina();
        $cabecera->inicializar('Best clase del Montecastelo', 'center');
        $cabecera->graficar();
        ?>
    </body>
</html>