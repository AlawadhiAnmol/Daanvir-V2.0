<?php 
require '../db/init.php';  
$t=$_POST['t']; 
$t_sub= substr($t,3);

$userId= $userData['userId'];
$q=mysqli_query($GLOBALS['conn'],"Select * FROM templates WHERE userId = '$userId' AND tempCode = '$t_sub'"); 
$num_rows=mysqli_num_rows($q); 
if($num_rows==1){
$row=mysqli_fetch_assoc($q);
		$pic=$row['tempPic'];
		$head=$row['tempName']; 
			$diff=12- strlen($userData['userId']);
			$pre="";
			if($diff!=0){
			for($i=0;$i<12;$i++){
				$pre=$pre."0"; //string concatenation
			}
		} 
			$path="CampPic".$pre.$userData['userId'];
		$pic="./Bubbles/MyCampPics/".$path."/".$pic;
$path="Temp".$userData['userId'];  
if(file_exists("../Candles/camps/mytemp/".$path."/".$t.".php")){
		$f = file_get_contents("../Candles/camps/mytemp/".$path."/".$t.".php");
		$loaded= '<div class="camptext" id="textarea" onkeyup="showtext()" contentEditable="true" placeholder="Start typing in ">'.$f.'</div>';
		echo json_encode(array("head" => $head , "body" => $loaded, "class" => $t , "pic" => $pic)); 
	}else{}
}
?>