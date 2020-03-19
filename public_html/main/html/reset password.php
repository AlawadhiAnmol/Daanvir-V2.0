<?php
 
require '../db/init.php';  
registerProtect();  
?>
<!DOCTYPE html>
<html> 
<head><title>Vifixes</title><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no"><link rel="stylesheet" href="../normalize.css"><link rel="stylesheet" href="../css/acc.css"><link rel="stylesheet" href="../style.css"><link rel="stylesheet" href="../css/responsive.css"><link rel="stylesheet" href="../css/responsive_ac.css"><link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon"> 
<script src='../js/jquery.min.js'></script> 
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/register.css"> 
  <script src="../js/jquery-ui.js"></script> </head>
 <body id="regBody">
<?php
include '../php/header.php'; 
?>
<!--Register part-->
<div id="register-wrap" style="height:600px">
<div id="register-form-cover" style="height:600px">
	<div id="register-form-cover-inner" style="height:480px">
	    <h2>Reset Password!</h2>
	    <form method="post" name="register"  action="">
	    <div id="entry-part-3">
		<h3>Enter Username:</h3>
	    	<input id="emailreg" name="firstregname" type="text" placeholder="Your Username*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error1"></div>
	    <h3>Enter Code:</h3>
	    	<input id="userregcode" name="lastregname" type="text" placeholder="6 digits code*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error2"></div>
	    <h3>New Password:</h3>
	    	<input id="userregpass" name="lastregname" type="password" placeholder="more than 6 digits*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error3"></div>
	    <h4>Please be patient if you didn't receive any code.</h4>
	    	<div id="cover-submit">
	    	<input id="regsubmit1" name="login" type="button" value="Change Password!"/>
			<div id="error13"></div>
	    	</div>
			<br>
			</div><div id="rep-entry-part-3"></div>				
		</form>
	  </div>
	</div>
</div>
<script language="javascript">
$("#regsubmit1").click(function(){  
var c=$("#userregpass").val();	
var b=$("#userregcode").val();	
var a=$("#emailreg").val();	  
var g="a="+a+"&b="+b+"&c="+c;
$.ajax({type:"POST",url:"../html/reset.php",data:g,success:function(n){  
if(n==1){
document.getElementById("error13").innerHTML="Password successfully changed!";
setTimeout(function(){ 
document.getElementById("entry-part-3").style.display="none";
},1500);
document.getElementById("rep-entry-part-3").style.display="block";
}else{	 
document.getElementById("error13").innerHTML="Oops! Something went wrong.";
}
},error:function(n){  
document.getElementById("error13").innerHTML="Unexpected Error.";
}}) 
});
</script>
<!--footer
<div id="footer"><div id="wrap-footer"><ul><li id="first"><h3>&copy; All Rights Reserved | 2016</h3></li></ul></div></div></div>-->
</body></html>