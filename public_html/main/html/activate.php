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
	    <h2>Account Activation!</h2>
	    <form method="post" name="register"  action="">
	    <div id="entry-part-1">
		<h3>Enter Email:</h3>
	    	<input id="emailreg" name="firstregname" type="text" placeholder="Your Email*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error1"></div>
	    <h3>Or Enter Username:</h3>
	    	<input id="userregname" name="lastregname" type="text" placeholder="Your Username" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error2"></div>
	    <h4>You may want to check spam folder if you didn't receive any mail.</h4>
	    	<div id="cover-submit">
	    	<input id="regsubmit1" name="login" type="button" value="SEND CODE!"/>
			<div id="error13"></div>
	    	</div>
			<br>
			</div><div id="rep-entry-part-1"></div>			
			<hr>
	    <div id="entry-part-2">
			<br>
	    <h3>Enter Username:</h3>
	    	<input id="user2regname" name="firstregname" type="text" placeholder="Your Username*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error1"></div>
		<h3>Enter Code:</h3>
	    	<input id="lastregname" name="lastregname" type="text" placeholder="6 digits code*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error5"></div> 
			<h4>This is a one-time use code.</h4> 
	    	<div id="cover-submit">
	    	<input id="regsubmit2" name="login" type="button" value="ACTIVATE!"/>
			<div id="error16"></div>
			</div>
			</div><div id="rep-entry-part-2"></div>			
						
		</form>
	  </div>
	</div>
</div>
<script language="javascript">
$("#regsubmit1").click(function(){  
var b=$("#userregname").val();	
var a=$("#emailreg").val();	  
var g="a="+a+"&b="+b+"&d="+1;
$.ajax({type:"POST",url:"../php/verifyme.php",data:g,success:function(n){  
if(n==1){
document.getElementById("error13").innerHTML="Email was sent! Please check your mail.";
setTimeout(function(){ 
document.getElementById("entry-part-1").style.display="none";
document.getElementById("rep-entry-part-1").style.display="block";
},1500);
}else{	 
document.getElementById("error13").innerHTML="Oops! Something went wrong.";
}
},error:function(n){  
document.getElementById("error13").innerHTML="Unexpected Error.";
}}) 
});
$("#regsubmit2").click(function(){ 
var c=$("#lastregname").val();	 
var e=$("#user2regname").val();	
var g="c="+c+"&d="+2+"&e="+e;
$.ajax({type:"POST",url:"../php/verifyme.php",data:g,success:function(n){
if(n==1){
document.getElementById("error16").innerHTML="Successfully Verified! Please Log In now.";
$("#lastregname").val('');	 
$("#user2regname").val('');
setTimeout(function(){ 
document.getElementById("entry-part-2").style.display="none";
document.getElementById("rep-entry-part-2").style.display="block";
},1500);
}else{  
document.getElementById("error16").innerHTML="Oops! Something went wrong.";
}
}}) 
});
</script>
<!--footer-->
<div id="footer"><div id="wrap-footer"><ul><li id="first"><h3>&copy; All Rights Reserved | 2016</h3></li><li id="second"><a><h3>Blog</h3></a></li><li id="third"><h3>|</h3></li><li id="third"><a><h3>Privacy Policy</h3></a></li><li id="third"><h3>|</h3></li><li id="third"><a><h3>Coverage</h3></a></li><li id="third"><h3>|</h3></li><li id="fourth"><a><h3>Legal Terms</h3></a></li></ul></div></div></div>
</body></html>