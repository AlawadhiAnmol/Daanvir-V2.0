<?php 
require '../db/init.php';   
	if(isset($_FILES['camp-picture'])){   
		$file_name=$_FILES['camp-picture']['name'];
		$file_size=$_FILES['camp-picture']['size'];
		$file_tmp=$_FILES['camp-picture']['tmp_name'];
		$file_type=$_FILES['camp-picture']['type'];
 	$file_ext=explode('.',$_FILES['camp-picture']['name']);
	$file_ext=strtolower(end($file_ext));
		$expensions=array("jpeg","jpg","png"); 
		if((in_array($file_ext,$expensions)===false)||($file_size > 3097152)){
			//print_r($errors); 
		}else{
			$diff=12- strlen($userData['userId']);
			$pre="";
			if($diff!=0){
			for($i=0;$i<12;$i++){
				$pre=$pre."0"; //string concatenation
			}
		} 
			$path="CampPic".$pre.$userData['userId'];
			$target="../Bubbles/MyCampPics/".$path."/".$file_name;
			$target_db="Bubbles/MyCampPics/".$path."/".$file_name;
			if(!is_dir("../Bubbles/MyCampPics/".$path)){ 
				mkdir("../Bubbles/MyCampPics/".$path,0777,true); 
			}  
			
			if(!file_exists("../Bubbles/MyCampPics/".$path.'/'.$file_name)){
			move_uploaded_file($file_tmp,$target); 
			echo $target_db; 
			}else{ 
			echo $target_db; 
			//only update   
		} 
	} 	  
} 

?>