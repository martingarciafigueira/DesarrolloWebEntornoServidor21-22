<?php

if (isset($_COOKIE)){
    foreach($_COOKIE as $cookie => $valor) {
      setcookie($cookie, '', time()-1000);
    }  
}

?>