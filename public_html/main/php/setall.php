<?php
require '../db/init.php';
//Fetching Values from URL 
$setfName=Sanitize($_POST['setfname']);
$setlName=Sanitize($_POST['setlname']); 
$setpassword=Sanitize($_POST['setpassword']);
$setemail=Sanitize($_POST['setemail']);
$setage=Sanitize($_POST['setage']);
$setsex=Sanitize($_POST['setsex']);
$setaddress=Sanitize($_POST['setaddress']);
$setstate=Sanitize($_POST['setstate']);
$setcity=Sanitize($_POST['setcity']);
$setcountry=Sanitize($_POST['setcountry']);
$setbQuality=Sanitize($_POST['setbquality']);
$setinst=Sanitize($_POST['setinst']);$setedu=Sanitize($_POST['setedu']);$setzip=Sanitize($_POST['setzip']);
$setoccupation=Sanitize($_POST['setoccupation']);
$setphone=Sanitize($_POST['setphone']);
$setdob=Sanitize($_POST['setdob']); 
$u=$userData['userId'];$user=mysqli_query($GLOBALS['conn'],"Select password from users WHERE userId = '$u'"); $num=mysqli_num_rows($user);$pass="";if($num==1){	$row=mysqli_fetch_assoc($user);	$pass=$row['password'];}
//Insert query$setpassword=md5($setpassword);if($setpassword==$pass){
$query="UPDATE users SET 
fName= '$setfName',
lName='$setlName', 
email= '$setemail',
age= '$setage',sex= '$setsex',zip= '$setzip',
address= '$setaddress',
state= '$setstate',
city= '$setcity',
country= '$setcountry',
bestQuality= '$setbQuality',
institution= '$setinst',
education= '$setedu',
occupation= '$setoccupation',
phone= '$setphone',
dob= '$setdob' WHERE
userId = ".$_SESSION['userId'];
if($conn->query($query)===TRUE){ 
echo 1;
}else{
echo 0;
}}else{	echo 0;}
?>
