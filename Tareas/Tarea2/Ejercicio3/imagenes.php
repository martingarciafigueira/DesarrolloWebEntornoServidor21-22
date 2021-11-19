
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> TAREA 2 - EJERCICIO 3 - OSCAR ALVAREZ ALVAREZ </title>
    </head>
    <body>
        
        <?php
        
        $usuario=$_GET['user']; //recoge el valor de 'user' enviado desde 'registro.php'
        $formatos_permitidos =  array('png','jpg','gif');
        
        function mostrarImagenes($usuario)
        {
            echo '<span style="color:slategray; font-size:40px;">Imágenes del usuario </span>';
            echo '<span style="color:darkslategray; font-size:50px;">'.$usuario.'</span></br></br>';
            
            foreach(glob("imagenes/$usuario/*.jpg") as $archivo) 
            { 
                print '<img src='.$archivo.' width="200" height="200" alt="Imagen 1" align> ';
            }
        
            foreach(glob("imagenes/$usuario/*.png") as $archivo) 
            { 
                print '<img src='.$archivo.' width="200" height="200" alt="Imagen 1" align> ';
            }
            
            foreach(glob("imagenes/$usuario/*.gif") as $archivo) 
            { 
                print '<img src='.$archivo.' width="200" height="200" alt="Imagen 1" align> ';
            }
        }

        mostrarImagenes($usuario);
        
        if (isset($_POST['subir']))
        {
            $path1 = "imagenes/$usuario/". basename($_FILES['archivo1']['name']);
            $imagen1 = $_FILES['archivo1']['name'];
            $extension = pathinfo($imagen1, PATHINFO_EXTENSION);
            if(in_array($extension, $formatos_permitidos)) move_uploaded_file($_FILES['archivo1']['tmp_name'], $path1);
            
            $path2 = "imagenes/$usuario/". basename($_FILES['archivo2']['name']);
            $imagen2 = $_FILES['archivo2']['name'];
            $extension = pathinfo($imagen2, PATHINFO_EXTENSION);
            if(in_array($extension, $formatos_permitidos)) move_uploaded_file($_FILES['archivo2']['tmp_name'], $path2);
            
            $path3 = "imagenes/$usuario/". basename($_FILES['archivo3']['name']);
            $imagen3 = $_FILES['archivo3']['name'];
            $extension = pathinfo($imagen2, PATHINFO_EXTENSION);
            if(in_array($extension, $formatos_permitidos)) move_uploaded_file($_FILES['archivo3']['tmp_name'], $path3);
            
            ob_end_clean();
            
            mostrarImagenes($usuario);
        }
        
        ?>

        <br>
        <form style="width:800px; position: absolute; bottom: 0 !important;" action="#" method="post" enctype="multipart/form-data"/>
        Subir una nueva imagen: <input name="archivo1" type="file"/> <br>
        Subir una nueva imagen: <input name="archivo2" type="file"/> <br>
        Subir una nueva imagen: <input name="archivo3" type="file"/> <br>
        <input type="submit" name="subir" value="Subir"/> 
        <p> Nota: Los archivos válidos son PNG, JPG, GIF </p>
	</form>
        
    </body>
</html>