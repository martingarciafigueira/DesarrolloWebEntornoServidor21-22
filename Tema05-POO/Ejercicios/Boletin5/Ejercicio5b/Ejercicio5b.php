<?php
   function __autoload($clase) {  
     require_once 'clases/'.$clase . '.php';  
   }
$op=new Suma(10,10);
   $op->calcular();
   echo 'El resultado de la suma es '.$op->getResultado();
   $opr=new Resta(50,20);
   $opr->calcular();
   echo '<br />El resultado de la resta es '.$opr->getResultado();
?>
