<?php 
 
require '../db/init.php';  
admin($userData['userId']);
protectPage();
?>
<!DOCTYPE html> 
<html> 
<head><title>Daanvir- The brave steps that lead the nation</title><meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no"><link rel="stylesheet" href="../css/normalize.css"><link rel="stylesheet" href="../css/overview.css"><link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon"><script src='../js/jquery.min.js'></script><script src="../js/jquery.bxslider.min.js"></script> 
</head>
<body id="regBody">
<div id="adv-vid-main">
<h2>Advanced Video Panel</h2><div id="thumb-preview"></div>
<h4>Send videos to people directly.</h4><hr> 
<div id="adv-v-p">
<input type="text" id="email" Placeholder="Type Email here."/><br>
<input type="text" id="title" Placeholder="Type Title here."/><br>
<input type="text" id="locality" Placeholder="Type Locality here."/>
<h5>Select .mp4 Video:</h5>
<input type="file" accept=".mp4" id="vfile" onchange="setI(this.files);"/>
<h5>Select .jpg or .png (320x240) Thumbnail:</h5>
<input type="file" accept=".jpg,.png" id="ifile" />
<input type="button" id="vsend" onclick="javascript:vS(1);" value="Send!"/>
<input type="button" id="vlist" onclick="javascript:vS(2);" value="List All"/>
<br>
<h6 style="color:red;text-align:left;margin:10px 40px;">Note: Extremely IRREVERSIBLE changes will take place.</h6>
</div>
</div>
<script type="text/javascript"> 
var dur=0.0;
window.URL=window.URL || window.webkitURL;
function setI(files){ 
	var video = document.createElement('video');
	video.preload='metadata';
	video.onloadedmetadata=function(){
	window.URL.revokeObjectURL(this.src);
	dur=video.duration;  
	}
	video.src=URL.createObjectURL(files[0]); 
} 
function vS(w){
	if(w==1){
	document.getElementById('vsend').value="Sending.."; 
	}else if(w==2){
	document.getElementById('vlist').value="Retrieving.."; 
	}
	var e=$('#email').val();
	var t=$('#title').val();
	var l=$('#locality').val();
	var i=document.getElementById("vfile").files[0];
	var th=document.getElementById("ifile").files[0]; 
	var g=new FormData();
	g.append("e",e);
	g.append("w",w);
	g.append("i",i);   
	g.append("d",dur);
	g.append("t",t);  
	g.append("l",l);    
	g.append("th",th);      
	$.ajax({type:"POST",url:"v_process.php",data:g,
 processData: false,
 contentType: false,success:function(n){ 
	document.getElementById('adv-v-p').innerHTML=n;
	}});  	
}

function vS2(w,j){ 
	var g="w="+w+"&j="+j; 
	$.ajax({type:"POST",url:"v_process.php",data:g,success:function(n){
	document.getElementById('adv-v-p').innerHTML=n;
	}});  	
}
</script>
</body></html>
