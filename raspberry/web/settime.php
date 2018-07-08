<?php
file_put_contents("time.dat",$_GET['time']);
//header("Refresh:0; url=hub.php");
// Retour page précedente
header("Location: {$_SERVER['HTTP_REFERER']}");
?>
