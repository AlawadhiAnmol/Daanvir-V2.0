<?php require_once '../db/init.php'; ?>
<?php protectPage(); ?>
 
<?php
if(admin($userData['userId'])==true){
	?>
	
<?php  print_adv($userData['userId'],'1'); ?> 

<h2 id="loading">Please select a category</h2>
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
	<!-- <h2 onclick="pr_load3('AO');" class="cross_AO2">AO</h2> -->
	<h2 onclick="pr_load3('PC');" class="cross_PC2">PC</h2>
	<!-- <h2 onclick="pr_load3('PO');" class="cross_PO2">PO</h2> -->
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
 <a onclick="javascript:window.location='main/html/videos.php'" id="ovrview">Manage Videos
 </a>
</div>
</div>

<script language="javascript">function showitem(a){var b=document.getElementById(a);if(b.style.display!="block"){b.style.display="block"}return}function hideitem(a){var b=document.getElementById(a);if(b.style.display!="none"){b.style.display="none"}return}function access(a){showitem(a);return}function not_access(a){hideitem(a);return}
</script>
<script type="text/javascript"> 
function back_load(){$('.editteamhead').html('Teams');$(".teams_loads").load(location.href+"/main/html/pages/p90.php"+" .bt1loads");$(".cross_l").css("display","none");return}
function back_load1(){$('.editlochead').html('States');$(".teams_loads1").load(location.href+"/main/html/pages/p90.php"+" .bt1loads1");$(".cross_l1").css("display","none");return}
function back_load2(){$('.editgathhead').html('Select State');$(".teams_loads2").load(location.href+"/main/html/pages/p90.php"+" .bt1loads2");$(".cross_l2").css("display","none");$(".cross_T2").css("display","none");$(".cross_AC2").css("display","none");$(".cross_AO2").css("display","none");$(".cross_PC2").css("display","none");$(".cross_PO2").css("display","none");return}
var hit;function advanced(i,id){if(id==""){}else{if(id=='mem'){var dataString='i='+i+'&id='+id}else if(id=='addt'){var cf=$(".confirmlocsel").val();var n=$('.teamname').val();var l=$('.locationname').val();var dataString='id='+id+'&tname='+n+'&tlocation='+l+'&cf='+cf}else if(id=='addm'){var cf=$(".confirmmsel").val();var l=$('.memmail').val();var dataString='id='+id+'&i='+i+'&tlocation='+l+'&cf='+cf}else if(id=='tup'){$(".confirmlocsel").val(0);var l=$('.locationname').val();var dataString='id='+id+'&tlocation='+l}else if(id=='uup'){$(".confirmmsel").val(0);var l=$('.memmail').val();var dataString='id='+id+'&tlocation='+l}else if(id=='loup'){var arr=i.split(',');i=arr[1];var j=arr[0];$(".confirmlosel").val(0);var l=$('.loentry').val();var dataString='id='+id+'&tlocation='+l+'&i='+i+'&j='+j}else if(id=='addmb'){var dataString='id='+id}else if(id=='delt'||id=='adms'||id=='delm'||id=='dels'||id=='delar'||id=='addars'){var dataString='i='+i+'&id='+id}else if(id=='adlo'){var arr=i.split(',');i=arr[1];var j=arr[0];var dataString='id='+id+'&i='+i+'&j='+j}else if(id=='delms'){var arr=i.split(',');i=arr[0];var j=arr[1];advanced(j,'mem');var dataString='i='+i+'&id='+id}else if(id=='locs'||id=='locs1'){var arr=i.split(',');i=arr[1];var j=arr[0];var dataString='i='+i+'&id='+id+'&j='+j}else if(id=='addst'){var dataString='id='+id}else if(id=='stup'){$(".confirmstasel").val(0);var l=$('.statename').val();var dataString='id='+id+'&tlocation='+l}else if(id=='arup'){$(".confirmarsel").val(0);var l=$('.arentry').val();var dataString='id='+id+'&tlocation='+l+'&i='+i}else if(id=='adds'){setTimeout(imageul(1),200);if($('#img_st_f').val()!=1)return;var image=$("#img_st").val();var cf=$(".confirmstasel").val();var l=$('.statename').val();var dataString='id='+id+'&tlocation='+l+'&cf='+cf+'&image='+image}else if(id=='addlo'){setTimeout(imageul(2),200);if($('#img_loc_f').val()!=1)return;var image=$("#img_loc").val();if($('#locdesc').val().trim()=="")return;var desc=$("#locdesc").val();var cf=$(".confirmstasel").val();var cf=$(".confirmlosel").val();var l=$('.loentry').val();var arr=i.split(',');i=arr[1];var j=arr[0];var dataString='id='+id+'&i='+i+'&j='+j+'&tlocation='+l+'&cf='+cf+'&image='+image+'&desc='+desc}else if(id=='addar'){var cf=$(".confirmarsel").val();var l=$('.arentry').val();var dataString='id='+id+'&i='+i+'&tlocation='+l+'&cf='+cf}else if(id=='delos'){var arr=i.split(',');i=arr[2];var j=arr[1];var k=arr[0];advanced(k+','+i,'locs');var dataString='i='+i+'&id='+id+'&j='+j+'&k='+k}else if(id=='delo'){var arr=i.split(',');i=arr[2];var j=arr[1];var k=arr[0];advanced(k+','+i,'locs');var dataString='i='+i+'&id='+id+'&j='+j+'&k='+k}else if(id=='areas'||id=='areas1'){var dataString='i='+i+'&id='+id}else if(id=='vocat'||id=='vt'||id=='vos'||id=='vcs'||id=='T'||id=='AC'||id=='AO'||id=='PC'||id=='PO'||id=='selnd'){var dataString='ai='+i+'&id='+id}else if(id=='addcn'){$('#err1').html('<p></p>');setTimeout(imageul(3),200);if($('#img_ned_f').val()!=1)return;var image=$("#img_ned").val();var desc=$('#tacneeds').val();var name=$('#name_need').val();var qy=$('#qntycneeds').val();var qyu=$('#qunitcneeds').val();if(desc.trim()==''||name.trim()==''||qy.trim()==''||qyu.trim()==''||image.trim()==''){$('#err1').html('<p>Some fields are empty!</p>');return}
var dataString='ai='+i+'&id='+id+'&desc='+desc+'&qy='+qy+'&qyu='+qyu+'&image='+image+'&name='+name}else if(id=='hitcn'){var dataString='i='+i+'&id='+id}else if(id=='hitv'){if(hit!=null&&!hit.closed){var checkedBoxes=getSelected("hitvalues")}else{var checkedBoxes=null}
if(checkedBoxes==null){var checks='null'}else{var checks=checkedBoxes.join(",")}
var tag=hit.document.getElementById('hit_tag').value;var about=hit.document.getElementById('hit_about').value;var location=hit.document.getElementById('hit_location').value;var desc=hit.document.getElementById('hitdesc').value;var img1="";var img2="";var img3="";var img4="";var img5="";img1=hit.document.getElementById("hitimage1").files[0];img2=hit.document.getElementById("hitimage2").files[0];img3=hit.document.getElementById("hitimage3").files[0];img4=hit.document.getElementById("hitimage4").files[0];img5=hit.document.getElementById("hitimage5").files[0];if(desc!=''&&checkedBoxes!=null){var dataString=new FormData();dataString.append("i",i);dataString.append("id",id);dataString.append("checks",checks);dataString.append("desc",desc);dataString.append("tag",tag);dataString.append("about",about);dataString.append("location",location);dataString.append("img1",img1);dataString.append("img2",img2);dataString.append("img3",img3);dataString.append("img4",img4);dataString.append("img5",img5)}}else if(id=='hitv1'){if(hit!=null&&!hit.closed){var checkedBoxes=getSelected("hitvalues")}else{var checkedBoxes=null}
if(checkedBoxes==null){var checks='null'}else{var checks=checkedBoxes.join(",")}
if(checkedBoxes!=null){var dataString='i='+i+'&id='+id+'&checks='+checks}}
var t1=!0;var t2='application/x-www-form-urlencoded; charset=UTF-8';if(id=='hitv'){t1=!1;t2=!1}
$.ajax({type:"POST",url:"main/php/advanced.php",data:dataString,cache:!1,processData:t1,contentType:t2,success:function(result){if(id=='mem'&&result!='f'){$('.editteamhead').html('Members');$(".teams_loads").html(result);$(".cross_l").css("display","initial")}else if(id=='addt'&&result!='f'){back_load()}else if(id=='tup'&&result!='f'){$("#search_suggest").css("display","block");$("#search_suggest").html(result)}else if(id=='addmb'){$('.editteamhead').html('Add Team');$(".teams_loads").html(result);$(".cross_l").css("display","initial")}else if(id=='delt'&&result!='f'){back_load()}else if(id=='dels'&&result!='f'){back_load1()}else if(id=='adms'&&result!='f'){$('.editteamhead').html('Add Member');$(".teams_loads").html(result);$(".cross_l").css("display","initial")}else if(id=='addm'&&result!='f'){$('.editteamhead').html('Add Members');advanced(result,'mem')}else if(id=='delm'&&result!='f'){$('.editteamhead').html('Members');advanced(result,'mem')}else if(id=='uup'&&result!='f'){$("#search_suggest").css("display","block");$("#search_suggest").html(result)}else if(id=='delms'&&result!='f'){$('.editteamhead').html('Confirm Delete!');$(".teams_loads").append(result)}else if(id=='locs'&&result!='f'){$('.editlochead').html('Localities');$(".teams_loads1").html(result);$(".cross_l1").css("display","initial")}else if(id=='locs1'&&result!='f'){$('.editgathhead').html('Select Locality');$(".teams_loads2").html(result);$(".cross_l2").css("display","initial");$(".cross_T2").css("display","initial");$(".cross_AC2").css("display","initial");$(".cross_AO2").css("display","initial");$(".cross_PC2").css("display","initial");$(".cross_PO2").css("display","initial")}else if(id=='addst'){$('.editlochead').html('Add State');$(".teams_loads1").html(result);$(".cross_l1").css("display","initial")}else if(id=='stup'&&result!='f'){$("#search_suggest1").css("display","block");$("#search_suggest1").html(result)}else if(id=='adds'&&result!='f'){back_load1()}else if(id=='adlo'&&result!='f'){$('.editlochead').html('Add Locality');$(".teams_loads1").html(result);$(".cross_l1").css("display","initial")}else if(id=='loup'&&result!='f'){$("#search_suggest11").css("display","block");$("#search_suggest11").html(result)}else if(id=='addlo'&&result!='f'){$('.editlochead').html('Add Localities');var res=result.split(',');result=res[1];var result1=res[0];advanced(result1+','+result,'locs')}else if(id=='delos'&&result!='f'){$('.editlochead').html('Confirm Delete!');$(".teams_loads1").append(result)}else if(id=='delo'&&result!='f'){$('.editlochead').html('Localities');var res=result.split(',');result=res[1];var result1=res[0];advanced(result1+','+result,'locs')}else if(id=='delar'&&result!='f'){$('.editlochead').html('Areas');advanced(result,'areas')}else if(id=='addar'&&result!='f'){$('.editlochead').html('Add Areas');advanced(result,'areas')}else if(id=='arup'&&result!='f'){$("#search_suggest1111").css("display","block");$("#search_suggest1111").html(result)}else if(id=='addars'&&result!='f'){$('.editlochead').html('Add Area');$(".teams_loads1").html(result);$(".cross_l1").css("display","initial")}else if(id=='delar'&&result!='f'){back_load1()}else if(id=='areas'&&result!='f'){$('.editlochead').html('Areas');$(".teams_loads1").html(result);$(".cross_l1").css("display","initial")}else if(id=='areas1'&&result!='f'){$('.editgathhead').html('Select Area');$(".teams_loads2").html(result);$(".cross_l2").css("display","initial")}else if(id=='vt'||id=='vcs'||id=='T'||id=='AC'||id=='AO'||id=='PC'||id=='PO'){if(result!='f'){var w=window.open("","Results","resizable=yes,top=60,left=50,width=1120,height=560,location=no");$(w.document.body).html(result);if(window.focus){w.focus()}}}else if(id=='vocat'||id=='vos'){if(result!='f'){var w=window.open("","Results","resizable=yes,top=60,left=50,width=1120,height=300,location=no");$(w.document.body).html(result);if(window.focus){w.focus()}}}else if(id=='selnd'&&result!='f'){$('.editgathhead').html('Controls For Needs');$(".teams_loads2").html(result);$(".cross_l2").css("display","initial");$(".cross_T2").css("display","none");$(".cross_AC2").css("display","none");$(".cross_AO2").css("display","none");$(".cross_PC2").css("display","none");$(".cross_PO2").css("display","none")}else if(id=='addcn'&&result!=1){$('#err1').html('<p>'+result+'An error occurred!</p>')}else if(id=='addcn'&&result==1){$('#err1').html('<p>This need was added!</p>');document.getElementById('sel_ineed').reset();$('input#icon_need').replaceWith($('input#icon_need').val('').clone(!0));$('#name_need').val('');$('#tacneeds').val('');$('#qntycneeds').val('');$('#qunitcneeds').val('');$('.select_icon').html("Select an icon (optional):")}else if(id=='hitcn'&&result!='f'){hit=window.open("","Results","resizable=yes,top=60,left=50,width=800,height=500,location=no");$(hit.document.body).html(result);if(window.focus){hit.focus()}}else if(id=='hitv'&&result!='f'){$(hit.document.body).html(result);setTimeout(function(){},1500)}else if(id=='hitv1'&&result!='f'){$(hit.document.body).html(result);setTimeout(function(){hit.close()},1500)}else if(result=='f'){}},error:function(a,b,result){}})}
return}
function confirmlocsel(y){$(".confirmlocsel").val(1);var x=$("."+y).text();var x_=x.split(',')
$(".locationname").val(x_[0]);return}
function confirmmsel(y){$(".confirmmsel").val(1);var x=$("."+y).text();var x_=x.split(',')
$(".memmail").val(x_[1]);return}
function confirmstsel(y){$(".confirmstasel").val(1);var x=$("."+y).text();var x_=x.split(',')
$(".statename").val(x_[0]);return}
function confirmlosel(y){$(".confirmlosel").val(1);var x=$("."+y).text();var x_=x.split(',')
$(".loentry").val(x_[0]);return}
function confirmarsel(y){$(".confirmarsel").val(1);var x=$("."+y).text();var x_=x.split(',')
$(".arentry").val(x_[0]);return}
function getSelected(chkboxName){var checkboxes=hit.document.getElementsByName(chkboxName);var checkboxesChecked=[];for(var i=0;i<checkboxes.length;i++){if(checkboxes[i].checked){checkboxesChecked.push($(checkboxes[i]).attr('id'))}}
return checkboxesChecked.length>0?checkboxesChecked:null}
function fulldesc(i,id){if(id==1){var dataString='i='+i+'&id='+id}else if(id==2){var t=hit.document.getElementsByTagName('textarea')[0].value;var dataString='i='+i+'&id='+id+'&t='+t}
$.ajax({type:"POST",url:"main/html/fulldescr.php",data:dataString,cache:!1,success:function(result){if(id==1){hit.close();hit=window.open("","Desc","resizable=yes,top=60,left=50,width=1220,height=580,location=no");$(hit.document.body).html(result);hit.focus()}else if(id==2){hit.close();hit=window.open("","Desc","resizable=yes,top=60,left=250,width=420,height=280,location=no");$(hit.document.body).html(result);hit.focus()}}})}
var prev=null;function imageul(w){var d="",e="",f="";if(w==1){$('#form_st > h2').html("Select Picture: / Uploading..");d="stateimage";e="img_st";f="img_st_f"}else if(w==2){$('#form_loc > h2').html("Select Picture: / Uploading..");d="locimage";e="img_loc";f="img_loc_f"}else if(w==3){$('.select_icon').html("Select an icon (optional): / Uploading..");d="icon_need";e="img_ned";f="img_ned_f"}
var i=document.getElementById(d).files[0];if($('#'+d).val().trim()==''||prev==$('#'+d).val().trim()){return 0}
var g=new FormData();g.append("w",w);g.append("i",i);$.ajax({type:"POST",url:"main/points/imageul.php",data:g,processData:!1,contentType:!1,success:function(n){var result=n.split('*');if(result[0]==1&&w==1){$('#'+e).val(result[1]);$('#'+f).val(1);$('#form_st > h2').html("Select Picture: / Uploaded!");prev=$('#'+d).val().trim()}else if(result[0]==1&&w==2){$('#'+e).val(result[1]);$('#'+f).val(1);$('#form_loc > h2').html("Select Picture: / Uploaded!");prev=$('#'+d).val().trim()}else if(result[0]==1&&w==3){$('#'+e).val(result[1]);$('#'+f).val(1);$('.select_icon').html("Select an icon (optional): / Uploaded!");prev=$('#'+d).val().trim()}else{$('#'+f).val(0);prev=null}},error:function(){$('#'+f).val(0)}});return}
</script>  
<script>function toggle(){var c="acc-control-body";var a=document.getElementById(c);var b=a.className;if(b==""){a.className+=" height-zero"}else{if(b=="height-more"){a.className+=" height-zero";$(a).removeClass(" height-more")}else{a.className+=" height-more";$(a).removeClass(" height-zero")}}}
</script>


<?php } ?>
