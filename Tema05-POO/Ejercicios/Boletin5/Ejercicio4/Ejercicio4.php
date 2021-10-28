<?php
require_once 'Academia.php';  
$a = new Academia();
$profe = $a->anhadirProfesor("Laura", "Varela Ferreiro", '696999999','12345678A');
$profe->anhadirBaile("SAMBA");
$profe->anhadirBaile("HIP HOP");
$profe->anhadirBaile("AFRO",12);
$profe->anhadirBaile("AFRO",12);
echo '<br />PROFESOR: '. $profe->verInformacion();
echo '<br />SUELDO: '.$profe->calcularSueldo(10);
echo '<br />IMPARTE CLASE DE: '. $profe->getBailes();

$alu1 = $a->anhadirAlumno("Uxia", "Loureiro Agra", "699666999");
echo '<br />ALUMNO: '. $alu1->verInformacion();
$alu1->setNumClases(2);
echo '<br />A PAGAR: '.$alu1->aPagar(2);

$alu2 = $a->anhadirAlumno("Manuel", "Abel Prado", "699666999");
echo '<br />ALUMNO: '. $alu1->verInformacion();
echo '<br />A PAGAR: '.$alu1->aPagar(2);


echo '<br />PROFESOR: '. $profe->verInformacion();
echo '<br />SUELDO: '.$profe->calcularSueldo(10);
$profe->eliminarBaile("AFRO");
echo '<br />IMPARTE CLASE DE: '. $profe->getBailes();

?>