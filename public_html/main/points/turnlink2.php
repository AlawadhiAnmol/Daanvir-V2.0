<?php require_once '../db/init.php'; ?>
<?php 
	if(loggedIn()===false and loggedIn()===true){ 
	echo 'login';
	}else{

$t=Sanitize($_POST['t']); 
$ln=Sanitize($_POST['a']); 
$stn=urldecode($_POST['c']); 
//$t=substr($t,14); 
	//CHANGED @2018
	//echo 'x,main/Traversal/Articles/'.$stn.'/'.$ln.$t.'.php';
	echo 'x,http://daanvir.org/blog2.php?id1='.$t.'&id2='.$ln.'&id3='.$stn;
	
	}
?>