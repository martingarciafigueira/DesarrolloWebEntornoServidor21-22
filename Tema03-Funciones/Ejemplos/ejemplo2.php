<?php 

function modificaVariable($variableAModificar){
    $variableAModificar = "Soy una variable modificada";
}

function modificaVariableReferencia(&$variableAModificar){
    $variableAModificar = "Soy una variable modificada";
}

$variableEjemplo = "VIALIA";

echo "Valor de la variable: ".$variableEjemplo."<br>";

//Llamo a una funcion y le paso la variable POR VALOR
modificaVariable($variableEjemplo);
echo "Valor de la variable: ".$variableEjemplo."<br>";

//Llamo a una funcion y le paso la variable POR REFERENCIA
modificaVariableReferencia($variableEjemplo);
echo "Valor de la variable: ".$variableEjemplo."<br>";