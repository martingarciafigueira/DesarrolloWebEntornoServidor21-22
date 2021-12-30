<?php
    class Videoclub {
        private const REGEX_CODIGO = "/^[A-Z][0-9]{3}[a-z]$/"; // Expresión regular para validar el formato del código
        // Array de los posibles géneros que puede tener un videoclub
        public const GENEROS = array(0 => "Acción", 1 => "Thriller", 2 => "Terror", 3 => "Romance", 4 => "Comedia", 5 => "Drama", 6 => "Ciencia Ficción", 7 => "Aventuras", 8=> "Documental");

        // Declaración de propiedades de la clase :
        private $lista = array();
        private $generos = array();
        private $codigo;

        // SETTERS Y GETTERS :
        // Getter de la propiedad Lista
        public function setLista(Pelicula $pelicula){ // Para el setter de Lista decidí pasarle como parámetro un objeto tipo Pelicula y añadirlo al array
            $this->lista[] = $pelicula;
        }
        public function getLista(){
            return $this->lista;
        }

        // Setter y Getter de la propiedad Generos
        public function setGeneros($genero){ // En el setter añado el género pasado a la lista de géneros del objeto
            $this->generos[] = $genero;
        }
        public function getGeneros(){
            return $this->generos;
        }

        // Setter y Getter de la propiedad Codigo
        public function setCodigo($codigo){
            if(preg_match(self::REGEX_CODIGO, $codigo)){ // Compruebo mediante una expresión regular si el código está bien introducido
                $this->codigo = $codigo;
            }
            else{
                $this->codigo = "<i style='color:red'>Código inválido</i>"; // Si el código introducido no coincide con la expresión regular, guardo este valor en la propiedad Codigo
            }
        }
        public function getCodigo(){
            return $this->codigo;
        }
    }
?>