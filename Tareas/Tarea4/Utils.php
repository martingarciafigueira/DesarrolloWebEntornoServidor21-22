<?php // Voy a usar este archivo PHP para guardar algunas funciones que necesitaré usar en varios lugares, y así ahorro código
    require_once "Pelicula.php";
    require_once "Actor.php";
    require_once "Videoclub.php";
    

    /**
     * Recorre el array de objetos de la clase Videoclub pasado como parámetro y muestra todos sus elementos como radio buttons
     *
     * @param array $listaDeVideoclubes Array de objetos tipo Videoclub
     */
    function videoclubesEnRadioButtons($listaDeVideoclubes){
        // Compruebo si la lista de videoclubes tiene alguno, y en caso afirmativo los muestro como RadioButtons
        if (count($listaDeVideoclubes) == 0) {
            echo "<i style='color:red'>No hay videoclubes creados</i>";
        }
        else {
            foreach ($listaDeVideoclubes as $key => $value) {
                echo "<input type='radio' id='html' name='videoclubes' value='".$key."' required>".$value->getCodigo();
            }
        }  
    }


    /**
     * Compruebo si existen actores en la lista pasada como parámetro y en caso afirmativo los muestro en forma de CheckBoxes
     *
     * @param array $listaDeActores Array de objetos tipo Actor
     */
    function actoresEnCheckboxes($listaDeActores){
        if (count($listaDeActores) != 0) {
            echo "<ul>";
            foreach ($listaDeActores as $key => $value) {
                echo "<li><input type='checkbox' name='actor".$key."' value='actor".$key."' >".$value->getNombre()."</li>";
            }
            echo "</ul>";
        }
        else {
            echo "<i style='color:red'>No hay actores creados</i>";
        }        
    }
?>