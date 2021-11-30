<?php

class Libro{
    private $titulo;
    static $cont_libros = 0;
    
    function __construct($titulo){
        $this->titulo = $titulo;
        self::$cont_libros++;
    }
    
    function __destruct() {
        self::$cont_libros--;
    }
    
    function getTitulo()
    {
        return $this->titulo;
    }
    
    static function getContador(){
        return self::$cont_libros;
    }
    
    public static function getCont_libros() {
        return self::$cont_libros;
    }

    public static function setCont_libros($cont_libros) {
        self::$cont_libros = $cont_libros;
    }    
}

