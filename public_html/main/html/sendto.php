<?php
 
require '../db/init.php';  

$name=Sanitize($_POST['b']);
$email=Sanitize($_POST['c']);
$tel=Sanitize($_POST['d']); 
$text=Sanitize($_POST['f']); 
 
if(empty($name) || (!preg_match("/^[a-zA-Z]*$/",$name))){
	echo 0; exit();
}  
 
if(empty($text) || (!preg_match("/^[a-zA-Z0-9 .\-]+$/i",$text))){
	echo 0; exit();
}   
if((!preg_match('/^[0-9]{10}$/',$tel)) && strlen($tel)!=0){
	echo 0; exit();
}   
if(empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))){
	echo 0; exit();
}  
include 'mailer.php';
$mail->setFrom('noreply@daanvir.org', 'daanvir.org');
$mail->addAddress('Daanvir.help@gmail.com', 'Daanvir');   
 if(empty($sub))$sub="Mail From Website";
$mail->Subject = $sub;
$mail->Body = $text.'\n\n\tFrom: '.$name.'\n\t'.$email.'\n\t'.$tel; 

if(!$mail->send()) {
    echo 0; 
} else { 
  sleep(1);
  $mail->ClearAllRecipients();
  sleep(1); 
$mail->addAddress($email, $name);     // Add a recipient
$mail->addReplyTo('noreply@daanvir.org', '');
 
$mail->Subject = "Daanvir Auto-Reply";
$mail->Body = "Dear ".$name.",\n\n \tYour query has been received. We will soon approach you with an appropriate response\n\nRegards,\n\nTeam Daanvir.";
if(!$mail->send()) { 
echo 0;
}else{
echo 1;
}
}
?>

