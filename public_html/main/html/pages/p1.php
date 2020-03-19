 <div id="userhere">
<div id="left-reg"><!--Register part-->
<div id="register-wrap">
<div id="register-form-cover">
	<div id="register-form-cover-inner">
	   <!-- <h2>Join Us Now!</h2>-->
	    <form method="post" name="register" action="">
	    <h3 style="margin-top:0;">First Name:</h3>
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
	    <h3>Phone:</h3><input id="phonereg" name="phonereg" type="text" placeholder="Your 10 digit phone number" autocomplete="off" autocorrect="off" spellcheck="false"/> 
			<div id="error5"></div>
	    <h3>Password:</h3> 
	    	<input id="passreg" name="passreg" type="password" placeholder="Password must be more than 6 digits*" autocomplete="off" autocorrect="off" spellcheck="false"/>  
			<div id="error6"></div>
	    <h4>** By signing up, you agree to our <a id="tandclink" href="javascript:void(0);">terms and conditions</a></h4>
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
$.ajax({type:"POST",url:"php/registerme.php",data:g,dataType:"json",cache:false,success:function(n){  
if(n.r==1){
document.getElementById("error7").style.background="url('images/yes-icon.png') no-repeat center center";
window.location="activate.php";
}else{
if(n.a==1){
document.getElementById("error1").style.background="url('images/no-icon.png') no-repeat center center";
}	else{
document.getElementById("error1").style.background="url('images/yes-icon.png') no-repeat center center";
}	
if(n.b==1){
document.getElementById("error2").style.background="url('images/no-icon.png') no-repeat center center";
}	else{
document.getElementById("error2").style.background="url('images/yes-icon.png') no-repeat center center";
}	
if(n.c==1){
document.getElementById("error3").style.background="url('images/no-icon.png') no-repeat center center";
}	else{
document.getElementById("error3").style.background="url('images/yes-icon.png') no-repeat center center";
}	
if(n.d==1){
document.getElementById("error4").style.background="url('images/no-icon.png') no-repeat center center";
}	else{
document.getElementById("error4").style.background="url('images/yes-icon.png') no-repeat center center";
}	
if(n.e==1){
document.getElementById("error5").style.background="url('images/no-icon.png') no-repeat center center";
}else{
document.getElementById("error5").style.background="url('images/yes-icon.png') no-repeat center center";
}		
if(n.f==1){
document.getElementById("error6").style.background="url('images/no-icon.png') no-repeat center center";
}else{
document.getElementById("error6").style.background="url('images/yes-icon.png') no-repeat center center";
}	
document.getElementById("error7").style.background="url('images/no-icon.png') no-repeat center center";
}
},error:function(){
	alert('Error');
}}) 
});
</script>
</div>
<div id="mid-reg">
<div id="register-wrap">
<div id="register-form-cover">
	<div id="register-form-cover-inner">
	   <!-- <h2>Account Activation!</h2>-->
	    <form method="post" name="register"  action="">
	    <div id="entry-part-1">
		<h3 style="margin-top:95px;">Enter Email:</h3>
	    	<input id="emailreg" name="firstregname" type="text" placeholder="Your Email*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error1"></div>
	    <h3>Or  Enter Username:</h3>
	    	<input id="userregname" name="lastregname" type="text" placeholder="Your Username" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error2"></div>
	    <h4>You may want to check spam folder if you didn't receive any mail.</h4>
	    	<div id="cover-submit">
	    	<input id="regsubmit1" name="login" type="button" value="SEND ACTIVATION CODE!"/>
			<div id="error13"></div>
	    	</div>
			<br>
			</div><div id="rep-entry-part-1"></div>			
		 		
		</form>
	  </div>
	</div>
</div>
<script language="javascript">
$("#regsubmit1").click(function(){  
var b=$("#userregname").val();	
var a=$("#emailreg").val();	  
var g="a="+a+"&b="+b+"&d="+1;
$.ajax({type:"POST",url:"php/verifyme.php",data:g,success:function(n){  
if(n==1){
document.getElementById("error13").innerHTML="Email was sent! Please check your mail.";
setTimeout(function(){ 
document.getElementById("entry-part-1").style.display="none";
document.getElementById("rep-entry-part-1").style.display="block";
},1500);
}else{	 
document.getElementById("error13").innerHTML="Error. Please check fields";
}
},error:function(n){  
document.getElementById("error13").innerHTML="Unexpected Error.";
}}) 
});
$("#regsubmit2").click(function(){ 
var c=$("#lastregname").val();	 
var e=$("#user2regname").val();	
var g="c="+c+"&d="+2+"&e="+e;
$.ajax({type:"POST",url:"php/verifyme.php",data:g,success:function(n){
if(n==1){
document.getElementById("error16").innerHTML="Successfully Verified! Please Log In now.";
$("#lastregname").val('');
$("#user2regname").val('');
setTimeout(function(){ 
document.getElementById("entry-part-2").style.display="none";
document.getElementById("rep-entry-part-2").style.display="block";
},1500);
}else{  
document.getElementById("error16").innerHTML="Error. Please check fields";
}
}}) 
});
</script>

</div>
<div id="right-reg">
<div id="register-wrap">
<div id="register-form-cover">
	<div id="register-form-cover-inner">
	   <!-- <h2>Account Activation!</h2>-->
	    <form method="post" name="register"  action="">
	    <div id="entry-part-2">
			<br>
	    <h3 style="margin-top:80px;">Enter Username:</h3>
	    	<input id="user2regname" name="firstregname" type="text" placeholder="Your Username*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error1"></div>
		<h3>Enter Code:</h3>
	    	<input id="lastregname" name="lastregname" type="text" placeholder="6 digits code*" autocomplete="off" autocorrect="off" spellcheck="false"/>
			<div id="error5"></div> 
			<h4>This is a one-time use code.</h4> 
	    	<div id="cover-submit">
	    	<input id="regsubmit2" name="login" type="button" value="ACTIVATE MY ACCOUNT!"/>
			<div id="error16"></div>
			</div>
			</div><div id="rep-entry-part-2"></div>			
						
		</form>
	  </div>
	</div>
</div>

<div class="grid-s">
<?php
//if(loggedIn()===true){  
?>
<script>
/*
//dynamic ajax submit
var $form=$('form');
$form.live('submit',
function(){
	$.post($(this).attr('action'),$(this).serialize(),function(response){
		//do here
		 
	},'json'); 
	return false;
}
);
*/
</script>
<!--
<style type="text/css">
#logout{
	display:block;
}
#login{
	display:none;
}
</style>-->
<?php 
//}else{
?>
<style type="text/css">
#logout{
	display:none;
}
#login{
	display:block;
}
</style>
<?php 
//}  

?>
<!--
<div id="logout" > 
<form method="post" action="javascript:logout();">
<input id="round" name="logout" type="submit" value="Logout!"/>  
</form> 
</div> 
-->
<div id="login">
<div id="ir-settings"></div>
<div id="ir-settings2"></div>
<input id="round" type="submit" value="Login!"/> 
<script language="javascript"> 
function logout(){ 
hideit('logout');  
showit('login');   
window.location="points/logout.php";  
} 
function showit(div){ 
document.getElementById(div).style.display="block"; 
 }
function hideit(div){
	document.getElementById(div).style.display="none"; 
 }
function forgot(){
	hideit("login-form-cover-inner");
	showit("login-form-cover-forgot");
}
function forgotusername(){
	hideit("login-form-cover-forgot");
	showit("login-form-cover-forgotusername");
}
function goback(){
	hideit("login-form-cover-forgot");
	hideit("login-form-cover-forgotusername");
	showit("login-form-cover-inner");
}  
</script>  
<?php
//logger();
?>
<div id="login-appear-support2">
<div id="login-appear-support-inner2"></div>
<div id="login-form-cover">
	<div id="login-form-cover-inner">
	    <h2 style="padding-bottom:50px;">Login to see more</h2>
	    <form method="post" name="login"  action="">
	    	<input id="username" name="username" type="text" placeholder="Your Name" autocomplete="off" autocorrect="off" spellcheck="false"/>
	    	<input id="password" name="password" type="password" placeholder="Last Password" autocomplete="off" autocorrect="off" spellcheck="false"/>
	    	<div id="cover-submit">
	    	<input id="submit" name="login" type="submit" value="LOG IN"/>
	    	<h2 style="padding-top:50px;" onclick="javascript:forgot();">Forgot Details?</h2>
	    	</div>  
			<div id="cover-submit" class="center">
	    	<hr><h3>Or, Sign in with</h3><hr>
	    	</div>
	    	<div id="cover-submit" class="center">
	    	<!--<div id="social-login" class="go"></div>&nbsp;-->
	    	<div id="social-login" class="fb" onclick="loginfb()"></div>&nbsp;
	    	<!--<div id="social-login" class="tw"></div>-->
                <div id="social-login-error" style="color:#fff;font-size:12px;padding:5px;text-align:center"></div>
	    	</div> 
			<div style="margin-top:200px;"></div>
	    </form>
	</div>
	
	<div id="login-form-cover-forgot">
		  <h2 style="padding-bottom:50px;">Forgot your password?</h2>
		  <p id="forgotpa">Please help us identify you by providing your email address.</p>
	    <form>
	    	<input id="email" class="submit1e" type="text" placeholder="Enter your email" autocomplete="off" autocorrect="off" spellcheck="false"/> 
	    	<div id="cover-submit">
	    	<input id="submit1" class="submit1u" type="button" value="SEND"/>
	    	<h2 style="padding-top:50px;" onclick="javascript:forgotusername();">Forgot Username?</h2>
	    	</div> 
	    	<div id="cover-submit" class="center">
	    	<hr><h3  style="padding-top:50px;" class="h3hov" onclick="javascript:goback();">Go Back</h3><hr>
	    	</div> 			<div style="margin-top:200px;"></div>
	    </form>
	</div>
	
	<div id="login-form-cover-forgotusername">
		  <h2 style="padding-bottom:50px;">Forgot your username?</h2>
		  <p id="forgotun">Please help us identify you by providing your email address.</p>
	    <form>
	    	<input id="email" class="submit2e" type="text" placeholder="Enter your email" autocomplete="off" autocorrect="off" spellcheck="false"/> 
	    	<div id="cover-submit">
	    	<input id="submit1" class="submit2u" type="button" value="SEND"/>  
	    	</div> 
	    	<div id="cover-submit" class="center">
	    	<hr><h3 class="h3hov" onclick="javascript:goback();" style="padding-top:50px;">Go Back</h3><hr>
	    	</div> 
	    </form>
	</div>
</div>
</div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1807657979451474',
      xfbml      : true,
      cookie     : true,
      status     : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script> 

<script language="javascript">
function loginfb(){
if(!navigator.cookieEnabled){
alert('Please enable cookies to use this feature.');
return 0;
}
	 FB.login(function(response) {
  if (response.status === 'connected') {
    // Logged into your app and Facebook. 
if(response.authResponse){ 
	var a=response.authResponse.userID,b=response.authResponse.accessToken;	

document.getElementById("social-login-error").innerHTML="Connecting..";	
		/* make the API call */
		 FB.api(
    "/me",{fields:"last_name,first_name,email"},
    function (response) {
      if (response && !response.error) {
        /* handle the result */  
	  var g="id="+a+"&fname="+response.first_name+"&lname="+response.last_name+"&email="+response.email+"&set="+parseInt(1e6*Math.random())+"&chk="+b;
FB.getLoginStatus(function(response) {
  if (response.status === 'connected') {
    // the user is logged in and has authenticated your
    // app, and response.authResponse supplies
    // the user's ID, a valid access token, a signed
    // request, and the time the access token 
    // and signed request each expire
   // var uid = response.authResponse.userID;
   // var accessToken = response.authResponse.accessToken;
$.ajax({type:"POST",url:"../html/fblogin.php",data:g,success:function(n){ 
location.reload();
document.getElementById('social-login-error').innerHTML=n;
}});
  } else if (response.status === 'not_authorized') {
    // the user is logged in to Facebook, 
    // but has not authenticated your app
  } else {
    // the user isn't logged in to Facebook.
  }
 });
	}
    }
  )
  }
  } else if (response.status === 'not_authorized') {
    // The person is logged into Facebook, but not your app.
  } else {
    // The person is not logged into Facebook, so we're not sure if
    // they are logged into this app or not.
  }
}, {scope: 'email'});

 }
$(".submit1u").click(function(){
var c=$(".submit1e").val();	 	
var g="c="+c+"&d="+1;
$.ajax({type:"POST",url:"../html/forgot.php",data:g,success:function(n){  if(n==1)
document.getElementById("forgotpa").innerHTML="The information was sent to your email.";
}});
})
$(".submit2u").click(function(){
var c=$(".submit2e").val();	
var g="c="+c+"&d="+2;		 
$.ajax({type:"POST",url:"../html/forgot.php",data:g,success:function(n){ 
document.getElementById("forgotun").innerHTML="The information was sent to your email.";
}});
})
</script>
<div id="login-appear-support1"> 
<div id="login-appear-support-inner1"></div>
</div>
<div id="login-appear-support">
<div id="login-appear-support-inner"></div>
</div>
</div>
 
</div>

</div>
</div>
