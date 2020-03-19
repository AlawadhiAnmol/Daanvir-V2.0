<?php 

require '../db/init.php';  
registerProtect();  
?>
<!DOCTYPE html>
<html> 
<head><title>Daanvir</title><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no"><link rel="stylesheet" href="../normalize.css"><link rel="stylesheet" href="../css/acc.css"><link rel="stylesheet" href="../style.css"><link rel="stylesheet" href="../css/responsive.css"><link rel="stylesheet" href="../css/responsive_ac.css"><link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon"><link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'><link href="../css/jquery.bxslider.css" rel="stylesheet"/> <script src='../js/jquery.min.js'></script><script src="../js/jquery.bxslider.min.js"></script> <script type="text/javascript" src="../js/myjsfile.js"></script> <script type="text/javascript" src="../js/jquery.countTo.js"></script>
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/register.css"> 
  <script src="../js/jquery-ui.js"></script> </head>
 <body id="regBody">
<?php
include '../php/header.php'; 
?>
<!--Register part-->
<div id="register-wrap">
<div id="register-form-cover">
	<div id="register-form-cover-inner">
	    <h2>Join Us Now!</h2>
	    <form method="post" name="register" action="">
	    <h3>First Name:</h3>
	    	<input id="firstregname" name="firstregname" type="text" placeholder="Your First Name*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error1"></div>
	    <h3>Last Name:</h3>
	    	<input id="lastregname" name="lastregname" type="text" placeholder="Your Last Name*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error2"></div>
	    <h3>UserName:</h3>
	    	<input id="userregname" name="userregname" type="text" placeholder="Only Numbers and letters allowed*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error3"></div>
	    <h3>Email:</h3>
	    	<input id="emailreg" name="emailreg" type="email" placeholder="Type your email here*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error4"></div>
	    <h3>Phone:</h3>
	    	<input id="phonereg" name="phonereg" type="text" placeholder="Your 10 digit phone number" autocomplete="off" autocorrect="off" spellcheck="false"/> 
			<div id="error5"></div>
	    <h3>Password:</h3> 
	    	<input id="passreg" name="passreg" type="password" placeholder="Password must be more than 6 digits*" autocomplete="off" autocorrect="off" spellcheck="false"/>  
			<div id="error6"></div>
	    <h4>** By signing up, you agree to our <a href="javascript:void(0);">terms and conditions</a></h4>
	    	<div id="cover-submit">
	    	<input id="regsubmit" name="login" type="button" value="REGISTER ME!"/>
			<div id="error7"></div>
	    	</div>   
		</form>
	  </div>
	</div>
</div>
<script language="javascript">
$("#regsubmit").click(function(){
var a=$("#firstregname").val();	
var b=$("#lastregname").val();	
var c=$("#userregname").val();	
var d=$("#emailreg").val();		
var e=$("#phonereg").val();		
var f=$("#passreg").val();	 
var g="a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f;
$.ajax({type:"POST",url:"../php/registerme.php",data:g,dataType:"json",cache:false,success:function(n){ 
if(n.r==1){
document.getElementById("error7").style.background="url('../images/smile.png')";
window.location="activate.php";
}else{
if(n.a==1){
document.getElementById("error1").style.background="url('../images/angry.png')";
}	else{
document.getElementById("error1").style.background="url('../images/smile.png')";
}	
if(n.b==1){
document.getElementById("error2").style.background="url('../images/angry.png')";
}	else{
document.getElementById("error2").style.background="url('../images/smile.png')";
}	
if(n.c==1){
document.getElementById("error3").style.background="url('../images/angry.png')";
}	else{
document.getElementById("error3").style.background="url('../images/smile.png')";
}	
if(n.d==1){
document.getElementById("error4").style.background="url('../images/angry.png')";
}	else{
document.getElementById("error4").style.background="url('../images/smile.png')";
}	
if(n.e==1){
document.getElementById("error5").style.background="url('../images/angry.png')";
}else{
document.getElementById("error5").style.background="url('../images/smile.png')";
}		
if(n.f==1){
document.getElementById("error6").style.background="url('../images/angry.png')";
}else{
document.getElementById("error6").style.background="url('../images/smile.png')";
}	
document.getElementById("error7").style.background="url('../images/angry.png')";
}
},error:function(){
	alert('Error');
}}) 
});
</script>
<!--footer-->
<div id="footer"><div id="wrap-footer"><ul><li id="first"><h3>&copy; All Rights Reserved | 2016</h3></li><li id="second"><a><h3>Blog</h3></a></li><li id="third"><h3>|</h3></li><li id="third"><a><h3>Privacy Policy</h3></a></li><li id="third"><h3>|</h3></li><li id="third"><a><h3>Coverage</h3></a></li><li id="third"><h3>|</h3></li><li id="fourth"><a><h3>Legal Terms</h3></a></li></ul></div></div></div>
 