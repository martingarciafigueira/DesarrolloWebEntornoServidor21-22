<?php
//Clase con propiedade e métodos estáticos
 class Data {
    private static $calendario = "Calendario gregoriano";
    private static $dias = array("Domingo","Lunes","Martes","Miércoles",
                           "Jueves","Viernes","Sábado");
    private static $meses = array("Enero","Febrero","Marzo","Abril",
                           "Mayo","Junio","Julio","Agosto","Septiembre",
                           "Octubre","Noviembre","Diciembre");    

    public static function getData(){
       $fecha= self::$dias[date('w')]." ".date('d')." de ".
               self::$meses[date('n')-1]. " do ".date('Y');
       return $fecha;
    } 
    public static function getHora(){
       $hora = date('H');
       $minutos = date('i');
       $segundos = date('s');
       return $hora . ':' . $minutos . ':' . $segundos;
    }
    public static function getDataHora(){
       $data = self::getData(); // podería ser Data::getData()
       $hora = self::getHora();
       return "Hoxe é ". $data . ' e son as ' . $hora;
    }
    public static function getCalendario(){
       $cal = Data::$calendario;
       return $cal;
    }
 }
?>