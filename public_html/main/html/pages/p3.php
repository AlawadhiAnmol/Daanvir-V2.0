 <div id="inside-hitlist" style="height:100%"> 
<script type="text/javascript"> function viewer(h,g){var d,b,a;if(g==1){d="details";b="needs";a="supports"}else{if(g==2){d="needs";b="details";a="supports"}else{if(g==3){d="supports";b="needs";a="details"}}}var f=$("."+d+h);var e=$("."+b+h);var c=$("."+a+h);if(f.css("display")=="none"){f.css("display","inline-block")}if(e.css("display")!="none"){e.css("display","none")}if(c.css("display")!="none"){c.css("display","none")}return} 
		</script> 
	<div id="wrap-boxes-hitlist">
	<div id="loadMoreH"></div> 
<br><br>
<script language="javascript">
loadMore(0);
function fullView(c,a){ 
	var w=window.open("Hitlist/Articles/"+c+"/"+a+".php",'Vifixes');
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
</div>