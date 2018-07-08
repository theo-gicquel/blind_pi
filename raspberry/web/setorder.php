<?php
file_put_contents("ouverture.dat",$_GET['order']);
file_put_contents("stop.dat","0");
// Retour page précedente
header("Location: {$_SERVER['HTTP_REFERER']}");
?>
