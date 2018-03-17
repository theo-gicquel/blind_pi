<head>
<style>


</style>
</head>

<?php

//variables
$etat      = file_get_contents('etat.dat');
$tempint   = file_get_contents('tempint.dat');
$tempext   = file_get_contents('tempext.dat');
$lumin     = file_get_contents('lumin.dat');
$ouverture = file_get_contents('ouverture.dat');
$mode      = file_get_contents('mode.dat');
$batterie  = file_get_contents('batterie.dat');


//affichage
echo '<div style="font:11px/21px Monospace;color:#000000">';
	echo '<p align="left"><b>Données Acquises</b></p>';
	echo "etat:" . $etat . "<br>";
	echo "temp int:" . $tempint . "°C<br>";
	echo "temp ext:" . $tempext . "<br>";
	echo "luminosité:" . $lumin . "<br>";
	echo "ouverture:" . $ouverture . "<br>";
	echo "Mode:" . $mode . "<br>";
	echo "batterie:" . $batterie . "<br>";
echo"</div>";
?>