<?php 
require '../db/init.php'; if(loggedIn()===false){  	echo 'Error: Please login first..'; 	exit(); 	}
$localities=Sanitize($_POST['ls']);  
$localities = explode(",", $localities);   
$localities_num=sizeof($localities);
if($localities<1){
	echo 'Could not load the list';
	exit();
	}
$fillers_temp=array();
for($i=0,$j=0;$i<$localities_num;$i++){
$checkbox=substr($localities[$i],14);   
//turn hitid to locid
$cb=null;
$ret=mysqli_query($GLOBALS['conn2'],"SELECT localityId FROM hitlist WHERE hitId = {$checkbox} "); 
	if(mysqli_num_rows($ret)==1)
		$kin=mysqli_fetch_assoc($ret);
		$cb=$kin['localityId'];
if($cb==null)exit();
$retrieve=mysqli_query($GLOBALS['conn2'],"SELECT DISTINCT userId from currfillmethod cfm WHERE EXISTS (
SELECT currentNeedId FROM currentneeds cn WHERE localityId='$cb' AND cfm.currentNeedId=cn.currentNeedId
) ORDER BY fillmethodId DESC"); 
	while($kind=mysqli_fetch_assoc($retrieve)){  
	$fillers_temp[$j]=$kind['userId']; 
	$j++;
				}  
	}  
$fillers=array_unique($fillers_temp);
	$population=sizeof($fillers); 
		if($population<1){
			if($localities_num==1){
	$te=' this locality';
	}else if($localities_num>1){
	$te=' these localities'; 
	}else{
		exit();
	}
		echo '<h2 style="padding:30px;
    font-size: 20px;
    color: #00BCD4;background-color:black">Be the first to support'.$te.'</h2>';
		exit();
	}
	$details=getDetails($fillers);
	print_Supps($userData['userId'],$fillers,$details,$population,$userData['city'],$userData['state'],$userData['country'],'supp');
 
?>