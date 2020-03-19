<?php
require_once 'main/db/init.php';
logger();

$id1=Sanitize($_GET['id1']); 
$id2=Sanitize($_GET['id2']); 
$id3=urldecode($_GET['id3']);
$id3=Sanitize($id3);  
?>
<?php /// protectPage(); 

?> 
<html>
	<head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Daanvir - Every life is vulnerable</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no">
        <meta name="description" content="Be a part of the social transformation. This new initiative lets you contribute simple reliefs that fetch both exquisite happiness and transparent control over the change that you brought" />
        <meta name="keywords" content="daanvir,daanvir.org,crowdfunding,donations,relief,donation,daan,vir,org,simplified,hassle-free,transparency,control,contribute,help,poverty,India,remove poverty, connect, social" />
        <meta name="author" content="Daanvir.org" />
        <link href="https://fonts.googleapis.com/css?family=Anton" rel="stylesheet">
		<link rel="shortcut icon" href="images/daanvir_logo.png" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
		<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" type="text/css" href="css/style2_m.css" />
        <link rel="stylesheet" type="text/css" href="css/style2_small.css" /> 
        <link rel="stylesheet" type="text/css" href="custom.css" /> 
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
		<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="shortcut icon" href="images/daanvir_logo.png" type="image/x-icon">
		<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" type="text/css" href="css/style2_m.css" />
        <link rel="stylesheet" type="text/css" href="css/seperate.css" />
        <!--<link rel="stylesheet" type="text/css" href="css/style2_small.css" /> -->   
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
        
        @font-face{
    
    
    font-family:california;
    src:url("ttf/california.ttf");
    font-family:FuturaFuturis;
    src:url("ttf/FuturaFuturisC-Bold.otf");
    font-family:ocra;
    src:url("ttf/ocra.ttf");
    font-family:arabic;
    src:url("ttf/arabic-font-2013.ttf");
    font-family:coolbold;
    src:url("ttf/coolbold.ttf");
    font-family:esl_gothic;
    src:url("ttf/esl_gothic_unicode.ttf");            
    font-family:esphimere;
    src:url("ttf/esphimere.otf");
    font-family:instinto;
    src:url("ttf/instinto.ttf");
    font-family:ironman;
    src:url("ttf/IRON MAN OF WAR 001C NCV.ttf");
     font-family:merriweathersans;
    src:url("ttf/merriweathersans-bold.ttf");
    font-family:SF Obliquities;
    src:url("ttf/SF Obliquities Bold.ttf");
    font-family:Steagal-Bold;
    src:url("ttf/Steagal-Bold.otf");
              }

        
        
        #page, #part-2,#part-3,#part-4,#part-5,#part-6{display:none;}
    </style>
    <div class="noscriptmsg" style="margin-top:50px;font-size:22px;
	margin:auto;text-align:center;">
    Sorry, this browser is not supported. We recommend upgrading to Chrome or some other modern browser.
    </div>
</noscript> 

</head>
<body>
<?php 
//LOCATION 1 :: 
?>  
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b17ffc0aa9d0766"></script>
<div id="fb-root"></div>

  

<script type="text/javascript">
 
 

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
<header class="cd-header nav-down">
			<div id="above-nav">
			<i style="    float: left;

    padding-left: 40px;">A lifestyle of spreading Happiness</i>

  <!--<a  id="heart-main" style="float:left;padding-left:40px;">Made with <strong id="heart"></strong> in India</a> -->    <span id="asdd_post"><b></b><a href="javascript:" onclick="open_page(30);">Add a Donation Post</a></span> |  <!--<b id="feeding_india"><i></i></b><a href="http://www.feedingindia.org">Feeding India</a> | --><a href="#part-5">FAQs</a> 
  </div>
  		<div id="cd-logo"><a href="http://daanvir.org"><img src="images/daanvir_logo.png" alt="Logo" id="logo_image"></a></div>
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
<button id="sclk" class="sclk-2" style="pointer-events:none;">Donation Page</button>
<h2 id="r-part-h2" style="display:block;">Help Them</h2> 
		    
		<div id="hitlist_link_button" class="commenting_share" style="
    position: absolute; 
    top: 58px;
    right: 0;">
			 <!--<a class="fbshare2" onclick="window.location='https://www.payumoney.com/paybypayumoney/#/9B8C7A6ADD78F58E55A7FF8B61202746'" href="https://www.payumoney.com/paybypayumoney/#/9B8C7A6ADD78F58E55A7FF8B61202746" id="hitlist_link" style="margin-top:20px;background-color: lightgreen;
    border-color: #4267b2;"> 
			 Pay Money</a>-->
			 
		</div>  



<div id="helperBox">
 <div class="grid-gallery" id="r-part-3-1"> 
		<h2 id="loading" style="text-align:center">Loading...</h2>
		</div>
				<div class="clearfix"></div> 
				<!--<button id="next-step" class="r-part-3">NEXT STEP</button> -->
</div>   
<div id="r-part-4" style="background:#fff;">
 <div id="donate-confirmed">
	<h2 id="r-part-h2" style="display:block">Donating</h2>
<div class="grid-gallery" id="r-part-3-d"> 
	<section class="grid-wrap">
		<ul class="grid">
			<li class="grid-sizer" id="donation-pre"></li>  
		</ul>
	</section>
</div>
</div> 
</div>
    
<div id="cover-address"> 
    <div id="bx" style="width:120%;background-color:#FEE202;height:auto;margin-left:-8%;margin-top:-4%;padding-top:10px;padding-bottom:8px;box-shadow:1px 1px 10px rgba(0,0,0,0.5),inset 0 0 5px rgba(255,255,255,0.6);
    -moz-box-shadow:1px 1px 10px rgba(0,0,0,0.5),inset 0 0 5px rgba(255,255,255,0.6);
    -webkit-box-shadow:1px 1px 10px rgba(0,0,0,0.5),inset 0 0 5px rgba(255,255,255,0.6);">
            <span style="float:left;margin-left:4%;"><font style="font-size:35px;font-family: 'Anton', sans-serif;color:#7F7F7F">Help Them</font></span>
		</div>
    <div id="cover-address-inner">
		<div id="radios_help">
			
			<div id="radio_help" class="self-donation">
			<input type="radio" id="self_donate" name="way_donate" checked="checked"/>
					<label for="self_donate" id="radio_help_input">
						<span><span id="SPAN_9"></span></span>
					Please donate at
						<div id="donation_address"><p  id="add_address">Loading Address..</p></div>
					</label>
					 
			</div> 
			<div id="radio_help" class="pickup-donation">
			<input type="radio" id="pickup_donate" name="way_donate"  />
					<label for="pickup_donate" id="radio_help_input">
						<span><span id="SPAN_9"></span></span>
					Pickup Availability<p id="p_availability">Finding..</p>
					</label> 
			</div>
			<div id="radio_help" class="autobuy-donation" style="margin-left:20px;">
			<input type="radio" id="autobuy_donate" name="way_donate"/>
					<label for="autobuy_donate" id="radio_help_input">
						<span><span id="SPAN_9"></span></span>
					Donate Money:
						<div id="donation_address"><p  id="add_total">Total Price: <input type="number" readonly="readonly" value="0" id="total_price"/> </p></div>
					</label> 
					
			</div>  
		</div>
		<div id="radios_help_2">
			<div id="autobuy-donation" class="none"> <div id="errors11"></div>
				<ul id="fields-donation">
					<li id="field-donation">
						<div id="partof-field-donation" class="abfullname-donation">
							<div id="textof-partof" > Your full name</div>
							<input id="inputof-partof" class="abname" type="text" autocorrect="off" autocomplete="off" onclick="moveText('abfullname-donation',1);" onblur="moveText('abfullname-donation',2);"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation"  class="abphone-donation">
							<div id="textof-partof"> Phone</div>
							<input id="inputof-partof" maxlength="10" class="abphone" type="text"  onclick="moveText('abphone-donation',1);" onblur="moveText('abphone-donation',2);"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation" class="abemail-donation">
							<div id="textof-partof" 
    autocapitalize="off" autocorrect="off" autocomplete="off"> Email</div>
							<input class="abemail"  id="inputof-partof" type="email"  onclick="moveText('abemail-donation',1);" onblur="moveText('abemail-donation',2);"/>
						</div>
					</li> 
					<li id="field-donation">
						<div id="partof-field-donation" class="abcamt-donation">
							<div id="textof-partof" > Amount</div>
							<input id="inputof-partof" class="abcamt" min="0" type="number" autocorrect="off" autocomplete="off" onblur="addCustom()" onclick="moveText('abcamt-donation',1);" onblur="moveText('abcamt-donation',2);" Placeholder="ex. 500 for Rs. 500"/>
						</div>
					</li>
					<li id="field-donation" class="register_don_3">
						<div id="partof-field-donation">
							<button id="buttonof-partof" class="button3click" onclick="m_type(1);">Donate</button>
						</div>
					</li>
				</ul>
			</div> 
	
			<div id="self-donation"> <div id="errors10"></div>
				<ul id="fields-donation">
					<li id="field-donation">
						<div id="partof-field-donation"  class="fullname-donation">
							<div id="textof-partof" > Your full name</div>
							<input id="inputof-partof" class="rname" type="text" autocorrect="off" autocomplete="off" onclick="moveText('fullname-donation',1);" onblur="moveText('fullname-donation',2);"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation"  class="phone-donation">
							<div id="textof-partof"> Phone</div>
							<input id="inputof-partof" maxlength="10" class="rphone" type="text"  onclick="moveText('phone-donation',1);" onblur="moveText('phone-donation',2);"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation" class="email-donation">
							<div id="textof-partof" 
    autocapitalize="off" autocorrect="off" autocomplete="off"> Email</div>
							<input class="remail"  id="inputof-partof" type="email"  onclick="moveText('email-donation',1);" onblur="moveText('email-donation',2);"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation" class="date-donation">
							<div id="textof-partof">Select a date</div>
							<input id="inputof-partof"  class="rdate" onclick="moveText('date-donation',1);" onblur="moveText('date-donation',2);" type="date"  min="2017-09-01" max="2018-09-01"/>
						</div>
					</li>
					<li id="field-donation" class="register_don_1">
						<div id="partof-field-donation">
							<button id="buttonof-partof" class="button1click" onclick="r_4(0);">Register Request</button>
						</div>
					</li>
				</ul>
			</div> 
			<div id="pickup-donation" class="none">
				 
				<ul id="fields-donation">
					<li id="field-donation">
						<div id="partof-field-donation"  class="state-donation">
							<div id="textof-partof" > State</div>
							<input id="inputof-partof" class="rstate"  type="text" autocorrect="off" autocomplete="off"  onclick="moveText('state-donation',1);" onblur="moveText('state-donation',2);"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation"  class="City-donation">
							<div id="textof-partof"> City</div>
							<input id="inputof-partof" class="rcity" type="text"  onclick="moveText('City-donation',1);" onblur="moveText('City-donation',2);"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation" class="Address-donation">
							<div id="textof-partof" 
    autocapitalize="off" autocorrect="off" autocomplete="off"> Address</div>
							<input id="inputof-partof"  class="rad"  type="text"  onclick="moveText('Address-donation',1);" onblur="moveText('Address-donation',2);"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof"> ZIP</div>
							<input id="inputof-partof" class="rzip"  onclick="moveText('ZIP-donation',1);" onblur="moveText('ZIP-donation',2);" type="text" maxlength="6"/>
						</div>
					</li>
					<li id="field-donation" class="register_don_2">
						<div id="partof-field-donation">
							<button id="buttonof-partof" class="button2click" onclick="r_4(1);">Register Request</button>
						</div>
					</li>
				</ul> 
			</div> 
		</div>
<?php //////////PHP CODE CUT PASTE TO LOCATION 1 IN CAMPAIGN.php 
?>
<script type="text/javascript">
$(':radio').change(function () { 
	if($('#pickup_donate').is(':checked')){
		
		if($('#pickup-donation').is('.none')){
		 $('#pickup-donation').removeClass('none');
		}
		
		if($('#self-donation').is('.none')){
		 $('#self-donation').removeClass('none');
		}
		
		if($('.register_don_1').css('display','none')==false)
		 $('.register_don_1').css('display','none');
	
		if($('#autobuy-donation').is('.none')==false){ 
		 $('#autobuy-donation').addClass('none');
		}
		
	}else if($('#self_donate').is(':checked')){
		
		 if($('#self-donation').is('.none')){
		 $('#self-donation').removeClass('none');
		 }
		 
		if($('#pickup-donation').is('.none')==false){
		 $('#pickup-donation').addClass('none');
		 }
		 
		if($('.register_don_1').css('display','none'))
		$('.register_don_1').css('display','inline-block');
	
	    if($('#autobuy-donation').is('.none')==false){ 
		$('#autobuy-donation').addClass('none');
		}
		
	}else{
		
		if($('#autobuy-donation').is('.none')){ 
		$('#autobuy-donation').removeClass('none');
		}
		
		if($('#pickup-donation').is('.none')==false){ 
		$('#pickup-donation').addClass('none');
		}
		
		if($('#self-donation').is('.none')==false){ 
		$('#self-donation').addClass('none');
		}
		
	}  
});

function moveText(c,w){ 
if(w==1 && $('.'+c).hasClass('text-moved')==false) 
$('.'+c).addClass('text-moved');   
if(w==2 && $('.'+c).hasClass('text-moved') && $('.'+ c +' input').val().trim()=="" )
$('.'+c).removeClass('text-moved');   
} 
</script>

<script type="text/javascript"> 
var ls=new Array();var ns1=[];var ns2=[];var dat1=null;var dat2=null;var confirmed=0;var func=null;function promote_ls(c,a,d){setup(c,a);window.ls.push(d);$('.button3click').data('block',d);waitDat();waitRef();}
function waitDat(){if(typeof(load_locs)==='undefined'){setTimeout(waitDat,1000);return}
loadData()}
function waitRef(){if(typeof(reFresh)==='undefined'){setTimeout(waitRef,1000);return}
reFresh();loadNext()}
function waitBind(){if(!$('#codeImage').length){setTimeout(waitBind,1000);return}
bindOwl();$("#imageContent").click();/*var $newhtml=$('');$('#commenting').append($newhtml);setTimeout(parse(),200)*/}
function loadData(){$.when(load_locs('l'),load_locs('m')).done(function(list1,list2){exists('r-part-3-1',list1[0]);var recd=list2[0].split('*/.*');if(recd[0]==0){exists('p_availability','Not Available');exists('pickup-donation','')}
else{exists('p_availability','Available')}
exists('add_address',recd[1])})}
function loadNext(){window.dispatchEvent(new Event('resize'));waitBind();loadSimilar()}
function exists(div,data){if(!$('#'+div).length){setTimeout(function(){exists(div,data)},1000)}
$('#'+div).html(data)}
function cexists(div,data){if(!$('.'+div).length){setTimeout(function(){exists(div,data)},1000)}
$('.'+div).html(data)}
function reFresh(){var g='i='+ls[0]+'&id='+2+'&type='+2;$.ajax({type:"POST",url:"main/points/trend.php",data:g,dataType:"json",cache:!1,success:function(n){cexists('sclk-2',n.n);exists('r-part-6',n.l);exists('loadImgs',n.g);exists('aboutbox','<p id="hitlist_expand_p">'+n.j+'</p>'+'<p id="hitlist_expand_p" style="font-size:26px;color:#2196F3;text-align:justify;font-family: Raleway;">'+n.i+'</p>'+'<p id="hitlist_expand_p">'+n.a+'</p>');exists('needsbox',n.b);if(n.c!=""&&n.c!=null){exists('supportingbox',n.c)}
else{exists('supportingbox','<p id="hitlist_expand_p">No suppporters found. Be the first to support this locality.</p>')}
exists('locationbox',n.m);func=new Function("return function called(){ "+n.o+"}")()},error:function(){}})}
function tracelink(){fullView(window.dat1,window.dat2,null,2);return}
function setup(a,b){window.dat1=a;window.dat2=b}
function locs(a,e){var dx="";var ex="";if(a=='s'){var dx="self1";var ex="notself1"}else if(a=='l'){var dx="self2";var ex="notself2"}else if(a=='n'){var dx="self3";var ex="notself3"}else if(a=='d'){var dx="donating";var ex="not_donating";var x=$('.'+e+' input[type="number"]').val();if(x<=0){return}
$('.'+e+' #donat-count').html('<strong>'+x+'</strong> items');$('.'+e).insertAfter($("#donation-pre"));$('.r-h2-special').html('Thankyou! Would you like to donate more?');$('#total_price').val(x*(parseInt($('.'+e+' #price').val()))+parseInt($('#total_price').val()))}
if($('.'+e).is("."+dx)){$('.'+e).removeClass(dx);$('.'+e).addClass(ex);if(a!='d'){$('.'+e+' p#connection').text('SELECT')}}else{$('.'+e).removeClass(ex);$('.'+e).addClass(dx);if(a!='d'){$('.'+e+' p#connection').text('SELECTED')}}
return}
function checkItems(){var ncollected=0,val_set=0;ncollected=document.querySelectorAll('.self3').length;if(ncollected>0){var items=$(".self3");for(var i=0,j=0;i<ncollected;i++){var y=jQuery(items[i]).attr('class').split(' ')[0];var x=$('.'+y+' #val_number').val();if(x>0){val_set=1;ns1[j]=y;ns2[j]=x;j++}}}else{return 'f'}
if(val_set==1){}else{return 'f'}
var today=new Date();var dd=today.getDate();var mm=today.getMonth()+1;var yyyy=today.getFullYear();if(dd<10){dd='0'+dd}
if(mm<10){mm='0'+mm}
today=yyyy+'-'+mm+'-'+dd;document.getElementsByClassName("rdate")[0].setAttribute("min",today);return 't'}
function m_type(type){if(type==1){var i=$(".abname").val();var j=$(".abphone").val();var n=$(".abemail").val();if(parseInt($('#total_price').val())<1){$('#errors11').text('Error: Please select some items first Or add a little custom amount to continue.');return}else if(i==""||j==""||n==""){$('#errors11').text('Error: Please fill all fields.');return}
$('#payment_wrapper').css('top','0px');$('#payment_wrapper').css('transitionDuration','0.5s')}else{$('#payment_wrapper').css('top','-100%');$('#payment_wrapper').css('transitionDuration','0.2s')}}
function r_4(k){if(k==3&&parseInt($('#total_price').val())<1){$('#errors11').text('Error: Please select some items first Or add a little custom amount to continue.');return}else if(k!=3&&checkItems()=='f'){$('#errors10').text('Error: Please select some items first');return}
if(confirmed==0&&k!=3){$('#radios_help input:radio').attr('disabled',!0);$("#helperBox, #donate-similar, .h2-part-this1").css('display','none');if($('#donate-confirmed').css('display','none'))
$("#donate-confirmed").css('display','block');$('.button1click, .button2click').html('Confirm Request');confirmed=1;return}else if(k==3){$('#radios_help input:radio').attr('disabled',!0)}
var a=$(".rname").val();var b=$(".rphone").val();var c=$(".rstate").val();var d=$(".rcity").val();var e=$(".rzip").val();var f=$(".rad").val();var g=$(".remail").val();var h=$(".rdate").val();var i=$(".abname").val();var j=$(".abphone").val();var n=$(".abemail").val();var o=parseInt($("#total_price").val());var l=0;var bl=$('.button3click').attr('data-block');var pg=$('input[name=payment_options]:checked').val();if(k!=3){var hh=new Date(h);if(hh.getTime()!=hh.getTime()||isInvalid(hh)){$('#errors10').text('Error: Invalid date selected');return}}
if(k==0){if(a==""||b==""||g==""||h==""){$('#errors10').text('Some fields are still empty..');return}else{$('#errors10').text('Processing..')}
var l="a="+a+"&b="+b+"&h="+h+"&g="+g+"&k="+k+"&ns1="+ns1.join(',')+"&ns2="+ns2.join(',')}
else if(k==1){if(a==""||b==""||c==""||d==""||e==""||f==""||g==""||h==""){$('#errors10').text('Some fields are still empty..');return}else{$('#errors10').text('Processing..')}
var l="a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f+"&g="+g+"&h="+h+"&k="+k+"&ns1="+ns1.join(',')+"&ns2="+ns2.join(',')}
else if(k==3){if(i==""||j==""||n==""){$('#errors11').text('Some fields are still empty..');return}else{$('#errors11').text('Processing..')}
var l="a="+i+"&b="+j+"&pg="+pg+"&tot="+o+"&g="+n+"&k="+k+"&bl="+ls[0]+"&ns1="+ns1.join(',')+"&ns2="+ns2.join(',')}
$.ajax({type:"POST",url:"main/php/collectneeds.php",data:l,cache:!1,success:function(m){if(k==3&&m==1){if(pg==1){window.location="http://daanvir.org/PaytmKit/pgRedirect.php"}else if(pg==2){window.location="http://daanvir.org/PayumoneyKit/pgRedirect.php"}else if(pg==3){window.location="http://daanvir.org/"}else if(pg==4){window.location="http://daanvir.org/"}}else{$('#errors11').text(m)}
if(m==1&&k!=3){if(!$('#r-part-4').css('display','none')){$('#r-part-4').css('display','none')}
if(!$('#r-part-h2').css('display','none')){$('#r-part-h2').css('display','none')}
if(!$('#cover-address').css('display','none')){$('#cover-address').css('display','none')}
$('#cover-address').html('');if(!$('#r-part-5').css('display','block')){$('#r-part-5').css('display','block')}
finalize(h,k)}else if(k!=3){$('#errors10').text(m);$('#errors11').text(m)}}});return}
var prevCustom=0;function addCustom(){var result=parseInt($('#total_price').val())-prevCustom;var val1=parseInt($('.abcamt').val());if(val1>=0){prevCustom=val1;result=result+prevCustom}else{return}
if(result>=0)
$('#total_price').val(result)}
function isInvalid(h){var now=new Date();now.setHours(0,0,0,0);if(h<now){return!0}
return!1}
function finalize(h,k){var l="b="+h+"&c="+k+"&a="+$('#donation_address').html();$.ajax({type:"POST",url:"main/html/thankyou.php",data:l,cache:!1,success:function(m){$('#r-part-5').html(m)}})}

var x = new Array();
function load_locs(a){ if(a=='l'){var f="taken="+ls+"&m="+a+"&mn=hit"}else if(a=='m'){var f="taken="+ls+"&m="+a} console.log('load_locs: '+a+' '+f); x.push($.ajax({type:"POST",url:"main/php/locs.php",data:f,cache:!1})); console.log(x);
return $.ajax({type:"POST",url:"main/php/locs.php",data:f,cache:!1})}


function getThis(wh){switch(wh){case 1:showOnly("aboutbox");break;case 2:showOnly("needsbox");break;case 3:showOnly("supportingbox");break;case 4:showOnly("locationbox");break;default:break}}
function showOnly(wh){var arr=["aboutbox","needsbox","supportingbox","locationbox"];for(var i=0;i<5;i++){if(arr[i]===wh){if($('#'+arr[i]).css('display','block')==!1)
$('#'+arr[i]).css('display','block');if(!$('.codeBox'+(i+1)).hasClass('codeActive'))
$('.codeBox'+(i+1)).addClass('codeActive')}else{if($('#'+arr[i]).css('display','none')==!1)
$('#'+arr[i]).css('display','none');if($('.codeBox'+(i+1)).hasClass('codeActive'))
$('.codeBox'+(i+1)).removeClass('codeActive')}
if(wh===arr[4]){window.dispatchEvent(new Event('resize'))}}}
function support(b,c){var a="obj="+b+"&c="+c;$.ajax({type:"POST",url:"main/php/validate_support.php",data:a,cache:!1,success:function(d){if(d==1){loadSimilar()}else if(d==0){}else{}}})}
function loadSimilar(){var l="ls="+ls.join(',');$.ajax({type:"POST",url:"main/html/similar_people.php",data:l,cache:!1,success:function(m){$('#r-part-4-d').html(m)}})}
var cookieEnabled=navigator.cookieEnabled;if(cookieEnabled){document.getElementById("last").style.display="none"}
function fShare(){if(func!=null)
func()}
/*
function parse(){try{FB.XFBML.parse()}catch(ex){}}
*/
 $(document).ready(function(){bindOwl()});function bindOwl(){$(".owl-carousel").owlCarousel({items:1,loop:!0,margin:0,autoplay:!0,stagePadding:0,smartSpeed:500,center:!0,autoplayTimeout:5500,autoplayHoverPause:!0})}
  
</script> 

		</div>
</div>

<div id="r-part-4" style="background:#fff;">
<div id="donate-similar"> 
<div id="bx" style="width:102%;background-color:#FEE202;height:auto;margin-left:-3%;padding-top:10px;padding-bottom:8px;box-shadow:1px 1px 10px rgba(0,0,0,0.5),inset 0 0 5px rgba(255,255,255,0.6);
    -moz-box-shadow:1px 1px 10px rgba(0,0,0,0.5),inset 0 0 5px rgba(255,255,255,0.6);
    -webkit-box-shadow:1px 1px 10px rgba(0,0,0,0.5),inset 0 0 5px rgba(255,255,255,0.6);">
            <span style="float:left;margin-left:4%;"><font style="font-size:35px;font-family: 'Anton', sans-serif;color:#7F7F7F">People who believe in same cause</font></span>
		</div>
    <div class="grid-gallery" id="r-part-4-d">

</div>
</div>
</div>
<div id="r-part-5" style="display:none;"> 
<h2 id="loading">Loading...</h2>
</div>

<div id="bx" style="width:105%;background-color:#FEE202;height:auto;margin-left:-2%;padding-top:15px;padding-bottom:8px;box-shadow:1px 1px 10px rgba(0,0,0,0.5),inset 0 0 5px rgba(255,255,255,0.6);
    -moz-box-shadow:1px 1px 10px rgba(0,0,0,0.5),inset 0 0 5px rgba(255,255,255,0.6);
    -webkit-box-shadow:1px 1px 10px rgba(0,0,0,0.5),inset 0 0 5px rgba(255,255,255,0.6);">
            <span style="float:left;margin-left:4%;"><font style="font-size:35px;font-family: 'Anton', sans-serif;color:#7F7F7F">Other Campaigns in this City</font></span><br>
            <span style="float:left;margin-left:-20%;margin-top:-10px"><font style="color:#fff;font-family:'Pacifico', cursive;font-size:30px"><br>Kindness begins with <b>one</b> act</font></span>
		</div>
<div id="r-part-6" style="background:#fff;">


</div>
<h2 id="r-part-h2" class="h2-part-this1" style="display:block;text-align:left;padding:25px 0 15px 20px ">Leave a Comment</h2>
<div id="r-part-7" style="background:#fff;">
<div id="commenting">  
		<!-- <div id="hitlist_link_button">
			 <a href="javascript:void(0)" id="hitlist_link" style="margin-top:20px;pointer-events:none;cursor:default;">Comment</a>
		</div>-->
		<div id="c-box"><div class="fb-comments" style="margin:auto" data-adapt-container-width="true" data-href="http://daanvir.org/#<?php echo $id1; ?>'" data-width="100%" data-numposts="5" data-colorscheme="dark"></div>
		</div>
		</div>
<div class="section norma">

	<div class="sec_anim"></div>

	<div id="part-8" class="slideUp" style="height:auto;">

		<header id="don_cover" class="cd-header5 collapseh1 part">
            <div style="color:#fff;position:absolute;left:5%;top:20%;font-size:25px;font-family:segoe ui; font-weight:600;">If you see something,
            </div>
            <div style="color:#fff;position:absolute;left:5%;top:28.5%;font-size:25px;font-family:segoe ui; font-weight:600;">
            #don't keep quiet.
            </div>
            <div style="color:yellow;position:absolute;left:5%;top:45%;font-size:30px;font-weight:600;">
                Report it here
            </div>
            <a href="javascript" onclick="open_page(30);"><button id="c_campaign" style="border:none;background-color:#2874f0;padding:10px;color:#fff;font-size:27px;position:absolute;left:5%;top:24%;font-family:FuturaFuturis;font-weight:600;  ">Create a Campaign</button></a>
            <br>
            <div style="color:#fff;position:absolute;left:5%;top:87%;font-size:25px;font-family:FuturaFuturis;font-weight:600">and get the country to join you</div>
	</header> <br><br>
	</div>

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
             <font style="font-style:bold;font-size:26px;font-family:Fantasy;color:grey">Get alerted</font><br><font style="font-size:23px ;font-family:FuturaFuturis;color:grey;">
             when there is action in your city<br></font>
             <input type="email" placeholder="Enter Email Address" style="position:relative;top:18px;border:none;box-shadow: 4px 4px 1px rgba(19, 35, 47, 0.3);padding: 10px 100px 10px 25px;margin-top: "/><button style="position:relative;top:18px;padding: 10px 5px 10px 5px;border:none;box-shadow: 4px 4px 1px rgba(19, 35, 47, 0.3);background:#2874F0;color:#fff" id="submit">Submit</button>
         </div>
         <div id="footer_contact" style="color:grey ">
             <p style="font-family:Fantasy;font-size:28px">Contact Us</p><br>
             contact@daanvir.org<br>
             +91-9055-091032
         </div>
	         </div>
	</div>
<div id="last"> Please enable cookies and other site data in order to comment. <br> For Chrome: Go to Settings > Show Advanced Settings (at the bottom) > Content Settings
> Uncheck: Block third-party cookies and site data. </div>
</div>
<div onload="check()"></div>

<div id="payment_wrapper">
<div id="payment_wrap">
	<div id="payment_inner">
		<h2 id="payment_h2">Choose payment gateway</h2>
		<div id="payment_gw">
			<div id="payment_pad">
				<ul>
					<li>
						<input type="radio" id="payment_option_1" name="payment_options" value="1" checked="checked">
						<label for="payment_option_1" id="option-paytm"></label> 
						<div class="check"></div>
					</li>
					<li>
						<input type="radio" id="payment_option_2" value="2" name="payment_options">
						<label for="payment_option_2" id="option-payum"></label> 
						<div class="check"></div>
					</li>
					<li>
						<input type="radio" id="payment_option_3" value="3" name="payment_options">
						<label for="payment_option_3" id="option-oxigen"></label> 
						<div class="check"></div>
					</li>
					<li>
						<input type="radio" id="payment_option_4" value="4" name="payment_options">
						<label for="payment_option_4" id="option-mobikwik"></label> 
						<div class="check"></div>
					</li>
				</ul>
			</div>
		</div>
		<div id="payment_btns">
		<button id="payment_bt1" onclick="m_type(0);">Close</button>
		<button id="payment_bt2" onclick="r_4(3);">Pay Now</button>
		</div>
	</div>
</div>	
</div>	

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

<script language="javascript">$(".regsubmit_").click(function(){document.getElementById("errors").innerHTML="Connecting..";var a=$(".fullregname").val();var c=$(".userregname").val();var d=$(".emailreg").val();var e=$(".phonereg").val();var h=$(".token_").val();var f=$(".passreg").val();var g="a="+a+"&c="+c+"&d="+d+"&e="+e+"&f="+f+"&h="+h;$.ajax({type:"POST",url:"main/php/registerme.php",data:g,cache:!1,success:function(n){n=JSON.parse(n.substring(1));if(n.b==1){document.getElementById("errors").innerHTML="Signed Up successfully";window.location="http://daanvir.org/activate.php"}else{alert(n);document.getElementById('errors').innerHTML=n.a}},error:function(n){console.log(n);document.getElementById('errors').innerHTML="Error connecting to server";}})});$(".submit1u").click(function(){document.getElementById("errors3").innerHTML="Connecting..";var c=$(".query_data").val();var g="c="+c;$.ajax({type:"POST",url:"main/html/forgot.php",data:g,success:function(n){document.getElementById("errors3").innerHTML=n}})})

</script> 

</div>	

<?php
	//echo 'x,http://daanvir.org/campaign.php?id1='.$t.'&id2=/'.$ln.'&id3=/'.$stn;
	 
	//$static_data=file_get_contents("main/pages/x29.php");
	//echo $static_data;
	echo '<script language="javascript">
	$(function(){wait()});function wait(){if(typeof(promote_ls)===\'undefined\'){setTimeout(wait,100);return}promote_ls("'.$id3.'","'.$id2.'","'.$id1.'")} 
	</script>';
	//}
?>
<script language="javascript">

function clk(){document.getElementsByClassName("drop1_A_3_")[0].click()}

loadMore(0,null,1);function fullView(c,a,d,e){if(e==2){var g="t="+d+"&c="+encodeURIComponent(c)+"&a="+a;$.ajax({type:"POST",url:"main/points/turnlink.php",data:g,cache:!1,success:function(n){if(n=="login"){$('.bringme').click();return}

var na=n.split(',');if(na.length==2){var w=window.open(na[1]+"",'Daanvir');w.focus()}}})}else{open_page(29);$(function(){wait()});function wait(){if(typeof(promote_ls)==='undefined'){setTimeout(wait,100);return}

promote_ls(c,a,d)}}

return}

function loadMore(t,data,id){if(id==2){data=data.join(",")}

var g="t="+t+'&data='+data+'&id='+id;$.ajax({type:"POST",url:"main/points/hitlist.php",data:g,cache:!1,success:function(n){if(id==1){$('#loadMoreH').html(n);setTimeout(bindOwl(),200)}else if(id==2){open_page(50);setTimeout(function(){document.getElementById('embed-res').innerHTML=n;setTimeout(bindOwl(),200)},2800)}else if(id==10){open_page(50);setTimeout(function(){document.getElementById('embed-res').innerHTML=data},800)}}});return}

</script> 

<div id="opened-page" class="effect"> 
  <div id="opened-content">
    <h2 id="loading">Loading...</h2>
  </div>
  <a id="close_page" onclick="open_page(7)"></a>
</div>	

<script language="javascript">function open_page(num){document.getElementById("opened-content").innerHTML="<h2 id=\"loading\">Loading...</h2>";if(num!=7){if($('#opened-page').css('display','none'))

$('#opened-page').css('display','block');$('#opened-page').css('left','0');$('#opened-page').css('transitionDuration','0.5s');$('#opened-page').css({'-webkit-animation':'bounceIn 2s linear 0s','-moz-animation':'bounceIn 2s linear 0s','-o-animation':'bounceIn 2s linear 0s','-ms-animation':'bounceIn 2s linear 0s','animation':'bounceIn 2s linear 0s'})}else{$('#opened-page').css('left','0');$('#opened-page').css('transitionDuration','0.5s');if(!$('#opened-page').css('display','none'))

$('#opened-page').css('display','none')}

var g="num="+num;$.ajax({type:"POST",url:"main/html/open.php",data:g,success:function(n){console.log('n has been received');console.log(n);if(num!=7){$('#opened-content').load(n);$('body').css("overflow-y","hidden")}else{$('#opened-content').html('');$('body').css("overflow-y","auto")}}});return}

    
$("#close_form, #close_form2, #close_form3").on('click',function(event){event.preventDefault();document.body.style.background="#eeeeee";$("#forms").css("top","-100vh");document.getElementById("forms").style.transitionDuration="0.5s";if((!$(".signup").css("display","none"))){$(".signup").css("display","none")}

if(!($(".login").css("display","none"))){$(".login").css("display","none")}

if(!($(".recover").css("display","none"))){$(".recover").css("display","none")}})
    
</script>
    
<script> function bring(e){document.body.style.background="rgba(0,0,0,0.8)";if(e==1){if($(".login").css("display","none")){$(".login").css("display","block")}

$("#forms").css("top","60px");document.getElementById("forms").style.transitionDuration="0.5s"}else if(e==2){$('.emailreg').val($('.copyemail').val());if($(".signup").css("display","none")){$(".signup").css("display","block")}
console.log('jaspal');
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

<script type="text/javascript">function viewer(h,g){var d,b,a;if(g==1){d="details";b="needs";a="supports"}else{if(g==2){d="needs";b="details";a="supports"}else{if(g==3){d="supports";b="needs";a="details"}}}

var f=$("."+d+h);var e=$("."+b+h);var c=$("."+a+h);var f1=$(".col-"+d+h);var e1=$(".col-"+b+h);var c1=$(".col-"+a+h);if(f.css("display")=="none"){f.css("display","inline-block");f1.removeClass('backcolor');f1.addClass('frontcolor')}

if(e.css("display")!="none"){e.css("display","none");e1.removeClass('frontcolor');e1.addClass('backcolor')}

if(c.css("display")!="none"){c.css("display","none");c1.removeClass('frontcolor');c1.addClass('backcolor')}

return}

		</script>     
<script src="js/modernizr.custom.js"></script> 

<script src="js/imagesloaded.pkgd.min.js"></script>

<script src="js/masonry.pkgd.min.js"></script>

<script src="js/classie.js"></script>

<script src="js/cbpGridGallery.js"></script>
 
	</body>
	</html>