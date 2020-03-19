<?php protectPage(); ?>
<script type="text/javascript">function inits(){ns4?ld.visibility="hidden":(ns6||ie4)&&(ld.display="none")}var ld=document.all,ns4=document.layers,ns6=document.getElementById&&!document.all,ie4=document.all;ns4?ld=document.loadimg:ns6?ld=document.getElementById("loader-overlay").style:ie4&&(ld=document.all.loadimg.style);</script> 
<?php
if(admin($userData['userId'])==true){
	?>
<div id="admin">
<div id="contains_teams">
<h2 onclick="not_access('admin');not_access('contains_teams')" class="cross_">x</h2> 
	<div id="head_"><h2>Manage Teams Here</h2><hr style="width:50px"></div>
	<div id="body_"> 
		<div id="boxtype_1">
			<div id="bt1ins1">
<h2 onclick="back_load();" class="cross_l"><</h2><h3 class="editteamhead">Teams</h3>
<h2 onclick="" class="cross_r">></h2></div>
			<div id="bt1inl1" class="teams_loads">
			<div class="bt1loads">
			<?php advanced_controls($userData['userId'],1); ?>
			</div>   
			</div>
		</div> 
	</div>
</div>
<div id="contains_locs">
<h2 onclick="not_access('admin');not_access('contains_locs')" class="cross_">x</h2> 
	<div id="head_"><h2>Manage Localities Here</h2><hr style="width:50px"></div>
	<div id="body_"> 
	<div id="boxtype_1">
			<div id="bt1ins1">
	<h2 onclick="back_load1();" class="cross_l1"><</h2><h3 class="editlochead">States</h3>
	<h2 onclick="" class="cross_r1">></h2></div>
			<div id="bt1inl1" class="teams_loads1">
				<div class="bt1loads1">
				<?php advanced_controls($userData['userId'],2); ?>
				</div>   
			</div>
		</div> 
	</div>
</div>
<div id="contains_gath"> 
<h2 onclick="not_access('admin');not_access('contains_gath')" class="cross_">x</h2> 
	<div id="head_"><h2>Manage Gatherings Here</h2><hr style="width:50px"></div>
	<div id="body_"> 
	<div id="boxtype_1">
			<div id="bt1ins1">
	<h2 onclick="back_load2();" class="cross_l2"><</h2> 
	<div class="cross_main">
	<h2 onclick="pr_load3('T');" class="cross_T2">TE</h2>
	<h2 onclick="pr_load3('AC');" class="cross_AC2">AC</h2>
	<h2 onclick="pr_load3('AO');" class="cross_AO2">AO</h2>
	<h2 onclick="pr_load3('PC');" class="cross_PC2">PC</h2>
	<h2 onclick="pr_load3('PO');" class="cross_PO2">PO</h2>
	</div>
	<h3 class="editgathhead">Gatherings</h3> 
	<h2 onclick="" class="cross_r2">></h2></div>
			<div id="bt1inl1" class="teams_loads2">
				<div class="bt1loads2">
				<?php advanced_controls($userData['userId'],3); ?>
				</div> 
			</div>
		</div> 
	</div>
</div>
<div id="contains_ser">
<h2 onclick="not_access('admin');not_access('contains_ser')" class="cross_">x</h2> 
	<div id="head_"><h2>Get Overview Here</h2><hr style="width:50px"></div>
<br><br> 
 <a href="html/videos.php" id="ovrview">2. Manage Videos
 </a>
</div>
</div>
<?php } ?>
<div id="header-content" class="down-color">
    <div class="grid-n">
        <div id="logo"><img src="./images/favicon.png">
            <h2 onclick="window.location='http://daanvir.org'">DaanVir</h2>
        </div>
        <div id="logo-p">
            <p></p>
        </div>
    </div>
    <div class="grid-l nav2">
        <nav class="clearfix2 outerfix2 down-color">
            <ul class="clearfix2">
                <li id="interio"><a class="interio" href="javascript:actnav('interior')">Interior</a>
                </li>
                <li id="speakfo"><a  class="speakfo" href="javascript:actnav('speakfor')">Speak For</a>
                </li>
                <li id="goodwil"><a  class="goodwil" href="javascript:actnav('goodwill')">Goodwill</a>
                </li>
                <li id="hitlis"><a  class="hitlis" href="javascript:actnav('hitlist')">Hitlist</a>
                </li>
				<?php advanced($userData['userId']);?>  
                <li><a href="points/logout.php">Logout</a>
                </li>
            </ul><a href="javascript:void(0)" id="pull2"></a> </nav>
    </div><!--
    <div class="grid-s">
           <div id="logout">
         <input id="round" type="submit" value="Login!" /> 
		 </div>
		
    </div> -->
</div>
<script>
	function actnav(divname){
				var arr=["interior","speakfor","goodwill","hitlist"]; 
				var arr2=["interio","speakfo","goodwil","hitlis"]; 
				var arr3=["acc","camp","goodwill","hitlist"]; 
				for(var i=0;i<4;i++){
					if(arr[i]==divname && document.getElementById(arr[i]).style.display!="block"){
						document.getElementById(arr[i]).style.display="block";
						document.getElementById(arr2[i]).style.background="#B7AFA3";
						document.getElementsByClassName(arr2[i])[0].style.color="#fff"; 
						//process(arr[i]);
						if ($("#"+arr[i]).contents().length < 6)
						$("#"+arr[i]).load('php/'+arr3[i]+'.php'); 
					}else if(arr[i]!=divname  && document.getElementById(arr[i]).style.display!="none"){
						document.getElementById(arr[i]).style.display="none";
						document.getElementById(arr2[i]).style.background="initial";
						document.getElementsByClassName(arr2[i])[0].style.color="#fff";  
					} 
				  }
				  return;
				} 
/*
function process(tab){ 
var dat="tab="+tab; 
$.ajax({type:"POST",url:"php/tab.php",data:dat,cache:false,success:function(cat){  
if ($("#"+tab).contents().length < 2)
$("#"+tab).append(cat);
}});
return;
}								
function logout(){  
	$.ajax({
type: "POST",
url: "db/logout.php", 
cache: false,
success: function(result){   
window.location="http://daanvir.org";
}
});
}  
*/
 $(function(){var e=$("#pull2");menu=$("nav ul"),menuHeight=menu.height(),$(e).on("click",function(e){e.preventDefault(),menu.slideToggle()}),$(window).resize(function(){var e=$(window).width();e>1024&&menu.is(":hidden")&&menu.removeAttr("style")})}),$(function(){$("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var e=$(this.hash);if(e=e.length?e:$("[name="+this.hash.slice(1)+"]"),e.length)return $("html,body").animate({scrollTop:e.offset().top},1300),!1}})}); 
</script>
<div id="interior">
<?php 
	include 'php/acc.php';   
?> 
</div>
<div id="speakfor"> 
<?php //include 'php/camp.php'; ?>
<div id="loadingnow"></div>
</div>
<div id="goodwill"> 
<div id="loadingnow"></div>
</div>
<div id="hitlist"> 
<div id="loadingnow"></div>
</div> 

<?php if(admin($userData['userId'])==true)
include 'php/advfn.php'; ?>
