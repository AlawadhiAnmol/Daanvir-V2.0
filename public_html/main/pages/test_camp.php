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

$maincampline=Sanitize($_POST['maincampline']);

$camptext=$_POST['camptext'];  

$maincampline=htmlentities($maincampline); 
$maincampline=utf8_decode(html_entity_decode($maincampline));
$camptext=str_replace('&#10;','+bxxxc12+',$camptext);
$camptext=str_replace('&#13;','+bxxxc13+',$camptext); 
$camptext=Sanitize($camptext);
$camptext=htmlentities($camptext); 
$camptext=utf8_decode(html_entity_decode($camptext));
//$camptext = preg_replace('/\s+/', ' ', $camptext);

//&#10;  =  \n  ;  &#13;  =  \r
$camptext1 =str_replace('+bxxxc12+','<br style="margin-top:20px;margin-bottom:0px">',$camptext);
$camptext1 =str_replace('+bxxxc13+','<br style="margin-top:20px;margin-bottom:0px">',$camptext1); 
$camptext =str_replace('+bxxxc12+','<br style="margin-top:10px;margin-bottom:0px">',$camptext);
$camptext =str_replace('+bxxxc13+','<br style="margin-top:10px;margin-bottom:0px">',$camptext);
echo $camptext1."<br><br>".$camptext;exit();

?>