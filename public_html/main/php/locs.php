<?php  
require '../db/init.php'; 

$m=Sanitize($_POST['m']);
if($m==='s'){
$states=Sanitize($_POST['taken']); 
$states = explode(",", $states);  
$number=sizeof($states);
if($number>0){ 
	$section1='<section class="grid-wrap">
					<ul class="grid">
						<li class="grid-sizer"></li>';
for($i=0;$i<$number;$i++){ 
$t=substr($states[$i],11); 
$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE stateId='$t'");
	$num_rows=mysqli_num_rows($q); 
		if($num_rows>0){ 
		while($fetch= mysqli_fetch_assoc($q)){
		$button='<p id="connection">SELECT</p>';
		if($fetch['localityPic']!=""){
		$image='<img src="main/'.$fetch['localityPic'].'" alt="Loading Image.."/>';
		}else{ 
		$image='';
		}
			$section1.='
						<li onclick="locs(\'l\',\'locality108201'.$fetch['localityId'].'\');" class="locality108201'.$fetch['localityId'].' notself2">
							<figure>'.$image.'
								<figcaption><h3>'.$fetch['localityName'].'</h3><p>'.$fetch['localityDesc'].'</p>'.$button.'</figcaption>
							</figure>
						</li>'; 
		}
	}else{
		echo '<h2 id="not_found">This state has no localities listed<h2>';
	}
}

	$section1.='</ul>
				</section>';
	echo $section1;
}else{
	echo '<h2 id="not_found">Please select a state first<h2>';
exit();	
}  

}else if($m==='l'){ 
$mntype=Sanitize($_POST['mn']); 
//hit = hitlist, not= general
$localities=Sanitize($_POST['taken']); 
$localities = explode(",", $localities);  
$number=sizeof($localities);
$need_ids=array();

if($mntype=='hit'){ 
$t=substr($localities[0],14); 
$q_pre=mysqli_query($GLOBALS['conn2'],"SELECT need_ids,headline,location FROM hitlist WHERE hitId = '$t'"); 
$num_rows_pre=mysqli_num_rows($q_pre); 
	if($num_rows_pre==1){  
	$fetch_pre= mysqli_fetch_assoc($q_pre);  
	$need_ids=explode(',',$fetch_pre['need_ids']);
    $headline = $fetch_pre['headline'];
    $location = $fetch_pre['location'];
	}
	$number=sizeof($need_ids);
}


if($number>0){  
	if($mntype=='hit')
	$section1='<section class="grid-wrap" style="max-width: 98%;">
					<ul class="grid" id="helpthem">
						<div style="width:50%;float:right;padding-left:30px;margin-top:10px">
                        <span id="donation_title">'.$headline.'</span><br>
                        <span id="donation_place" style="background:#FEE202;padding:5px;border-radius:15px;padding-left:10px;padding-right:10px;float:left;margin-top:8px;font-family:Josefin Sans">'.$location.'</span>
                        <span id="donation_place" style="background:#FEE202;padding:5px;border-radius:15px;padding-left:10px;padding-right:10px;float:left;margin-top:8px;margin-left:5px;font-family:Josefin Sans">60 Supporters</span><br>
                        <img src="img/fbicon.png" onclick="fshare()" href=""  width="40px" height="40px" style="float:right"/>
                        <img src="img/twittericon.png" onclick="fshare()" href=""  width="40px" height="40px" style="float:right"/>
                        <img src="img/g+.png" onclick="fshare()" href=""  width="40px" height="40px" style="float:right"/>
                        <br><br>
                        <div id="imageContent" style="width:100%;height:100px;float:left">
			<div id="loadImgs" class="owl-carousel owl-theme" style="display:block;">
				 <h2 style="padding:100px 20px" id="loadImgsh2">Loading.. </h2>
			</div>
		</div>
		</div>
						<div id="imagebox" style="float:right;padding-left:55px">
		<div id="aboutbox" style="display:block;"><h2 style="padding:100px 20px">Loading.. </h2></div>
		<ul id="needsbox" style="display:none; font-size:20px;font-family:Raleway;"><h2 style="padding:100px 20px">Loading.. </h2></ul>
		<ul id="supportingbox" style="display:none;"><h2 style="padding:100px 20px">Loading.. </h2></ul>
		<div id="locationbox" style="display:none;"><h2 style="padding:100px 20px">Loading.. </h2></div>
		
		<div id="codeContent">
			<div id="codeBox" class="codeBox1" onclick="getThis(1)">About</div>
			<div id="codeBox" class="codeBox2"  onclick="getThis(2)">Needs</div>
			<div id="codeBox" class="codeBox3"  onclick="getThis(3)">Support</div>
			<div id="codeBox" class="codeBox4"  onclick="getThis(4)">Location</div>
		</div>
	</div><li class="grid-sizer" style="display:none"></li>
	<li id="what-donate"><h2 id="r-part-h2" class="r-h2-special" style="text-align:left;  display:none;">What would you like to donate?</h2>
			</li>
			';
	else
		
	$section1='<section class="grid-wrap">
					<ul class="grid">
						<li class="grid-sizer"></li>';
	$u=$userData['userId'];
for($i=0;$i<$number;$i++){ 
$q=null;
$t=0; 
if($mntype=='hit'){ 
 $q=mysqli_query($GLOBALS['conn2'],"SELECT * FROM currentneeds WHERE currentNeedId='$need_ids[$i]'"); 
}else{
$t=substr($localities[$i],14); 
$q=mysqli_query($GLOBALS['conn2'],"SELECT * FROM currentneeds WHERE  localityId='$t'");  
}
$num_rows=mysqli_num_rows($q); 
	if($num_rows> 0){  
		while($fetch= mysqli_fetch_assoc($q)){  
		$cn_id=$fetch['currentNeedId'];
		$cn_pic=$fetch['currentNeedPic'];  
		$image='';
		if($cn_pic!=""){
			$image='<img src="main/'.$cn_pic.'" alt="Loading Image.."/>';
		}else{ 	
			$image='';
		}  
		$q1=mysqli_query($GLOBALS['conn2'],"SELECT qnty,includeinhit FROM currentneeds WHERE freeze=0 AND currentNeedId='$cn_id'");
		$num_rows1=mysqli_num_rows($q1); 
			if($num_rows1==1){
		$fetch1= mysqli_fetch_assoc($q1);
		$qy=$fetch1['qnty']; 
		$ih=$fetch1['includeinhit'];
		
		$q2=mysqli_query($GLOBALS['conn2'],"SELECT confirmed,processed,userId FROM currfillmethod WHERE  currentNeedId='$cn_id' AND userId='$u'");
		$num_rows2=mysqli_num_rows($q2); 
		$fetch2= mysqli_fetch_assoc($q2); 
		$cfd=$fetch2['confirmed'];
		$pr=$fetch2['processed'];
		$sum=0;
		$q3=mysqli_query($GLOBALS['conn2'],"SELECT SUM(currNeedFillNum) as sum FROM currfillmethod WHERE currentNeedId='$cn_id' AND confirmed=1");
		$num_rows3=mysqli_num_rows($q3);  
		if($num_rows3==1){
			$row=mysqli_fetch_assoc($q3);
			$sum=$row['sum'];
		}
		$sum_ = round(($sum/$qy)*100,1);
	if($sum_>100)
	   $sum_=100;
   $sum__=$sum_;
   if($sum_<20)
	   $sum__=20;
	 $class="connection";	
	 $text="SELECT";
	 $click='onclick="locs(\'n\',\'currentneed4568911'.$cn_id.'\');"';
	 if($mntype=='hit') 
		 $style2=' style="width:80%"';
	 else $style2="";
	 $div_button='<div id="connected" class="connection_i"><input type="number" placeholder="items" min="0" id="val_number"'.$style2.'/><p id="connection2" class="conn_i_save" onclick="locs(\'d\',\'currentneed4568911'.$cn_id.'\');">SAVE</p>Please add number of units that you are donating</div>';
	 if($cfd==1){
	 //Processing   
	 $class="connection_p";		
	 $text="PROCESSING";
	 $click='';
	 $div_button='';
	 }else if($sum>=$qy){
	 //Filled 
	 $class="connection_f";		
	 $text="FILLED";
	 $click='';
	 $div_button='';
	 }
	 else if($ih==1){
	 //in hit
	 $class="connection_h";		
	 $text="SELECT";
	 $click='onclick="locs(\'n\',\'currentneed4568911'.$cn_id.'\');"'; 
	 }
	 else if($pr==1){
	 //fill again
	 $class="connection_a"; 	
	 $text="SELECT AGAIN";
	 $click='onclick="locs(\'n\',\'currentneed4568911'.$cn_id.'\');"'; 
	 }else{  
	 $class="connection";	
	 $text="SELECT"; 
	 $click='onclick="locs(\'n\',\'currentneed4568911'.$cn_id.'\');"';
	 }
	 $button='<p id="connection" '.$click.' class="'.$class.'">'.$text.'</p>';
	/*
	$style="";
		if($i<2){
			$style="style=\" margin-top: 60px;\"";
		}else{ 
		$style="";	 
		
		} 	*/
		if($mntype=='hit')
	$style="style=\" margin-top: 50px;\"";
		else $style="";
	 $section1.='
						<li  class="currentneed4568911'.$cn_id.' notself3" '.$style.'>
							<figure>
								<figcaption><h3>'.$fetch['currentNeedName'].'</h3><p>AUTOBUY : Rs. '.$fetch['unit_price'].'/ item</p><p id="donat-count"></p>'.$button.$div_button.'</figcaption>
							<div id="sum_bar" style="width:100%;height:20px;background:whitesmoke;">
								<div id="sum_bar_in" style="background:#00BCD4;color:#fff;width:'.$sum__.'%;height:100%;"><b style="padding:5px">'.$sum_.'%</b></div>
							</div>
							</figure>
							<input type="hidden" id="price" value="'.$fetch['unit_price'].'" readonly=readonly/>
						</li>';  
	}
	}
	}else{
	//echo '<h2 id="not_found">This locality is under research operation<h2>';
	//exit();	
	}  			
}				
	$section1.='</ul>
				</section>';
	echo $section1;
}else{
	echo '<h2 id="not_found">Please select a locality first<h2>';
exit();	
}  
}else if($m==='m'){
//actually a hit
$localities=Sanitize($_POST['taken']);  
$localities = explode(",", $localities);  
$number=sizeof($localities);
if($number!=1){
	exit();
}
for($i=0;$i<$number;$i++){ 
$t=substr($localities[0],14); 
$q_pre=mysqli_query($GLOBALS['conn2'],"SELECT userId,street,building,pickup,ZIP2 FROM hitlist WHERE hitId = '$t'"); 
$num_rows_pre=mysqli_num_rows($q_pre); 
	if($num_rows_pre==1){  
	$fetch_pre= mysqli_fetch_assoc($q_pre);  
	$street=$fetch_pre['street'];
	$building=$fetch_pre['building'];
	$pickup=$fetch_pre['pickup'];
	$z2=$fetch_pre['ZIP2'];
	$u=$fetch_pre['userId'];
$user='';
$retrieve=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE userId={$u}"); 
$num=mysqli_num_rows($retrieve);
if($num==1){
	$r=mysqli_fetch_assoc($retrieve); 
	$user=ucfirst(strtolower($r['fName'])).' '.ucfirst(strtolower($r['lName'])).','; 
}
	
$retrieve1=mysqli_query($GLOBALS['conn'],"SELECT * FROM map WHERE pincode= '$z2' ORDER BY pincode LIMIT 1"); 
$num1=mysqli_num_rows($retrieve1);
if($num1<1){
	echo 'Failed: No Match for the provided ZIP!';
	exit();
}

$row1= mysqli_fetch_assoc($retrieve1); 
$state1 =  ucfirst(strtolower($row1['State']));
$district1 =  ucfirst(strtolower($row1['District']));
$sub_district1 =  ucfirst(strtolower($row1['SubDistrict']));
$village1 =  ucfirst(strtolower($row1['Village']));
if($village1===$sub_district1){
	$sub_district1='';
}else{
	$sub_district1=$sub_district1.', ';
}
if(!empty($building)){
	$building=ucfirst(strtolower($building)).',';
}
if(!empty($street)){
	$street= ucfirst(strtolower($street)).',';
}
$addr= "{$user} {$building} {$street} {$village1}, {$sub_district1}{$district1}, {$state1}- {$z2}" ;
echo $pickup."*/.*".$addr;
	}
}
}else if($m==='k'){  
$localities=Sanitize($_POST['taken']);  
$localities = explode(",", $localities);  
$number=sizeof($localities);
if($number<1){
	exit();
}

for($i=0;$i<$number;$i++){ 
$t=substr($localities[$i],14); 

$q_pre=mysqli_query($GLOBALS['conn2'],"SELECT hitId FROM hitlist WHERE localityId = {$t}"); 
$num_rows_pre=mysqli_num_rows($q_pre); 
	if($num_rows_pre>0){  
	while($fetch_pre= mysqli_fetch_assoc($q_pre)){ 
	$hitId=$fetch_pre['hitId'];	
		print_hit($hitId);
			}  
		}
	}
}
?>