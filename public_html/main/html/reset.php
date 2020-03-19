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
$new=Sanitize($_POST['c']); 
$code=(int)Sanitize($_POST['b']);
$un = Sanitize($_POST['a']); 
	$c=0;
if(empty($un) || (!preg_match('/^[a-zA-Z0-9]{6,}$/',$un)) || strlen($un)>20){
	$c=1;
	echo 'type1@_('.$un.')_';
} 
if(!preg_match('/^[0-9]{6}$/',$code)){
	$c=1;
	echo 'type2@_';
} 
if(empty($new) || strlen($new)<6 || (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=ยง!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=ยง!\?]{6,20}$/',$new)) || strlen($new)>20){
	$c=1;
	echo 'type3@_('.$Pass.')_';
} 
if(filter_var($un,FILTER_VALIDATE_EMAIL)){ 
$query1=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE email= '$un'");
$num=mysqli_num_rows($query1);
if($num==1){ 
$row=mysqli_fetch_assoc($query1); 
$un=$row['userName'];	
}
}
if($c==0){
$query=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE userName= '$un'");
$num=mysqli_num_rows($query);
if($num==1){
	$row=mysqli_fetch_assoc($query);
	$u= $row['userId'];
$query1=mysqli_query($GLOBALS['conn'],"SELECT * FROM activate WHERE userId= '$u' AND LastCode='$code'");
$num1=mysqli_num_rows($query1);
if($num1==1){ 
$r=mt_rand(10000000,99999999);
$query2=mysqli_query($GLOBALS['conn'],"UPDATE users SET password=MD5('$new') WHERE userId='$u'");
$query3=mysqli_query($GLOBALS['conn'],"UPDATE activate SET LastCode='$r' WHERE userId='$u'");
	echo 1;
}else{
	echo '0xc_error_1';
}
}else{
	echo '0xc_error_2';
} 
}else{
	echo '0xc_error_3';
}


?>