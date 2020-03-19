<?php if(empty($_SESSION)){ session_start();} 
if(empty($_SESSION['token'])) {    
	if (function_exists('mcrypt_create_iv')) {        
		$_SESSION['token'] = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));    
		} else {        
		$_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));    
		}
		}
	$token = $_SESSION['token'];
	
//error_reporting(E_ALL); 
require 'connect.php'; 
require 'users.php'; 

if (loggedIn()===true){ 
	$session_userId=$_SESSION['userId']; 
	$userData= userData($session_userId,'userId','userName','fName','lName','password','email','zip','phone','age','sex','dob','country','state','city','address','occupation','education','institution','bestQuality','started','pass_change_last','profilePic','active');

if(userActive($userData['userName'])=== false){
	unset($_SESSION['userId']);
	session_destroy(); 
	//header('Location:not.com'); 
		exit();
	} 
} 
	$errors=array();
?>