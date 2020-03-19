<?php  
require '../db/init.php';
//Sanitise later
$value=$_POST['value'];  
//$c=$value;
$value=$value-5185985;
  //users line 709
$fName=$lName=$email=$phone=$sex=$dob=$country=$state=$city=$occupation=$address=''; 
$pic='images/userpic.png';
$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM contacts WHERE contactId = '$value'");
	$num_rows=mysqli_num_rows($q);
	if($num_rows==1){
		$row=mysqli_fetch_assoc($q);
		$pic=$row['profilePic'];
		$fName=$row['fName'];
		$lName=$row['lName'];
		$email=$row['email'];
		$phone=$row['phone'];
		$sex=$row['sex']; 
		$dob=$row['dob']; 
		$country=$row['country'];
		$state=$row['state'];
		$city=$row['city'];
		$occupation=$row['occupation'];
		$address=$row['address'];
	} 
echo json_encode(array("pic" => $pic, "fName" => $fName, "lName" => $lName, "email" => $email, "phone" => $phone, "sex" => $sex,"dob" => $dob, "country" => $country, "state" => $state, "city" => $city, "occupation" => $occupation, "address" => $address));
?>