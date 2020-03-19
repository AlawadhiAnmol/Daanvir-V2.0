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
        <link rel="stylesheet" type="text/css" href="css/style2_small.css" /> 
        <link rel="stylesheet" type="text/css" href="custom.css" /> 
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
		<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">

<!--<link rel="stylesheet" type="text/css" href="css/jquery.fullpage.min.css" />

-->

		<script src="js/jquery.min.js"></script> 
		<script src="js/typed.min.js"></script>  
		<script src="js/owl.carousel.min.js" type="text/javascript"></script>
		<script src="js/navigator-detect.min.js"></script>
		<script type="text/javascript" async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8fz_GTPq7uPnoHc6zFmTzNcNRRqKbwO8&libraries=visualization"></script>	 
<noscript>
    <style>
 
    </style>
    <style type="text/css">
        #page, #part-2,#part-3,#part-4,#part-5,#part-6{display:none;}
    </style>
    <div class="noscriptmsg" style="margin-top:50px;font-size:22px;
	margin:auto;text-align:center;">
    Sorry, this browser is not supported. We recommend upgrading to Chrome or some other modern browser.
    </div>
</noscript> 

</head>

<body style="background:#fff">  

<header class="cd-header nav-down" style="box-shadow:1px 1px 1px #4874f0,inset 0 0 1px #4874f0;
    -moz-box-shadow:1px 1px 1px #4874f0,inset 0 0 1px #4874f0;
    -webkit-box-shadow:1px 1px 1px #4874f0,inset 0 0 1px #4874f0;
    ">
			<div id="above-nav">
			<i style="    float: left;

    padding-left: 40px;">A lifestyle of spreading Happiness</i>

  <!--<a  id="heart-main" style="float:left;padding-left:40px;">Made with <strong id="heart"></strong> in India</a> -->    <span id="asdd_post"><b><span class="blink_me">&#9679;</span></b><a href="javascript:" onclick="open_page(30);">Add a Donation Post</a></span> |  <!--<b id="feeding_india"><i></i></b><a href="http://www.feedingindia.org">Feeding India</a> | --><a href="#part-5">FAQs</a> 
  </div>
  		<div id="cd-logo"><a href="http://daanvir.org"><img src="img/daanvir_detail.png" alt="Logo" id="logo_image" style="width:100px;height:50px"></a></div>
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
        <ul class="cb-slideshow" style="display:none">

            <li><span></span><div></div></li>

            <li><span></span><div></div></li>

            <li><span></span><div></div></li>

            <li><span></span><div></div></li>

            <li><span></span><div></div></li> 

        </ul>
    <div id="page" style="" class="<?php if(loggedIn()===true) echo 'cd0-logged' ?>">

        
        <div class="container" style="display:none"> 

		<script>  

var didScroll;var lastScrollTop=0;var delta=5;var navbarHeight=$('.cd-header').outerHeight();var cd=$('.cd-header');$(window.document).scroll(function(event){didScroll=!0});setInterval(function(){if(didScroll){hasScrolled();didScroll=!1}},250);function hasScrolled(){var st=$(this).scrollTop();if(Math.abs(lastScrollTop-st)<=delta)

return;movement();if(st>lastScrollTop&&st>navbarHeight){cd.css("top","-98px")}else{cd.css("top","0px")}

lastScrollTop=st}

var i=0;function movement(){var doc=document.getElementById("caption1");if(doc===null||typeof(doc)=='undefined')return;i++;if($('#rot1').isInViewport()&&i%10==0){$('#rot1').animateRotate(360,600);$('#rot2').animateRotate(360,1000);$('#rot3').animateRotate(360,1200);i=0}
return}

$.fn.animateRotate=function(angle,duration,easing,complete){return this.each(function(){var $elem=$(this);$({deg:0}).animate({deg:angle},{duration:duration,easing:easing,step:function(now){$elem.css({transform:'rotatex('+now+'deg)'})},complete:complete||$.noop})})};$.fn.isInViewport=function(){var elementTop=$(this).offset().top;var elementBottom=elementTop+$(this).outerHeight();var viewportTop=$(window).scrollTop();var viewportBottom=viewportTop+$(window).height();return elementBottom>viewportTop&&elementTop<viewportBottom}

</script>
        </div>
            </div>
    </div>
        

<p>Click on the buttons inside the tabbed menu:</p>

<div class="tab">
  <button class="tablinks active" onclick="openCity(event, 'About')">ABOUT DAANVIR</button><br>
  <button class="tablinks" onclick="openCity(event, 'Donation')">STARTING A DONATION POST</button><br>
  <button class="tablinks" onclick="openCity(event, 'Contri')">HOW TO CONTRIBUTE?</button><br>
  <button class="tablinks" onclick="openCity(event, 'Volunteer')">VOLUNTEER</button>
</div>

<div id="About" class="tabcontent" style="display:block">
  
  <p><div id="question">1.      What is DAANVIR?</div>
<div id="answer">
      India’s first online e-donation platform where you can start a movement, contribute and involve your friends. We are trying to create a platform where everybody can help to solve a social crisis, inevitable disaster, and make an impact in a very transparent way.<br>
      </div>
<br>
    <div id="question"> 2.  What are the basic terminology on DAANVIR?</div>
      
<div id="answer">
Donation post: Donation post is a social project with a clear goal to eradicate social evils.

 

Needs: Needs are basically the requirement of an area.

 

Supporters: Supporters are the people contributing and supporting to the particular donation post .

 

Heatmap:   The  map which shows the affected area in your state, city or locality and their status     of need with the help of a colorful maps  in which every color signifies their status .

where green shows filled and successful campaigning and blue shows unfilled/ partially filled

 

Campaign Now: Campaign now is a sharing platform where you can attach the donation post to your email and invite your friends, colleagues and acquaintances.

 

Videos: Videos are the folder where you will receive videos for your contribution.
      </div>
 <br>

        <div id="question">3.        Why Should participate on Daanvir?</div>
<div id="answer">
On Daanvir you can.

·         Start a donation post and create a social impact for the needy

·         Support the ongoing Donation Post and spread to the world

·         Know where and how your contribution is being used

·         Follow and connect with the future leaders who started that movement

·         Post stories about your experience with daanvir.

·         Know stories about ongoing donation post and be  a part of Daanvir
      </div>
 <br>
    <div id="question"> 4.       How can I be a part of Daanvir?</div> 
<div id="answer">
By signing up!

You can use Facebook,Gmail or through your email.

You Can start your own donation post

Contribute to the existing one and share words with your friends through twitter,facebook and emails
      </div>
    
    </div>

<div id="Donation" class="tabcontent">
    <div id="question">  1.       How can I start a donation post?</div> 
<div id="answer">
You can start a donation post by

Signing up and click on ‘Add A donation post’

·         You need to provide you address and the area where is the requirement

·         Then you need to give your donation post a title, about and the needs

·         Then you have to specify the price per item

·         You can opt for pickup availability depending on your comfort

·         You can a story or a blog if you wish to J
    </div>
 <br>

    <div id="question"> 2.       When the donation post will be live ?</div>
 
    <div id="answer">
We will contact you and verify about the authenticity of the donation post and will make It ive.

It hardly takes a day or two.
    </div>
 
<br>
    <div id="question"> 3.       How will I know about the supporters and contributions?</div>
 
    <div id="answer">
We will provide you all the details once the donation post reaches 50% of its target.
        <br></div>
 
<br>
    <div id="question"> 4.       How can I clarify my more questions?</div>
 
    <div id="answer">
You can always mail us at support@daanvir.org or call us at +917027617717

    </div>
</div>

<div id="Contri" class="tabcontent">
    <div id="question"> 1.       How can I contribute on an ongoing donation post?</div>
 
 
<div id="answer">
You can click on the particular donation post and contribute in 3 simple ways

 

1.       Donate at the address of the person who has started the donation post.

2.       Get someone from our team to pickup from your home

3.       You can always donate the equivalent amount of money trough internet banking and other online banking tools
    </div>
 
<br>
    <div id="question"> 2.       How do I spread awareness about the donation post among my family friend?</div>

  
<div id="answer">
You can either simple click on share button on the donation post and share it on facebook,twitter and google+

Or you can start a campaign  by clicking on start a campaign and attach a donation post with it  and email your friends
    </div>
 <br>

    <div id="question"> 3.       Is it compulsory to donate new things only?</div>
 
<div id="answer">No , It is not compulsory,
Indeed Daanvir is totally based on the concept of useless to useful.

    You can donate your old things in good conditions</div>

 
<br>
    <div id="question"> 4.       How do I Trust with my contribution?</div>
 
    <div id="answer">You will receive a video after the drive and you can see where you donation is going</div>


</div>
<div id="Volunteer" class="tabcontent">
    <div id="question"> 1.       How can I volunteer on Daanvir?</div>
 
<div id="answer">You can signup or mail us at Volunteer@daanvir.org</div>

 <br>

    <div id="question"> 2.       How much time do I have to devote ?</div>
 
<div id="answer">You can select work on your comfort basis

3-5 hours a week

7-10 hours a week

    And 10+ hours a week</div>
</div>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
    </div>   

    </body>
</html>