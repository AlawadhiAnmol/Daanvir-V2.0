<?php 
require '../db/init.php';
require './contacts.php'; 
  
$fName=Sanitize($_POST['fName']);
$lName=Sanitize($_POST['lName']); 
$email=Sanitize($_POST['email']);
$phone=Sanitize($_POST['phone']);
$sex=Sanitize($_POST['sex']);
$dob=Sanitize($_POST['dob']);
$country=Sanitize($_POST['country']);
$state=Sanitize($_POST['state']);
$city=Sanitize($_POST['city']);
$occupation=Sanitize($_POST['occupation']);
$address=Sanitize($_POST['address']); 
$picUrl=Sanitize($_POST['thisPic']);

if(((!preg_match('/^[0-9]{10}$/',$phone)) && strlen($phone)!=0) || (empty($email) || (!filter_var($email,FILTER_VALIDATE_EMAIL))) ||  (!preg_match("/^[a-zA-Z]*$/",$lName)) || (!preg_match("/^[a-zA-Z]*$/",$fName))){ 
	exit(0);
} else{ 
$chk=mysqli_query($GLOBALS['conn'],"SELECT * FROM contacts WHERE email = '$email'"); 
$num_rows=mysqli_num_rows($chk);
if($num_rows>0){   
//update only
	$row=mysqli_fetch_assoc($chk);
	$temp=$row['contactId'];
	//PicUrl must be brought from the DB
	if($picUrl=='images/userpic.png'){
	$picUrl=$row['profilePic']; 
	}

if($phone!='' && $phone!=0){
$hasSms=1;
}else{ 
$hasSms=0;
}
$query=mysqli_query($GLOBALS['conn'],"UPDATE contacts SET
fName='$fName',
lName='$lName',
email='$email',
phone='$phone',
sex='$sex',
dob='$dob',
country='$country',
state='$state',
city='$city',
occupation='$occupation',
profilePic='$picUrl',
address='$address' WHERE contactId = '$temp'"); 
 
$q=mysqli_query($GLOBALS['conn'],"UPDATE get_contacts SET 
hasSms='$hasSms'
WHERE contactId = '$temp'");

echo json_encode(array("r" => "Success!", "p" => $picUrl)); 
}else{
$chk=mysqli_query($GLOBALS['conn'],"SELECT * FROM contacts WHERE phone = '$phone'"); 
$num_rows=mysqli_num_rows($chk);
if($num_rows>0){
$phone='';
}
if($email!=''){
$hasEmail=1;
}else{ 
$hasEmail=0;
}
if($phone!='' && $phone!=0){
$hasSms=1;
}else{ 
$hasSms=0;
}

$lastEmpty=mysqli_query($GLOBALS['conn'],"SELECT contactId FROM contacts WHERE email = '' OR phone = ''");
$num_rows=mysqli_num_rows($lastEmpty);
	if($num_rows>0){
	while($row=mysqli_fetch_assoc($lastEmpty)){	 
	$qin=mysqli_query($GLOBALS['conn'],"DELETE FROM contacts WHERE contactId= ".$row['contactId']." AND email = ''");
		}		
	} 	
$qu=mysqli_query($GLOBALS['conn'],"INSERT INTO contacts (contactId,email) VALUES ('".$contId."','')");   
$qu=mysqli_query($GLOBALS['conn'],"SELECT * FROM contacts WHERE contactId = '$contId'");
$num_rows_in=mysqli_num_rows($qu); 
	if($num_rows_in==1){  
//Pic 
if(strlen($email)<10 || strlen($fName)<3 || strlen($fName)<3 ){
echo json_encode(array("r" => "Invalid!", "p" => $picUrl));
}else{
//Insert query
$query="UPDATE contacts SET
fName='$fName',
lName='$lName',
email='$email',
phone='$phone',
sex='$sex',
dob='$dob',
country='$country',
state='$state',
city='$city',
occupation='$occupation',
profilePic='$picUrl',
address='$address' WHERE contactId = '$contId'"; 
if($conn->query($query)===TRUE){ 
$q="UPDATE get_contacts SET
hasEmail='$hasEmail',
hasSms='$hasSms'
WHERE contactId = '$contId'";
	if($conn->query($q)===TRUE){ 
echo json_encode(array("r" => "Success!", "p" => $picUrl));

	//Delete Unnecessary
$delq=mysqli_query($GLOBALS['conn']," DELETE FROM contacts c WHERE c.email=''");
	//Delete Unnecessary
$delq=mysqli_query($GLOBALS['conn']," SELECT contactId
FROM   get_contacts gc 
WHERE userId= ".$userData['userId']." AND  NOT EXISTS (
   SELECT contactId      
   FROM   contacts c
   WHERE  gc.contactId = c.contactId)");
$num_rows_d=mysqli_num_rows($delq);
	if($num_rows_d>0){ 
 while($row=mysqli_fetch_assoc($delq)){ 
	$qin=mysqli_query($GLOBALS['conn'],"DELETE FROM get_contacts WHERE contactId= ".$row['contactId']);
				}
			} 
		}else{
echo json_encode(array("r" => "Error!", "p" => $picUrl));
		}
	}else{
	if (!unlink(".".$picUrl)){}else{}
		
echo json_encode(array("r" => "Error!", "p" => $picUrl));
		}
	}
  }
}}
?>