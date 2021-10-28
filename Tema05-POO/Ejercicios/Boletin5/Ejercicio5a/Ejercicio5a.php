<?php
   function __autoload($clase) {  
     require_once 'clases/'.$clase.'.php';  
   }
    $op=new Suma();
    $op->setOperando1(10);
    $op->setOperando2(10);
    $op->calcular();
    echo 'El resultado de la suma es '.$op->getResultado();
    $opr=new Resta();
    $opr->setOperando1(50);
    $opr->setOperando2(10);
    $opr->calcular();
    echo '<br />El resultado de la resta es '.$opr->getResultado();
?>
