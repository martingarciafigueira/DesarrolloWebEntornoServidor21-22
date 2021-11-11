<?php require_once("Persona.php"); 
$p = new Persona( 'Pedro','2008-10-30');
echo $p->getNombre(). ' tiene '. $p->diasvivo();
echo '<br />Su sexo es: '. $p->getSexo();
?>
