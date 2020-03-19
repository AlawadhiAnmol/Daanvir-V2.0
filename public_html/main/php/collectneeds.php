<?php 
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

require '../db/init.php'; 
if(loggedIn()===false){
	echo 'Error: Please login first.';
	exit();
} 
$k=Sanitize($_POST['k']);
if($k!=3){
$email_=$userData['email'];
$state  =null;
$city   =null;
$zip	=null;
$address=null;
if($k==0){
//no pickup	
}else if($k==1){ 
$state=Sanitize($_POST['c']);
$city=Sanitize($_POST['d']);
$zip=Sanitize($_POST['e']);
$address=Sanitize($_POST['f']);
}
$name=Sanitize($_POST['a']);
$phone=Sanitize($_POST['b']);
$email=Sanitize($_POST['g']); 
$date=Sanitize($_POST['h']); 
$date= date("Y-m-d", strtotime($date));

$needs=Sanitize($_POST['ns1']);  
$values=Sanitize($_POST['ns2']);  
$needs = explode(",", $needs);  
$values = explode(",", $values);   
$number1=sizeof($needs);
$number2=sizeof($values);
$uID=$userData['userId'];
if($number1!=$number2 || $number1<1){
echo 'Something went wrong!';
exit();
}
 
if($number1>0){
if(empty($name) || empty($phone)){
	echo 'Error: Some fields are empty';
	exit();
}
if($k==1 && empty($zip)){
	echo 'Error: Some fields are empty';
	exit();
}
if(!preg_match("/^[a-zA-Z ]*$/",$name) || !preg_match("/^[0-9]*$/",$phone) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo 'Error: Some field(s) are not valid';
	exit(); 
}
if($k==1 && (!preg_match("/^[0-9]{6}$/",$zip))){
	echo 'Error: Some field(s) are not valid';
	exit(); 
}
for($i=0; $i<$number1;$i++){
$checkbox=substr($needs[$i],18);
$checkbox_val=$values[$i];
$test=mysqli_query($GLOBALS['conn2'],"SELECT userId FROM currfillmethod WHERE userId={$uID} AND currentNeedId={$checkbox} AND dated=now()");
if(mysqli_num_rows($test)!=0){
	echo 'Error: You have already requested these needs today.';
	exit();
} 
}
	//date_default_timezone_set('Asia/Calcutta');
	//$today=time();
	//$pickfrom=date('y-m-d',$today); 
if($k==1){	 
//Add NeedFiller
$chkins=mysqli_query($GLOBALS['conn2'],"SELECT * FROM needfiller WHERE userId='$uID'"); 
$nmb=mysqli_num_rows($chkins);  
if($nmb>0){ 
$ins=mysqli_query($GLOBALS['conn2'],"UPDATE needfiller SET name='$name',email='$email',phone='$phone',state='$state',city='$city',address='$address',zip='$zip',date=now() WHERE userId='$uID'");
}else if($nmb==0){
$ins=mysqli_query($GLOBALS['conn2'],"INSERT INTO needfiller(userId,name,email,phone,state,city,address,zip,date) VALUES('$uID','$name','$email','$phone','$state','$city','$address','$zip',now())");
}
}else if($k==0){
//Add NeedFiller
$chkins=mysqli_query($GLOBALS['conn2'],"SELECT * FROM courfiller WHERE userId='$uID'"); 
$nmb=mysqli_num_rows($chkins);
if($nmb==1){ 
$ins=mysqli_query($GLOBALS['conn2'],"UPDATE courfiller SET fullname='$name',email='$email',phone='$phone',date=now() WHERE userId='$uID'");
}else if($nmb==0){
$ins=mysqli_query($GLOBALS['conn2'],"INSERT INTO courfiller(userId,fullname,email,phone,date) VALUES('$uID','$name','$email','$phone',now())"); 
}
}
$n=0;
if($k==1){
$chk=mysqli_query($GLOBALS['conn2'],"SELECT needFillerId FROM needfiller WHERE userId='$uID'"); 
$n=mysqli_num_rows($chk); 
}else if($k==0){
$chk=mysqli_query($GLOBALS['conn2'],"SELECT courFillerId FROM courfiller WHERE userId='$uID'"); 
$n=mysqli_num_rows($chk); 
} 
if($n>0){   
for($i=0; $i<$number1;$i++){  
$checkbox=substr($needs[$i],18);  
$checkbox_val=$values[$i];    
$upd=mysqli_query($GLOBALS['conn2'],"INSERT INTO currfillmethod (userId,confirmed,dated,currentNeedId,currNeedFillNum,schedule_date,pickup) VALUES ('$uID',1,now(),'$checkbox','$checkbox_val','$date','$k')"); 
}
echo 1;
}else{
	echo 'An error occurred while processing your request';
	exit();	
} 
}else{
	echo 'Please try again later';
	exit();	
}  }
else if($k==3){ 
$name  = Sanitize($_POST['a']);
//Phone required only if sms service to be included :) 
$phone = Sanitize($_POST['b']);
$email = Sanitize($_POST['g']);  
$block = Sanitize($_POST['bl']);  
$total = Sanitize($_POST['tot']); 
$gateway = Sanitize($_POST['pg']); 

/*
1 = paytm
2 = payumoney
3 = oxigen
4 = mobikwik
*/

$ordr_id = null;
$u=$userData['userId'];
$inc_u=0;
while((strlen($inc_u) + strlen($u)) < 12){
$inc_u.="0";	
} 

$inc_u=$u;
$cust_id = "CUST0831".$inc_u;
$get_ordr = mysqli_query($GLOBALS['conn2'],"SELECT ordr_id FROM transac WHERE cust_id = '$u' ORDER BY date DESC LIMIT 1");
$substr = 4 + strlen($u);
if(mysqli_num_rows($get_ordr)==1){
$ordr_id_num = (int)substr($ordr_id_num, $substr);
$ordr_id_num++;
$ordr_id = "ords".$u.$ordr_id_num;
}else if(mysqli_num_rows($get_ordr)==0){ 
$ordr_id = "ords".$u.mt_rand(100000,999999999999);
}else{
	echo 'Something went wrong while processing';
	exit();
}
if($ordr_id===null || $total < 0){
	echo 'Something went wrong while processing';
	exit();
}
$needs=Sanitize($_POST['ns1']);  
$values=Sanitize($_POST['ns2']);  
$needs = explode(",", $needs);  
$values = explode(",", $values);     
$number1=sizeof($needs);
$number2=sizeof($values); 
if($number1!=$number2 || $number1<1){
echo 'Something went wrong!';
exit();
}
if(empty($name) || empty($phone) || empty($block)){
	echo 'Error: Some fields are empty';
	exit();
}
if(empty($block)){
	echo 'Error: Please refresh try again';
	exit();
}
if(!preg_match("/^[a-zA-Z ]*$/",$name) || !preg_match("/^[0-9]*$/",$phone) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo 'Error: Some field(s) are not valid';
	exit(); 
} 
$session_arr = $name."/".$phone."/".$email."/".$total."/".$cust_id;

if($number1>0){
for($i=0; $i<$number1;$i++){ 
$checkbox=substr($needs[$i],18);  
$session_arr.=$checkbox.",";
}
$session_arr = rtrim($session_arr,',');
$session_arr .=$session_arr."/";
for($i=0; $i<$number1;$i++){
$checkbox=$values[$i];
$session_arr.=$checkbox.",";
}
$session_arr = rtrim($session_arr,',');
}
$_SESSION[$ordr_id] = $session_arr;

//k1 Processing repeat on callback page
 
$_SESSION['total_amount'] = $total;
$_SESSION['cust_id'] = $cust_id;
$_SESSION['ordr_id'] = $ordr_id;
$_SESSION['block_id'] = $block;

 //echo $total." & ".$cust_id." & ".$ordr_id." & ".$block;
 echo 1;
 }


?>