<?php
class Articulo {  
   private $id;  
   private $nombre;  

   public function __construct($id,$nombre) {  
     $this->id = $id;  
     $this->nombre = $nombre;  
   }  
   public function __clone() {  
     $this->id = ++$this->id;   
   }  
   public function __set($atributo, $valor) {  
     if (property_exists(__CLASS__, $atributo)) {  
       $this->$atributo = $valor;  
     } else {  
       echo "No existe el atributo $atributo.";  
     }  
   }  
   public function __get($atributo) {  
     if (property_exists(__CLASS__, $atributo)) {  
       return $this->$atributo;  
     }  
     return NULL;  
   }
   public function __toString(){  
     return $this->mostrarArticulo();  
   }
   public function mostrarArticulo () {
       return $this->id.' - '.$this->nombre;
   }
}  
