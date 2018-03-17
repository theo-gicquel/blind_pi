<?php
file_put_contents("ouverture.dat",$_GET['order']);
header("Refresh:0; url=hub.php");
?>