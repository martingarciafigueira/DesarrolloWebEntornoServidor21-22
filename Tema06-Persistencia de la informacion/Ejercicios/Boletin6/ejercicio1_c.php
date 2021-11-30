<?php
  if(!empty($_POST['nombre'])) {
    if(empty($_POST['valor'])) {
      if(empty($_POST['segs'])) setcookie($_POST['nome']);
      else {
        // No podemos crear cookies vacías persistentes por lo que creamos la cookie con un valor '0'
        setcookie($_POST['nombre'], '0', time() + $_POST['segs']);
      }
    }
    else {
      if(empty($_POST['segs'])) setcookie($_POST['nombre'], $_POST['valor']);
      else setcookie($_POST['nombre'], $_POST['valor'], time() + $_POST['segs']);
    }

    header('Location: ejercicio1_c.php');
  }
  
  if(!empty($_POST['borracookies'])) {
    foreach($_COOKIE as $cookie => $valor) {
      setcookie($cookie, '', time()-1000);
    }
    header('Location: tarea1_c.php');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Información en las cookies</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
      #nuevacookie, #borracookies {
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
          <label for="nome">Nombre:</label>
          <input id="nome" type="text" name="nombre" />
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
    <div id="borracookies">
      <form method='post'>
        <fieldset>
          <input type="hidden" name="borracookies" value="borra" />
          <input type="submit" value="Borrar cookies" />
        </fieldset>
      </form>
    </div>    
  </body>
</html>
