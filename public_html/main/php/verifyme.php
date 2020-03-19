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
$type=Sanitize($_POST['d']);
include '../html/mailer.php';
  sleep(1);
  $mail->ClearAllRecipients();

if($type==1){
$uName=Sanitize($_POST['a']);
$eMail=null;
if(filter_var($uName,FILTER_VALIDATE_EMAIL)){ 
$query1=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE email= '$uName'");
$num=mysqli_num_rows($query1);
if($num==1){ 
$row=mysqli_fetch_assoc($query1);
$eMail=$uName; 
$uName=$row['userName']; 
}
} 
$c=0;
$d=0;
$u=0; 
$em=" ";
$use=" ";

if(empty($uName) || (!preg_match('/^[a-zA-Z0-9]{6,}$/',$uName)) || strlen($uName)>15){
	$c=1;
}
if(empty($eMail) || (!filter_var($eMail,FILTER_VALIDATE_EMAIL))){
	$d=1;
}
if($d==0){
$query1=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE email= '$eMail' AND active=0");
$num=mysqli_num_rows($query1);
if($num>1 || $num<1){
	$d=1;
}else{
$row=mysqli_fetch_assoc($query1);
$u=$row['userId'];
$use=$row['userName'];		
}
}

if($d==1 && $c==0){
$query=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE username= '$uName' AND active=0");
$num=mysqli_num_rows($query);
if($num>1 || $num<1){
	$c=1;
	}else{
$row=mysqli_fetch_assoc($query);
	$u=$row['userId'];
	$em=$row['email'];		
	}
}
if($d==0){
//email	
$r=mt_rand(100000,999999); 
$query=mysqli_query($GLOBALS['conn'],"SELECT * FROM activate WHERE userId= '$u'");
$num=mysqli_num_rows($query);
if($num==0){ 
$mail->setFrom('noreply@daanvir.org', 'daanvir.org');
$mail->addAddress($eMail, 'Daanvir'); 
$mail->Subject = "Verify your Daanvir account";   
	$query=mysqli_query($GLOBALS['conn'],"INSERT INTO activate(LastCode,userId) VALUES('$r','$u')");
	$m="Dear ".$use.", \n\nYour Daanvir Account Verification code is : ".$r;
	//mail($eMail,"Verify Daanvir Account",$m,'From:noreply@Daanvir.org'."\r\n");
$mail->Body = $m;

if(!$mail->send()) {}else{
echo 1;
} 
}else if($num==1){ 
	$query=mysqli_query($GLOBALS['conn'],"UPDATE activate SET LastCode='$r' WHERE userId='$u'");
	$m="Dear ".$use.", \n\nYour Daanvir Account Verification code is : ".$r;
	
$mail->setFrom('noreply@daanvir.org', 'daanvir.org');
$mail->addAddress($eMail, 'Daanvir'); 
$mail->Subject = "Verify your Daanvir account";    

$mail->Body = $m;

if(!$mail->send()) {}else{
echo 1;
}
	
	//mail($eMail,"Verify Daanvir Account",$m,'From:noreply@Daanvir.org'."\r\n");
//echo 1;
	}else{
echo 'x_01';
	}
}else if($c==0){
$r=mt_rand(100000,999999); 
 
$query=mysqli_query($GLOBALS['conn'],"SELECT * FROM activate WHERE userId= '$u'");
$num=mysqli_num_rows($query);
if($num==0){
$mail->setFrom('noreply@Daanvir.org', 'daanvir.org');
$mail->addAddress($eMail, 'Daanvir'); 
$mail->Subject = "Verify your Daanvir account"; 
	$query=mysqli_query($GLOBALS['conn'],"INSERT INTO activate(LastCode,userId) VALUES('$r','$u')");
	$m="Dear ".$uName.", \n\nYour Daanvir Account Verification code is : ".$r;
	//mail($eMail,"Verify Daanvir Account",$m,'From:noreply@Daanvir.org'."\r\n");
$mail->Body = $m;

if(!$mail->send()) {}else{
echo 1;
}
 
}else if($num==1){
$mail->setFrom('noreply@daanvir.org', 'daanvir.org');
$mail->addAddress($em, 'Daanvir'); 
$mail->Subject = "Verify your Daanvir account"; 
	$query=mysqli_query($GLOBALS['conn'],"UPDATE activate SET LastCode='$r' WHERE userId='$u'"); 
	$m="Dear ".$uName.", \n\nYour Daanvir Account Verification code is : ".$r;
	//mail($em,"Verify Daanvir Account",$m,'From:noreply@Daanvir.org'."\r\n");
$mail->Body = $m;

if(!$mail->send()) {}else{
echo 1;
}
	} else{
echo 'x_02';
	}
}else{
	//both 1 
echo 'x_03';
} 
}else if($type==2){ 
$un=Sanitize($_POST['e']); 
$code=Sanitize($_POST['c']);  
$tun=trim($un);
if(filter_var($un,FILTER_VALIDATE_EMAIL)){ 
$query1=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE email= '$un'");
$num=mysqli_num_rows($query1);
if($num==1){ 
$row=mysqli_fetch_assoc($query1); 
$un=$row['userName']; 
}
} 
if(preg_match('/^[0-9]{6}$/',$code) || !empty($tun) || preg_match('/^[a-zA-Z0-9]{6,}$/',$un) || strlen($un)<15){
$query=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE userName= '$un'");
$num=mysqli_num_rows($query);
if($num==1){
	$row=mysqli_fetch_assoc($query);
	$uId=$row['userId'];
$query1=mysqli_query($GLOBALS['conn'],"SELECT * FROM activate WHERE userId= '$uId' AND LastCode='$code'");
$num1=mysqli_num_rows($query1);
if($num1==1){
	$query2=mysqli_query($GLOBALS['conn'],"UPDATE users SET active=1 WHERE userId='$uId'");
	echo 1;
}
}
} 
}
 ?>