<?php
    class Actor{
        private const REGEX_FECHA_NACIMIENTO = "/^[0-9]{4}\-[0-1][0-9]\-[0-3][0-9]$/"; // Expresión regular para comprobar el formato de la fecha de nacimiento
        private const REGEX_NIF = "/^[0-9]{8}[A-Z]$/"; // Expresión regular para comprobar el formato del NIF

        // Declaración de propiedades de la clase :
        private $fechaNacimiento;
        private $edad;
        private $nombre;
        private $nif;

        // SETTERS Y GETTERS :
        // Setter y Getter de la propiedad FechaNacimiento
        public function setFechaNacimiento($fechaNacimiento){
            if (preg_match(self::REGEX_FECHA_NACIMIENTO, $fechaNacimiento)) { // Compruebo mediante una expresión regular si el formato es correcto
                // Y ahora compruebo si la fecha introducida es posterior a la fecha actual
                if (explode("-", $fechaNacimiento)[0] < explode("-", date("Y-m-d"))[0]) { // Primero compruebo si el año escogido es más pasado que el actual
                    $this->fechaNacimiento = $fechaNacimiento;
                }
                else if (explode("-", $fechaNacimiento)[0] == explode("-", date("Y-m-d"))[0]){ // Ahora compruebo si los años son los mismos
                    if (explode("-", $fechaNacimiento)[1] < explode("-", date("Y-m-d"))[1]) { // Entonces compruebo si el mes escogido es más pasado que el actual
                        $this->fechaNacimiento = $fechaNacimiento;
                    }
                    else if (explode("-", $fechaNacimiento)[1] == explode("-", date("Y-m-d"))[1]){ // Ahora compruebo si el mes escogido es igual al mes actual
                        if (explode("-", $fechaNacimiento)[2] < explode("-", date("Y-m-d"))[2]) { // Entonces compruebo si el día escogido es más pasado al día actual
                            $this->fechaNacimiento = $fechaNacimiento;
                        }
                        else {
                            $this->fechaNacimiento = "<i style='color:red'>Fecha de nacimiento inválida</i>";
                        }
                    }
                    else {
                        $this->fechaNacimiento = "<i style='color:red'>Fecha de nacimiento inválida</i>";
                    }
                }
                else {
                    $this->fechaNacimiento = "<i style='color:red'>Fecha de nacimiento inválida</i>";
                }
            }
            else{ // En el caso de que sea incorrecto por cualquier caso, guardo este valor en la propiedad
                $this->fechaNacimiento = "<i style='color:red'>Fecha de nacimiento inválida</i>";
            }

            // Compruebo si la fecha de nacimiento es válida o no
            if ($this->getFechaNacimiento() == "<i style='color:red'>Fecha de nacimiento inválida</i>") {
                $this->edad = "<i style='color:red'>Fecha de nacimiento inválida</i>"; // En el caso de que no lo sea, establezco este valor para la edad
            }
            else { // Si la fecha de nacimiento es válida, establezco el dato correcto de la edad
                $this->edad = explode("-", date("Y-m-d"))[0] - explode("-", $fechaNacimiento)[0];
            }
        }
        public function getFechaNacimiento(){
            return $this->fechaNacimiento;
        }

        // Getter de la propiedad Edad
        public function getEdad(){
            return $this->edad;
        }

        // Setter y Getter de la propiedad Nombre
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function getNombre(){
            return $this->nombre;
        }

        // Setter y Getter de la propiedad NIF
        public function setNIF($nif){
            if (preg_match(self::REGEX_NIF, $nif)) { // Compruebo mediante una expresión regular si el formato del NIF introducido es correcto
                $this->nif = $nif;
            }
            else {
                $this->nif = "<i style='color:red'>NIF inválido</i>"; // Establezco el valor del NIF en caso de que el formato del introducido sea inválido
            }
        }
        public function getNIF(){
            return $this->nif;
        }
    }
?>