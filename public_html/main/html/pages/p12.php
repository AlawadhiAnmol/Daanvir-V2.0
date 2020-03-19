<?php require_once '../../db/init.php'; ?>
<?php protectPage(); ?>
<div id="general-cover"> 
<script language="javascript">
			function move(c){var a=["started","added","involved","finished","dubbed"];for(var b=0;b<5;b++){if(a[b]==c&&document.getElementsByClassName(a[b])[0].style.display!="block"){document.getElementsByClassName(a[b])[0].style.display="block"}else{if(a[b]!=c&&document.getElementsByClassName(a[b])[0].style.display!="none"){document.getElementsByClassName(a[b])[0].style.display="none"}}}};
				</script>
<div id="acc-wrap" class="started">  
	<div id="acc-wrap-in">  
		<div id="head"><h2>Here, you can add connections for campaigning</h2></div> 	
		<div id="head3"><h2> </h2></div>  
		<div id="head4">
		<!--
		<button id="bback" style="visibility:hidden" disabled="disabled">Back</button> 
		-->
		<button id="bbback" onclick="move('added')" >Get Started!</button>
		<!--
		<button id="bback" style="visibility:hidden" disabled="disabled">Next</button>
		-->

		</div>
	</div>
</div>
<!------------------------------------------------------------->
<div id="acc-wrap" class="added">  
	<div id="acc-wrap-in">  
		<div id="head"><h2>Increase Strength For the Cause</h2></div>
	   <div id="head5">
		<div id="head5in-mid" class="contactView contact_edit"> 
			<div id="nots1" class="cover-shadow">  
				<div id="profile-main">
					<div id="pict"><img id="thiscontactprofilepic" src="images/userpic.png"/></div>
					<div id="details">
					<h2 class="typedfl">Contact Name</h2> 
					<p class="typedc">Locality</p>
					</div>
				
				</div>
			<div id="cover-settings" class="contacteditform">
			<script language="javascript">
				function edit(cl){
			var elm=document.getElementsByClassName(cl)[0];if(elm.readOnly==true){elm.readOnly=false;}else{}
return;}
function edited(cl){var elm=document.getElementsByClassName(cl)[0];if(elm.readOnly==true){}else{elm.readOnly=false;}
return;}
			</script>
 
			  <div id="edit">
				<h2 onclick="">First Name :</h2>
				<input type="text" name="fname1" id="name" value="" readOnly="readonly" class="fname1" onclick="edit('fname1');" onmouseout="edited('fname1');" placeholder="** First Name"  >
			  </div>
			  
			  <form id="edit" class="editprofilepicforcontacts">
				<h2>Profile Pic:</h2>  
				<div class="ov">
				<h3>Upload</h3>
				</div>
				<input type="file" name="contactprofilepic" id="username" value="" class="contactprofilepic"> 
			  </form>
			  <div id="edit">
				<h2 onclick="">Last  Name :</h2>
				<input type="text" name="lname1" id="name" class="lname1" value="" readonly="readonly"  onclick="edit('lname1');" onmouseout="edited('lname1');" placeholder=" Surname" > 
			  </div> 
			  <div id="edit"> 
				<h2>Email :</h2>
				<input type="text" name="email" id="email" class="email1" value="" readonly="readonly" onclick="edit('email1');" onmouseout="edited('email1');" placeholder="*A valid email"> 
			  </div>
			  <div id="edit">
				<h2>Phone:</h2>
				<input type="text" name="phone" id="phone" class="phone1" value="" readonly="readonly" onclick="edit('phone1');" onmouseout="edited('phone1');" placeholder="* 10 digits "> 
			  </div> 
			  <div id="edit">
				<h2>Sex:</h2>
				<input type="text" name="sex" id="phone" value="" readonly="readonly" class="sex1" onclick="edit('sex1');" onmouseout="edited('sex1');" placeholder="M/F/O ">
			  </div>
			  <div id="edit">
				<h2>D.O.B:</h2>
				<input type="text" name="dob" id="phone" class="dob1" value="" placeholder="dd/mm/yy" readonly="readonly" onclick="edit('dob1');" onmouseout="edited('dob1');" placeholder="Date Of Birth"> 
			  </div>
			  <div id="edit">
				<h2>Country:</h2>
				<input type="text" name="state" id="address" value="" readonly="readonly" class="country1" onclick="edit('country1');" onmouseout="edited('country1');" placeholder="Country ">
			  </div>
			  <div id="edit">
				<h2>State:</h2>
				<input type="text" name="state" id="address" value="" readonly="readonly" class="state1" onclick="edit('state1');" onmouseout="edited('state1');" placeholder="State">
			  </div>
			  <div id="edit">
				<h2>City:</h2>
				<input type="text" name="city" id="address" value="" readonly="readonly" class="city1" onclick="edit('city1');" onmouseout="edited('city1');" placeholder="City " > 
			  </div>
			  <div id="edit">
				<h2>Occupation:</h2>
				<input type="text" name="occupation" id="occupation" value="" readonly="readonly" class="occupation1" onclick="edit('occupation1');" onmouseout="edited('occupation1');" placeholder="Occupation ">
			  </div> 
			  <div id="edit">
				<h2>Address:</h2>
				<input type="text" name="address" id="address" value="" readonly="readonly" class="address1" onclick="edit('address1');" onmouseout="edited('address1');" placeholder="Street, House No. etc. "> 
			  </div>
				</div>  
			</div> 	
				<div id="left-main-in"> 
					<button id="in2" class="savecontact" onclick="">SAVE</button>  
					<button id="in2" class="delcontact"  onclick="">Remove</button> 
				</div>			
		</div> 
<div id="head5in-mid" class="contact_edit_new"> 
	<img id="changeviewcontacts" src="./images/new_icon.png"> 		
</div> 
		<div id="head5in-side" class="rotl">
			<div id="headin-head">
			    <h2>Filter: SMS<br><hr></h2> 
			</div>
			<div id="conbody" class="loadfbs">
			<div id="nots1" class="filterbysms scroll"> 
				<?php 
				filter($userData['userId'],'sms','notsel');
				?>   	 
				</div>
			</div>
		</div> 
		  <div id="head5in-side" class="rotr">
			<div id="headin-head">
				<h2>Filter: EMAIL<br><hr></h2>
			</div>
			
			<div id="conbody" class="loadfbe">
<div id="nots1" class="filterbyemail scroll">  
				<?php 
				filter($userData['userId'],'email','notsel');
				?> 
				</div>
				
			</div>
		  </div>
	   </div>
		<div id="head4">
		<button id="bback" onclick="move('started');">Back</button>
		<button id="bbback" style="display:none;" disabled="disabled">I'm Done</button>
		<button id="bback" class="loadaudience">Next</button>

		</div>
	</div>
</div>

<script language="javascript">  
var picSet=0;var profilePic=$("#thiscontactprofilepic").attr("src");$(".fname1").keyup(function(){document.getElementsByClassName("typedfl")[0].innerHTML=$(this).val()});$(".lname1").keyup(function(){document.getElementsByClassName("typedfl")[0].innerHTML=$(".fname1").val()+" "+$(this).val()});$(".city1").keyup(function(){document.getElementsByClassName("typedc")[0].innerHTML="Locality: "+$(this).val()});var actClass="";function changeContact(b){picSet=0;actClass=b;document.getElementsByClassName("savecontact")[0].innerHTML="Save";document.getElementsByClassName("delcontact")[0].innerHTML="Remove";$(".contact_edit_new").hide();$(".contactView").removeClass("contact_edit");var a="value="+b;$.ajax({type:"POST",data:a,dataType:"json",url:"php/editContactOnDemand.php",cache:false,success:function(c){if(c.pic!=""){$("#thiscontactprofilepic").attr("src",c.pic)}else{$("#thiscontactprofilepic").attr("src","images/userpic.png")}$(".fname1").val(c.fName);$(".lname1").val(c.lName);$(".email1").val(c.email);$(".phone1").val(c.phone);$(".sex1").val(c.sex);$(".dob1").val(c.dob);$(".country1").val(c.country);$(".state1").val(c.state);$(".city1").val(c.city);$(".occupation1").val(c.occupation);$(".address1").val(c.address);document.getElementsByClassName("typedfl")[0].innerHTML=c.fName+" "+c.lName;document.getElementsByClassName("typedc")[0].innerHTML="Locality: "+c.city;document.getElementsByClassName("email1")[0].disabled=true}});return}$(document).ready(function(){$("#changeviewcontacts").click(function(){$("#thiscontactprofilepic").attr("src","images/userpic.png");$(".fname1").val("");$(".lname1").val("");$(".email1").val("");$(".phone1").val("");$(".sex1").val("");$(".dob1").val("");$(".country1").val("");$(".state1").val("");$(".city1").val("");$(".occupation1").val("");$(".address1").val("");actClass="";document.getElementsByClassName("email1")[0].disabled=false;document.getElementsByClassName("savecontact")[0].innerHTML="Save";document.getElementsByClassName("delcontact")[0].innerHTML="Remove";document.getElementsByClassName("typedfl")[0].innerHTML=" NAME";document.getElementsByClassName("typedc")[0].innerHTML="Locality: ";$(".contact_edit_new").hide();$(".contactView").removeClass("contact_edit");$.ajax({type:"POST",url:"php/setcontactview.php",cache:false,success:function(a){}});return false});$(".editprofilepicforcontacts").on("submit",(function(b){b.preventDefault();var a=new FormData(this);$.ajax({type:"POST",url:"php/setcontactprofilepic.php",data:a,cache:false,contentType:false,processData:false,success:function(c){document.getElementById("thiscontactprofilepic").src=(c);profilePic=c;picSet=1},error:function(c){}})}));$(".contactprofilepic").on("change",function(){$(".editprofilepicforcontacts").submit()});$(".savecontact").click(function(){var h=$(".fname1").val();var a=$(".lname1").val();if(picSet==0){var e="images/userpic.png"}else{var e=profilePic}var k=$(".email1").val();var i=$(".phone1").val();var j=$(".sex1").val();var m=$(".dob1").val();var d=$(".country1").val();var b=$(".state1").val();var f=$(".city1").val();var c=$(".occupation1").val();var l=$(".address1").val();var g="fName="+h+"&lName="+a+"&thisPic="+e+"&email="+k+"&phone="+i+"&sex="+j+"&dob="+m+"&country="+d+"&state="+b+"&city="+f+"&occupation="+c+"&address="+l;if(h==""||a==""||k==""){}else{$.ajax({type:"POST",url:"php/setcontact.php",data:g,dataType:"json",cache:false,success:function(n){if(n.r=="Success!"){$(".contact_edit_new").show();$(".contactView").addClass("contact_edit");$(".loadfbs").load("php/loads.php .filterbysms");$(".loadfbe").load("php/loads.php .filterbyemail");document.getElementsByClassName("savecontact")[0].innerHTML=n.r;if(profilePic=="images/userpic.png"){profilePic=n.p}document.getElementsByClassName("Cls"+actClass)[0].src=profilePic;document.getElementsByClassName("Cls"+actClass)[1].src=profilePic;picSet=0;document.getElementsByClassName("Nm"+actClass)[0].innerHTML=h+" "+a;document.getElementsByClassName("Nm"+actClass)[1].innerHTML=h+" "+a;document.getElementsByClassName("Ph"+actClass)[0].innerHTML=i}else{document.getElementsByClassName("savecontact")[0].innerHTML="FAILED";picSet=0}}})}return false});$(".delcontact").click(function(){var a=$(".email1").val();var b="email="+a;if(a==""){$(".contact_edit_new").show();$(".contactView").addClass("contact_edit");document.getElementsByClassName("delcontact")[0].innerHTML="Cancelled";picSet=0}else{$.ajax({type:"POST",url:"php/delcontact.php",data:b,cache:false,success:function(c){if(c=="Success!"){$(".contact_edit_new").show();$(".contactView").addClass("contact_edit");$(".loadfbs").load("php/loads.php .filterbysms");$(".loadfbe").load("php/loads.php .filterbyemail");document.getElementsByClassName("delcontact")[0].innerHTML="Removed!";picSet=0}else{document.getElementsByClassName("delcontact")[0].innerHTML="FAILED";picSet=0}}})}return false})});
</script>	
<!------------------------------------------------------------->
<div id="acc-wrap" class="involved added">  
	<div id="acc-wrap-in"> 
<div id="moveleft">	
		<div id="head"><h2>Spread your Message wider</h2></div>
	   <div id="head5">
		<div id="head5in-side" class="rotl">
			<div id="headin-head">
			    <h2>Select for SMS<br><hr></h2> 
			</div>
			<div id="conbody" class="sloadspread scroll">
		</div>
		</div>
		 <div id="head5in-side" class="rotr">
			<div id="headin-head">
				<h2>Select for EMAIL<br><hr></h2>
			</div> 
			<div id="conbody" class="eloadspread scroll">
		</div>
	  </div>
		<div id="head5in-mid"> 
			<div id="headin-head">
			    <h2>Select for Supporters<br><hr></h2> 
			</div>
				<div id="conbody" class="floadspread scroll">
			</div>
		</div> 
	   </div>
	   </div><script language="javascript"> $(".loadaudience").click(function(){move("involved");
	   $(".sloadspread").load("php/loads.php .sfilterspread");
	   $(".eloadspread").load("php/loads.php .efilterspread");
	   $(".floadspread").load("php/loads.php .ffilterspread");
	   $(".contact_edit_new").show();
	   $(".contactView").addClass("contact_edit")});function selcntrl(f,a){if(a==="sms"){a="s";var e="notsels";var d="sels"}else{if(a==="email"){a="e";var e="notsele";var d="sele"}else{a="f";var e="notself";var d="self"}}var b=".SelCntrl"+a+f;if($(b).is("."+d)){$(b).removeClass(d);$(b).addClass(e)}else{$(b).removeClass(e);$(b).addClass(d)}return};
 
</script>
		<div id="head4">
		<button id="bback" onclick="move('added');">Back</button>
		<button id="bbback" style="display:none" disabled="disabled">I'm Done</button>
		<button id="bback" class="finishing">Next</button>
		</div>
	</div>
</div> 
<!------------------------------------------------------------->
<div id="acc-wrap" class="finished added"> 
	<div id="acc-wrap-in">  
		<div id="head"><h2>Type In a Message</h2></div>
	   <div id="head5">
		<div id="head5in-side" class="rotl">
			<div id="headin-head">
			    <h2>SMS Screen<br><hr></h2> 
			</div>
			<div id="conbody" class="smsscreen">
				<div id="screenph">
				<h2>Capacity:</h2> <input type="text" id="incap" value="140" readonly="readonly"> 
				<input type="text" id="incaphid" value="(+0)" readonly="readonly">
				<input type="text" id="incaphidnum" value="( x1)" readonly="readonly">
				<hr>
<script> var cap=140;function inc(a){if(a==1&&cap>-1&&cap<700){cap+=140}else{if(a==2&&cap>140){cap-=140}else{}}document.getElementById("incaphidnum").value="( x"+(cap/140)+")";if($("#sms").text().length>cap){document.getElementById("incap").value="Full!";$("#incap").css("color","red");document.getElementById("incaphid").value="(+"+(($("#sms").text().length)-cap)+")"}else{document.getElementById("incap").value=cap-$("#sms").text().length;$("#incap").css("color","skyblue");document.getElementById("incaphid").value="(+0)"}}function showtext(){document.getElementById("sms").innerHTML="<p>"+$("#textarea").innerText()+"</p>";if($("#sms").text().length>cap){document.getElementById("incap").value="Full!";$("#incap").css("color","red");document.getElementById("incaphid").value="(+"+(($("#sms").text().length)-cap)+")"}else{document.getElementById("incap").value=cap-$("#sms").text().length;$("#incap").css("color","skyblue");document.getElementById("incaphid").value="(+0)"}}(function(a){a.fn.innerText=function(c){if(c){if(document.body.innerText){for(var b in this){this[b].innerText=c}}else{for(var b in this){this[b].innerHTML.replace(/&amp;lt;br&amp;gt;/gi,"n").replace(/(&amp;lt;([^&amp;gt;]+)&amp;gt;)/gi," ")}}return this}else{if(document.body.innerText){return this[0].innerText}else{return this[0].innerHTML.replace(/&amp;lt;br&amp;gt;/gi,"n").replace(/(&amp;lt;([^&amp;gt;]+)&amp;gt;)/gi," ")}}}})(jQuery);
</script> 
				<div id="sms"> 
				</div>
				<hr>
				<button id="inc1" onclick="inc(2)" value=""></button>
				<button id="inc2" onclick="inc(1)" value=""></button>
				</div>
			</div>
		</div>
		
		  <div id="head5in-side" class="rotr loadafterdel">
		  <div class="midload">
			<div id="headin-head">
				<h2>Saved Templates<br><hr></h2>
			</div> 
			<div id="conbody" class="loadtemplates">
			<div id="nots1" class="templates scroll"> 
		<?php loadTemps($userData['userId']);	?>   
				</div>
		<button id="deltemp" onclick="delete_temp();">Delete This!</button>
				</div>
			</div>
		  </div>
		<div id="head5in-mid"> 
			<div id="headin-head">
			    <h2>Your Message<br><hr></h2> 
			</div>
			<div id="conbody" class="loadmessage">
				<div id="message-main">
					<form id="message-pic"><input type="file" name ="campPic" class="message-pic-up"></form>
					<div id="message-theme">
						<div id="title">
							<h2>Main line:</h2>
							<input class="maincampline" type="text" placeholder="Enter some big words ">
						</div> 
						<div id="title"> 
							<h2>Mode:</h2> 
    <input class="check-custom" disabled="disabled" id="checksms" type="checkbox" ><label for="checksms">SMS</label>
    <input class="check-custom" disabled="disabled" id="checkemail" type="checkbox" ><label for="checkemail">E-MAIL</label>
    <input class="check-custom directcamp" id="checkdir" type="checkbox" ><label for="checkdir">DIRECT</label>
						</div> 
					</div>
				</div>
				<div id="message-body" class="makeloads">
					<div class="camptext" id="textarea" onkeyup="showtext()" contentEditable="true" placeholder="Start typing in "></div>
				</div> 
				<script>
				function addsmiley(smiley){
				$('#textarea').append("<img src='parampaa/" + smiley + ".gif' />");
				}
				</script>
				<div id="message-accessories">
				<div id="smiley">
					<img src="parampaa/Woot.gif" onclick="addsmiley('Woot')">
					<img src="parampaa/LOL.gif" onclick="addsmiley('LOL')">
					<img src="parampaa/Rolleyes.gif" onclick="addsmiley('Rolleyes')">
					<img src="parampaa/Sad.gif" onclick="addsmiley('Sad')">
					<img src="parampaa/Smile.gif" onclick="addsmiley('Smile')">
					<img src="parampaa/Sorry.gif" onclick="addsmiley('Sorry')">
					<img src="parampaa/Mad.gif" onclick="addsmiley('Mad')">
					<img src="parampaa/Sleepy.gif" onclick="addsmiley('Sleepy')">
					<img src="parampaa/Question.gif" onclick="addsmiley('Question')"> 
					<img src="parampaa/Cool.gif" onclick="addsmiley('Cool')">
				</div>
				<div id="import"><input type="file" disabled="disabled"></div> 
				</div> 
			</div>
		</div>
	   </div>
		<div id="head4">
		<button id="bback" onclick="move('involved');">Back</button>
		 <button id="bbback" class="savetemplate wtemplate comp ">Save Template</button>
		<button class="spreadout" id="bback">Spread Out!</button> 
		</div>	
		<div id="head4">
		 <button id="bbback" class="savetemplate wtemplate mob">Save Template</button>
		 </div>	
		
	</div>
</div>

<div id="acc-wrap" class="dubbed"> 
	<div id="acc-user-info">
		<div id="info-box"> 
		<h4>YOUR CAMPAIGN WAS SUCCESSFUL!</h4> 
		</div>
	</div>
	<div id="acc-wrap-in">
	<h3>Thankyou for all the good things you do</h3></div>
</div> 
<script type="text/javascript"> var status=0;var loaded='';function loadt(t){var dataString='t='+t;$.ajax({type:"POST",url:"php/loadtemp.php",data:dataString,dataType:'json',cache:false,success:function(result){document.getElementById('deltemp').style.display="inline-block";document.getElementsByClassName('makeloads')[0].innerHTML=result.body;$('.maincampline').val(result.head);$('#message-pic').css("background-image","url("+result.pic+")");document.getElementsByClassName('savetemplate')[0].innerHTML="NEW TEMPLATE";document.getElementsByClassName('savetemplate')[1].innerHTML="NEW TEMPLATE";loaded=result.class;status=1;showtext();}});return;}
var fols=[];$(".finishing").click(function(){var fcollected=0;fcollected=document.querySelectorAll('.self').length;if(fcollected>0){move('finished');}
var items=$(".self");for(var i=0;i<fcollected;i++){fols[i]=jQuery(items[i]).attr('class').split(' ')[0];}
return;});$(".spreadout").click(function(){if(document.getElementById('deltemp').style.display!="none"){document.getElementById('deltemp').style.display="none";}
var cls=fols.join(",");var maincampline=$('.maincampline').val();var camptext=$('.camptext').html();var pic=$('#message-pic').css("background-image");var clean=/\"|\'|\)/g;pic=pic.split('/').pop().replace(clean,'');var dataString='maincampline='+maincampline+'&camptext='+camptext+'&fols='+cls+'&pic='+pic;var cb=$('.directcamp').is(':checked');if(cb===true){if(maincampline==""||$('.camptext').text()==""){}else{$.ajax({type:"POST",url:"php/newcamp.php",data:dataString,cache:false,success:function(result){move('dubbed');}});}}
return false;});$(".savetemplate").click(function(){if(document.getElementById('deltemp').style.display!="none"){document.getElementById('deltemp').style.display="none";}
if(status==0){var maincampline=$('.maincampline').val();var camptext=$('.camptext').html();var pic=$('#message-pic').css("background-image");var clean=/\"|\'|\)/g;pic=pic.split('/').pop().replace(clean,'');var dataString='maincampline='+maincampline+'&camptext='+camptext+'&pic='+pic;if(maincampline==""||$('.camptext').html()==""){}else{$.ajax({type:"POST",url:"php/savetemp.php",data:dataString,cache:false,success:function(result){$(".loadafterdel").load("php/loads.php .midload");status=0;}});}}else{$('.maincampline').val('');$('.camptext').html('');$('#message-pic').css("background-image","url(images/alt.png)");document.getElementsByClassName('savetemplate')[0].innerHTML="Save Template";document.getElementsByClassName('savetemplate')[1].innerHTML="Save Template";status=0;showtext();}
return false;});function delete_temp(){if(loaded==""){}else{var dataString='loaded='+loaded;$.ajax({type:"POST",url:"php/deltemp.php",data:dataString,cache:false,success:function(result){$('.maincampline').val('');$('.camptext').html('');loaded='';document.getElementById('deltemp').style.display="none";document.getElementsByClassName('savetemplate')[0].innerHTML="Save Template";document.getElementsByClassName('savetemplate')[1].innerHTML="Save Template";status=0;$(".loadafterdel").load("php/loads.php .midload");}});}
return;}
$('#message-pic').on('submit',(function(e){e.preventDefault();var formData=new FormData(this);$.ajax({type:'POST',url:'php/setcamppic.php',data:formData,cache:false,contentType:false,processData:false,success:function(data){$('#message-pic').css("background-image","url("+data+")");},error:function(data){}});}));$('.message-pic-up').on("change",function(){$('#message-pic').submit();});
</script>
	


</div>