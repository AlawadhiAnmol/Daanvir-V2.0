<?php require '../db/init.php'; ?>

<div id="inside-hitlist" style="height:100%"> 
	<div id="header-hitlist">
		<h2 id="hl-h2">
		These Areas Are Being Supported Most:
		</h2>
		<!--<form> 
			<input type="text" placeholder="Enter a locality here.">
			<input type="submit">
		</form> -->
	</div> 
<script type="text/javascript"> function viewer(h,g){var d,b,a;if(g==1){d="details";b="needs";a="supports"}else{if(g==2){d="needs";b="details";a="supports"}else{if(g==3){d="supports";b="needs";a="details"}}}var f=$("."+d+h);var e=$("."+b+h);var c=$("."+a+h);if(f.css("display")=="none"){f.css("display","inline-block")}if(e.css("display")!="none"){e.css("display","none")}if(c.css("display")!="none"){c.css("display","none")}return}
/*function addunit(c,a){var d;var b="id=unit&s="+c+"&l="+a;$.ajax({type:"POST",url:"php/advanced.php",data:b,cache:false,success:function(e){if(e!=false){d=window.open("","Results","resizable=yes,top=60,left=50,width=700,height=350,location=no");$(d.document.body).html(e);if(window.focus){d.focus()}}}});return};*/
		</script> 
	<div id="wrap-boxes-hitlist">
	<div id="loadMoreH"></div> 
<br><br>
<script language="javascript">
loadMore(0);
function fullView(c,a){ 
	var w=window.open("Hitlist/Articles/"+c+"/"+a+".php",'Daanvir');
	w.focus();
	return;
	}
function loadMore(t){ 
	var g="t="+t; 
	$.ajax({type:"POST",url:"points/hitlist.php",data:g,cache:false,success:function(n){ 
	document.getElementById('loadMoreH').innerHTML=n;
	}}); 
	
	return;
}
</script>
</div>