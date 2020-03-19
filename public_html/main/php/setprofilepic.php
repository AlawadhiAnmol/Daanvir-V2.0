<?php 
require '../db/init.php'; 
	if(isset($_FILES['profilepic'])){   
		$file_name=$_FILES['profilepic']['name'];
		$file_size=$_FILES['profilepic']['size'];
		$file_tmp=$_FILES['profilepic']['tmp_name'];
		$file_type=$_FILES['profilepic']['type'];
 	$file_ext=explode('.',$_FILES['profilepic']['name']);
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
			$path="Hail".$pre.$userData['userId'];
			$target="../Bubbles/images/".$path."/".$file_name;
			$target_db="Bubbles/images/".$path."/".$file_name;
			if(!is_dir("../Bubbles/images/".$path)){ 
				mkdir("../Bubbles/images/".$path,0777,true); 
			} 
		//echo "Testing "; 
			if(!file_exists("../Bubbles/images/".$path."/".$file_name)){
			move_uploaded_file($file_tmp,$target);
			$query="UPDATE users SET profilePic= '$target_db' WHERE
			userId = ".$_SESSION['userId']; 
			
			if($conn->query($query)===TRUE){ 
			//echo "SUCCESS!";
			echo $target_db;
			}else{ 
			//error
			 } 
			//basename($_FILES['profilePic']['name'])	
			}else if(file_exists("../Bubbles/images/".$path."/".$file_name) && $file_tmp == $userData['profilePic']){
				//do nothing
			}else if(file_exists("../Bubbles/images/".$path."/".$file_name)){
			//only update
			$query="UPDATE users SET profilePic= '$target_db' WHERE
			userId = ".$_SESSION['userId']; 
			
			if($conn->query($query)===TRUE){ 
			//echo "SUCCESS!";
			echo $target_db;
			
			}else{ 
			//error
			 } 
		} 
	} 	  
}
?>