<?php    
opcache_reset(); 
flush();
date_default_timezone_set('Asia/Calcutta');
$today = time(); 
$t = date('Y-m-d' , $today); 
$email_mode = false;
require('../db/init.php');
$email_mode=Sanitize($_POST['cb']);
$u = $userData['userId'];
$pic=Sanitize($_POST['pic']);
$fols=Sanitize($_POST['fols']);

$maincampline=$_POST['maincampline']; 
$maincampline=htmlentities($maincampline); 
$maincampline=utf8_encode(html_entity_decode($maincampline));
$maincampline=Sanitize($maincampline);


$camptext1=$_POST['camptext'];  
$camptext =str_replace('</fcollected>', '<br />',$camptext1);
$camptext =str_replace('<br style="margin-top:20px;margin-bottom:0px" />','x59087vyw',$camptext);
$camptext=Sanitize($camptext);
 
$camptext =str_replace('x59087vyw','<br style="margin-top:20px;margin-bottom:0px" />',$camptext); 
//&#10;  =  \n  ;  &#13;  =  \r

?>