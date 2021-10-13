<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Insertar_Persona($nombre, $apellidos, $edad, $dni)
{
    echo "La persona se llama ".$nombre." ".$apellidos."<br>";
    echo "Tiene ".$edad." años<br>";
    echo "Su DNI es: ".$dni."<br>";
}

Insertar_Persona("Ramón", "Ríos Sieiro", "25", "12345678Z");