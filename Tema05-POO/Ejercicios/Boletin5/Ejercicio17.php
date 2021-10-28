<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 17</title>
    </head>
    <body>
        <?php

        class Opcion {

            private $titulo;
            private $enlace;
            private $colorFondo;

            public function __construct($tit, $enl, $cfon) {
                $this->titulo = $tit;
                $this->enlace = $enl;
                $this->colorFondo = $cfon;
            }

            public function graficar() {
                echo '<a style="background-color:' . $this->colorFondo . '" href="' . $this->enlace . '">' . $this->titulo . '</a>';
            }

        }

        class Menu {

            private $opciones = array();
            private $direccion;

            public function __construct($dir) {
                $this->direccion = $dir;
            }

            public function insertar($op) {
                $this->opciones[] = $op;
            }

            private function graficarHorizontal() {
                for ($f = 0; $f < count($this->opciones); $f++) {
                    $this->opciones[$f]->graficar();
                }
            }

            private function graficarVertical() {
                for ($f = 0; $f < count($this->opciones); $f++) {
                    $this->opciones[$f]->graficar();
                    echo '<br>';
                }
            }

            public function graficar() {
                if (strtolower($this->direccion) == "horizontal")
                    $this->graficarHorizontal();
                else
                if (strtolower($this->direccion) == "vertical")
                    $this->graficarVertical();
            }

        }

        $menu1 = new Menu('horizontal');
        $opcion1 = new Opcion('Google', 'http://www.google.com', '#C3D9FF');
        $menu1->insertar($opcion1);
        $opcion2 = new Opcion('Yahoo', 'http://www.yahoo.com', '#CDEB8B');
        $menu1->insertar($opcion2);
        $opcion3 = new Opcion('MSN', 'http://www.msn.com', '#C3D9FF');
        $menu1->insertar($opcion3);
        $menu1->graficar();
        ?>
    </body>
</html>