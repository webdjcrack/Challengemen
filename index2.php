<?php
 $uri =  $_SERVER['REQUEST_URI'];
 $url = explode("/", $uri);
 $id_reto = $url[3];
 echo "<script type='text/javascript'>document.location.href='personal.php?ireto=".$id_reto."'</script>";
 ?>