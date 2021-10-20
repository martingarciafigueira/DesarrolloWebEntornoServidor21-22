<?php
define('RUTA_IMAGENES', __DIR__.'/img/');

if(!empty($_GET['nombre'])) {
  $fichero = RUTA_IMAGENES.$_GET['nombre'];
  if(file_exists($fichero)) {
    $imagen = file_get_contents($fichero);
    header("Content-type: image/jpeg");
    echo $imagen;    
  }
  else header('Location: img/no_encontrada.jpg');
}
else exit('Nombre de la imagen no indicado!');
?>
