<?php 
$contId=NULL;
$contactPic=NULL;
	$qin=mysqli_query($GLOBALS['conn'],"SELECT contactId FROM get_contacts WHERE userId = ".$userData['userId']." AND hasEmail = 0 AND hasSms= 0"); 
	$num_rows_in=mysqli_num_rows($qin); 
	if($num_rows_in==1){
		$row=mysqli_fetch_assoc($qin);
		$contId=$row['contactId'];  
	} 
$q=mysqli_query($GLOBALS['conn'],"SELECT profilePic FROM contacts WHERE contactId = '$contId'"); 
	$num_rows_in=mysqli_num_rows($q); 
	if($num_rows_in==1){
		$row=mysqli_fetch_assoc($q);
		$contactPic=$row['profilePic'];  
	} 
?>
