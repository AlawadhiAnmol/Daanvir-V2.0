<?php require_once '../db/init.php'; ?>
<?php protectPage(); 

  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past

?>
 
    
<button id="sclk" class="sclk-2" style="pointer-events:none;">Donation Page</button>
<h2 id="r-part-h2" style="display:block;">Help Them</h2> 
		    
		<div id="hitlist_link_button" class="commenting_share" style="
    position: absolute; 
    top: 8px;
    right: 0;">
			 <a class="fbshare2" onclick="window.location='https://www.payumoney.com/paybypayumoney/#/9B8C7A6ADD78F58E55A7FF8B61202746'" href="https://www.payumoney.com/paybypayumoney/#/9B8C7A6ADD78F58E55A7FF8B61202746" id="hitlist_link" style="margin-top:20px;background-color: lightgreen;
    border-color: #4267b2;"> 
			 Pay Money</a>
			 <a class="fbshare2" onclick="fShare()" href="" id="hitlist_link" style="margin-top:20px;background-color: #4267b2;
    border-color: #4267b2;"> 
			 Share</a>
		</div>  
<div id="cover-address"> 
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
			<!--<div id="radio_help" class="autobuy-donation">
			<input type="radio" id="autobuy_donate" name="way_donate"/>
					<label for="autobuy_donate" id="radio_help_input">
						<span><span id="SPAN_9"></span></span>
					Donate Money:
						<div id="donation_address"><p  id="add_total">Total Price: <input type="number" readonly="readonly" value="0" id="total_price"/> </p></div>
					</label> 
					
			</div>-->  
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
		</div>
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

<h2 id="r-part-h2" class="h2-part-this1" style="display:block;text-align:left;padding:25px 0 15px 20px ">People who believe in the same cause</h2>
<div id="r-part-4" style="background:#fff;">
<div id="donate-similar"> 

<div class="grid-gallery" id="r-part-4-d">

</div>
</div>
</div>
<div id="r-part-5" style="display:none;"> 
<h2 id="loading">Loading...</h2>
</div>

<h2 id="r-part-h2" class="h2-part-this1" style="display:block;text-align:left;padding:25px 0 15px 20px ">Other Campaigns in your city<br>
<h3>Kindness begins with <b>one </b>act</h3></h2>
<div id="r-part-6" style="background:#fff;">


</div>
<h2 id="r-part-h2" class="h2-part-this1" style="display:block;text-align:left;padding:25px 0 15px 20px ">Leave a Comment</h2>
<div id="r-part-7" style="background:#fff;">
<div id="commenting">  
		<!-- <div id="hitlist_link_button">
			 <a href="javascript:void(0)" id="hitlist_link" style="margin-top:20px;pointer-events:none;cursor:default;">Comment</a>
		</div>-->
		
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