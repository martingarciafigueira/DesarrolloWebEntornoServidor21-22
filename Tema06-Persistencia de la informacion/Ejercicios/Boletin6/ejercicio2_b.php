<?php
  session_start();
  if(!empty($_POST['texto'])) {
    $_SESSION['textos'][] = $_POST['texto'];
  }
  if(!empty($_POST['borrasesion'])) {
    session_unset();
    session_destroy();
  }  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Información en la sesión del usuario</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
      #nuevotexto, #borrasesion {
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
    <h1>Contenido de la sesión:</h1>
    <?php echo '<pre>' , var_dump($_SESSION) , '</pre>'; ?>
    <div id="nuevotexto">
      <form method='post'>
        <p>Nuevo texto:</p>
        <fieldset>
          <label for="texto">Texto:</label>
          <input id="texto" type="text" name="texto" />
        </fieldset>
        <fieldset>
          <input type="submit" value="Enviar" />
        </fieldset>
      </form>
    </div>
    <div id="borrasesion">
      <form method='post'>
        <fieldset>
          <input type="hidden" name="borrasesion" value="borra" />
          <input type="submit" value="Borrar la sesión" />
        </fieldset>
      </form>
    </div>    
  </body>
</html>
