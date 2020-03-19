<?php require_once '../../db/init.php'; ?>
<?php protectPage(); ?>
	<div id="cover-settings"> 
			<form id="setprofilepicform" method="post">
				<h2>Profile Pic:</h2>  
				<div class="ov2">
				<h3 id="setprofilepicstatus">Upload</h3>
				</div>
				<input onblur="validate('profilePic',this.value);" type="file" name="profilePic" class="profilePic" id="username" value="<?php echo  $userData['profilePic']; ?>" readonly="readonly"/>
			</form> <br>
				<h2 onclick="">First Name:</h2>
				<input type="text" onblur="validate('setfName',this.value)" name="setfName" class="setfName" id="name" value="<?php 
				echo $userData['fName'];
				?>" readonly="readonly" onclick="set('setfName');"/><br>
				<h2 onclick="">Last  Name:</h2>
				<input type="text" onblur="validate('setlName',this.value)" name="setlName" class="setlName" id="name" value="<?php 
				echo $userData['lName'];
				?>" readonly="readonly" onclick="set('setlName');"/><br>
				<h2>Username:</h2> 
				<input type="text" onblur="validate('setuName',this.value)" class="setuName" onclick="set('setuName');" name="setuName" id="username" value="<?php 
				echo $userData['userName'];
				?>" readonly="readonly"/><br> 
				&nbsp;<h2>Password:</h2>
				<input type="password"  onblur="validate('setpassword',this.value)" class="setpassword" onclick="set('setpassword');" name="setpassword" id="password" placeholder="********" readonly="readonly"/> 
				<br><h2>Email:</h2>
				<input onblur="validate('setemail',this.value)" type="text" name="setemail" class="setemail" id="email" value="<?php 
				echo $userData['email'];
				?>" readonly="readonly" class="setemail" onclick="set('setemail');" ><br>
				<h2>Phone:</h2>
				<input type="text" onblur="validate('setphone',this.value)" name="setphone" class="setphone" onclick="set('setphone');"  id="phone" value="<?php 
				echo $userData['phone'];
				?>" readonly="readonly"><br>
				<h2>Age:</h2>
				<input onblur="validate('setage',this.value)"  type="text" name="setage" id="phone" class="setage" onclick="set('setage');"  value="<?php 
				echo $userData['age'];
				?>" readonly="readonly"><br>
				<h2>Sex:</h2>
				<input onblur="validate('setsex',this.value)"  class="setsex" onclick="set('setsex');"  type="text" name="setsex" id="phone" value="<?php 
				echo $userData['sex'];
				?>" readonly="readonly"><br> 
				<h2>Date Of Birth:</h2>
				<input type="text" onblur="validate('setdob',this.value)"  class="setdob" onclick="set('setdob');" name="setdob" id="phone" value="<?php 
				echo $userData['dob'];
				?>" placeholder="yy-mm-dd" readonly="readonly"><br>
				<h2>Country:</h2>
				<input type="text" onblur="validate('setcountry',this.value)"  name="setcountry" class="setcountry" onclick="set('setcountry');" id="address" value="<?php 
				echo $userData['country'];
				?>" readonly="readonly"/><br>
				<h2>State:</h2>
				<input  class="setstate" onclick="set('setstate');" type="text" onblur="validate('setstate',this.value)" name="setstate" id="address" value="<?php 
				echo $userData['state'];
				?>" readonly="readonly"/><br>
				<h2>City:</h2>
				<input type="text" onblur="validate('setcity',this.value)" class="setcity" onclick="set('setcity');" name="setcity" id="address" value="<?php 
				echo $userData['city'];
				?>" readonly="readonly"/><br>
				<h2>Address:</h2>
				<input type="text" onblur="validate('setaddress',this.value)" name="setaddress" class="setaddress" onclick="set('setaddress');"  id="address" value="<?php 
				echo $userData['address'];
				?>" readonly="readonly"/><br>
				&nbsp;<h2>Occupation:</h2>
				<input type="text" onblur="validate('setoccupation',this.value)"  name="setoccupation" id="occupation" class="setoccupation" onclick="set('setoccupation');" value="<?php 
				echo $userData['occupation'];
				?>" readonly="readonly"/>
				<br> 
				&nbsp;<h2>Education:</h2>
				<input type="text" onblur="validate('setedu',this.value)"  name="setedu" class="setedu" onclick="set('setedu');" id="occupation" value="<?php 
				echo $userData['education'];
				?>" readonly="readonly"/>
				<br> 
				&nbsp;<h2>Institution:</h2>
				<input onblur="validate('setinst',this.value)"  class="setinst" onclick="set('setinst');" type="text" name="setinst" id="occupation" value="<?php 
				echo $userData['institution'];
				?>" readonly="readonly"/>
				<br>
				&nbsp;<h2>Best Quality:</h2>
				<input type="text" class="setbQuality" onclick="set('setbQuality');" onblur="validate('setbQuality',this.value)"  name="setbQuality" id="occupation" value="<?php 
				echo $userData['bestQuality'];
				?>" readonly="readonly"/>
				<br>
	</div>
				<div id="left-main-in"> 
					<input id="general-submit" name="setall" onblur="validate('setall',this.value)" readOnly="readOnly" class="setall" value="SAVE"/> 
				</div>  

</div>
<script type="text/javascript">
			 
$(document).ready(function(){$("#setprofilepicform").on("submit",(function(b){b.preventDefault();var a=new FormData(this);$.ajax({type:"POST",url:"php/setprofilepic.php",data:a,cache:false,contentType:false,processData:false,success:function(c){document.getElementById("picinfo").src=(c)},error:function(c){}})}));$(".profilePic").on("change",function(){$("#setprofilepicform").submit()});$(".setall").click(function(){var j=$(".setfname").val();var a=$(".setlname").val();var m=$(".setuname").val();var f=$(".setpassword").val();var z=$(".setzip").val();var r=$(".setemail").val();var i=$(".setage").val();var c=$(".setsex").val();var p=$(".setaddress").val();var k=$(".setstate").val();var q=$(".setcity").val();var g=$(".setcountry").val();var n=$(".setbquality").val();var e=$(".setinst").val();var b=$(".setedu").val();var h=$(".setoccupation").val();var l=$(".setphone").val();var o=$(".setdob").val();var d="setfname="+j+"&setlname="+a+"&setuname="+m+"&setpassword="+f+"&setemail="+r+"&setage="+i+"&setsex="+c+"&setaddress="+p+"&setstate="+k+"&setcity="+q+"&setcountry="+g+"&setbquality="+n+"&setinst="+e+"&setedu="+b+"&setoccupation="+h+"&setphone="+l+"&setdob="+o+"&setzip="+z;if(j==""||a==""||m==""||f==""||r==""){}else{$.ajax({type:"POST",url:"php/setall.php",data:d,cache:false,success:function(s){if(s=="Success!"){document.getElementsByClassName("setall")[0].value=s;settings()}else{document.getElementsByClassName("setall")[0].value="FAILED"}}})}return false})});function validate(c,b){var a;if(window.XMLHttpRequest){a=new XMLHttpRequest()}else{a=new ActiveXObject("Microsoft.XMLHTTP")}a.onreadystatechange=function(){if(a.readyState!=4&&a.status==200){document.getElementsByClassName(c)[0].value="Validating.."}else{if(a.readyState==4&&a.status==200){if(a.responseText=="INVALID!"){document.getElementsByClassName(c)[0].value="";document.getElementsByClassName(c)[0].placeholder="INVALID!"}else{document.getElementsByClassName(c)[0].value=a.responseText}}else{}}};a.open("GET","php/setval.php?field="+c+"&query="+b,false);a.send()};</script>