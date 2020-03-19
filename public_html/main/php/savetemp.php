<?php 
require '../db/init.php'; 
$maincampline=$_POST['maincampline'];
$camptext=$_POST['camptext']; 
$tempPic=$_POST['pic']; ;
$find=array('motherfucker','son of a bitch','sex','porn');
$replace=array('m****r','s**o**b','s*x','p**n');
$camptext=str_replace($find,$replace,$camptext);
$maincampline=str_replace($find,$replace,$maincampline); 
$cryptedId=bcsub((bcmul($userData['userId'],rand(0,99999))),rand(0,125896));
$cryptedId = safe_($cryptedId);
$c = "Tem".$cryptedId; 
/*****/  
/*****/  
$path="Temp".$userData['userId']; 
if($tempPic==''){
$tempPic='images/speech.png';
}else{
} 
$userId= $userData['userId'];
/****/ 
	if(!is_dir("../Candles/camps/mytemp/".$path)){ 
		mkdir("../Candles/camps/mytemp/".$path,0777,true); 
			}
	if(!file_exists("../Candles/camps/mytemp/".$path."/".$c.".php")){ 
	$campfile=fopen("../Candles/camps/mytemp/".$path."/".$c.".php","w");		
	fwrite($campfile,$camptext);
	fclose($campfile);
  $query="INSERT INTO templates (userId,tempName,tempCode,tempPic) VALUES ('$userId','$maincampline','$cryptedId','$tempPic')";
		if($conn->query($query)===TRUE){  
		echo 'Saved!';	 
	   }else{ 
		echo 'Not Saved!';
			//error  
			}  
	}
?>
 