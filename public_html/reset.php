<?php include 'main/db/init.php';
//isLoggedIn();
?>
<head><title>Daanvir: Reset Password</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no"><meta name="description" content="Reset Your Daanvir Password here." />
        <meta name="keywords" content="" />
        <meta name="author" content="" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> <link rel="stylesheet" href="normalize.css"> 
<link rel="shortcut icon" href="main/images/favicon.png" type="image/x-icon">
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/style2.css">
<link rel="stylesheet" href="css/style2_small.css"> 
<link rel="stylesheet" href="css/reset.css">  
<script type="text/javascript" async defer 
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8fz_GTPq7uPnoHc6zFmTzNcNRRqKbwO8&libraries=visualization">
  </script>	 
 </head>
<?php  
registerProtect();     
logger();
?>
<body>
    <div id="page">  
			<header class="cd-header nav-down">
				<div id="cd-logo"><a href="http://daanvir.org"><img src="main/images/favicon.png" alt="Logo" id="logo_image"></a></div>
		
				<nav class="cd-main-nav">
					<ul>
						 <li><a href="#part-5">Contact</a></li>
						<li><a href="#page" onclick="bring(1)" id="bring"class="bringme">Login</a></li> 
					</ul>
				</nav> <!-- cd-main-nav -->

			</header>
<script>  
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('.cd-header').outerHeight();

$(window.document).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 250);

function hasScrolled() {
    var st = $(this).scrollTop();
     
    if(Math.abs(lastScrollTop - st) <= delta)
        return; 
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('.cd-header').css("top","-70px");
    } else {
        // Scroll Up 
            $('.cd-header').css("top","0px"); 
    } 
    lastScrollTop = st;
}
</script> 

<script> 
function bring(e){ 
document.body.style.background="rgba(0,0,0,0.8)";
if(e==1){
if($(".login").css("display","none")){ 
$(".login").css("display","block");
} 
$("#forms").css("top","60px");
document.getElementById("forms").style.transitionDuration="0.5s";

}else if(e==2){
$('.emailreg').val($('.copyemail').val());	
if($(".signup").css("display","none")){ 
$(".signup").css("display","block");
} 
$("#forms").css("top","5px");
document.getElementById("forms").style.transitionDuration="0.5s";

}else if(e==3){    
if(!($(".login").css("display","none"))){ 
$(".login").css("display","none");
}
if(!($(".recover").css("display","none"))){ 
$(".recover").css("display","none");
}
bring(2);
}else if(e==4){    
if(!($(".signup").css("display","none"))){ 
$(".signup").css("display","none");
}    
if(!($(".recover").css("display","none"))){ 
$(".recover").css("display","none");
}
bring(1);
}else if(e==5){
if($(".recover").css("display","none")){ 
$(".recover").css("display","block");
} 
$("#forms").css("top","150px");
document.getElementById("forms").style.transitionDuration="0.5s";

}else if(e==6){    
if(!($(".login").css("display","none"))){ 
$(".login").css("display","none");
}    
if(!($(".signup").css("display","none"))){ 
$(".signup").css("display","none");
}
bring(5);
}

return;
}  
</script>
		<div id="forms">
<div id="DIV_1" class="login"> 
<a id="close_form"></a>
	<div id="DIV_2">
		<form id="FORM_3" method="post">
			<h1 id="H1_4">
				Login
			</h1>
			<p id="P_5">
				 
				<label for="username" id="LABEL_6">
					Email or username
				</label>
				<input id="INPUT_7" name="username_login" type="text" placeholder="myusername or mymail@mail.com" />
			</p>
			<p id="P_8">
				 
				<label for="password" id="LABEL_9">
					Password
				</label>
				<input id="INPUT_10" name="password_login" type="password" placeholder="eg. X8df!90EO"  autocomplete="off"/>
			</p>
			
			<input type="hidden" name="token" class="token" value="<?php
			echo $token;
			?>" />
			<p id="P_14">
				<input type="submit" value="Login" id="INPUT_15" />
			</p>
			Or Login Using
			
			<p id="P_14">
				<input type="button" onclick="loginfb();" style="background-color: #3b5998; border-color:#3b5998;
    background-image: linear-gradient(#4e69a2, #3b5998 50%);" value="facebook" id="INPUT_15" />
			</p> 
			
			<div id="errors2"></div>
			<p id="P_16">
				Not a member yet? <a href="javascript:" onclick="bring(3);" id="A_17">Join us</a>&nbsp; Or<a href="javascript:" onclick="bring(6);" id="A_17">Recover?</a>
			</p>
		</form>
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

document.getElementById("errors2").innerHTML="Connecting..";	
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
$.ajax({type:"POST",url:"main/html/fblogin.php",data:g,success:function(n){ 
location.reload();
document.getElementById('errors2').innerHTML=n;
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
</script>

	</div>

<div id="DIV_1" class="signup">
<a id="close_form2"></a>
	<div id="DIV_2">
		<form id="FORM_3">
			<h1 id="H1_4">
				Join Us
			</h1> 
			<p id="P_5">
				 
				<label for="fullname" id="LABEL_6">
					Name*
				</label>
				<input id="INPUT_7" class="fullregname" name="fullname" type="text" placeholder="myfirstname mylastname" />
			</p>
			
			<p id="P_5">
				 
				<label for="username" id="LABEL_6">
					Username*
				</label>
				<input id="INPUT_7" class="userregname" name="username" type="text" placeholder="myusername123" />
			</p>
			<p id="P_5">
				 
				<label for="e-mail" id="LABEL_6">
					Email*
				</label>
				<input id="INPUT_7" class="emailreg" name="e-mail" type="text" placeholder="mymail@mail.com" />
			</p>
			
			<p id="P_5">
				 
				<label for="phone" id="LABEL_9">
					Phone
				</label>
				<input id="INPUT_10" class="phonereg" name="phone" type="text" placeholder="919090909090" />
			</p>
			<p id="P_8"> 
				<label for="password" id="LABEL_9">
					Password* <span style="font-size:12px">(lowercase+uppercase+special character+digit, no spaces)</span>
				</label>
				<input id="INPUT_10" class="passreg" name="password" type="password" placeholder="eg. X8df!90EO"  autocomplete="off"/><input type="hidden" name="token_" class="token_" value="<?php
			echo $token;
			?>" />
			</p>
			By Signing up, you agree to our <a href="javascript:void(0);">terms and conditions</a>
			<p id="P_14">
				<input type="button" value="Sign Up" id="INPUT_15" class="regsubmit_" />
			</p>
			
			<div id="errors"></div>
			<p id="P_16">
				Already joined? <a href="javascript:" onclick="bring(4)" id="A_17">Login</a>&nbsp; Or<a href="javascript:" onclick="bring(6);" id="A_17">Recover?</a>
			</p>
		</form>
	</div> 
	</div>
<div id="DIV_1" class="recover">
<a id="close_form3"></a>
	<div id="DIV_2">
		<form id="FORM_3">
			<h1 id="H1_4">
				Recovery
			</h1>
			<p id="P_5">
				 
				<label for="username" id="LABEL_6">
				Email or username
				</label>
				<input id="INPUT_7" name="username" class="query_data" type="text" placeholder="myusername or mymail@mail.com" />
			</p> 
			You may want to check spam folder if you didn't receive any mail.
			<p id="P_14">
				<input type="button" class="submit1u" value="Help me" id="INPUT_15" />
			</p>
			
			<div id="errors3"></div>
			<p id="P_16">
				Not a member yet? <a href="javascript:" onclick="bring(3);" id="A_17">Join us</a>&nbsp; Or<a href="javascript:" onclick="bring(4)" id="A_17">Login?</a>
			</p>
		</form>
	</div>

	</div>
<script language="javascript">
$(".regsubmit_").click(function(){ 
document.getElementById("errors").innerHTML="Connecting..";
var a=$(".fullregname").val();	 
var c=$(".userregname").val();	
var d=$(".emailreg").val();		
var e=$(".phonereg").val();		
var f=$(".passreg").val();	
var h=$(".token_").val();		 
var g="a="+a+"&c="+c+"&d="+d+"&e="+e+"&f="+f+"&h="+h;
$.ajax({type:"POST",url:"main/php/registerme.php",data:g,dataType:"json",cache:false,success:function(n){   
if(n.b==1){
document.getElementById("errors").innerHTML="Signed Up successfully";
window.location="http://daanvir.org/activate.php"; 
}else{
document.getElementById('errors').innerHTML=n.a; 
}},error:function(){
document.getElementById('errors').innerHTML="Error connecting to server"; 
}}) 
});
$(".submit1u").click(function(){
document.getElementById("errors3").innerHTML="Connecting..";
var c=$(".query_data").val();	 	
var g="c="+c;
$.ajax({type:"POST",url:"main/html/forgot.php",data:g,success:function(n){
document.getElementById("errors3").innerHTML=n;
}});
}) 
</script> 
		</div> 
	</div>   
	<div id="part-4"style="padding-top:50px;min-height:300px;">
<div id="register-wrap" style="min-height:300px;margin:auto;margin-top:5%">
<div id="register-form-cover" style="min-height:300px">
<div id="FORM_3" class="settings-form">
			<h1 id="H1_4" style="font-size:24px">
				Reset Your Daanvir Password
			</h1>
			<div id="errors10"></div> 
<p id="P_5">
				 
				<label for="emailreg_" id="LABEL_6">
					Username or email
				</label>
				<input id="INPUT_7" class="emailreg_"  placeholder="myusername123 or myemail@mail.com" />
			</p> 
	<p id="P_5">
				 
				<label for="userregcode" id="LABEL_6">
					Verification code
				</label>
				<input id="INPUT_7" class="userregcode" type="text" placeholder="Enter the code that you received" />
			</p> <p id="P_5">
				 
				<label for="userregpass" id="LABEL_6">
					New password  <br><span style="font-size:12px">(lowercase+uppercase+special character+digit, no spaces)</span>
				</label>
				<input id="INPUT_7" class="userregpass" type="password" placeholder="A combination more than six digits"  autocomplete="off"/><input type="hidden" name="token__" class="token__" value="<?php
			echo $token;
			?>" />
			</p> <br>		
				<input type="button" class="regsubmit11" value="RESET PASSWORD" id="INPUT_15" />
	</div>		
</div>
</div>
<script language="javascript">
$(".regsubmit11").click(function(){  
var c=$(".userregpass").val();	
var b=$(".userregcode").val();	
var a=$(".emailreg_").val();	 
var h=$(".token__").val();		 
var g="a="+a+"&b="+b+"&c="+c+"&h="+h;
$.ajax({type:"POST",url:"main/html/reset.php",data:g,success:function(n){   
if(n==1){
document.getElementById("errors10").innerHTML="Password successfully changed!";
setTimeout(function(){ 
window.location="http://daanvir.org";
},1500); 
}else{	 
document.getElementById("errors10").innerHTML="Incorrect input received";
}
},error:function(n){  
document.getElementById("errors10").innerHTML="Unexpected Error.";
}}) 
});
</script>

	</div>

<div class="section">
	<div id="part-5" class="part">
	  
	<header class="cd-header5 collapseh1 part">
        <!--<h1 style="height:auto"><span>Contact</span></h1>--> <br> 
		<p style="text-align:center; font-weight:800;">Hmm??? <span id="contact-talk" style="font-weight:200;font-size:20px"></span></p>
	</header> 
	<div id="typed-contact" style="display:none">
				<p><i>Send us^400</i> a message .. </p>
				<p><i>Call us^600</i>, now maybe.. </p>
				<p>Email us <i>sometime ^900and give a feedback</i> .. </p>
				<p>It's easy <i>to find ^200us</i> .. </p>
				<p>Let's share <i>a coffee ^500</i>and talk about interesting stuff</p>
	</div>
	<div id="contact" class="slideUp">
	<input type="text" Placeholder="Full Name*" class="full full_name"/><br>
	<span><input type="text" Placeholder="Email* : mymail@mail.com"  class="half half_email"><input   type="text" Placeholder="Phone : 1234567890"  class="half half_phone"/></span> 
	<textarea Placeholder="Say Hi" class="message_send"></textarea><br>
	<button class="submitbtn">SEND MESSAGE</button>
	<div id="errors4"></div>
	</div>
<script> 

if(window.navigatorDetect.type()!="mobile"){
  $(function(){
      $("#contact-talk").typed({
         stringsElement: $('#typed-contact'),
            loop: true,
			cursorChar: ".",
			startDelay: 10,
			backSpeed: 0,
			shuffle: true,
			backDelay: 500,
			typeSpeed: 15
      });
  });
}else{
	$('#wave').css('display','none');
	$('.sec_anim:after').css('background-color','transparent');
}

$w=0;
$(".submitbtn").click(function(){
if($w==0){
$w=1;	
$("#errors4").html('Connecting to server..');	
var b=$(".full_name").val();		
var c=$(".half_email").val();	
var d=$(".half_phone").val(); 
var f=$(".message_send").val();	 

var g="b="+b+"&c="+c+"&d="+d+"&f="+f;
$.ajax({type:"POST",url:"main/html/sendto.php",data:g,success:function(n){   
if(n==1){ 
	$w=1;
$("#errors4").html('We have received your message');
}else{  
	$w=0;
$("#errors4").html('An error occurred. Please check all the fields');
}},error:function(){
	$w=0; 
$("#errors4").html('Error establishing connection');
}}) 
}
});
</script>
	<div id="contact-part">
		<div id="cpart-box" class="query-rig">
		<div id="query-more"><h2>GET IN TOUCH DIRECT?</h2><br><p id="contact-email">kumararvind5233@gmail.com</p><p id="contact-email">alawadhi.anmol@gmail.com</p><p id="contact-tel">+91 9055091032</p><p id="contact-social"></p><br>
		</div><div id="query-more"><h2>STAY UPDATED!</h2><br>
		<p id="contact-fb"><b></b>Join <i>daanvir</i> on Facebook</p>
		<p id="contact-tw"><b></b>Follow <i>@daanvir</i> on Twitter</p>
		</div>
		</div>
	</div>
	</div> 
<div class="section s-header" style="background:#3ddfb9;" onclick="tgle('map-part')">
	<header class="cd-header5 part map-header">
        <h1 style="border:none;" class="pad_20"><span style="color:#fff;cursor:pointer">VIEW ON MAP</span></h1><br> 
	</header> 
</div> 
<div class="section norma map-part">
	<div id="part-5" class="part" style="padding:0;min-height: 500px;">
		<div id="cpart-box" class="query-l">
		<div id="map"></div>
		<script type="text/javascript">
		function tgle(cls){
			if($('.'+cls).height() < 200)
			$('.'+cls).animate({ height: "350px" }, 500);
			else
			$('.'+cls).animate({ height: "0px" }, 100);
		}
			initMap();
      function initMap() {
        var styledMapType = new google.maps.StyledMapType(
            [
              {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
              {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
              {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
              {
                featureType: 'administrative',
                elementType: 'geometry.stroke',
                stylers: [{color: '#c9b2a6'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'geometry.stroke',
                stylers: [{color: '#dcd2be'}]
              },
              {
                featureType: 'administrative.land_parcel',
                elementType: 'labels.text.fill',
                stylers: [{color: '#ae9e90'}]
              },
              {
                featureType: 'landscape.natural',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{color: '#93817c'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'geometry.fill',
                stylers: [{color: '#a5b076'}]
              },
              {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{color: '#447530'}]
              },
              {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{color: '#f5f1e6'}]
              },
              {
                featureType: 'road.arterial',
                elementType: 'geometry',
                stylers: [{color: '#fdfcf8'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{color: '#f8c967'}]
              },
              {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{color: '#e9bc62'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry',
                stylers: [{color: '#e98d58'}]
              },
              {
                featureType: 'road.highway.controlled_access',
                elementType: 'geometry.stroke',
                stylers: [{color: '#db8555'}]
              },
              {
                featureType: 'road.local',
                elementType: 'labels.text.fill',
                stylers: [{color: '#806b63'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'labels.text.fill',
                stylers: [{color: '#8f7d77'}]
              },
              {
                featureType: 'transit.line',
                elementType: 'labels.text.stroke',
                stylers: [{color: '#ebe3cd'}]
              },
              {
                featureType: 'transit.station',
                elementType: 'geometry',
                stylers: [{color: '#dfd2ae'}]
              },
              {
                featureType: 'water',
                elementType: 'geometry.fill',
                stylers: [{color: '#b9d3c2'}]
              },
              {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{color: '#92998d'}]
              }
            ],
            {name: 'Daanvir Office'});

        // Create a map object, and include the MapTypeId to add
        // to the map type control.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 34.125051, lng: 74.837516},
          zoom: 16,
          mapTypeControlOptions: {
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                    'styled_map']
          }
        });

        //Associate the styled map with the MapTypeId and set it to display.
        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
      } 
		</script>

		</div>
	
	</div>
</div>

	<div id="part-6">
	 <div id="discuss"><h1>My First Reaction When I see them</h1><p>Its a matter of time that a person can understand the fact behind the process, but I always insist to contribute a little to the welfare</p></div>
	 <hr id="hrtype1">
	<h2> <span id="footer_span" style="margin-left:0;"><a href="#page">GO TOP &nbsp;/&nbsp;</a></span><span id="footer_span">PRIVACY POLICY &nbsp;/&nbsp;</span><span id="footer_span">TERMS OF SERVICE &nbsp;/&nbsp;</span><span id="footer_span"> GALLERY &nbsp;/&nbsp;</span><span id="footer_span"> PRESS</span></h2> 
	<h4>&copy; 2017 - All Rights Reserved</h4>
	</div>
	</div>

<script>
	jQuery(document).ready(function($){
	/********************************
		open/close submenu on mobile
	********************************/
	$('.cd-main-nav').on('click', function(event){
		if($(event.target).is('.cd-main-nav')) $(this).children('ul').toggleClass('is-visible');
	});
	
});
$(document).on('click', 'a', function(event){
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
    }, 500);
}); 

$("#close_form, #close_form2, #close_form3").on('click',  function(event){
    event.preventDefault();
document.body.style.background="#eeeeee"; 
$("#forms").css("top","-100vh");
document.getElementById("forms").style.transitionDuration="0.5s";
if((!$(".signup").css("display","none"))){ 
$(".signup").css("display","none");
}
if(!($(".login").css("display","none"))){ 
$(".login").css("display","none");
}
if(!($(".recover").css("display","none"))){ 
$(".recover").css("display","none");
}
});  
</script>
    </body>
</html> 