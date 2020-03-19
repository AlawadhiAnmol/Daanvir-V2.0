<?php include 'main/db/init.php'; 
logger();
?>
<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Daanvir - Every life is vulnerable</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no">
        <meta name="description" content="Be a part of the social transformation. This new initiative lets you contribute simple reliefs that fetch both exquisite happiness and transparent control over the change that you brought" />
        <meta name="keywords" content="daanvir,daanvir.org,crowdfunding,donations,relief,donation,daan,vir,org,simplified,hassle-free,transparency,control,contribute,help,poverty,India,remove poverty, connect, social" />
        <meta name="author" content="Daanvir.org" />

		<link rel="shortcut icon" href="images/daanvir_logo.png" type="image/x-icon">
		<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" type="text/css" href="css/style2_m.css" />
        <!--<link rel="stylesheet" type="text/css" href="css/style2_small.css" /> -->
        <link rel="stylesheet" type="text/css" href="custom.css" /> 
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
		<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" media="only screen and (max-device-width:480px)" href="css/style2_small.css"/>
        
<!--<link rel="stylesheet" type="text/css" href="css/jquery.fullpage.min.css" />

-->

		<script src="js/jquery.min.js"></script> 
		<script src="js/typed.min.js"></script>  
		<script src="js/owl.carousel.min.js" type="text/javascript"></script>
		<script src="js/navigator-detect.min.js"></script>
		<script type="text/javascript" async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8fz_GTPq7uPnoHc6zFmTzNcNRRqKbwO8&libraries=visualization"></script>	 
<noscript>
    <style type="text/css">
        #page, #part-2,#part-3,#part-4,#part-5,#part-6{display:none;}
    </style>
    <div class="noscriptmsg" style="margin-top:50px;font-size:22px;
	margin:auto;text-align:center;">
    Sorry, this browser is not supported. We recommend upgrading to Chrome or some other modern browser.
    </div>
</noscript> 

</head>

<body>  

<header class="cd-header nav-down" style="box-shadow:1px 1px 1px #4874f0,inset 0 0 1px #4874f0;
    -moz-box-shadow:1px 1px 1px #4874f0,inset 0 0 1px #4874f0;
    -webkit-box-shadow:1px 1px 1px #4874f0,inset 0 0 1px #4874f0;
    ">
			<div id="above-nav">
			<i style="    float: left;

    padding-left: 40px;">A lifestyle of spreading Happiness</i>

  <!--<a  id="heart-main" style="float:left;padding-left:40px;">Made with <strong id="heart"></strong> in India</a> -->    <span id="asdd_post"><b><span class="blink_me">&#9679;</span></b><a href="javascript:" onclick="open_page(30);">Add a Donation Post</a></span> |  <!--<b id="feeding_india"><i></i></b><a href="http://www.feedingindia.org">Feeding India</a> | --><a href="http://www.daanvir.org/faq.php">FAQs</a> 
  </div>
  		<div id="cd-logo"><a href="http://daanvir.org"><img src="img/daanvir_detail2.png" alt="Logo" id="logo_image" style="width:100px;height:50px"></a></div>
  	 <div class="field">

				

				<div id="search-bar">

				<input type="text" id="searchit" placeholder="Type a city name" />

				

				<button type="button" class="show-res" id="search" ></button>

				<!--<p id="p-find">Find out people near you who need help</p>-->

				</div>

				</div>  	
    
    <nav class="cd-main-nav">
					<ul style="margin-top:20px;padding-left:20px">
						<!-- insert more links here -->
						<!--li><input type="text"  placeholder="Type a city name" height="20px" width="50px" /><button type="button" height="20px" >SE</button></li>-->
						<li><a href=".donation-posts">Donation Posts</a></li>
						<?php if(loggedIn()===false){ ?>
						<li><a href="#part-4">About</a></li>
						<li><a href="#part-8">Impact</a></li>
						<!--<li><a href="#part-5">Contact</a></li>-->
						<!--<li><a href="#page" onclick="bring(1)" id="bring"class="bringme">Login</a></li>--> 
						<?php }else{ ?> 
						<li><a href="#part-8">Impact</a></li>
						<li><a href="#part-8">Campaign</a></li>
						<!--<li><a href="#part-9">Relief</a></li>-->  
						<!--<li><a href="javascript:" onclick="logout();" class="logout" id="bring">Logout</a></li> -->
						<?php } ?> 
						<li><a href="javascript:void(0)" id="account_shw">Account</a>
						 <ul id="dropdown"> 
						<?php if(loggedIn()===false){ ?>
							<li id="drop1">
								<a id="drop1_A_3" class="drop1_A_3_" href="#page" onclick="bring(1)"><i id="drop1_I_4"></i>Log in</a>
							</li>
							<li id="drop2">
								<a href="#" id="drop1_A_6"  onclick="bring(3);"><i id="drop1_I_7"></i>Register</a>
							</li>
<script type="text/javascript">   
						$('#account_shw').on( "mouseenter click",  function() {  
						account_shw();
						});
						function account_shw(){ 
						  if($('#dropdown').height() < 50){ 
							$('#dropdown').css('overflow','visible'); 
							$('#dropdown').animate({ height: "80px" },10);
							}
						  else{
							$('#dropdown').css('overflow','hidden'); 
							$('#dropdown').animate({ height: "0px" },5);
						  }
						}
</script> 

						<?php }else{ ?>
							<!--<li id="drop3">
								<a href="#" id="drop1_A_9"><i id="drop1_I_10"></i>Private jet</a>
							</li>-->
							<li id="drop1">
								<a id="drop1_A_3" href="#part-7" ><i id="drop1_I_4"></i>Manage</a>
							</li>
							<li id="drop1">
								<a id="drop1_A_3" href="#page" onclick="open_page(1)"><i id="drop1_I_4"></i>Settings</a>
							</li>
							<li id="drop1">
								<a id="drop1_A_3" href="#page" onclick="open_page(22)"><i id="drop1_I_4"></i>Campaign Feed</a>
							</li>
							<li id="drop1">
								<a id="drop1_A_3" href="#page" onclick="open_page(23)"><i id="drop1_I_4"></i>My Campaigns</a>
							</li>
							<li id="drop1">
								<a id="drop1_A_3" href="#page" onclick="open_page(24)"><i id="drop1_I_4"></i>My Support</a>
							</li>
							<li id="drop1">
								<a id="drop1_A_3" href="#page" onclick="open_page(25)"><i id="drop1_I_4"></i>Support Others</a>
							</li>
							<li id="drop1">
								<a id="drop1_A_3" href="#page" onclick="open_page(26)"><i id="drop1_I_4"></i>Videos</a>
							</li>
							<li id="drop2">
								<a href="#" id="drop1_A_6" onclick="logout();" ><i id="drop1_I_7"></i>Log out</a>
							</li>
<script type="text/javascript">   

						$('#account_shw').on( "mouseenter click",  function() {  

						account_shw();

						});

						function account_shw(){ 

						  if($('#dropdown').height() < 50){ 

							$('#dropdown').css('overflow','visible'); 

							$('#dropdown').animate({ height: "320px" },10);

							}

						  else{

							$('#dropdown').css('overflow','hidden'); 

							$('#dropdown').animate({ height: "0px" },5);

						  }

						}

</script> 

<script type="text/javascript">  

						function logout(){ 

						$('.logout').css("display","none");

						window.location="main/points/logout.php";  

						}   

</script> 

						<?php } ?>

						 </ul>

						</li>

						<li id="above-nav-mob"><a href="javascript:" onclick="open_page(30);">Create trend</a></li>

					</ul>

				</nav> <!-- cd-main-nav -->



			</header>



<div id="fb-root"></div>

  

<script type="text/javascript">

function loadJS(file) { 

    var js = document.createElement("script"); 

    js.type = "application/javascript"; 

    js.src = file;

    document.body.appendChild(js);

} 

 

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

<div class="body">



<script type="text/javascript"> checkS();

function checkS(){if(window.navigatorDetect.browser()=='unknown'&&window.navigatorDetect.isBrowser("Chrome")==!1&&window.navigatorDetect.type()=="mobile"){alert('Feature Detection: Some features are not supported!');$('body').html('<div height="100%" width="100%" style="background:#c18b62;position:fixed;bottom:0;z-index:1000;width:100%;height:100%;min-width:100%;min-height:100%;"> <h2 style="margin: auto;padding: 50px;color:#4f4f4f;line-height:24px;font-size:18px;"><span style="font-size:80px;line-height:46px;">Oh! </span><br><br>You are using an outdated version of IE. Some features might not work properly. <br>Kindly upgrade. <br><br><br>For best experience, use <br><span style="font-size:32px;line-height:40px;">Google Chrome</span>.</h2></div>');window.stop()}else if(window.navigatorDetect.browser()=="Opera"&&window.navigatorDetect.type()=="tablet"){alert('Feature Detection: Some features are not supported!')}

else if(window.navigatorDetect.browser()=="Opera"&&window.navigatorDetect.type()=="mobile"){alert('Feature Detection: Some features are not supported!')}}

</script> 
        <div id="page" class="<?php if(loggedIn()===true) echo 'cd0-logged' ?>">
        <ul class="cb-slideshow">

            <li><span></span><div></div></li>

            <li><span></span><div></div></li>

            <li><span></span><div></div></li>

            <li><span></span><div></div></li>

            <li><span></span><div></div></li> 

        </ul>
    <div id="page" style="" class="<?php if(loggedIn()===true) echo 'cd0-logged' ?>">

        
        <div class="container"> 

		<script>  

var didScroll;var lastScrollTop=0;var delta=5;var navbarHeight=$('.cd-header').outerHeight();var cd=$('.cd-header');$(window.document).scroll(function(event){didScroll=!0});setInterval(function(){if(didScroll){hasScrolled();didScroll=!1}},250);function hasScrolled(){var st=$(this).scrollTop();if(Math.abs(lastScrollTop-st)<=delta)

return;movement();if(st>lastScrollTop&&st>navbarHeight){cd.css("top","-98px")}else{cd.css("top","0px")}

lastScrollTop=st}

var i=0;function movement(){var doc=document.getElementById("caption1");if(doc===null||typeof(doc)=='undefined')return;i++;if($('#rot1').isInViewport()&&i%10==0){$('#rot1').animateRotate(360,600);$('#rot2').animateRotate(360,1000);$('#rot3').animateRotate(360,1200);i=0}
return}

$.fn.animateRotate=function(angle,duration,easing,complete){return this.each(function(){var $elem=$(this);$({deg:0}).animate({deg:angle},{duration:duration,easing:easing,step:function(now){$elem.css({transform:'rotatex('+now+'deg)'})},complete:complete||$.noop})})};$.fn.isInViewport=function(){var elementTop=$(this).offset().top;var elementBottom=elementTop+$(this).outerHeight();var viewportTop=$(window).scrollTop();var viewportBottom=viewportTop+$(window).height();return elementBottom>viewportTop&&elementTop<viewportBottom}

</script>

			 <header class="cd-header2 part <?php if(loggedIn()===true) echo 'cd2-logged' ?>">
            <div id="main_slide" style="">
            <div class="slider w3-animate-right" id="slider">
            <div class="youtube_section"> 
                  <iframe id="iframe" src="https://www.youtube.com/embed/iA4H2N97zCg" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe> 
            </div>
            <div class="contained_text">
                <b><font size="45">Change</font></b><br>
                begins here
            </div> 
                <font id="slider-arrow1" onclick="prev1()">&#10092;</font>
                <font id="slider-arrow2" onclick="next1()">&#10093;</font>
                <script>
                    function prev1(){
                        document.getElementById("slider3").style.display="block";
                    }
                    function next1(){
                        document.getElementById("slider2").style.display="block";       
                    }
                </script>
				<div class="opts">
                    <span><a href="javascript" onclick="open_page(30);" id="add">Add a donation post</a></span>
                    <span><a href="#part-2" id="contri">Contribute to existing donation posts</a></span>
                </div>
                <hr style="width:100%;height:55px;border:none;background-color:#f2f2f2;margin-top:20px">
            </div>
            <div id="slider2" class="slider w3-animate-right">
            <div class="youtube_section" style="padding-top:25px;">
                <div style="width:43%;height:330px;background:url('back.png');margin-left:20px;box-shadow:1px 1px 10px rgba(255,255,255,0.5),inset 0 0 5px rgba(255,255,255,0.6);-moz-box-shadow:1px 1px 10px rgba(255,255,255,0.5),inset 0 0 5px rgba(255,255,255,0.6);-webkit-box-shadow:1px 1px 10px rgba(255,255,255,0.5),inset 0 0 5px rgba(255,255,255,0.6);">
                </div>
            </div>
            <div class="contained_text" id="slide2text">
                <p style="font-size:18px;margin-top:-20px;font-family: 'Josefin Sans', sans-serif;">
                    <span style="font-weight:bold;">About Daanvir India</span><br>
                    Feeding India is a not-for-profit social organization which aims to solve the problem of hunger, malnutrition and food wastage in the country. We channelize extra nutritious food from individuals, weddings, restaurants, corporate offices to the people who really need it and have no means or access food. We also serve freshly cooked food or raw grains to our partnered shelter homes and beneficiaries.
                </p>
                
            </div>
                <font id="slider-arrow1" style="color:#fff" onclick="prev2()">&#10092;</font>
                <font id="slider-arrow2" onclick="next2()" style="color:#fff">&#10093;</font>
                <script>
                    function prev2(){
                        document.getElementById("slider").style.display="block";
                    }
                    function next2(){
                        document.getElementById("slider3").style.display="block";       
                    }
                </script>
                <a href="javascript" onclick="open_page(30);"><button id="c_campaign">Create a Trend</button></a>
                <div id="socialcamp" style="">
                <a href="https://www.facebook.com/daanvir.org/"><img src="img/fbicon.png" style="padding-right
                 :15px;height:35px;width:35px;"/></a>
                <a><img src="img/youtube-icon.png" style="padding-right:15px;height:35px;width:35px;"/></a>
                <a href="https://www.instagram.com/daanvir_india/"><img src="img/instaicon.png" style="padding-right
                :15px;height:35px;width:35px;"/></a>
                <a><img src="img/linkdinicon.png" style="height:35px;width:35px;padding-right:15px"/></a>
                </div>
                <hr style="width:100%;height:50px;border:none;background-color:#f2f2f2;margin-top:40px">
            </div>
            <div id="slider3" class="slider w3-animate-right">
                <p>Education is their right. Help them get Education</p>
                <br>
                <!--<div id="para">
                Education is the primary source for children to keep their life in safe way. This project provides education material to poor children upto elementary section. Basic education material required for their studies without any interruption is our goal</div>
                <img src="img/pict_original.jpg" style="width:180px;height:180px"/>-->
                
                <font id="slider-arrow1" onclick="prev3()" style="color:#fff;margin-top:150px">&#10092;</font>
                <font id="slider-arrow2" onclick="next3()" style="color:#fff;margin-top:150px">&#10093;</font>
                <script>
                    function prev3(){
                        document.getElementById("slider2").style.display="block";
                    }
                    function next3(){
                        document.getElementById("slider").style.display="block";       
                    }
                </script>
                <a href="javascript" onclick="open_page(30);"><button id="c_campaign">Help Them</button></a>
            </div>    
            </div>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("slider");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 7000);    
}
</script>

<script>

if(window.navigatorDetect.type()!="mobile"){

  $(function(){

      $("#dtag").typed({

         stringsElement: $('#typed-strings'),

            loop: true,

			cursorChar: ".",

			startDelay: 10,

			backSpeed: 5,

			shuffle: true,

			backDelay: 900,

			typeSpeed: 15

      });

  });

 

}else{

	$('#showp').css({

		display:'block',

		color:'#fff'

		});

} 

</script>

				<!--<div id="s-results">

				<ul>

					<li>Item</li> 

				</ul>

				</div>-->

        </header>

            
			 <?php if(loggedIn()===false){ ?>

            

			<?php }else{ 

			$up=$userData['profilePic'];

			if(empty($up) || $up==null)

			$up='images/userpic.png';

			?>

			<header class="cd-header0">

                <!--<img id="joined_1" src=""/><img id="joined_2" src=""/>--><img  id="joined_1" src=" <?php  echo 'main/'.$up; ?> "/><h1>Welcome to our community, <span><?php echo $userData['fName'].' '.$userData['lName']; ?> </span></h1>

            </header>

			<?php } ?> 

        </div> 

<?php if(loggedIn()===false){ ?>

<script> function bring(e){document.body.style.background="rgba(0,0,0,0.8)";if(e==1){if($(".login").css("display","none")){$(".login").css("display","block")}

$("#forms").css("top","60px");document.getElementById("forms").style.transitionDuration="0.5s"}else if(e==2){$('.emailreg').val($('.copyemail').val());if($(".signup").css("display","none")){$(".signup").css("display","block")}

$("#forms").css("top","5px");document.getElementById("forms").style.transitionDuration="0.5s"}else if(e==3){if(!($(".login").css("display","none"))){$(".login").css("display","none")}

if(!($(".recover").css("display","none"))){$(".recover").css("display","none")}

bring(2)}else if(e==4){if(!($(".signup").css("display","none"))){$(".signup").css("display","none")}

if(!($(".recover").css("display","none"))){$(".recover").css("display","none")}

bring(1)}else if(e==5){if($(".recover").css("display","none")){$(".recover").css("display","block")}

$("#forms").css("top","150px");document.getElementById("forms").style.transitionDuration="0.5s"}else if(e==6){if(!($(".login").css("display","none"))){$(".login").css("display","none")}

if(!($(".signup").css("display","none"))){$(".signup").css("display","none")}

bring(5)}

return}

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

				<input id="INPUT_10" class="logmein" name="password_login" type="password" placeholder="eg. X8df!90EO"  autocomplete="off"/>

			</p>

			<input type="hidden" name="token" class="token" value="<?php

			echo $token;

			?>" />

			<p id="P_14">

				<input type="submit" class="submitlogin" value="Login" id="INPUT_15" />

			</p><p>

			Or Login Using</p>

			<p id="P_14">

				<input type="button" onclick="loginfb();" style="background-color: #3b5998; border-color:#3b5998;

    background-image: linear-gradient(#4e69a2, #3b5998 50%);" value="facebook" id="INPUT_15" class="login_fb"/>

			</p> 

			

			<p id="P_16">

				Not a member yet? <a href="javascript:" onclick="bring(3);" id="A_17">Join us</a>&nbsp; Or<a href="javascript:" onclick="bring(6);" id="A_17">Recover?</a>

			</p>

			<div id="errors2"></div>

		</form>

	</div>

<script>			

$('.logmein').keypress(function (e) {

 var key = e.which;

 if(key == 13) 

  {

    $('.submitlogin').click();

    return false;  

  }

});   

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

					Username* <span style="font-size:12px">(min 6 characters)</span>

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

					Phone  (optional) 

				</label>

				<input id="INPUT_10" class="phonereg" name="phone" type="text" minlength="10" maxlength="12" autocomplete="off" placeholder="919090909090" />

			</p>

			<p id="P_8"> 

				<label for="password" id="LABEL_9">

					Password* <span style="font-size:12px">(lowercase+uppercase+special character+digit, no spaces)</span> 

				</label>

				<input id="INPUT_10" class="passreg" name="password" type="password" placeholder="eg. X8df!90EO"  autocomplete="off"/>

				<input type="hidden" name="token_" class="token_" value="<?php

			echo $token;

			?>" />

			</p><br>

			<i id="agree">By Signing up, you agree to our <a >terms and conditions</a></i>

			<p id="P_14" style="text-align:center">

				<input type="button" value="Sign Up" id="INPUT_15" class="regsubmit_" />

			</p>

			

			<p id="P_16">

				Already joined? <a href="javascript:" onclick="bring(4)" id="A_17">Login</a>&nbsp; Or<a href="javascript:" onclick="bring(6);" id="A_17">Recover?</a>

			</p>

			<div id="errors"></div>

		</form>

	</div> 

</div>

<script>$('.passreg').keypress(function(e){var key=e.which;if(key==13)

{$('.regsubmit_').click();return!1}})

</script>

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

			</p> <br>

			You may want to check spam folder if you didn't receive any mail.

			<p id="P_14" style="text-align:center">

				<input type="button" class="submit1u" value="Help me" id="INPUT_15" />

			</p>

			

			<p id="P_16">

				Not a member yet? <a href="javascript:" onclick="bring(3);" id="A_17">Join us</a>&nbsp; Or<a href="javascript:" onclick="bring(4)" id="A_17">Login?</a>

			</p>

			<div id="errors3"></div>

		</form>

	</div>

<script>	$('.query_data').keypress(function(e){var key=e.which;if(key==13)

{$('.submit1u').click();return!1}})

</script>

	</div>

<script language="javascript">$(".regsubmit_").click(function(){document.getElementById("errors").innerHTML="Connecting..";var a=$(".fullregname").val();var c=$(".userregname").val();var d=$(".emailreg").val();var e=$(".phonereg").val();var h=$(".token_").val();var f=$(".passreg").val();var g="a="+a+"&c="+c+"&d="+d+"&e="+e+"&f="+f+"&h="+h;$.ajax({type:"POST",url:"main/php/registerme.php",data:g,dataType:"json",cache:!1,success:function(n){if(n.b==1){document.getElementById("errors").innerHTML="Signed Up successfully";window.location="http://daanvir.org/activate.php"}else{document.getElementById('errors').innerHTML=n.a}},error:function(){document.getElementById('errors').innerHTML="Error connecting to server"}})});$(".submit1u").click(function(){document.getElementById("errors3").innerHTML="Connecting..";var c=$(".query_data").val();var g="c="+c;$.ajax({type:"POST",url:"main/html/forgot.php",data:g,success:function(n){document.getElementById("errors3").innerHTML=n}})})

</script> 

</div>	

<?php } ?>

 </div>  
    
<div class="section norma">
    <div class="working" >
        <div id="work_header" style="text-align:center;font-size:25px;font-family:'Quicksand', sans-serif;">
            Daanvir.org is a strong movement<br> to mobilize people to help the needy directly.
        </div>
        <hr style="width:100%;height:10px;border:none;background-color:#f2f2f2;margin-left:-15px;">
        <font style="font-size:40px;position:relative;top:70px;left:30px;color:#595959">How <br>it works </font><br><font style="font-size:120px;position:relative;top:-28px;width:10px;left:200px;color:#d6d6d6"> &#10093;</font>
        <div class="container_1" style="background-image:url(img/pict_original.jpg)">
            Responsible citizens report issues and create campaigns
        </div>
        <div class="container_2">
            People nearby reach out to help those in need
        </div>
        <div class="container_3">
            Needy people get the help they actually need.
        </div>
    </div>
    <hr style="width:100%;height:20px;border:none;background-color:#f2f2f2;margin-left:-8px;margin-top:-10px;">
	<div id="part-2" class="trending <?php if(loggedIn()===false) echo 'part-2-pre'; ?>">  

	<header class="cd-header5 collapseh1 part">  
		<div id="bx2">
            <span id="donation_header" ><font>Help people in your city</font></span><br>
            <span id="donation_sub"><font><br>Kindness begins with <b>one</b> act</font></span>
            <div class="field">

				

				<div id="search-bar">

				<input type="text" id="searchit" placeholder="Type a city name" style="position:relative;margin-left:260px;margin-top:-10px;"/>

				<button type="button" class="show-res" id="search" style="position:absolute;margin-left:550px;margin-top:-10px;"></button>

				

				<!--<p id="p-find">Find out people near you who need help</p>-->

				</div>

        </div>
		
		</div>
	</header> 

		 <div id="hitlist" class="slideUp">  

<script type="text/javascript">function viewer(h,g){var d,b,a;if(g==1){d="details";b="needs";a="supports"}else{if(g==2){d="needs";b="details";a="supports"}else{if(g==3){d="supports";b="needs";a="details"}}}

var f=$("."+d+h);var e=$("."+b+h);var c=$("."+a+h);var f1=$(".col-"+d+h);var e1=$(".col-"+b+h);var c1=$(".col-"+a+h);if(f.css("display")=="none"){f.css("display","inline-block");f1.removeClass('backcolor');f1.addClass('frontcolor')}

if(e.css("display")!="none"){e.css("display","none");e1.removeClass('frontcolor');e1.addClass('backcolor')}

if(c.css("display")!="none"){c.css("display","none");c1.removeClass('frontcolor');c1.addClass('backcolor')}

return}

		</script> 

	<div id="wrap-boxes-hitlist" >
        <div id="people_support">
            <div id="people_header" style="width:100%">
                People Supporting
            </div>
            <div id="people_activity">
                    <img id="people_picture" src="img/user-man-circle-invert-512.png" style="width:50px;height:50px;float:left;"/>
                <div id="people_part">
                    <span id="people_name">Ashish Kumar</span> contributed on the campaign Play to Empower - Raffle contest.
                </div>
                <div id="people_time">
                    4 hours ago
                </div>
            </div>
            <div id="people_activity">
                    <img id="people_picture" src="img/user-man-circle-invert-512.png" style="width:50px;height:50px;float:left;"/>
                <div id="people_part">
                    <span id="people_name">Ashish Kumar</span> contributed on the campaign Play to Empower - Raffle contest.
                </div>
                <div id="people_time">
                    4 hours ago
                </div>
            </div>
            <div id="people_activity">
                    <img id="people_picture" src="img/user-man-circle-invert-512.png" style="width:50px;height:50px;float:left;"/>
                <div id="people_part">
                    <span id="people_name">Ashish Kumar</span> contributed on the campaign Play to Empower - Raffle contest.
                </div>
                <div id="people_time">
                    4 hours ago
                </div>
            </div>
        </div>
        

	<div id="loadMoreH">

		 

	</div> <br><br>



<script language="javascript">

function clk(){document.getElementsByClassName("drop1_A_3_")[0].click()}

loadMore(0,null,1);function fullView(c,a,d,e){if(e==2){var g="t="+d+"&c="+encodeURIComponent(c)+"&a="+a;$.ajax({type:"POST",url:"main/points/turnlink.php",data:g,cache:!1,success:function(n){if(n=="login"){$('.bringme').click();return}

var na=n.split(',');if(na.length==2){var w=window.open(na[1]+"",'Daanvir');w.focus()}}})}else{open_page(29);$(function(){wait()});function wait(){if(typeof(promote_ls)==='undefined'){setTimeout(wait,100);return}

promote_ls(c,a,d)}}

return}

function fullView2(c,a,d,e){if(e==2){var g="t="+d+"&c="+encodeURIComponent(c)+"&a="+a;$.ajax({type:"POST",url:"main/points/turnlink2.php",data:g,cache:!1,success:function(n){if(n=="login"){$('.bringme').click();return}

var na=n.split(',');if(na.length==2){var w=window.open(na[1]+"",'Daanvir');w.focus()}}})}else{open_page(29);$(function(){wait()});function wait(){if(typeof(promote_ls)==='undefined'){setTimeout(wait,100);return}

promote_ls(c,a,d)}}

return}

function loadMore(t,data,id){if(id==2){data=data.join(",")}

var g="t="+t+'&data='+data+'&id='+id;$.ajax({type:"POST",url:"main/points/hitlist.php",data:g,cache:!1,success:function(n){if(id==1){$('#loadMoreH').html(n);setTimeout(bindOwl(),200)}else if(id==2){open_page(50);setTimeout(function(){document.getElementById('embed-res').innerHTML=n;setTimeout(bindOwl(),200)},2800)}else if(id==10){open_page(50);setTimeout(function(){document.getElementById('embed-res').innerHTML=data},800)}}});return}

</script>  

<script type="text/javascript"> 
 $(document).ready(function(){bindOwl()});function bindOwl(){$(".owl-carousel").owlCarousel({items:1,loop:!0,margin:0,autoplay:!0,stagePadding:0,smartSpeed:500,center:!0,autoplayTimeout:5500,autoplayHoverPause:!0})}
</script>

   </div> 

  </div>

 </div>   

</div>	



<?php if(loggedIn()===false){ ?>

 


	<div id="slider-outer">
        <p id="slider_header">What people have to say about us?</p>
        <font class="arrow" id="arrow1"style="">&#10092;</font>
        <font class="arrow" id="arrow2" style="">&#10093;</font>
            <div id="thought">
                <img src="img/1.png" width="100px" height="100px" style="border-radius:50%;float:left;margin-top: 2%;">
                <div id="thought_box">
                    <p id="thought_detail">It feels good to donate</p>
                    <br>
                    <p id="user_detail">- LOVISH<br>Delhi,India</p>
                </div>
            </div>
            <div id="thought">
                <img src="img/2.png" width="100px" height="100px" style="border-radius:50%;float:left;margin-top: 2%;">
                <div id="thought_box">
                    <p id="thought_detail">Easy way to help!</p>
                    <br>
                    <p id="user_detail">- Supriya<br>Delhi,India</p>
                </div>
            </div>
            <div id="thought">
                <img src="img/3.png" width="100px" height="100px" style="border-radius:50%;float:left;margin-top: 2%;">
                <div id="thought_box">
                    <p id="thought_detail">Thanks Daanvir!</p>
                    <br>
                    <p id="user_detail">- NITISH<br>Banglore,India</p>
                </div>
            </div>
        <div id="thought">
                <img src="img/4.png" width="100px" height="100px" style="border-radius:50%;float:left;margin-top: 2%;">
                <div id="thought_box">
                    <p id="thought_detail">It feels great to donate </p>
                    <br>
                    <p id="user_detail">- LOVISH<br>Delhi,India</p>
                </div>
            </div>
        </div>



<div class="section norma">

	<div class="sec_anim"></div>

	<div id="part-8" class="slideUp" style="height:auto;">

		<header id="don_cover" class="cd-header5 collapseh1 part">
            <div style="color:#fff;position:absolute;left:5%;top:20%;font-size:25px;font-family:segoe ui">If you see something,<br>
                #don't keep quiet.
            </div>
            <div style="color:yellow;position:absolute;left:5%;top:40%;font-size:25px">
                Report it here
            </div>
            <a href="javascript" onclick="open_page(30);"><button id="c_campaign" style="border:none;background-color:#2874f0;padding:10px;color:#fff;font-size:25px;position:absolute;left:5%;top:60%">Create a Campaign</button></a>
            <br>
            <div style="color:#fff;position:absolute;left:5%;top:70%;font-size:20px">and get the country to join you</div>
	</header> <br><br>
	<div class="help_p">
        <img src="images/idea.png"/><font style="color:#2874f0;position:relative;top:10%;right:2%;font-size:30px;float:right"><b>Ideas on what to start your campaign on </b></font>
	</div>
        <div id="help_box">
            Help needy people to get access to food, clothing and basic essectials.
        </div>
        <div id="help_box2">
            Help donate supplies for disaster hit victims.
        </div>
        <div id="help_box3">
            Clean up a dirty area around your house, school, college or office
        </div>
        <div id="help_box4">
            Spread awareness about a social problem
        </div>
	</div>

</div>





<?php /*

<div class="section norma">

	<div id="part-8" class="slideUp">

	<main class="smooth">

			<section class="content content--c1">

			 	<a href="#" class="tilter tilter--1">

					<figure class="tilter__figure" >

						<!--<img class="tilter__image" src="img/mask.jpg" alt="img01" />-->

						<div class="tilter__deco tilter__deco--shine"><div></div></div>

						<figcaption id="caption1" class="tilter__caption" style="height:260px;">

							<div class="tilter__title__icon icon_type_1"></div>

							<h3 class="tilter__title">@ Address</h3>

							<div class="tilter__title__line"></div>

							<p class="tilter__description desc-large"><br><br>You can visit the address provided in the post and donate anytime happily</p>

						</figcaption>

						<!--<svg class="tilter__deco tilter__deco--lines" viewBox="0 0 300 415">

							<path d="M20.5,20.5h260v375h-260V20.5z" />

						</svg>-->

					</figure>

				</a>

				<a href="#" class="tilter tilter--1">

					<figure class="tilter__figure" >

						<!-- <img class="tilter__image" src="img/mask.jpg" alt="img02" /> -->

						<div class="tilter__deco tilter__deco--shine"><div></div></div>

						<figcaption id="caption2" class="tilter__caption" style="height:290px;">

							<div class="tilter__title__icon icon_type_2"></div>

							<h3 class="tilter__title">@ Pickup</h3>

							<div class="tilter__title__line"></div>

							<p class="tilter__description desc-large"><br><br>If pickup facility is feasible for the post, you can donate almost effortlessly </p>

						</figcaption>

						<!--<svg class="tilter__deco tilter__deco--lines" viewBox="0 0 300 415">

							<path d="M20.5,20.5h260v375h-260V20.5z" />

						</svg>-->

					</figure>

				</a>

				<a href="#" class="tilter tilter--1">

					<figure class="tilter__figure"  >

						<!--<img class="tilter__image" src="img/mask.jpg" alt="img02" />-->

						<div class="tilter__deco tilter__deco--shine"><div></div></div>

						<figcaption id="caption3" class="tilter__caption"style="height:320px;">

							<div class="tilter__title__icon icon_type_3"></div>

							<h3 class="tilter__title">@ Money</h3>

							<div class="tilter__title__line"></div>

							<p class="tilter__description desc-large"><br><br>Approximate prices are given for the items, NEW items will be purchased and donated to the subjects in need. Terms & Conditions hold</p>

						</figcaption>

						<!--<svg class="tilter__deco tilter__deco--lines" viewBox="0 0 300 415">

							<path d="M20.5,20.5h260v375h-260V20.5z" />

						</svg>-->

					</figure>

				</a>

			</section>

		</main>



		</div> 

		 

	</div>

		*/ ?>



<?php } ?>


<div class="mywatermark">
<script>
	$(document).ready( function() {
	$.ajax({
		url:"main/points/blog.php",
		data:{"id":1, "limit":3, "offset":0},
		type:"POST",
		success: function(result) {
			$(".mywatermark").html(result);
		}
	});
	});
</script>
</div>

<div class="section">

	<div class="sec_anim"></div>

	<div id="part-8" class="part impact">

	<header class="cd-header5 expandh1 part"> 

		<div id="bx">

        <h1 style="color:#4f4f4f"><span>Impact</span></h1>

		</div>

		<div id="bx"><p>We believe in creating<br> Citizen reporters who take action <span>i.e. Daanvirs

</span><br><br> </p> 

		</div> 

	</header>  

		<p class="help_p">Our aim is to help thousands of people in need across the country through 20 Daanvirs in every Indian state by December 2017.

</p> 

	<button id="bt-type1" class="ccolor" style="

    background-color: rgb(255, 250, 250);

    color: #333;" onclick="open_page(101)" >LET ME SEE</button>

	

	</div>

</div>





<?php if(loggedIn()===true){ ?>

 

<div class="section">

	<div class="sec_anim"></div>

	<div id="part-5" style="min-height:600px">

	<header class="cd-header5 expandh1"> 

		<div id="bx">

        <h1><span>My Account</span></h1> 

		</div>

		<div id="bx">

      	<p class="manage">Manage all your<span> connections and campaigns.</span></p>

		</div> 

	</header> 

	<div id="services" class="slideUp"><div id="wrapper-services"><div id="services-header-container"><div id="services-container"><div id="services-grid" onclick="open_page(22)"><div class="icon png_one"></div><h2>CAMPAIGN FEED</h2><p>Issues brought to your notice </p></div><div id="services-grid" onclick="open_page(23)"><div class="icon png2"></div><h2>MY CAMPAIGNS</h2><p>Issues you have posted</p></div><div id="services-grid" onclick="open_page(24)"><div class="icon png3"></div><h2>SUPPORT</h2><p>Your supporters/ Support others</p></div><div id="services-grid" onclick="open_page(26)"><div class="icon png4"></div><h2>VIDEOS</h2><p>See how your relief brought a change</p></div></div></div></div></div>

	<div style="text-align:center"><button id="bt-type1" onclick="open_page(1)">MY SETTINGS</button>

	<?php

	if(admin($userData['userId'])==true){

	?>

	 <button id="bt-type2" onclick="window.location='http://daanvir.org/studio/blank.php'">OPEN PANEL</button>

	 

	<?php

	}

	?>

	 </div>

	</div>

</div> 

<div class="section">

	<div class="sec_anim"></div>

	<div id="part-8" style="background-color:#ffcf79;">

	<header class="cd-header5 expandh1"> 

		<div id="bx">

        <h1><span>New Campaign</span></h1> 

		</div>

		<div id="bx">

        <p style="height:150px" class="cam-p">Take the next step of campaigning onsite and over email to let your supporters know!</p>

		</div> 

	</header> <br><br>

	<p class="help_p">Many pierced hearts need fixes, but can't do anything but hope for it. If you have someone in your mind, who needs help, post an issue to seek attention to it. <br><br><span>Best part is, you can always induce the change that you want to see in the world.</span></p>

	<button id="bt-type1" style="

    background-color: rgb(255, 250, 250);

    color: #333;" onclick="open_page(27)">CAMPAIGN NOW</button>

	

	</div>

</div>

<?php /*

<div class="section s-header">

	<div class="sec_anim"></div>

	<header class="cd-header5 collapseh1">

        <h1 style="color:#4f4f4f!important"><span>RELIEF</span></h1><br>

	</header> 

</div> 

<div class="section">

	<div class="sec_anim"></div>

	<div id="part-9" style="background-color:rgb(255, 250, 250)">

	<header class="cd-header5 collapseh1">

        <p style="color:#4f4f4f!important">The concern is the poverty strata for whom minute things are a big “better”.<br><br><span>  So, squeeze up little time and get hold of the inessential things around you. Look for a locality in dire need of those or simply donate to us and we will take care of rest. </span><br><br>On touching the necessary milestone of the support needed, we move to pick up things and send special memories to our participants for their awesome effort. </p>

	</header> 

	<button id="bt-type1" onclick="open_page(28)">GIVE A RELIEF</button> 

	</div>

</div>

*/

?>

<?php } ?> 

<div class="section">

	<div id="part-5" class="part">

<script> 

if(window.navigatorDetect.type()!="mobile"){$(function(){$("#contact-talk").typed({stringsElement:$('#typed-contact'),loop:!0,cursorChar:".",startDelay:10,backSpeed:0,shuffle:!0,backDelay:500,typeSpeed:15})})}else{$('#wave').css('display','none');$('.sec_anim:after').css('background-color','transparent')}

$w=0;$(".submitbtn").click(function(){if($w==0){$w=1;$("#errors4").html('Connecting to server..');var b=$(".full_name").val();var c=$(".half_email").val();var d=$(".half_phone").val();var f=$(".message_send").val();var g="b="+b+"&c="+c+"&d="+d+"&f="+f;$.ajax({type:"POST",url:"main/html/sendto.php",data:g,success:function(n){if(n==1){$w=1;$("#errors4").html('We have received your message')}else{$w=0;$("#errors4").html('An error occurred. Please check all the fields')}},error:function(){$w=0;$("#errors4").html('Error establishing connection')}})}})

</script>


	</div> 

<div class="section s-header" style="background:#2874F0;margin-top:0px" onclick="tgle('map-part')">

	<header class="cd-header5 part map-header">

        <h1 style="border:none;" class="pad_20"><span style="color:#fff;cursor:pointer">VIEW ON MAP</span></h1><br> 

	</header> 

</div> 

<div class="section norma map-part">

	<div id="part-5" class="part" style="padding:0;min-height: 500px;">

		<div id="cpart-box" class="query-l">

		<div id="map"></div>

		<script type="text/javascript">

		function tgle(cls){if($('.'+cls).height()<200)

$('.'+cls).animate({height:"350px"},500);else $('.'+cls).animate({height:"0px"},100)}

initMap();function initMap(){var styledMapType=new google.maps.StyledMapType([{elementType:'geometry',stylers:[{color:'#ebe3cd'}]},{elementType:'labels.text.fill',stylers:[{color:'#523735'}]},{elementType:'labels.text.stroke',stylers:[{color:'#f5f1e6'}]},{featureType:'administrative',elementType:'geometry.stroke',stylers:[{color:'#c9b2a6'}]},{featureType:'administrative.land_parcel',elementType:'geometry.stroke',stylers:[{color:'#dcd2be'}]},{featureType:'administrative.land_parcel',elementType:'labels.text.fill',stylers:[{color:'#ae9e90'}]},{featureType:'landscape.natural',elementType:'geometry',stylers:[{color:'#dfd2ae'}]},{featureType:'poi',elementType:'geometry',stylers:[{color:'#dfd2ae'}]},{featureType:'poi',elementType:'labels.text.fill',stylers:[{color:'#93817c'}]},{featureType:'poi.park',elementType:'geometry.fill',stylers:[{color:'#a5b076'}]},{featureType:'poi.park',elementType:'labels.text.fill',stylers:[{color:'#447530'}]},{featureType:'road',elementType:'geometry',stylers:[{color:'#f5f1e6'}]},{featureType:'road.arterial',elementType:'geometry',stylers:[{color:'#fdfcf8'}]},{featureType:'road.highway',elementType:'geometry',stylers:[{color:'#f8c967'}]},{featureType:'road.highway',elementType:'geometry.stroke',stylers:[{color:'#e9bc62'}]},{featureType:'road.highway.controlled_access',elementType:'geometry',stylers:[{color:'#e98d58'}]},{featureType:'road.highway.controlled_access',elementType:'geometry.stroke',stylers:[{color:'#db8555'}]},{featureType:'road.local',elementType:'labels.text.fill',stylers:[{color:'#806b63'}]},{featureType:'transit.line',elementType:'geometry',stylers:[{color:'#dfd2ae'}]},{featureType:'transit.line',elementType:'labels.text.fill',stylers:[{color:'#8f7d77'}]},{featureType:'transit.line',elementType:'labels.text.stroke',stylers:[{color:'#ebe3cd'}]},{featureType:'transit.station',elementType:'geometry',stylers:[{color:'#dfd2ae'}]},{featureType:'water',elementType:'geometry.fill',stylers:[{color:'#b9d3c2'}]},{featureType:'water',elementType:'labels.text.fill',stylers:[{color:'#92998d'}]}],{name:'Daanvir Office'});var map=new google.maps.Map(document.getElementById('map'),{center:{lat:34.125051,lng:74.837516},zoom:16,mapTypeControlOptions:{mapTypeIds:['roadmap','satellite','hybrid','terrain','styled_map']}});map.mapTypes.set('styled_map',styledMapType);map.setMapTypeId('styled_map')}

		</script>



		</div>

	

	</div>

</div>



	<div id="part-6">

	 <div id="discuss2">
         <div style="text-align:center;padding:20px;">
             <a href="https://www.facebook.com/daanvir.org/"><img src="img/fbicon.png" style="padding-right
                 :55px"/></a>
             <a><img src="img/youtube-icon.png" style="padding-right
:55px"/></a>
             <a href="https://www.instagram.com/daanvir_india/"><img src="img/instaicon.png" style="padding-right
:55px"/></a>
             <a><img src="img/linkdinicon.png"/></a>
         </div>
	<!--<h2> <span id="footer_span" style="margin-left:0;"><a href="#page">GO TOP &nbsp;/&nbsp;</a></span><span id="footer_span">PRIVACY POLICY &nbsp;/&nbsp;</span><span id="footer_span">TERMS OF SERVICE &nbsp;/&nbsp;</span><span id="footer_span"> GALLERY &nbsp;/&nbsp;</span><span id="footer_span"> PRESS</span></h2> -->
         <div style="text-align:center;margin-top:30px">
             <font style="font-style:bold;font-size:25px">Get alerted</font><br><font style="font-size:20px">
             when there is action in your city<br></font>
             <input type="email" placeholder="Enter Email Address" style="position:relative;top:18px;border:none;box-shadow: 4px 4px 1px rgba(19, 35, 47, 0.3);padding: 10px 100px 10px 25px;margin-top: "/><button style="position:relative;top:18px;padding: 10px 5px 10px 5px;border:none;box-shadow: 4px 4px 1px rgba(19, 35, 47, 0.3);background:#2874F0;color:#fff" id="submit">Submit</button>
         </div>
         <div id="footer_contact">
             Contact Us<br><br>
             contact@daanvir.org<br>
             +91-9055-091032
         </div>
	         </div>
	</div>

	</div>
<span style="text-align:center"><h4>&copy; 2017 - All Rights Reserved | <a  id="heart-main" >Made with <strong id="heart" style="color:#f94e66;"></strong> in India</a></h4></span>

</div> 

<div id="opened-page" class="effect"> 

<div id="opened-content">

<h2 id="loading">Loading...</h2>

 

</div>

<a id="close_page" onclick="open_page(7)"></a>

</div>	



<script language="javascript">function open_page(num){document.getElementById("opened-content").innerHTML="<h2 id=\"loading\">Loading...</h2>";if(num!=7){if($('#opened-page').css('display','none'))

$('#opened-page').css('display','block');$('#opened-page').css('left','0');$('#opened-page').css('transitionDuration','0.5s');$('#opened-page').css({'-webkit-animation':'bounceIn 2s linear 0s','-moz-animation':'bounceIn 2s linear 0s','-o-animation':'bounceIn 2s linear 0s','-ms-animation':'bounceIn 2s linear 0s','animation':'bounceIn 2s linear 0s'})}else{$('#opened-page').css('left','0');$('#opened-page').css('transitionDuration','0.5s');if(!$('#opened-page').css('display','none'))

$('#opened-page').css('display','none')}

var g="num="+num;$.ajax({type:"POST",url:"main/html/open.php",data:g,success:function(n){if(num!=7){$('#opened-content').load(n);$('body').css("overflow-y","hidden")}else{$('#opened-content').html('');$('body').css("overflow-y","auto")}}});return}

</script>



 

<script>jQuery(document).ready(function($){$('.cd-main-nav').on('click',function(event){if($(event.target).is('.cd-main-nav')){$(this).children('ul').toggleClass('is-visible');$(this).toggleClass('is-cross');$('body').toggleClass('b_push')}});$(document).on('click','a',function(event){event.preventDefault();var top=($($.attr(this,'href')).offset()||{"top":NaN}).top;if(!isNaN(top)){$('html, body').animate({scrollTop:$($.attr(this,'href')).offset().top},500)}})});$("#close_form, #close_form2, #close_form3").on('click',function(event){event.preventDefault();document.body.style.background="#eeeeee";$("#forms").css("top","-100vh");document.getElementById("forms").style.transitionDuration="0.5s";if((!$(".signup").css("display","none"))){$(".signup").css("display","none")}

if(!($(".login").css("display","none"))){$(".login").css("display","none")}

if(!($(".recover").css("display","none"))){$(".recover").css("display","none")}})

</script>

<script language="javascript"> $(".show-res").click(function(){var a=$("#searchit").val();if(a=='')return;var g='a='+a+'&b='+1;$.ajax({type:"POST",url:"main/html/search.php",data:g,dataType:"json",cache:!1,success:function(n){if(n.status==1){loadMore(0,n.data,2)}else{loadMore(0,n.data,10)}}})});$('#searchit').keypress(function(e){var key=e.which;if(key==13)

{$('.show-res').click();return!1}})

</script>

  



<script src="js/modernizr.custom.js"></script> 

<script src="js/imagesloaded.pkgd.min.js"></script>

<script src="js/masonry.pkgd.min.js"></script>

<script src="js/classie.js"></script>

<script src="js/cbpGridGallery.js"></script>

<script>(function(window,location){history.replaceState(null,document.title,location.pathname+"#refresh");history.pushState(null,document.title,location.pathname);window.addEventListener("popstate",function(){if(location.hash==="#refresh"){history.replaceState(null,document.title,location.pathname);setTimeout(function(){location.reload()},0)}},!1)}(window,location))

</script> 

</body>

</html>