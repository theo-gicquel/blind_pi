<?php


echo file_put_contents("mode.dat",$_GET['mode']);
echo file_put_contents("ouverture.dat",$_GET['ouverture']);
?>

<html>
<p> exemple : 127.0.0.1/form2.php?mode=off&ouverture=20</p>

</html>
