<?php require_once '../db/init.php'; ?>
<?php 
if(loggedIn()===false){  
	echo '
<h2 id="loading">Please login to create a new trend..</h2>';
	//header('Location:http://daanvir.org');
	echo '<script type="text/javascript">open_page(7);
	bring(1);</script>';
	session_destroy();  
	exit();
} 
 ?> 

<div id="dreq"> 
<h2 id="H2_help_1">Add a new Donation Post</h2>
	<div id="dreq-inner" class="dreq-inner1">
		<h3 id="dreq-h3" class="trend-1">Select the Locality that needs help</h3>
		<div id="clear1">
		<ul id="fields-donation"> 
			<li id="field-donation">
				<p id="p1errors" class="p-errors"></p>
				<div id="partof-field-donation" class="ZIP-donation">
					<div id="textof-partof"> Search By Zip Code</div>
					<input placeholder="6-digits ZIP code of the locality " id="inputof-partof" class="dreq-zip1" type="text" maxlength="6"/>
				</div>
			</li>
			<li id="field-donation" class="register_don_2">
				<div id="partof-field-donation">				
				<button id="buttonof-partof" onclick="find(1); ">Search</button>
				</div>
			</li>
		</ul>
		<div id="results1"></div>
		</div>
	</div>
	
	<div id="dreq-inner" style="height:85px;overflow:hidden;" class="dreq-inner2">
		<h3 id="dreq-h3" class="trend-2">Where can people donate?</h3>
		<div id="clear2">
		<ul id="fields-donation" class="expand-01"> 
					<li id="field-donation">
				<p id="p2errors" class="p-errors"></p>
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof"> Search By Zip Code</div>
							<input  placeholder="6-digits ZIP code of the locality " id="inputof-partof" type="text" maxlength="6"  class="dreq-zip2" />
						</div>
					</li>
					<li id="field-donation" class="register_don_2">
						<div id="partof-field-donation">
							<button id="buttonof-partof"  onclick="find(2);">Search</button>
						</div>
					</li>
		<li><div id="results2"></div></li>
		</ul>
		<ul id="fields-donation" class="expand-02" style="height:1px;overflow:hidden;"> 
					<li id="field-donation">
						<div id="partof-field-donation" class="building-donation">
							<div id="textof-partof"> Flat No./ Building Name*</div>
							<input placeholder="ex. xyz Apartment, Building abc (identify where can you receive donations)" id="inputof-partof" id="inputof-partof" type="text" class="val_bldng" />
						</div>
					</li><li id="field-donation">
						<div id="partof-field-donation" class="street-donation">
							<div id="textof-partof"> Locality, Area or Street*  </div>
							<input placeholder="street name in the address where donations can be received" id="inputof-partof" type="text" class="val_street"/>
						</div>
					</li>
					<li id="field-donation" class="register_don_2">
						<div id="partof-field-donation">
							<button id="buttonof-partof" onclick="check(1);check(2);">Confirm</button>
						</div>
					</li>
					<li><div id="errs_1"></div></li>
		</ul>
		<ul id="fields-donation" style="height:1px;overflow:hidden;" class="expand-03" > 
					<li id="field-donation"><h4>Timings (optional)</h4>
						<div id="partof-field-donation" class="morning-donation">
							<div placeholder="HH:MM AM/PM" id="textof-partof"> Morning Time </div>
							<input id="inputof-partof" type="time" class="time-m" value="08:00 AM"/>
						</div>
					</li><li id="field-donation">
						<div id="partof-field-donation" class="evening-donation">
							<div id="textof-partof">Evening Time </div>
							<input placeholder="HH:MM AM/PM"  id="inputof-partof" type="time"  class="time-e" value="04:00 PM"/>
						</div>
					</li>
					<li id="field-donation" class="register_don_2">
						<div id="partof-field-donation">
							<button id="buttonof-partof" onclick="check(2)">Next</button>
						</div>
					</li>
		</ul>
		
		<ul id="fields-donation" style="height:1px;overflow:hidden;" class="expand-04" > 			 
					<li><h4>can people donate on these days</h4>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation" class="sun-donation checkbox">
							<input id="inputof-partof-check1"  type="checkbox"  checked class="sat-day"/>
							<label for="inputof-partof-check1" id="textof-partof">Saturday</label>
						</div>
					</li> 
					<li id="field-donation">
						<div id="partof-field-donation" class="mon-donation checkbox">
							<input  id="inputof-partof-check2"  type="checkbox" checked  class="sun-day"/>
							<label  for="inputof-partof-check2" id="textof-partof">Sunday</label>
						</div>
					</li> 
								 
					<li><h4>Can you pick up donations from the donor locations (recommended)</h4>
					</li>
					
					<li id="field-donation">
						<div id="partof-field-donation" class="mon-donation checkbox">
							<input  id="inputof-partof-check3"  type="checkbox"  class="pickup"/>
							<label  for="inputof-partof-check3" id="textof-partof">Pickup Option Available</label>
						</div>
					</li> 
					<li id="field-donation" class="register_don_2">
						<div id="partof-field-donation">
							<button id="buttonof-partof" onclick="next(2,3);">Next</button>
						</div>
					</li>
		</ul> 
		</div>
	</div>
	
	<div id="dreq-inner"  style="height:100px;overflow:hidden;" class="dreq-inner3">
		<h3 id="dreq-h3"  class="trend-3">Required Donations </h3> 
		<div id="clear3">
		<ul id="fields-donation" class="expand-05">  
					<li><h4>Add</h4></li>
					<li id="field-donation" class="register_don_2">
						<div id="partof-field-donation">
							<button id="buttonof-partof" onclick="
expand('expand-05',0);expand('expand-06',1);" style="
    border-radius: 100px; 
    padding: 10px 15px;">+</button>
							<button id="buttonof-partof"  onclick="next(3,4);" style="background: rgb(3, 169, 244);">Next Part</button>
						</div>
					</li> 
					<li><div id="errs_3" class="p-errors"></div></li>
		</ul>
				<ul id="#p_div" class="append-needs" style="display:none"> 
					<li> 
					<h4 style="font-size:18px;color:#333;">Available needs: </h4>
					</li>
				</ul> 
			<ul id="fields-donation" style="height:1px;overflow:hidden;"class="expand-06" >
					<li> 
					<h4>Enter details here </h4>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation"  class="state-donation">
							<div id="textof-partof" > Name </div>
							<input id="inputof-partof" placeholder="This is the heading ,ex. Books for striving students" type="text" autocorrect="off" autocomplete="off" class="name_need"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation"  class="state-donation">
							<div id="textof-partof" > Number of items needed</div>
							<input placeholder="This is the quantity ,ex. 25" min="1" id="inputof-partof" type="number" autocorrect="off" autocomplete="off"  class="num_need"/>
						</div>
					</li>
					
					<li id="field-donation">
						<div id="partof-field-donation"  class="state-donation">
							<div id="textof-partof" >Unit of quantity</div>
							<input  placeholder="eg. litres, kg, or else books, clothes, etc. " id="inputof-partof"   type="text" autocorrect="off" autocomplete="off"  class="qy_need"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation"  class="state-donation">
							<div id="textof-partof" >Price of quantity (in Rs.)</div>
							<input  placeholder="ex. 240 " id="inputof-partof"   type="text" autocorrect="off" autocomplete="off"  class="price_need"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation"  class="state-donation">
							<div id="textof-partof" > Select a thumbnail for the need (Recommended,  Standard size: 300px * 150px)</div>
							<input id="inputof-partof" type="file" autocorrect="off" autocomplete="off"   class="thumb_need"/>
						</div>
					</li> 
					<li id="field-donation">
						<div id="partof-field-donation"  class="state-donation">
							<div id="textof-partof" >Brief the cause or related description</div>
							 <textarea  placeholder="ex. This locality has a school where students need 25 Mathematics-books" id="inputof-partof"  type="text" autocorrect="off" autocomplete="off"  class="desc_need" />
						</div>
					</li> 
					<li id="field-donation" class="register_don_2">
						<div id="partof-field-donation">
							<button id="buttonof-partof" onclick="check(3)">Save</button>
						</div>
					</li>
					<li><div id="errs_2"  class="p-errors"></div></li>
			</ul>
		</div>
	</div>
	
	<div id="dreq-inner"  style="height:100px;overflow:hidden;" class="dreq-inner4">
		<h3 id="dreq-h3"  class="trend-4">Post Details</h3>
		<div id="clear4">
		<ul id="fields-donation"> 
					<li id="field-donation">
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof"> Title <p>This will be the title of your post (min 7 chars)</p></div>
							<input id="inputof-partof" placeholder="ex. The little angels need to learn" type="text" maxlength="26" class="tag-trend"/>
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof"> About<p> Give more Details for people to know (min 31 chars)</p></div>
							<textarea id="inputof-partof" placeholder="ex., Help the students in their education. I cannot see those few refugees sleeping under the xyz bridge in such harsh winter " maxlength="400" class="about-trend" style="min-height:70px;"/>
						</div>
					</li>					<li id="field-donation">						<div id="partof-field-donation" class="ZIP-donation">							<div id="textof-partof"> Location (optional)<p>A Landmark. Leave it blank if select village name instead</p></div>							<input placeholder="Landmark ex. XYZ Hospital" id="inputof-partof" type="text" maxlength="50" class="location-trend"/>						</div>					</li>					<li id="field-donation">						<div id="partof-field-donation" class="ZIP-donation">							<div id="textof-partof"> Phone (optional)<p>This number will display in the live campaign with location</p></div>							<input placeholder="10 digits " id="inputof-partof" type="number" maxlength="10" min="10" max="10" class="phone-trend"/>						</div>					</li>
					<li id="field-donation">
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof">Picture 1 <p>Select a unique picture taken from that locality. This should explain the needs (Limit 2 MB, Standard size: 700px * 400px).</p></div>
							<input id="inputof-partof"  type="file"  class="pic1-trend"/>
						</div>
					</li> 
					<li id="field-donation">
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof">Picture 2<p>Select a supporting picture taken from that locality. This should explain the cause (Limit 2 MB Standard size: 700px * 400px).</p></div>
							<input id="inputof-partof" type="file"  class="pic2-trend" />
						</div>
					</li> 
					<li id="field-donation">
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof">Picture 3 (optional)<p>(Limit 2 MB Standard size: 700px * 400px)</p></div>
							<input id="inputof-partof" type="file"  class="pic3-trend" />
						</div>
					</li> 
					<li id="field-donation">
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof">Picture 4 (optional)<p>(Limit 2 MB Standard size: 700px * 400px)</p></div>
							<input id="inputof-partof" type="file"  class="pic4-trend" />
						</div>
					</li> 
					<li id="field-donation">
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof">Picture 5 (optional)<p>(Limit 2 MB Standard size: 700px * 400px)</p></div>
							<input id="inputof-partof" type="file"  class="pic5-trend" />
						</div>
					</li> 
					<li id="field-donation" class="register_don_2">
						<p id="p-agree">*By creating a new post, I agree to the terms and conditions</p><div id="partof-field-donation">
							<button id="buttonof-partof" onclick="check(4);">Set Up!</button>
						</div>
					</li>
					<li><div id="errs_4" class="p-errors"></div></li>
		</ul> 
		</div>
	</div>
	
	<div id="dreq-inner" style="height:85px;overflow:hidden;" class="dreq-inner5">
		<h3 id="dreq-h3" class="trend-5">Add more details (Recommended)</h3>
		<div id="clear5">
			<ul id="fields-donation"> 
					<li id="field-donation">
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof">Overview</div>
							<textarea id="inputof-partof" placeholder="This defines the summary of your experience about the situation" type="text" class="overview-finish" />
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof">Explain in detail</div>
							<textarea style="min-height:200px"  class="detail-finish" id="inputof-partof" placeholder="This explains the situation in detail. 
	Codes to use: 
		/p = start the paragraph,
		/P = end the paragraph, 
		/b = start the highlighter, 
		/B = Stop the highlighter 
	ex. /p This is paragraph 1 /P/p This is /bhighlighted text/B in paragraph 2. /P"  type="text"  />
						</div>
					</li>
					<li id="field-donation">
						<div id="partof-field-donation" class="ZIP-donation">
							<div id="textof-partof">Hashtags</div>
							<textarea id="inputof-partof" placeholder="Boost your chances to get noticed by adding hashtags." type="text" class="hashtags" />
						</div>
					</li>
					<li id="field-donation" class="register_don_2">
						<p id="p-agree">*By providing a legitimate analysis, I also agree to the terms and conditions
						</p><div id="partof-field-donation">
							<button id="buttonof-partof" class=".clr2"  onclick="cleared(2);">Skip & Finish</button>
						</div>
					</li>
					<li><div id="errs_5" class="p-errors"></div></li>
				</ul>
			</div>
		</div>
	<div id="dreq-inner"  style="height:1px;overflow:hidden;" class="dreq-inner6">
	<div id="success-trend"></div>
	</div>
</div>
<script type="text/javascript">
function find(a){if(1==a||2==a){$("#results"+a).html('<p class="p-errors" >Searching, please hold..</p>');var b=$(".dreq-zip"+a).val();if(6!=b.length)return void $("#results"+a).html('<p class="p-errors" >Please enter a valid zip</p>');1==a?zip1=b:zip2=b;var c="s="+b+"&w="+a}$.ajax({type:"POST",url:"main/html/finder.php",data:c,cache:!1,success:function(b){1!=a&&2!=a||$("#results"+a).html(b)}})}function add(a){$("."+a).hasClass("sel-"+a)?($("."+a).removeClass("sel-"+a),$("."+a).css("color","initial"),$("."+a).css("background","whitesmoke")):($("."+a).addClass("sel-"+a),$("."+a).css("background","#2196f3"),$("."+a).css("color","#fff"))}function check(a){if(0==a){if(0==$(".thisadd2").hasClass("sel-thisadd2"))return void $("#p2errors").append("<br>Please select the address");$(".dreq-zip2").readonly=!1,expand("expand-01",0),expand("expand-02",1)}else if(1==a){if(a0=$(".val_street").val().trim(),b0=$(".val_bldng").val().trim(),""==a0||""==b0)return void $("#errs_1").html('<p class="p-errors">Invalid field(s)</p>');expand("expand-02",0),expand("expand-03",1)}else if(2==a)tm=$(".time-m").val().trim(),te=$(".time-e").val().trim(),expand("expand-03",0),expand("expand-04",1);else if(3==a){var b=$(".name_need").val().trim(),c=$(".num_need").val().trim(),d=$(".qy_need").val().trim(),e=$(".thumb_need")[0].files[0],f=$(".desc_need").val().trim(),g=$(".price_need").val().trim();if(""==b||""==c||""==d||""==f||e==image&&""!=e&&null!=e&&void 0!=typeof e)return void $("#errs_2").html("Error: Please check all fields");try{needs[num]=new Array(5),needs[num][0]=b,needs[num][1]=c,needs[num][2]=d,icons[num]=e,needs[num][3]=f,needs[num][4]=g,num+=1}catch(a){return void $("#errs_2").html("Error: "+a.message)}expand("expand-06",0),expand("expand-05",1),image=e,$(".append-needs").css("display","block"),$(".append-needs").append('<li id="li_need">'+num_need+". <strong>"+b+"</strong>: "+f+" ("+c+" "+d+")</li>"),$(".name_need").val(""),$(".num_need").val(""),$(".qy_need").val(""),$(".price_need").val(""),$(".thumb_need").val(""),$(".desc_need").val(""),$("#errs_2").html(""),$("#errs_3").html(""),num_need++}else if(4==a){var g=$(".tag-trend").val().trim(),h=$(".about-trend").val().trim(),i=$(".location-trend").val().trim(),iph=$(".phone-trend").val().trim(),j=$(".pic1-trend")[0].files[0],k=$(".pic2-trend")[0].files[0],l=$(".pic3-trend")[0].files[0],m=$(".pic4-trend")[0].files[0],n=$(".pic5-trend")[0].files[0];if(iph.length==10 && typeof(iph)=='int'){	$i=$i+" +91 "+iph;}if(g.length<5||h.length<30||""==j||""==k||j==k)return void $("#errs_4").html("Error: Please check all fields");trends[0]=g,trends[1]=h,trends[2]=i,pics[0]=j,pics[1]=k,pics[2]=l,pics[3]=m,pics[4]=n,$("#errs_4").html(""),next(4,5)}}function cleared(a){if(1==a){var b=$(".overview-finish").val().trim(),c=$(".detail-finish").val().trim();if(""==b||""==c)return void $("#errs_5").html("Error: Please check both fields");trends[3]=b,trends[4]=c,next(5,6)}else trends[3]="",trends[4]="",next(5,6)}function next(a,b){if(a==2 && b==3){expand('expand-05',0);expand('expand-06',1);}if(2==a&&(sat=$(".sat-day").is(":checked")?1:0,sun=$(".sun-day").is(":checked")?1:0,pick=$(".pickup").is(":checked")?1:0),5==a&&($("#success-trend").css("background","yellowgreen"),$("#success-trend").html("Hold on, please! <br>We’re putting this live for you now"),process_data()),1==a&&2==b){if(0==$(".thisadd"+a).hasClass("sel-thisadd"+a))return void $("#p"+a+"errors").append("<br>Please select the address");$(".dreq-zip"+a).readonly=!1}else if(3==a&&4==b&&num_need<2)return void $("#errs_3").html("Error: Cannot start a trend without needs! Add some needs.");$(".trend-"+a).addClass("trend_done"),$(".dreq-inner"+a).css({height:"100px",overflow:"hidden",transition:"height 0.5s"}),$(".dreq-inner"+b).css({height:"auto",transition:"height 0.5s"}),$("#clear"+a).html("")}function expand(a,b){1==b?$("."+a).css("height","auto"):$("."+a).css({height:"0px",overflow:"hidden"})}function process_data(){var a=new FormData;for(a.append("id",1),a.append("zip1",zip1),a.append("zip2",zip2),a.append("a0",a0),a.append("b0",b0),a.append("pick",pick),a.append("num",num),a.append("needs",needs.join(",")),a.append("trends",trends.join(",")),a.append("tm",tm),a.append("te",te),a.append("sat",sat),a.append("sun",sun),a.append("img1",pics[0]),a.append("img2",pics[1]),a.append("img3",pics[2]),a.append("img4",pics[3]),a.append("img5",pics[4]), a.append('overview', document.getElementsByClassName('overview-finish')[0].value), a.append('detail', document.getElementsByClassName('detail-finish')[0].value), a.append('hashtags', document.getElementsByClassName('hashtags')[0].value),$ind=0;$ind<num;$ind++)a.append("icon"+$ind.toString(),icons[$ind]);$.ajax({type:"POST",url:"main/points/trend.php",data:a,processData:!1,contentType:!1,success:function(a){""==a.trim()?($("#success-trend").css("background","rgb(3, 169, 244)"),$("#success-trend").html("Thank you for being a Daanvir. Your donation post  is live. Go ahead and share it with the world to get more support")):($("#success-trend").css("background","#FF5722"),$("#success-trend").html(a))},error:function(){$("#success-trend").css("background","#FF5722"),$("#success-trend").html("Oops! Something went wrong.")}})}var image=null,num_need=1,zip1=null,zip2=null,a0=null,b0=null,num=0,pick=0,needs=new Array,icons=[],pics=new Array(5),trends=new Array(5),tm=null,te=null,sat=0,sun=0;
</script>
