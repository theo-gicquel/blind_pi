<?php
file_put_contents("mode.dat",$_GET['mode']);
//header("Refresh:0; url=hub.php");
// Retour page précedente
header("Location: {$_SERVER['HTTP_REFERER']}");
?>
