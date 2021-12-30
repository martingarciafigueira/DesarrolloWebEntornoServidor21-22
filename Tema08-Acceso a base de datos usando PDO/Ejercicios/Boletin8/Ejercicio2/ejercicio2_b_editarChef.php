<html>   
<head>   
    <TITLE>Editar cocinero</TITLE>   
    <link rel="stylesheet" href="css/style.css" />
</head>   
<body>   
<div id="contido">  
    <h1>EDITAR COCINERO</h1>
    <?php
     require_once 'ejercicio2_b_conectarPDO.php';
      try{ 
        
        $db=dbConnect(); 

        if (isset($_GET['cod'])) {
            $sql = 'SELECT * FROM CHEF WHERE CODIGO=? ';
            $stmt = $db->prepare($sql);
            
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
                    $provincia.="selected='selected' ";
                }        
                $provincia.=">".$filap['nombre']."</option>"; 
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
                <button type="submit" name="update" disabled="disabled"> Actualizar</button>
                <button type="submit" name="delete" disabled="disabled">Eliminar</button>
                <button formaction="ejercicio2_b.php">Cancelar</button></td></tr>
    </table>
    </form>
</div>
</body>
</html>