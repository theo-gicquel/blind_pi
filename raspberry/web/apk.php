<?php
/*Afficher les informations récupérées dans les fichiers, permettre de modifier
 *le mode de fonctionnement du volet (auto/manuel; ouverture/fermeture) via des liens de contrôle utilisateur
 */

// Récupération des données des fichiers
$etat      = file_get_contents('etat.dat');
$tempint   = file_get_contents('tempint.dat');
$tempext   = file_get_contents('tempext.dat');
$lumin     = file_get_contents('lumin.dat');
$ouverture = file_get_contents('ouverture.dat');
$mode      = file_get_contents('mode.dat');
$batterie  = file_get_contents('batterie.dat');

// Constantes d'affichage des variables
  // Bouton haut
$ico_hautInactif = '<div class="hubbutton inactif"><a href="setorder.php?order=haut"><img src="ouvert.svg"></a><p>OUVERT/p></div>';
$ico_hautActif = '<div class="hubbutton actif"><img src="ouvert.svg"></a><p>OUVERT</p></div>';

$ico_hautActivable = '<div class="hubbutton actif"><a href="setorder.php?order=bas"><img src="ouvert.svg"></a><p>OUVERT</p></div>';

$ico_hautGris = '<div class="hubbutton inactif"><img src="ouvert_gris.svg"><p class="inactif">OUVERT</p></div>';

  // Bouton Bas
$ico_basInactif = '<div class="hubbutton"><a href="setorder.php?order=bas"><img src="ferme.svg"></a><p>FERMÉ</p></div>';

$ico_basActivable = '<div class="hubbutton"><a href="setorder.php?order=haut"><img src="ferme.svg"></a><p>FERMÉ</p></div>';

$ico_basActif = '<div class="hubbutton"><img src="ferme.svg"></a><p>FERMÉ</p></div>';


$ico_basGris ='<div class="hubbutton inactif"><img src="ferme_gris.svg"><p>FERMÉ</p></div>';

  // Bouton Automatisation
$ico_manuel = '<div class="hubbutton inactif"><a href="setmode.php?mode=auto"><img src="cog.png"></a><p>AUTO : OFF</p></div>';
$ico_auto = '<div class="hubbutton actif "><a style="background-color:green;" href="setmode.php?mode=manuel"><img src="cog.png"></a><p>AUTO : ON</p></div>';
?>

<!--Structure HTML-->


<html>
<head>
		<link rel="stylesheet" href="apk.css" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta http-equiv="refresh" content="10">
</head>


<body scroll="no" style="overflow: hidden" >
	<header> AUTOBLIND </header>
	<br>


	<div class="gauche" style="width:100%;"	>
<?php  
	echo "<font color='white'>";
	echo "Température intérieure :<font color='orange'>" . $tempint ."</font>°C<br>";
	echo "Température extérieure :<font color='orange'>" . $tempext . "</font>°C<br>";
	echo "Luminosité <font color='orange'>: " . $lumin . " </font>lumen";
	echo "<p align='left'>Etat :[<font color='green'>" . $etat . "</font>]<br>";
	echo "Ouverture : <font color='orange'>" . $ouverture . "</font><br>";
	echo "Mode :<font color='orange'> " . $mode . "</font><br>";
	echo "Charge batterie :<font color='orange'> " . $batterie . "%</font></p>";
	echo "</font>";
?>

	</div>

</body>

</html>
