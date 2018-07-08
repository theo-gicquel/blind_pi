<?php
file_put_contents("mode.dat",$_GET['mode']);
file_put_contents("stop.dat","0");
//header("Refresh:0; url=hub.php");
// Retour page précedente
header("Location: {$_SERVER['HTTP_REFERER']}");
?>
