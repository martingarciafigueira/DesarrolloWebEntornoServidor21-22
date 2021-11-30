<?php
  if(!empty($_POST['nombre'])) {
    if(empty($_POST['valor'])) {
      if(empty($_POST['segs'])) setcookie($_POST['nombre']);
      else {
        // No podemos crear cookies vacías persistentes por lo que creamos la cookie con un valor '0'
        setcookie($_POST['nombre'], '0', time() + $_POST['segs']);
      }
    }
    else {
      if(empty($_POST['segs'])) setcookie($_POST['nombre'], $_POST['valor']);
      else setcookie($_POST['nombre'], $_POST['valor'], time() + $_POST['segs']);
    }

    header('Location: ejercicio1_b.php');
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
          <label for="segs">Segundos de permanencia:</label>
          <input id="segs" type="text" name="segs" />
        </fieldset>
        <fieldset>
          <input type="submit" value="Enviar" />
        </fieldset>
      </form>
    </div>
  </body>
</html>
