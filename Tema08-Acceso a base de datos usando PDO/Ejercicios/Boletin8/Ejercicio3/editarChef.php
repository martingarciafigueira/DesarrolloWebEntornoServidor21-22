<html>   
<head>   
    <TITLE>Cocineros</TITLE>   
    <link rel="stylesheet" href="css/style.css" />
</head>   
<body>   
<div id="contido">  
    <h1>LISTADO DE COCINEROS</h1>
    <?php
     require_once 'conectarPDO.php';
      try{ 
        
        $db=dbConnect(); 

        if (isset($_GET['cod'])) {
            $sql = 'SELECT * FROM CHEF WHERE CODIGO=? ';
            $stmt = $db->prepare($sql);
            //
            $filas = $stmt->execute(array($_GET['cod']));
            $fila=$stmt->fetch();
            if (empty($fila)) {
                $filas = "No se encontraron resultados !!";
            }
            $sexo="";
            if ($fila['sexo']=='H') {
                $sexo .="<option value='H' selected='selected'>Hombre</option><option value='M'>Mujer</option>"; 
            }
            else {
                $sexo .="<option value='H'>Hombre</option><option value='M' selected='selected'>Mujer</option>";
            }
            $provincia="";
            $sql2 = 'SELECT * FROM PROVINCIA';
            $stmt2 = $db->query($sql2);
            $filasp = $stmt2->fetchAll();
            foreach ($filasp as $filap) {  
                $provincia.="<option value='".$filap['codigo']."'";
                if (strcmp($filap['codigo'],$fila['cod_provincia'])==0){
                    $provincia.=" selected='selected' ";
                }        
                $provincia.=">".$filap['nombre']."</option>"; 
            }
        }
                
        if (array_key_exists('update', $_POST)) {
            $sql = 'UPDATE chef SET nombre = ?, apellido1 = ?, apellido2 = ?, '.
                    'nombreartistico=?, sexo=?, data_nacimiento=?, localidad=?, '
                    . ' cod_provincia=? WHERE codigo = ?';
            $stmt = $db->prepare($sql);
            $resultado = $stmt->execute(array($_POST['nombre'],$_POST['apellido1'],
                                     $_POST['apellido2'],$_POST['nombreArtistico'],
                                     $_POST['sexo'],$_POST['data'],$_POST['localidad'],
                                     $_POST['provincia'],$_GET['cod']));
            if ($resultado==1) {
                $count = $stmt->rowCount();  
                print("Se actualizaron $count rexistro.\n");
                header("refresh: 4;editarChef.php?cod=".$_GET['cod']);
                exit;
            } else {
                 echo '<p>Se produjo un error en la actualizaci�n..</p>';;
            }
        }
        else if (array_key_exists('delete', $_POST)) {
            //Hay que eliminar las dependencias antes de borrarlo de la BD
            $bandera = true;
            $db->beginTransaction();
            
            // Borramos los libros que tenga escritos este cocinero
            $sql = 'DELETE FROM libro WHERE cod_chef = ?';
            $stmt = $db->prepare($sql);
            if($stmt->execute(array($_GET['cod'])) == 0) 
                { $bandera = false; }
            else {
                $count = $stmt->rowCount();  
                print("<p class='mensaje'>Se borraron $count libros.</p>");
            }
            // Borramos os restaurantes que tenga este cocinero
            $sql = 'DELETE FROM restaurante WHERE cod_chef = ?';
            $stmt = $db->prepare($sql);
            if($stmt->execute(array($_GET['cod'])) == 0) 
                { $bandera = false; }
            else {
                $count = $stmt->rowCount();  
                print("<p class='mensaje'>Se borraron $count restaurantes.</p>");
            }
            //Borramos las recetas de este cocinero
            $sql = 'DELETE FROM receta_ingrediente '
                 . 'WHERE cod_receita IN (select codigo '
                                       . 'from receta '
                                       . 'where cod_chef= ?)';
            $stmt = $db->prepare($sql);
            if($stmt->execute(array($_GET['cod'])) == 0) 
                { $bandera = false; }
            else {
                $count = $stmt->rowCount();  
                print("<p class='mensaje'>Se borraron $count ingredientes de recetas.</p>");
            }
            $sql = 'DELETE FROM receta WHERE cod_chef = ?';
            $stmt = $db->prepare($sql);
            if($stmt->execute(array($_GET['cod'])) == 0) 
                { $bandera = false; }
            else {
                $count = $stmt->rowCount();  
                print("<p class='mensaje'>Se borraron $count recetas.</p>");
            }
            
            // Unha vez eliminadas as dependenzas, borramos o coci�eiro
            $sql2 = 'DELETE FROM CHEF WHERE CODIGO=?';
            $stmt2 = $db->prepare($sql2);

            if($stmt2->execute( array($_GET['cod'])) == 0) { 
                $bandera = false;  echo 'estoy aquí';
            } else {
                $count = $stmt2->rowCount();  
                print("<p class='mensaxe'>Se borró $count cocinero.</p>");
            }

            if($bandera)  {
                $db->commit();  // Se todo foi ben confirma os cambios
                echo '<p class="mensaje">Eliminado el cocinero con código '.$_GET['cod'].'</p>';
                  header("refresh: 4;url=ejercicio3.php");
                exit;
            } else {
                $db->rollback();
                echo '<p class="mensaje">Se produjo un error en el borrado...</p>';
            }
        }
    }catch(PDOException $e) 
    { 
     print $e->getMessage(); 
    }

    ?>
    <form action="" method="post">
    <table class="edicion">
        <tr><td><label for="codigo">Codigo:</label></td>
            <td><input type="number" name="codigo" id="codigo" disabled="disabled" value="<?php echo $fila['codigo'];?>"><br/></td></tr>
        <tr><td><label for="nome">Nombre:</label></td>
            <td><input type="text" name="nome" id="nombre" value="<?php echo $fila['nombre'];?>"><br/></td></tr>
        <tr><td><label for="apelido1">Apellidos:</label></td>
            <td><input type="text" name="apellido1" id="apellido1" value="<?php echo $fila['apellido1'];?>">
                <input type="text" name="apellido2" id="apellido2" value="<?php echo $fila['apellido2'];?>"><br/></td></tr>
        <tr><td><label for="nomeArtistico">Nombre artístico:</label></td>
            <td><input type="text" name="nombreArtistico"  id="nombreArtistico" value="<?php echo $fila['nombreartistico'];?>"><br/></td></tr>
        <tr><td><label for="sexo">Sexo:</label></td>
            <td><select name="sexo" id="sexo"><?php echo $sexo; ?></select></td></tr>
        <tr><td><label for="data">Fecha de nacimiento:</label></td>
            <td><input type="date" name="data" id="data" value="<?php echo $fila['data_nacimiento'];?>"><br/></td></tr>
        <tr><td><label for="localidade">Localidad:</label></td>
            <td><input type="text" name="localidad" id="localidad" value="<?php echo $fila['localidad'];?>"><br/></td></tr>
        <tr><td><label for="provincia">Provincia:</label></td>
            <td><select name="provincia" id="provincia"><?php echo $provincia; ?></select></td></tr>
        <tr><td colspan="2">
                <button type="submit" name="update" disabled="disabled">Actualizar</button>
                <button type="submit" name="delete" disabled="disabled">Eliminar</button>
                <button formaction="ejercicio3.php">Cancelar</button></td></tr>
    </table>
    </form>
</div>
</body>
</html>