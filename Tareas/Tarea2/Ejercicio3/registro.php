<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> TAREA 2 - EJERCICIO 3 - OSCAR ALVAREZ ALVAREZ </title>
    </head>
    <body>
        
        <?php
        
        $usuario = isset($_POST['nombreRegistrado']) ? $_POST['nombreRegistrado'] : '';;
        $password = isset($_POST['passwordRegistrada']) ? $_POST['passwordRegistrada'] : '';;
        $usuarioNuevo = isset($_POST['nombreNuevo']) ? $_POST['nombreNuevo'] : '';;
        $passwordNueva = isset($_POST['passwordNueva']) ? $_POST['passwordNueva'] : '';;
        $passwordNueva2 = isset($_POST['passwordNueva2']) ? $_POST['passwordNueva2'] : '';;
        
        $usuarioExiste=false;
        $sePermite=false;
        $passwordsCoinciden=false;
        
        // USUARIO NO REGISTRADO --> REGISTRAR
        if($usuarioNuevo!="")
        {
            //Comprueba que el usuario no está ya registrado
            if(!is_dir("imagenes/$usuarioNuevo")) $usuarioExiste=true;
            else echo "</br>Ya hay un usuario registrado con ese nombre";
            
            //Comprueba que los caracteres esten permitidos | NOTA: En html he puesto limite de 12 caracteres así que no lo compruebo aquí
            if((preg_match('/^[A-Za-z0-9_-]+$/', $usuarioNuevo)==1) && strlen($usuarioNuevo)>=4) $sePermite=true; 
            else echo "</br>El usuario $usuarioNuevo contiene caracteres no permitidos o es muy pequeño (min. 4 caracteres)";
            
            //Comprueba que las contraseñas coincidan
            if(($passwordNueva == $passwordNueva2) && strlen($passwordNueva)>=6) $passwordsCoinciden=true;
            else echo "</br>Las contraseñas no coinciden o son poco seguras (min. 6 caracteres)";
            
            if($usuarioExiste && $sePermite && $passwordsCoinciden) 
            {
                mkdir("imagenes/$usuarioNuevo");
                $file = fopen("imagenes/$usuarioNuevo/pass.txt", "w");
                fwrite($file, $passwordNueva);
                fclose($file);
                
                if(file_exists("imagenes/$usuarioNuevo/pass.txt"))
                {
                    echo "¡El usuario <strong>$usuarioNuevo</strong> ha sido creado con éxito!";
                }
                else echo "Se ha producido un error";
            }
            
            print "<p><a href=\"registro.html\">Volver al inicio de sesión.</a></p>\n";
        }
        
        // USUARIO YA REGISTRADO
        if($usuario!="")
        {
            //Comprueba credenciales
            if(file_exists("imagenes/$usuario/pass.txt"))
            {
                $file = fopen("imagenes/$usuario/pass.txt", "r");
                $passwordFichero = fgets($file);
                fclose($file);

                if($password == $passwordFichero) header("location:imagenes.php?user=$usuario"); //Envia el valor de usuario (como user) a imagenes.php
                else echo 'La contraseña es incorrecta';
            }
            
            else echo 'El usuario no existe';

            print "<p><a href=\"registro.html\">Volver al inicio de sesión.</a></p>\n";
        }
        
        ?>
        
    </body>
</html>
