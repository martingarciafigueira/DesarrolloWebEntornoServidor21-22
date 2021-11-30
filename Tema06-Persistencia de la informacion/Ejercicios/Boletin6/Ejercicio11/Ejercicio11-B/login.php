<?php
  session_start();

  if(!empty($_SESSION['nombre_usuario'])) {
    // Comprobamos si caducó la sesión
    if(isset($_SESSION['ultima_actividad']) && isset($_SESSION['tiempo_caducidad']) && (time() - $_SESSION['ultima_actividad'] > $_SESSION['tiempo_caducidad'])) {
        session_unset();
        session_destroy();
    }
    $_SESSION['ultima_actividad'] = time();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login / Registro de usuarios</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class="info">
      <?php
        if(empty($_SESSION['nombre_usuario'])) echo '<h2>No logado</h2>';
        else {
          echo '<h2>Usuario '.$_SESSION['nombre_usuario'] . ' logado</h2>';
          if(isset($_SESSION['tiempo_caducidad']))
            echo '<p>La sesión caduca a las ' . date('H:i:s', time() + $_SESSION['tiempo_caducidad']) . '</p>';
          else
            echo '<p>La sesión no caduca.</p>';          
      ?>
        <form method='post' action='do_login.php'>
            <input type="hidden" name="logout" value="1" />
            <input type="submit" id="submit-logout" value="Log out" />
        </form>     
      <?php
        }
      ?>
    </div>
    <div class="forms">
      <div class="form_login <?php if(!empty($_SESSION['nombre_usuario'])) echo 'desactivado'; ?>" >
        <form method='post' action='do_login.php'>
          <h3>Usuario existente:</h3>
          <fieldset>
            <label for="nombreusuario">Nombre:</label>
            <input id="nombreusuario" type="text" name="nombreusuario" />
            <label for="contrasenha">Contraseña:</label>
            <input id="contrasenha" type="password" name="contrasenha" />
          </fieldset>
          <fieldset>
            <label for="tiempo_caducidad">Segs. caducidad (0 = no caducar):</label>
            <input id="tiempo_caducidad" type="text" name="tiempo_caducidad" value="0" />
          </fieldset>          
          <fieldset>
            <input type="submit" id="submit-login" value="Log in" />           
          </fieldset>
        </form>
      </div>
      <div class="form_registro">
        <form method='post' action='do_login.php'>
          <h3>Nuevo usuario:</h3>
          <fieldset>
            <label for="nombreusuario2">Nombre::</label>
            <input id="nombreusuario2" type="text" name="nombreusuario" />
            <label for="nuevacontrasenha">Contraseña:</label>
            <input id="nuevacontrasenha" type="password" name="contrasenha" />
            <label for="nuevacontrasenha2">Repita la contraseña:</label>
            <input id="nuevacontrasenha2" type="password" name="contrasenha2" />
          </fieldset>
          <fieldset>
            <input type="submit" value="Registrar" />
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>
