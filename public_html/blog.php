<?php require_once 'main/db/init.php'; ?>
<?php 
	/*if(loggedIn()===false){ 
	echo 'login';
	}else{
*/

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
<?php 
//LOCATION 1 :: 
?>  

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
function reFresh(){var g='i='+ls[0]+'&id='+2+'&type='+2;$.ajax({type:"POST",url:"main/points/trend.php",data:g,dataType:"json",cache:!1,success:function(n){console.log(n);cexists('sclk-2',n.n);exists('r-part-6',n.l);exists('loadImgs',n.g);exists('aboutbox','<p id="hitlist_expand_p">'+n.j+'</p>'+'<p id="hitlist_expand_p" style="text-decoration:underline;font-size:22px;color:#2196F3;">'+n.i+'</p>'+'<p id="hitlist_expand_p">'+n.a+'</p>');exists('needsbox',n.b);if(n.c!=""&&n.c!=null){exists('supportingbox',n.c)}
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
function load_locs(a){ if(a=='l'){var f="taken="+ls+"&m="+a+"&mn=hit"}else if(a=='m'){var f="taken="+ls+"&m="+a}
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

	<div id="part-8" class="slideUp" style="height:800px;">

		<header class="cd-header5 collapseh1 part" style="background-image:url('images/back2.jpg');width:100%;height:500px;background-size:cover;">
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
	<div class="help_p" style="height:300px">
        <img src="images/idea.png" style=""/><font style="color:#2874f0;position:relative;top:10%;right:2%;font-size:30px;float:right"><b>Ideas on what to start your campaign on </b></font>
	</div>
        <div style="width:200px;text-align:center;height:auto;position:relative;margin-top:-150px;left:5%;color:#7f7f7f;font-size:20px">
            Help needy people to get access to food, clothing and basic essectials.
        </div>
        <div style="width:200px;text-align:center;height:auto;position:relative;left:27%;margin-top:-80px;color:#7f7f7f;font-size:20px">
            Help donate supplies for disaster hit victims.
        </div>
        <div style="width:200px;text-align:center;height:auto;position:relative;left:55%;margin-top:-65px;color:#7f7f7f;font-size:20px">
            Clean up a dirty area around your house, school, college or office
        </div>
        <div style="width:200px;text-align:center;height:auto;position:relative;left:80%;margin-top:-80px;color:#7f7f7f;font-size:20px">
            Spread awareness about a social problem
        </div>
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

	 <div id="discuss"  style="background:#FEE202;width:100%;height:auto">
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
         <div style="text-align:left;position:relative;left:80%;right:0px;top:-90px;font-size:25px">
             Contact Us<br><br>
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