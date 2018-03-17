<?php
file_put_contents("ouverture.dat",$_GET['order']);
// Retour page précedente
header("Location: {$_SERVER['HTTP_REFERER']}");
?>
