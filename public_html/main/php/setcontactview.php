<?php
require '../db/init.php'; 
$userId=$userData['userId']; 
	$q=mysqli_query($GLOBALS['conn'],"SELECT contactId FROM get_contacts WHERE userId = '$userId' AND hasEmail = 0 AND hasSms= 0");
	$num_rows=mysqli_num_rows($q);
	if($num_rows>0){
	while($row=mysqli_fetch_assoc($q)){	
	$cont=$row['contactId'];	
	$qin=mysqli_query($GLOBALS['conn'],"DELETE FROM get_contacts WHERE contactId='$cont' AND userId='$userId'");
		}		
	} 
	$e = -1; 
	//mysqli_query($GLOBALS['conn'], "LOCK TABLES get_contacts WRITE;"); 
	
	$q=mysqli_query($GLOBALS['conn'],"INSERT INTO `get_contacts`(`userId`,  `hasEmail`, `hasSms`) VALUES ('$userId', 0,0);");  
	
	//mysqli_query($GLOBALS['conn'], "UNLOCK TABLES;");
	
	$qin=mysqli_query($GLOBALS['conn'],"SELECT contactId FROM get_contacts WHERE userId = '$userId' AND hasEmail = 0 AND hasSms= 0;"); 
	$num_rows_in=mysqli_num_rows($qin); 
	echo $num_rows_in;
	if($num_rows_in==1){
		$row=mysqli_fetch_assoc($qin);
		$e=$row['contactId'];  
	} 
	echo $e;
	 

?>