<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 7</title>
    </head>
    <body>
        <?php

        class Menu {

            private $enlaces = array();
            private $titulos = array();

            public function cargarEnlace($en, $tit) {
                $this->enlaces[] = $en;
                $this->titulos[] = $tit;
            }

            public function mostrarHorizontal() {
                for ($f = 0; $f < count($this->enlaces); $f++) {
                    echo '<a href="' . $this->enlaces[$f] . '">' . $this->titulos[$f] . '</a>';
                    echo "-";
                }
            }

            public function mostrarVertical() {
                for ($f = 0; $f < count($this->enlaces); $f++) {
                    echo '<a href="' . $this->enlaces[$f] . '">' . $this->titulos[$f] . '</a>';
                    echo "<br>";
                }
            }

        }

        $menu1 = new Menu();
        $menu1->cargarEnlace('http://www.google.com', 'Google');
        $menu1->cargarEnlace('http://www.as.com', 'AS');
        $menu1->cargarEnlace('http://www.marca.com', 'Marca');
        $menu1->mostrarVertical();

        ?>
    </body>
</html>