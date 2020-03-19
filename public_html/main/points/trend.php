<?php //ini_set('display_errors', 0);
//opcache_reset();
require '../db/init.php';  

$overview = Sanitize($_POST['overview']);
$detail = Sanitize($_POST['detail']);
$hashtags = Sanitize($_POST['hashtags']);

$id= Sanitize($_POST['id']); 
if($id==1){
$z1 = Sanitize($_POST['zip1']); 
  
$z2 = Sanitize($_POST['zip2']); 
   
$pick = Sanitize($_POST['pick']);
 
$street = Sanitize($_POST['a0']); 
  
$building = Sanitize($_POST['b0']); 
  
$need_num = Sanitize($_POST['num']);  

$x_needs = Sanitize($_POST['needs']); 

$x_needs = explode(',',$x_needs);

$trends = Sanitize($_POST['trends']);  

$trends = explode(',',$trends);

$morning = Sanitize($_POST['tm']); 
  
$evening = Sanitize($_POST['te']); 
  
$sat = Sanitize($_POST['sat']); 
  
$sun = Sanitize($_POST['sun']); 

$need_ids=array();

//STEP 1:VALIDATION
if(strlen($z1)!=6 || strlen($z2)!=6){
	echo 'Failed:Invalid ZIP provided';
	exit();
}
if(empty($z1) || empty($z2) || empty($street) || empty($building)){ 
	echo 'Failed: Some fields were invalid (Category: ZIP, Street, Building)';
	exit();
} 

$userId=$userData['userId'];
$uID=$userId;
$needs = array();
$j_time=$need_num*4;  


for($i=0,$j=0;$i<$need_num,$j<$j_time;$i++,$j=$j+4){
if(empty($x_needs[$j]) || empty($x_needs[$j+1]) || empty($x_needs[$j+2]) || empty($x_needs[$j+3]) || $x_needs[$j+1] < 1){
	echo 'Failed: Some needs were invalid';
	exit();
}
$needs[$i] =  array(
			  $x_needs[$j],
			  $x_needs[$j+1],
			  $x_needs[$j+2], 
		      $x_needs[$j+3],
		      $x_needs[$j+4]
			) ;
} 
for($i=0;$i<2;$i++){
	if(empty($trends[$i])){ 
	echo 'Failed: Some fields were invalid (Category: Tag, About)';
	exit();
	}
} 

//STEP: CHECK LOCALITY 
$retrieve1=mysqli_query($GLOBALS['conn'],"SELECT * FROM map WHERE pincode= '$z1' ORDER BY pincode LIMIT 1"); 
$retrieve2=mysqli_query($GLOBALS['conn'],"SELECT * FROM map WHERE pincode= '$z2' ORDER BY pincode LIMIT 1"); 
$num1=mysqli_num_rows($retrieve1);
$num2=mysqli_num_rows($retrieve2);
if($num1<1 || $num2<1){
	echo 'Failed: No Match for the provided ZIP!';
	exit();
}

$row1= mysqli_fetch_assoc($retrieve1); 
$state1 = strtoupper($row1['State']);
$district1 = strtoupper($row1['District']);
//$sub_district1 = strtoupper($row1['SubDistrict']);
$village1 = strtoupper($row1['Village']);
$stateId=null;
$areaId=null;
$localityId=null;
//create state if not exists and get its ID
$chk1=mysqli_query($GLOBALS['conn'],"SELECT stateId FROM states WHERE stateName='$state1'"); 
$check_num1=mysqli_num_rows($chk1);
if($check_num1==0){ 
$ins1=mysqli_query($GLOBALS['conn'],"INSERT INTO states(stateName) VALUES('$state1')");  
$chk1in=mysqli_query($GLOBALS['conn'],"SELECT stateId FROM states WHERE stateName='$state1'");  
$check_num1in=mysqli_num_rows($chk1in);
if($check_num1in==1){ 
$row1in= mysqli_fetch_assoc($chk1in); 
$stateId = $row1in['stateId'];
}else{ 
	echo 'Failed: Internal Error (Code: x001)!';
	exit();
}
}else if($check_num1==1){ 
$row1= mysqli_fetch_assoc($chk1); 
$stateId = $row1['stateId'];
}else{ 
	echo 'Failed: Internal Error (Code: x002)!';
	exit();
}

//create area if not exists and get its ID
$chk2=mysqli_query($GLOBALS['conn'],"SELECT areaId  FROM areas WHERE areaName='$district1' AND stateId='$stateId'"); 
$check_num2=mysqli_num_rows($chk2);
if($check_num2==0){ 
$ins2=mysqli_query($GLOBALS['conn'],"INSERT INTO areas(areaName,stateId) VALUES('$district1','$stateId')");  
$chk2in=mysqli_query($GLOBALS['conn'],"SELECT areaId FROM areas WHERE areaName='$district1' AND stateId='$stateId'");  
$check_num2in=mysqli_num_rows($chk2in);
if($check_num2in==1){ 
$row2in= mysqli_fetch_assoc($chk2in); 
$areaId = $row2in['areaId'];  
}else{ 
	echo 'Failed: Internal Error (Code: x003)!';
	exit();
	}
}else if($check_num2==1){ 
$row2= mysqli_fetch_assoc($chk2); 
$areaId = $row2['areaId'];
}else{ 
	echo 'Failed: Internal Error (Code: x004)!';
	exit();
}
if($trends[2] == ""){
	$trends[2] = $village1;
}

//create locality if not exists and get its ID
$chk3=mysqli_query($GLOBALS['conn'],"SELECT localityId FROM localities WHERE localityName='$village1' AND areaId='$areaId' AND stateId='$stateId'"); 
$check_num3=mysqli_num_rows($chk3);
if($check_num3==0){ 
$ins3=mysqli_query($GLOBALS['conn'],"INSERT INTO localities(localityName,areaId,stateId)VALUES('$village1','$areaId','$stateId')");  
$chk3in=mysqli_query($GLOBALS['conn'],"SELECT localityId FROM localities WHERE localityName='$village1' AND areaId='$areaId' AND stateId = '$stateId'");
$check_num3in=mysqli_num_rows($chk3in);
if($check_num3in==1){ 
$row3in= mysqli_fetch_assoc($chk3in); 
$localityId = $row3in['localityId'];  
}else{ 
	echo 'Failed: Internal Error (Code: x005)!';
	exit();
}
}else if($check_num3==1){ 
$row3= mysqli_fetch_assoc($chk3); 
$localityId = $row3['localityId'];
}else{ 
	echo 'Failed: Internal Error (Code: x006)!';
	exit();
}
/******************************************************/
//STEP: UPLOAD IMAGES 
$expensions=array("jpeg","jpg","png");
$need_icons = array(); 
for($i=0;$i<$need_num;$i++){
	if(isset($_FILES['icon'.$i])){
	${'icon'.$i}='';
if($_FILES['icon'.$i]['error'][0] > 0){
    //file not selected
	//echo 'Please select image 1';
	//exit();
}else if($_FILES['icon'.$i]['error'][0] == 0){  
${'icon'.$i}=Sanitize($_FILES['icon'.$i]['name']);
$file_tm=$_FILES['icon'.$i]['tmp_name']; 
$siz=$_FILES['icon'.$i]['size']; 
$imag=''; 
$file_ex=explode('.',${'icon'.$i});
$file_ex=strtolower(end($file_ex));
} 
if(empty(${'icon'.$i})){ 
	//echo 'f'; 
	//exit(); 
}else{
	if((in_array($file_ex,$expensions)==false)||($siz > 2097152)){
	
	echo 'Failed: Invalid files were uploaded';
	exit();
}else{ 
	$path="Needs"."/icon".$uID;	
	$uID = 2*(3+$userId);
	$target="../FullGlass/images/".$path."/".${'icon'.$i};
	$target_db="FullGlass/images/".$path."/".${'icon'.$i};
     if(!is_dir("../FullGlass/images/".$path)){ 
		mkdir("../FullGlass/images/".$path,0777,true); 
    } 
		if(!file_exists("../FullGlass/images/".$path."/".${'icon'.$i})){

			if(!move_uploaded_file($file_tm,$target)){ 
			echo "0*".null;
			}else{
			//echo "1*".$target_db;
			$need_icons[$i] = $target_db;
			}
			//$query=null;
				/*if($e==1){
					$query="UPDATE users SET profilePic= '$target_db' WHERE
					userId = ".$_SESSION['userId'];  
				}
			
			

			if($conn->query($query)===TRUE){ 

			//echo "SUCCESS!";

			echo $target_db;

			}else{ 

			//error

			 } */

			//basename($_FILES['profilePic']['name'])	

			}else if(file_exists("../FullGlass/images/".$path."/".${'icon'.$i})){
			//(file_exists("../FullGlass/images/".$path."/".${'icon'.$i}))
			//only update 
			echo "1*".$target_db;
			$need_icons[$i] = $target_db;
 
			}
		}	
	} 
}
//STEP2:CREATE NEEDS IN LOCALITY
mysqli_autocommit($GLOBALS['conn2'],FALSE);
$ae=$needs[$i][4];
$aa=$needs[$i][3];
$ab=$needs[$i][1];
$ac=$needs[$i][2];
$ad=$needs[$i][0];  
//$ae=$need_icons[$i]; //undefined offset ofcourse
$ae = isset($need_icons[$i]) ? $need_icons[$i] : '';
try{
$q_start=mysqli_query($GLOBALS['conn2'],"
LOCK TABLES currentneeds WRITE; 
");
$q=mysqli_query($GLOBALS['conn2']," 
INSERT INTO currentneeds(localityId,currentNeedDesc,qnty,qnty_unit,unit_price,currentNeedName,currentNeedPic,includeinhit,freeze) VALUES('$localityId','$aa','$ab','$ac','$ae','$ad','$ae',1,0); 
"); 
mysqli_commit($GLOBALS['conn2']); 
$q_get=mysqli_query($GLOBALS['conn2'],"
SELECT currentNeedId FROM currentneeds ORDER BY currentNeedId DESC LIMIT 1
"); 
	$r_get_q=mysqli_fetch_assoc($q_get);
	$need_ids[$i]=$r_get_q['currentNeedId']; 
$q_end=mysqli_query($GLOBALS['conn2'],"
UNLOCK TABLES;
"); 
}catch(Exception $e){
mysqli_rollback($GLOBALS['conn2']);
exit();
}  
mysqli_autocommit($GLOBALS['conn2'],TRUE);
}

$img1="";
$img2="";
$img3="";
$img4="";
$img5="";
//isset doesn't work since data sent is not in required form
if($_FILES['img1']['error'][0] > 0){
    //file not selected
	echo 'Please select image 1';
	exit();
}else if($_FILES['img1']['error'][0] == 0){ //this is just to check if isset($_FILE). Not required.
    //file selected
$img1=Sanitize($_FILES['img1']['name']);
$file_tmp1=$_FILES['img1']['tmp_name']; 
$size1=$_FILES['img1']['size']; 
$image1=''; 
$file_ext1=explode('.',$img1);
$file_ext1=strtolower(end($file_ext1));
} 
if($_FILES['img2']['error'][0] > 0){
    //file not selected
	echo 'Please select image 2';
	exit();
}else if($_FILES['img2']['error'][0] == 0){ //this is just to check if isset($_FILE). Not required.
    //file selected
$img2=Sanitize($_FILES['img2']['name']);
$file_tmp2=$_FILES['img2']['tmp_name']; 
$size2=$_FILES['img2']['size']; 
$image2=''; 
$file_ext2=explode('.',$img2);
$file_ext2=strtolower(end($file_ext2));
}  
if(isset($_FILES['img3'])){
if($_FILES['img3']['error'][0] > 0){
    //file not selected
	echo 'Please select image 3';
	exit();
}else if($_FILES['img3']['error'][0] == 0){ //this is just to check if isset($_FILE). Not required.
    //file selected
$img3=Sanitize($_FILES['img3']['name']);
$file_tmp3=$_FILES['img3']['tmp_name']; 
$size3=$_FILES['img3']['size']; 
$image3=''; 
$file_ext3=explode('.',$img3);
$file_ext3=strtolower(end($file_ext3));
}  
}
if(isset($_FILES['img4'])){
if($_FILES['img4']['error'][0] > 0){
    //file not selected
	echo 'Please select image 4';
	exit();
}else if($_FILES['img4']['error'][0] == 0){ //this is just to check if isset($_FILE). Not required.
    //file selected
$img4=Sanitize($_FILES['img4']['name']);
$file_tmp4=$_FILES['img4']['tmp_name']; 
$size4=$_FILES['img4']['size']; 
$image4=''; 
$file_ext4=explode('.',$img4);
$file_ext4=strtolower(end($file_ext4));
}  
}

if(isset($_FILES['img5'])){
if($_FILES['img5']['error'][0] > 0){
    //file not selected
	echo 'Please select image 5';
	exit();
}else if($_FILES['img5']['error'][0] == 0){ //this is just to check if isset($_FILE). Not required.
    //file selected
$img5=Sanitize($_FILES['img5']['name']);
$file_tmp5=$_FILES['img5']['tmp_name']; 
$size5=$_FILES['img5']['size']; 
$image5=''; 
$file_ext5=explode('.',$img5);
$file_ext5=strtolower(end($file_ext5));
}  
}
 //Sanitize Wont work here for tmp_name.
if(empty($img1) || empty($img2)){ 
	echo 'Failed:Internal Error'; 
	exit(); 
}   
 if(!empty($img3)){
if((in_array($file_ext3,$expensions)==false)||($size3 > 2097152)){
	
	echo 'Failed: Invalid files were uploaded';
	exit();
}	
}
if(!empty($img4)){
	if((in_array($file_ext4,$expensions)==false)||($size4 > 2097152)){
	
	echo 'Failed: Invalid files were uploaded';
	exit();
}
}
if(!empty($img5)){
	if((in_array($file_ext5,$expensions)==false)||($size5 > 2097152)){
	
	echo 'Failed: Invalid files were uploaded';
	exit();
}
}
if((in_array($file_ext1,$expensions)==false)||($size1 > 2097152) || (in_array($file_ext2,$expensions)===false)||($size2 > 2097152)){ 
	echo 'Failed: Invalid files were uploaded';
	exit();
	//print_r($errors); 
}

	 $uID = (2*$userId)+4;
			$path="Traversal";
			//$_SERVER['DOCUMENT_ROOT']

			$target="../".$path."/images/".$uID;  
			$image1=$path."/images/".$uID."/".$img1;
			$image2=$path."/images/".$uID."/".$img2;
		
		if(!empty($img3)){
			$image3=$path."/images/".$uID."/".$img3;
			$vr3=$target."/".$img3;  
			}

		if(!empty($img4)){
			$image4=$path."/images/".$uID."/".$img4;
			$vr4=$target."/".$img4; 
			}
		
		if(!empty($img5)){
			$image5=$path."/images/".$uID."/".$img5;
			$vr5=$target."/".$img5;
			}
			if(!is_dir($target)){ 
				mkdir($target,0777,true); 
			}  
			
			$vr1=$target."/".$img1;
			$vr2=$target."/".$img2; 
			
			if(is_writable($target)){

			if(!file_exists($vr1)){  
					if(move_uploaded_file($file_tmp1,$vr1)==FALSE){
						echo 'Image 1 could not be uploaded';
					}
				}
			if(!file_exists($vr2)){  
					if(move_uploaded_file($file_tmp2,$vr2)==FALSE){
						echo 'Image 2 could not be uploaded';
					}
				}
			if(!empty($img3))	
			if(!file_exists($vr3)){  
					if(move_uploaded_file($file_tmp3,$vr3)==FALSE){
						echo 'Image 3 could not be uploaded';
					}
				}
			if(!empty($img4))
			if(!file_exists($vr4)){  
					if(move_uploaded_file($file_tmp4,$vr4)==FALSE){
						echo 'Image 4 could not be uploaded';
					}
				}
			
			if(!empty($img5))
			if(!file_exists($vr5)){  
					if(move_uploaded_file($file_tmp5,$vr5)==FALSE){
						echo 'Image 5 could not be uploaded';
					}
				}			 
			 
			 }else{

				 echo 'Protected Or No Directory.';

			 } 
$image=$image1.','.$image2;
if($image==","){
	echo 'Failed: Internal Error.';
	exit();
}
if(!empty($img3)){
	$image=$image.','.$image3;
}
if(!empty($img4)){
	$image=$image.','.$image4;
}
if(!empty($img5)){
	$image=$image.','.$image5;
}
$need_id=implode(',',$need_ids);
//print_r($need_ids);
//STEP3:CREATE NEW HITLIST WITH ZIP1, ZIP2, STREET, BUILDING, TM, TE, SAT, SUN, NEED IDS  
mysqli_autocommit($GLOBALS['conn2'],FALSE);
$hitId=null;
try{  
$q_start=mysqli_query($GLOBALS['conn2'],"
LOCK TABLES hitlist WRITE; 
");
//headline is the head, tagline is about
$q=mysqli_query($GLOBALS['conn2'],"INSERT INTO hitlist (`userId`,`localityId`, `majorhit_desc`,`img`,`headline`,`tagline`,`location`,`ZIP1`,`ZIP2`,`street`,`building`,`tm`,`te`,`sat`,`sun`,`need_ids`,`pickup`,`overview`,`detail`,`hashtag`) VALUES ('$userId','$localityId','$trends[3]','$image','$trends[0]','$trends[1]','$trends[2]','$z1','$z2','$street','$building','$morning','$evening','$sat','$sun','$need_id','$pick','$overview', '$detail', '$hashtags')");
mysqli_commit($GLOBALS['conn2']); 
 
$q_get1=mysqli_query($GLOBALS['conn2'],"
SELECT hitId FROM hitlist ORDER BY hitId DESC LIMIT 1
"); 
$r_get_q1=mysqli_fetch_assoc($q_get1);  
$hitId = $r_get_q1['hitId'];
$q_start=mysqli_query($GLOBALS['conn2'],"
UNLOCK TABLES; 
");
}catch(Exception $e){  
mysqli_rollback($GLOBALS['conn2']);
exit();
}  
mysqli_autocommit($GLOBALS['conn2'],TRUE); 

//STEP4:update the hitlist methods etc
//$t = $_POST['t']; 
	$tag='';
	$head='';
	$location='';
	$userDet='';
	$check1=mysqli_query($GLOBALS['conn2'],"SELECT * FROM hitlist WHERE hitId='$hitId'");   
	$num1=mysqli_num_rows($check1);  
	if($num1==1){
		$result=mysqli_fetch_assoc($check1);  
		$desc=$result['majorhit_desc']; 
		$tempImg=explode(",",$result['img']);
		$img="../../../".$tempImg[0];  
		$img2="../../../".$tempImg[1]; 
		$head=$result['tagline'];
		$tag=$result['headline'];
		$localityId=$result['localityId']; 
		$userId=$result['userId']; 
		$location=$result['location']; 
	$check2=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE localityId='$localityId'");   
	$num2=mysqli_num_rows($check2); 
	if($num2==1){ 
		$res=mysqli_fetch_assoc($check2);  
		$locn=$res['localityName']; 
		$stid=$res['stateId']; 
		$areaid=$res['areaId']; 
	$state=mysqli_query($GLOBALS['conn'],"SELECT * FROM states WHERE stateId='$stid'");  
		$s=mysqli_fetch_assoc($state);
		$stn=$s['stateName']; 
	$area=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE areaId='$areaid'");  
		$a=mysqli_fetch_assoc($area);
		$arn=$a['areaName'];  
		
		$headdsc_=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,state,city FROM users WHERE userId='$userId'"); 
	$ndsc_=mysqli_num_rows($headdsc_); 
	if($ndsc_==1){
	$rdsc_=mysqli_fetch_assoc($headdsc_);  
	$userDet.='- Started By '.$rdsc_['fName'];   
	if($rdsc_['lName']!="")
	$userDet.=' '.$rdsc_['lName'];  
	if($rdsc_['city']!="")
	$userDet.=', '.$rdsc_['city']; 
	if($rdsc_['state']!="")
	$userDet.=', '.$rdsc_['state']; 	
		} 
//
	$data1=null;
	$data2=null;$l=0;
	$r=0;
	$count=0; 
	$qy=0;
	if($locn!=null){   
		$s_curr=sizeof($need_ids);
		$sumt=0;
	$achieved=0;
	$cndsc='';  
	for($g=0;$g<$s_curr;$g++){
	//print_r($need_ids[$g]);
	$check1=mysqli_query($GLOBALS['conn2'],"SELECT `currentNeedDesc`,`qnty`, `qnty_unit` FROM currentneeds WHERE `includeinhit`=1 AND `currentNeedId`='$need_ids[$g]' AND freeze=0");  
	
	$num1=mysqli_num_rows($check1);  
	if($num1>0){
	$row1=mysqli_fetch_assoc($check1);
		$cnid = $need_ids[$g]; 
		$cndsc=$row1['currentNeedDesc']; 
		$qy=$row1['qnty']; 
		$qu=$row1['qnty_unit'];
		$sumt+=$qy;  
//print needs 
$check2=mysqli_query($GLOBALS['conn2'],"SELECT SUM(`currNeedFillNum`) as sum FROM `currfillmethod` WHERE currentNeedId='$need_ids[$g]' AND `confirmed`=1 ORDER BY fillmethodId DESC");  
		$count=mysqli_num_rows($check2); 
		$needqy=0;
		if($count==1){
		$r_count=mysqli_fetch_assoc($check2);
		$needqy=$r_count['sum'];
		$achieved+=$needqy;
		} 
//%age
	
	$l+=$needqy;
	$r+=$qy;
	if($qy!=0)
	$pc_q=round(($needqy/$qy)*100,1);
	$need=$cndsc.'- ('.$pc_q.'% filled)';
	//$need=$cndsc;
	$data1.='<li id="H_LI_19">'.$need.'
			</li>';
	
	if($count>0){
	$check22=mysqli_query($GLOBALS['conn2'],"SELECT userId FROM `currfillmethod` WHERE currentNeedId='$need_ids[$g]' AND `confirmed`=1 ORDER BY fillmethodId DESC"); 
	while($kind=mysqli_fetch_assoc($check22)){ 
	$filler=$kind['userId'];  
	$details=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,state FROM users WHERE userId='$filler'"); 
	$details2=mysqli_query($GLOBALS['conn2'],"SELECT dated FROM currfillmethod WHERE currentNeedId='$cnid' AND userId='$filler' ORDER BY dated DESC");  
	$n=mysqli_num_rows($details);
	$n_=mysqli_num_rows($details2);
	 if($n==1 && $n_==1){
	$rdet=mysqli_fetch_assoc($details); 
	$rdet2=mysqli_fetch_assoc($details2);  
	$name=$rdet['fName'].' '.$rdet['lName'];  
	$state=$rdet['state']; 	 
	$tstamp=$rdet2['dated']; 
	$date = ' - <strong style="font-size:12px">'.timeAgo($tstamp).'</strong>';	 
	if(!empty($state)){
		$state=', '.$state;
	}	
	$person=$name.$state;

	$data2.='<li id="H_LI_20">'.$person.$date.'</li>';	
//print donators for each need id	 							
								}						
							}
						}	 
				}
	}
$bar=0;
$bar_=0;
if($r!=0)
	$bar=round(($l/$r)*100,1); 
$bcopy=$bar;
if($bar<10){
	$bcopy=10;
} if($r!=0)
	$bar_=floor(($l/$r)*100); 
if($bar_<10){
	$bar_=10;
} 
if($bar>100){
	$bcopy=100;
}
$color="";
if($bar<20){ 
$color="red";
}else if($bar<60){ 
$color="orange";
}else if($bar<100 && $bar>60){ 
$color="green";
}
if(empty($data2)) 
	$data2.='<li id="H_LI_20">There were no supporters yet.</li>';
	$t=$trends[4];
	$find=array('/b','/B','/p','/P');
	$replace=array('<b>','</b>','<p>','</p>');
	$t=str_replace($find,$replace,$t); 
		/*Hide fb share and use custom clicks to press it*/
	ob_start();
	$text="<!DOCTYPE html>
<html> 
<head><title>Daanvir - The brave steps that lead the nation</title><meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no\"><link rel=\"stylesheet\" href=\"../../../normalize.css\"><script src='../../../js/jquery.min.js'></script><link rel=\"shortcut icon\" href=\"../../../images/favicon.png\" type=\"image/x-icon\"><link rel=\"stylesheet\" href=\"../../../css/orton.css\"><meta property=\"og:url\"           content=\"http://daanvir.org/main/Traversal/Articles/".$stn."/".$locn.$hitId.".php\" />
	<meta property=\"og:type\"          content=\"website\" />
	<meta property=\"og:title\"         content=\"Daanvir | ".$tag." ".$location."\" />
	<meta property=\"og:description\"   content=\"".$head."\" />
	<meta property=\"og:image\"         content=\"http://daanvir.org/".$img."\" />
</head>
<body>
<div id=\"fb-root\"></div>
<script>

 $(function(){
 window.fbAsyncInit = function() {
            FB.init({
              appId      : '1807657979451474',
              xfbml      : true, cookie: true,status: true,
              version    : 'v2.2'
            });
        };

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = \"//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

});

</script>

<div id=\"hitlist_expand\">
	<article id=\"hitlist_article\">
		<div id=\"hitlist_image_logo\"> 
		<header id=\"logo_header\">
		<h1 id=\"H1_2\">
			Daanvir <span id=\"SPAN_3\">India</span>
		</h1>
		<h2 id=\"H2_4\">
			The brave steps that lead the nation
		</h2> 
		</header>  
		<div id=\"gsearch\" >
		<script>
  (function() {
    var cx = '013490155159788345548:dbstv5pgcaw';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>
</div>
		</div>
		<div id=\"hitlist_image_cover\">
			  <img src=\"".$img."\" alt=\"Loading Image..\" id=\"hitlist_image\" class=\"image1\"/> 
		</div>
		<header id=\"hitlist_header\">
			<div id=\"hitlist_id\">
				 <a href=\"\" id=\"hitlist_id_a\">".$stn." - ".$arn." - ".$locn."</a>
			</div> 
			<div id=\"hitlist_id\">
				 <a href=\"\" id=\"hitlist_id_a\" class=\"hit_location\">".$location."</a>
			</div> 
				<div style=\"background-color: #4267b2;
    border-color: #4267b2;\" id=\"hitlist_id\">
				 <a class=\"fbshare1\"  href=\"javascript:fShare();\"  id=\"hitlist_id_a\">
				 Share</a>
				</div>
			<h2 id=\"H2_10\" class=\"hit_tag\">
				".$tag."
			</h2>
		</header>
		<div id=\"hitlist_expand1\">
			<p id=\"hitlist_expand_p\" class=\"hit_head\">
				".$head."
			</p>
		</div>
		<div id=\"hitlist_link_button\">
			 <a href=\"javascript:void(0)\" id=\"hitlist_link\">Our Research</a>
		</div> 
		<div id=\"hitlist_expand1\">
			<p id=\"hitlist_expand_p\" class=\"ext-des\">
				".$desc."
			</p>
		</div>
		<div id=\"hitlist_image_cover\">
			  <img  src=\"".$img2."\" alt=\"Loading Image..\" id=\"hitlist_image\"  class=\"image2\"/> 
		</div> 
		<div id=\"hitlist_expand1\">
			<div id=\"hitlist_expand_p\">
				".$t."
			</div>
			<div id=\"hitlist_expand_p\">
				".$userDet."
			</div>
		</div>
		<header id=\"hitlist_header\">
			
			<h2 id=\"H2_10\" style=\"min-height:44px\">
				Supported:
			</h2>
			<div id=\"Per_DIV_1\">
				<div id=\"Per_DIV_2\" class=\"body-adv-ext-bar-in\" style=\"width:".$bar_."%;color:".$color."\">
					<h2 id=\"Per_H2_3\" class=\"ext-bar\">
						".$bar."%
					</h2>
			</div>
</div>
		</header>
		<div id=\"Recommended_DIV_1\">
	 <div id=\"hitlist_link_button\">
			 <a href=\"javascript:void(0)\" id=\"hitlist_link\">Related</a>
		</div>  
	<div id=\"Recommended_DIV_3\">
	<div id=\"related\">There is no related trend yet.</div>
 
		<div id=\"Recommended_DIV_103\" style=\"margin-top:0px\">
			<div id=\"Recommended_DIV_104\">
			</div>
		</div>
		
		<div id=\"commenting\">  
		<div id=\"hitlist_link_button\">
			 <a href=\"javascript:void(0)\" id=\"hitlist_link\" style=\"margin-top:20px;\">Comment</a>
		</div>
		<div id=\"hitlist_link_button\" class=\"commenting_share\" style=\"margin-left: 215px;
    margin-top: -67px;\">
			 <a class=\"fbshare2\" href=\"javascript:fShare();\"  id=\"hitlist_link\" style=\"margin-top:20px;background-color: #4267b2;
    border-color: #4267b2;\"> 
			 Share</a>
		</div>
		<div id=\"Recommended_DIV_103\" style=\"margin-top:70px\">
			<div id=\"Recommended_DIV_104\">
			</div>
		</div> 
		<div class=\"fb-comments\" style=\"margin:auto\" data-adapt-container-width=\"true\" data-href=\"http://daanvir.org/main/Traversal/Articles/".$stn."/".$locn.$hitId.".php\" data-width=\"100%\" data-numposts=\"5\" data-colorscheme=\"dark\"></div>
		</div> 
	</div>
</div>
	<div id=\"last\"> Please enable cookies and other site data in order to comment. <br> For Chrome: Go to Settings > Show Advanced Settings (at the bottom) > Content Settings
> Uncheck: Block third-party cookies and site data. </div>
	</article>
	<article id=\"hitlist_side\"> 
		<div id=\"hitlist_link_button\" style=\"margin-left:80px;\">
			 <a href=\"javascript:void(0)\" id=\"hitlist_link\">Needs</a>
		</div>
		<ul id=\"need_ul\" class=\"ext-needs\">
		".$data1."
		</ul>
		 
		<div id=\"hitlist_link_button\" style=\"margin-left:80px;margin-top:40px;\">
			 <a href=\"javascript:void(0)\" id=\"hitlist_link\">Supporting</a>
		</div> 
		
		<ul id=\"need_ul\" class=\"ext-supp\">
		".$data2."
		</ul>
		
		<div  id=\"hitlist_link_button\" style=\"margin-left:80px;margin-top:40px;\">
			 <a class=\"fbshare3\" href=\"javascript:fShare();\" id=\"hitlist_link\"  style=\"background-color: #4267b2;
    border-color: #4267b2;\">Share Now!</a>
		</div> 
		<div style=\"visibility:hidden;opacity:0;height:2px;overflow:hidden\" class=\"fb-share-button\" data-href=\"http://daanvir.org/main/Traversal/Articles/".$stn."/".$locn.$hitId.".php\" data-layout=\"button_count\" data-size=\"large\" data-mobile-iframe=\"true\"><a class=\"fb-xfbml-parse-ignore\" target=\"_blank\" id=\"fbshare\" href=\"https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdaanvir.org%2Fmain%2FTraversal%2FArticles%2F".$stn."%2F".$locn.$hitId.".php;src=sdkpreparse\">Share</a></div>
				 
	</article>
</div>
<script language=\"javascript\"> 
	
    var cookieEnabled = navigator.cookieEnabled;
    if (cookieEnabled){ document.getElementById(\"last\").style.display=\"none\";}
function Load(){ 
	var g='i='+".$hitId."+'&id='+2; $.ajax({type:\"POST\",url:\"../../../points/trend.php\",data:g,dataType:\"json\",cache:false,success:function(n){ 
	if(n.a!=null){
		document.getElementsByClassName('ext-des')[0].innerHTML=n.a;
	}
	if(n.b!=null){
		document.getElementsByClassName('ext-needs')[0].innerHTML=n.b;
	}
	if(n.c!=null){
		document.getElementsByClassName('ext-supp')[0].innerHTML=n.c;
	}
	if(n.d!=null){
		document.getElementsByClassName('ext-bar')[0].innerHTML=n.d;
	}
	if(n.e!=null){
		document.getElementsByClassName('body-adv-ext-bar-in')[0].style.width=n.e+'%';
	}
	if(n.f!=null){
		document.getElementsByClassName('body-adv-ext-bar-in')[0].style.background=n.f;
	}
	if(n.g!=null){
		document.getElementsByClassName('image1')[0].src=n.g;
	}
	if(n.h!=null){
		document.getElementsByClassName('image2')[0].src=n.h;
	}
	if(n.i!=null){
		document.getElementsByClassName('hit_head')[0].innerHTML=n.i;
	}
	if(n.j!=null){
		document.getElementsByClassName('hit_tag')[0].innerHTML=n.j;
	}
	if(n.k!=null){
		document.getElementsByClassName('hit_location')[0].innerHTML=n.k;
	}
	if(n.l!=null){
		document.getElementById('related').innerHTML=n.l;
	}
	
},error:function(a,b,c){ 
}

}) 
}
window.addEventListener('load',Load,false);


function fShare() { 
var obj = {method: \"feed\", link: \"http://www.daanvir.org/Traversal/Articles/".$stn."/".$locn.$hitId.".php\", picture: \"http://daanvir.org/main/".$tempImg[0]."\",name: \"Daanvir - ".$tag."\",description: \"".$head.". ".$desc."\"};
function callback(response){}
FB.ui(obj, callback);

}
</script>

<div id=\"Ft_DIV_1\">
	<hr id=\"Ft_HR_2\" />
	<h2 id=\"Ft_H2_3\">
		Facebook / Google / Twitter / Terms of Service
	</h2>
	<h4 id=\"Ft_H4_4\">
		&copy; 2017 - All Rights Reserved
	</h4>
</div>
</body></html>";
	//$locn_=str_replace(" ","%20",$locn);
	$path="../Traversal/Articles/".$stn;
	$fileName=$locn.$hitId.".php";	
	
	if(!is_dir($path)){ 
		mkdir($path,0777,true); 
	}
	
	if(file_exists($path."/".$fileName)){  
	unlink($path."/".$fileName);
	} 
	$file=fopen($path."/".$fileName,"w");		
	fwrite($file,$text);
	fclose($file); 
$op="<div id='op_text' style=\"width:100%;height:100%;
padding:10px;text-align:center;
\"><h3 style=\"font-size:20px;margin:auto;color:green\">Updated successfully!</h3><br>
<input type='button' style='height:40px;padding:10px;width:100px;' value='Close' onclick='window.close();'/>
</div>
";	flush();
	//echo $op;
	ob_end_flush();
	}		
	}
	}else{
$nop="<div id='op_text' style=\"width:100%;height:100%;
padding:10px;text-align:center;
\"><h3 style=\"font-size:20px;margin:auto;color:red\">Please make hit visible first!</h3><br>
<input type='button' style='height:40px;padding:10px;width:100px;' value='Close' onclick='window.close();'/>
</div>
";
	//echo $nop;
	}

}//id=1 ends here
else if($id==2){ 
$hitId = Sanitize($_POST['i']); 
  
if(isset($_POST['type'])){ 
$hitId = substr($hitId,14); 
}
	$check1=mysqli_query($GLOBALS['conn2'],"SELECT * FROM hitlist WHERE hitId='$hitId'");   
	$num1=mysqli_num_rows($check1);   
	$tag='';
	$head='';
	$location='';
	$userDet='';
	if($num1==1){
	
		$result=mysqli_fetch_assoc($check1);  
		$desc=$result['majorhit_desc']; 
		$tempImg=explode(",",$result['img']);
		$img="";  
		$numImg=sizeof($tempImg);
		for($o=0;$o<$numImg;$o++){
		$img.='<div> <img id="codeImage" src="http://daanvir.org/main/'.$tempImg[$o].'"/> </div>';
		}
		$zip1=$result['ZIP1'];
		//$addr = print_addr($zip1);
		//MAP KEY:
		//AIzaSyC8fz_GTPq7uPnoHc6zFmTzNcNRRqKbwO8
		$addr= getMap($zip1);
		$head=$result['tagline'];
		$tag=$result['headline'];
		$localityId=$result['localityId']; 
		$userId=$result['userId']; 
		$location=$result['location']; 
		$need_ids=explode(',',$result['need_ids']); 
	$check2=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE localityId='$localityId'");   
	$num2=mysqli_num_rows($check2); 
	
	if($num2==1){ 
		$res=mysqli_fetch_assoc($check2);  
		$locn=$res['localityName']; 
		$stid=$res['stateId']; 
		$areaid=$res['areaId'];	
	$state=mysqli_query($GLOBALS['conn'],"SELECT * FROM states WHERE stateId='$stid'");  
		$s=mysqli_fetch_assoc($state);
		$stn=$s['stateName'];  
	$area=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE areaId='$areaid'");  
		$a=mysqli_fetch_assoc($area);
		$arn=$a['areaName']; 
		
		$headdsc_=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,state,city FROM users WHERE userId='$userId'"); 
	$ndsc_=mysqli_num_rows($headdsc_); 
	if($ndsc_==1){
	$rdsc_=mysqli_fetch_assoc($headdsc_);  
	$userDet.='- Started By '.$rdsc_['fName'];   
	if($rdsc_['lName']!="")
	$userDet.=' '.$rdsc_['lName'];  
	if($rdsc_['city']!="")
	$userDet.=', '.$rdsc_['city']; 
	if($rdsc_['state']!="")
	$userDet.=', '.$rdsc_['state']; 	
		} 
//
	$data1=null;
	$data2=null;$l=0;
	$r=0;
	$count=0; 
	$qy=0;
	if($locn!=null){   
		$s_curr=sizeof($need_ids);
		$sumt=0;
	$achieved=0;
	for($g=0;$g<$s_curr;$g++){
	$check1=mysqli_query($GLOBALS['conn2'],"SELECT `currentNeedDesc`,`qnty`, `qnty_unit` FROM currentneeds WHERE `includeinhit`=1 AND `currentNeedId`='$need_ids[$g]' AND freeze=0");  
	
	$num1=mysqli_num_rows($check1);  
	if($num1>0){
	$row1=mysqli_fetch_assoc($check1);
		$cnid = $need_ids[$g]; 
		$cndsc=$row1['currentNeedDesc']; 
		$qy=$row1['qnty']; 
		$qu=$row1['qnty_unit'];
		$sumt+=$qy;  
//print needs
$check2=mysqli_query($GLOBALS['conn2'],"SELECT SUM(`currNeedFillNum`) as sum FROM `currfillmethod` WHERE currentNeedId='$need_ids[$g]' AND `confirmed`=1 ORDER BY fillmethodId DESC");  
		$count=mysqli_num_rows($check2); 
		$needqy=0;
		if($count==1){
		$r_count=mysqli_fetch_assoc($check2);
		$needqy=$r_count['sum'];
		$achieved+=$needqy;
		} 
//%age
	
	$l+=$needqy;
	$r+=$qy;
	if($qy!=0)
	$pc_q=round(($needqy/$qy)*100,1);
	$need=$cndsc.'- ('.$pc_q.'% filled)';
	//$need=$cndsc;
	$data1.='<li id="H_LI_19" style="color:#929290;width:90%;font-weight:600; margin-top:100px;">'.$need.'
			</li>';
	
	if($count>0){
	$check22=mysqli_query($GLOBALS['conn2'],"SELECT DISTINCT userId FROM currfillmethod WHERE currentNeedId='$cnid' AND confirmed=1 ORDER BY fillmethodId DESC"); 
	while($kind=mysqli_fetch_assoc($check22)){ 
	$filler=$kind['userId'];  
	$details=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,state FROM users WHERE userId='$filler'"); 
	$details2=mysqli_query($GLOBALS['conn2'],"SELECT dated FROM currfillmethod WHERE currentNeedId='$cnid' AND userId='$filler' ORDER BY dated DESC LIMIT 1");  
	$n=mysqli_num_rows($details);
	$n_=mysqli_num_rows($details2);
	 if($n==1 && $n_==1){
	$rdet=mysqli_fetch_assoc($details); 
	$rdet2=mysqli_fetch_assoc($details2);  
	$name=$rdet['fName'].' '.$rdet['lName'];  
	$state=$rdet['state']; 	 
	$tstamp=$rdet2['dated']; 
	$date = ' - <strong style="font-size:12px">'.timeAgo($tstamp).'</strong>';	 
	if(!empty($state)){
		$state=', '.$state;
	}	
	$person=$name.$state;

	$data2.='<li id="H_LI_20" style="color:#929290;width:90%;font-weight:600;margin-top:100px">'.$person.$date.'</li>';	
//print donators for each need id	 							
								}						
							}
						}	 
				}
	}
$bar=0;
$bar_=0;
if($r!=0)
	$bar=round(($l/$r)*100,1); 
$bcopy=$bar;
if($bar<10){
	$bcopy=10;
} if($r!=0)
	$bar_=floor(($l/$r)*100); 
if($bar_<10){
	$bar_=10;
} 
if($bar>100){
	$bcopy=100;
}
$color="";
if($bar<20){ 
$color="red";
}else if($bar<60){ 
$color="orange";
}else if($bar<100 && $bar>60){ 
$color="green";
} 
$locDet='';
		if($stn!="")
		$locDet.=$stn; 
		if($arn!="")
		$locDet.='- '.$arn; 
		if($locn!="")
		$locDet.='- '.$locn;


//FIND RELATED Here
$relatedData="";
$relLocs=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE stateId='$stid'");  
 $rel=mysqli_num_rows($relLocs); 
 if($rel>0){ 
	while($relrows=mysqli_fetch_assoc($relLocs)){ 
		$lid=$relrows['localityId'];
	$relRetrieve=mysqli_query($GLOBALS['conn2'],"SELECT * FROM hitlist WHERE localityId='$lid'"); 
	
	$numget=mysqli_num_rows($relRetrieve);  
	if($numget>0){
	while($resget=mysqli_fetch_assoc($relRetrieve)){   
		$relhitId=$resget['hitId'];
		$relatedData.=getHIT($relhitId) ;
		}
	}
		
	}
	
	}
 } 
 $func=" 
var obj = {method: `feed`, link: `http://www.daanvir.org`, picture: `http://daanvir.org/main/".$tempImg[0]."`,name: `Daanvir - ".$tag."`,description: `".$head."- ".$desc."`};
function callback(response){}
FB.ui(obj, callback);
";
	$arr =  array("a" => $desc,"b" => $data1,"c" => $data2,"d" => $bar."%","e" => $bar_,"f" => $color,"g" => $img,"i" => $head,"j" => $tag,"k" => $location,"l" =>  $relatedData ,"m" =>  $addr  ,"n" => $locDet ,"o" => $func);
//echo 'TEST';	
//
//..Unexpected string token JSON at line 0 refers to error in php code
$echo= json_encode($arr);
echo $echo ;
	}
	}
	}
?>
 