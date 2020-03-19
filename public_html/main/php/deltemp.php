<?php 
require '../db/init.php';  
$loaded=$_POST['loaded']; 
$t_sub= substr($loaded,3);
$userId= $userData['userId']; 

$path="Temp".$userId;  
if(!unlink("../Candles/camps/mytemp/".$path."/".$loaded.".php")){}else{}
$q=mysqli_query($GLOBALS['conn'],"DELETE FROM templates WHERE userId = '$userId' AND tempCode = '$t_sub'");
echo 'Deleted!'; 
?>