<?php 
require '../db/init.php'; 

$w= Sanitize($_POST['w']); 
if($w==1){
$e= Sanitize($_POST['e']);
$d= Sanitize($_POST['d']); 
$t= Sanitize($_POST['t']); 
$l= strtoupper(Sanitize($_POST['l'])); 
	$d1=floor($d/60);
	$d2=floor($d-$d1*60);
	$dur=$d1.':'.$d2;
$date=date("Y/m/d");	
	//userid
if((!empty($t)) && (!empty($e)) && (!empty($l))){
$userid=null;
$check=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE email='$e'"); 
$num=mysqli_num_rows($check);  
	if($num==1){
	$row=mysqli_fetch_assoc($check);
	$userid=$row['userId']; 
$v_name=Sanitize($_FILES['i']['name']);
$th_name=Sanitize($_FILES['th']['name']);
//no spaces and special chars can be allowed in preg_ match, omit spaces and last four chars of extension
if($v_name!=null && $v_name!="" && $th_name!=null && $th_name!="" && preg_match('/^[a-zA-Z0-9]*$/',substr(str_replace(" ","",$v_name),0,-4)) && preg_match('/^[a-zA-Z0-9]*$/',substr(str_replace(" ","",$th_name),0,-4))){
//Sanitize Wont work here for tmp_name.
$v_tmp=$_FILES['i']['tmp_name']; 
$v_size=Sanitize($_FILES['i']['size']);  
$v_ext=strtolower(pathinfo($v_name,PATHINFO_EXTENSION)); 
$th_tmp=$_FILES['th']['tmp_name']; 
$th_size=Sanitize($_FILES['th']['size']);  
$th_ext=strtolower(pathinfo($th_name,PATHINFO_EXTENSION)); 
if($v_ext=="mp4" && $v_size < 1048576000 && ($th_ext=="jpg" || $th_ext=="png") && $th_size < 4194304){ 
//Also check php.ini settings
//reset default limit
			//print_r($errors); 
	$path="../Stories/Archives/".$userid;
	$pathDb="Stories/Archives/".$userid."/".$v_name;
	$th_path="../Stories/Thumbnails/".$userid;
	$th_pathDb="Stories/Thumbnails/".$userid."/".$th_name;
	if(!is_dir($path)){ 
		mkdir($path,0777,true); 
	} 
	if(!is_dir($th_path)){ 
		mkdir($th_path,0777,true); 
	} 
	$status=1;
	if(is_writable($path) && is_writable($th_path) ){
		if((!file_exists($path."/".$v_name)) && (!file_exists($th_path."/".$th_name))){  
	if(move_uploaded_file($v_tmp,$path."/".$v_name)==FALSE){
	$status=0;
	echo 'Video Upload Error. Try Again Later.<br>';
	}else{
	//Update db 
$upd=mysqli_query($GLOBALS['conn'],"INSERT INTO videos (userId,video_link,duration,title,date_mission,locality) VALUES ('$userid','$pathDb','$dur','$t','$date','$l')"); 
echo 'Your Video was added.<br>';
		}
	if(move_uploaded_file($th_tmp,$th_path."/".$th_name)==FALSE){
	$status=0;	
	echo 'Thumbnail Upload Error. Try Again Later.<br>';
	}else{
	//Update db 
$upd=mysqli_query($GLOBALS['conn'],"UPDATE videos SET thumb_link = '$th_pathDb' WHERE userId='$userid' AND title='$t' AND duration='$dur'"); 
echo 'Your Thumbnail was added.';
		}
	if($status==0){
		$st=0;
	if(file_exists($path."/".$v_name)){
		if(!unlink($path."/".$v_name)){
			echo 'Critical Error. Could not delete Video from File System';
		$st=1;
		}
		}
	if(file_exists($th_path."/".$th_name)){ 
		if(!unlink($th_path."/".$th_name)){
			echo 'Critical Error. Could not delete Thumbnail from File System';
		$st=1;
		}
		}
	if($st==0){
$upd=mysqli_query($GLOBALS['conn'],"DELETE FROM videos WHERE userId='$userid' AND title='$t' AND duration='$dur'"); 
echo 'Changes Rolled Back.<br>'; 
	}		
	}
		}else{
		echo "Rename File(s). Selected File Name(s) already exist(s)";
		}			 
	 }else{
				 echo 'Protected Or No Directory.';
     }		
}else{
	echo 'LIMIT_OR_FILE(s)_FORMAT_ERROR: Video Limit is 1000 MB. Image limit is 4 MB.<br>Video accepts .mp4 format only.<br>Thumbnail accepts .png or .jpg format only.';
}
}else{
	echo 'NAME_MISMATCH_OR_<br>EMPTY_FIELD_SET_ERROR: <br><br>Please rename the file. Special symbols not allowed!<br>';
}
}else{
	
	echo "Email Not Found.<br>";
}
}else{
	echo '<br>Please fill all fields.';
}
}else if($w==2){
$e= Sanitize($_POST['e']); 
$userid=null;
$check=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE email='$e'"); 
$num=mysqli_num_rows($check);  
	if($num==1){
	$row=mysqli_fetch_assoc($check);
	$userid=$row['userId']; 
$upd=mysqli_query($GLOBALS['conn'],"SELECT * FROM videos WHERE userId='$userid'");
$n=mysqli_num_rows($upd); 
if($n>0){ 
while($r=mysqli_fetch_assoc($upd)){
	$id=$r['videoId'];
	echo "<br>".$r['title']." | Duration: ".$r['duration']." | Locality: ".$r['locality']." | Date: ".$r['date_mission']."<br><input style='margin-left:0;padding:4px;width:60px;height:30px;font-size:16px' type=\"button\" value=\"Delete\" onclick=\"javascript:vS2(3,".$id.");\"><br>"; 
	}  
}else{
	echo "Nothing found for this email!<br>";
}
	}else{
		echo "Email does not exist.<br>";
	} 
}else if($w==3){ 
$j= Sanitize($_POST['j']);  
$check=mysqli_query($GLOBALS['conn'],"SELECT * FROM videos WHERE videoId={$j}"); 
$n=mysqli_num_rows($check);
if($n==0){
	echo 'Link not Found!';
}else if($n==1){
	$r=mysqli_fetch_assoc($check);
	$l=$r['video_link'];
	$th=$r['thumb_link'];
	if((file_exists("../".$l) && (!unlink("../".$l))) || (file_exists("../".$th) && (!unlink("../".$th)))){
		echo 'Error Occured Deleting.<br><br>';
	}else{
$check=mysqli_query($GLOBALS['conn'],"DELETE FROM videos WHERE videoId='$j'");  
echo 'Deleted!'; 
	}
}  
}
echo '<br><br><br><hr><br><a id="back-link" href="#" onclick="vid_load();">Back</a>';
?>


