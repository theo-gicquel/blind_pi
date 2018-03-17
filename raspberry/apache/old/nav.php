<head>
<link type="text/css" href="style.css" media="all" />
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

?>



<h2 align="center">Données Acquises</h2>
<p> foo </p>
<?php
	echo "<body>";
	echo "<p>Etat :[" . $etat . "]<br>";
	echo " Température intérieure : " . $tempint ."°C<br>";
	echo " Température extérieure : " . $tempext . "°C<br>";
	echo " Luminosité : " . $lumin . " lumen <br>";
	echo " Ouverture : " . $ouverture . "% <br>";
	echo " Mode : " . $mode . "% <br>";
	echo " Charge batterie : " . $batterie . "%<br></p>";
	echo "<a href=''><img src='fresh.png'><a/>";
	echo "<a href=''><img src='up.png'><a/>";
	echo "<a href=''><img src='down.png'><a/>";
	echo "<a href=''><img src='blank.png'><a/>";
	echo "</body>";
?>
</body>