<?php
require '../db/init.php';
$num=Sanitize($_POST['num']);  
echo 'main/pages/x'.$num.'.php';
	 
?>