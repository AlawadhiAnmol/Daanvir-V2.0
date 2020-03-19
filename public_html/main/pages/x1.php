<?php require_once '../db/init.php'; ?>
<?php protectPage(); ?>  
		<div id="FORM_3" class="settings-form">
			<h1 id="H1_4" style="text-decoration:underline">
				Personal Settings
			</h1>
			<p>
Kindly keep your settings updated for the best experience.
</p>
			<div id="errors10"></div> 
			<p id="P_5" style="height:0"> 
			<form id="setpform" method="post">
				<label for="profilepic" id="LABEL_6">
					profile pic
				</label>
				<input id="INPUT_7" class="profilepic" onblur="validate('profilepic',this.value);" type="file" name="profilepic"  value="<?php echo  $userData['profilePic']; ?>" />
			</form>
			</p> 
			<p id="P_5">
				 
				<label for="setfname" id="LABEL_6">
					first name
				</label>
				<input id="INPUT_7" class="setfname" onblur="validate('setfname',this.value)" name="setfname" type="text" placeholder="myfirstname" value="<?php 
				echo $userData['fName']; 
				?>" readonly="readonly" onclick="set('setfName');"/>
			</p> 
			<p id="P_5">
				 
				<label for="setlname" id="LABEL_6">
					last name
				</label>
				<input id="INPUT_7" onblur="validate('setlname',this.value)" name="setllame" class="setlname" value="<?php  
				echo $userData['lName']; 
				?>" readonly="readonly" onclick="set('setlName');"type="text" placeholder="mylastname" />
			</p>  
			<h2 id="h2-save" onclick="expand('contact-save')">Contact details</h2>
			
			<div id="contact-save">
			<p id="P_5">
				<label for="setemail" id="LABEL_6">
					email
				</label>
				<input id="INPUT_7" onblur="validate('setemail',this.value)" type="text" name="setemail" class="setemail" value="<?php 

				echo $userData['email'];

				?>" readonly="readonly" class="setemail" onclick="set('setemail');" placeholder="mymail@mail.com" />
			</p> 
			<p id="P_5">
				 
				<label for="setphone" id="LABEL_6">
					phone (private)
				</label>
				<input id="INPUT_7" type="text" onblur="validate('setphone',this.value)" name="setphone" class="setphone" onclick="set('setphone');" value="<?php 

				echo $userData['phone'];

				?>" readonly="readonly" placeholder="eg, 1234567890" />
			</p> 
			</div>
			<h2 id="h2-save" onclick="expand('general-save')">General Information</h2>
			
			<div id="general-save">
			<p id="P_5">
				 
				<label for="setage" id="LABEL_6">
					age
				</label>
				<input id="INPUT_7" onblur="validate('setage',this.value)" type="text" name="setage" class="setage" onclick="set('setage');"  value="<?php 

				echo $userData['age'];

				?>" readonly="readonly" placeholder="eg, 21" />
			</p> 
			<p id="P_5">
				 
				<label for="setsex" id="LABEL_6">
					sex
				</label>
				<input id="INPUT_7" onblur="validate('setsex',this.value)"  class="setsex" onclick="set('setsex');"  type="text" name="setsex" value="<?php 

				echo $userData['sex'];

				?>" readonly="readonly" placeholder="M / F / O" />
			</p> 
			<p id="P_5">
				 
				<label for="setdob" id="LABEL_6">
					birthday
				</label>
				<input id="INPUT_7" type="text" onblur="validate('setdob',this.value)"  class="setdob" onclick="set('setdob');" name="setdob" value="<?php 

				echo $userData['dob'];

				?>" readonly="readonly" placeholder="yyyy-mm-dd" />
			</p> 
			</div>
			<h2 id="h2-save" onclick="expand('address-save')">Address Related Information</h2>
			
			<div id="address-save">
			<p id="P_5">
				 
				<label for="setcountry" id="LABEL_6">
					country
				</label>
				<input id="INPUT_7" onblur="validate('setcountry',this.value)"  name="setcountry" class="setcountry" onclick="set('setcountry');" value="<?php 

				echo $userData['country'];

				?>" readonly="readonly" type="text" placeholder="your country name" />
			</p> 
			<p id="P_5">
				 
				<label for="setstate" id="LABEL_6">
					state
				</label>
				<input id="INPUT_7" class="setstate" onclick="set('setstate');" type="text" onblur="validate('setstate',this.value)" name="setstate" value="<?php 

				echo $userData['state'];

				?>" readonly="readonly" placeholder="your state name" />
			</p> 
			<p id="P_5">
				 
				<label for="setcity" id="LABEL_6">
					city 
				</label>
				<input id="INPUT_7" type="text" onblur="validate('setcity',this.value)" class="setcity" onclick="set('setcity');" name="setcity" value="<?php 

				echo $userData['city'];

				?>" readonly="readonly" placeholder="your city name" />
			</p> 
			<p id="P_5">
				 
				<label for="setaddress" id="LABEL_6">
					address
				</label>
				<input id="INPUT_7" type="text" onblur="validate('setaddress',this.value)" name="setaddress" class="setaddress" onclick="set('setaddress');" value="<?php 

				echo $userData['address'];

				?>" readonly="readonly" placeholder="eg, locality, house no." />
			</p> 
			<p id="P_5">
				 
				<label for="setzip" id="LABEL_6">
					zip code
				</label>
				<input id="INPUT_7" name="setzip"  onblur="validate('setzip',this.value)" class="setzip" onclick="set('setzip');" value="<?php 

				echo $userData['zip'];

				?>" readonly="readonly" type="text" placeholder="6 digits zip code" />
			</p> 
			</div>
			
			<h2 id="h2-save" onclick="expand('other-save')">Other Information</h2> 
			
			<div id="other-save">
			<p id="P_5">
				 
				<label for="setoccupation" id="LABEL_6">
					occupation
				</label>
				<input id="INPUT_7" onblur="validate('setoccupation',this.value)"  name="setoccupation" class="setoccupation" onclick="set('setoccupation');" value="<?php 

				echo $userData['occupation'];

				?>" readonly="readonly" type="text" placeholder="your occupation" />
			</p> 
			<p id="P_5">
				 
				<label for="setedu" id="LABEL_6">
					education
				</label>
				<input id="INPUT_7"  onblur="validate('setedu',this.value)"  name="setedu" class="setedu" onclick="set('setedu');" value="<?php 

				echo $userData['education'];

				?>" readonly="readonly" type="text" placeholder="Highest degree e.g., B.Sc. Physics" />
			</p> 
			<p id="P_5">
				 
				<label for="setinst" id="LABEL_6">
					institution
				</label>
				<input id="INPUT_7"  onblur="validate('setinst',this.value)"  class="setinst" onclick="set('setinst');" type="text" name="setinst" value="<?php 

				echo $userData['institution'];

				?>" readonly="readonly" type="text" placeholder="Highest degree institution" />
			</p> 
			<p id="P_5">
				 
				<label for="setbquality" id="LABEL_6">
					best quality
				</label>
				<input id="INPUT_7" class="setbquality" onclick="set('setbquality');" onblur="validate('setbquality',this.value)"  name="setbquality" value="<?php 

				echo $userData['bestQuality'];

				?>" readonly="readonly" type="text" placeholder="e.g. Hardworking" />
			</p> 
			
			</div>
			
			<p id="P_5">
				 
				<label for="setpassword" id="LABEL_6">
					Confirm password
				</label>
				<input id="INPUT_7"  type="password"  onblur="validate('setpassword',this.value)" class="setpassword" onclick="set('setpassword');" name="setpassword" placeholder="********" readonly="readonly" />
			</p> 
			Enter your password to save the changes you made
			<p id="P_14">
				<input type="button" onclick="set_update()" class="setsubmit" value="UPDATE" id="INPUT_15" />
			</p>
			
		</div> 
<script>function validate(c,b){var a;if(window.XMLHttpRequest){a=new XMLHttpRequest()}else{a=new ActiveXObject("Microsoft.XMLHTTP")}a.onreadystatechange=function(){if(a.readyState!=4&&a.status==200){document.getElementById("errors10").innerHTML="Validating the fields.."}else{if(a.readyState==4&&a.status==200){if(a.responseText==0){document.getElementsByClassName(c)[0].value="";document.getElementsByClassName(c)[0].placeholder="Invalid entry!"}else{document.getElementsByClassName(c)[0].value=a.responseText}}else{}}};a.open("GET","main/php/setval.php?field="+c+"&query="+b,!1);a.send()};function set(cl){var elm=document.getElementsByClassName(cl)[0];if(elm.readOnly==!0){elm.readOnly=!1}else{}}
function edited(cl){var elm=document.getElementsByClassName(cl)[0];if(elm.readOnly==!0){}else{elm.readOnly=!1}}
</script>	
 
<script type="text/javascript">
$(document).ready(function(){$("#setpform").on("submit",(function(b){b.preventDefault();var a=new FormData(this);$.ajax({type:"POST",url:"main/php/setprofilepic.php",data:a,cache:!1,contentType:!1,processData:!1,success:function(c){document.getElementById("errors10").innerHTML="Profile picture successfully changed"},error:function(c){document.getElementById("errors10").innerHTML="Could not update the profile picture"}})}));$(".profilepic").on("change",function(){$("#setpform").submit()})})
</script>
<script type="text/javascript"> 
function set_update(){document.getElementById("errors10").innerHTML="Connecting..";var j=$(".setfname").val();var a=$(".setlname").val();var f=$(".setpassword").val();var z=$(".setzip").val();var r=$(".setemail").val();var i=$(".setage").val();var c=$(".setsex").val();var p=$(".setaddress").val();var k=$(".setstate").val();var q=$(".setcity").val();var g=$(".setcountry").val();var n=$(".setbquality").val();var e=$(".setinst").val();var b=$(".setedu").val();var h=$(".setoccupation").val();var l=$(".setphone").val();var o=$(".setdob").val();var d="setfname="+j+"&setlname="+a+"&setpassword="+f+"&setemail="+r+"&setage="+i+"&setsex="+c+"&setaddress="+p+"&setstate="+k+"&setcity="+q+"&setcountry="+g+"&setbquality="+n+"&setinst="+e+"&setedu="+b+"&setoccupation="+h+"&setphone="+l+"&setdob="+o+"&setzip="+z;if(j==""||a==""){document.getElementById("errors10").innerHTML="Please fill the field : name"}else if(f==""){document.getElementById("errors10").innerHTML="Please fill the field : password"}else if(r==""){document.getElementById("errors10").innerHTML="Please fill the field : email"}else{$.ajax({type:"POST",url:"main/php/setall.php",data:d,cache:!1,success:function(s){if(s==1){document.getElementById("errors10").innerHTML="Successfully updated the settings"}else{document.getElementById("errors10").innerHTML="Could not update the settings"}}})}
return}
function expand(wh){if($('#'+wh).height()<100){$('#'+wh).animate({height:"380px"},600)}
else{$('#'+wh).animate({height:"0px"},500)}}
</script>


