<?php
/*Afficher les informations récupérées dans les fichiers, permettre de modifier
 *le mode de fonctionnement du volet (auto/manuel).
 */

// Variables générales
$etat      = file_get_contents('etat.dat');
$tempint   = file_get_contents('tempint.dat');
$tempext   = file_get_contents('tempext.dat');
$lumin     = file_get_contents('lumin.dat');
$ouverture = file_get_contents('ouverture.dat');
$mode      = file_get_contents('mode.dat');
$batterie  = file_get_contents('batterie.dat');

// Bouton Haut
$ico_hautInactif = '<div class="hubbutton"><a href="setorder.php?order=haut"><img src="ouvert.svg" height="100px"></a><p>OUVERTURE</p></div>';
$ico_hautActif = '<div class="hubbutton"><img src="ouvert.svg" height="100px"></a><p style="background-color:rgb(1,200,1);">OUVERTURE</p></div>';
$ico_hautGris = '<div class="hubbutton"><img src="ouvert_gris.svg" height="100px"><p style="background-color:rgb(100,100,100);">OUVERTURE</p></div>';

// Bouton Bas
$ico_basInactif = '<div class="hubbutton"><a href="setorder.php?order=bas"><img src="ferme.svg" height="100px"></a><p>FERMETURE</p></div>';
$ico_basActif = '<div class="hubbutton"><img src="ferme.svg" height="100px"></a><p style="background-color:rgb(0,255,0);">FERMETURE</p></div>';
$ico_basGris ='<div class="hubbutton"><img src="ferme_gris.svg" height="100px"><p style="background-color:rgb(100,100,100);">FERMETURE</p></div>';

// Bouton Automatisation
$ico_manuel = '<div class="hubbutton"><a style="background-color:red;" href="setmode.php?mode=auto"><img src="cog.png"></a><p>AUTO : OFF</p></div>';
$ico_auto = '<div class="hubbutton"><a style="background-color:green;" href="setmode.php?mode=manuel"><img src="cog.png"></a><p>AUTO : ON</p></div>';
?>

<!--Structure HTML-->
<html>
	<head>
		<title>AUTOVOLET</title>
				<meta name="viewport" content="width=device-width, initial-scale=0.5">
		<link rel="stylesheet" type="text/css" href="style.css" />

		<!--<meta http-equiv="refresh" content="10" > <!--refresh chaque 10 sec -->

	</head>
  	
	<body>
		<main>
  		<header style="text-align:left;">AUTO<div>VOLET</div></header>
  		<div class="content hub"><br>
		<!--<h1><a align="left"	 href="index.html">< Retour</a></h1>-->
		<h1 align="left"><u>Données Acquises</u>:</h1>


	<!--<div style='width:%;'> -->
	<div align='left' id='sidebar' style='float:left;width:40%;height:20%;padding-left:5%; background-color:#292828;'>
		<?php
		  echo "<br>Température intérieure :<font color='orange'>" . $tempint ."</font>°C<br>";
		  echo "Température extérieure :<font color='orange'>" . $tempext . "</font>°C<br>";
		  echo "Luminosité <font color='orange'>: " . $lumin . " </font>lumen<br>";
		?>
	</div>
	       
	<div align='right' id='sidebar' style='float:right;width:40%;height:20%;padding-left:5%; background-color:#292828;'>
	
		<?php
		echo "<p align='left'>Etat :[<font color='green'>" . $etat . "</font>]<br>";
		echo "Ouverture : <font color='orange'>" . $ouverture . "</font><br>";
		echo "Mode :<font color='orange'> " . $mode . "</font><br>";
		echo "Charge batterie :<font color='orange'> " . $batterie . "</font>% </p><br>";
		?>
	</div>
 <!--</div> -->


<?php
// affichage données serveur et boutons d'interaction utilisateur


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
?>
    </div>
    <footer>Théo Gicquel - Terminale STI2D 2017-2018</footer>
    </main>
  </body>
</html>
