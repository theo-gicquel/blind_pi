//form2.php
<?php


echo file_put_contents("mode.dat",$_GET['mode']);
?>

<html>
<p> exemple : 127.0.0.1/form2.php?mode=off&ouverture=20</p>

</html>