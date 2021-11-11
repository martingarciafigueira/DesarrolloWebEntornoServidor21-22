<?php

$a1 = new Articulo(1, "linterna");  
$a2 = clone $a1;  
$a2->nombre="manta";
echo $a2->id.' - '.$a2->nombre;  
echo "<br />".$a1

?>