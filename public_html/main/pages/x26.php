<?php require_once '../db/init.php'; ?>
<?php protectPage(); ?><div id="work-items">
		<ul>
		<video style="display:none;width:100%;margin-bottom:20px;" id="video"><br><hr></video>
		<?php myV($userData['userId']); ?> 
		</ul> 
</div>  	
<script type="text/javascript"> function play(val,src){var temp=src.split(",");var path=temp.join("/");var elem=document.getElementById('video');if(!elem.paused){elem.pause()}
var mask1=document.getElementById('notallowed'+val);var mask2=document.getElementById('notallowed_'+val);var info=document.getElementsByClassName('notallowed'+val)[0];var view=document.getElementsByClassName('expandview'+val)[0];if(elem.childNodes.length>0){elem.removeChild(elem.childNodes[0])}
var source=document.createElement('source');source.setAttribute('src',path);elem.appendChild(source);if(elem.style.display=='none'){elem.style.display='block'}
elem.load();elem.play();elem.setAttribute("controls","")}
</script>
