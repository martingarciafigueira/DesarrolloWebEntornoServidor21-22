<?php
if(!empty($_GET['url'])) {
  $url = 'http://'.$_GET['url'];
  header('Location: '.$url);
}
else exit('URL no indicada!');
?>
