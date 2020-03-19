<?php 
require '../db/init.php';  
//email
$data=Sanitize($_POST['c']);
include 'mailer.php';
  sleep(0.5);
  $mail->ClearAllRecipients();

if(empty($data) || ((!preg_match('/^[a-zA-Z0-9]{6,}$/',$data))&&(!filter_var($data,FILTER_VALIDATE_EMAIL))) || strlen($data)>35){ 
	echo 'Invalid entry';
	exit();
} 
  
 $u="";
 $use="";
 $m=""; 
 $query=null;
$r=mt_rand(100000,999999);
if(filter_var($data,FILTER_VALIDATE_EMAIL)){ 
$query=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE email= '$data' AND active=1");
}else if(preg_match('/^[a-zA-Z0-9]{6,}$/',$data)){
$query=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE username= '$data' AND active=1");}else{
echo 'Error in field';
exit(); 
}
$num=mysqli_num_rows($query);
$e=null;
if($num==1){
	$row=mysqli_fetch_assoc($query);
	$use=$row['userName'];
	$u=$row['userId'];
	$e=$row['email'];

$queryin=mysqli_query($GLOBALS['conn'],"SELECT * FROM activate WHERE userId= '$u'");
$numin=mysqli_num_rows($queryin);
if($numin==0){
$q=mysqli_query($GLOBALS['conn'],"INSERT INTO activate(LastCode,userId) VALUES('$r','$u')");
}else if($numin==1){
$q=mysqli_query($GLOBALS['conn'],"UPDATE activate SET LastCode='$r' WHERE userId='$u'");
}else{ 
echo 'Something went wrong';
exit();
}
}else{
echo 'Nothing matched with your information';
exit(); 
}
$m="Dear ".$use.", \n\nPlease visit the following link to reset password:\n\n http://daanvir.org/reset.php \n\nPlease use the following verification code:\t".$r."\n\nRegards,\nDaanvir Team";
//mail($e,"Change Password | Vifixes",$m,'From:noreply@Vifixes.com'."\r\n");
 
$mail->setFrom('noreply@daanvir.org', 'daanvir.org');
$mail->addAddress($e, 'Daanvir'); 
$mail->Subject = "Daanvir Support"; 
$mail->Body = $m;
if(!$mail->send()) {
echo  'Something went wrong'; 
exit();
}else{
echo 'Information was sent to your mail';
}



 ?>