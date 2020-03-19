<?php
error_reporting(E_ALL);
$value= $_GET['query'];
$formfield= $_GET['field']; 

if(($formfield == "setfname")||($formfield == "setlname")||($formfield == "setcountry")||($formfield == "setstate")||($formfield == "setcity")||($formfield == "setedu")||($formfield == "setoccupation")||($formfield == "setbquality")||($formfield == "setinst")) {
if((strlen($value) < 2)||(strlen($value) > 32)||(preg_match("#[0-9]+#",$value))) {
echo "0";
}else{
 echo $value;
}
}/*
if($formfield == "setuname"){
	if((strlen($value) < 2)||(strlen($value) > 32)){ 
echo "0";
	}else{
 echo $value;
}
}
*/

if($formfield == "setaddress"){
	if((strlen($value) < 2)||(strlen($value) > 50)){ 
echo "0";
	}else{
 echo $value;
}
}

if($formfield == "setage") {
if((strlen($value) < 1 )|| (strlen($value) > 2 )||(($value) =="0" )|| (strlen($value) < 1 )||(!preg_match("#[0-9]+#",$value)) ) {
echo "0";
}else{
 echo $value;
}
} 

if($formfield == "setsex") {
	$check =0;
if(($value=="M")||($value=="m")||($value=="F")||($value=="f")||($value=="O")||($value=="o")){
	$check=1;
}	
if((strlen($value) != 1 )||($check!=1) ){
echo "0";
}else{
 echo $value;
}
$check=0;
} 

if($formfield == "setall") {
	echo"SAVE";
}
if($formfield == "setphone") {if((strlen($value) != 10 )||(!preg_match("#[0-9]+#",$value))) {echo "0";}else{ echo $value;}}if($formfield == "setzip") {if((strlen($value) != 6 )||(!preg_match("#[0-9]+#",$value))) {echo "0";}else{ echo $value;}} 

if($formfield == "setpassword") { 
if(strlen($value)<6){
echo "0";
} else if((preg_match("#[0-9]+#",$value)) && (preg_match("#[a-z]+#",$value)) && (preg_match("#[A-Z]+#",$value))){
 echo $value; //med
} else if((preg_match("#[0-9]+#",$value)) || (preg_match("#[a-z]+#",$value))){
 echo $value; //weak
}
} 
if($formfield == "setdob") {  $value = trim($value);$time = strtotime($value); $is_valid = date('Y-m-d', $time) == $value;if ($is_valid==false) { 
echo "0"; 
}else{
 echo $value; //weak
}
}  
if($formfield == "setemail") {
if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {
echo "0";
} else {
 echo $value;
}
}
 
?>