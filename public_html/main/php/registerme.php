<?php
require '../db/init.php'; 
$tok=Sanitize($_POST['h']); 
if ((!empty($tok)) && hash_equals($_SESSION['token'], $tok)) {
	
}else{
	header("HTTP/1.1 429 Too Many Requests");
    echo "<h1 style=\"
    color: #ccc;
    font-size: 30px;
    width: calc(100%-200px);
    margin: auto;
    margin-top: 26px;
    padding: 100px;
    background: black;\">You've exceeded the number of login attempts. We've blocked IP address {$_SERVER['REMOTE_ADDR']} for a few minutes.</h1>";
   
	exit();
} 
$fullName=Sanitize($_POST['a']); 
$uName=Sanitize($_POST['c']);
$eMail=Sanitize($_POST['d']);
$Phone=Sanitize($_POST['e']);
$Pass=Sanitize($_POST['f']); 
$fName="";$lName="";
if(strlen($fullName)>50){
echo json_encode(array("a" => "Name exceeds the limit" ,"b" => "0"));
	exit();
}
//split fName into fName and lName
	$fullName=preg_replace("!\s+!"," ",$fullName);
	$fullName=explode(" ",$fullName); 
if(count($fullName)==1){
	$fName=$fullName[0]; 
}else if(count($fullName)==2){
	$fName=$fullName[0]; 
	$lName=$fullName[1];  
}else if(count($fullName)>2 && count($fullName)<7){ 
	$fName=$fullName[0]; 
	$lName=$fullName[1];
	$i=2;
	while($i<sizeof($fullName)){
		$lName=$lName." ".$fullName[$i];
		$i++;
	}  
	
}else{
echo json_encode(array("a" => "Error exists in name" ,"b" => "0"));
	exit();
	
} 
//validate;
$a=0;
$b=0; 
$c=0; 
$d=0; 
$e=0; 
$f=0;  
$err="Invalid inputs: ";
if(empty($fName) || (!preg_match("/^[a-zA-Z]*$/",$fName))){
	$a=1;
	$err.='  first name';
} 
if((!empty($lName)) && (!preg_match("/^[a-zA-Z]*$/",$lName))){
	$b=1;
	$err.='  last name';
} 
//longer than or equals five chars
if(empty($uName) || (!preg_match('/^[a-zA-Z0-9]{6,}$/',$uName)) ||strlen($uName)>15){
	$c=1;
	$err.='  username';
}
if(empty($eMail) || (!filter_var($eMail,FILTER_VALIDATE_EMAIL))){
	$d=1;
	$err.='  email';
}
if((!preg_match('/^[0-9]{10,12}$/',$Phone)) && strlen($Phone)!=0){
	$e=1;
	$err.='  phone';
} 
//!!! find a better way
if(empty($Pass) || strlen($Pass)<6 || (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=ยง!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=ยง!\?]{6,20}$/',$Pass)) || strlen($Pass)>20){
	$f=1;
	$err.='  password (char cases,digit,special sign)';
}
if($d==0){
$query=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE email= '$eMail'");
$num=mysqli_num_rows($query);
if($num>0){
	$d=1;
	$err.='  email already exists';
	}
}
if($c==0){
$query=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE username= '$uName'");
$num=mysqli_num_rows($query);
if($num>0){
	$c=1;
	$err.='  username already exists';
	}
}
if($a===0 && $b===0 && $c===0 && $d===0 && $e===0 && $f===0){
	//accept values  
$user=mysqli_query($GLOBALS['conn'],"INSERT INTO users (fName,lName,email,phone,username,password) VALUES('$fName','$lName','$eMail','$Phone','$uName',MD5('$Pass'))"); 

echo json_encode(array("a" => $err ,"b" => "1"));
//echo json_encode(array("a" => "0","b" => "0","c" => "0","d" => "0","e" => "0","f" => "0","r" => "1"));
}else{
echo json_encode(array("a" => $err ,"b" => "0"));
//echo json_encode(array("a" => $a,"b" => $b,"c" => $c,"d" => $d,"e" => $e,"f" => $f,"r" => "0"));
}
?>