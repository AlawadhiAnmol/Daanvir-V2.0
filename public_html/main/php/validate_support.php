<?php
require '../db/init.php';  
if(loggedIn()===false){  
	echo 'Error: Please login first..'; 
	exit(); 
	}  
$value= $_POST['obj']; $q= $_POST['c'];   $value=substr($value,5); $value=($value-451);  if($value<1){		exit();}
$checked_support=checkSupport($userData['userId'],$value);
if($checked_support===true && $q==2){ 
$query=mysqli_query($GLOBALS['conn'],"DELETE FROM `supports` WHERE myId = ".$userData['userId']." AND suppId = ".$value);
	echo 1;
}else if($checked_support===false && $q==1){ 
$query=mysqli_query($GLOBALS['conn'],"INSERT INTO supports (myId,suppId) VALUES (".$userData['userId'].",".$value.")");
	echo 1;
}else{       
	echo 'Error!';  
}  
function checkSupport($uId,$value){
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM supports WHERE myId = ".$uId." AND suppId = ".$value);
	$num_rows=mysqli_num_rows($q); 
	if($num_rows>=1){
		return true;  
	}else if($num_rows==0){
		return false;
	}else{
		return 'error';
	}
	return;
}
 

?>