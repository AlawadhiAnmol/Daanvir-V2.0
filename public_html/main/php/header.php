<!--<div id="parallax1"> </div><div id="clouds" class="speed1"></div><div id="clouds2" class="speed2"></div><div id="clouds3" class="speed3"></div><div id="clouds2" class="speed4"></div><div id="clouds2" class="speed6"></div><div id="clouds1" class="speed5"></div><div id="parallax2"></div><div id="b-spider"></div><div id="bl-spider"></div><div id="y-spider"></div><div id="mist"></div><div id="tl"> <h2>WELCOME</h2><p class="mid">To</p><p>A New Age</p></div><div id="cloud-bottom" class="cl-top"></div><div id="cloud-bottom" class="inv-cl"></div><div id="cloud-bottom" class="cl-bottom"></div>
-->
<div id="header-content" class="down"><div class="grid-n"><div id="logo"><img src="images/favicon.png"><h2 onclick="window.location='http://daanvir.org'">DaanVir</h2></div><div id="logo-p"><p></p></div></div><div class="grid-l"><nav class="clearfix outerfix"><ul class="clearfix"><li><a id="back" href="">Home</a></li><li><a href="#services">Services</a></li><li><a href="#works">Our Works</a></li><li><a href="#about">About</a></li><li><a href="#query">Queries?</a></li>
<?php if(loggedIn()===false){?>
<li><a href="html/register.php">Join Us</a></li>
<?php } ?>
</ul><a href="javascript:void(0);" id="pull"></a> </nav></div><div class="grid-s">
<?php
if(loggedIn()===true){  
?>
<script>
/*
//dynamic ajax submit
var $form=$('form');
$form.live('submit',
function(){
	$.post($(this).attr('action'),$(this).serialize(),function(response){
		//do here
		alert('Yeah');
	},'json'); 
	return false;
}
);
*/
</script>
<style type="text/css">
#logout{
	display:block;
}
#login{
	display:none;
}
</style>
<?php 
}else{
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
} 
//logout();

?>
<div id="logout" > 
<form method="post" action="javascript:logout();">
<input id="round" name="logout" type="submit" value="Logout!"/>  
</form> 
</div> 

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
logger();
?>
<div id="login-appear-support2">
<div id="login-appear-support-inner2"></div>
<div id="login-form-cover">
	<div id="login-form-cover-inner">
	    <h2>Login to see more</h2>
	    <form method="post" name="login"  action="">
	    	<input id="username" name="username" type="text" placeholder="Your Name" autocomplete="off" autocorrect="off" spellcheck="false"/>
	    	<input id="password" name="password" type="password" placeholder="Last Password" autocomplete="off" autocorrect="off" spellcheck="false"/>
	    	<div id="cover-submit">
	    	<input id="submit" name="login" type="submit" value="LOG IN"/>
	    	<h2 onclick="javascript:forgot();">Forgot Details?</h2>
	    	</div> 
	    	<!--
			<div id="cover-submit" class="center">
	    	<hr><h3>Or, Sign in with</h3><hr>
	    	</div>
	    	<div id="cover-submit" class="center">
	    	<div id="social-login" class="go"></div>&nbsp;
	    	<div id="social-login" class="fb"></div>&nbsp;
	    	<div id="social-login" class="tw"></div>
	    	</div>-->
			<div style="margin-top:200px;"></div>
	    </form>
	</div>
	
	<div id="login-form-cover-forgot">
		  <h2>Forgot your password?</h2>
		  <p id="forgotpa">Please help us identify you by providing your email address.</p>
	    <form>
	    	<input id="email" class="submit1e" type="text" placeholder="Enter your email" autocomplete="off" autocorrect="off" spellcheck="false"/> 
	    	<div id="cover-submit">
	    	<input id="submit1" class="submit1u" type="button" value="SEND"/>
	    	<h2 onclick="javascript:forgotusername();">Forgot Username?</h2>
	    	</div> 
	    	<div id="cover-submit" class="center">
	    	<hr><h3 class="h3hov" onclick="javascript:goback();">Go Back</h3><hr>
	    	</div> 			<div style="margin-top:200px;"></div>
	    </form>
	</div>
	
	<div id="login-form-cover-forgotusername">
		  <h2>Forgot your username?</h2>
		  <p id="forgotun">Please help us identify you by providing your email address.</p>
	    <form>
	    	<input id="email" class="submit2e" type="text" placeholder="Enter your email" autocomplete="off" autocorrect="off" spellcheck="false"/> 
	    	<div id="cover-submit">
	    	<input id="submit1" class="submit2u" type="button" value="SEND"/>  
	    	</div> 
	    	<div id="cover-submit" class="center">
	    	<hr><h3 class="h3hov" onclick="javascript:goback();">Go Back</h3><hr>
	    	</div> 
	    </form>
	</div>
</div>
</div>
<script language="javascript">
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
 
</div></div><div id="header-main" style="position:fixed; z-index:2;"> 
<!--
<div id="wrap-header"><div id="slide-content"><div id="slides" class="grid-left"> <div id="image" class="customise later"></div><img id="savethem" src="images/savethem.jpg" style="display:none;" alt="Loading Failed"></div><div id="ht"><div id="ht5"><canvas id="smoke"></canvas><img id="fire" src="images/giphy.gif" onload="init()"></div><div id="ht5"></div></div><div id="right_text" class="grid-right" style="background-color:#fff;margin-top:-10px;"></div></div><div style="clear:both;"></div></div>
-->
</div>
<!--
<div style="position:absolute; width:100%;z-index:21;margin-top:700px;background:#fff url(images/bg4.jpg) no-repeat 0 0;"><script type="text/javascript">$("#back").click(function(){return $("html, body").animate({scrollTop:0},600),!1});</script><script type="text/javascript">function prlx(){var e=document.getElementById("header-main"),t=document.getElementById("parallax1"),o=document.getElementById("parallax2"),d=document.getElementById("b-spider"),n=document.getElementById("bl-spider"),p=document.getElementById("y-spider"),l=document.getElementById("clouds"),s=document.getElementById("clouds2"),a=document.getElementById("clouds3"),m=document.getElementById("clouds1"),i=document.getElementById("cloud-bottom"),f=document.getElementById("mist"),g=document.getElementById("tl");e.style.top=window.pageYOffset/2.5+"px",o.style.top=window.pageYOffset/1.8+"px",d.style.top=window.pageYOffset/1.4+"px",n.style.top=window.pageYOffset/1.1+"px",p.style.top=window.pageYOffset/1.2+"px",s.style.top=-(window.pageYOffset/3.5)+"px",a.style.top=-(window.pageYOffset/4)+"px",t.style.top=-(window.pageYOffset/.8)+"px",l.style.top=-(window.pageYOffset/4.5)+"px",m.style.top=-(window.pageYOffset/2.5)+"px",i.style.top=-(window.pageYOffset/8.5)+"px",f.style.top=-(window.pageYOffset/.5)+"px",g.style.top=-(window.pageYOffset/.004)+"px",$(function(){$("#header-main").css({backgroundPosition:"0px 0px"}),$("#header-main").animate({backgroundPosition:"(-10000px -2000px)"},2e4,"linear")})}window.addEventListener("scroll",prlx,!1);</script>
<!-- Update One -->

 