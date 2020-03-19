<?php require_once '../db/init.php'; ?>
<?php protectPage(); ?> 
<div id="r-part-1"> 
	<h2 id="r-part-h2" style="display:block">Please select a state to explore</h2>
	<div id="grid-gallery-5" class="grid-gallery"> 
			<?php choose_state(); ?>
	</div><!-- // grid-gallery -->
		<div class="clearfix"></div> 
		<button id="next-step" class="r-part-1">NEXT STEP</button> 
 </div>  
<div id="r-part-2" style="display:none;">
	<h2 id="r-part-h2">Please select a city to start</h2>
	<div class="grid-gallery" id="r-part-2-1"> 
<h2 id="loading" style="text-align:center">Loading...</h2>
</div>
		<div class="clearfix"></div> 
		<button id="next-step" class="r-part-2">NEXT STEP</button> 
</div>   
<div id="r-part-3" style="display:none;">
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

<div id="donate-notconfirmed">
	<h2 id="r-part-h2" class="r-h2-special" style="display:block">What would you like to donate?</h2>
<div class="grid-gallery" id="r-part-3-1"> 
<h2 id="loading" style="text-align:center">Loading...</h2>
</div>
		<div class="clearfix"></div> 
		<button id="next-step" class="r-part-3">NEXT STEP</button> 
</div>  
</div>  

  
<div id="r-part-4" style="display:none;">  
<div id="cover-address">
<h2 id="H2_help">Help us reach you</h2>
	<div id="cover-address-inner">
		<div id="radios_help">
			<div id="radio_help" class="self-donation">
			<input type="radio" id="self_donate" name="way_donate" checked="checked"/>
					<label for="self_donate" id="radio_help_input">
						<span><span id="SPAN_9"></span></span>
					Please donate at
						<div id="donation_address"><p>Jammu and Kashmir, Kiruchirapalli, p.o. Ghagwal, House No. 12/13, 121212</p></div>
					</label>
					 
			</div> 
			<div id="radio_help" class="pickup-donation">
			<input type="radio" id="pickup_donate" name="way_donate"  />
					<label for="pickup_donate" id="radio_help_input">
						<span><span id="SPAN_9"></span></span>
					Pickup Availability<p>Not Available</p>
					</label> 
			</div> 
		</div>
		<div id="radios_help_2">
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
							<button id="buttonof-partof" onclick="r_4(0);">Register Request</button>
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
							<button id="buttonof-partof" onclick="r_4(1);">Register Request</button>
						</div>
					</li>
				</ul> 
			</div> 
		</div>
<script type="text/javascript">
$(':radio').change(function () { 
	if($('#pickup_donate').is(':checked') && $('#pickup-donation').has('none')){
		$('#pickup-donation').removeClass('none');
		if($('.register_don_1').css('display','none')==false)
		$('.register_don_1').css('display','none');
	}else{
		$('#pickup-donation').addClass('none');  
		if($('.register_don_1').css('display','none'))
		$('.register_don_1').css('display','inline-block');
		}
});

function moveText(c,w){ 
if(w==1 && $('.'+c).hasClass('text-moved')==false) 
$('.'+c).addClass('text-moved');   
if(w==2 && $('.'+c).hasClass('text-moved') && $('.'+ c +' input').val().trim()=="" )
$('.'+c).removeClass('text-moved');   
} 
</script>
	</div>
</div>
<div id="donate-similar">
<h2 id="H2_help" style="text-align:left">People who believe in the same cause</h2><hr><br>
<div class="grid-gallery" id="r-part-4-d">

</div>
</div>
</div>  
<div id="r-part-5" style="display:none;"> 
<h2 id="loading">Loading...</h2>
</div>
<script language="javascript"> 
var states=[]; 
var ls=[]; 
var ns1=[];
var ns2=[]; 
function locs(a,e){
	var dx="";
	var ex="";  
	if(a=='s'){
	var dx="self1";
	var ex="notself1";
	}else if(a=='l'){ 
	var dx="self2";
	var ex="notself2";
	}else if(a=='n'){ 
	var dx="self3";
	var ex="notself3";
	}else if(a=='d'){ 
	var dx="donating";
	var ex="not_donating"; 
	var x= $('.'+e+' input[type="number"]').val();
	if(x<=0){ return; }
	if($('#donate-confirmed').css('display','none')) 
	   $('#donate-confirmed').css('display','block');
	$('.'+e+' #donat-count').html('<strong>'+x+'</strong> items'); 
	$('.'+e).insertAfter( $( "#donation-pre" ) );
	$('.r-h2-special').html('Thankyou! Would you like to donate more?'); 
	} 
	
	if($('.'+e).is("."+dx)){
		$('.'+e).removeClass(dx);$('.'+e).addClass(ex);
		if(a!='d'){
		$('.'+e+' p#connection').text('SELECT');
		//$('.'+e+' p#connection').css('background','crimson');
		}
	}else{
		$('.'+e).removeClass(ex);$('.'+e).addClass(dx);
		if(a!='d'){
		$('.'+e+' p#connection').text('SELECTED');
	//$('.'+e+' p#connection').css('background','yellowgreen');
	}
	} 
return;
} 
$(".r-part-1").click(function(){
var scollected=0;
scollected=document.querySelectorAll('.self1').length;
if(scollected>0){
//move 
if(!$('#r-part-1').css('display','none')){
$('#r-part-1').css('display','none');
}
if(!$('#r-part-2').css('display','block')){
$('#r-part-2').css('display','block');
} 
if(!$('#r-part-2 #r-part-h2').css('display','block')){
$('#r-part-2 #r-part-h2').css('display','block');
} 
} 
var items=$(".self1");
for(var i=0;i<scollected;i++){
	states[i]=jQuery(items[i]).attr('class').split(' ')[0];
} 
load_locs('s');
return;
});

$(".r-part-2").click(function(){
var lcollected=0;
lcollected=document.querySelectorAll('.self2').length;
if(lcollected>0){
//move 
if(!$('#r-part-2').css('display','none')){
$('#r-part-2').css('display','none');
}
if(!$('#r-part-3').css('display','block')){
$('#r-part-3').css('display','block');
} 
if(!$('#r-part-3 #r-part-h2').css('display','block')){
$('#r-part-3 #r-part-h2').css('display','block');
} 
} 
var items=$(".self2");
for(var i=0;i<lcollected;i++){
	ls[i]=jQuery(items[i]).attr('class').split(' ')[0];
} 
load_locs('l');
return;
});

$(".r-part-3").click(function(){
var ncollected=0;
ncollected=document.querySelectorAll('#donate-confirmed .self3').length;
if(ncollected>0){
//move 
if(!$('#r-part-3').css('display','none')){
$('#r-part-3').css('display','none');
}
if(!$('#r-part-4').css('display','block')){
$('#r-part-4').css('display','block');
}  
}else{return;}  
var items = $(".self3");
for(var i=0,j=0;i<ncollected;i++){ 
	var y= jQuery(items[i]).attr('class').split(' ')[0]; 
	var x = $('.' + y + ' #val_number').val(); 
	if(x > 0){
	ns1[j] = y;
	ns2[j] = x; 
	j++;
	}
}
loadSimilar();
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
today = yyyy+'-'+mm+'-'+dd;
document.getElementsByClassName("rdate")[0].setAttribute("min", today); 
return;
});
 
function r_4(k){
  var a=$(".rname").val();
  var b=$(".rphone").val();
  var c=$(".rstate").val();
  var d=$(".rcity").val();
  var e=$(".rzip").val();
  var f=$(".rad").val();
  var g=$(".remail").val();
  var h=$(".rdate").val(); 
  var l=0;
  //NaN!=NaN 
  var hh = new Date(h);
	if(hh.getTime()!=hh.getTime() || isInvalid(hh)){
	$('#errors10').text('Error: Invalid date selected'); 
	return;		
	} 
	if(k==0){
  if(a=="" || b=="" || g=="" || h==""){
	$('#errors10').text('Some fields are still empty..'); 
  }else{ 
	$('#errors10').text('Processing..'); 
  }
  var l="a="+a+"&b="+b+"&h="+h+"&g="+g+"&k="+k+"&ns1="+ns1.join(',')+"&ns2="+ns2.join(','); 
	}
	else if(k==1){
  if(a=="" || b=="" || c=="" || d=="" || e=="" || f=="" || g=="" || h==""){
	$('#errors10').text('Some fields are still empty..'); 
  }else{ 
	$('#errors10').text('Processing..'); 
  }
  var l="a="+a+"&b="+b+"&c="+c+"&d="+d+"&e="+e+"&f="+f+"&g="+g+"&h="+h+"&k="+k+"&ns1="+ns1.join(',')+"&ns2="+ns2.join(','); 
	}
  $.ajax({type:"POST",url:"main/php/collectneeds.php",data:l,cache:false,success:function(m){ 
		if(m==1){ 
		//setTimeout(function(){ 
		//$('#errors10').text('We have registered your request. Please have patience till one of our representative reaches you');  
		//}, 5000); 
		//open_page(7);
		
if(!$('#r-part-4').css('display','none')){
$('#r-part-4').css('display','none');
}
if(!$('#r-part-5').css('display','block')){
$('#r-part-5').css('display','block');
} 
	 finalize(h,k);
	 }else{
		$('#errors10').text(m);
	 }  
   } 
});
return;
} 

function isInvalid(h){ 
var now = new Date();
now.setHours(0,0,0,0);
if (h < now){
return true;
}
return false;
}

function finalize(h,k){
 var l="b="+h+"&c="+k+"&a="+$('#donation_address').html();
    $.ajax({type:"POST",url:"main/html/thankyou.php",data:l,cache:false,success:function(m){  
	$('#r-part-5').html(m); 
	} 
}); 
}
function load_locs(a){ 
	if(a=='s'){
	var f="taken="+states+"&m="+a; 
	}else if(a=='l'){ 
	var f="taken="+ls+"&m="+a+"&mn=not"; 
	}
$.ajax({type:"POST",url:"main/php/locs.php",data:f,cache:false,success:function(d){ //alert(d);
	if(a=="s"){
		document.getElementById("r-part-2-1").innerHTML=d;
	} 
	else if(a=="l"){
		document.getElementById("r-part-3-1").innerHTML=d;
	} 
}
});		
return;	
}  
function support(b,c){
	var a="obj="+b+"&c="+c;
	$.ajax({type:"POST",url:"main/php/validate_support.php",data:a,cache:false,success:function(d){ 
	if(d==1){ 
	loadSimilar();
	}else if(d==0){
		
	}else{
		
	}
	}
	})}

function loadSimilar(){
var l="ls="+ls.join(',');
$.ajax({type:"POST",url:"main/html/similar_people.php",data:l,cache:false,success:function(m){ 
	  $('#r-part-4-d').html(m);
 }});
}
</script>				
			
			