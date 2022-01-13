<?php
    function verificarNombre($nombre)
    {
        
        if($nombre == null || $nombre == "" )
        { 
            return "Nombre vacio"; 
        }
        elseif(strlen($nombre) < 4)
        {
            return  "El nombre es menor de 4 digitos";
        }
        elseif( strlen($nombre) > 12)
        {
            return  "El nombre es mayor de 12 digitos" ;
        }
        elseif(! preg_match('/(?=[a-z])|(?=[0-9])|(?=[-])|(?=[_])/mi',$nombre))
        {
            return  "Los caracteres introducidos no son validos" ;
        }
        elseif(buscarUsuario($nombre)[0])
        {
            return "El usuario ya existe";
        }
        else
        {
            return true;
        }   
    }

    function verificarContrasenha($contrasenha_1,$contrasenha_2,$nombre=false)
    {
        if(strlen($contrasenha_1) < 6)
        {
            return "La contraseña tiene menos de 6 digitos o esta vacia";
        }
        elseif($contrasenha_1  <> $contrasenha_2){
            return "Las contraseñas son  diferentes";
        }
        else
        {
            return true; 
        }
    }

    function buscarUsuario($nombre)
    {

        $archivo= fopen('./usuarios.txt','r');
        do
        {
            $texto = fgets($archivo);
            if(strpos($texto,$nombre)!==false)
            {   
                fclose($archivo);
                return [true,$texto, $archivo];
            } 
        }while(! feof($archivo));
        fclose($archivo);
        return false;

    }

    function sobreEscribirFichero($nombre, $hash)
    {
        $lineas = Array();
        $archivo= fopen('./usuarios.txt','r');
        do
        {
            $texto = fgets($archivo);
            if(strpos($texto,$nombre)===FALSE)
            {   
                array_push($lineas,$texto);
            } 
        }while(!feof($archivo));

        fclose($archivo);
        $archivo= fopen('./usuarios.txt','w');
        foreach($lineas as $linea){
           fwrite($archivo,$linea); 
        }
        fclose($archivo);
        escribirArchivo($nombre,$hash);
    }

    function escribirArchivo($nombre,$hash)
    {
       file_put_contents('./usuarios.txt',$nombre."|".$hash."\n",FILE_APPEND);       
    }

?>