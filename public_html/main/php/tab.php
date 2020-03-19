<?php 
//load connection
require '../db/init.php'; 
$tab= Sanitize($_POST['tab']);
if($tab=="interior"){ 
	//echo file_get_contents('acc.php');    
}
else if($tab=="speakfor"){ 
	echo file_get_contents('camp.php');  
}
else if($tab=="goodwill"){
	echo file_get_contents('goodwill.php');  
}
else if($tab=="hitlist"){
	echo file_get_contents('hitlist.php');  
}
?>