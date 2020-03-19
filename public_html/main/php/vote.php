<?php 
//load connection
require '../db/init.php'; 
$v= $_POST['va']; 
$u=$userData['userId'];
//get campId from campName
$campId=mysqli_query($GLOBALS['conn'],"SELECT campId FROM campaigns WHERE campName = '$v'");	
	$num_rows=mysqli_num_rows($campId);
if($num_rows == 1){
	$row=mysqli_fetch_assoc($campId);
	$vo=$row['campId'];
	
	$vote=mysqli_query($GLOBALS['conn'],"SELECT Voted FROM whatsnew WHERE campId = '$vo' AND myId='$u'"); 
	$row_v=mysqli_fetch_assoc($vote); 
	$vot=$row_v['Voted'];
	//check t 
	if($vot=='0'){ 
	$vote=mysqli_query($GLOBALS['conn'],"UPDATE whatsnew SET Voted =1 WHERE campId = '$vo' AND myId='$u'"); 
	echo 'imin';
	}else{ 
	$vote=mysqli_query($GLOBALS['conn'],"UPDATE whatsnew SET Voted =0 WHERE campId = '$vo' AND myId='$u'");
	echo 'imout';
	} 
}	
?>