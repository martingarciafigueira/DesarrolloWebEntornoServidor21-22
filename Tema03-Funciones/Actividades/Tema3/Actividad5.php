<?php

function crear_equipo()
{
    function seleccionar_portero(){
        print "He seleccionado un portero <br>";
    }
    function seleccionar_defensa(){
        echo 'He seleccionado un defensa <br>';
    }
    function seleccionar_medio(){
        echo 'He seleccionado un medio <br>';
    }
    function seleccionar_delantero(){
        echo 'He seleccionado un delantero <br>';
        function seleccionar_delantero_centro(){
            echo 'He seleccionado un 9 <br>';
            function seleccionar_delantero_suplente(){
                echo 'He seleccionado uno para el banquillo <br>';
            }
        }
    }
}

//Forma de llamar a las funciones
crear_equipo();

seleccionar_portero();
seleccionar_defensa();
seleccionar_medio();
seleccionar_delantero();
seleccionar_delantero_centro();
seleccionar_delantero_suplente();
