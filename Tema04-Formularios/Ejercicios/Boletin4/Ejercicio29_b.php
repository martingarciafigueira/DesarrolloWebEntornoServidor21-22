<?php
if(!empty($_GET['url'])) {
  $url = 'http://'.$_GET['url'];
  $c = curl_init();
  curl_setopt($c, CURLOPT_URL, $url);
  curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
  $pagina = curl_exec($c);
  curl_close($c);

  if($pagina === false) exit('URL no encontrada!');
  else echo $pagina;
}
else exit('URL no indicada!');
?>
