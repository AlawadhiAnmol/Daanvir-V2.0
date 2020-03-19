<?php require_once '../../db/init.php'; ?>
<?php protectPage(); ?>
<div id="goodwill">
 <script language="javascript">
				function moveg(c){var a=["bring","locality","fill","review","subbed"];for(var b=0;b<5;b++){if(a[b]==c&&document.getElementsByClassName(a[b])[0].style.display!="block"){document.getElementsByClassName(a[b])[0].style.display="block"}else{if(a[b]!=c&&document.getElementsByClassName(a[b])[0].style.display!="none"){document.getElementsByClassName(a[b])[0].style.display="none"}}}};
				</script>
<div id="acc-wrap" class="bring">
	<div id="acc-wrap-in">  
		<div id="head"><h2>We develop Invisible Relations</h2></div>
		<div id="head2"><h3>Sort things you don't need, Select a locality where those things are needed and let us know.</h3></div>	
		<div id="head3"></div>  
		<div id="head4" style="
    height: 46px;vertical-align:top">
		<button id="bback" style="display:none; border:0; cursor:default"></button>
		<button id="bbback" style="margin-top:2px" onclick="moveg('locality')">GET STARTED!</button>
		<button id="bback" style="display:none; border:0; cursor:default"></button>

		</div>
	</div>
</div>
<!------------------------------------------------------------->
<div id="acc-wrap" class="locality">  
	<div id="acc-wrap-in">  
	<div id="categories">
		<div id="box-cat">
			<div id="box-cat-in" onclick="locs('c','');"> 
				<?php getcatneeds(); ?> 
			</div>
		</div>
		<div id="box-cat">
		<div id="box-cat-in">
			
  <ul class="catneedsload">
   <li><input type="radio" id="option000" name="selector0" disabled="disabled">
        <label for="option000">Select a Category</label></li>
</ul>
		
		</div>
		</div>
		<div id="box-cat">
		<div id="box-cat-in" class="loadgetdetbx"> 
    <input class="cinitem" id="initem" type="text" autocomplete="off" value="Choose an Item" disabled="disabled">  
		
		</div>
		</div> 
		<div id="box-cat-buttonspace">
		<button id="buttonspace-button">Done</button>
		<button id="buttonspace-button" onclick="disper('categories')" >Close</button>
		</div> 
	</div>
		
		<div id="head"><h2>We research and make possible the most apt</h2></div>
	   <div id="head5">
		<div id="head5in-side">
			<div id="headin-head">
			    <h2>Choose a Circle<br></h2><hr> 
			</div>
			<div id="conbody" class="selstate"> 
			<?php choose_state(); ?>
    
			</div>
		</div>
		<div id="head5in-mid">  
			<div id="headin-head">
			    <h2>Choose a Locality<br></h2><hr> 
			</div>  
			<div id="conbody" class="loadlocs" style="margin-left:5px;" onclick="locs('l','');">  
			
    <input class="check-custom2" id="locality2" name="locs" type="checkbox" disabled="disabled"><label for="locality2">No Circle Choosen</label>
			</div> 
		</div>
		  <div id="head5in-side2">
			<div id="headin-head">
				<h2>Select Current Needs<br></h2><hr>
			</div> 
			<div id="conbody" class="bottom-button def loadcurrneeds">   
    <input class="check-custom2" id="noneedschoosen" name="" type="checkbox" disabled="disabled"><label for="noneedschoosen">No Localities Choosen</label>
			</div> 
			<script language="javascript"> function getCheckedBoxes(a){var c=document.getElementsByName(a);var d=[];for(var b=0;b<c.length;b++){if(c[b].checked){d.push($(c[b]).attr("id"))}}return d.length>0?d:null}function locs(a,e){if(a=="l"){var b=getCheckedBoxes("locs");if(b==null){var c="null"}else{var c=b.join(",")}var f="m="+a+"&checks="+c}else{if(a=="s"){var f="taken="+e+"&m="+a}else{if(a=="ct"){var f="taken="+e+"&m="+a}else{if(a=="c"){document.getElementsByClassName("loadgetdetbx")[0].innerHTML="";var b=getCheckedBoxes("cats");if(b==null){var c="null"}else{var c=b.join(",")}var f="m="+a+"&checks="+c}}}}$.ajax({type:"POST",url:"php/locs.php",data:f,cache:false,success:function(d){if(a=="s"){document.getElementsByClassName("loadlocs")[0].innerHTML=d}else{if(a=="l"){document.getElementsByClassName("loadcurrneeds")[0].innerHTML=d}else{if(a=="c"){document.getElementsByClassName("catneedsload")[0].innerHTML=d}else{if(a=="ct"){document.getElementsByClassName("loadgetdetbx")[0].innerHTML=d}}}}}});return};
			</script>
			<div id="custbody" class="bottom-button cust">
<h3>Name Of Item: </h3>			
    <input class="cinitem" id="initem" type="text" autocomplete="off" placeholder="e.g shawls, shoes"> 
<h3>Description : </h3>			
    <input class="cindet" id="indet" type="text" autocomplete="off"placeholder="e.g for children, age 20"> 
<h3>Quantity : </h3>			
    <input class="cinnum" id="innum" style="width:37%;text-align:center;" type="text" autocomplete="off" placeholder="e.g 30 ">  
			</div> 
			<div id="bbottom"> 
				<button id="botbut" class="recomm" onclick="disper('categories')">Categories</button>
				<button id="botbut" class="custom" onclick="disper('custbody')">Custom!</button> 
				<button id="botbut2" class="hidden1" onclick="reset()">Reset</button>
				<button id="botbut2" class="hidden2 hidecustom" onclick="cst('n','',0,0,0,0)">Done!</button>
			</div>
		  </div>
	   </div>
	   
	   <script language="javascript"> function disper(a){if(document.getElementById(a).style.display!="block"){document.getElementById(a).style.display="block";$("#goodwill .def").hide();$("#goodwill .recomm").hide();$("#goodwill .custom").hide();$("#goodwill .hidden1").show();$("#goodwill .hidden2").show()}else{document.getElementById(a).style.display="none";$("#goodwill .def").show();$("#goodwill .recomm").show();$("#goodwill .custom").show();$("#goodwill .hidden1").hide();$("#goodwill .hidden2").hide()}};
				</script>
		<div id="head4">
		<button id="bback" onclick="moveg('bring');">Back</button>		
		<button id="bbback" style="display:none; border:0; cursor:default"></button>
		<button id="bback" onclick="move_fill('c');">Next</button>
      	</div>
	</div>
</div>
<!------------------------------------------------------------->
<div id="acc-wrap" class="fill locality"> 
	<div id="acc-wrap-in">  
		<div id="head"><h2>Things will be made Easier for You</h2></div>
	   <div id="head5">
		<div id="head5in-side">
			<div id="headin-head">
			    <h2>Confirm Your Items<br><hr></h2> 
			</div>
			<div id="conbody" class="loadtoconfirmneeds"> 
    <input class="check-custom4" id="item" type="checkbox" disabled="disabled"><label for="item">Nothing To Show!</label> 
			</div>
		</div>
		<div id="head5in-mid">  
			<div id="headin-head">
			    <h2>We need Some Details<br><hr></h2> 
			</div> 
			<div id="conbody" style="margin-left:5px;">  
			<div id="custbody2" class="bottom-button cust">
<h3>Full Name: </h3>			
    <input class="fullnamefiller" id="initem" type="text" autocomplete="off" placeholder="e.g Vijay Chauhan" value="<?php echo $userData['fName']." ".$userData['lName'];?>"> 
<h3>Email : </h3>			
    <input class="emailfiller" id="indet" type="text" autocomplete="off"placeholder="e.g vijay@gmail.com" value="<?php echo $userData['email'];?>" readonly="readonly"> 
			<h3>Phone : </h3>			
    <input class="phonefiller" id="innum" style="width:98%;" type="text" autocomplete="off" placeholder="e.g 9018943671 " value="<?php echo $userData['phone'];?>"> 
			    </div> 
			</div>
		</div>
		  <div id="head5in-side2">
			<div id="headin-head">
				<h2>And your pickup Address<br><hr></h2>
			</div> 
			
			<div id="custbody2" class="bottom-button cust">
<h3>State: </h3>			
    <input class="statefiller" id="initem" type="text" autocomplete="off" placeholder="e.g JK" value="<?php echo $userData['state'];?>"> 
<h3>City : </h3>			
    <input class="cityfiller" id="indet" type="text" autocomplete="off"placeholder="e.g Jammu" value="<?php echo $userData['city'];?>"> 
			<h3>Address : </h3>			
    <input class="addressfiller" id="innum" style="" type="text" autocomplete="off" placeholder="e.g House No. 1, Mohalla X " value="<?php echo $userData['address'];?>"> 
			<h3>Near : </h3>			
    <input class="nearfiller" id="innum" style="" type="text" autocomplete="off" placeholder="e.g Idea Office"> 
			<h3>Zip : </h3>			
    <input class="zipfiller" id="innum" style="" type="text" autocomplete="off" placeholder="e.g 189756 " value=""> <script> $(function(){$("#datepicker").datepicker({minDate:-0,maxDate:"+2M +10D",showAnim:"blind",defaultDate:"+1d",changeMonth:true,numberOfMonths:1,onClose:function(a){$("#to").datepicker("option","minDate",a)}});$("#to").datepicker({minDate:-0,maxDate:"+1M +10D",showAnim:"blind",defaultDate:"+2d",changeMonth:true,numberOfMonths:1,onClose:function(a){$("#datepicker").datepicker("option","maxDate",a)}})});
//for 100 days from today
	</script>
			<h3>Pickup From: </h3>			
    <input class="pickfrom" id="datepicker" style="width:37%" type="text" placeholder="e.g dd/mm/yy "> 
			<h3>Pickup Before : </h3>			
    <input class="pickbefore" id="to" style="width:37%" type="text" placeholder="e.g dd/mm/yy ">  
			</div>
			 <p class="scrolld"> < Scroll down > </p>
		  </div>
	   </div>
		<div id="head4">
		<button id="bback" onclick="moveg('locality');">Back</button>
		<button id="bbback" style="display:none; border:0; cursor:default"></button>
		<button id="bback" onclick="moveg('review');">Next</button>

		</div>
	</div>
</div>


<!------------------------------------------------------------->
<div id="acc-wrap" class="review locality"> 
	<div id="acc-wrap-in">  
		<div id="head"><h2>Type In a Message</h2></div>
	      <div id="head5">
		<div id="head5in-side">
			<div id="headin-head">
			    <h2>General Instructions<br><hr></h2> 
			</div>
			<div id="custbody3"  class="bottom-button cust">
<h3>You can request only once each day. We operate during the daytime from 10 am to 5 pm. We do our best to deliver items to the specified locality as soon as possible. But, sometimes, if there is a problem, we have to make sure your valuable items stay safe in a warehouse before they are distributed.<br><br>
We collect items only when the set local demands of a locality are met.<br><br>
Please have patience until we reach you. 
 </h3> 
			</div> 
		</div>
		<div id="head5in-mid">  
			<div id="headin-head">
			    <h2>Any Feedback/ Directions?<br><hr></h2> 
			</div> 
			<div id="conbody" style="margin-left:10px;position:relative"> 
			<div id="custbody3" class="bottom-button cust"> 
			
			<textarea class="sharereasons" Placeholder="What Happiness means to you? "></textarea> 
			
			    </div> 
			</div>
		</div>
		  <div id="head5in-side2">
			<div id="headin-head">
				<h2>Hidden Charges?<br><hr></h2>
			</div> 
			<div id="custbody3" class="bottom-button cust"> 
			<div id="conbody"> 
			<h3 id="sph3">No. But, you will be charged INR 50.00 if you want the items to be packed as a gift. </h3> 
    <input class="check-custom2" id="campdon" type="checkbox" name="campaignhelp"><label for="campdon">Campaign This.</label> 
    <input class="check-custom2" id="gifted" type="checkbox" name="gifthelp"><label for="gifted">Pack as gift.</label>
    <input class="check-custom2" id="tac" type="checkbox" name="tandc_"><label for="tac">* I agree to the T&C. </label>
			</div>
			</div> 
		  </div>
	   </div>
	<div id="head4">
		<button id="bback" onclick="moveg('fill');">Back</button>
		<button id="bbback" style="display:none;border:0; cursor:default"></button>
		<button id="bback" onclick="move_fill('s')">Submit!</button>

		</div>
	</div>
</div>
<div id="acc-wrap" class="subbed"> 
	<div id="acc-user-info">
		<div id="info-box"> 
		<h4>THANKYOU FOR YOUR REQUEST!</h4> 
		</div>
	</div>
	<div id="acc-wrap-in">
	<h3>Thankyou for all the good things you do</h3>
	</div>
</div>  
<script language="javascript"> function move_fill(p){
	if(p=="c"){
		var o=getCheckedBoxes("locneeds");
		if(o==null){var a="null"}else{var a=o.join(",")}
		var l="checks="+a+"&meter="+p
		}else{
			if(p=="s"){
				var o=getCheckedBoxes("helped");
				if(o==null){var a="null"}else{var a=o.join(",")}
				var d=$(".statefiller").val();
				var q=$(".cityfiller").val();
				var c=$(".addressfiller").val();
				var t=$(".nearfiller").val();
				var u=$(".zipfiller").val();
				var v=$(".pickfrom").val();
				var g=$(".pickbefore").val();
				var e=$(".phonefiller").val();
				var k=$(".emailfiller").val();
				var r=$(".fullnamefiller").val();
				var j=$(".sharereasons").val();
				var h=getCheckedBoxes("campaignhelp");
				if(h==null){var b="null"}else{var b=1}
				var s=getCheckedBoxes("gifthelp");
				if(s==null){
					var n="null"}else{var n=1}
					var f=getCheckedBoxes("tandc_");
					if(f==null){var i="null"; return;}
					else{var i=1}
					if(i==1){ 
var l="checks="+a+"&meter="+p+"&state="+d+"&city="+q+"&address="+c+"&near="+t+"&zip="+u+"&pickfrom="+v+"&pickbefore="+g+"&phone="+e+"&email="+k+"&fullname="+r+"&textarea="+j+"&camp="+b+"&gift="+n}
					else{var l="checks="+a+"&meter="+p}
					}
				}
			$.ajax({type:"POST",url:"php/collectneeds.php",data:l,cache:false,success:function(m){
				if(p=="c"){
					if(m=="f"){}else{
	document.getElementsByClassName("loadtoconfirmneeds")[0].innerHTML=m;moveg("fill")}
	}else{
		if(p=="s"&&i==1){if(m=="s"){
			moveg("subbed")}else{alert('Please select an item');
	}
	}
	}
	}
	});
	return
	};
</script>
	   <script language="javascript"> function reset(){$("#custbody .cinitem").val("");$("#custbody .cindet").val("");$("#custbody .cinnum").val("");return}function cst(f,k,g,e,a,s){if(f=="n"){var h=$("#custbody .cinitem").val();var j=$("#custbody .cindet").val();var c=$("#custbody .cinnum").val();var i="name="+h+"&desc="+j+"&qnty="+c+"&set="+f}else{if(f=="m"){var r=null,o=null,m=null,l=null;if(g==1){r=$("#"+k+" .choosesex").val()}if(e==1){o=$("#"+k+" .choosesize").val()}if(a==1){m=$("#"+k+" .chooseqnty").val()}if(s==1){l=$("#"+k+" .chooseta").val()}var i="set="+f+"&val="+k+"&av1="+r+"&av2="+o+"&av3="+m+"&av4="+l}}$.ajax({type:"POST",url:"php/customneeds.php",data:i,cache:false,success:function(b){if(f=="n"){if(b="y"){$("#custbody .cinitem").val("");$("#custbody .cindet").val("");$("#custbody .cinnum").val("");disper("custbody")}else{if(b=="f"){disper("custbody")}}}else{if(f=="m"){if(b="y"){$("#"+k+" .choosesex").val("");$("#"+k+" .choosesize").val("");$("#"+k+" .chooseqnty").val("");$("#"+k+" .chooseta").val("");if(m!=""){document.getElementsByClassName(k)[0].innerHTML="Added!"}setTimeout(function(){document.getElementsByClassName(k)[0].innerHTML="Add Item!"},1000)}else{if(b=="f"){}}}}}});return};
	   </script>	
</div>