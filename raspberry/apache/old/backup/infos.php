<head>
<style>
table {
    border-collapse: collapse;
}

table td {
    border: 1px solid #333;
}
table tr {
    border: 1px solid #333;
}
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
echo '<div style="font:11px/21px Monospace;color:#ff0000">';
echo '<h2 align="center">Données Acquises</h2> <br><br>';

echo "<table style='width:50%' align='center'>";

	echo "<tr>";
		echo "<th>Etat du système</th>";
		echo "<td>[" . $etat . "]</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<th>température intérieure</th>";
		echo "<td>" . $tempint . "°C</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<th>température extérieure</th>";
		echo "<td>" . $tempext . "°C</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<th>Luminosité</th>";
		echo "<td>" . $lumin . " lumen</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<th>Ouverture du volet</th>";
		echo "<td>" . $ouverture . "%</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<th>Mode</th>";
		echo "<td>" . $mode . "%</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<th>Charge batterie</th>";
		echo "<td>" . $batterie . "%</td>";
	echo "</tr>";



echo"</table>";

echo"</div>";
?>