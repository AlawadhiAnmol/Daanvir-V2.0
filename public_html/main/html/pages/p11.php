<?php require_once '../../db/init.php'; ?>
<?php protectPage(); ?>
<div class="grid-s">
<div id="userinfo">
<h2>Welcome <?php echo $userData['fName'];?></h2>
<div id="userpict">
<img id="picinfo" src=" <?php  echo $userData['profilePic']; ?> "></img></div>
</div>
<?php
//if(loggedIn()===true){  
?>
<script>
/*
//dynamic ajax submit
var $form=$('form');
$form.live('submit',
function(){
	$.post($(this).attr('action'),$(this).serialize(),function(response){
		//do here
		alert('Yeah');
	},'json'); 
	return false;
}
);
*/
</script>
 
<style type="text/css">
#logout{
	display:block;
}
#login{
	display:none;
}
</style> 
<?php 
//}else{
?>
<!--
<style type="text/css">
#logout{
	display:none;
}
#login{
	display:block;
}
</style>
-->
<?php 
//}  

?> 
<div id="logout" > 
<form method="post" action="javascript:logout();">
<input id="round" name="logout" type="submit" value="Logout!"/>  
</form> 
</div>  
<!--
<div id="login">
<div id="ir-settings"></div>
<div id="ir-settings2"></div>
<input id="round" type="submit" value="Login!"/> 
-->
<script language="javascript"> 
function logout(){ 
hideit('logout'); 
window.location="points/logout.php";  
}  
function hideit(div){
	document.getElementById(div).style.display="none"; 
 } 
</script>  
<?php
//logger();
?>  
</div>
<div id="cover-account">
<div id="account-part-left">  
</div>
<div id="account-part-right">
<ul> 
<li onclick="open_link(22);">New Campaigns</li>
<li onclick="open_link(23);">My Campaigns</li>
<li onclick="open_link(24);">My Memories</li>
<li onclick="open_link(25);">My Supporters</li>
<li onclick="open_link(26);">Support Others</li>
<li onclick="open_link(21);">Account Settings</li>
</ul>
</div>  
</div>
<script>
	function set(cl){
					var elm=document.getElementsByClassName(cl)[0];
					if(elm.readOnly == true){
						elm.readOnly = false;
					}else{ 
					}
				}
	function edited(cl){
					var elm=document.getElementsByClassName(cl)[0];
					if(elm.readOnly == true){ 
					
					}else{
						elm.readOnly = false;
					}
				}
			</script>	
			
	
<script language="javascript"> 
open_link(22);
function open_link(num){ 
var g="num="+num;
$.ajax({type:"POST",url:"html/open.php",data:g,success:function(n){
$('#account-part-left').load(n);
}});
return;
}
</script>		


<script language="javascript">
function hideclass(c,d){var b=document.getElementsByClassName(c)[0];b.className+=" slide-zero";var a=document.getElementsByClassName(d)[0];if($(a).attr("height")!=0){a.className+=" slide-zero";setTimeout(function(){a.style.display="none"},650)}setTimeout(function(){b.style.display="none"},650)}

function toggleclass(c){var a=document.getElementsByClassName(c)[0];var b=$(a).attr("class").split(" ");classname=(b[1]);setTimeout(function(){if(classname==""){a.className+=" h-more"}else{if(classname=="h-more"){a.className+=" h-zero";$(a).removeClass(" h-more")}else{a.className+=" h-more";$(a).removeClass(" h-zero")}}},50)}

function togglemore(c){var a=document.getElementsByClassName(c)[0];var b=$(a).attr("class").split(" ");classname=(b[1]);setTimeout(function(){if(classname==""){a.className+=" h-more-more"}else{if(classname=="h-more-more"){a.className+=" h-zero";$(a).removeClass(" h-more-more")}else{a.className+=" h-more-more";$(a).removeClass(" h-zero")}}},50)}</script> 
	
<script language="javascript">
function showitem(a){var b=document.getElementById(a);if(b.style.display!="block"){b.style.display="block"}return}function hideitem(a){var b=document.getElementById(a);if(b.style.display!="none"){b.style.display="none"}return}function access(a){showitem(a);return}function not_access(a){hideitem(a);return};
</script>			
<script language="javascript">
	function vote(b,c){if(c=="ds"){}else{var a="va="+b;$.ajax({type:"POST",url:"php/vote.php",data:a,cache:false,success:function(d){if(d=="imin"){document.getElementsByClassName("st"+b)[0].innerHTML="Sorry";$(".st"+b).css("color","purple")}else{if(d=="imout"){document.getElementsByClassName("st"+b)[0].innerHTML="I'm In";$(".st"+b).css("color","skyblue")}}},error:function(d){}})}return};
</script>
<script language="javascript">
	function support(b,c){var a="obj="+b;$.ajax({type:"POST",url:"php/validate_support.php",data:a,cache:false,success:function(d){if(d==="Added!"){$("."+c).css("background","#fff url(./images/angry.png) no-repeat center center")}else{if(d==="Removed!"){$("."+c).css("background","#fff url(./images/support.png) no-repeat center center")}else{}}}})};
</script>		
<script type="text/javascript"> 
function play(val,src){
var temp=src.split(",");
var path=temp.join("/"); 
var elem= document.getElementById('video');
if(!elem.paused){
	elem.pause(); 
}
var mask1= document.getElementById('notallowed'+val);
var mask2= document.getElementById('notallowed_'+val);
var info= document.getElementsByClassName('notallowed'+val)[0];
var view= document.getElementsByClassName('expandview'+val)[0];  
if(elem.childNodes.length>0){
	elem.removeChild(elem.childNodes[0]);
}
var source = document.createElement('source');
source.setAttribute('src', path);
elem.appendChild(source);
if(elem.style.display=='none'){
	elem.style.display='block';
} 
elem.load(); 
elem.play();  
//mask1.style.display="none";
//mask2.style.display="none";
//info.style.display="none";
//elem.width=820;
//view.style.display="none";
//view.style.width="800px";
//view.style.height="480px"; 
elem.setAttribute("controls",""); 
}
</script>




  
