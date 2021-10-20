<?php
function recoge($var)
{
    $tmp = (isset($_REQUEST[$var]))
        ? trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"))
        : "";
    return $tmp;
}

$fruta = recoge("fruta");

print "  <p><img src=\"img/frutas/$fruta\" width=\"300\"></p>\n";
?>
