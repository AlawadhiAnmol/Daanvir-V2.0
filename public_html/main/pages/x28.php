<?php require_once '../db/init.php'; ?>
<?php protectPage(); ?> 
<div id="r-part-1"> 
	<h2 id="r-part-h2" style="display:block">Select a state to explore</h2>
	<div id="grid-gallery-5" class="grid-gallery"> 
			<?php choose_state(); ?>
	</div><!-- // grid-gallery -->
		<div class="clearfix"></div> 
		<button id="next-step" class="r-part-1">NEXT STEP</button> 
 </div>  
<div id="r-part-2" style="display:none;">
	<h2 id="r-part-h2">Select a city to find trends</h2>
	<div class="grid-gallery" id="r-part-2-1"> 
<h2 id="loading" style="text-align:center">Loading...</h2>
</div>
		<div class="clearfix"></div> 
		<button id="next-step" class="r-part-2">NEXT STEP</button> 
</div>   
<div id="r-part-3" style="display:none;">
	<h2 id="r-part-h2">Trends matching your selection</h2>
<div id="wrap-boxes-hitlist">
	<div id="loadMoreH" class="loadMoreH2">
		 
	</div> 
  </div>
</div>  
 
<script language="javascript"> 
var states=[];var ls=[];function locs(a,e){var dx="";var ex="";if(a=='s'){var dx="self1";var ex="notself1"}else if(a=='l'){var dx="self2";var ex="notself2"}else if(a=='n'){var dx="self3";var ex="notself3"}else if(a=='d'){var dx="donating";var ex="not_donating";var x=$('.'+e+' input[type="number"]').val();if(x<=0){return}
if($('#donate-confirmed').css('display','none'))
$('#donate-confirmed').css('display','block');$('.'+e+' #donat-count').html('<strong>'+x+'</strong> items');$('.'+e).insertAfter($("#donation-pre"));$('.r-h2-special').html('Thankyou! Would you like to donate more?')}
if($('.'+e).is("."+dx)){$('.'+e).removeClass(dx);$('.'+e).addClass(ex);if(a!='d'){$('.'+e+' p#connection').text('SELECT')}}else{$('.'+e).removeClass(ex);$('.'+e).addClass(dx);if(a!='d'){$('.'+e+' p#connection').text('SELECTED')}}
return}
$(".r-part-1").click(function(){var scollected=0;scollected=document.querySelectorAll('.self1').length;if(scollected>0){if(!$('#r-part-1').css('display','none')){$('#r-part-1').css('display','none')}
if(!$('#r-part-2').css('display','block')){$('#r-part-2').css('display','block')}
if(!$('#r-part-2 #r-part-h2').css('display','block')){$('#r-part-2 #r-part-h2').css('display','block')}}
var items=$(".self1");for(var i=0;i<scollected;i++){states[i]=jQuery(items[i]).attr('class').split(' ')[0]}
load_locs('s');return});$(".r-part-2").click(function(){var lcollected=0;lcollected=document.querySelectorAll('.self2').length;if(lcollected>0){if(!$('#r-part-2').css('display','none')){$('#r-part-2').css('display','none')}
if(!$('#r-part-3').css('display','block')){$('#r-part-3').css('display','block')}
if(!$('#r-part-3 #r-part-h2').css('display','block')){$('#r-part-3 #r-part-h2').css('display','block')}}
var items=$(".self2");for(var i=0;i<lcollected;i++){ls[i]=jQuery(items[i]).attr('class').split(' ')[0]}
load_locs('k');return});function load_locs(a){if(a=='s'){var f="taken="+states+"&m="+a}else if(a=='k'){var f="taken="+ls+"&m="+a}
$.ajax({type:"POST",url:"main/php/locs.php",data:f,cache:!1,success:function(d){if(a=="s"){$("#r-part-2-1").html(d)}
else if(a=="k"){$(".loadMoreH2").html(d);setTimeout(function(){bindOwl()},500);if(d==""){$(".loadMoreH2").append('<h2 style="color: #fff;margin-top: 50px;">No trend was found for the selection</h2>')}}}});return}
</script>				
			
			