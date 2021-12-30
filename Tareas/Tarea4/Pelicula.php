<?php
    class Pelicula{
        private const REGEX_FECHA_DEVOLUCION = "/^[0-9]{4}\-[0-1][0-9]\-[0-3][0-9]$/"; // Expresión regular para comprobar el formato de la fecha de devolución
        public const ESTADOS = array(0 => "Alquilada", 1 => "Disponible"); // Array indicando los estados que puede tener una película

        // Declaración de propiedades de la clase :
        private $titulo;
        private $codigo;
        private $director;
        private $actores = array(); // Inicializo directamente el array de actores de la película
        private $estado;
        private $fechaDevolucion;


        // SETTERS Y GETTERS :
        // Setter y Getter de la propiedad Titulo
        public function setTitulo($titulo){
            $this->titulo = $titulo;
        }
        public function getTitulo(){
            return $this->titulo;
        }

        // Setter y Getter de la propiedad Codigo
        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }
        public function getCodigo(){
            return $this->codigo;
        }

        // Setter y Getter de la propiedad Director
        public function setDirector($director){
            $this->director = $director;
        }
        public function getDirector(){
            return $this->director;
        }

        // Setter y Getter de la propiedad Actores
        public function setActores(Actor $actor){ // Fuerzo a que el parámetro pasado en el setter sea un objeto de la clase Actor
            $this->actores[] = $actor; // Añado el actor pasado como parámetro al array de Actores
        }
        public function getActores(){
            return $this->actores;
        }

        // Setter y Getter de la propiedad Estado
        public function setEstado($estado){
            if ($estado == self::ESTADOS[0] || $estado == self::ESTADOS[1]) { // El estado de la película sólo debe ser "Alquilada" o "Disponible"
                $this->estado = $estado;                
            }
            else {
                $this->estado = "<i style='color:red'>Estado inválido</i>";
            }
        }
        public function getEstado(){
            return $this->estado;
        }

        // Setter y Getter de la propiedad FechaDevolucion
        public function setFechaDevolucion($fechaDevolucion){
            if (preg_match(self::REGEX_FECHA_DEVOLUCION, $fechaDevolucion)) { // Compruebo mediante una expresión regular si el formato es correcto
                // Y ahora compruebo si la fecha introducida es posterior a la fecha actual
                if (explode("-", $fechaDevolucion)[0] > explode("-", date("Y-m-d"))[0]) { // Primero compruebo si el año escogido es más futuro que el actual
                    $this->fechaDevolucion = $fechaDevolucion;
                }
                else if (explode("-", $fechaDevolucion)[0] == explode("-", date("Y-m-d"))[0]){ // Ahora compruebo si los años son los mismos
                    if (explode("-", $fechaDevolucion)[1] > explode("-", date("Y-m-d"))[1]) { // Entonces compruebo si el mes escogido es más futuro que el actual
                        $this->fechaDevolucion = $fechaDevolucion;
                    }
                    else if (explode("-", $fechaDevolucion)[1] == explode("-", date("Y-m-d"))[1]){ // Ahora compruebo si el mes escogido es igual al mes actual
                        if (explode("-", $fechaDevolucion)[2] > explode("-", date("Y-m-d"))[2]) { // Entonces compruebo si el día escogido es más futuro al día actual
                            $this->fechaDevolucion = $fechaDevolucion;
                        }
                        else {
                            $this->fechaDevolucion = "<i style='color:red'>Fecha de devolución inválida</i>";
                        }
                    }
                    else {
                        $this->fechaDevolucion = "<i style='color:red'>Fecha de devolución inválida</i>";
                    }
                }
                else {
                    $this->fechaDevolucion = "<i style='color:red'>Fecha de devolución inválida</i>";
                }
            }
            else{ // En el caso de que sea incorrecto por cualquier caso, guardo este valor en la propiedad
                $this->fechaDevolucion = "<i style='color:red'>Fecha de devolución inválida</i>";
            }
        }
        public function getFechaDevolucion(){
            if (preg_match(self::REGEX_FECHA_DEVOLUCION, $this->fechaDevolucion)) { // Compruebo si la regex coincide con la fecha de devolución
                $cadena = explode("-", $this->fechaDevolucion)[2]."-".explode("-", $this->fechaDevolucion)[1]."-".explode("-", $this->fechaDevolucion)[0];
                return $cadena; // Entonces hago una cadena formateando el dato para mostrarla como es debido
            }
            else { // Si no coincide con la regex, quiere decir que la fecha es inválida, entonces mostraré el dato tal cual
                return $this->fechaDevolucion;
            }
        }


        /**
         * Constructor con parámetros de la clase Película
         * Establece los valores de las propiedades correspondientes según los parámetros pasados
         * 
         * @param $titulo Título de la película que se quiere instanciar
         * @param $codigo Código de la película que se quiere instanciar
         * @param $director Director de la película que se quiere instanciar
         */
        function __construct($titulo, $codigo, $director){
            $this->setTitulo($titulo);
            $this->setCodigo($codigo);
            $this->setDirector($director);
        }
                
        
        /**
         * Defino qué mensaje debe mostrarse cuando un objeto de esta clase se usa con echo o print
         *
         * @return string El mensaje indicado en la función, en un párrafo incluyo toda la información de las propiedades del objeto
         */
        function __toString(){
            // Cadena que se mostrará devolviéndola al final de la función
            $cadenaSalida = "<p>Película : ".$this->titulo."<br>Código : ".$this->codigo."<br>Director : ".$this->director."<br>Actores : ";

            if (count($this->actores) != 0) { // Compruebo si hay algún actor añadido a la película
                $cadenaSalida .= "<ul>";
                foreach ($this->actores as $key => $value) { // Para mostrar todos los actores recorro el array poniendo el nombre de cada uno en un elemento de una lista desordenada
                    $cadenaSalida.= "<li>".$value->getNombre()."</li>";
                }
                $cadenaSalida.="</ul>Estado : ".$this->estado."<br>Fecha de devolución : ".$this->getFechaDevolucion()."</p>";
            }
            else { // En el caso de que la película no tenga ningún actor, muestro un mensaje diferente
                $cadenaSalida.="<i style='color:red'>No tiene actores registrados</i><br> Estado : ".$this->estado."<br>Fecha de devolución : ".$this->getFechaDevolucion()."</p>";
            }

            return $cadenaSalida; // Devuelvo toda esa cadena
        }
        

        /**
         * Método que llama al método toString de esta clase, mostrando toda la cadena de __toString()
         */
        public function mostrarPelicula(){
            echo $this;
        }
    }
?>