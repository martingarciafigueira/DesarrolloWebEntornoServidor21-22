<?php
  if(!empty($_POST['nombre'])) {
    if(empty($_POST['valor'])) {
      setcookie($_POST['nombre']);
    }
    else {
      setcookie($_POST['nombre'], $_POST['valor']);
    }

    header('Location: ejercicio1_a.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Información en las cookies</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
      #nuevacookie {
        width: 200px;
        float: left;
        margin-left: 20px;
      }

      input[type=text] {
        width: 80%;
        display: block;
      }
    </style>    
  </head>
  <body>
    <h1>Información en las cookies:</h1>
    <div id="nuevacookie">
    <?php
    var_dump($_COOKIE);
    ?>       
      <form method='post'>
        <p>Nueva cookie:</p>
        <fieldset>
          <label for="nombre">Nombre:</label>
          <input id="nombre" type="text" name="nombre" />
          <label for="valor">Valor:</label>
          <input id="valor" type="text" name="valor" />
        </fieldset>
        <fieldset>
          <input type="submit" value="Enviar" />
        </fieldset>
      </form>
    </div>
  </body>
</html>
