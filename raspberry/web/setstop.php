<?php
file_put_contents("stop.dat",$_GET['stop']);
// Retour page précedente
header("Location: {$_SERVER['HTTP_REFERER']}");
?>
