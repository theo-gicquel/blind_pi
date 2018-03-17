<head>
<style>
</style>
<link rel="sylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
</head>

<?php

//variables
$etat      = file_get_contents('etat.dat');
$tempint   = file_get_contents('tempint.dat');
$tempext   = file_get_contents('tempext.dat');
$luminosite     = file_get_contents('luminosite.dat');
$ouverture = file_get_contents('ouverture.dat');
$mode      = file_get_contents('mode.dat');
$batterie  = file_get_contents('batterie.dat');


//affichage
echo '<body bgcolor="#444444">';
echo '<div style="font:20px/21px Monospace;color:#FF8C08">';
	echo '<p style="font:30px" align="center"><b>Données Acquises</b></p>';

	echo "etat:" . $etat . "<br>";
	echo "temp int:" . $tempint . "°C<br>";
	echo "temp ext:" . $tempext . "°C<br>";
	echo "luminosité:" . $luminosite . "<br>";
	echo "ouverture:" . $ouverture . "<br>";
	echo "Mode:" . $mode . "<br>";
	echo "batterie:" . $batterie . "%<br>";
echo"</div>";
echo '</body>';
?>
