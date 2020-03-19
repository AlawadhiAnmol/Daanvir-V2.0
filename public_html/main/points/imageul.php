<?php 

require '../db/init.php'; 

	$e= Sanitize($_POST['w']);
	if(isset($_FILES['i'])){   

		$file_name=$_FILES['i']['name'];

		$file_size=$_FILES['i']['size'];

		$file_tmp=$_FILES['i']['tmp_name'];

		$file_type=$_FILES['i']['type'];

 	$file_ext=explode('.',$_FILES['i']['name']);

	$file_ext=strtolower(end($file_ext));

		$expensions=array("jpeg","jpg","png"); 

		if((in_array($file_ext,$expensions)===false)||($file_size > 2097152)){

			//print_r($errors); 

		}else{
			$path=null;
		if($e==1){
			$path="States";
		}else if($e==2){
			$path="Localities";
		}else if($e==3){
			$path="Needs";
		} 
			$target="../FullGlass/images/".$path."/".$file_name;

			$target_db="FullGlass/images/".$path."/".$file_name;

			if(!is_dir("../FullGlass/images/".$path)){ 

				mkdir("../FullGlass/images/".$path,0777,true); 

			} 

		//echo "Testing "; 

			if(!file_exists("../FullGlass/images/".$path."/".$file_name)){

			if(!move_uploaded_file($file_tmp,$target)){
				
			echo "0*".null;
			}else{
			echo "1*".$target_db;
			}
			//$query=null;
				/*if($e==1){
					$query="UPDATE users SET profilePic= '$target_db' WHERE
					userId = ".$_SESSION['userId'];  
				}
			
			

			if($conn->query($query)===TRUE){ 

			//echo "SUCCESS!";

			echo $target_db;

			}else{ 

			//error

			 } */

			//basename($_FILES['profilePic']['name'])	

			}else if(file_exists("../FullGlass/images/".$path."/".$file_name)){

			//only update 
			echo "1*".$target_db;
 
		} 

	} 	  

}

?>