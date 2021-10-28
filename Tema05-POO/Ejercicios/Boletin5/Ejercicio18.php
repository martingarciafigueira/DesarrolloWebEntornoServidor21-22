<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 18</title>
    </head>
    <body>
        <?php

        class CabeceraPagina {

            private $titulo;
            private $ubicacion;
            private $colorFuente;
            private $colorFondo;

            public function __construct($tit, $ubi = 'center', $colorFuen = '#ffffff', $colorFon = '#000000') {
                $this->titulo = $tit;
                $this->ubicacion = $ubi;
                $this->colorFuente = $colorFuen;
                $this->colorFondo = $colorFon;
            }

            public function graficar() {
                echo '<div style="font-size:40px;text-align:' . $this->ubicacion . ';color:';
                echo $this->colorFuente . ';background-color:' . $this->colorFondo . '">';
                echo $this->titulo;
                echo '</div>';
            }

        }

        $cabecera1 = new CabeceraPagina('Best clase del Montecastelo');
        $cabecera1->graficar();
        echo '<br>';
        $cabecera2 = new CabeceraPagina('Best clase del Montecastelo', 'left');
        $cabecera2->graficar();
        echo '<br>';
        $cabecera3 = new CabeceraPagina('Best clase del Montecastelo', 'right', '#ff0000');
        $cabecera3->graficar();
        echo '<br>';
        $cabecera4 = new CabeceraPagina('Best clase del Montecastelo', 'right', '#ff0000', '#ffff00');
        $cabecera4->graficar();
        ?>
    </body>
</html>