<!DOCTYPE html>
<html>
 <head>
  <title>Datos registrados</title>
  <meta charset="utf-8">
 </head>
 <body>
  <h2>Datos personales:</h2>
  <form>
   <table>
    <tr>
     <td>Nombre:</td>
     <td><?php echo $_POST['nombre']; ?></td>
    </tr>
    <tr>
     <td>Apellido 1:</td>
     <td><?php echo $_POST['apellido1']; ?></td>
    </tr>
    <tr>
     <td>Apellido 2:</td>
     <td><?php echo $_POST['apellido2']; ?></td>
    </tr>
    <tr>
     <td>Fecha nacimiento:</td>
     <td><?php echo $_POST['fechanac']; ?></td>
    </tr>
    <tr>
     <td>Teléfono fijo:</td>
     <td><?php echo $_POST['telefonoF']; ?></td>
    </tr>
    <tr>
     <td>Teléfono móvil:</td>
     <td><?php echo $_POST['telefonoM']; ?></td>
    </tr>
    <tr>
     <td>Blog:</td>
     <td><?php echo $_POST['blog']; ?></td>
    </tr>
    <tr>
     <td>Firma:</td>
     <td><?php echo nl2br($_POST['firma']); ?></td>
    </tr>
   </table>
   <hr>
   <h2>Estudios previos:</h2>
    <ul style="list-style: none; ">
     <?php echo $_POST['estudios']; ?>
    </ul>
   <hr>
   <table>
    <tr>
     <td>
      <h2>Idiomas que conoce:</h2>
      <?php 
      foreach($_POST['idioma'] as $l) {
           echo $l.' ';
      }      
      ?>
     </td>
     <td>
      <ul style="list-style: none; ">
       <li><input type="checkbox" <?php if(isset($_POST['deporte']) && $_POST['deporte']==='deporte') echo 'checked="checked"'; ?>>Practica deporte<br>
       <li><input type="checkbox" <?php if(isset($_POST['fuma']) && $_POST['fuma']==='SI') echo 'checked="checked"'; ?>>Fuma<br>
      </ul>
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>
