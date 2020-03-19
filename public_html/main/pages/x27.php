<?php require_once '../db/init.php'; ?>
<?php protectPage(); ?>
<div id="c-part-1"> 
<button id="sclk" class="sclk-2" onclick="open_page(7);open_page(24);">Go to My Support</button>
	<h2 id="r-part-h2" style="display:block">Please include your followers for sharing your campaign with</h2>
	<div id="grid-gallery-5" class="grid-gallery">
	<?php ffilter($userData['userId']);
					?></div><!-- // grid-gallery -->
		<div class="clearfix"></div> 
		<button id="next-step" class="c-part-1">NEXT STEP</button> 
 </div> 
<div id="c-part-2" style="display:none;">
		<div id="camp-form"> 
<img id="camp-picture" src="images/temp.png"></img>		
	<form id="camp-picture-form">
	<p id="P_1"> 
	<label for="camp-picture" id="LABEL_2" class="uploading-camp-picture">
		Select a picture <br>(No spaces, special characters etc. in name)
	</label>
		<input class="camp-picture" id="INPUT_3" name="camp-picture" type="file"/>
	</p>
	</form><br>
	<p id="P_1"> 
	<label for="camp-title" id="LABEL_2">
		Title
	</label>
		<input id="INPUT_3" class="maincampline" name="camp-title" type="text" placeholder="Title of your campaign" />
	</p>
	<p id="P_1" style="height:20px">    
    <input class="check-custom" id="checkemail" type="checkbox" ><label for="checkemail">E-MAIL Campaigning</label>
	</p>	<p id="P_1"> 	<label for="camp-title" id="LABEL_2">		Enter Campaign Id <br>(Attach Campaign with Email):	</label>		<input id="INPUT_3" class="maincampid" name="camp-title" type="text" placeholder="id1 of the url here" />	</p>
	<br>     
	<p id="P_1" style="height:10px"> 
	<label for="camp-text" id="LABEL_2">
		Write your message (plain text) 
	</label>
	<div class="camptext-cover" id="textarea-cover" ><textarea class="camptext" id="textarea"    placeholder="So, what's your view? "></textarea></div>
	</p><br><br>
<!-- <button class="template">SELECT A SAVED TEMPLATE</button>
<button class="template">SAVE THIS TEMPLATE</button> -->
	<div id="errors11" ></div> 
		<br><br><br><br></div>
	 
		<button id="next-step" class="c-part-2">PUBLISH</button>
</div>
<script language="javascript">
	   function selcntrl(f,a){ 
		a="f";var e="notself";var d="self";
		var b=".SelCntrl"+a+f; 
		if($(b).is("."+d)){
		$(b).removeClass(d);$(b).addClass(e);
		$(b+' p#connection').text('SELECT');
		$(b+' p#connection').css('background','tomato');
		}else{
		$(b).removeClass(e);$(b).addClass(d);
		$(b+' p#connection').text('SELECTED');
		$(b+' p#connection').css('background','yellowgreen');
		}
		return;
		} 

		var fols=[];
		$(".c-part-1").click(function(){
		var fcollected=0;
		fcollected=document.querySelectorAll('.self').length;
		if(fcollected>0){
		//move 
		if(!$('#c-part-1').css('display','none')){
		$('#c-part-1').css('display','none');
		}
		if(!$('#c-part-2').css('display','block')){
		$('#c-part-2').css('display','block');
		} 
		} 
		var items=$(".self");
		for(var i=0;i<fcollected;i++){
			fols[i]=jQuery(items[i]).attr('class').split(' ')[0];
		} 
		return; 
		});
	$i=0;
	$(".c-part-2").click(function(){  
	var cls=fols.join(",");	var maincampline=$('.maincampline').val();	var maincampid=$('.maincampid').val();
	var camptext=$('.camptext').val();  
	camptext=camptext.replace(/\r?\n/g, '<br style="margin-top:20px;margin-bottom:0px" />');
	 
	var pic=$('#camp-picture').attr("src"); 
	//var clean=/\"|\'|\)/g;
	//pic=pic.split('/').pop().replace(clean,'');
	var cb = 'no';
	if($('#checkemail').is(':checked')){
		cb = 'yes';
	}
	var dataString='maincampline='+maincampline+'&camptext='+camptext+'&fols='+cls+'&pic='+pic+'&cb='+cb+'&id='+maincampid; alert(dataString);
	if(maincampline=="" || $('.camptext').val()==""){ 
	$('#errors11').text('Please fill the empty fields'); 
	}else if(pic=="images/temp.png" || pic==""){
	$('#errors11').text('Please select an appropriate image'); 
	}else if($i!=2){
	$('#errors11').text('Please wait for the image to upload..'); 
	}else{
	$('#errors11').text('Processing..');  
	$.ajax({type:"POST",url:"main/php/newcamp.php",cache:false,data:dataString,success:function(result){ 
		if(result==11){  
		$('#errors11').text('Your campaign was successful!');
		setTimeout(function(){
		open_page(7);   }, 5000);
		}else if(result==1){ 
		$('#errors11').text('Your onsite campaign was successful! Some emails failed.');  
		setTimeout(function(){ 
		open_page(7);
		}, 3000);
		
		}else if(result==3){
		$('#errors11').text('You have already made that campaign today');
		}else{ 
		$('#errors11').text('An error occurred while processing..'+result);  
		} 
		},error:function(XMLHttpRequest, textStatus, errorThrown){ 
		$('#errors11').text('An error occurred while connecting.. ' );  
		}
		});
	} 
	return false;
	});
		
	$('#camp-picture-form').on('submit',(function(e){e.preventDefault(); 
	$('.uploading-camp-picture').text('Select a picture (Uploading ..)');
	var formData=new FormData(this);
	$.ajax({type:'POST',url:'main/php/setcamppic.php',data:formData,cache:false,contentType:false,processData:false,success:function(data){
	$('#camp-picture').attr("src","main/"+data);
	$('.uploading-camp-picture').text('Select a picture (Uploaded!)');
	$i=2;
	},error:function(data){}});}));
	
	$('.camp-picture').on("change",function(){
		$i=0;
	$('.uploading-camp-picture').text('Select a picture');
		$('#camp-picture-form').submit();
		
	});
</script>