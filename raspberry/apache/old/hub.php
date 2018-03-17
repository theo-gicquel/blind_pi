<?php
/*Afficher les informations récupérées dans les fichiers, permettre de modifier
 *le mode de fonctionnement du volet (auto/manuel).
 */
$etat      = file_get_contents('etat.dat');
$tempint   = file_get_contents('tempint.dat');
$tempext   = file_get_contents('tempext.dat');
$lumin     = file_get_contents('lumin.dat');
$ouverture = file_get_contents('ouverture.dat');
$mode      = file_get_contents('mode.dat');
$batterie  = file_get_contents('batterie.dat');

?>
<html>
<head>
<!-- <meta name="viewport" content="width=device-width; maximum-scale=0.5; minimum-scale=1;" /> -->
<title>AUTOVOLET</title>
<link rel="stylesheet" href="main.css" />
<meta http-equiv="refresh" content="10" > <!--refresh chaque 10 sec -->
</head>
  <body>
  <main>
  <header style="text-align:center;">AUTO<div>VOLET</div></header>
  <div class="content hub">

<h1 align="left"><u>Données Acquises</u>:</h1>

<?php // affichage données
  echo "<p align='left'>Etat :[<font color='green'>" . $etat . "</font>]<br><br>";
  echo " Température intérieure :<font color='red'>" . $tempint ."</font>°C<br>";
  echo " Température extérieure :<font color='red'>" . $tempext . "</font>°C<br><br>";
  echo " Luminosité <font color='red'>: " . $lumin . " </font>lumen <br>";
  echo " Ouverture : <font color='red'>" . $ouverture . "</font><br>";
  echo " Mode :<font color='red'> " . $mode . "</font><br>";
  echo " Charge batterie :<font color='red'> " . $batterie . "</font>%<br></p>";
?>
<!--  <div class="hubbutton"><a href="setorder.php?order=haut"><img src="up.png"></a><p>OUVERTURE</p></div>
  <div class="hubbutton"><a href="setorder.php?order=bas"><img src="down.png"></a><p>FERMETURE</p></div>
-->

<?php if ($ouverture == haut):// vérification mode manuel/auto ?>
  <div class="hubbutton"><img src="up.png"></a><p>OUVERTURE</p></div>
  <div class="hubbutton"><a href="setorder.php?order=bas"><img src="down.png"></a><p>FERMETURE</p></div>
<?php else: ?>
  <div class="hubbutton"><a href="setorder.php?order=haut"><img src="up.png"></a><p>OUVERTURE</p></div>
  <div class="hubbutton"><img src="down.png"></a><p>FERMETURE</p></div>
<?php endif ?>







<?php if ($mode == auto):// vérification mode manuel/auto ?>
  <div class="hubbutton"><a style='background-color:#4AE826;' href="setmode.php?mode=manuel"><img src="cog.png"></a><p>AUTOMATISATION : ON</p></div>

<?php else: ?>
  <div class="hubbutton"><a style='background-color:#299810;' href="setmode.php?mode=auto"><img src="cog.png"></a><p>AUTOMATISATION : OFF</p></div>
<?php endif ?>




<!--  <div class="hubbutton"><a href="immigration.html"><img src="blank.png"></a><p>hello there</p></div>	-->
    </div>
 <!--   <footer>Théo Gicquel - Terminale STI2D 2017-2018</footer> -->
    </main>
  </body>
</html>