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
		<link rel="stylesheet" href="mobile.css" />

</head>


<body>
	<header> AUTOVOLET  V1.0 ~ Nazi Enragé</header>
	<br>


	<div class="gauche">
<?php  

echo "Température intérieure :<font color='orange'>" . $tempint ."</font>°C<br>";
  echo "Température extérieure :<font color='orange'>" . $tempext . "</font>°C<br>";
  echo "Luminosité <font color='orange'>: " . $lumin . " </font>lumen";
  echo "<p align='left'>Etat :[<font color='green'>" . $etat . "</font>]<br>";
  echo "Ouverture : <font color='orange'>" . $ouverture . "</font><br>";
  echo "Mode :<font color='orange'> " . $mode . "</font><br>";
  echo "Charge batterie :<font color='orange'> " . $batterie . "%</font></p><br>";
?>

	</div>


	<div class="droite">	


<?php
// Interaction utilisateur


// Version classique
/*
if ($mode == 'manuel') {
	if ($ouverture == 'haut') {
		echo $ico_hautActif;
		echo $ico_basInactif;
	}

	if ($ouverture == 'bas') {
		echo $ico_hautInactif;
		echo $ico_basActif;
	}
	
	echo $ico_manuel;
}

if ($mode == 'auto') {
	echo $ico_hautGris;
	echo $ico_basGris;
	echo $ico_auto;
}
 
*/ //version activable oui/non
if ($mode == 'manuel') {
			echo $ico_manuel;

	if ($ouverture == 'haut') {
		echo $ico_hautActivable;
	}

	if ($ouverture == 'bas') {
		echo $ico_basActivable;
	}
	
}

if ($mode == 'auto') {

	echo $ico_auto;
	
		if ($ouverture == 'haut') {
		echo $ico_hautGris;
	}

	if ($ouverture == 'bas') {
		echo $ico_basGris;
	}
}

?>




	</div>

</body>

</html>
