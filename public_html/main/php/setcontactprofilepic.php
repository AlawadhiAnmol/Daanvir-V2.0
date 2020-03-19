<?php 
require '../db/init.php';
require './contacts.php';  
	if(isset($_FILES['contactprofilepic'])){   
		$file_name=$_FILES['contactprofilepic']['name'];
		$file_size=$_FILES['contactprofilepic']['size'];
		$file_tmp=$_FILES['contactprofilepic']['tmp_name'];
		$file_type=$_FILES['contactprofilepic']['type'];
		$file_ext=explode('.',$_FILES['contactprofilepic']['name']);
 	$file_ext=strtolower(end($file_ext));
		$expensions=array("jpeg","jpg","png"); 
		if((in_array($file_ext,$expensions)===false)||($file_size > 2097152)){
			//print_r($errors); 
		}else{
			$diff=12- strlen($userData['userId']);
			$pre="";
			if($diff!=0){
			for($i=0;$i<12;$i++){
				$pre=$pre."0"; //string concatenation
			}
		} 
			$path="Hail".$pre.$userData['userId'].'/contacts';
			$target="../Bubbles/images/".$path."/".$file_name;
			$target_db="./Bubbles/images/".$path."/".$file_name;
			if(!is_dir("../Bubbles/images/".$path)){ 
				mkdir("../Bubbles/images/".$path,0777,true); 
			} 
			//contactData 
			$contactId=$contId;
			//echo "...?".$contactId."...?";
		//echo "Testing "; 
			
			if(!file_exists("../Bubbles/images/".$path.'/'.$file_name)){
			move_uploaded_file($file_tmp,$target);
			
			echo $target_db;
		//basename($_FILES['contactprofilepic']['name'])	
			}else if(file_exists("../Bubbles/images/".$path.'/'.$file_name) && $file_tmp == $contactPic){ 
		//	echo $target_db;
				//do nothing
			}else if(file_exists("../Bubbles/images/".$path.'/'.$file_name)){
			//only update   
			echo $target_db;
			 //delete file
			//if (!unlink($target_db)){}else{}
		} 
	} 	  
}

?>