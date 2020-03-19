<?php  
//load connection //opcache_reset();
require '../db/init.php'; if(isset($_POST['id']))
$str= Sanitize($_POST['id']); else{	echo 'Error: Empty Request Made';	exit();}
if($str==='mem'){
$entryId= Sanitize($_POST['i']); 
	$q=mysqli_query($GLOBALS['conn2'],"SELECT * FROM team_members WHERE entryID= '$entryId'");
	$num=mysqli_num_rows($q); 
	if($num>0){
		while($q_r=mysqli_fetch_assoc($q)){
	$tId=$q_r['member_userId'];  
		$qin=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE userId= '$tId'");	
		$n=mysqli_num_rows($q); 
	if($n>0){ 
		$q_rin=mysqli_fetch_assoc($qin);
		$fN=$q_rin['fName']; 
		$email=$q_rin['email']; 
		$phone=$q_rin['phone'];
		if(strlen($email)>50){
			$email=substr($email,0,50).'...';
		}
		// onclick="advanced(\''.$tId.'\',\'minfo\')"
	echo '<div id="tbox" onclick="javascript:advanced(\''.$email.','.$entryId.'\',\'delms\');"><h3><br><strong>'.$fN.'</strong></h3><p>'.$phone.'</p><p id="sub_p">'.$email.'</p></div>';
			}  
		}  
	}else{
		//echo 'f';
	}
	echo '<div id="tbox_nor" onclick="advanced(\''.$entryId.'\',\'adms\');"><h3>Add<br><strong>+</strong></h3><p>New Member</p></div>';
	echo '<div id="tbox_nordel" onclick="advanced(\''.$entryId.'\',\'delt\');"><h3>Delete<br><strong>-</strong></h3><p>Team</p></div>';
}else if($str==='addt'){
$cf= Sanitize($_POST['cf']); 
if($cf==0){
	echo 'f';	exit(); 
}else{
	$tn_=trim($_POST['tname']);
$tl_=trim($_POST['tlocation']);
$cf= Sanitize($_POST['cf']); 
if($cf==0){
	echo 'f'; 	exit();
}else{
	if((!empty($tn_)) && (!empty($tl_))){ 
$tn= Sanitize($_POST['tname']); 
$tl= Sanitize($_POST['tlocation']); 
$qu=mysqli_query($GLOBALS['conn'],"SELECT localityId FROM localities WHERE localityName='$tl'");
$hw=mysqli_num_rows($qu);
if($hw==1){
	$hwq=mysqli_fetch_assoc($qu);
	$hwl=$hwq['localityId'];
$qc=mysqli_query($GLOBALS['conn2'],"SELECT * FROM teams WHERE teamName='$tn' AND localityId='$hwl'"); 
$numi=mysqli_num_rows($qc); 
	if($numi==0){
$q=mysqli_query($GLOBALS['conn2'],"INSERT INTO teams(teamName,localityId) VALUES('$tn','$hwl')");
$q1=mysqli_query($GLOBALS['conn2'],"SELECT * FROM teams WHERE teamName='$tn' AND localityId='$hwl'"); 
$numin=mysqli_num_rows($q1); 
	if($numin==1){}else{
		echo 'f';	exit();
	} }else{
		echo 'f';	exit();
	}
}else{
	echo 'f';	exit();
}
}else{
	echo 'f';	exit();
}
}
}
}else if($str==='tup'){ 
$tl= Sanitize($_POST['tlocation']);
$tl=strtolower($tl);
$tl=trim($tl);
//The % sign is a SQL wild card character that matches zero or more of any character(s)
$query=mysqli_query($GLOBALS['conn'],"SELECT DISTINCT(localityName) FROM localities WHERE localityName lIKE('".$tl."%') ORDER BY localityName"); 
$num=mysqli_num_rows($query); 
$i=0;
if($num>0){
while($suggest=mysqli_fetch_assoc($query)){
	$st_avail="";
if($suggest['localityName']!=null || $suggest['localityName']!=""){
	$t=$suggest['localityName'];
$state=mysqli_query($GLOBALS['conn'],"SELECT stateId FROM localities WHERE localityName = '$t'");

$n=mysqli_num_rows($state); 
if($n>0){
	$st=mysqli_fetch_assoc($state);
	$sid=$st['stateId'];
	$sn=mysqli_query($GLOBALS['conn'],"SELECT stateName FROM states WHERE stateId = '$sid'");
	$sn_= mysqli_fetch_assoc($sn);
	$st_avail=", ".$sn_['stateName'];
}
}
//Return each localityName separated by a newline.
echo '<div id="search_link" class="confirm00'.$i.'" onclick="javascript:confirmlocsel(\'confirm00'.$i.'\');">'.$suggest['localityName'].$st_avail.'</div>';
	$i++;
	}
}   
}else if($str=='addmb'){
	echo '<input type="text" id="fill_match" class="teamname" placeholder="Name of Team"><input class="locationname" onkeyup="javascript:advanced(null,\'tup\');" type="text" id="fill_match" placeholder="Location of Team"><button id="find_match" onclick="javascript:advanced(null,\'addt\');">Add</button><div id="search_suggest"></div><input type="hidden" class="confirmlocsel" value="0">';
}else if($str==='delt'){ 
$i= Sanitize($_POST['i']); 
$state1=mysqli_query($GLOBALS['conn2'],"SELECT * FROM teams");
$n1=mysqli_num_rows($state1);
$q=mysqli_query($GLOBALS['conn2'],"DELETE FROM teams WHERE entryID = '$i'");
$state2=mysqli_query($GLOBALS['conn2'],"SELECT * FROM teams ");
$n2=mysqli_num_rows($state2);
if($n1-$n2!=1){
	echo 'f';	exit();
}else{ 
	$q=mysqli_query($GLOBALS['conn2'],"DELETE FROM team_members WHERE entryID= '$i'");
}
}else if($str==='adms'){
$i= Sanitize($_POST['i']);
	echo '<input class="memmail" onkeyup="javascript:advanced(null,\'uup\');" type="text" id="fill_match" placeholder="Email"><button id="find_match" onclick="javascript:advanced('.$i.',\'addm\');">Add</button><div id="search_suggest"></div><input type="hidden" class="confirmmsel" value="0">';  
}else if($str==='uup'){ 
//mem email below!!!
$tl= Sanitize($_POST['tlocation']);
$tl=strtolower($tl);
$tl=trim($tl);
//The % sign is a SQL wild card character that matches zero or more of any character(s)
$query=mysqli_query($GLOBALS['conn'],"SELECT fName,email,userId FROM users u WHERE email lIKE('".$tl."%') AND active =1 AND NOT EXISTS (SELECT userId FROM administrator a WHERE u.userId=a.userId) ORDER BY started DESC"); 
$num=mysqli_num_rows($query); 
$i=0;
if($num>0){
while($suggest=mysqli_fetch_assoc($query)){
	$st_avail="";
if($suggest['fName']!=null || $suggest['fName']!=""){ 
	$st_avail=$suggest['fName'].", ";
} 
$em=$suggest['email'];
$uid=$suggest['userId'];
$query1=mysqli_query($GLOBALS['conn2'],"SELECT * FROM team_members WHERE member_userId='$uid'"); 
$num1=mysqli_num_rows($query1);   
if($num>0){
if($num1==0){
//Return each localityName separated by a newline.
echo '<div id="search_link1" class="confirml00'.$i.'" onclick="javascript:confirmmsel(\'confirml00'.$i.'\');">'.$st_avail.$em.'</div>';
	$i++;
		}
	}
	}
	}
}else if($str==='addm'){
$cf= Sanitize($_POST['cf']); 
$i= Sanitize($_POST['i']); 
if($cf==0){
	echo 'f';	exit(); 
}else{
//tlocation is email of user
$tl_=trim($_POST['tlocation']);
if(!empty($tl_)){ 
$tl= trim(Sanitize($_POST['tlocation'])); 
$qu=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE email='$tl'");
$hw=mysqli_num_rows($qu);
if($hw==1){
	$hwq=mysqli_fetch_assoc($qu);
	$hwl=$hwq['userId'];
$qc=mysqli_query($GLOBALS['conn2'],"SELECT * FROM team_members WHERE member_userId='$hwl'");
// AND entryID='$i' 
$numi=mysqli_num_rows($qc); 
	if($numi==0){
$q=mysqli_query($GLOBALS['conn2'],"INSERT INTO team_members(entryID,member_userId) VALUES('$i','$hwl')");
$q1=mysqli_query($GLOBALS['conn2'],"SELECT * FROM team_members WHERE member_userId='$hwl' AND entryID='$i'"); 
$numin=mysqli_num_rows($q1); 
	if($numin==1){
		echo $i;
	}else{
		echo 'f';	exit();
}
}else{
	echo 'f';	exit();
} 
}else{
	echo 'f';	exit();
}
}else{
	echo 'f';	exit();
}
 }
}else if($str==='delm'){ 
$i= Sanitize($_POST['i']); 
$stat=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE email='$i'");
$num=mysqli_num_rows($stat);
if($num==1){
	$stat_=mysqli_fetch_assoc($stat);
	$uId=$stat_['userId']; 
$state1=mysqli_query($GLOBALS['conn2'],"SELECT * FROM team_members");
$n1=mysqli_num_rows($state1);
$e=mysqli_query($GLOBALS['conn2'],"SELECT entryID FROM team_members WHERE member_userId='$uId'");
$e_num=mysqli_num_rows($e); 
//echo "nUm=".$e_num;
if($e_num==1){
	$e_=mysqli_fetch_assoc($e);
	$eId=$e_['entryID'];
$q=mysqli_query($GLOBALS['conn2'],"DELETE FROM team_members WHERE member_userId = '$uId'");
$state2=mysqli_query($GLOBALS['conn2'],"SELECT * FROM team_members");
$n2=mysqli_num_rows($state2);
if(($n1-$n2)!=1){
	$q=mysqli_query($GLOBALS['conn2'],"INSERT INTO team_members(entryID,member_userId) VALUES('$eId','$uId')");
	echo 'f';	exit();
}else{ 
	echo $eId;
}
}else{
	echo 'f';	exit();
}
}else{
	echo 'f';	exit();
}
}else if($str==='delms'){ 
$i= Sanitize($_POST['i']);
$q=mysqli_query($GLOBALS['conn'],"SELECT fName,userId FROM users WHERE email='$i'");
$nq=mysqli_num_rows($q);
if($nq==1){
$q_=mysqli_fetch_assoc($q);
$fname=$q_['fName']; 
$tf=trim($fname);
if(empty($tf)){
	$fName='Member';
}
	echo '<div id="tbox_nordel" onclick="advanced(\''.$i.'\',\'delm\');"><h3>Delete<br><strong>-</strong></h3><p>'.$fname.'</p></div>'; 
}else{
	echo 'f';	exit();
}
}else if($str==='locs'){
//i is areaid
$entryId= Sanitize($_POST['i']); 
$stateId= Sanitize($_POST['j']); 
	$stn="Area";
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE areaId= '$entryId'");
	$num=mysqli_num_rows($q); $whisstn=mysqli_query($GLOBALS['conn'],"SELECT areaName FROM areas WHERE areaId= '$entryId'");
	$numstn=mysqli_num_rows($whisstn); 
	if($numstn==1){
		//stn can be pin
		$q_stn=mysqli_fetch_assoc($whisstn);
		$stn=$q_stn['areaName'];
		if(strlen($stn)>50){
			$$stn=substr($stn,0,50).'...';
		}
	} 
	if($num>0){ 
		while($q_r=mysqli_fetch_assoc($q)){
	$tId=$q_r['localityId']; 
	$tname=$q_r['localityName'];  
		$qin=mysqli_query($GLOBALS['conn2'],"SELECT currentNeedId FROM currentneeds WHERE localityId='$tId' AND freeze=0");	
		$n=mysqli_num_rows($qin); 
		$n1=0;
		if(strlen($tname)>50){
			$tname_=substr($tname,0,50).'...';
		}else{ 
		$tname_=$tname;
		}
	if($n>0){
		$q_rin=mysqli_fetch_assoc($qin);
		$cNid=$q_rin['currentNeedId'];  
		$qin1=mysqli_query($GLOBALS['conn2'],"SELECT processed FROM currfillmethod WHERE currentNeedId='$cNid' AND processed=1");	
		$n1=mysqli_num_rows($qin1); 
		}    
	echo '<div id="tbox" onclick="javascript:advanced(\''.$stateId.','.$tname.','.$entryId.'\',\'delos\');"><h3><br><strong  class="sfonts">'.$tname_.'</strong></h3><p>'.$n1.'</p><p id="sub_p">processed</p></div>';  
		}  
	} 
	echo '<div id="tbox_nor" onclick="advanced(\''.$stateId.','.$entryId.'\',\'adlo\');"><h3>Add<br><strong>+</strong></h3><p>New Locality</p></div>';
	//entryId is stateId
	echo '<div id="tbox_nordel" onclick="advanced(\''.$entryId.'\',\'delar\');"><h3>Delete<br><strong>-</strong></h3><p>'.$stn.'</p></div>';
}else if($str==='locs1'){
//i is areaid
$entryId= Sanitize($_POST['i']); 
$stateId= Sanitize($_POST['j']);
 
	echo '<div style="display:none;" id="avlar1">'.$entryId.'</div>'; 
		echo '<script type="text/javascript">
		function pr_load3(vale){
		var ai = $("#avlar1").text(); 
		advanced(ai,vale);
		return;
		}
		</script>'; 
	$stn="Area";
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE areaId= '$entryId'");
	$num=mysqli_num_rows($q); $whisstn=mysqli_query($GLOBALS['conn'],"SELECT areaName FROM areas WHERE areaId= '$entryId'");
	$numstn=mysqli_num_rows($whisstn); 
	if($numstn==1){
		//stn can be pin
		$q_stn=mysqli_fetch_assoc($whisstn);
		$stn=$q_stn['areaName'];
		if(strlen($stn)>50){
			$stn=substr($stn,0,50).'...';
		}
	} 
	if($num>0){ 
		while($q_r=mysqli_fetch_assoc($q)){
	$tId=$q_r['localityId']; 
	$tname=$q_r['localityName'];  
		$qin=mysqli_query($GLOBALS['conn2'],"SELECT currentNeedId FROM currentneeds WHERE localityId='$tId'  AND freeze=0");	
		$n=mysqli_num_rows($qin); 
		$n1=0;
		if(strlen($tname)>50){
			$tname_=substr($tname,0,50).'...';
		}else{ 
		$tname_=$tname;
		}
	if($n>0){
		$q_rin=mysqli_fetch_assoc($qin);
		$cNid=$q_rin['currentNeedId'];   
	$q1=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE currentNeedId!= 0 AND currentNeedId IN(
	SELECT DISTINCT currentNeedId FROM currentneeds WHERE localityId ='$tId' AND freeze=0 )
	AND currentNeedId IS NOT NULL AND confirmed=1");
	$n1=mysqli_num_rows($q1);
	
/*		$q2=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE customNeedId!= 0  
	AND customNeedId IS NOT NULL AND confirmed=1");
	$n2=mysqli_num_rows($q2);
*/	 
/*		$q3=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE catfilledId!= 0  
	AND catfilledId IS NOT NULL AND confirmed=1");
	$n3=mysqli_num_rows($q3);
*/	 ///////
	 
	$q11=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE currentNeedId!= 0 AND currentNeedId IN(
	SELECT DISTINCT currentNeedId FROM currentneeds WHERE localityId ='$tId' AND freeze=0)
	AND currentNeedId IS NOT NULL AND processed=1");
	$n11=mysqli_num_rows($q11);
	/*
		$q21=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE customNeedId!= 0  
	AND customNeedId IS NOT NULL AND processed=1");
	$n21=mysqli_num_rows($q21);*/
	
	
	/*	$q31=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE catfilledId!= 0  
	AND catfilledId IS NOT NULL AND processed=1");
	$n31=mysqli_num_rows($q31);	*/
	 ///////
		}    	if($n1==0){		$percent=0;	}else	$percent=round(($n11/$n1)*100,2);	echo '<div id="tbox" onclick="advanced('.$tId.',\'selnd\')"><h3><br><strong  class="sfonts">'.$tname_.'</strong></h3><p><br>Filled: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$n1.'<br><br>Processed:'.$n11.'</p><hr><p id="sub_p">'.$percent.'%</p></div>';  	//echo '<div id="tbox" onclick="advanced('.$tId.',\'selnd\')"><h3><br><strong  class="sfonts">'.$tname_.'</strong></h3><p>'.$n1.' / '.($n2+$n3).' = '.$n11.' / '.($n21+$n31).'</p><p id="sub_p">available</p></div>';  
		}  
	} 
	 
}else if($str=='addst'){
	echo '<form id="form_st" style="     padding: 21px;    font-size: 22px;"><h2 style="    margin-bottom: 16px;    background: blueviolet;    color: #fff;    padding: 20px;    font-size: 23px;" id="sel_st_pic">Select Picture:</h2>  		<input id="stateimage" style="     background: blueviolet;    color: #fff;    opacity: 1;    padding: 10px;" type="file" value="Choose Image"/><input id="img_st" type="hidden" value="" readonly="readonly"><input id="img_st_f" type="hidden" value="0" readonly="readonly"></form><input class="statename" onkeyup="javascript:advanced(null,\'stup\');" type="text" id="fill_match" placeholder="Enter State Name"><button id="find_match" onclick="javascript:advanced(null,\'adds\');">Add</button><div id="search_suggest1"></div><input type="hidden" class="confirmstasel" value="0">';
}else if($str==='stup'){ 
$tl= Sanitize($_POST['tlocation']);
$tl=strtolower($tl);
$tl=trim($tl); 
//states and union territories
$a[] = "Andhra Pradesh";
$a[] = "Arunachal Pradesh";
$a[] = "Assam";
$a[] = "Bihar";
$a[] = "Chhattisgarh";
$a[] = "Delhi";
$a[] = "Goa";
$a[] = "Gujarat";
$a[] = "Haryana";
$a[] = "Himachal Pradesh";
$a[] = "Jammu and Kashmir";
$a[] = "Jharkhand";
$a[] = "Karnataka";
$a[] = "Kerala";
$a[] = "Madhya Pradesh";
$a[] = "Maharashtra";
$a[] = "Manipur";
$a[] = "Meghalaya";
$a[] = "Mizoram";
$a[] = "Nagaland";
$a[] = "Odisha";
$a[] = "Punjab";
$a[] = "Rajasthan";
$a[] = "Sikkim";
$a[] = "Tamil Nadu";
$a[] = "Telangana";
$a[] = "Tripura";
$a[] = "Uttar Pradesh";
$a[] = "Uttarakhand";
$a[] = "West Bengal";
$a[] = "Andaman and Nicobar Islands";
$a[] = "Chandigarh";
$a[] = "Dadra and Nagar Haveli";
$a[] = "Daman and Diu";
$a[] = "Lakshadweep";
$a[] = "National Capital Territory of Delhi";
$a[] = "Puducherry";

$hint = "";
//strstr() for case sensitive
// lookup all hints from array if $tl is different from "" 
if ($tl !== ""){
$i=0; 
    $len=strlen($tl);
    foreach($a as $name) {
        if (stristr($tl, substr($name, 0, $len))) { 
$qu=mysqli_query($GLOBALS['conn'],"SELECT stateId FROM states WHERE stateName='$name'");
$n=mysqli_num_rows($qu);
//if($n==0){		
			$name=strtoupper($name);
            $hint = "$name";  
//Return each stateName separated by a newline.
echo '<div id="search_link11" class="confirmst'.$i.'" onclick="javascript:confirmstsel(\'confirmst'.$i.'\');">'.$hint.'</div>';
$i++; 
//}else{} 
        } 
    }
} 
}else if($str==='adds'){
$cf= Sanitize($_POST['cf']); 
if($cf==0){
	echo 'f'; 	exit();
}else{ 	$image = Sanitize($_POST['image']);	$tl_=trim($_POST['tlocation']);
	if(!empty($tl_)){ 
$tl= Sanitize($_POST['tlocation']); 
$qu=mysqli_query($GLOBALS['conn'],"SELECT stateId FROM states WHERE stateName='$tl'");
$hw=mysqli_num_rows($qu);
if($hw==0){  
$q=mysqli_query($GLOBALS['conn'],"INSERT INTO states(stateName,statePic) VALUES('$tl','$image')"); 
$q1=mysqli_query($GLOBALS['conn'],"SELECT stateId FROM states WHERE stateName='$tl'"); 
$numin=mysqli_num_rows($q1); 
	if($numin==1){}else{
		echo 'f';	exit();
	}  
}else if($hw==1){ $r=mysqli_fetch_assoc($qu);$sid=$r['stateId'];$q=mysqli_query($GLOBALS['conn'],"UPDATE states SET statePic='$image' WHERE stateId='$sid'"); echo $image.' updated';
}else{	echo 'f';	exit();}
}else{
	echo 'f';	exit();
	}
 }
}else if($str==='dels'){ 
$i= Sanitize($_POST['i']); 
$state1=mysqli_query($GLOBALS['conn'],"SELECT * FROM states");
$n1=mysqli_num_rows($state1);
$q=mysqli_query($GLOBALS['conn'],"DELETE FROM states WHERE stateId = '$i'");
$state2=mysqli_query($GLOBALS['conn'],"SELECT * FROM states ");
$n2=mysqli_num_rows($state2);
if($n1-$n2!=1){
	echo 'f';	exit();
}else{ 
	$q=mysqli_query($GLOBALS['conn'],"DELETE FROM localities WHERE stateId= '$i'");
}
}else if($str==='adlo'){$i= Sanitize($_POST['i']);
$stId= Sanitize($_POST['j']);
//i is arid
		echo '<form id="form_loc" style="     padding: 21px;    font-size: 22px;"><h2 style="    margin-bottom: 16px;    background: blueviolet;    color: #fff;    padding: 20px;    font-size: 23px;" id="cneedh">Select Picture:</h2> 		<input id="locimage" style="     background: blueviolet;    color: #fff;    opacity: 1;    padding: 10px;" type="file" value="Choose Image"/><h3 style="    margin-bottom: 10px;    background: blueviolet;    color: #fff;    padding: 5px;    font-size: 16px;" id="cneedh">Select Description: </h3> 		<input id="locdesc" style="     background: #fff;    color: #000;outline:0;border:1px solid #5c9;    width: 630px;	    padding: 10px;" type="text" placeholder="Why have you selected this locality?"/><input id="img_loc" type="hidden" value="" readonly="readonly"><input id="img_loc_f" type="hidden" value="0" readonly="readonly"></form><input class="loentry" onkeyup="javascript:advanced(\''.$stId.','.$i.'\',\'loup\');" type="text" id="fill_match" placeholder="Locality Name"><button id="find_match" onclick="javascript:advanced(\''.$stId.','.$i.'\',\'addlo\');">Add</button><div id="search_suggest11"></div><input type="hidden" class="confirmlosel" value="0">';  
}else if($str==='loup'){ 
$tl= Sanitize($_POST['tlocation']);
//additional parameter
$arId= Sanitize($_POST['i']);
$stId= Sanitize($_POST['j']);
$tl=strtolower($tl);
$tl=trim($tl);  
//DELHI DB
$query_=mysqli_query($GLOBALS['conn'],"SELECT stateName FROM states WHERE stateId='$stId'");
$num_q_=mysqli_num_rows($query_);
if($num_q_==1){
$qf_=mysqli_fetch_assoc($query_);
$stn=$qf_['stateName']; 
$stn=strtoupper($stn); 
$query=mysqli_query($GLOBALS['conn'],"SELECT areaName FROM areas WHERE areaId= '$arId' AND stateId='$stId'");
$num_q=mysqli_num_rows($query);
if($num_q==1){
$qf=mysqli_fetch_assoc($query);
$arn=$qf['areaName']; 
$arn_=str_replace(" ","_",strtoupper($arn));
${$arn_}=array();
//echo $stn.','.$arn;
//EVERY SPACE COUNTS!!!
switch($stn){
	case "DELHI":
switch ($arn) { 

	case "NARERLA": 
$NARERLA[]="SECTOR-A6 NARELA";       
$NARERLA[]="VIJAY NAGAR NARELA";
$NARERLA[]="(METRO VIHAR PHASE-I)HOLAMBI KALAN";
$NARERLA[]="(METRO VIHAR PHASE-II)HOLAMBI KALAN";
$NARERLA[]="DESU COLONY NARELA";
$NARERLA[]="GAUTAM COLONY NARELA";
$NARERLA[]="INDRA COLONY";
$NARERLA[]="MATRO VIHAR HOLAMBI KHURD";
$NARERLA[]="METRO VIHAR HOLAMBI KHURD";
$NARERLA[]="NAI BASTI MAMURPUR PANA UDYAN NARELA";
$NARERLA[]="NARELA MANDI";
$NARERLA[]="NEW PUNJABI COLONY NARELA";
$NARERLA[]="PANA MAMURPUR NARELA";
$NARERLA[]="PANA PAPOSIAN NARELA";
$NARERLA[]="PANA UDYAN NARELA";
$NARERLA[]="PREM COLONY";
$NARERLA[]="RAJEEV COLONY NARELA";
$NARERLA[]="RAVIDHASS NAGAR NARELA";
$NARERLA[]="RESETLEMENT GAUTAM COLONY NARELA";
$NARERLA[]="SANJAY COLONY NARELA";
$NARERLA[]="SEC A-5 NARELA";
$NARERLA[]="SEC-27 KHERA KALAN";
$NARERLA[]="SECTOR-A6 NARELA";
$NARERLA[]="SHIVAJI NAGAR NARELA";
$NARERLA[]="SWATANTAR NAGAR";
$NARERLA[]="VILL  LAMPUR";
$NARERLA[]="VILL AKBARPUR MAJRA";
$NARERLA[]="VILL BAKHTAWARPUR";
$NARERLA[]="VILL BAKOULI";
$NARERLA[]="VILL BANKNER";
$NARERLA[]="VILL BHORGARH";
$NARERLA[]="VILL BUDHPUR";
$NARERLA[]="VILL GHOGA";
$NARERLA[]="VILL HAMIDPUR";
$NARERLA[]="VILL HIRANKI";
$NARERLA[]="VILL HIRANKI (KUSHAK)";
$NARERLA[]="VILL HOLAMBI KALAN";
$NARERLA[]="VILL HOLAMBI KHURD";
$NARERLA[]="VILL IRADAT NAGAR (NAYA BANS)";
$NARERLA[]="VILL JHANGOLA";
$NARERLA[]="VILL JINDPUR";
$NARERLA[]="VILL KHAMPUR";
$NARERLA[]="VILL KHERA KALAN";
$NARERLA[]="VILL KHERA KHURD";
$NARERLA[]="VILL KURENI";
$NARERLA[]="VILL KURENI SEC-A-10";
$NARERLA[]="VILL PALLA";
$NARERLA[]="VILL PALLA KULAKPUR";
$NARERLA[]="VILL SANOTH";
$NARERLA[]="VILL SHAHPUR GARHI";
$NARERLA[]="VILL SINGHOLA";
$NARERLA[]="VILL SINGHU";
$NARERLA[]="VILL SUNGERPUR";
$NARERLA[]="VILL TAJPUR KALAN";
$NARERLA[]="VILL TIGIPUR";
$NARERLA[]="VILL TIKRI KHURD";                          
$NARERLA[]="VILLAGE ALIPUR";

	 break;
	 
	case "BURARI":                         
$BURARI[]="JAHANGIRPURI RESTTLEMENTS CLY";
$BURARI[]="NATHUPURA";
$BURARI[]="VILL MUKANDPUR";
$BURARI[]="VILLAGE NANGLI POONA";
$BURARI[]="VILLAGE IBRAHIMPUR";
$BURARI[]="VILLAGE JAGATPUR";
$BURARI[]="VILLAGE KADIPUR";
$BURARI[]="VILLAGE MUKHMELPUR";

	 break;

	case "TIMARPUR": 
$TIMARPUR[]="B D ESTATE";
$TIMARPUR[]="B R HOSPITAL";
$TIMARPUR[]="BHAI PARMANAND COLONY";
$TIMARPUR[]="BHAI PERMANAND COLONY (EAST)";
$TIMARPUR[]="BHAI PERMANAND COLONY (WEST)";
$TIMARPUR[]="DDA FLATS MALL ROAD";
$TIMARPUR[]="DELHI ADMN FLATS TIMARPUR";
$TIMARPUR[]="DELHI UNIVERSITY CHHATRA MARG";
$TIMARPUR[]="DHAKA MCD COLONY";
$TIMARPUR[]="DHAKA VILLAGE";
$TIMARPUR[]="G T B NAGAR";
$TIMARPUR[]="GOPAL PUR VILLAGE";
$TIMARPUR[]="GTB NAGAR";
$TIMARPUR[]="HAKIKAT NAGAR";
$TIMARPUR[]="INDIRA BASTI TIMARPUR";
$TIMARPUR[]="INDRA VIHAR";
$TIMARPUR[]="INDRA VIKAS COLONY";
$TIMARPUR[]="KABIR BASTI";
$TIMARPUR[]="KARORI MAL COLLEGE";
$TIMARPUR[]="LANCERS ROAD";
$TIMARPUR[]="MALKA GANJ";
$TIMARPUR[]="MUKHERJEE NAGAR";
$TIMARPUR[]="MUKHERJEE NAGAR (WEST)";
$TIMARPUR[]="MUNSHI RAM COLONY";
$TIMARPUR[]="NEHRU VIHAR";
$TIMARPUR[]="OLD SUBZI MANDI";
$TIMARPUR[]="PATEL CHEST JHUGGI PARMANAND COLONY";
$TIMARPUR[]="SABZI MANDI";
$TIMARPUR[]="SABZI MANDI GHANTA GHAR";
$TIMARPUR[]="SANJAY BASTI";
$TIMARPUR[]="SANJAY BASTI TIMARPUR";
$TIMARPUR[]="ST STEPHEN'S COLLEGE DELHI UNIVERSITY";
$TIMARPUR[]="SUBZI MANDI";
$TIMARPUR[]="TAGORE PARK";
$TIMARPUR[]="TIMARPUR";
$TIMARPUR[]="TIMARPUR DELHI";
$TIMARPUR[]="UNIVERSITY AREA SHRI RAM INSTITUTE";
$TIMARPUR[]="VIJAY NAGAR";
$TIMARPUR[]="VILLAGE MALIK PUR";
$TIMARPUR[]="WAZIRABAD";
$TIMARPUR[]="WAZIRABAD VILLAGE"; 

	 break;

	case "ADARSH NAGAR": 
$ADARSH_NAGAR[]="DDA FLAT JAHANGIR PURI";
$ADARSH_NAGAR[]="AZADPUR";
$ADARSH_NAGAR[]="GANDHI VIHAR";
$ADARSH_NAGAR[]="GOPAL NAGAR";
$ADARSH_NAGAR[]="INDIRA NAGAR";
$ADARSH_NAGAR[]="JAHANGIR PURI";
$ADARSH_NAGAR[]="KEWAL PARK";
$ADARSH_NAGAR[]="KEWAL PARK EXTENTION";
$ADARSH_NAGAR[]="MAHENDRA PARK";
$ADARSH_NAGAR[]="MAJILIS PARK";
$ADARSH_NAGAR[]="MCD/DJB FLATS MODEL TOWN-III";
$ADARSH_NAGAR[]="MODEL TOWN-II POLICE COLONY";
$ADARSH_NAGAR[]="MODEL TOWN-III MOHAN PARK";
$ADARSH_NAGAR[]="MODEL TOWN-III R-BLOCK";
$ADARSH_NAGAR[]="NIRANKARI CLOLNY";
$ADARSH_NAGAR[]="PANCHVATI";
$ADARSH_NAGAR[]="RAM GARH";
$ADARSH_NAGAR[]="RAMESHWAR NAGAR";
$ADARSH_NAGAR[]="SANJAY ENCLAVE";
$ADARSH_NAGAR[]="SANJAY NAGAR";
$ADARSH_NAGAR[]="SARAI PIPAL THALA";
$ADARSH_NAGAR[]="VILLAGE BHAROLA";
$ADARSH_NAGAR[]="VILLAGE DHIRPUR"; 

	 break;

	case "BADLI": 
$BADLI[]="BADLI VILLAGE";
$BADLI[]="BHALSWA DAIRY";
$BADLI[]="CHANDAN PARK";
$BADLI[]="INDUSTRIAL AREA SAMAY PUR";
$BADLI[]="JAHANGIRPURI RESETTLEMENT COLONY";
$BADLI[]="LIBAS PUR";
$BADLI[]="LIBAS PUR VILL";
$BADLI[]="SAMAY PUR";
$BADLI[]="SIRAS PUR VILL";
$BADLI[]="SIRAS VILL";
$BADLI[]="SWAROOP NAGAR";
$BADLI[]="SWAROOP NAGAR";
$BADLI[]="VILLAGE BHALSWA";
$BADLI[]="VILLAGE SAMAY PUR";
$BADLI[]="VILLAGE SIRAS PUR";
$BADLI[]="YADAV NAGAR"; 

	 break;

	case "RITHALA": 
$RITHALA[]="BUDH VIHAR";
$RITHALA[]="RITHALA VILLAGE";
$RITHALA[]="ROHINI SEC 11";
$RITHALA[]="ROHINI SEC-1";
$RITHALA[]="ROHINI SEC-1 AVANTIKA";
$RITHALA[]="ROHINI SEC-4";
$RITHALA[]="ROHINI SEC-5";
$RITHALA[]="ROHINI SECTOR-16";
$RITHALA[]="SEC-16 ROHINI";
$RITHALA[]="SEC-17 ROHINI";
$RITHALA[]="SECTOR-6 ROHINI";
$RITHALA[]="VIJAY VIHAR"; 

	 break;

	case "BAWANA SC": 
$BAWANA_SC[]="J J COLONY E-BLOCK BAWANA";
$BAWANA_SC[]="J J COLONY F-BLOCK BAWANA";
$BAWANA_SC[]="J J COLONY G AND L-BLOCK BAWANA";
$BAWANA_SC[]="J J COLONY H AND K-BLOCK BAWANA";
$BAWANA_SC[]="J J COLONY A-BLOCK BAWANA";
$BAWANA_SC[]="J J COLONY B-BLOCK BAWANA";
$BAWANA_SC[]="J J COLONY C-BLOCK BAWANA";
$BAWANA_SC[]="J J COLONY D-BLOCK BAWANA";
$BAWANA_SC[]="J J COLONY E-BLOCK BAWANA";
$BAWANA_SC[]="AUCHANDI VILLAGE";
$BAWANA_SC[]="BARWALA VILLAGE";
$BAWANA_SC[]="BEGAM PUR BLOCK-A BEGUM VIHAR";
$BAWANA_SC[]="BEGAM PUR BLOCK-A RAJIV NAGAR EXTN.";
$BAWANA_SC[]="BEGAM PUR BLOCK-ABCD NAVEEN VIHAR";
$BAWANA_SC[]="BEGAM PUR BLOCK-B BEGUM VIHAR & GAON SABHA";
$BAWANA_SC[]="BEGAM PUR BLOCK-B RAJIV NAGAR EXTN.";
$BAWANA_SC[]="BEGAM PUR BLOCK-C & D RAJIV NAGAR EXTN.";
$BAWANA_SC[]="BEGAM PUR BLOCK-C BEGUM VIHAR";
$BAWANA_SC[]="BEGAM PUR BLOCK-D BEGUM VIHAR";
$BAWANA_SC[]="BEGAM PUR BLOCK-E BEGUM VIHAR";
$BAWANA_SC[]="BEGAM PUR BLOCK-EFKSW RAJIV NAGAR EXTN.";
$BAWANA_SC[]="BEGAM PUR BLOCK-EH NAVEEN VIHAR";
$BAWANA_SC[]="BEGAM PUR BLOCK-GH RAJIV NAGAR EXTN.";
$BAWANA_SC[]="BEGAM PUR BLOCK-H NAVEEN VIHAR";
$BAWANA_SC[]="BEGAM PUR BLOCK-I LMN RAJIV NAGAR EXTN.";
$BAWANA_SC[]="BEGAM PUR BLOCK-OQR RAJIV NAGAR EXTN.";
$BAWANA_SC[]="BEGUM PUR NAVEEN VIHAR KATYANI VIHAR RAJNI VIHAR";
$BAWANA_SC[]="BEGUM PUR VILLAGE"; 
$BAWANA_SC[]="DARYAPUR KALAN VILLAGE";
$BAWANA_SC[]="INDRAJ COLONY BAWANA";
$BAWANA_SC[]="ISHWAR COLONY BAWANA";
$BAWANA_SC[]="KHERA GARHI";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-AB";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-C1";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-DF";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-E";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-EG";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-I";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-J";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-J H";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-JO";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-K";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-K2";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-L";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-M";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-N Q";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-O";
$BAWANA_SC[]="KRISHAN VIHAR BLOCK-P";
$BAWANA_SC[]="POOTH KHURD VILLAGE";
$BAWANA_SC[]="PRAHLAD PUR BANGER VILLAGE";
$BAWANA_SC[]="PUNJAB KHOR VILLAGE";
$BAWANA_SC[]="RAJIV NAGAR BLOCK-A";
$BAWANA_SC[]="RAJIV NAGAR BLOCK-B";
$BAWANA_SC[]="RAJIV NAGAR BLOCK-C";
$BAWANA_SC[]="RAJIV NAGAR EXTN.  BEGUM PUR";
$BAWANA_SC[]="RAJIV NAGAR BEGUM PUR BLOCK-D";
$BAWANA_SC[]="RAJIV NAGAR BEGUM PUR BLOCK-E";
$BAWANA_SC[]="RAJIV NAGAR/BEGAM PUR VILLAGE";
$BAWANA_SC[]="ROHINI EXTN BLOCK-B4 SEC-20";
$BAWANA_SC[]="ROHINI EXTN SEC-20";
$BAWANA_SC[]="ROHINI EXTN SEC-20 BLOCK-A";
$BAWANA_SC[]="ROHINI EXTN SEC-20 BLOCK-C2";
$BAWANA_SC[]="ROHINI EXTN SEC-20 J P CAMP";
$BAWANA_SC[]="ROHINI EXTN SEC-21";
$BAWANA_SC[]="ROHINI RESETLEMENT COLONY SECTOR-26";
$BAWANA_SC[]="ROHINI SEC 24"; 
$BAWANA_SC[]="ROHINI SEC 24 BLOCK-A";
$BAWANA_SC[]="ROHINI SEC 24 BLOCK-B";
$BAWANA_SC[]="ROHINI SEC 24 BLOCK-C";
$BAWANA_SC[]="ROHINI SEC 24 BLOCK-D";
$BAWANA_SC[]="ROHINI SEC 24 BLOCK-E";
$BAWANA_SC[]="ROHINI SEC 24 POCKET-17 24";
$BAWANA_SC[]="ROHINI SEC 24 POCKET-222526";
$BAWANA_SC[]="ROHINI SEC 24 POCKET-7";
$BAWANA_SC[]="ROHINI SEC 25";
$BAWANA_SC[]="ROHINI SEC 25 BLOCK-A";
$BAWANA_SC[]="ROHINI SEC 25 BLOCK-B";
$BAWANA_SC[]="ROHINI SEC 25 BLOCK-CDE";
$BAWANA_SC[]="ROHINI SECTOR-22";
$BAWANA_SC[]="ROHINI SECTOR-23";
$BAWANA_SC[]="ROHINI SECTOR-23 POCKET-1 & 2";
$BAWANA_SC[]="ROHINI SECTOR-23 POCKET-3";
$BAWANA_SC[]="ROHINI SECTOR-26";
$BAWANA_SC[]="SAHIBABAD DAIRY";
$BAWANA_SC[]="SAHIBABAD DAIRY BLOCK-ABCE";
$BAWANA_SC[]="SAHIBABAD DAIRY BLOCK-B";
$BAWANA_SC[]="SAHIBABAD DAIRY BLOCK-B T-HUTS";
$BAWANA_SC[]="SAHIBABAD DAIRY BLOCK-C";
$BAWANA_SC[]="SAHIBABAD DAIRY BLOCK-D";
$BAWANA_SC[]="SAHIBABAD DAIRY BLOCK-E";
$BAWANA_SC[]="SAHIBABAD DAULATPUR VILLAGE";
$BAWANA_SC[]="SULTANPUR DABAS VILLAGE";
$BAWANA_SC[]="VIJAY NAGAR COLONY BAWANA";
$BAWANA_SC[]="VILLAGE BAJITPUR THAKARAN";
$BAWANA_SC[]="VILLAGE BAWANA";
$BAWANA_SC[]="VILLAGE BUDHANPUR MAJRA";
$BAWANA_SC[]="VILLAGE CHANDPUR DABAS";
$BAWANA_SC[]="VILLAGE HAREWALI";
$BAWANA_SC[]="VILLAGE JAT KHOR";
$BAWANA_SC[]="VILLAGE KATEWARA";
$BAWANA_SC[]="VILLAGE MUNGESHPUR  VILLAGE";
$BAWANA_SC[]="VILLAGE NANGAL THAKARAN";
$BAWANA_SC[]="VILLAGE POOTH KALAN";
$BAWANA_SC[]="VILLAGE QUTABGARH";
$BAWANA_SC[]="VILLAGE SALAHPUR MAJRA";

	 break;

	case "MUNDKA": 
$MUNDKA[]="AMAR COLONY QUMARUDDIN NAGAR";
$MUNDKA[]="ARVIND ENCLAVE QUMARUDDIN NAGAR";
$MUNDKA[]="BALDEV VIHAR KARAL VILLAGE";
$MUNDKA[]="CHANDAN VIHAR NILOTHI";
$MUNDKA[]="CHANDAN VIHAR NILOTHI EXTN";
$MUNDKA[]="DURGA MANDIR BLOCK TIRTHANKAR NAGAR VILLAGE KARALA";
$MUNDKA[]="GARHI RANDHALA VILLAGE";
$MUNDKA[]="HIRAN KUDNA VILLAGE";
$MUNDKA[]="J J COLONY CAMP NO. 2 NANGLOI";
$MUNDKA[]="J J COLONY NANGLOI";
$MUNDKA[]="J J COLONY NO 2 NANGLOI";
$MUNDKA[]="J J COLONY NO 3 NANGLOI";
$MUNDKA[]="J J COLONY NO 4 NANGLOI";
$MUNDKA[]="J J COLONY SAWDA";
$MUNDKA[]="JAIN STHANAK BLOCK VILLAGE KARALA";
$MUNDKA[]="KANWAR SINGH NAGAR QUMRUDDIN NAGAR";
$MUNDKA[]="KARALA SUKHBIR NAGAR";
$MUNDKA[]="KARALA VILLAGE";
$MUNDKA[]="KUNWAR SINGH NAGAR QUMRUDDIN NAGAR";
$MUNDKA[]="MADANPUR DABAS VILLAGE";
$MUNDKA[]="MAHAVIR VIHAR";
$MUNDKA[]="MOHD PUR MAJRI RAMA VIHAR";
$MUNDKA[]="MOHD PUR MAJRI VILLAGE";
$MUNDKA[]="MOHD PUR MAJRI VILLAGE RAMA VIHAR";
$MUNDKA[]="MUNDKA";
$MUNDKA[]="NANGLOI";
$MUNDKA[]="NANGLOI EXTN-2C";
$MUNDKA[]="NANGLOI EXTN-4 BLOCK A QUMRUDDIN NAGAR";
$MUNDKA[]="NANGLOI JAT";
$MUNDKA[]="NEELWAL";
$MUNDKA[]="NILOTHI";
$MUNDKA[]="NILOTHI EXTN";
$MUNDKA[]="NIZAMPUR RASHIDPUR VILLAGE";
$MUNDKA[]="QUMARUDDIN NAGAR";
$MUNDKA[]="QUMRUDDIN NAGAR";
$MUNDKA[]="RAJDHANI PARK";
$MUNDKA[]="RAJENDRA PARK TYAGI COLONY NANGLOI";
$MUNDKA[]="RAJENDRA PARK VILLAGE NANGLOI";
$MUNDKA[]="RAM NAGAR COLONYVILLAGE QUMARUDDIN NAGAR";
$MUNDKA[]="RAMA VIHAR BLOCK C MOHD PUR MAJRI VILLAGE";
$MUNDKA[]="RAMA VIHAR BLOCK D MOHD PUR MAJRI VILLAGE";
$MUNDKA[]="RAMA VIHAR BLOCK E MOHD PUR MAJRI VILLAGE";
$MUNDKA[]="RAMA VIHAR MOHD PUR MAJRI VILLAGE";
$MUNDKA[]="SHIV MANDIR BLOCK TIRTHANKAR NAGAR";
$MUNDKA[]="SHIV VIHAR KARALA";
$MUNDKA[]="SWARN PARK NANGLOI";
$MUNDKA[]="TIKRI KALAN";
$MUNDKA[]="VIKAS NAGAR NILOTHI";
$MUNDKA[]="VILL GHEVRA";
$MUNDKA[]="VILL RANI KHERA";
$MUNDKA[]="VILL RASUL PUR";
$MUNDKA[]="VILLAGE JAUNTI";
$MUNDKA[]="VILLAGE KANJHAWLA";
$MUNDKA[]="VILLAGE LADPUR";
$MUNDKA[]="VILLAGE NANGLOI";
$MUNDKA[]="VILLAGE TATESAR";
$MUNDKA[]="YADAV PARK VILLAGE QUMARUDDIN NAGAR";

	 break;

	case "KIRARI": 
$KIRARI[]="VILLAGE NITHARI";
$KIRARI[]="KIRARI SULEMAN";
$KIRARI[]="KIRARI SULEMAN NAGAR";
$KIRARI[]="KIRARI SULEMAN VILLA";
$KIRARI[]="MUBARAK PUR DABAS VILLAGE";
$KIRARI[]="MUBARAKPUR ROAD";
$KIRARI[]="VILLAGE NITHARI";


	 break;

	case "SULTANPUR MAJRA": 
$SULTANPUR_MAJRA[]="MANGOLPURI";
$SULTANPUR_MAJRA[]="RAJ PARK";
$SULTANPUR_MAJRA[]="SULTAN PURI";
$SULTANPUR_MAJRA[]="SULTANPURI";


	 break;

	case "NANGLOI JAT": 
$NANGLOI_JAT[]="ADHYAPAK NAGAR";
$NANGLOI_JAT[]="AMAN PURI";
$NANGLOI_JAT[]="AMBIKA ENCLAVE";
$NANGLOI_JAT[]="AMBIKA VIHAR. PASCHIM VIHAR";
$NANGLOI_JAT[]="BHERA ENCLAVE";
$NANGLOI_JAT[]="BHIM NAGAR";
$NANGLOI_JAT[]="BLOCK Y";
$NANGLOI_JAT[]="CHANDAN VIHAR";
$NANGLOI_JAT[]="GURU HAR KISHAN PASCHIM VIHAR";
$NANGLOI_JAT[]="JIWAN NIKETAN PASCHIM VIHAR";
$NANGLOI_JAT[]="JJ COLONY BLOCK X";
$NANGLOI_JAT[]="JJ COLONY-III BLOCK M & N";
$NANGLOI_JAT[]="JWALA PURI";
$NANGLOI_JAT[]="KAVITA COLONY";
$NANGLOI_JAT[]="LAXMI PARK";
$NANGLOI_JAT[]="MEERA BAGH";
$NANGLOI_JAT[]="MIANWALI NAGAR";
$NANGLOI_JAT[]="NANGLOI JAT";
$NANGLOI_JAT[]="NANGLOI VILL";
$NANGLOI_JAT[]="NIHAL VIHAR";
$NANGLOI_JAT[]="PASCHIM VIHAR";
$NANGLOI_JAT[]="PEERA GARHI";
$NANGLOI_JAT[]="PUNJABI BASTI";
$NANGLOI_JAT[]="QAMRUDDIN NAGAR SHIV RAM PARK";
$NANGLOI_JAT[]="SAINI MOHALLA";
$NANGLOI_JAT[]="SANGAM APPT. PASCHIM VIHAR";
$NANGLOI_JAT[]="SHIV PARK VILL. NANGLOI";
$NANGLOI_JAT[]="SHIV RAM PARK";
$NANGLOI_JAT[]="SHIV RAM PARK QAMRUDDIN NAGAR";
$NANGLOI_JAT[]="VANDANA VIHAR";
$NANGLOI_JAT[]="YADAV PARK EXTN"; 

	 break;

	case "MANGOL PURI SC": 
$MANGOL_PURI_SC[]="MANGOLPURI";
$MANGOL_PURI_SC[]="ROHINI";

	 break;

	case "ROHINI": 
$ROHINI[]="BADLI INDUS. AREA";
$ROHINI[]="BADLI INDUS. AREA & SURAJ PARK";
$ROHINI[]="NAHARPUR VILLAGE";
$ROHINI[]="NAHARPUR VILLAGE & ROHINI SEC 7";
$ROHINI[]="PRASHANT VIHAR";
$ROHINI[]="RAJA VIHAR";
$ROHINI[]="ROHINI SEC 13";
$ROHINI[]="ROHINI SEC 14";
$ROHINI[]="ROHINI SEC 15";
$ROHINI[]="ROHINI SEC 7";
$ROHINI[]="ROHINI SEC 8";
$ROHINI[]="ROHINI SEC 9";
$ROHINI[]="ROHINI SEC-15";
$ROHINI[]="ROHINI SEC-9";
$ROHINI[]="ROHINI SECTOR -7";
$ROHINI[]="ROHINI SECTOR-13";
$ROHINI[]="SEC 14 EXTEN. ROHINI";
$ROHINI[]="SECTOR -13 ROHINI";
$ROHINI[]="SECTOR -9 & 13 ROHINI";
$ROHINI[]="SECTOR -9 ROHINI";
$ROHINI[]="SECTOR-18 ROHINI";
$ROHINI[]="SURAJ PARK";
$ROHINI[]="VILLAGE RAJAPUR SEC-9"; 

	 break;

	case "SHALIMAR BAGH": 
$SHALIMAR_BAGH[]="HAIDER PUR VILLAGE";
$SHALIMAR_BAGH[]="PITAMPURA";
$SHALIMAR_BAGH[]="SHALIMAR BAGH";
$SHALIMAR_BAGH[]="SHALIMAR VILLAGE"; 

	 break;

	case "SHAKUR BASTI":
$SHAKUR_BASTI[]="JWALA HERI VILLAGE";
$SHAKUR_BASTI[]="MULTAN NAGAR";
$SHAKUR_BASTI[]="NEW MULTAN NAGAR";
$SHAKUR_BASTI[]="PASCHIM PURI";
$SHAKUR_BASTI[]="PASCHIM VIHAR";
$SHAKUR_BASTI[]="PEERA GARHI CAMP";
$SHAKUR_BASTI[]="PITAMPURA PUBLIC SCHOOL PITAMPURA DELHI";
$SHAKUR_BASTI[]="PITAMPURA SARASWATI VIHAR";
$SHAKUR_BASTI[]="RANI BAGH";
$SHAKUR_BASTI[]="RISHI NAGAR";
$SHAKUR_BASTI[]="SARASWATI VIHAR";
$SHAKUR_BASTI[]="SHAKUR BASTI"; 

	 break;

	case "TRI NAGAR":
$TRI_NAGAR[]="ASHOKA PARK";
$TRI_NAGAR[]="CHANDER NAGAR";
$TRI_NAGAR[]="DEVA RAM PARK";
$TRI_NAGAR[]="DEVA RAM PARKTRI NAGAR";
$TRI_NAGAR[]="GANESH PURA";
$TRI_NAGAR[]="GANESH PURAKANHIYA NAGAR";
$TRI_NAGAR[]="GANESH PURATRI NAGAR";
$TRI_NAGAR[]="GOLDEN PARK";
$TRI_NAGAR[]="HANSA PURI";
$TRI_NAGAR[]="HARSH VIHAR";
$TRI_NAGAR[]="HARYANA POWER STATION COLONY";
$TRI_NAGAR[]="JAI MATA MARKET";
$TRI_NAGAR[]="KANHIYA NAGAR";
$TRI_NAGAR[]="LAWRANCE ROAD";
$TRI_NAGAR[]="LEKHU NAGARTRI NAGAR";
$TRI_NAGAR[]="MAHENDER PARK";
$TRI_NAGAR[]="NARANG COLONY";
$TRI_NAGAR[]="ONKAR NAGAR";
$TRI_NAGAR[]="PITAMPURA";
$TRI_NAGAR[]="RAJA PARK";
$TRI_NAGAR[]="RAJDHANI ENCLAVE";
$TRI_NAGAR[]="RAM PURA";
$TRI_NAGAR[]="RAMPURA";
$TRI_NAGAR[]="SHAKUR PUR";
$TRI_NAGAR[]="SHAKURPUR";
$TRI_NAGAR[]="SHAKURPUR VILLAGE";
$TRI_NAGAR[]="SHANTI NAGAR(GANESH PURA)TRI NAGAR";
$TRI_NAGAR[]="SHANTI NAGARGANESH PURATRI NAGAR";
$TRI_NAGAR[]="SHANTI NAGARTRI NAGAR";
$TRI_NAGAR[]="SRI NAGARSHAKURPUR";
$TRI_NAGAR[]="VISHRAM NAGAR"; 



	 break;

	case "WAZIRPUR":
$WAZIRPUR[]="ASHOK VIHAR PH I";
$WAZIRPUR[]="ASHOK VIHAR PH I& II";
$WAZIRPUR[]="ASHOK VIHAR PH II";
$WAZIRPUR[]="ASHOK VIHAR PH III";
$WAZIRPUR[]="ASHOK VIHAR PH IV";
$WAZIRPUR[]="BHARAT NAGAR";
$WAZIRPUR[]="INDL AREA WAZIRPUR";
$WAZIRPUR[]="KESHAV PURAM";
$WAZIRPUR[]="NIMRI COLONY";
$WAZIRPUR[]="SATYAWATI COLONY";
$WAZIRPUR[]="SAWAN PARK";
$WAZIRPUR[]="SHAKTI NAGAR EXTN";
$WAZIRPUR[]="WAZIR PUR INDL AREA";
$WAZIRPUR[]="WAZIR PURI INDL AREA";
$WAZIRPUR[]="WAZIRPUR INDL AREA";
$WAZIRPUR[]="WAZIRPUR JJ COLONY";
$WAZIRPUR[]="WAZIRPUR VILLAGE";
$WAZIRPUR[]="WAZIRPURI INDL AREA";
$WAZIRPUR[]="WAZUR PUR INDL AREA";
 
	 break;

	case "MODEL TOWN":
$MODEL_TOWN[]="'A' BLOCK 'B' BLOCK MODEL TOWN-I";
$MODEL_TOWN[]="'B' BLOCK MODEL TOWN-III";
$MODEL_TOWN[]="BHAGWAN DASS AHATA DELHI ADMN. FLATS";
$MODEL_TOWN[]="BIRLA MILL QTRS";
$MODEL_TOWN[]="BLOCK 12 ROOP NAGAR";
$MODEL_TOWN[]="BLOCK 34 ROOP NAGAR";
$MODEL_TOWN[]="BLOCK-2 MCD QTRS ROOP NAGAR";
$MODEL_TOWN[]="BLOCK-4568  ROOP NAGAR";
$MODEL_TOWN[]="BLOCK-A KAMLA NAGAR";
$MODEL_TOWN[]="BLOCK-D KAMLA NAGAR";
$MODEL_TOWN[]="BLOCK-E BANGLOW ROAD";
$MODEL_TOWN[]="BLOCK-E KAMLA NAGAR";
$MODEL_TOWN[]="BLOCK-F KAMLA NAGAR";
$MODEL_TOWN[]="BLOCK-G & UB JAWAHAR NAGAR";
$MODEL_TOWN[]="BLOCK-UA JAWAHAR NAGAR";
$MODEL_TOWN[]="BLOCK-UB JAWAHAR NAGAR";
$MODEL_TOWN[]="BLOOK-7 ROOP NAGAR";
$MODEL_TOWN[]="C. C. COLONY";
$MODEL_TOWN[]="C-BLOCK MODEL TOWN-II";
$MODEL_TOWN[]="C-BLOCK MODEL TOWN-III";
$MODEL_TOWN[]="C-BLOCK R P BAGH";
$MODEL_TOWN[]="D & F-BLOCK MODEL TOWN-1/2";
$MODEL_TOWN[]="D T C COLONY";
$MODEL_TOWN[]="DH & G BLOCK MODEL TOWN-III";
$MODEL_TOWN[]="D-BLOCK MODEL TOWN-III";
$MODEL_TOWN[]="D-BLOCK R P BAGH";
$MODEL_TOWN[]="DERAWAL NAGAR";
$MODEL_TOWN[]="DERAWALA NAGAR";
$MODEL_TOWN[]="DERAWALA NAGAR GUJRAWALA TOWN";
$MODEL_TOWN[]="DESU COLONY";
$MODEL_TOWN[]="'F' BLOCK MODEL TOWN-II";
$MODEL_TOWN[]="GHANTA GHAR";
$MODEL_TOWN[]="GT KARNAL ROAD";
$MODEL_TOWN[]="GUJRANWALA TOWN-1";
$MODEL_TOWN[]="GUJRAWALA TOWN BIJLI APARTMENT";
$MODEL_TOWN[]="GUJRAWALAN TOWN";
$MODEL_TOWN[]="GULABI BAGH";
$MODEL_TOWN[]="GUR MANDI";
$MODEL_TOWN[]="ISHWAR COLONY NEW GUPTA COLONY";
$MODEL_TOWN[]="JAIN COLONY R P BAGH";
$MODEL_TOWN[]="JAWAHAR NAGAR NEW CHANDRAWAL";
$MODEL_TOWN[]="K & D-BLOCK MODEL TOWN-III";
$MODEL_TOWN[]="K BLOCK MODEL TOWN-II";
$MODEL_TOWN[]="KABIR NAGAR R P BAGH";
$MODEL_TOWN[]="KALYAN VIHAR";
$MODEL_TOWN[]="KAMLA NAGAR  KOHLAPUR RD CHANDRAWAL";
$MODEL_TOWN[]="KAUSHALPURI AZADPUR";
$MODEL_TOWN[]="KAUSHALPURI LAL BAGH C-BLOCK AZADPUR";
$MODEL_TOWN[]="KAUSHALPURI LAL BAGH T-HUTS AZADPUR";
$MODEL_TOWN[]="KHILONA BAGH GURDWARA NANAK PIO";
$MODEL_TOWN[]="LAL BAGH AZAD PUR";
$MODEL_TOWN[]="LAL BAGH MAUZI WALA BAGH AZADPUR";
$MODEL_TOWN[]="LAL BAGH(HUTS)AZADPUR";
$MODEL_TOWN[]="LAL BAGH AZADPUR";
$MODEL_TOWN[]="MAHENDRU ENCLAVE";
$MODEL_TOWN[]="MCD COLONY AZAD PUR";
$MODEL_TOWN[]="MOJIWALA BAGH AZADPUR";
$MODEL_TOWN[]="MUBARAK BAGH BEHIND P.S.MODAL TOWN";
$MODEL_TOWN[]="N-BLOCK LAL BAGH AZAD PUR";
$MODEL_TOWN[]="NEW CHANDRAWAL JAWAHAR NAGAR";
$MODEL_TOWN[]="NEW GUPTA COLONY";
$MODEL_TOWN[]="NEW POLICE LINE KINGSWAY CAMP";
$MODEL_TOWN[]="OLD GUPTA COLONY";
$MODEL_TOWN[]="PREM NAGAR";
$MODEL_TOWN[]="PRIYADARSHNI VIHAR";
$MODEL_TOWN[]="R P BAGH";
$MODEL_TOWN[]="R P BAGH T-HUTS AHATA";
$MODEL_TOWN[]="R P BAGH T-HUTS KABIR NAGAR";
$MODEL_TOWN[]="ROSHANARA ROAD";
$MODEL_TOWN[]="SANGAM PARK";
$MODEL_TOWN[]="SANGAM PARK DHOBI GHAT";
$MODEL_TOWN[]="SANGAM PARK R P BAGH";
$MODEL_TOWN[]="SANGAM PARK R P BAGH";
$MODEL_TOWN[]="SHAKTI NAGAR";
$MODEL_TOWN[]="STATE BANK COLONY";
$MODEL_TOWN[]="T-HUTS VILLAGE RAJPURA GURMANDI DOBLE STORY FL";
$MODEL_TOWN[]="T-HUTSLAL BAGH AZAD PUR";
$MODEL_TOWN[]="TRIPOLIA R P BAGH";
$MODEL_TOWN[]="VILLAGE RAJPURA GURMANDI";
$MODEL_TOWN[]="VILLAGE RAJPURA GURMANDI T-HUTS";
$MODEL_TOWN[]="VILLAGE RAJPURA T-HUTS GURMANDI";
$MODEL_TOWN[]="VILLAGE RAJPURA T-HUTS GURMANDI";
$MODEL_TOWN[]="VILLAGE SINDHORA KALAN";

	 break;

	case "SADAR BAZAR":
$SADAR_BAZAR[]="ANAND PARBAT";                       
$SADAR_BAZAR[]="AZAD MARKET TELIWARA";                       
$SADAR_BAZAR[]="BAHADUR GARH ROAD";
$SADAR_BAZAR[]="BAHADUR GARH ROAD QUTAB ROAD";               
$SADAR_BAZAR[]="BARA HINDU RAO";                        
$SADAR_BAZAR[]="BERI WALA BAGH";
$SADAR_BAZAR[]="DAYA BAST";                     
$SADAR_BAZAR[]="DAYA BASTI RAILWAY COLONY"; 
$SADAR_BAZAR[]="DEPUTY GANJ";          
$SADAR_BAZAR[]="GULABI BAGH";                        
$SADAR_BAZAR[]="INDER LOK";                        
$SADAR_BAZAR[]="KISHAN GANJ";                          
$SADAR_BAZAR[]="KISHAN GANJ AMBA BAGH PADAM NAGAR";
$SADAR_BAZAR[]="KISHAN GANJ BAGH KARE KHAN";
$SADAR_BAZAR[]="KISHAN GANJ CHANDER SHEKHAR AZAD COLONY";
$SADAR_BAZAR[]="KISHAN GANJ PADAM NAGAR";
$SADAR_BAZAR[]="KISHAN GANJ RLWY COLONY";
$SADAR_BAZAR[]="KISHAN GANJ SWAMI DAYANAND COLONY";
$SADAR_BAZAR[]="KISHAN GANJBALJEET NAGAR";
$SADAR_BAZAR[]="PAHARI DHIRAJ";
$SADAR_BAZAR[]="PAHARI DHIRAJ DEPUTY GANJ";
$SADAR_BAZAR[]="PAHARI DHIRAJ GALI AHIRAN";
$SADAR_BAZAR[]="PRATAP NAGAR";
$SADAR_BAZAR[]="PULBANGANSH RAM BAGH ROAD";
$SADAR_BAZAR[]="RAM BAGH ROAD";
$SADAR_BAZAR[]="ROSHAN ARA ROAD";
$SADAR_BAZAR[]="ROSHNARA ROAD";
$SADAR_BAZAR[]="ROSHNARA ROADSUBZI MANDI";
$SADAR_BAZAR[]="SADAR BAZAR";
$SADAR_BAZAR[]="SADAR BAZAR BAHADUR GARH ROAD";
$SADAR_BAZAR[]="SADAR BAZAR FAIZ GANJ";
$SADAR_BAZAR[]="SADAR BAZAR GALI AHIRAN";
$SADAR_BAZAR[]="SADAR NALA ROAD BARA TOOTI";
$SADAR_BAZAR[]="SARAI ROHILLA";
$SADAR_BAZAR[]="SARAI ROHILLA EST MOTI BAGH";
$SADAR_BAZAR[]="SARAI ROHILLA VIVEKA NANDPURI";
$SADAR_BAZAR[]="SARAI ROHILLA WEST MOTI BAGH";
$SADAR_BAZAR[]="SHASTRI NAGAR";
$SADAR_BAZAR[]="SUBHADRA COLONY";
$SADAR_BAZAR[]="SUBZI MANDI";
$SADAR_BAZAR[]="SUBZI MANDI AZAD MARKET";
$SADAR_BAZAR[]="TELIWARA";
$SADAR_BAZAR[]="TELIWARA PUL MITHAI";
$SADAR_BAZAR[]="TELIWARA PARTAP MARKET";
$SADAR_BAZAR[]="TELIWARA SHEESH MAHAL";
$SADAR_BAZAR[]="TELIWARI KISHAN GANJ ";
$SADAR_BAZAR[]="TOKRI WALAN AZAD MARKET";
$SADAR_BAZAR[]="TULSI NAGAR";
$SADAR_BAZAR[]="VASU DEV NAGAR PRATAP NAGAR";         

	 break;

	case "CHANDNI CHOWK":
$CHANDNI_CHOWK[]="KHARI BAOLI";
$CHANDNI_CHOWK[]="ALIPUR ROAD";
$CHANDNI_CHOWK[]="ARUNA NAGAR";
$CHANDNI_CHOWK[]="BELA ROAD";
$CHANDNI_CHOWK[]="BHAGIRATH PALACE";
$CHANDNI_CHOWK[]="BOULWARD ROAD";
$CHANDNI_CHOWK[]="CHAHAL PURI";
$CHANDNI_CHOWK[]="CHANDGI RAM AKHARA";
$CHANDNI_CHOWK[]="CHANDRAWAL ROAD";
$CHANDNI_CHOWK[]="CHIRA KHANA";
$CHANDNI_CHOWK[]="DARIBA KALAN";
$CHANDNI_CHOWK[]="DARYA GANJ";
$CHANDNI_CHOWK[]="DHARAM PURA";
$CHANDNI_CHOWK[]="FAIZ BAZAR";
$CHANDNI_CHOWK[]="FATEH PURI";
$CHANDNI_CHOWK[]="H.C. SEN MARG";
$CHANDNI_CHOWK[]="JAMA MASJID";
$CHANDNI_CHOWK[]="KASHMERE GATE";
$CHANDNI_CHOWK[]="KATRA NEEL CHANDNI CHOWK";
$CHANDNI_CHOWK[]="KHYBER PASS";
$CHANDNI_CHOWK[]="KINARI BAZAR";
$CHANDNI_CHOWK[]="KUCHA CHELAN";
$CHANDNI_CHOWK[]="KUCHA MAUTHER KHAN";
$CHANDNI_CHOWK[]="LAL QUILA YAMUNA BRIDGE";
$CHANDNI_CHOWK[]="MADARSHA ROAD";
$CHANDNI_CHOWK[]="MALIWARA";
$CHANDNI_CHOWK[]="MATIA MAHAL";
$CHANDNI_CHOWK[]="MORI GATE";
$CHANDNI_CHOWK[]="MOTIA BAGH";
$CHANDNI_CHOWK[]="NAI BASTI NAYA BAZAR";
$CHANDNI_CHOWK[]="NAI SARAK";
$CHANDNI_CHOWK[]="NAWAB GANJ";
$CHANDNI_CHOWK[]="NAYA BAZAR";
$CHANDNI_CHOWK[]="NICLSON ROAD";
$CHANDNI_CHOWK[]="OLD CHANDRAWAL";
$CHANDNI_CHOWK[]="PHATAK RANG MAHAL";
$CHANDNI_CHOWK[]="PULL  MITHAI";
$CHANDNI_CHOWK[]="RAJNIWAS MARG";
$CHANDNI_CHOWK[]="RAJPUR ROAD";
$CHANDNI_CHOWK[]="RAM KISHOR ROAD";
$CHANDNI_CHOWK[]="S P MUKHERJEE MARG";
$CHANDNI_CHOWK[]="SARAI PHOOSE";
$CHANDNI_CHOWK[]="TIS HAZARI";
$CHANDNI_CHOWK[]="UNDER HILL  ROAD";
$CHANDNI_CHOWK[]="VAID WARA";
$CHANDNI_CHOWK[]="YAMUNA BAZAR";

	 break;

	case "MATIA MAHAL": 
$MATIA_MAHAL[]="AJMERI GATE";
$MATIA_MAHAL[]="ASAF ALI ROAD";
$MATIA_MAHAL[]="CHANDNI MAHAL";
$MATIA_MAHAL[]="CHATTA LAL MIAN";
$MATIA_MAHAL[]="CHAWRI BAZAR";
$MATIA_MAHAL[]="CHHATTA LAL MIAN";
$MATIA_MAHAL[]="CHITLI QABAR";
$MATIA_MAHAL[]="CHURIWALAN";
$MATIA_MAHAL[]="DDU MARG";
$MATIA_MAHAL[]="DELHI GATE";
$MATIA_MAHAL[]="G B PANT COMPLEX";
$MATIA_MAHAL[]="GANJ MIR KHAN";
$MATIA_MAHAL[]="HAUZ QAZI";
$MATIA_MAHAL[]="JAMA MASJID";
$MATIA_MAHAL[]="LAL KUAN";
$MATIA_MAHAL[]="M A M C";
$MATIA_MAHAL[]="MAHARAJA RANJIT SINGH MARG";
$MATIA_MAHAL[]="MAMC COMPLEX";
$MATIA_MAHAL[]="MATA SUNDRI ROAD";
$MATIA_MAHAL[]="MATIA MAHAL";
$MATIA_MAHAL[]="MINTO ROAD";
$MATIA_MAHAL[]="MIRDARD ROAD";
$MATIA_MAHAL[]="PAHARI BHOJLA";
$MATIA_MAHAL[]="RAKAB GANJ";
$MATIA_MAHAL[]="RAUSE AVENUE";
$MATIA_MAHAL[]="SITA RAM BAZAR";
$MATIA_MAHAL[]="SUIWALAN";
$MATIA_MAHAL[]="TAGORE ROAD";
$MATIA_MAHAL[]="THOMSON ROAD";
$MATIA_MAHAL[]="TIRAHA BEHRAM KHAN";
$MATIA_MAHAL[]="TURKMAN GATE";

	 break;

	case "BALLIMARAN":
$BALLIMARAN[]="AHATA KALE SAHIB";
$BALLIMARAN[]="AHATA KIDARA";
$BALLIMARAN[]="AHATA KIDARA DOUBLE STOREY QRS.";
$BALLIMARAN[]="AHATA KIDARA SADARNALA ROAD";
$BALLIMARAN[]="AHATAKALE SAHIB";
$BALLIMARAN[]="AMARPURI";
$BALLIMARAN[]="AMARPURI NABI KARIM";
$BALLIMARAN[]="BAGICHI ALLAUDDIN";
$BALLIMARAN[]="BAGICHI RAGHUNATH";
$BALLIMARAN[]="BAGICHI RAGHUNATH BASTI JULAHAN";
$BALLIMARAN[]="BARA DARI SHER AFGAN";
$BALLIMARAN[]="BARA HINDU RAO";
$BALLIMARAN[]="BARADARI SHER AFGAN";
$BALLIMARAN[]="BASTI BAGRIAN";
$BALLIMARAN[]="BASTI HARPHOOL SINGH";
$BALLIMARAN[]="BASTI JULAHAN";
$BALLIMARAN[]="BAZAR BALLI MARAN";
$BALLIMARAN[]="BAZAR CHANDNI CHOWK";
$BALLIMARAN[]="BAZAR LAL KUAN";
$BALLIMARAN[]="BAZAR LAL KUAN (NAYABANS)";
$BALLIMARAN[]="BAZAR LAL KUAN AHATA KALE SAHIB";
$BALLIMARAN[]="BAZAR LAL KUAN NAYA BANS FARASH KHANA";
$BALLIMARAN[]="CHAMELIAN ROAD";
$BALLIMARAN[]="CHAMELIAN ROAD AHATA KIDARA";
$BALLIMARAN[]="CHAWRI BAZAR NAI SARAK";
$BALLIMARAN[]="CHINYOT BASTI";
$BALLIMARAN[]="DHARAM PURA";
$BALLIMARAN[]="FAIZAL ROAD";
$BALLIMARAN[]="FARASH KHANA";
$BALLIMARAN[]="GALI SHYAMJI";
$BALLIMARAN[]="HAVELI HISSAMUDDIN HAIDER";
$BALLIMARAN[]="HOSHIAR SINGH MARG";
$BALLIMARAN[]="IDGAH ROAD";
$BALLIMARAN[]="IDGHA ROAD";
$BALLIMARAN[]="JHANDEWALAN ROAD";
$BALLIMARAN[]="JOGIWARA";
$BALLIMARAN[]="KHARI BAOLI";
$BALLIMARAN[]="KRISHNA BASTI";
$BALLIMARAN[]="KRISHNA BASTI AMARPURI";
$BALLIMARAN[]="KUCHA REHMAN";
$BALLIMARAN[]="KUCHA REHMAN CHANDNI CHOWK";
$BALLIMARAN[]="KUCHA REHMAN NAI SARAK";
$BALLIMARAN[]="KUNCHA PANDIT";
$BALLIMARAN[]="LAXMAN PURA";
$BALLIMARAN[]="MM ROAD";
$BALLIMARAN[]="MOHALLA CHARAN DASS";
$BALLIMARAN[]="MOHALLA CHARAN DASS GALI LOHE WALI";
$BALLIMARAN[]="MOHALLA NIYARIYAN";
$BALLIMARAN[]="MOHALLA SIKRIGRAN";
$BALLIMARAN[]="MOHALLA YOGMAYA BAGICHI ALLAUDDIN";
$BALLIMARAN[]="MOTIA KHAN";
$BALLIMARAN[]="MOTIA KHAN AKHARA JAIN MANDIRIDGAH ROAD";
$BALLIMARAN[]="MULTANI DHANDA PAHAR GANJ";
$BALLIMARAN[]="NABI KARIM";
$BALLIMARAN[]="NABI KARIM QUTAB ROAD";
$BALLIMARAN[]="NAI SARAK";
$BALLIMARAN[]="NAI WARA";
$BALLIMARAN[]="NAYA BANS";
$BALLIMARAN[]="PAHARI DHIRAJ RANI JHANSI ROAD";
$BALLIMARAN[]="PAHARIDHIRAJ";
$BALLIMARAN[]="PREM NAGAR";
$BALLIMARAN[]="QASAB PURA";
$BALLIMARAN[]="QASAB PURA SADAR NALA ROAD";
$BALLIMARAN[]="QASABPURA  CHAMELIAN RD";
$BALLIMARAN[]="QUTAB MARG NABI KARIM";
$BALLIMARAN[]="QUTAB MARG NABI KARIMHANUMAN MANDIRBALLAH";
$BALLIMARAN[]="QUTAB ROAD";
$BALLIMARAN[]="RAILWAY AREA RAM NAGAR";
$BALLIMARAN[]="RAM NAGAR  QUTAB ROAD";
$BALLIMARAN[]="RAM NAGAR AARAKASHAN ROAD";
$BALLIMARAN[]="RANI JHANSI ROAD";
$BALLIMARAN[]="RODGRAN";
$BALLIMARAN[]="SADAR BAZAR";
$BALLIMARAN[]="SADAR NALA ROAD";
$BALLIMARAN[]="SADAR NALA ROAD GALI KHIRKI SARAI KHALIL";
$BALLIMARAN[]="SADAR NALA ROAD GALI NO.11";
$BALLIMARAN[]="SADAR NALA ROAD GHASMANDI";
$BALLIMARAN[]="SADAR NALA ROAD QUTAB ROAD";
$BALLIMARAN[]="SADAR THANA ROAD";
$BALLIMARAN[]="SARAI KHALIL KUCHA LALLU MISSAR";
$BALLIMARAN[]="SARDHA NAND MKT.";
$BALLIMARAN[]="SHANKAR MARG";
$BALLIMARAN[]="SHANKAR MARG NABI KARIM";
$BALLIMARAN[]="TEL MILL MARG"; 

	 break;

	case "KAROL BAGH SC":
$KAROL_BAGH_SC[]="RAMESHWARI NEHRU NAGAR";
$KAROL_BAGH_SC[]="AHATA THAKAR DASS NEAR SARAI ROHILLA RLWY STATION";
$KAROL_BAGH_SC[]="AMBEDKAR BHAWAN";
$KAROL_BAGH_SC[]="ARAM BAGH";
$KAROL_BAGH_SC[]="ARYA NAGAR";
$KAROL_BAGH_SC[]="BAGH RAOJI";
$KAROL_BAGH_SC[]="BAPA NAGAR";
$KAROL_BAGH_SC[]="BEADON PURA";
$KAROL_BAGH_SC[]="CHANDIWALAN";
$KAROL_BAGH_SC[]="CHUNA MANDI";
$KAROL_BAGH_SC[]="DB GUPTA ROAD";
$KAROL_BAGH_SC[]="DEV NAGAR";
$KAROL_BAGH_SC[]="DORIWALAN";
$KAROL_BAGH_SC[]="FAIZ ROAD";
$KAROL_BAGH_SC[]="GAUSHALA BARADARI";
$KAROL_BAGH_SC[]="GAUSHALA MARG";
$KAROL_BAGH_SC[]="JHANDEWALAN";
$KAROL_BAGH_SC[]="JOSHI ROAD";
$KAROL_BAGH_SC[]="KASERUWALAN";
$KAROL_BAGH_SC[]="KATRA GANGA BISHAN";
$KAROL_BAGH_SC[]="KISHAN GANJ";
$KAROL_BAGH_SC[]="KISHAN GANJ RAILWAY AREA";
$KAROL_BAGH_SC[]="LADDU GHATI";
$KAROL_BAGH_SC[]="MAIN BAZAR PAHAR GANJ";
$KAROL_BAGH_SC[]="MANAK PURA";
$KAROL_BAGH_SC[]="MANTOLA";
$KAROL_BAGH_SC[]="MOHALLA BHAGRAOJI";
$KAROL_BAGH_SC[]="MOTIA KHAN";
$KAROL_BAGH_SC[]="MULTANI DHANDA";
$KAROL_BAGH_SC[]="NAIWALA";
$KAROL_BAGH_SC[]="NAIWALA KAROL BAGH";
$KAROL_BAGH_SC[]="NEW ROHTAK ROAD";
$KAROL_BAGH_SC[]="RAIGAR PURA";
$KAROL_BAGH_SC[]="RAILWAY COLONY BASANT ROAD";
$KAROL_BAGH_SC[]="RAMJAS ROAD";
$KAROL_BAGH_SC[]="REGAR PURA";
$KAROL_BAGH_SC[]="SHIDHI PURA";
$KAROL_BAGH_SC[]="SHORA KOTHI";
$KAROL_BAGH_SC[]="SIDHIPURA";
$KAROL_BAGH_SC[]="TIBBIA COLLEGE";

	 break;

	case "PATEL NAGAR":
$PATEL_NAGAR[]="ANAND PARBAT THAN SINGH NAGAR";
$PATEL_NAGAR[]="BALJEET NAGAR";
$PATEL_NAGAR[]="DMS PATEL NAGAR";
$PATEL_NAGAR[]="DTC COLONY PATEL NAGAR";
$PATEL_NAGAR[]="EAST PATEL NAGAR";
$PATEL_NAGAR[]="MC PRY SCHOOL MOLAR BASTI";
$PATEL_NAGAR[]="NEHRU NAGAR";
$PATEL_NAGAR[]="NEW RANJIT NAGAR";
$PATEL_NAGAR[]="NEW RANJIT NAGAR (DDA FLATS)";
$PATEL_NAGAR[]="OLD RANJIT NAGAR";
$PATEL_NAGAR[]="PARSAD NAGAR";
$PATEL_NAGAR[]="PATEL NAGAR";
$PATEL_NAGAR[]="PREM NAGAR";
$PATEL_NAGAR[]="RANJEET NAGAR";
$PATEL_NAGAR[]="SHADI KHAM PUR";
$PATEL_NAGAR[]="SHADI KHAMPUR";
$PATEL_NAGAR[]="SHADI PUR MOLAR BASTI";
$PATEL_NAGAR[]="SHADIPUR MOLAR BASTI";
$PATEL_NAGAR[]="SOUTH PATEL NAGAR";
$PATEL_NAGAR[]="WEST PATEL NAGAR";

	 break;

	case "MOTI NAGAR":
$MOTI_NAGAR[]="ASHOKA PARK EAST PUNJABI BAGH";
$MOTI_NAGAR[]="BHAGWAN DASS NAGAR";
$MOTI_NAGAR[]="EAST PUNJABI BAGH";
$MOTI_NAGAR[]="EAST PUNJABI BAGH";
$MOTI_NAGAR[]="JAIDEV PARK BHAGWAN DASS NAGAR EXTN.";
$MOTI_NAGAR[]="KARAMPURA";
$MOTI_NAGAR[]="KIRTI NAGAR";
$MOTI_NAGAR[]="KIRTI NAGAR (JAWAHAR CAMP)";
$MOTI_NAGAR[]="KIRTI NAGAR HARIJAN CAMP";
$MOTI_NAGAR[]="KIRTI NAGAR CHUNA BHATTI INDL. AREA";
$MOTI_NAGAR[]="KIRTI NAGAR INDL. AREA";
$MOTI_NAGAR[]="KIRTI NAGAR INDL. AREA (KAMLA NEHRU CAMP";
$MOTI_NAGAR[]="KIRTI NAGAR TIMBER MARKET";
$MOTI_NAGAR[]="MADAN PARK";
$MOTI_NAGAR[]="MANOHAR PARK EAST PUNJABI BAGH";
$MOTI_NAGAR[]="MANSAROVER GARDEN";
$MOTI_NAGAR[]="MOTI NAGAR";
$MOTI_NAGAR[]="NAJAFGARH ROAD FACTORIES";
$MOTI_NAGAR[]="NEW MOTI NAGAR";
$MOTI_NAGAR[]="NEW MOTI NAGAR H-IL COLONY GURUNANAK COLONY";
$MOTI_NAGAR[]="NEW MOTI NAGAR KARAM PURA MARKET";
$MOTI_NAGAR[]="NEW MOTI NAGAR FIRE STATION H-IL COLONY";
$MOTI_NAGAR[]="RAILWAY COLONY EAST PUNJABI BAGH";
$MOTI_NAGAR[]="RAJOURI GARDEN";
$MOTI_NAGAR[]="RAJOURI GARDEN BANK ENCLAVE";
$MOTI_NAGAR[]="RAMA ROAD";
$MOTI_NAGAR[]="RAMA ROAD ZAKHIRA";
$MOTI_NAGAR[]="RAMESH NAGAR";
$MOTI_NAGAR[]="RAMESH NAGAR (SHARDAPURI)";
$MOTI_NAGAR[]="SARASWATI GARDEN";
$MOTI_NAGAR[]="SHARDAPURI MANSAROVER GARDEN";
$MOTI_NAGAR[]="SUDERSHAN PARK";
$MOTI_NAGAR[]="T HUTS NEAR SOI STEEL INDUSTRY RAMA ROAD";
$MOTI_NAGAR[]="ZAKHIRA";
$MOTI_NAGAR[]="ZAKHIRA (RAKHI MARKET)";
$MOTI_NAGAR[]="ZAKHIRA AMAR PARK";
$MOTI_NAGAR[]="ZAKHIRA DAYA BASTI RLY STATION";

	 break;

	case "MADIPUR SC":
$MADIPUR_SC[]="BALI NAGAR";
$MADIPUR_SC[]="BASAI DARAPUR";
$MADIPUR_SC[]="MADIPUR";
$MADIPUR_SC[]="MADIPUR COLONY";
$MADIPUR_SC[]="MADIPUR JJ COLONY";
$MADIPUR_SC[]="MADIPUR VILLAGE";
$MADIPUR_SC[]="PASCHIM PURI";
$MADIPUR_SC[]="PUNJABI BAGH";
$MADIPUR_SC[]="PUNJABI BAGH EXTENSION";
$MADIPUR_SC[]="PUNJABI BAGH EXTN";
$MADIPUR_SC[]="RAGHUBIR NAGAR";
$MADIPUR_SC[]="RAJA GARDEN";
$MADIPUR_SC[]="RAJOURI GARDEN EXTN";
$MADIPUR_SC[]="SFS MADIPUR";
$MADIPUR_SC[]="SFS MADIPUR COMMUNITY CENTER";
$MADIPUR_SC[]="TAGORE GARDEN EXT.";
$MADIPUR_SC[]="VISHAL ENCLAVE";

	 break;

	case "RAJOURI GARDEN":
$RAJOURI_GARDEN[]="CHAND NAGAR";
$RAJOURI_GARDEN[]="CHAUKHANDI";
$RAJOURI_GARDEN[]="GANGA RAM VATIKA";
$RAJOURI_GARDEN[]="GURU GOVIND SINGH RAGHUBIR NAGAR";
$RAJOURI_GARDEN[]="HMP RAGHUBIR NAGAR";
$RAJOURI_GARDEN[]="HMP RGB RAGHUBI NAGAR";
$RAJOURI_GARDEN[]="J J COLONY CHAUKHANDI";
$RAJOURI_GARDEN[]="J J COLONY KHYALA";
$RAJOURI_GARDEN[]="KHYALA VILLAGE";
$RAJOURI_GARDEN[]="MUKH RAM GARDEN";
$RAJOURI_GARDEN[]="MUKH RAM GARDEN EXTN";
$RAJOURI_GARDEN[]="MUKHARJI PARK";
$RAJOURI_GARDEN[]="MUKHERJEE PARK EXTN";
$RAJOURI_GARDEN[]="MUKHRA PARK EXTN";
$RAJOURI_GARDEN[]="NARSING GARDEN";
$RAJOURI_GARDEN[]="RAGHUBIR NAGAR";
$RAJOURI_GARDEN[]="RAJOURI GARDEN";
$RAJOURI_GARDEN[]="RAM NAGAR";
$RAJOURI_GARDEN[]="RAVI NAGAR";
$RAJOURI_GARDEN[]="RGB RGA RAGHUBIR NAGAR";
$RAJOURI_GARDEN[]="SANT NAGAR";
$RAJOURI_GARDEN[]="SANT NAGAR EXTN";
$RAJOURI_GARDEN[]="SHAM NAGAR EXTN.";
$RAJOURI_GARDEN[]="SHAYAM NAGAR";
$RAJOURI_GARDEN[]="SHYAM NAGAR";
$RAJOURI_GARDEN[]="SHYAM NAGAR VISHNU GARDEN";
$RAJOURI_GARDEN[]="TAGORE GARDEN";
$RAJOURI_GARDEN[]="TAGORE GARDEN EXTN";
$RAJOURI_GARDEN[]="TC CAMP RAGHUBIR NAGAR";
$RAJOURI_GARDEN[]="TILAK NAGAR";
$RAJOURI_GARDEN[]="TITAR PUR";
$RAJOURI_GARDEN[]="TITAR PUR &TAGORE GARDEN";
$RAJOURI_GARDEN[]="VISHNU GARDEN";

	 break;

	case "HARI NAGAR":
$HARI_NAGAR[]="ASHA PARK";
$HARI_NAGAR[]="FATEH NAGAR";
$HARI_NAGAR[]="GOPAL NAGAR";
$HARI_NAGAR[]="HARI NAGAR";
$HARI_NAGAR[]="HARI NAGAR MAYA PURI";
$HARI_NAGAR[]="HARI NAGAR PRATAP NAGAR";
$HARI_NAGAR[]="JANAK PARK";
$HARI_NAGAR[]="JANAK PURI";
$HARI_NAGAR[]="JANAKPURI";
$HARI_NAGAR[]="LAJWANTI GARDEN";
$HARI_NAGAR[]="MAYA PURI";
$HARI_NAGAR[]="MAYAPURI PH-II KHAZAN BASTI";
$HARI_NAGAR[]="MAYAPURI PH-II KHAZAN BASTI";
$HARI_NAGAR[]="MAYAPURI PH-IIKHAZAN BASTI";
$HARI_NAGAR[]="MAYAPURIPH-II KHAZAN BASTI";
$HARI_NAGAR[]="NANGAL RAYA";
$HARI_NAGAR[]="NANGAL RAYA VILLAGE";
$HARI_NAGAR[]="PARTAP NAGAR";
$HARI_NAGAR[]="SUBHASH NAGAR";
$HARI_NAGAR[]="TIHAR VILLAGE";
$HARI_NAGAR[]="VIKRANT ENCLAVE";

	 break;

	case "TILAK NAGAR":
$TILAK_NAGAR[]="AJAY ENCLAVE ASHOK NAGAR ASHOK NAGAR";
$TILAK_NAGAR[]="ASHOK NAGAR";
$TILAK_NAGAR[]="ASHOK NAGAR DOUBLE & SINGLE QUARTER";
$TILAK_NAGAR[]="GANESH NAGAR";
$TILAK_NAGAR[]="GURU NANAK NAGAR";
$TILAK_NAGAR[]="HARIJAN COLONY DOUBLE STOREY";
$TILAK_NAGAR[]="INDRA CAMP NO4 VIKAS PURI";
$TILAK_NAGAR[]="JANTA FLAT KG-3 VIKAS PURI";
$TILAK_NAGAR[]="JANTA FLATS SITE I & BLOCK A VIKAS PURI";
$TILAK_NAGAR[]="JANTA FLATS SITE-1 VIKAS PURI";
$TILAK_NAGAR[]="KESHOPUR TANK";
$TILAK_NAGAR[]="KESHOPUR VILLAGE";
$TILAK_NAGAR[]="KRISHNA PARK";
$TILAK_NAGAR[]="KRISHNA PARK EXTN";
$TILAK_NAGAR[]="KRISHNA PURI";
$TILAK_NAGAR[]="LIG FLAT KG-2 VIKAS PURI";
$TILAK_NAGAR[]="M.B.S. NAGAR SATN GARH";
$TILAK_NAGAR[]="MEENAKSHI GARDEN TILAK NAGAR POLICE STATION";
$TILAK_NAGAR[]="NEW KRISHNA PARK AND P M SOCIETY FLATS";
$TILAK_NAGAR[]="NEW MAHAVIR NAGAR";
$TILAK_NAGAR[]="NEW MAHAVIR NAGAR DELHI ADM QTR";
$TILAK_NAGAR[]="NEW MAHAVIR NAGAR KRISHNA PARK GALI NO 16171314";
$TILAK_NAGAR[]="NEW MAHAVIR NAGAR L BLOCK GALI NO 2122181920";
$TILAK_NAGAR[]="NEW MAHAVIR NAGAR L-2 BLOCK";
$TILAK_NAGAR[]="NEW SHAHPURA M.B.S. NAGAR";
$TILAK_NAGAR[]="OLD MAHAVIR NAAR S-4";
$TILAK_NAGAR[]="OLD MAHAVIR NAGAR";
$TILAK_NAGAR[]="POLICE COLONY QUARTERS VIKAS PURI";
$TILAK_NAGAR[]="PRITHVI PARK";
$TILAK_NAGAR[]="RAVI NAGAR EXTN";
$TILAK_NAGAR[]="RESETTLEMENT COLONY BLOCK B KHYALA";
$TILAK_NAGAR[]="RESETTLEMENT COLONY KHYALA";
$TILAK_NAGAR[]="SANT GARH";
$TILAK_NAGAR[]="SHANKAR GARDEN A&B BLOCK VIKAS PURI KRISHNA PARK";
$TILAK_NAGAR[]="SHANKAR GARDEN T-HUT VIKAS PURI";
$TILAK_NAGAR[]="TILAK NAGAR";
$TILAK_NAGAR[]="TILAK VIHAR";
$TILAK_NAGAR[]="VIKAS KUNJ  VIKAS PURI";
$TILAK_NAGAR[]="VIKAS KUNJ VIKAS PURI";
$TILAK_NAGAR[]="VIKAS PURI";
$TILAK_NAGAR[]="VIKAS PURI BLOCK A";
$TILAK_NAGAR[]="VIKAS PURI EXT";
$TILAK_NAGAR[]="VISHNU GARDEN";
$TILAK_NAGAR[]="VISHNU GARDEN EXT";

	 break;

	case "JANAK PURI":
$JANAK_PURI[]="CHANAKYA PLACE";
$JANAK_PURI[]="CHANAKYA PLACE PART-I";
$JANAK_PURI[]="CHANAKYA PLACE PART-II";
$JANAK_PURI[]="DAYAL SIR COLONY UTTAM NAGAR";
$JANAK_PURI[]="EAST UTTAM NAGAR";
$JANAK_PURI[]="HARI NAGAR";
$JANAK_PURI[]="INDIRA PARK";
$JANAK_PURI[]="INDIRA PARK EXT & RAM DATT ENCLAVE";
$JANAK_PURI[]="JANAK PURI";
$JANAK_PURI[]="JANAKPURI";
$JANAK_PURI[]="JEEWAN PARK";
$JANAK_PURI[]="MAHAVIR ENCLAVE Par2 & PART-III";
$JANAK_PURI[]="MAHAVIR ENCLAVE PART-2";
$JANAK_PURI[]="MAHAVIR ENCLAVE PART-3";
$JANAK_PURI[]="MAHAVIR ENCLAVE PART-II";
$JANAK_PURI[]="MAHAVIR ENCLAVE PART-III";
$JANAK_PURI[]="MAHINDRA PARK";
$JANAK_PURI[]="OLD SITA PURI";
$JANAK_PURI[]="PREM NAGAR UTTAM NAGAR";
$JANAK_PURI[]="SHIV NAGAR";
$JANAK_PURI[]="SITA PURI";
$JANAK_PURI[]="SITA PURI EXT";
$JANAK_PURI[]="SITA PURI PART-I";
$JANAK_PURI[]="SITA PURI PART-I & HARIJAN BASTI SITA PURI";
$JANAK_PURI[]="SITA PURI PART-II";
$JANAK_PURI[]="TIHAR JAIL";
$JANAK_PURI[]="UTTAM NAGAR";
$JANAK_PURI[]="VARINDER NAGAR";

	 break;

	case "VIKASPURI":	
$VIKASPURI[]="A-1 BLOCK HASTSAL ROAD UTTAM NAGAR";
$VIKASPURI[]="A-1 BLOCK MARKET HASTSAL ROAD UTTAM NAGAR";
$VIKASPURI[]="A-1 BLOCK OM VIHAR PH-V";
$VIKASPURI[]="A-2 & B-2 BLOCK HASTSAL VIHAR";
$VIKASPURI[]="A-2 BLOCK HASTSAL ROAD UTTAM NAGAR";
$VIKASPURI[]="A-BLOCK HASTSAL ROAD UTTAM NAGAR";
$VIKASPURI[]="A-BLOCK HASTSAL VIHAR";
$VIKASPURI[]="A-BLOCK VIKAS NAGAR EXTN.";
$VIKASPURI[]="A-BLOCK J.J.COLONY HASTSAL";
$VIKASPURI[]="A-BLOCK J.J.COLONY SHIV VIHAR";
$VIKASPURI[]="A-BLOCK VIKAS NAGAR";
$VIKASPURI[]="AG-1 VIKAS PURI";
$VIKASPURI[]="AMAR SINGH PARK BAPROLA";
$VIKASPURI[]="AMBEDKAR PLACE BAPROLA";
$VIKASPURI[]="ANAND KUNJ KG-1 VIKAS PURI";
$VIKASPURI[]="ARUNODAYA & MINOCHA APTTS. VIKAS PURI";
$VIKASPURI[]="B & C-BLOCK VIKAS NAGAR EXTN.";
$VIKASPURI[]="BAKARWALA VILLAGE BAKKARWALA";
$VIKASPURI[]="BAPROLA VIHAR BAPROLA";
$VIKASPURI[]="BAPROLA VILLAGE";
$VIKASPURI[]="B-BLOCK HASTSAL VIHAR";
$VIKASPURI[]="B-BLOCK J.J.COLONY HASTSAL";
$VIKASPURI[]="B-BLOCK J.J.COLONY SHIV VIHAR";
$VIKASPURI[]="B-BLOCK VIKAS NAGAR";
$VIKASPURI[]="BLOCK-A VIKAS NAGAR PH-1";
$VIKASPURI[]="BLOCK-B VIKAS NAGAR PH-II & III";
$VIKASPURI[]="BRAHMPURI RANHOLA";
$VIKASPURI[]="CDE & F BLOCK VIKAS NAGAR";
$VIKASPURI[]="C-BLOCK VIKAS PURI";
$VIKASPURI[]="C-BLOCK J.J.COLONY HASTSAL";
$VIKASPURI[]="C-BLOCK J.J.COLONY SHIV VIHAR";
$VIKASPURI[]="CHANCHAL PARK BAKKARWALA";
$VIKASPURI[]="D & E BLOCK VIKAS NAGAR";
$VIKASPURI[]="D-1 BLOCK OM VIHAR PH-V";
$VIKASPURI[]="D-2 BLOCK OM VIHAR PH-V";
$VIKASPURI[]="DALL MILL ROAD UTTAM NAGAR";
$VIKASPURI[]="DASS GARDEN BAPROLA";
$VIKASPURI[]="D-BLOCK HASTSAL VIHAR";
$VIKASPURI[]="D-BLOCK J.J.COLONY SHIV VIHAR";
$VIKASPURI[]="D-BLOCK OM VIHAR PH-V";
$VIKASPURI[]="DEEP ENCLAVE VIKAS NAGAR";
$VIKASPURI[]="DEEP VIHAR VIKAS NAGAR";
$VIKASPURI[]="DEEPAK VIHAR VIKAS NAGAR";
$VIKASPURI[]="DEFENCE ENCLAVE MOHAN GARDEN";
$VIKASPURI[]="DG-1 VIKAS PURI";
$VIKASPURI[]="DG-II VIKAS PURI";
$VIKASPURI[]="DG-III & CHARAK SADAN VIKAS PURI";
$VIKASPURI[]="DG-III VIKAS PURI";
$VIKASPURI[]="E & E1 BLOCK OM VIHAR PH-V";
$VIKASPURI[]="E & G-BLOCK HASTSAL VIHAR";
$VIKASPURI[]="E-BLOCK J.J.COLONY SHIV VIHAR";
$VIKASPURI[]="E-BLOCK OM VIHAR PH-V";
$VIKASPURI[]="E-BLOCK OM VIHAR PH-V & ROOP VIHAR";
$VIKASPURI[]="F-BLOCK HASTSAL VIHAR";
$VIKASPURI[]="F-BLOCK VIKAS PURI";
$VIKASPURI[]="FG-1 AIRPORT OXFORD SR. SEC. SCHOOL APTTS. VIKAS PURI";
$VIKASPURI[]="G-1 BLOCK GOVERDHAN PARK UTTAM NAGAR";
$VIKASPURI[]="GUPTA ENCLAVE VIKAS NAGAR";
$VIKASPURI[]="GURDAYAL VIHAR BAKKARWALA";
$VIKASPURI[]="HASTSAL ROAD UTTAM NAGAR";
$VIKASPURI[]="HASTSAL VILLAGE";
$VIKASPURI[]="HEMANT ENCLAVE & TILAK ENCLAVE MOHAN GARDEN";
$VIKASPURI[]="INDIRA CAMP NO.3 VIKAS PURI";
$VIKASPURI[]="INDIRA CAMP NO.5 VIKAS PURI";
$VIKASPURI[]="J J COLONY BAKKARWALA";
$VIKASPURI[]="JAI VIHAR (HARPHOOL VIHAR) BAPROLA";
$VIKASPURI[]="JAI VIHAR BAPROLA";
$VIKASPURI[]="JAI VIHAR EXTN. BAPROLA";
$VIKASPURI[]="JANTA FLATS HASTSAL";
$VIKASPURI[]="JANTA FLATS SITE-3 VIKAS PURI";
$VIKASPURI[]="JHUGGI KALI BASTI HASTSAL";
$VIKASPURI[]="K-5 EXTN. MOHAN GARDEN";
$VIKASPURI[]="K-6 & K-5 EXTN. MOHAN GARDEN";
$VIKASPURI[]="KALI BASTI T-CAMP HASTSAL";
$VIKASPURI[]="KANGRA NIKETAN VIKAS PURI";
$VIKASPURI[]="KG-1 VIKAS PURI";
$VIKASPURI[]="KG-1 MG-1 VIKAS PURI";
$VIKASPURI[]="KRISHI APPTT. VIKAS PURI";
$VIKASPURI[]="KUNWAR SINGH NAGAR RANHOLA";
$VIKASPURI[]="LIG FLATS HASTSAL";
$VIKASPURI[]="LIONS ENCLAVE VIKAS NAGAR";
$VIKASPURI[]="M M EXTN. & A-BLOCK VIKAS NAGAR";
$VIKASPURI[]="MAHARANI ENCLAVE VIKAS NAGAR";
$VIKASPURI[]="MAHENDRAGULMOHARSHIVAM";
$VIKASPURI[]="MAHESH VIHAR OM VIHAR";
$VIKASPURI[]="M-BLOCK VIKAS PURI";
$VIKASPURI[]="MEHTA ENCLAVE RAJHANS VIHAR BHIM ENCLAVE VIKAS NAGAR";
$VIKASPURI[]="NANGLI VIHAR EXTN. BAPROLA";
$VIKASPURI[]="NEW SAINIK VIHAR MOHAN GARDEN";
$VIKASPURI[]="NIGHTINGALE EVERSHINE VIASHALI";
$VIKASPURI[]="OM VIHAR PH-V";
$VIKASPURI[]="PARMARTH APTT. RAKSHA VIKAS LOKVIHAR";
$VIKASPURI[]="POONAM VIHAR PANCHSHEEL ENCLAVE MOHAN GARDEN";
$VIKASPURI[]="PRASHANT ENCLAVE BAPROLA";
$VIKASPURI[]="PRESS ENCLAVE VIKAS NAGAR";
$VIKASPURI[]="PRIYA SADAN & RAVI APTTS. VIKAS PURI";
$VIKASPURI[]="PROMISE & PANCHWATI SOCIETY VIKAS PURI";
$VIKASPURI[]="PURTI ORDINANCE & NAVYUG APTTS. VIKAS PURI";
$VIKASPURI[]="R-4 &5 BLOCK MOHAN GARDEN";
$VIKASPURI[]="RAJAN VIHAR VIKAS NAGAR";
$VIKASPURI[]="RAKSHA ENCLAVE MOHAN GARDEN";
$VIKASPURI[]="RANHOLA VILLAGE";
$VIKASPURI[]="R-BLOCK VIKAS NAGAR";
$VIKASPURI[]="RISHAL GARDEN RANHOLA";
$VIKASPURI[]="SAI ENCLAVE MOHAN GARDEN";
$VIKASPURI[]="SAINIK ENCLAVE MOHAN GARDEN";
$VIKASPURI[]="SAINIK ENCLAVE MOHAN GARDEN";
$VIKASPURI[]="SAINIK ENCLAVE VIKAS NAGAR";
$VIKASPURI[]="SAINIK ENCLAVEKUMHAAR COLONY";
$VIKASPURI[]="SAINIK VIHAR MOHAN GARDEN";
$VIKASPURI[]="SAMAJ KALYAN MAYA APTTS. VIKAS PURI";
$VIKASPURI[]="S-BLOCK VIKAS NAGAR";
$VIKASPURI[]="SETHI ENCLAVE MOHAN GARDEN";
$VIKASPURI[]="SHIV RAM PARK EXTN. RANHOLA";
$VIKASPURI[]="SHIV VIHAR RANHOLA";
$VIKASPURI[]="SITE-II & C-BLOCK VIKAS PURI";
$VIKASPURI[]="SITE-IV GANGOTRI APTTS VIKAS PURI";
$VIKASPURI[]="SUNRISE JUPITAR & NALNANDA";
$VIKASPURI[]="SURAKSHA VIHAR VIKAS NAGAR";
$VIKASPURI[]="SURAKSHAENCLAVE";
$VIKASPURI[]="SURYA KIRAN ARJUN GEVA & PANCHDEEP APTTS. VIKAS PURI";
$VIKASPURI[]="TILAK ENCLAVE GANGA VIHAR MOHAN GARDEN";
$VIKASPURI[]="TILANG PUR KOTLA VIHAR";
$VIKASPURI[]="TILANGPUR KOTLA VILLAGE";
$VIKASPURI[]="TYAGI ENCLAVE MOHAN GARDEN";
$VIKASPURI[]="VIDYA VIHAR HASTSAL";
$VIKASPURI[]="VIKAS ENCLAVE VIKAS NAGAR";
$VIKASPURI[]="VIKAS KUNJ VIKAS NAGAR";
$VIKASPURI[]="VIKAS VIHAR VIKAS NAGAR";
$VIKASPURI[]="VILLAGE BUDHELA";
$VIKASPURI[]="YADAV ENCLAVE VIKAS NAGAR";

	 break;

	case "UTTAM NAGAR":
$UTTAM_NAGAR[]="VIPIN GARDEN";
$UTTAM_NAGAR[]="ANAND VIHAR";
$UTTAM_NAGAR[]="ANOOP NAGAR";
$UTTAM_NAGAR[]="BHAGWATI GARDEN";
$UTTAM_NAGAR[]="BHAGWATI VIHAR";
$UTTAM_NAGAR[]="BINDA PUR";
$UTTAM_NAGAR[]="BINDAPUR";
$UTTAM_NAGAR[]="GEETA ENCLAVE";
$UTTAM_NAGAR[]="GULAB BAGH";
$UTTAM_NAGAR[]="INDRA PARK";
$UTTAM_NAGAR[]="JANAKI PURI";
$UTTAM_NAGAR[]="KESHO RAM PARK";
$UTTAM_NAGAR[]="KIRAN GARDEN";
$UTTAM_NAGAR[]="MOHAN GARDEN";
$UTTAM_NAGAR[]="NAND RAM PARK";
$UTTAM_NAGAR[]="NAWADA";
$UTTAM_NAGAR[]="NEW JANAKI PURI";
$UTTAM_NAGAR[]="OM VIHAR";
$UTTAM_NAGAR[]="PRATAP GARDEN";
$UTTAM_NAGAR[]="RAMA PARK";
$UTTAM_NAGAR[]="ROHTASH NAGAR";
$UTTAM_NAGAR[]="SANJAY ENCLAVE";
$UTTAM_NAGAR[]="SANTOSH PARK";
$UTTAM_NAGAR[]="SEWAK PARK";
$UTTAM_NAGAR[]="SUBHASH PARK";
$UTTAM_NAGAR[]="UTTAM NAGAR";
$UTTAM_NAGAR[]="UTTAM VIHAR";
$UTTAM_NAGAR[]="VANI VIHAR";
$UTTAM_NAGAR[]="VIJAY VIHAR";
$UTTAM_NAGAR[]="VIKAS VIHAR";
$UTTAM_NAGAR[]="VIPIN GARDEN";
$UTTAM_NAGAR[]="VISHU VIHAR";

	 break;

	case "DWARKA":
$DWARKA[]="BRAHMPURI PANKHA ROAD";
$DWARKA[]="DABRI EXT.";
$DWARKA[]="DABRI VAISHALI";
$DWARKA[]="DABRI VILLAGE";
$DWARKA[]="DABRI VILLAVE";
$DWARKA[]="DASHRATH PURI";
$DWARKA[]="DDA POCKET-6 NASIR PUR";
$DWARKA[]="DURGA PARK";
$DWARKA[]="EAST SAGAR PUR";
$DWARKA[]="EAST SAGAR PUR BASTI";
$DWARKA[]="EAST SAGAR PUR HARIJAN BASTI";
$DWARKA[]="G BLOCKSAGARPUR WEST";
$DWARKA[]="GANDHI MARKETWEST SAGARPUR";
$DWARKA[]="GEETANJALI PARKWEST SAGARPUR";
$DWARKA[]="H BLOCKWEST SAGARPUR";
$DWARKA[]="HARIJAN BASTIWEST SAGARPUR";
$DWARKA[]="I BLOCKWEST SAGARPUR";
$DWARKA[]="INDRAPARK PALAM COLONY";
$DWARKA[]="J BLOCKSAGARPUR WEST";
$DWARKA[]="JAGDAMBA VIHAR WEST SAGARPUR";
$DWARKA[]="KAILASH PURI EXTENSION";
$DWARKA[]="KAMAL PARKPALAM";
$DWARKA[]="M BLOCKWEST SAGARPUR";
$DWARKA[]="MADAN PURIWEST SAGARPUR";
$DWARKA[]="MAHAVIR ENCLAVE";
$DWARKA[]="MAHAVIR ENCLAVE-I";
$DWARKA[]="MAIN SAGAR PUR";
$DWARKA[]="MAIN SAGAR PUR GALI NO. 7";
$DWARKA[]="MANGALA PURI";
$DWARKA[]="MOHAN BLOCKWEST SAGARPUR";
$DWARKA[]="NASIR PUR VILLAGE";
$DWARKA[]="NASIR PUR VILLAGE HARIZAN BASTI";
$DWARKA[]="PANKHA ROAD MOHAN NAGAR";
$DWARKA[]="PANKHA ROAD VASIST PARK";
$DWARKA[]="PANKHA ROAD VASIST PARK";
$DWARKA[]="RAGHU NAGAR";
$DWARKA[]="SAGARPUR WEST DAYAL PARK";
$DWARKA[]="SAGARPUR WEST HANSA PARK";
$DWARKA[]="SAGARPUR SHIV PURI";
$DWARKA[]="SANKAR PARKWEST SAGARPUR";
$DWARKA[]="SYNDICATE ENCLAVE";
$DWARKA[]="VEER NAGARSHANKER PARK";
$DWARKA[]="VEER NAGARWEST SAGARPUR";
$DWARKA[]="WEST SAGARPUR ASHOK PARK";

	 break;

	case "MATIALA":
$MATIALA[]="A BLOCK BHARAT VIHAR";
$MATIALA[]="A BLOCK TARA NAGAR KAKRAULA VILLAGE";
$MATIALA[]="AMBER HAI VILLAGE";
$MATIALA[]="ARJUN PARK A BLOCK";
$MATIALA[]="ARJUN PARK B BLOCK";
$MATIALA[]="ARJUN PARK C BLOCK";
$MATIALA[]="ARJUN PARK D BLOCK";
$MATIALA[]="BADU SARAI";
$MATIALA[]="BAJAJ ENCLAVE EXTN.";
$MATIALA[]="BHARAT VIHAR KAKRAULA";
$MATIALA[]="CHHAWLA";
$MATIALA[]="D BLOCK BHARAT VIHAR KAKRAULA";
$MATIALA[]="DARIYA PUR KHURD";
$MATIALA[]="DAULATPUR VILLAGE";
$MATIALA[]="DEENDARPUR SHYAM VIHAR";
$MATIALA[]="DINDARPUR";
$MATIALA[]="DINDARPUR VILLAGE SHYAM VIHAR";
$MATIALA[]="DWARKA SECTOR 12";
$MATIALA[]="DWARKA SECTOR 14";
$MATIALA[]="DWARKA SECTOR 11 & 12";
$MATIALA[]="DWARKA SECTOR 13";
$MATIALA[]="DWARKA SECTOR 13 & 14";
$MATIALA[]="DWARKA SECTOR 13 & SFS FLATS";
$MATIALA[]="DWARKA SECTOR 13 &14";
$MATIALA[]="DWARKA SECTOR 13& 14";
$MATIALA[]="DWARKA SECTOR 16A J J COLONY";
$MATIALA[]="DWARKA SECTOR- 18A & 17";
$MATIALA[]="DWARKA SECTOR 22 & 23";
$MATIALA[]="DWARKA SECTOR 3 J J COLONY";
$MATIALA[]="DWARKA SECTOR-10";
$MATIALA[]="DWARKA SECTOR-11";
$MATIALA[]="DWARKA SECTOR-11&12";
$MATIALA[]="DWARKA SECTOR-16A J J COLONY";
$MATIALA[]="DWARKA SECTOR-17 18A & 19";
$MATIALA[]="DWARKA SECTOR-1718A & 19";
$MATIALA[]="DWARKA SECTOR-19";
$MATIALA[]="DWARKA SECTOR-22 & 23";
$MATIALA[]="DWARKA SECTOR-3";
$MATIALA[]="DWARKA SECTOR-3 DDA PKT";
$MATIALA[]="DWARKA SECTOR-4";
$MATIALA[]="DWARKA SECTOR-5";
$MATIALA[]="DWARKA SECTOR-6";
$MATIALA[]="DWRKA SECTOR-10";
$MATIALA[]="GALIBPUR VILLAGE";
$MATIALA[]="GHASIPURA";
$MATIALA[]="GHASIPURA ISHWAR COLONY";
$MATIALA[]="GHASIPURA NANGLI DAIRY";
$MATIALA[]="GHASIPURA NANGLI VIHAR";
$MATIALA[]="GHUMAN HERA VILLAGE";
$MATIALA[]="GOYLA DAIRY JHUGGI BASTI";
$MATIALA[]="GOYLA KHURD VILLAGE";
$MATIALA[]="HARI VIHAR KAKRAULA";
$MATIALA[]="HASANPUR VILLAGE";
$MATIALA[]="JAIN COLONY PART-I";
$MATIALA[]="JAIN COLONY PART-II&III";
$MATIALA[]="JAIN PARK A BLOCK";
$MATIALA[]="JAIN PARK BC&D BLOCK";
$MATIALA[]="JHATIKRA VILLAGE";
$MATIALA[]="JHULJHULI VILLAGE";
$MATIALA[]="KAKRAULA VILLAGE";
$MATIALA[]="KANGANHERI";
$MATIALA[]="KHARKHARI (NAHAR)";
$MATIALA[]="KHARKHARI JATMAL";
$MATIALA[]="KHARKHARI RAUNDH VILLAGE";
$MATIALA[]="KHERA DABUR";
$MATIALA[]="MANSA RAM PARK";
$MATIALA[]="MANSA RAM PARK B BLOCK";
$MATIALA[]="MANSA RAM PARK B&C  BLOCK";
$MATIALA[]="MANSA RAM PARK E BLOCK";
$MATIALA[]="MATIALA VILLAGE";
$MATIALA[]="MATIALA VILLAGE NANHE PARK";
$MATIALA[]="NANAKHERI";
$MATIALA[]="NAND VIHAR KAKRAULA DAIRY";
$MATIALA[]="NANGLI SAKRAWATI";
$MATIALA[]="NANGLI SAKRAWATI ANAND VIHAR";
$MATIALA[]="NANHE PARK NEW T BLOCK";
$MATIALA[]="OM VIHAR EXTENSION";
$MATIALA[]="OM VIHAR EXTENSION KHUSHI RAM PARK";
$MATIALA[]="PANDWALA KALAN VILLAGE";
$MATIALA[]="PANDWALA KHURD VILLAGE";
$MATIALA[]="PAPRAWAT VILLAGE";
$MATIALA[]="PATEL GARDEN";
$MATIALA[]="POCHAN PUR VILLAGE";
$MATIALA[]="POCHAN PUR VILLAGE EXTN.";
$MATIALA[]="QUTUB VIHAR  CD &H BLOCK";
$MATIALA[]="QUTUB VIHAR PH-1 A&B BLOCK";
$MATIALA[]="QUTUB VIHAR PHASE-2 A&B BLOCK";
$MATIALA[]="QUTUB VIHAR PHASE-2 C&D BLOCK";
$MATIALA[]="QUTUB VIHAR PHASE-2 E BLOCK";
$MATIALA[]="QUTUB VIHAR PHASE-2 F BLOCK";
$MATIALA[]="RANAJI ENCLAVE PART-1";
$MATIALA[]="RANAJI ENCLAVE PART-2";
$MATIALA[]="RANAJI ENCLAVE PART-3";
$MATIALA[]="RAWTA VILLAGE";
$MATIALA[]="RAWTA VILLAGE/DAURALA VILLAGE";
$MATIALA[]="REWLA KHANPUR VILLAGE";
$MATIALA[]="SAHYOG VIHAR (MATIALA)";
$MATIALA[]="SAINIK NAGAR";
$MATIALA[]="SARANGPUR";
$MATIALA[]="SECTOR -15 POCKET A BHARAT VIHAR";
$MATIALA[]="SECTOR 15 POCKET A J J COLONY BHARAT VIHAR";
$MATIALA[]="SECTOR 15 POCKET B J J COLONY BHARAT VIHAR";
$MATIALA[]="SHIKARPUR VILLAGE";
$MATIALA[]="SRI CHAND PARK MATIALA VILLAGE";
$MATIALA[]="SUKHI RAM PARK GURU HAR KISHAN NAGAR";
$MATIALA[]="TAJPUR KHURD VILLAGE";
$MATIALA[]="VIKAS VIHAR KAKRAULA";
$MATIALA[]="VISHWAS PARK SOLANKI ROAD & SHIKSHA DEEP PUBLIC SCHOOL";

	 break;

	case "NAJAFGARH":
$NAJAFGARH[]="BABA HARIDASS ENCLAVE";
$NAJAFGARH[]="BAKARGARH";
$NAJAFGARH[]="BOSCO COLONY GOPAL NAGAR";
$NAJAFGARH[]="CHANDAN PLACE SARSWATI KUNJ";
$NAJAFGARH[]="DHANSA";
$NAJAFGARH[]="DHARAMPURA";
$NAJAFGARH[]="DHARAMPURA EXTN.";
$NAJAFGARH[]="DHARAMSHALA AREA GOPAL NAGAR";
$NAJAFGARH[]="DICHAON KALAN";
$NAJAFGARH[]="GOPAL NAGAR";
$NAJAFGARH[]="GOPAL NAGAR EXTN.";
$NAJAFGARH[]="GULIA ENCLAVE RAJEEV VIHAR";
$NAJAFGARH[]="HAIBATPURA";
$NAJAFGARH[]="HANUMAN MANDIR GOPAL NAGAR";
$NAJAFGARH[]="HEERA PARK";
$NAJAFGARH[]="INDRA PARK";
$NAJAFGARH[]="ISSAPUR";
$NAJAFGARH[]="JAFFARPUR KALAN";
$NAJAFGARH[]="JAI VIHAR";
$NAJAFGARH[]="JHARODA KALAN";
$NAJAFGARH[]="KAIR";
$NAJAFGARH[]="KAZI PUR";
$NAJAFGARH[]="KHAIRA";
$NAJAFGARH[]="LAXMI GARDENROSHAN MANDI";
$NAJAFGARH[]="LOKESH PARK";
$NAJAFGARH[]="MAIN NAJAFGARH";
$NAJAFGARH[]="MAKSOODABAD COLONY";
$NAJAFGARH[]="MALIK PUR";
$NAJAFGARH[]="MD ROAD GOPAL NAGAR";
$NAJAFGARH[]="MITRAON";
$NAJAFGARH[]="MUNDELA KALAN";
$NAJAFGARH[]="MUNDELA KHURD";
$NAJAFGARH[]="NANAK PIYAOO GOPAL NAGAR";
$NAJAFGARH[]="NANDA ENCLAVE";
$NAJAFGARH[]="NAVEEN PLACE SURYA KUNJ";
$NAJAFGARH[]="NAWADA BAZAR";
$NAJAFGARH[]="NAYA BAZAR";
$NAJAFGARH[]="NEW HEERA PARK NAJAFGARH PARK COLONY";
$NAJAFGARH[]="NEW ROSHANPURA";
$NAJAFGARH[]="NEW ROSHANPURA EXTN.";
$NAJAFGARH[]="NEW ROSHANPURA VILLAGE";
$NAJAFGARH[]="OLD ROSHANPURA";
$NAJAFGARH[]="POLICE STATION TRANSFORMER";
$NAJAFGARH[]="PREM NAGAR";
$NAJAFGARH[]="RAIL FACTORY ROAD GOPAL NAGAR";
$NAJAFGARH[]="RGHUBIR ENCLAVE BLOCK - B C-HEERA PARK";
$NAJAFGARH[]="ROSHAN ";
$NAJAFGARH[]="ROSHAN VIHAR";
$NAJAFGARH[]="SAINIK ENCLAVE";
$NAJAFGARH[]="SAINIK ENCLAVE NEAR INDRA PARK";
$NAJAFGARH[]="SAMASPUR KHALSA";
$NAJAFGARH[]="SARASWATI ENCLAVE";
$NAJAFGARH[]="SHIV ENCLAVE";
$NAJAFGARH[]="SURAKHPUR";
$NAJAFGARH[]="SUREHRA";
$NAJAFGARH[]="THANA ROAD";
$NAJAFGARH[]="TODARMAL COLONY";
$NAJAFGARH[]="UGAR SEN PARK";
$NAJAFGARH[]="UJWA VILLAGE";
$NAJAFGARH[]="VINOBA ENCLAVE";

	 break;

	case "BIJWASAN":
$BIJWASAN[]="BAGDOLA";
$BIJWASAN[]="BAMNOLI";
$BIJWASAN[]="BHARTHAL";
$BIJWASAN[]="BIJWASAN";
$BIJWASAN[]="DHOOL SIRAS";
$BIJWASAN[]="DWARKA";
$BIJWASAN[]="KAPASHERA";
$BIJWASAN[]="MAHIPAL PUR";
$BIJWASAN[]="RAJ NAGAR-II";
$BIJWASAN[]="RANGPURI";
$BIJWASAN[]="RANGPURI PAHARI";
$BIJWASAN[]="SAMALKA";
$BIJWASAN[]="SHAHBAD MOHAMMAD PUR";
$BIJWASAN[]="VASANT KUNJ";

	 break;

	case "PALAM":
$PALAM[]="BHARAT VIHAR/ RAJA PURI C BLOCK";
$PALAM[]="BHARAT VIHAR/ RAJA PURI B BLOCK";
$PALAM[]="BHARAT VIHAR/ RAJA PURI A BLOCK";
$PALAM[]="DWARKA J J COLONY SECTOR -7";
$PALAM[]="DWARKA PURI";
$PALAM[]="DWARKA PURI/VIJAY ENCLAVE";
$PALAM[]="DWARKA SECTOR-1 JJ COLONY A&B BLOCK";
$PALAM[]="DWARKA SECTOR-1 JJ COLONY C BLOCK";
$PALAM[]="DWARKA SECTOR-2";
$PALAM[]="DWRKA SECTOR-7";
$PALAM[]="EAST RAJAPURI B2 & T BLOCK";
$PALAM[]="HARIJAN BASTI/ PALAM EXTN.";
$PALAM[]="INDRA PARK";
$PALAM[]="INDRAPARK PALAM COLONY";
$PALAM[]="KAILAS PURI";
$PALAM[]="KAILASH PURI";
$PALAM[]="MADHU VIHAR";
$PALAM[]="MADHU VIHAR (A-BLOCK)";
$PALAM[]="MADHU VIHAR(A1-BLOCK)";
$PALAM[]="MAHAVIR ENCLAVE-I";
$PALAM[]="MAHAVIR VIHAR A BLOCK";
$PALAM[]="MAHAVIR VIHAR B & RZ  BLOCK";
$PALAM[]="MAHAVIR VIHAR C BLOCK";
$PALAM[]="MAHAVIR VIHAR D BLOCK";
$PALAM[]="OLD RAJAPURI & RAJAPURI A & A1 BLOCK";
$PALAM[]="PALAM VILLAGE";
$PALAM[]="PALAM VILLAGE BALMIKI VIHAR";
$PALAM[]="PALAM VILLAGE DDA LIG FLATS";
$PALAM[]="PURAN NAGAR";
$PALAM[]="PURAN NAGAR PALAM";
$PALAM[]="RAJ NAGAR-I (PALAM)";
$PALAM[]="RAJA PURI";
$PALAM[]="RAJA PURI K  BLOCK";
$PALAM[]="RAJA PURI K1 BLOCK";
$PALAM[]="RAJA PURI B BLOCK";
$PALAM[]="RAJA PURI B D D1 BLOCK";
$PALAM[]="RAJA PURI B1 & C1 BLOCK";
$PALAM[]="RAJA PURI G BLOCK";
$PALAM[]="RAJA PURI H & H1 BLOCK";
$PALAM[]="RAJA PURI JI BLOCK";
$PALAM[]="RAJAPURI E & F BLOCK";
$PALAM[]="SADH NAGAR";
$PALAM[]="SADH NAGAR PALAM COLONY";
$PALAM[]="SADH NAGAR-II";
$PALAM[]="SEC-1 PAPPANKALAN DWARKA";
$PALAM[]="TAMIL ENCLAVE";
$PALAM[]="VIJAY ENCLAVE";
$PALAM[]="VINOD PURI/VIJAY ENCLAVE";
$PALAM[]="VISHWAS PARK  B Block";
$PALAM[]="VISHWAS PARK A  Block";
$PALAM[]="VISHWAS PARK EXTN  F-BLOCK";
$PALAM[]="VISHWAS PARK EXTN E -BLOCK";
$PALAM[]="VISHWAS PARK EXTN G   BLOCK";
$PALAM[]="VISHWAS PARK RZ & T BLOCK";
$PALAM[]="VISHWAS PARK T EXTN BLOCK";
$PALAM[]="VISHWAS PARK(CD BLOCK)";

	 break;

	case "DELHI CANTT":
$DELHI_CANTT[]="ARJUN VIHAR";
$DELHI_CANTT[]="BAPU DHAM";
$DELHI_CANTT[]="BAPU DHAM CHANAKYA PURI";
$DELHI_CANTT[]="BRAR SQUARE";
$DELHI_CANTT[]="CB NARAINA";
$DELHI_CANTT[]="CHANAKYA PURI";
$DELHI_CANTT[]="COD ME LINE KIRBY PLACE";
$DELHI_CANTT[]="CVD LINE SADAR BAZAR";
$DELHI_CANTT[]="DHAULA KUAN";
$DELHI_CANTT[]="DHOBI GHAT KIRBY PLACE";
$DELHI_CANTT[]="GOPI NATH BAZAR";
$DELHI_CANTT[]="GOPINATH BAZAR";
$DELHI_CANTT[]="JHARERA VILLAGE";
$DELHI_CANTT[]="KABUL LINE";
$DELHI_CANTT[]="KAUTILYA MARG";
$DELHI_CANTT[]="MANAS MARG BAPU DHAM";
$DELHI_CANTT[]="MEHRAM NAGAR";
$DELHI_CANTT[]="MORE LINE";
$DELHI_CANTT[]="MOTI BAGH - I";
$DELHI_CANTT[]="MOTI BAGH -1";
$DELHI_CANTT[]="NETAJI NAGAR";
$DELHI_CANTT[]="OLD NANGAL";
$DELHI_CANTT[]="PANCHVATI";
$DELHI_CANTT[]="PINTO PARK";
$DELHI_CANTT[]="RK PURAM SECTOR-13";
$DELHI_CANTT[]="ROCK  VIEW";
$DELHI_CANTT[]="SADAR BAZAR";
$DELHI_CANTT[]="SARDAR PATEL MARG";
$DELHI_CANTT[]="SATYA MARG";
$DELHI_CANTT[]="SUBROTO PARK";
$DELHI_CANTT[]="URI ENCLAVE";
$DELHI_CANTT[]="VINAY MARG";

	 break;

	case "RAJENDRA NAGAR":
$RAJENDRA_NAGAR[]="DASGHARA/TODAPUR";
$RAJENDRA_NAGAR[]="INDERPURI";
$RAJENDRA_NAGAR[]="J J COLONY INDERPURI";
$RAJENDRA_NAGAR[]="KAROL BAGH";
$RAJENDRA_NAGAR[]="KAROL BAGH PUSA ROAD";
$RAJENDRA_NAGAR[]="KRISHI KUNJ";
$RAJENDRA_NAGAR[]="LOHA MANDI NARAINA";
$RAJENDRA_NAGAR[]="NARAINA";
$RAJENDRA_NAGAR[]="NARAINA VIHAR";
$RAJENDRA_NAGAR[]="PANDAV NAGAR";
$RAJENDRA_NAGAR[]="PUSA INSTITUTE";
$RAJENDRA_NAGAR[]="RAJINDER NAGAR";

	 break;

	case "NEW DELHI":
$NEW_DELHI[]="ALI GANJ";
$NEW_DELHI[]="ANSARI NAGAR (EAST)";
$NEW_DELHI[]="ANSARI NAGAR (WEST)";
$NEW_DELHI[]="ARMY PUBLIC SCHOOL";
$NEW_DELHI[]="ASHOK ROAD";
$NEW_DELHI[]="ATUL GROVER ROAD";
$NEW_DELHI[]="AURANGZEB ROAD";
$NEW_DELHI[]="B. K. DUTT COLONY";
$NEW_DELHI[]="BABA KHADAK SINGH MARG";
$NEW_DELHI[]="BABA KHARAG SINGH MARG";
$NEW_DELHI[]="BABAR ROAD";
$NEW_DELHI[]="BANGALI MARKET";
$NEW_DELHI[]="BANGLA SAHIB ROAD";
$NEW_DELHI[]="BAPA NAGAR";
$NEW_DELHI[]="BARAKHAMBA ROAD";
$NEW_DELHI[]="BASANT LANE";
$NEW_DELHI[]="BHAGWAN DASS ROAD";
$NEW_DELHI[]="CHELMSFORD ROAD";
$NEW_DELHI[]="CONNAUGHT PLACE";
$NEW_DELHI[]="COPERNICUS MARG";
$NEW_DELHI[]="FIROZSHAH ROAD";
$NEW_DELHI[]="GOLF LINKS";
$NEW_DELHI[]="GURUDWARA RAKAB GANJ ROAD";
$NEW_DELHI[]="HAILEY ROAD";
$NEW_DELHI[]="HANUMAN ROAD";
$NEW_DELHI[]="JANPATH";
$NEW_DELHI[]="JASWANT SINGH ROAD";
$NEW_DELHI[]="JOR BAGH";
$NEW_DELHI[]="K G MARG";
$NEW_DELHI[]="KAKA NAGAR";
$NEW_DELHI[]="KALI BARI MARG";
$NEW_DELHI[]="KASHTURBA GANDHI MARG";
$NEW_DELHI[]="KHAN MARKET";
$NEW_DELHI[]="KIDWAI NAGAR (EAST)";
$NEW_DELHI[]="KIDWAI NAGAR (WEST)";
$NEW_DELHI[]="KIDWAI NAGAR WEST";
$NEW_DELHI[]="KIDWAI NAGAR(EAST)";
$NEW_DELHI[]="LAXMI BAI NAGAR";
$NEW_DELHI[]="LODHI COLONY";
$NEW_DELHI[]="LODHI ESTATE";
$NEW_DELHI[]="MAHARISHI RAMAN MARG";
$NEW_DELHI[]="MAN SINGH ROAD";
$NEW_DELHI[]="MANDIR MARG";
$NEW_DELHI[]="MAULANA AZAD ROAD";
$NEW_DELHI[]="MOTHER TERESSA CRESCENT";
$NEW_DELHI[]="NAUROJI NAGAR";
$NEW_DELHI[]="NORTH AVENUE";
$NEW_DELHI[]="PALIKA KUNJ";
$NEW_DELHI[]="PALIKA NIWAS";
$NEW_DELHI[]="PANCHKUIAN ROAD";
$NEW_DELHI[]="PANDARA PARK";
$NEW_DELHI[]="PANDARA ROAD";
$NEW_DELHI[]="PESHWA ROAD";
$NEW_DELHI[]="PILLANGI VILLAGE";
$NEW_DELHI[]="PRESIDENT ESTATE";
$NEW_DELHI[]="PRITHVI RAJ ROAD";
$NEW_DELHI[]="PURANA QUILLA ROAD";
$NEW_DELHI[]="RACE COURSE";
$NEW_DELHI[]="RACE COURSE ROAD";
$NEW_DELHI[]="RAJA BAZAR";
$NEW_DELHI[]="RAMA KRISHNA ASHRAM MARG";
$NEW_DELHI[]="RAVINDRA NAGAR";
$NEW_DELHI[]="SAFDARJUNG AIRPORT";
$NEW_DELHI[]="SAROJINI NAGAR";
$NEW_DELHI[]="SHAHEED BHAGAT SINGH MARG";
$NEW_DELHI[]="SIKANDRA ROAD";
$NEW_DELHI[]="SOUTH AVENUE";
$NEW_DELHI[]="SOUTH END LANE";
$NEW_DELHI[]="SUJAN SINGH PARK";
$NEW_DELHI[]="SUNEHRI BAGH";
$NEW_DELHI[]="TAL KATORA ROAD";
$NEW_DELHI[]="TEEN MURTI MARG";
$NEW_DELHI[]="TEES JANUARY MARG";
$NEW_DELHI[]="TILAK MARG";  

	 break;

	case "JANGPURA":	
$JANGPURA[]="ASHRAM";
$JANGPURA[]="BHOGAL";
$JANGPURA[]="DARYA GANJ";
$JANGPURA[]="DARYAGANJ";
$JANGPURA[]="HARI NAGAR ASHRAM";
$JANGPURA[]="HAZRAT NIZAMUDDIN WEST";
$JANGPURA[]="JAL VIHAR";
$JANGPURA[]="JANGPURA B";
$JANGPURA[]="JANGPURA EXT.";
$JANGPURA[]="JANGPURA LANE";
$JANGPURA[]="JANGPURA MATHURA ROAD";
$JANGPURA[]="KILOKARI";
$JANGPURA[]="LAJPAT NAGAR I";
$JANGPURA[]="LAJPAT NAGAR II";
$JANGPURA[]="NEHRU NAGAR";
$JANGPURA[]="NIZAMUDDIN WEST";
$JANGPURA[]="NIZAUDDIN WEST";
$JANGPURA[]="P.S.STAAF QTRS";
$JANGPURA[]="PRAGATI MAIDAN";
$JANGPURA[]="RAJ GHAT";
$JANGPURA[]="RING ROAD IP DEPOT";
$JANGPURA[]="SARAI KALE KHAN";
$JANGPURA[]="SARAIKALE KHAN";
$JANGPURA[]="SIDHARTH BASTI";
$JANGPURA[]="SIDHARTH EXT.";
$JANGPURA[]="SUNDER NAGAR";
$JANGPURA[]="SUNLIGHT COLONY";
$JANGPURA[]="TILAK BRIDGE";
$JANGPURA[]="VIKRAM NAGAR";

	 break;

	case "KASTURBA NAGAR":	
$KASTURBA_NAGAR[]="ANDREWS GANJ";
$KASTURBA_NAGAR[]="AYURVIGYAN NAGAR";
$KASTURBA_NAGAR[]="BAPU PARK KOTLA MUBARAKPUR";
$KASTURBA_NAGAR[]="BLOCK-A DEFENCE COLONY";
$KASTURBA_NAGAR[]="BLOCK-C DEFENCE COLONY";
$KASTURBA_NAGAR[]="BLOCK-C LAJPAT NAGAR-I";
$KASTURBA_NAGAR[]="BLOCK-D DEFENCE COLONY";
$KASTURBA_NAGAR[]="GARHI";
$KASTURBA_NAGAR[]="INA COLONY";
$KASTURBA_NAGAR[]="JANG PURA EXTNSION";
$KASTURBA_NAGAR[]="KOTLA MUBARAK PUR";
$KASTURBA_NAGAR[]="LAJPAT NAGAR";
$KASTURBA_NAGAR[]="LAJPAT NAGAR PART -IV";
$KASTURBA_NAGAR[]="LAJPAT NAGAR PART-IV";
$KASTURBA_NAGAR[]="LAJPAT NAGAR-I";
$KASTURBA_NAGAR[]="LAJPAT NAGAR-III";
$KASTURBA_NAGAR[]="LODHI COLONY";
$KASTURBA_NAGAR[]="LODHI ROAD";
$KASTURBA_NAGAR[]="LODHI ROAD COMPLEX";
$KASTURBA_NAGAR[]="LODHI ROAD COMPLEX";
$KASTURBA_NAGAR[]="N D S E PART II";
$KASTURBA_NAGAR[]="NDSE-I";
$KASTURBA_NAGAR[]="PANT NAGAR";
$KASTURBA_NAGAR[]="SADIQ NAGAR";
$KASTURBA_NAGAR[]="SANWAL NAGAR";
$KASTURBA_NAGAR[]="SEWA NAGAR";
$KASTURBA_NAGAR[]="SOUTH EXTENSION PART II";
$KASTURBA_NAGAR[]="SOUTH EXTENSION-I";
$KASTURBA_NAGAR[]="SRINIWAS PURI";
$KASTURBA_NAGAR[]="TYAG RAJ NAGAR";
$KASTURBA_NAGAR[]="VILLAGE ALI GANJ";
$KASTURBA_NAGAR[]="VILLAGE PILLANJI";
$KASTURBA_NAGAR[]="VILLANGE ALI GANJ";
$KASTURBA_NAGAR[]="WAZIR NAGAR";

	 break;

	case "MALVIYA NAGAR":
$MALVIYA_NAGAR[]="ADCHINI VILLAGE";
$MALVIYA_NAGAR[]="ADHCHINI & NCERT";
$MALVIYA_NAGAR[]="ARJUN NAGAR";
$MALVIYA_NAGAR[]="BEGUM PUR BALMILKI CAMP";
$MALVIYA_NAGAR[]="BEGUM PUR INDRA CAMP";
$MALVIYA_NAGAR[]="BEGUM PUR VILLAGE";
$MALVIYA_NAGAR[]="GAUTAM NAGAR";
$MALVIYA_NAGAR[]="GEETANJALI & MALVIYA NAGAR";
$MALVIYA_NAGAR[]="GEETANJALI & NAVJIVAN  VIHAR";
$MALVIYA_NAGAR[]="GREEN PARK EXTENSION";
$MALVIYA_NAGAR[]="GREEN PARK MAIN";
$MALVIYA_NAGAR[]="GULMOHAR ENCLAVE";
$MALVIYA_NAGAR[]="GULMOHAR PARK";
$MALVIYA_NAGAR[]="HAUZ KHAS";
$MALVIYA_NAGAR[]="HAUZ KHAS ENCLAVE";
$MALVIYA_NAGAR[]="HAUZ KHAS VILLAGE";
$MALVIYA_NAGAR[]="HAUZ RANI";
$MALVIYA_NAGAR[]="HUMAYUN PUR VILLAGE";
$MALVIYA_NAGAR[]="IIT CAMPUS";
$MALVIYA_NAGAR[]="JIA SARAI";
$MALVIYA_NAGAR[]="KALU SARAI VILLAGE";
$MALVIYA_NAGAR[]="KRISHNA NAGAR";
$MALVIYA_NAGAR[]="MALVIYA NAGAR";
$MALVIYA_NAGAR[]="MAY FAIR GARDEN";
$MALVIYA_NAGAR[]="MMTC COLONY";
$MALVIYA_NAGAR[]="NAVKETAN GROUP HOUSING SOCIETY";
$MALVIYA_NAGAR[]="NCERT";
$MALVIYA_NAGAR[]="NCERT STAFF QRTS";
$MALVIYA_NAGAR[]="NITI BAGH";
$MALVIYA_NAGAR[]="PADMINI ENCLAVE";
$MALVIYA_NAGAR[]="POLICE TRAINING SCHOOL";
$MALVIYA_NAGAR[]="QUTUB INSTITUTIONAL AREA";
$MALVIYA_NAGAR[]="SAFDARJUNG DEVELOPMENT AREA BHIM  NAGRI";
$MALVIYA_NAGAR[]="SAFDARJUNG ENCLAVE";
$MALVIYA_NAGAR[]="SARVODAYA ENCLAVE";
$MALVIYA_NAGAR[]="SARVPRIYA VIHAR";
$MALVIYA_NAGAR[]="SHIVALIK";
$MALVIYA_NAGAR[]="SONA APPARTMENT";
$MALVIYA_NAGAR[]="STC COLONY";
$MALVIYA_NAGAR[]="UDAY PARK";
$MALVIYA_NAGAR[]="YUSUF SARAI";

	 break;

	case "R K PURAM":
$R_K_PURAM[]="ANAND NIKETAN";
$R_K_PURAM[]="BASANT NAGAR";
$R_K_PURAM[]="MOHAMMAD PUR VILLAGE";
$R_K_PURAM[]="MUNIRKA DDA FLATS";
$R_K_PURAM[]="MUNIRKA VILLAGE";
$R_K_PURAM[]="NANAK PURA";
$R_K_PURAM[]="R K PURAM SEC-1";
$R_K_PURAM[]="R K PURAM SEC-10";
$R_K_PURAM[]="R K PURAM SEC-12";
$R_K_PURAM[]="R K PURAM SEC-2";
$R_K_PURAM[]="R K PURAM SEC-3";
$R_K_PURAM[]="R K PURAM SEC-4";
$R_K_PURAM[]="R K PURAM SEC-5";
$R_K_PURAM[]="R K PURAM SEC-6";
$R_K_PURAM[]="R K PURAM SEC-7";
$R_K_PURAM[]="R K PURAM SEC-8";
$R_K_PURAM[]="R K PURAM SEC-9";
$R_K_PURAM[]="R.K.PURAM SEC-12";
$R_K_PURAM[]="SATYA NIKETAN";
$R_K_PURAM[]="VASANT VIHAR";

	 break;

	case "MEHRAULI":
$MEHRAULI[]="BER SARAI";
$MEHRAULI[]="JNU (JAWAHAR LAL NEHRU UNIVERSITY)";
$MEHRAULI[]="KATWARIA SARAI";
$MEHRAULI[]="KISHAN GARH VILLAGE";
$MEHRAULI[]="KUSUMPUR PAHARI";
$MEHRAULI[]="LADO SARAI";
$MEHRAULI[]="MASOOD PUR";
$MEHRAULI[]="MEHRAULI";
$MEHRAULI[]="RAJOKARI VILLAGE";
$MEHRAULI[]="SAKET"; 
$MEHRAULI[]="VASANT KUNJ";

	 break;

	case "CHHATARPUR":
$CHHATARPUR[]="ASOLA";
$CHHATARPUR[]="AYA NAGAR";
$CHHATARPUR[]="BHATTI MINES";
$CHHATARPUR[]="BHATTI VILLAGE";
$CHHATARPUR[]="CHANDAN HULLA";
$CHHATARPUR[]="CHATTARPUR";
$CHHATARPUR[]="DERA VILLAGE";
$CHHATARPUR[]="FATEHPUR BERI";
$CHHATARPUR[]="GADAI PUR";
$CHHATARPUR[]="GHITORNI";
$CHHATARPUR[]="JONAPUR";
$CHHATARPUR[]="MAIDAN GARHI";
$CHHATARPUR[]="MANDI VILLAGE";
$CHHATARPUR[]="MANGLA PURI";
$CHHATARPUR[]="NEB SARAI";
$CHHATARPUR[]="RAJPUR KHURD";
$CHHATARPUR[]="SAIDULAJAB";
$CHHATARPUR[]="SATBARI";
$CHHATARPUR[]="SHAHURPUR";
$CHHATARPUR[]="SULTAN PUR";

	 break;

	case "DEOLI SC":
$DEOLI_SC[]="DAKSHINPURI EXTENSION";
$DEOLI_SC[]="DEOLI EXTENSION";
$DEOLI_SC[]="DEOLI VILLAGE";
$DEOLI_SC[]="DURGA VIHAR";
$DEOLI_SC[]="J.J.CAMPTIGRI";
$DEOLI_SC[]="J.J.COLONYTIGRI";
$DEOLI_SC[]="MADANGIR VILLAGE";
$DEOLI_SC[]="NAI BASTI";
$DEOLI_SC[]="SAINIK FARM";
$DEOLI_SC[]="SANGAM VIHAR";
$DEOLI_SC[]="SANJAY CAMP";
$DEOLI_SC[]="SHAHEED CAMP";
$DEOLI_SC[]="SOUTH ENCLAVE DDA FLATS";
$DEOLI_SC[]="SUBHASH CAMP";
$DEOLI_SC[]="TIGRI EXTENSION";

	 break;

	case "AMBEDKAR NAGAR SC":
$AMBEDKAR_NAGAR_SC[]="BIHARI PARK KHANPUR";
$AMBEDKAR_NAGAR_SC[]="DAKSHIN PURI";
$AMBEDKAR_NAGAR_SC[]="DUGGAL COLONY KHANPUR";
$AMBEDKAR_NAGAR_SC[]="J.J.COLONYKHANPUR";
$AMBEDKAR_NAGAR_SC[]="JAWAHAR PARK";
$AMBEDKAR_NAGAR_SC[]="KHANPUR";
$AMBEDKAR_NAGAR_SC[]="KHANPUR EXTN";
$AMBEDKAR_NAGAR_SC[]="KHANPUR VILLAGE";
$AMBEDKAR_NAGAR_SC[]="KRISHNA PARK";
$AMBEDKAR_NAGAR_SC[]="MADANGIR";
$AMBEDKAR_NAGAR_SC[]="MADANGIR DDA FLATS";
$AMBEDKAR_NAGAR_SC[]="PUSHP VIHAR";
$AMBEDKAR_NAGAR_SC[]="RAJU PARK KHANPUR";
$AMBEDKAR_NAGAR_SC[]="SAINIK FARM";
$AMBEDKAR_NAGAR_SC[]="SHIV PARK KHANPUR";

	 break;

	case "SANGAM VIHAR":
$SANGAM_VIHAR[]="HAMDARD NAGAR";
$SANGAM_VIHAR[]="LAL KUAN";
$SANGAM_VIHAR[]="SANGAM VIHAR";
$SANGAM_VIHAR[]="TUGHLAKABAD EXTENSION";
$SANGAM_VIHAR[]="TUGHLAKABAD EXTENSION TA-BLOCK";

	 break;

	case "GREATER KAILASH":
$GREATER_KAILASH[]="ASIAD VILLAGE COMPLEX";
$GREATER_KAILASH[]="C R PARK";
$GREATER_KAILASH[]="CHIRAG DELHI";
$GREATER_KAILASH[]="CHIRAG ENCLAVE HEMKUNT";
$GREATER_KAILASH[]="DDA JANTA FLATS KHIRKI VILLAGE";
$GREATER_KAILASH[]="DDA MASJID MOTH PHASE-I";
$GREATER_KAILASH[]="DDA MIG/SFS SHEIKH SARAI PH-I";
$GREATER_KAILASH[]="DDA SFS SHEIKH SARAI PH-I";
$GREATER_KAILASH[]="EAST OF KAILASH";
$GREATER_KAILASH[]="EAST OF KAILASH (KAILASH TOWER)";
$GREATER_KAILASH[]="EPR REFUGEE REH HOUSING BLDG SOCIETY";
$GREATER_KAILASH[]="G.K II";
$GREATER_KAILASH[]="GREATER KAILASH-I";
$GREATER_KAILASH[]="ICAR COLONY (KRISHI VIHAR)";
$GREATER_KAILASH[]="JAGDAMBA CAMP";
$GREATER_KAILASH[]="KAILASH COLONY";
$GREATER_KAILASH[]="KALKA JI";
$GREATER_KAILASH[]="KHIRKI EXTENSION";
$GREATER_KAILASH[]="MASJID MOTH";
$GREATER_KAILASH[]="PAMPOSH ENCLAVE";
$GREATER_KAILASH[]="PANCHSHEEL COLONY (EAST) SWAMI COLONY";
$GREATER_KAILASH[]="PANCHSHEEL COLONY (GOKUL WALI MASJID)";
$GREATER_KAILASH[]="PANCHSHEEL COLONY/SADNA";
$GREATER_KAILASH[]="PANCHSHEEL ENCLAVE (MASJID MOTH)";
$GREATER_KAILASH[]="PANCHSHEEL PARK (SOUTH)";
$GREATER_KAILASH[]="PANCHSHEEL PARK(EAST)";
$GREATER_KAILASH[]="PANCHSHEEL VIHAR";
$GREATER_KAILASH[]="RPS DDA FLATS SHEIKH SARAI PHASE-I";
$GREATER_KAILASH[]="SANT NAGAR";
$GREATER_KAILASH[]="SAVITRI NAGAR";
$GREATER_KAILASH[]="SHAHPUR JAT";
$GREATER_KAILASH[]="SHEIKH SARAI-PHASE-II";
$GREATER_KAILASH[]="ZAMRUD PUR";

	 break;

	case "KALKAJI BHARAT NAGAR":       
$KALKAJI_BHARAT_NAGAR[]="EAST OF KAILASH";
$KALKAJI_BHARAT_NAGAR[]="GARHI EAST OF KAILASH"; 
$KALKAJI_BHARAT_NAGAR[]="GIRI NAGAR"; 
$KALKAJI_BHARAT_NAGAR[]="GOVIND PURI"; 
$KALKAJI_BHARAT_NAGAR[]="ISHWAR NAGAR"; 
$KALKAJI_BHARAT_NAGAR[]="KALKAJI"; 
$KALKAJI_BHARAT_NAGAR[]="MAHARANI BAGH"; 
$KALKAJI_BHARAT_NAGAR[]="MASIH GARH";
$KALKAJI_BHARAT_NAGAR[]="NEW FRIENDS COLONY"; 
$KALKAJI_BHARAT_NAGAR[]="SARAI JULLENA"; 
$KALKAJI_BHARAT_NAGAR[]="SHYAM NAGAR";
$KALKAJI_BHARAT_NAGAR[]="SRINIWASPURI";
$KALKAJI_BHARAT_NAGAR[]="SUKHDEV VIHAR";

	 break;

	case "TUGHLAKABAD":
$TUGHLAKABAD[]="GOLA KUAN"; 
$TUGHLAKABAD[]="HARKESH NAGAR"; 
$TUGHLAKABAD[]="INDRA KALYAN VIHAR";
$TUGHLAKABAD[]="J.J. CAMP"; 
$TUGHLAKABAD[]="J.J.R.CAMP OKHLA INDUSTRIAL AREA PH-II";
$TUGHLAKABAD[]="JANTA JEEWAN CAMP";
$TUGHLAKABAD[]="KALKAJI EXTN"; 
$TUGHLAKABAD[]="LAL KUAN"; 
$TUGHLAKABAD[]="MAJDOOR KALYAN CAMP";
$TUGHLAKABAD[]="MAJDOOR KALYAN VIHAR"; 
$TUGHLAKABAD[]="MOHAN CO-OPERATIVE";
$TUGHLAKABAD[]="NEW SANJAY CAMP"; 
$TUGHLAKABAD[]="NEW SANJAY COLONY"; 
$TUGHLAKABAD[]="OKHLA INDUSTRIAL AREA"; 
$TUGHLAKABAD[]="OKHLA PH-III"; 
$TUGHLAKABAD[]="PUL PRAHLAD PUR"; 
$TUGHLAKABAD[]="RAILWAY COLONY TUGHLKABAD"; 
$TUGHLAKABAD[]="SANJAY COLONY"; 
$TUGHLAKABAD[]="SANJAY COLONY OKHLA INDUSTRIAL AREA"; 
$TUGHLAKABAD[]="SONIYA GANDHI CAMP"; 
$TUGHLAKABAD[]="TEHKHAND VILLAGE"; 
$TUGHLAKABAD[]="TUGHLAKABAD VILLAGE"; 
$TUGHLAKABAD[]="YOGHSHALA CAMP";

	 break;

	case "BADARPUR":
$BADARPUR[]="BADARPUR";
$BADARPUR[]="GAUTAM PURI"; 
$BADARPUR[]="HARI NAGAR";
$BADARPUR[]="JAITPUR"; 
$BADARPUR[]="MITHAPUR";
$BADARPUR[]="MOLARBAND";
$BADARPUR[]="SAURABH VIHAR";

	 break;

	case "OKHLA":
$OKHLA[]="AALI VIHAR";
$OKHLA[]="ABUL FAZAL ENCLAVE";
$OKHLA[]="ALI VILLAGE";
$OKHLA[]="BATLA HOUSE";
$OKHLA[]="CANAL COLONY";
$OKHLA[]="GAFFAR MANZIL";
$OKHLA[]="GHAFOOR NAGAR";
$OKHLA[]="HAZI COLONY";
$OKHLA[]="JAMIA NAGAR";
$OKHLA[]="JASOLA EXTENSION";
$OKHLA[]="JASOLA VIHAR";
$OKHLA[]="JASOLA VILLAGE";
$OKHLA[]="JOGA BAI";
$OKHLA[]="JOGABAI";
$OKHLA[]="KALINIDI COLONY";
$OKHLA[]="KHIZARBAD VILLAGE";
$OKHLA[]="MADANPUR KHADAR";
$OKHLA[]="MASHIGARH VILLAGE";
$OKHLA[]="MUJEEB BAGH";
$OKHLA[]="NAI BASTI";
$OKHLA[]="NEW FRIENDS COLONY";
$OKHLA[]="NOOR NAGAR";
$OKHLA[]="OKHLA VIHAR";
$OKHLA[]="OKHLA VILLAGE";
$OKHLA[]="SARITA VIHAR";
$OKHLA[]="SHAHEEN BAGH";
$OKHLA[]="TAIMOOR NAGAR";
$OKHLA[]="ZAKIR NAGAR";

	 break;

	case "TRILOKPURI SC":
$TRILOKPURI_SC[]="KOTLA VILLAGE";
$TRILOKPURI_SC[]="MAYUR VIHAR"; 
$TRILOKPURI_SC[]="MAYUR VIHAR PHASE-I EXTN.";
$TRILOKPURI_SC[]="NEW ASHOK NAGAR";
$TRILOKPURI_SC[]="TRILOKPURI";

	 break;

	case "KONDLI":
$KONDLI[]="Dallupura village"; 
$KONDLI[]="DDA Janta Flats"; 
$KONDLI[]="Gazipur DDA Flat"; 
$KONDLI[]="Gharoli Dairy Farms";
$KONDLI[]="Gharoli Extension "; 
$KONDLI[]="Gharoli village"; 
$KONDLI[]="Kalyanpuri"; 
$KONDLI[]="Khichripur"; 
$KONDLI[]="Mayur Vihar-III"; 
$KONDLI[]="New  Kondli"; 
$KONDLI[]="Vasundhara Enclave";

	 break;

	case "PATPARGANJ":
$PATPARGANJ[]="ACHARYA NIKETAN"; 
$PATPARGANJ[]="EAST VINOD NAGAR"; 
$PATPARGANJ[]="I.P.EXTENSION"; 
$PATPARGANJ[]="I.P.EXTENSTION PATPARGANJ";
$PATPARGANJ[]="KALYAN VAS"; 
$PATPARGANJ[]="KHICHRIPUR VILLAGE"; 
$PATPARGANJ[]="MANDAWALI"; 
$PATPARGANJ[]="MAYUR VIHAR PHASE-I"; 
$PATPARGANJ[]="MAYUR VIHAR PHASE-II"; 
$PATPARGANJ[]="PANDAV NAGAR";
$PATPARGANJ[]="PATPARGANJ VILLAGE";
$PATPARGANJ[]="SHASHI GARDEN";
$PATPARGANJ[]="WEST VINOD NAGAR";

	 break;

	case "LAXMI NAGAR":
$LAXMI_NAGAR[]="GARHWALI MOHALLALAXMI NAGAR";
$LAXMI_NAGAR[]="GURU RAMDAS NAGAR"; 
$LAXMI_NAGAR[]="GURURAM DAS NAGAR"; 
$LAXMI_NAGAR[]="KRISHAN KUNJ"; 
$LAXMI_NAGAR[]="KUNDAN NAGAR"; 
$LAXMI_NAGAR[]="LALITA PARK LAXMI NAGAR"; 
$LAXMI_NAGAR[]="LAXMI NAGAR"; 
$LAXMI_NAGAR[]="MANDWALI"; 
$LAXMI_NAGAR[]="PANDAV NAGAR"; 
$LAXMI_NAGAR[]="RAMESH PARK"; 
$LAXMI_NAGAR[]="SAMAS PUR"; 
$LAXMI_NAGAR[]="SHAKARPUR";

	 break;

	case "VISHWAS NAGAR":
$VISHWAS_NAGAR[]="AGCR ENCL"; 
$VISHWAS_NAGAR[]="ANAND VIHAR"; 
$VISHWAS_NAGAR[]="ARYA NAGAR"; 
$VISHWAS_NAGAR[]="DAYANAND VIHAR"; 
$VISHWAS_NAGAR[]="DEFENCE ENCL."; 
$VISHWAS_NAGAR[]="EAST ARJUN NAGAR"; 
$VISHWAS_NAGAR[]="EAST LAXMI MARKET NEAR RADHU PALACE"; 
$VISHWAS_NAGAR[]="GAGAN VIHAR"; 
$VISHWAS_NAGAR[]="GAZI PUR VILLAGE"; 
$VISHWAS_NAGAR[]="GROUP HOUSING SOCIETY NEAR DTC DEPOT PATPAR GANJ"; 
$VISHWAS_NAGAR[]="GROUP HOUSING SOCIETYNEAR DTC DEPOTPATPARGANJ"; 
$VISHWAS_NAGAR[]="GUJARAT VIHAR"; 
$VISHWAS_NAGAR[]="GURU ANGAD NAGAR"; 
$VISHWAS_NAGAR[]="HARGOBIND ENCL"; 
$VISHWAS_NAGAR[]="JAGRITI ENCL"; 
$VISHWAS_NAGAR[]="JOSHI COLONY NEAR DTC DEPOT PATPARGANJ"; 
$VISHWAS_NAGAR[]="karkardooma";
$VISHWAS_NAGAR[]="KARKARDOOMA VILLAGE"; 
$VISHWAS_NAGAR[]="LEHRI COLONY"; 
$VISHWAS_NAGAR[]="MADHU VIHAR"; 
$VISHWAS_NAGAR[]="MADHUBAN"; 
$VISHWAS_NAGAR[]="MANAK VIHAR"; 
$VISHWAS_NAGAR[]="NEW RAJDHANI ENCL."; 
$VISHWAS_NAGAR[]="NIRMAN VIHAR"; 
$VISHWAS_NAGAR[]="NRIMAN VIHAR"; 
$VISHWAS_NAGAR[]="PREET VIHAR";                
$VISHWAS_NAGAR[]="PRIYA ENCALAVE"; 
$VISHWAS_NAGAR[]="PUSHPANJALI"; 
$VISHWAS_NAGAR[]="RAHU PALACE PATPARGANJ ROAD"; 
$VISHWAS_NAGAR[]="RAM VIHAR";
$VISHWAS_NAGAR[]="SAINI ENCL"; 
$VISHWAS_NAGAR[]="SAVITA VIHAR"; 
$VISHWAS_NAGAR[]="SHARAD VIHAR"; 
$VISHWAS_NAGAR[]="SHRESTHA VIHAR"; 
$VISHWAS_NAGAR[]="SURAJMAL VIHAR"; 
$VISHWAS_NAGAR[]="SURYA NIKETAN"; 
$VISHWAS_NAGAR[]="SWASTHYA VIHA"; 
$VISHWAS_NAGAR[]="VIGYAN VIHAR"; 
$VISHWAS_NAGAR[]="VISHWAS NAGAR"; 
$VISHWAS_NAGAR[]="VIVEK VIHAR"; 
$VISHWAS_NAGAR[]="YOJANA VIH";

	 break;

	case "KRISHNA NAGAR":
$KRISHNA_NAGAR[]="ANARKALI GARDEN"; 
$KRISHNA_NAGAR[]="ARAM PARK & OLD ANARKLI EXTN.";
$KRISHNA_NAGAR[]="ARJUN NAGAR"; 
$KRISHNA_NAGAR[]="BALDEV PARK"; 
$KRISHNA_NAGAR[]="BALMIKI BASTI & NEW GANESH PARK"; 
$KRISHNA_NAGAR[]="BRIJ PURI & NEW GOVIND PURA"; 
$KRISHNA_NAGAR[]="CHANDER NAGAR"; 
$KRISHNA_NAGAR[]="CHANDU PARK";
$KRISHNA_NAGAR[]="CHANDU PARK NEW LAYAL PUR";
$KRISHNA_NAGAR[]="EAST BALDEV PARK"; 
$KRISHNA_NAGAR[]="EAST KRISHNA NAGAR";
$KRISHNA_NAGAR[]="GEETA COLONY"; 
$KRISHNA_NAGAR[]="GHONDLI VILLAGE"; 
$KRISHNA_NAGAR[]="GOPAL PARK"; 
$KRISHNA_NAGAR[]="GOPAL PARK & HAZARA PARK"; 
$KRISHNA_NAGAR[]="GOVIND PARK"; 
$KRISHNA_NAGAR[]="GYAN PARK"; 
$KRISHNA_NAGAR[]="HAZARA PARK & SILVER PARK"; 
$KRISHNA_NAGAR[]="INDRA PARK"; 
$KRISHNA_NAGAR[]="JAGAT PURI";
$KRISHNA_NAGAR[]="JHEEL KHURANJA"; 
$KRISHNA_NAGAR[]="JITAR NAGAR"; 
$KRISHNA_NAGAR[]="JITAR NAGAR & OLD GOVIND PURA  EXTN."; 
$KRISHNA_NAGAR[]="KHUREJI KHAS"; 
$KRISHNA_NAGAR[]="KRISHNA NAGAR"; 
$KRISHNA_NAGAR[]="LAXMAN PARK"; 
$KRISHNA_NAGAR[]="LAXMAN PARK & CHANDER NAGAR"; 
$KRISHNA_NAGAR[]="MAHILA COLONY"; 
$KRISHNA_NAGAR[]="MAUSAM VIHAR"; 
$KRISHNA_NAGAR[]="NEW BRIJ PURI"; 
$KRISHNA_NAGAR[]="NEW GOVIND PURA"; 
$KRISHNA_NAGAR[]="OLD GOVIND PURA"; 
$KRISHNA_NAGAR[]="NEW KRISHNA NAGAR"; 
$KRISHNA_NAGAR[]="NEW LAHORE COLONY"; 
$KRISHNA_NAGAR[]="NEW LAYAL PUR";
$KRISHNA_NAGAR[]="OLD ANARKALI";
$KRISHNA_NAGAR[]="OLD BRIJ PURI"; 
$KRISHNA_NAGAR[]="OLD GOVIND PURA";
$KRISHNA_NAGAR[]="OLD GOVIND PURA & OLD ANARKALI"; 
$KRISHNA_NAGAR[]="OLD GOVIND PURA & SOUTH ANARKALI";
$KRISHNA_NAGAR[]="OLD GOVIND PURA EXTN.";
$KRISHNA_NAGAR[]="PANDIT PARK & EXTN.SHIVAJI GALI KRISHNA NAGAR EXTN.SHIVPURI";                                      
$KRISHNA_NAGAR[]="POLICE COLONY POLICE STATION PREET VIHAR"; 
$KRISHNA_NAGAR[]="RADEHY PURI EXTENSION"; 
$KRISHNA_NAGAR[]="RADHEY PURI";
$KRISHNA_NAGAR[]="RADHEY SHYAM PARK"; 
$KRISHNA_NAGAR[]="RADHEY SHYAM PARK EXTN."; 
$KRISHNA_NAGAR[]="RAM NAGAR";
$KRISHNA_NAGAR[]="RAM NAGAR & RAM NAGAR EXTN."; 
$KRISHNA_NAGAR[]="RAM NAGAR EXTN."; 
$KRISHNA_NAGAR[]="RANI GARDEN"; 
$KRISHNA_NAGAR[]="RANI GARDEN EXTN."; 
$KRISHNA_NAGAR[]="RASHID MARKET"; 
$KRISHNA_NAGAR[]="RASHID MARKET EXTN."; 
$KRISHNA_NAGAR[]="SHAHI MASJID  RASHID/NEW RASHID MARKET  GANESH PARK";                                               
$KRISHNA_NAGAR[]="SHASTRI NAGAR"; 
$KRISHNA_NAGAR[]="SHIV PU"; 
$KRISHNA_NAGAR[]="SHIV PURI EXTN. & SHIV PURI"; 
$KRISHNA_NAGAR[]="SHYAM NAGAR & OLD GOVIND PURA";
$KRISHNA_NAGAR[]="SOUTH ANARKALI";
$KRISHNA_NAGAR[]="SOUTH ANARKALI EXTN."; 
$KRISHNA_NAGAR[]="SOUTH ANARKALI MAIN";
$KRISHNA_NAGAR[]="TAJ ENCLAVE & GEETA COLONY";

	 break;

	case "GANDHI NAGAR":
$GANDHI_NAGAR[]="DHARAMPURA";
$GANDHI_NAGAR[]="EAST AZAD NAGAR"; 
$GANDHI_NAGAR[]="GANDHI NAGAR"; 
$GANDHI_NAGAR[]="KAILASH NAGAR"; 
$GANDHI_NAGAR[]="KANTI NAGAR"; 
$GANDHI_NAGAR[]="KANTI NAGAR (EAST)"; 
$GANDHI_NAGAR[]="KANTI NAGAR EAST AND EAST AZAD NAGAR"; 
$GANDHI_NAGAR[]="KANTI NAGAR EXTENSION"; 
$GANDHI_NAGAR[]="NEW SEELAM PUR"; 
$GANDHI_NAGAR[]="OLD DHARAMPURA"; 
$GANDHI_NAGAR[]="OLD SEELAMPUR"; 
$GANDHI_NAGAR[]="OLD SEELAMPUR (EAST)"; 
$GANDHI_NAGAR[]="RAGHUBARPURA NO 1"; 
$GANDHI_NAGAR[]="RAGHUBARPURA NO 2"; 
$GANDHI_NAGAR[]="RAJGARH COLONY"; 
$GANDHI_NAGAR[]="SARTAJ MOHALLA"; 
$GANDHI_NAGAR[]="SHANKAR NAGAR"; 
$GANDHI_NAGAR[]="SHANKAR NAGAR EXTENSION"; 
$GANDHI_NAGAR[]="SHASTRI PARK"; 
$GANDHI_NAGAR[]="WEST AZAD NAGAR"; 

	 break;

	case "SHAHADARA":
$SHAHADARA[]="BEHARI COLONY"; 
$SHAHADARA[]="BHOLA NATH NAGAR"; 
$SHAHADARA[]="DILSHAD COLONY "; 
$SHAHADARA[]="DILSHAD GARDEN"; 
$SHAHADARA[]="FRIENDS COLONY JHILMIL"; 
$SHAHADARA[]="JHILMI"; 
$SHAHADARA[]="JHILMIL COLONY"; 
$SHAHADARA[]="JHILMIL INDL. AREA"; 
$SHAHADARA[]="JWALA NAGAR"; 
$SHAHADARA[]="SEEMA PURI"; 
$SHAHADARA[]="SHAHDRA"; 
$SHAHADARA[]="VIVEK VIHAR";

	 break;

	case "SEEMA PURI SC": 
$SEEMA_PURI_SC[]="DILASHAD COLONY"; 
$SEEMA_PURI_SC[]="DILSHAD GARDEN"; 
$SEEMA_PURI_SC[]="GTB ENCLAVE"; 
$SEEMA_PURI_SC[]="GTB HOSPITAL CAMPUS"; 
$SEEMA_PURI_SC[]="JAGATPURI EXTN."; 
$SEEMA_PURI_SC[]="JANTA FLATS GTB ENCLAVE"; 
$SEEMA_PURI_SC[]="NAND NAGAR"; 
$SEEMA_PURI_SC[]="NEW SEEMAPUR"; 
$SEEMA_PURI_SC[]="SUNDER NAGAR"; 
$SEEMA_PURI_SC[]="TAHIRPU"; 
$SEEMA_PURI_SC[]="VILL KHERA"; 
$SEEMA_PURI_SC[]="VILL TAHIRPUR";

	 break;

	case "ROHTAS NAGAR":
$ROHTAS_NAGAR[]="A-BLOCK ASHOK NAGAR"; 
$ROHTAS_NAGAR[]="B-BLOCK ASHOK NAGAR"; 
$ROHTAS_NAGAR[]="BHAGWAN PUR KHERA";
$ROHTAS_NAGAR[]="BHAGWAN PUR KHERA RAM NAGAR EXTN.";
$ROHTAS_NAGAR[]="C-1 BLOCK NAND NAGRI";
$ROHTAS_NAGAR[]="C-2 BLOCK NAND NAGRI"; 
$ROHTAS_NAGAR[]="C-3 BLOCK NAND NAGRI"; 
$ROHTAS_NAGAR[]="CHANDER LOK"; 
$ROHTAS_NAGAR[]="D-1 BLOCK ASHOK NAGAR"; 
$ROHTAS_NAGAR[]="D-BLOCK ASHOK NAGAR"; 
$ROHTAS_NAGAR[]="D-BLOCK NATTHU COLONY";
$ROHTAS_NAGAR[]="DURGAPURI";
$ROHTAS_NAGAR[]="DURGAPURI EXTN."; 
$ROHTAS_NAGAR[]="EAST RAM NAGAR";
$ROHTAS_NAGAR[]="EAST ROHTASH NAGAR"; 
$ROHTAS_NAGAR[]="EAST ROHTASH NAGAR SHIVAJI PARK"; 
$ROHTAS_NAGAR[]="E-BLOCK ASHOK NAGAR"; 
$ROHTAS_NAGAR[]="HARDEV PURI";
$ROHTAS_NAGAR[]="JAGAT PURI"; 
$ROHTAS_NAGAR[]="JAGJEEVAN NAGAR"; 
$ROHTAS_NAGAR[]="JHUGGI OPP. B-BLOCK"; 
$ROHTAS_NAGAR[]="KABUL NAGAR";
$ROHTAS_NAGAR[]="LIG FLATS EAST OF LONI ROAD"; 
$ROHTAS_NAGAR[]="MANSAROVER PARK";
$ROHTAS_NAGAR[]="MANSROVER PARK D.D.A. FLATS"; 
$ROHTAS_NAGAR[]="MIG FLATS EAST OF LONI ROAD"; 
$ROHTAS_NAGAR[]="NATHU COLONY"; 
$ROHTAS_NAGAR[]="NAVEEN SHAHDARA"; 
$ROHTAS_NAGAR[]="NEW MODERN SHAHDARA"; 
$ROHTAS_NAGAR[]="PANCHSHEEL GARDEN"; 
$ROHTAS_NAGAR[]="PANCHSHEEL GARDEN SUBHASH PARK"; 
$ROHTAS_NAGAR[]="RAM NAGAR";
$ROHTAS_NAGAR[]="RAM NAGAR EXT.";
$ROHTAS_NAGAR[]="SHIVAJI PARK";
$ROHTAS_NAGAR[]="SHRIRAM NAGAR"; 
$ROHTAS_NAGAR[]="SUBHASH PARK"; 
$ROHTAS_NAGAR[]="ULDHAN PUR PANCHSHEEL GARDEN"; 
$ROHTAS_NAGAR[]="WELCOME SEELAMPUR PH-III";
$ROHTAS_NAGAR[]="WEST ROHTAS NAGAR"; 
$ROHTAS_NAGAR[]="WEST ROHTAS NAGAR MOHAN PARK";

	 break;

	case "SEELAMPUR":
$SEELAMPUR[]="SEELAMPUR"; 
$SEELAMPUR[]="BRAHAMPURI"; 
$SEELAMPUR[]="BRAHMPURI"; 
$SEELAMPUR[]="CHAUHAN BANGAR"; 
$SEELAMPUR[]="GAUTAM PURI"; 
$SEELAMPUR[]="JAFFRABAD"; 
$SEELAMPUR[]="KAITHWARA"; 
$SEELAMPUR[]="MAUJPUR"; 
$SEELAMPUR[]="NEW SEELAMPUR"; 
$SEELAMPUR[]="NEW USMANPUR";
$SEELAMPUR[]="SEELAMPUR"; 
$SEELAMPUR[]="SHASTRI PARK"; 
$SEELAMPUR[]="WELCOME";

	 break;

	case "GHONDA":
$GHONDA[]="4TH PUSTA KARTAR NAGAR J-BLOCK"; 
$GHONDA[]="A-BLOCK BHAJAN PURA"; 
$GHONDA[]="AMBEDKAR BASTI";
$GHONDA[]="AMBEDKAR BASTI GHONDA VILL";
$GHONDA[]="AMBEDKAR MURTI GHONDA VILL";
$GHONDA[]="ARVIND NAGAR"; 
$GHONDA[]="B-1BLOCK YAMUNA VIHAR"; 
$GHONDA[]="B-2BLOCK YAMUNA VIHAR"; 
$GHONDA[]="B-3BLOCK YAMUNA VIHAR"; 
$GHONDA[]="B-4BLOCK YAMUNA VIHAR"; 
$GHONDA[]="B-5BLOCK YAMUNA VIHAR"; 
$GHONDA[]="B-BLOCK BHAJAN PURA";
$GHONDA[]="BHAJAN PURA";
$GHONDA[]="BRAHAMPURI X-BLOCK";
$GHONDA[]="C-1 BLOCK YAMUNA VIHAR"; 
$GHONDA[]="C-10 BLOCK YAMUNA VIHAR"; 
$GHONDA[]="C-12 BLOCK YAMUNA VIHAR"; 
$GHONDA[]="C-2 BLOCK YAMUNA VIHAR"; 
$GHONDA[]="C-3 BLOCK YAMUNA VIHAR"; 
$GHONDA[]="C-4 BLOCK YAMUNA VIHAR"; 
$GHONDA[]="C-5 BLOCK YAMUNA VIHAR"; 
$GHONDA[]="C-6 BLOCK YAMUNA VIHAR"; 
$GHONDA[]="C-7 BLOCK YAMUNA VIHAR"; 
$GHONDA[]="C-8 BLOCK YAMUNA VIHAR"; 
$GHONDA[]="C-9 BLOCK YAMUNA VIHAR"; 
$GHONDA[]="C-BLOCK BHAJAN PURA"; 
$GHONDA[]="D-BLOCK BHAJAN PURA"; 
$GHONDA[]="D-BLOCK SANJAY MOHALLA";
$GHONDA[]="GAMRI EXTN. A-BLOCK";
$GHONDA[]="GAMRI EXTN. C-BLOCK";
$GHONDA[]="GAMRI EXTN. D-BLOCK";
$GHONDA[]="GAMRI VILL.";
$GHONDA[]="GARHI MENDU"; 
$GHONDA[]="GAUTAM VIHAR"; 
$GHONDA[]="GHONDA VILLAGE";
$GHONDA[]="JAGJIT NAGAR D-BLOCK"; 
$GHONDA[]="JAGJIT NAGAR E-BLOCK"; 
$GHONDA[]="JAGJIT NAGAR G-BLOCK"; 
$GHONDA[]="JAI PARKASH NAGAR"; 
$GHONDA[]="KARTAR NAGAR"; 
$GHONDA[]="KARTAR NAGAR J-BLOC"; 
$GHONDA[]="KARTAR NAGAR L K C J-BLOCK";
$GHONDA[]="KHUMARA MOHLLA GHONDA VILL";
$GHONDA[]="SOUTH GAMRIEXTN.";
$GHONDA[]="SOUTH GAMRIEXTN. A-BLOCK";
$GHONDA[]="SOUTH GAMRIEXTN. B-BLOCK";
$GHONDA[]="SUBHASH VIHAR E-BLOCK"; 
$GHONDA[]="SUBHASH VIHAR F-BLOCK";
$GHONDA[]="SUBHASH VIHAR NORTH GHONDA";
$GHONDA[]="USMAN PUR C-BLOCK"; 
$GHONDA[]="USMANPUR"; 
$GHONDA[]="VIJAY COLONY"; 
$GHONDA[]="VILL GHONDA";
$GHONDA[]="VILLAGE USMANPUR"; 
$GHONDA[]="WEST GHONDA K BLOCK";

	 break;

	case "BABARPUR":	
$BABARPUR[]="BABAR PUR VILLAGE (EAST BABAR PUR)"; 
$BABARPUR[]="BALBIR NAGAR & BALBIR NAGAR EXTN."; 
$BABARPUR[]="BALBIR NAGAR & BALBIR NAGAR EXTN. NALA PAR"; 
$BABARPUR[]="BALBIR NAGAR EXTN."; 
$BABARPUR[]="BALBIR NAGAR EXTN. NALA PAR"; 
$BABARPUR[]="CHHAJJUPUR (EAST BABAR PUR)"; 
$BABARPUR[]="D.D.A FLATS WEST GORAKH PARK"; 
$BABARPUR[]="EAST BABARPUR"; 
$BABARPUR[]="EAST GORAKH PARK"; 
$BABARPUR[]="GHONDA EXTN."; 
$BABARPUR[]="GHONDA EXTN. NOOR-E-ILAHI"; 
$BABARPUR[]="HARIJAN BASTI WEST JYOTI NAGAR."; 
$BABARPUR[]="INDIRA NIKETAN"; 
$BABARPUR[]="JANTA MAZDOOR COLONY."; 
$BABARPUR[]="JYOTI COLONY"; 
$BABARPUR[]="JYOTI NAGAR RISHI KARDAM PURI"; 
$BABARPUR[]="KABIR NAGAR"; 
$BABARPUR[]="KARDAM PURI"; 
$BABARPUR[]="KARDAM PURI EXTN."; 
$BABARPUR[]="KARDAM PURI JYOTI NAGAR"; 
$BABARPUR[]="MAUJPUR"; 
$BABARPUR[]="NEW JAFARABAD WEST GORAKH PARK"; 
$BABARPUR[]="NORTH GHONDA"; 
$BABARPUR[]="OLD KARDAM PURI"; 
$BABARPUR[]="SHANTI BAZAR WALA ROAD KABIR NAGAR.";
$BABARPUR[]="SUBHASH MOHALLA NORTH GHONDA";
$BABARPUR[]="VIJAY PARK"; 
$BABARPUR[]="WEST BABARPUR"; 
$BABARPUR[]="WEST GORAKHPARK"; 
$BABARPUR[]="WEST JYOTI NAGAR"; 
$BABARPUR[]="YAMUNA VIHAR";

	 break;

	case "GOKALPUR":	
$GOKALPUR[]="BHAGIRATHI VIHAR";
$GOKALPUR[]="EAST GOKALPUR";
$GOKALPUR[]="GANGA VIHAR";
$GOKALPUR[]="GOKALPURI";
$GOKALPUR[]="HARSH VIHAR";
$GOKALPUR[]="JOHRIPUR";
$GOKALPUR[]="MANDOLI EXTN";
$GOKALPUR[]="MANDOLI VILL.";
$GOKALPUR[]="MEET NAGAR"; 
$GOKALPUR[]="PRATAP NAGAR"; 
$GOKALPUR[]="SABOLI VILL.";
$GOKALPUR[]="SHAKTI GARDEN"; 
$GOKALPUR[]="VILL. GOKALPUR";

	 break;
	 
	case "MUSTAFABAD":
$MUSTAFABAD[]="AMAR VIHAR"; 
$MUSTAFABAD[]="AMBIKA VIHAR";
$MUSTAFABAD[]="BABU NAGAR"; 
$MUSTAFABAD[]="BHAGAT VIHAR"; 
$MUSTAFABAD[]="BHGIRATH VIHAR"; 
$MUSTAFABAD[]="BRIJPURI"; 
$MUSTAFABAD[]="CHANDU NAGAR"; 
$MUSTAFABAD[]="CHOUHAN PUR"; 
$MUSTAFABAD[]="DAYAL PUR"; 
$MUSTAFABAD[]="DEVI NAGAR SHIV VIHAR"; 
$MUSTAFABAD[]="E-BLOCK DAYAL PUR EXTN. NEHRU VIHAR";
$MUSTAFABAD[]="GOVIND VIHAR"; 
$MUSTAFABAD[]="GURU NANAK NAGAR"; 
$MUSTAFABAD[]="HARIJAN BASTI KARAWAL NAGAR";
$MUSTAFABAD[]="HARIJAN BASTI SADATPUR VILL"; 
$MUSTAFABAD[]="HARIJAN BASTI KARAWAL NAGAR";
$MUSTAFABAD[]="KAMAL VIHAR"; 
$MUSTAFABAD[]="KARAWAL NAGAR EXT"; 
$MUSTAFABAD[]="MAAN SINGH NAGAR"; 
$MUSTAFABAD[]="MAHA LAXMI ENCLAVE";
$MUSTAFABAD[]="MAHA LAXMI VIHAR"; 
$MUSTAFABAD[]="MOONGA NAGAR"; 
$MUSTAFABAD[]="MUSTAFABAD";
$MUSTAFABAD[]="MUSTAFABADDILSHAD MASJID";
$MUSTAFABAD[]="MUSTFABAD"; 
$MUSTAFABAD[]="MUSTFABAD EXTN"; 
$MUSTAFABAD[]="NEHRU VIHAR"; 
$MUSTAFABAD[]="OLD MUSTAFABAD";
$MUSTAFABAD[]="PANCHAL VIHAR"; 
$MUSTAFABAD[]="PREM NAGAR KARAWAL NAGAR"; 
$MUSTAFABAD[]="PREM VIHAR"; 
$MUSTAFABAD[]="RAJIV GANDI NAGAR NEW MUSTAFABAD";
$MUSTAFABAD[]="RAJIV GANDI NAGARNEW MUSTAFABAD"; 
$MUSTAFABAD[]="RAMA GARDEN"; 
$MUSTAFABAD[]="ROSHAN VIHAR"; 
$MUSTAFABAD[]="SADATPUR EXTN."; 
$MUSTAFABAD[]="SHAKTI VIHAR"; 
$MUSTAFABAD[]="SHIV VIHAR";
$MUSTAFABAD[]="SHIV VIHARPUSHKAR VIHAR"; 
$MUSTAFABAD[]="SURIYA VIHAR"; 
$MUSTAFABAD[]="ZIAUDDIN PUR";
 
	 break;
	 
	case "KARAWAL NAGAR": 
$KARAWAL_NAGAR[]="A - BLOCK PART - II SONIA VIHAR"; 
$KARAWAL_NAGAR[]="A - BLOCK PART - III & IV SONIA VIHAR"; 
$KARAWAL_NAGAR[]="A - BLOCK SONIA VIHAR"; 
$KARAWAL_NAGAR[]="A & B - BLOCK SONIA VIHAR"; 
$KARAWAL_NAGAR[]="A & B BLOCK SONIA VIHAR"; 
$KARAWAL_NAGAR[]="A BLOCK PART - II SONIA VIHAR"; 
$KARAWAL_NAGAR[]="A BLOCK SONIA VIHAR"; 
$KARAWAL_NAGAR[]="ANKUR ENCLAVE"; 
$KARAWAL_NAGAR[]="ANKUR ENCLAVE PRAKASH VIHAR"; 
$KARAWAL_NAGAR[]="B - BLOCK SONIA VIHAR";
$KARAWAL_NAGAR[]="BADARPUR KHADAR PUR DELHI SHAHDRA";
$KARAWAL_NAGAR[]="BIHARIPUR EXTN"; 
$KARAWAL_NAGAR[]="BIHARIPUR VILL"; 
$KARAWAL_NAGAR[]="C - BLOCK SONIA VIHAR"; 
$KARAWAL_NAGAR[]="CHANDBAGH";
$KARAWAL_NAGAR[]="CHAUHAN PATTI SABHAPUR SHAHDARA VILL"; 
$KARAWAL_NAGAR[]="D - BLOCK SONIA VIHAR"; 
$KARAWAL_NAGAR[]="DAYAL PUR"; 
$KARAWAL_NAGAR[]="E - BLOCK SONIA VIHAR"; 
$KARAWAL_NAGAR[]="G - BLOCK SONIA VIHAR"; 
$KARAWAL_NAGAR[]="KARAWAL NAGAR VILLAGE"; 
$KARAWAL_NAGAR[]="KHAJOORI KHAS";
$KARAWAL_NAGAR[]="MUKUND VIHAR"; 
$KARAWAL_NAGAR[]="NEW SABHAPUR"; 
$KARAWAL_NAGAR[]="SABHAPUR SHAHDARA VILL"; 
$KARAWAL_NAGAR[]="SABHAPUR VILL & CHAUHAN PATT";
$KARAWAL_NAGAR[]="SADATPUR EXTN"; 
$KARAWAL_NAGAR[]="SHAHID BHAGAT SINGH COLONY"; 
$KARAWAL_NAGAR[]="SHERPUR VILL";
$KARAWAL_NAGAR[]="SHRI RAM COLONY"; 
$KARAWAL_NAGAR[]="TUKMIRPUR & VILL"; 
$KARAWAL_NAGAR[]="TUKMIRPUR EXTN"; 
$KARAWAL_NAGAR[]="VILL KHAJOORI KHAS"; 
$KARAWAL_NAGAR[]="WEST KAMAL VIHAR"; 
$KARAWAL_NAGAR[]="WEST KARAWAL NAGAR";

		    break;

	default:
			break;
 
} 
			break;
	default:
			break;
}//nested switch
$hint = "";
$size=sizeof(${$arn_});
//strstr() for case sensitive
// lookup all hints from array if $tl is different from "" 
if ($tl !== "" && $size>0){
$j=0; 
    $len=strlen($tl);
//creating dynamic variables: WRAP in ${}	
	
    foreach(${$arn_} as $name){
        if (stristr($tl, substr($name, 0, $len))) { 
$qu=mysqli_query($GLOBALS['conn'],"SELECT localityId FROM localities WHERE localityName='$name'");
$n=mysqli_num_rows($qu);
//if($n==0){
    $hint = "$name";  
//Return each stateName separated by a newline.
echo '<div id="search_link111" class="confirmlo'.$j.'" onclick="javascript:confirmlosel(\'confirmlo'.$j.'\');">'.$hint.'</div>';
$j++; 
//}else{} 
        } 
    }
  } 
}
}
}else if($str==='addlo'){$image= Sanitize($_POST['image']);$desc= Sanitize($_POST['desc']);
$cf= Sanitize($_POST['cf']); 
//i is arid
$i= Sanitize($_POST['i']); 
//j is stid
$j= Sanitize($_POST['j']); 
if($cf==0){
	echo 'f'; 	exit();
}else{
//tlocation is name of locality
$tl_=trim($_POST['tlocation']);
if(!empty($tl_)){ 
$tl= trim(Sanitize($_POST['tlocation']));
//Check for normal unwanted entries  
$del=mysqli_query($GLOBALS['conn'],"DELETE FROM localities l WHERE areaId=0 OR stateId=0 OR NOT EXISTS(SELECT areaId FROM areas a WHERE a.areaId=l.areaId) OR NOT EXISTS(SELECT stateId FROM states s WHERE s.stateId=l.stateId)");
$qu=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE areaId='$i' AND stateId='$j' AND localityName='$tl'");
$hw=mysqli_num_rows($qu);
if($hw==0){ 
$q=mysqli_query($GLOBALS['conn'],"INSERT INTO localities(stateId,areaId,localityName,localityPic,localityDesc) VALUES('$j','$i','$tl','$image',$desc'')");
$q1=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE areaId='$i' AND stateId='$j' AND localityName='$tl'");
$numin=mysqli_num_rows($q1); 
	if($numin==1){
		echo $j.','.$i;
	}else{
		echo 'f';	exit();
	}  
}else if($hw==1){ $r=mysqli_fetch_assoc($qu);$lid=$r['localityId'];$q=mysqli_query($GLOBALS['conn'],"UPDATE localities SET localityPic='$image', localityDesc='$desc' WHERE localityId='$lid'");}else{
	echo 'f';	exit();
}
}else{
	echo 'f';	exit();
	}
 }
//delete locality setup
}else if($str==='delos'){ 
$i= Sanitize($_POST['i']);
//j is  localityName
$j= Sanitize($_POST['j']);
//k is stateId
$k= Sanitize($_POST['k']);
//i is areaId 
$q=mysqli_query($GLOBALS['conn'],"SELECT localityId FROM localities WHERE localityName='$j' and areaId='$i' AND stateId='$k'");
$nq=mysqli_num_rows($q);
if($nq==1){
$q_=mysqli_fetch_assoc($q);
$locId=$q_['localityId']; 
$tj=trim($j);
if(empty($tj)){
	$j='Locality';
}
if(strlen($j)>50){
			$j=substr($j,0,50).'...';
		} 
	echo '<div id="tbox_nordel" onclick="advanced(\''.$k.','.$j.','.$locId.'\',\'delo\');"><h3>Delete<br><strong>-</strong></h3><p>'.$j.'</p></div>'; 
}else{
	echo 'f';	exit();
}
}else if($str==='delo'){ 
$i= Sanitize($_POST['i']);
//i is locId   
$j= Sanitize($_POST['j']);
//j is LocName   
$k= Sanitize($_POST['k']);
//k is stId   
$state1=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities");
$n1=mysqli_num_rows($state1);
$e=mysqli_query($GLOBALS['conn'],"SELECT areaId FROM localities WHERE localityId='$i' AND stateId='$k'");
$e_num=mysqli_num_rows($e);  
//echo "nUm=".$e_num;
if($e_num==1){ 
	$e_=mysqli_fetch_assoc($e); 
	$aId=$e_['areaId'];
$q=mysqli_query($GLOBALS['conn'],"DELETE FROM localities WHERE localityId = '$i' AND stateId='$k' AND localityName='$j'");
$state2=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities");
$n2=mysqli_num_rows($state2);
if(($n1-$n2)!=1){
	$q=mysqli_query($GLOBALS['conn'],"INSERT INTO localities(stateId,localityName,localityId,areaId) VALUES('$k','$j','$i','$aId')");
	echo 'f';	exit();
}else{ 
	echo $k.','.$aId;
}
}else{
	echo 'f';	exit();
} 
}else if($str==='areas'){
//i is stid
$entryId= Sanitize($_POST['i']); 
	$stn="Circle";
	$q2=mysqli_query($GLOBALS['conn'],"SELECT stateName FROM states WHERE stateId= '$entryId'");
	$num2=mysqli_num_rows($q2);  
	if($num2>0){ 
	$q_r2=mysqli_fetch_assoc($q2);
	$stn=$q_r2['stateName'];
	if(strlen($stn)>50){ 
			$stn=substr($stn,0,50).'...'; 
		} 
	}
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE stateId= '$entryId'");
	$num=mysqli_num_rows($q);  
	if($num>0){  
		while($q_r=mysqli_fetch_assoc($q)){
	    $tId=$q_r['areaId']; 
	    $tn=$q_r['areaName'];  
		if(strlen($tn)>50){
			$tn=substr($tn,0,50).'...';
		} 
	$q1=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE areaId= '$tId'");
	$n1=mysqli_num_rows($q1);
	echo '<div id="tbox" onclick="javascript:advanced(\''.$entryId.','.$tId.'\',\'locs\');"><h3><br><strong class="sfonts">'.$tn.'</strong></h3><p>'.$n1.'</p><p id="sub_p">localities</p></div>';  
		}  
	} 
	echo '<div id="tbox_nor" onclick="advanced(\''.$entryId.'\',\'addars\');"><h3>Add<br><strong>+</strong></h3><p>New Area</p></div>'; 
	echo '<div id="tbox_nordel" onclick="advanced(\''.$entryId.'\',\'dels\');"><h3>Delete<br><strong>-</strong></h3><p>'.$stn.'</p></div>';
}else if($str=='areas1'){
//i is stid
$entryId= Sanitize($_POST['i']); 
//$vari=0;
	$stn="Circle";
	$q2=mysqli_query($GLOBALS['conn'],"SELECT stateName FROM states WHERE stateId= '$entryId'");
	$num2=mysqli_num_rows($q2);  
	if($num2>0){ 
	$q_r2=mysqli_fetch_assoc($q2);
	$stn=$q_r2['stateName'];
	if(strlen($stn)>50){
			$stn=substr($stn,0,50).'...';
		} 
	}
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE stateId= '$entryId'");
	$num=mysqli_num_rows($q);  
	if($num>0){  
		while($q_r=mysqli_fetch_assoc($q)){
	    $tId=$q_r['areaId']; 
	    $tn=$q_r['areaName'];   
		if(strlen($tn)>50){
			$tn=substr($tn,0,50).'...';
		}
	$q1=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE currentNeedId!= 0 AND currentNeedId IN(
	SELECT DISTINCT currentNeedId FROM currentneeds WHERE freeze=0 AND localityId IN (
		SELECT DISTINCT localityId FROM daanvaq7_vifixes_daanvir.areas WHERE areaId='$tId')
		)
	AND currentNeedId IS NOT NULL AND confirmed=1");
	$n1=mysqli_num_rows($q1); 
		/*$q2=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE customNeedId!= 0  
	AND customNeedId IS NOT NULL AND confirmed=1");
	//$n2=mysqli_num_rows($q2);*/
	
	
	/*	$q3=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE catfilledId!= 0  
	AND catfilledId IS NOT NULL AND confirmed=1");
	$n3=mysqli_num_rows($q3);
	*/
	/////////////
	
	$q11=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE currentNeedId!= 0 AND currentNeedId IN(
	SELECT DISTINCT currentNeedId FROM currentneeds WHERE freeze=0 AND localityId IN (
		SELECT DISTINCT localityId FROM daanvaq7_vifixes_daanvir.areas WHERE areaId='$tId')
		)
	AND currentNeedId IS NOT NULL AND processed=1");
	$n11=mysqli_num_rows($q11); 
/*	$q21=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE customNeedId!= 0  
	AND customNeedId IS NOT NULL AND processed=1");
	$n21=mysqli_num_rows($q21);*/
/*	$q31=mysqli_query($GLOBALS['conn2'],"
	SELECT * FROM currfillmethod 
	WHERE catfilledId!= 0  
	AND catfilledId IS NOT NULL AND processed=1");
	$n31=mysqli_num_rows($q31);*/
	      	$percent=0;	if($n1 > 0){	$percent = round(($n11 / $n1)*100,2);	}	echo '<div id="tbox" onclick="javascript:advanced(\''.$entryId.','.$tId.'\',\'locs1\');"><h3><br><strong class="sfonts">'.$tn.'</strong></h3><p><br>Filled: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$n1."<br><br>Processed: ".$n11.'</p><hr><p id="sub_p" style="color:#fff;">'.$percent.'%</p></div>'; 	//echo '<div id="tbox" onclick="javascript:advanced(\''.$entryId.','.$tId.'\',\'locs1\');"><h3><br><strong class="sfonts">'.$tn.'</strong></h3><p>'.$n1." / ".($n2+$n3).' = '.$n11.' / '.($n21+$n31).'</p><p id="sub_p">available</p></div>';  
		}  
	}
}else if($str==='addar'){
$cf= Sanitize($_POST['cf']);
//i is stid 
$i= Sanitize($_POST['i']); 
if($cf==0){
	echo 'f'; 	exit();
}else{
$tl_=trim($_POST['tlocation']);
//tlocation is name of area
if(!empty($tl_)){ 
$tl= trim(Sanitize($_POST['tlocation'])); 
$qu=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE stateId='$i' AND areaName='$tl'");
$hw=mysqli_num_rows($qu);
if($hw==0){ 
$q=mysqli_query($GLOBALS['conn'],"INSERT INTO areas(stateId,areaName) VALUES('$i','$tl')");
$q1=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE stateId='$i' AND areaName='$tl'");
$numin=mysqli_num_rows($q1); 
	if($numin==1){
		echo $i;
	}else{
		echo 'f';	exit();
	}  
}else{
	echo 'f';	exit();
}
}else{
	echo 'f';	exit();
	}
 }
//delete locality setup
}else if($str==='addars'){
$i= Sanitize($_POST['i']);
	echo '<input class="arentry" onkeyup="javascript:advanced(\''.$i.'\',\'arup\');" type="text" id="fill_match" placeholder="Area Name"><button id="find_match" onclick="javascript:advanced('.$i.',\'addar\');">Add</button><div id="search_suggest1111"></div><input type="hidden" class="confirmarsel" value="0">';  
}else if($str==='arup'){ 
$tl= Sanitize($_POST['tlocation']);
$tl=strtolower($tl);
$tl=trim($tl); 
$i= Sanitize($_POST['i']);
$sn=mysqli_query($GLOBALS['conn'],"SELECT stateName FROM states WHERE stateId='$i'");
$n=mysqli_num_rows($sn);
if($n==1){
	$sn_fetch=mysqli_fetch_assoc($sn);
	$stn=$sn_fetch['stateName']; 
	$stn_=str_replace(" ","_",strtoupper($stn)); 
	${$stn_}=array();
	switch($stn_){
		case "DELHI":
//DELHI DB 

$DELHI[] = "NARERLA";
$DELHI[] = "BURARI";
$DELHI[] = "TIMARPUR";
$DELHI[] = "ADARSH NAGAR";
$DELHI[] = "BADLI";
$DELHI[] = "RITHALA";
$DELHI[] = "BAWANA SC";
$DELHI[] = "MUNDKA";
$DELHI[] = "KIRARI";
$DELHI[] = "SULTANPUR MAJRA";
$DELHI[] = "NANGLOI JAT";
$DELHI[] = "MANGOL PURI SC";
$DELHI[] = "ROHINI";
$DELHI[] = "SHALIMAR BAGH";
$DELHI[] = "SHAKUR BASTI";
$DELHI[] = "TRI NAGAR";
$DELHI[] = "WAZIRPUR";
$DELHI[] = "MODEL TOWN";
$DELHI[] = "SADAR BAZAR";
$DELHI[] = "CHANDNI CHOWK";
$DELHI[] = "MATIA MAHAL";
$DELHI[] = "BALLIMARAN";
$DELHI[] = "KAROL BAGH SC";
$DELHI[] = "PATEL NAGAR";
$DELHI[] = "MOTI NAGAR";
$DELHI[] = "MADIPUR SC";
$DELHI[] = "RAJOURI GARDEN";
$DELHI[] = "HARI NAGAR";
$DELHI[] = "TILAK NAGAR";
$DELHI[] = "JANAK PURI";
$DELHI[] = "VIKASPURI";
$DELHI[] = "UTTAM NAGAR";
$DELHI[] = "DWARKA";
$DELHI[] = "MATIALA";
$DELHI[] = "NAJAFGARH";
$DELHI[] = "BIJWASAN";
$DELHI[] = "PALAM";
$DELHI[] = "DELHI CANTT";
$DELHI[] = "RAJENDRA NAGAR";
$DELHI[] = "NEW DELHI";
$DELHI[] = "JANGPURA";
$DELHI[] = "KASTURBA NAGAR";
$DELHI[] = "MALVIYA NAGAR";
$DELHI[] = "R K PURAM";
$DELHI[] = "MEHRAULI";
$DELHI[] = "CHHATARPUR";
$DELHI[] = "DEOLI SC";
$DELHI[] = "AMBEDKAR NAGAR SC";
$DELHI[] = "SANGAM VIHAR";
$DELHI[] = "GREATER KAILASH";
$DELHI[] = "KALKAJI BHARAT NAGAR";
$DELHI[] = "TUGHLAKABAD";
$DELHI[] = "BADARPUR";
$DELHI[] = "OKHLA";
$DELHI[] = "TRILOKPURI SC";
$DELHI[] = "KONDLI";
$DELHI[] = "PATPARGANJ";
$DELHI[] = "LAXMI NAGAR";
$DELHI[] = "VISHWAS NAGAR";
$DELHI[] = "KRISHNA NAGAR";
$DELHI[] = "GANDHI NAGAR";
$DELHI[] = "SHAHADARA";
$DELHI[] = "SEEMA PURI SC";
$DELHI[] = "ROHTAS NAGAR";
$DELHI[] = "SEELAMPUR";
$DELHI[] = "GHONDA";
$DELHI[] = "BABARPUR";
$DELHI[] = "GOKALPUR"; 
		break;
		 
	default:
		break;
	
	}  
$size=sizeof(${$stn_});
$hint = "";
//strstr() for case sensitive
// lookup all hints from array if $tl is different from "" 
if ((!empty($tl)) && $size > 0){
$i=0; 
    $len=strlen($tl);
    foreach(${$stn_} as $name){ 
        if (stristr($tl, substr($name, 0, $len))) { 
$qu=mysqli_query($GLOBALS['conn'],"SELECT areaId FROM areas a WHERE areaName='$name' AND EXISTS(SELECT stateId FROM states s WHERE a.stateId=s.stateId)");
$n=mysqli_num_rows($qu);
if($n==0){
    $hint = $name;  
//Return each stateName separated by a newline.
echo '<div id="search_link11" class="confirmar'.$i.'" onclick="javascript:confirmarsel(\'confirmar'.$i.'\');">'.$hint.'</div>';
$i++; 
}else{
	echo '<div id="search_link11">Not Found!</div>';
} 
        } 
    }
}else{
	
} 
}
}
/* NOT CURRENTLY USED
else if($str==='delars'){ 
$i= Sanitize($_POST['i']);
//i is areaname
$q=mysqli_query($GLOBALS['conn'],"SELECT areaId FROM areas WHERE areaName='$i'");
$nq=mysqli_num_rows($q);
if($nq==1){
$q_=mysqli_fetch_assoc($q);
$locId=$q_['areaId']; 
if(empty(trim($locId))){
	$locId='Area';
}
if(strlen($i)>10){
	$i=substr($i,0,10).'...';
		} 
	echo '<div id="tbox_nordel" onclick="advanced(\''.$locId.'\',\'delar\');"><h3>Delete<br><strong>-</strong></h3><p>'.$i.'</p></div>'; 
}else{
	echo 'f';
}
}
*/
else if($str==='delar'){ 
$i= Sanitize($_POST['i']); 
$hasLocs=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE areaId='$i'");
$num_has=mysqli_num_rows($hasLocs);
if($num_has==0){
$state1=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas");
$n1=mysqli_num_rows($state1);
$e=mysqli_query($GLOBALS['conn'],"SELECT stateId,areaName FROM areas WHERE areaId='$i'");
$e_num=mysqli_num_rows($e); 
//echo "nUm=".$e_num;
if($e_num==1){
	$e_=mysqli_fetch_assoc($e);
	$eId=$e_['stateId'];
	$en=$e_['areaName'];
$q=mysqli_query($GLOBALS['conn'],"DELETE FROM areas WHERE areaId = '$i' AND stateId='$eId'");
$state2=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas");
$n2=mysqli_num_rows($state2);
if(($n1-$n2)!=1){
	$q=mysqli_query($GLOBALS['conn'],"INSERT INTO areas(stateId,areaName) VALUES('$eId','$en')");
	echo 'f';	exit();
}else{ 
	
	echo $eId;
}
}else{
	echo 'f';	exit();
}
}else{
	echo 'f';	exit();
}  
}else if($str==='T'){ 
$areaid= Sanitize($_POST['ai']);
//i need area-id 
 //Header 
 $title="Teams";
 $an=null;
$areaname=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE areaId='$areaid'");
$n1=mysqli_num_rows($areaname);
if($n1==1){
	$row=mysqli_fetch_assoc($areaname);
	$an=$row['areaName'];
	$an=" | ".$an;
}
$data=null;

$teams=mysqli_query($GLOBALS['conn2'],"SELECT * FROM teams WHERE localityId IN(
SELECT DISTINCT localityId from daanvaq7_vifixes_daanvir.areas WHERE areaId='$areaid'
)");
$nt=mysqli_num_rows($teams);
$i=0; 
if($nt>=1){
	while($rowt=mysqli_fetch_assoc($teams)){
		$tn=$rowt['teamName'];
		$entry=$rowt['entryID'];
		$lId=$rowt['localityId']; 
		$ln=mysqli_query($GLOBALS['conn'],"SELECT localityName FROM localities WHERE localityId='$lId'");
	$nt1=mysqli_num_rows($ln);
	if($nt1==1){
		$rowl=mysqli_fetch_assoc($ln);
		$lname=$rowl['localityName'];
	}
	$m=mysqli_query($GLOBALS['conn2'],"SELECT * FROM team_members WHERE entryID='$entry'");
	$numm=mysqli_num_rows($m);
		$i=$i+1;
		$data_="
	<tr>
		<td>".$i."</td>
		<td>".$lname."</td>
		<td>".$tn."</td>
		<td><button type=\"button\" onclick=\"opener.advanced(".$entry.",'vt');window.close();\">  ".$numm."  </button></td>
	</tr>";
		$data=$data.$data_; 
	} 
}
 echo'
 <!DOCTYPE html>
 <html>
 <head>
  <title>TEAMS PRINT</title>
  <meta charset="UTF-8"> 
 <style type="text/css">
 header{
	 font-size:30px;
	 padding-top:5px;
	 padding-bottom:5px;
	 color:#fff;
	 text-align:center;
	 width:100%;
	 background:skyblue;
 }
 #main_table{
	 width:100%;
	 height:auto; 
	 border:1px solid #fff;
	 text-align:center;
	 border-spacing:0.8em;
 }
 tr { 
	 width:100%;
	 height:auto; 
 }
 td{
	 background:#fff;
	 height:auto;
	 width:24%;
	 font-size:18px; 
 }
 .fhigh{  
 padding-bottom: 0.2em;
 padding-top: 0.2em;
 text-decoration:underline;
	 margin-top:5px; 
	 font-size:25px;
	 color:black;
 } 
 </style>
 </head>
 <body>
 <header>'.$title.$an.'</header> 
 <table id="main_table">
	<tr>
		<td class="fhigh">Serial</td>
		<td class="fhigh">Locality</td>
		<td class="fhigh">Team Name</td>
		<td class="fhigh">Members</td><br>
	</tr>
	'.$data.'
 </table>
 </body>
 </html>
 '; 
}else if($str==='AC'){ 
$areaid= Sanitize($_POST['ai']);
 //i need area-id 
 //Header 
 $title="Available Current Needs";
 $an=null;
$areaname=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE areaId='$areaid'");
$n1=mysqli_num_rows($areaname);
if($n1==1){
	$row=mysqli_fetch_assoc($areaname);
	$an=$row['areaName'];
	$an=" | ".$an;
}
$data=null; 
$cns=mysqli_query($GLOBALS['conn2'],"SELECT * FROM currentneeds WHERE localityId IN(
SELECT DISTINCT localityId from daanvaq7_vifixes_daanvir.areas WHERE areaId='$areaid'
) AND freeze=0");
?>
<!DOCTYPE html>
	<html>
		<head>		 
 <title>CURRENT NEEDS PRINT</title>
 <meta charset="UTF-8"> 
	 <script src="../js/jquery.min.js" type="text/javascript"></script>
	  
<?php 
//include 'advfn.php';
 ?>
 <style type="text/css">
 header{
	 font-size:30px;
	 padding-top:5px;
	 padding-bottom:5px;
	 color:#fff;
	 text-align:center;
	 width:100%;
	 background:skyblue;
 }
 #main_table{
	 width:100%;
	 height:auto; 
	 border:1px solid #fff;
	 text-align:center;
	 border-spacing:1.2em;
 }
 tr { 
	 width:100%;
	 height:auto; 
 }
 td{
	 background:#fff;
	 height:auto;
	 width:20%;
	 font-size:18px; 
 }
 .openlink{
	cursor:pointer;
	 color:blue;
 } 
 .fhigh{  
 padding-bottom: 0.2em;
 padding-top: 0.2em;
 text-decoration:underline;
	 margin-top:5px; 
	 font-size:25px;
	 color:black;
 } 
 .expanded{
	 width:45.5%;
 }
 .serial{
	 width:12%;
 }
		</style> 
	</head>
		<body> 
	<header><?php echo $title.$an ; ?></header> 
		<table id="main_table">
			<tr>
				<td class="fhigh serial">Serial</td>
				<td class="fhigh">Localities</td>
				<td class="fhigh expanded">Current Needs</td>
				<td class="fhigh">Available</td> 
			</tr> 
<?php
//include 'advfn.php';
//echo file_get_contents("advfn.php");
$nt=mysqli_num_rows($cns);
$i=0;
if($nt>=1){
	while($rowt=mysqli_fetch_assoc($cns)){
		$desc=$rowt['currentNeedDesc'];
		$currId=$rowt['currentNeedId'];
		$lId=$rowt['localityId']; 
		$qnty=$rowt['qnty']; 
		$unit=$rowt['qnty_unit']; 
		$ln=mysqli_query($GLOBALS['conn'],"SELECT localityName FROM localities WHERE localityId='$lId'");
	$nt1=mysqli_num_rows($ln);
	if($nt1==1){
		$rowl=mysqli_fetch_assoc($ln);
		$lname=$rowl['localityName'];
	}
	$fillers=mysqli_query($GLOBALS['conn2'],"SELECT * FROM currfillmethod WHERE currentNeedId='$currId' AND confirmed=1 AND processed=0");
	$filled=mysqli_num_rows($fillers);
	$bluer=null;
	$ext=null;
	if($filled>0){
		$bluer='class="openlink"';
		$ext=1;
	} 
	$i=$i+1;
if($ext==1){ 
	
	echo '<tr>'
	,'	<td class="serial'.$i.'">'.$i.'</td>'
	,'	<td>'.$lname.'</td>'
	,'	<td class="expanded">'.$desc.'</td>'
	,'	<td '.$bluer.'>';
	//use opener. to call a parent window function
	echo '<button type="button" id="getUser00X'.$i.'" onclick="opener.advanced('.$currId.',\'vcs\');window.close();';

	echo '">'.$filled.' / '.$qnty.' '.$unit.'</button>'
		,' </td>'
	,'	</tr>';
	
	//onclick="advanced('.$currId.',\'vcs\')"
	//advanced('.$currId.',\'vcs\')
	//getUser($i);
	//<a href="javascript:advanced('.$currId.',\'vcs\')"></a>;
}else{
	$data_='
	<tr>
		<td class="serial">'.$i.'</td>
		<td>'.$lname.'</td>
		<td class="expanded">'.$desc.'</td>
		<td '.$bluer.'>'.$filled.' / '.$qnty.' '.$unit.'</td>
	</tr>';
	 echo $data_;
		}	    
	}
} 
?> 
 </table>
<?php
	//<script src='../js/advn.js'></script>
	//echo file_get_contents("advfn.php"); ?> 
	</body>
 </html>  
 <?php
}else if($str==='vcs'){ 
$currid= Sanitize($_POST['ai']);  

$fill=mysqli_query($GLOBALS['conn2'],"SELECT currentNeedDesc FROM currentneeds WHERE currentNeedId='$currid' AND freeze=0");

$srow=mysqli_fetch_assoc($fill); 
$title=$srow['currentNeedDesc'];
$an=null; 

?>

<!DOCTYPE html>
	<html>
		<head>		 
 <title>CURRENT NEEDS FILLER PRINT</title>
 <meta charset="UTF-8"> 
	 <script src="../js/jquery.min.js" type="text/javascript"></script>
	   
 <style type="text/css">
 header{
	 font-size:30px;
	 padding-top:5px;
	 padding-bottom:5px;
	 color:#fff;
	 text-align:center;
	 width:100%;
	 background:skyblue;
 }
 #main_table{
	 width:100%;
	 height:auto; 
	 border:1px solid #fff;
	 text-align:center;
	 border-spacing:1.2em;
 }
 tr { 
	 width:100%;
	 height:auto; 
 }
 td{
	 background:#fff;
	 height:auto;
	 width:10%;
	 font-size:16px; 
 }
 .openlink{
	cursor:pointer;
	 color:blue;
 } 
 .fhigh{  
 padding-bottom: 0.2em;
 padding-top: 0.2em;
 text-decoration:underline;
	 margin-top:5px; 
	 font-size:22px;
	 color:black;
 } 
 .expanded{
	 width:40%;
 }
 .serial{
	 width:5%;
 }
		</style> 
	</head>
		<body> 
	<header>
	
<?php echo $title.$an ; ?></header> 
		<table id="main_table">
			<tr>
				<td class="fhigh serial">Serial</td>
				<td class="fhigh">Name</td>
				<td class="fhigh expanded">Address</td>
				<td class="fhigh">Email</td> 				<td class="fhigh">Phone</td> 				<td class="fhigh">Order Date</td> 
			</tr> 
<?php
$filler=mysqli_query($GLOBALS['conn2'],"SELECT * FROM needfiller WHERE needFillerId IN (SELECT DISTINCT needFillerId FROM currfillmethod WHERE currentNeedId='$currid')");
$n=mysqli_num_rows($filler); 
if($n>=1){ 
$i=0;
	while($row=mysqli_fetch_assoc($filler)){
		$i=$i+1;
		$name=$row['name']; 
		$email=$row['email'];
		$phone=$row['phone'];
		$state=$row['state'];
		$city=$row['city'];
		$address=$row['address']; 
		$near=$row['near'];		$zip=$row['zip']; 		$date=$row['date']; 
		//$from=$row['from_'];
		//$before=$row['before_']; 
		//$desc=$row['text_asdesc'];
		//$bgift=$row['biggift'];
		//Grouping
		
		if(empty($email)){
			$email=" - ";
		} 
		if(empty($phone)){
			$phone=" - ";
		} 
		if(empty($bgift)){
			$bgift=" - ";
		} 
		if(empty($desc)){
			$desc=" - ";
		} 
		 
		
		if(empty($name)){
			$name="Anonymous";
		} 
		if(empty($address)){
			$address=" - ";
		}
		if(empty($near)){
			$near=" - ";
		}
		if(empty($city)){
			$city=" - ";
		} 
		if(empty($state)){
			$state=" - ";
		}		if(empty($zip)){			$zip=" - ";		}		if(empty($date)){			$date=" - ";		}
		$complete_addr=$address.', NEAR:'.$near.', CITY:'.$city.', STATE:'.$state.', ZIP:'.$zip;
		   
		//echo data here..
			
	echo '<tr>'
	,'	<td class="serial'.$i.'">'.$i.'</td>'
	,'	<td>'.$name.'</td>'
	,'	<td class="expanded">'.$complete_addr.'</td>'
	,'	<td>'.$email.'</td>'
	,'	<td>'.$phone.'</td>'
	,'	<td>'.$date.'</td>' 
	,'	</tr>'
	;
	}
}//n 
?>
	</body>
 </html>  
<?php
}else if($str==='AO'){ /*
$areaId= Sanitize($_POST['ai']);   
 $title="Available Other Needs";
 $an=null;
 
 $cns=mysqli_query($GLOBALS['conn2'],"SELECT * FROM customneeds WHERE customNeedId IN (
 SELECT DISTINCT customNeedId FROM currfillmethod WHERE  confirmed=1 AND processed=0)"); 

?>
<!DOCTYPE html>
	<html>
		<head>		 
 <title>OTHER NEEDS PRINT</title>
 <meta charset="UTF-8"> 
	 <script src="../js/jquery.min.js" type="text/javascript"></script>
	  
<?php 
//include 'advfn.php';
 ?>
 <style type="text/css">
 header{
	 font-size:30px;
	 padding-top:5px;
	 padding-bottom:5px;
	 color:#fff;
	 text-align:center;
	 width:100%;
	 background:skyblue;
 }
 #main_table{
	 width:100%;
	 height:auto; 
	 border:1px solid #fff;
	 text-align:center;
	 border-spacing:1.2em;
 }
 tr { 
	 width:100%;
	 height:auto; 
 }
 td{
	 background:#fff;
	 height:auto;
	 width:20%;
	 font-size:18px; 
 }
 .openlink{
	cursor:pointer;
	 color:blue;
 } 
 .fhigh{  
 padding-bottom: 0.2em;
 padding-top: 0.2em;
 text-decoration:underline;
	 margin-top:5px; 
	 font-size:25px;
	 color:black;
 } 
 .expanded{
	 width:45.5%;
 }
 .serial{
	 width:12%;
 }
		</style> 
	</head>
		<body> 
	<header><?php echo $title.$an ; ?></header> 
		<table id="main_table">
			<tr>
				<td class="fhigh serial">Serial</td>
				<td class="fhigh">Name</td>
				<td class="fhigh expanded">Description</td>
				<td class="fhigh">Qnty</td> 
			</tr> 
<?php 
$cnscat=mysqli_query($GLOBALS['conn2'],"SELECT * FROM categoryneedsfilled WHERE catfilledId IN (
 SELECT DISTINCT catfilledId FROM currfillmethod WHERE  confirmed=1 AND processed=0)"); 

$j=0;
$ntcat=mysqli_num_rows($cnscat);
if($ntcat>0){
	while($rowc=mysqli_fetch_assoc($cnscat)){ 
	$j=$j+1;
		$typeid=$rowc['categoryNeed_typeId'];
		$catid=$rowc['catfilledId'];
		$sex=$rowc['sex'];
		$size=$rowc['size'];
		$qnty=$rowc['qnty'];
		$desc=$rowc['t_desc'];
		if(empty($sex)){
			$sex=' - ';
		}
		if(empty($size)){
			$size=' - ';
		}
		if(empty($desc)){
			$desc=' - ';
		}
		if(empty($qnty)){
			$qnty=' - ';
		}
	
$cnscat1=mysqli_query($GLOBALS['conn2'],"SELECT categoryNeed_typeName,categoryNeedId  FROM categoryneedtypes WHERE categoryNeed_typeId='$typeid'");

//child cat name   
$childcat=null;
$idgetchild=null;
$ntcat1=mysqli_num_rows($cnscat1);
if($ntcat1>=1){
	$rowc1=mysqli_fetch_assoc($cnscat1); 
	$childcat=$rowc1['categoryNeed_typeName'];
	$idgetchild=$rowc1['categoryNeedId']; 
	}
//parent cat name	  
$parentcat=null; 
if($idgetchild!=null){
$cnscat2=mysqli_query($GLOBALS['conn2'],"SELECT categoryNeedName FROM categoryneeds WHERE categoryNeedId='$idgetchild'");
$ntcat2=mysqli_num_rows($cnscat2);
if($ntcat2>=1){
	$rowc2=mysqli_fetch_assoc($cnscat2); 
	$parentcat=$rowc2['categoryNeedName'];
			}
		}
	//echo data now	
		echo '<tr>'
	,'	<td class="serial'.$j.'">'.$j.'</td>'
	,'	<td>'.$parentcat.' > '.$childcat.'</td>'
	,'	<td class="expanded"> SEX:'.$sex.' | SIZE:'.$size.' | '.$desc.'</td>'
	,'	<td class="openlink">';
	//use opener. to call a parent window function
	echo '<button type="button" id="getUser00O'.$j.'" onclick="opener.advanced('.$catid.',\'vocat\');window.close();';

	echo '">  '.$qnty.'  </button>'
		,' </td>'
	,'	</tr>'; 
	}
}
//custom needs, continue after j
$nt=mysqli_num_rows($cns);
$i=$j;
if($nt>=1){
	while($rowt=mysqli_fetch_assoc($cns)){
		$desc=$rowt['customNeedDesc'];
		$nname=$rowt['customNeedName'];
		$qy=$rowt['customNeedQnty']; 
		$nid=$rowt['customNeedId'];  
		   
		$bluer='class="openlink"';  
	$i=$i+1; 
	echo '<tr>'
	,'	<td class="serial'.$i.'">'.$i.'</td>'
	,'	<td>'.$nname.'</td>'
	,'	<td class="expanded">'.$desc.'</td>'
	,'	<td '.$bluer.'>';
	//use opener. to call a parent window function
	echo '<button type="button" id="getUser00O'.$i.'" onclick="opener.advanced('.$nid.',\'vos\');window.close();';

	echo '">  '.$qy.'  </button>'
		,' </td>'
	,'	</tr>';
	 
     
	}
} 
?> 
 </table> 
	</body>
 </html>  
 <?php
*/
}else if($str==='vos'){ 
$otherid= Sanitize($_POST['ai']);   

$fill=mysqli_query($GLOBALS['conn2'],"SELECT customNeedDesc FROM customneeds WHERE customNeedId='$otherid'");

$srow=mysqli_fetch_assoc($fill); 
$title=$srow['customNeedDesc'];
$an=null; 

?>

<!DOCTYPE html>
	<html>
		<head>		 
 <title>CURRENT NEEDS FILLER PRINT</title>
 <meta charset="UTF-8"> 
	 <script src="../js/jquery.min.js" type="text/javascript"></script>
	   
 <style type="text/css">
 header{
	 font-size:30px;
	 padding-top:5px;
	 padding-bottom:5px;
	 color:#fff;
	 text-align:center;
	 width:100%;
	 background:skyblue;
 }
 #main_table{
	 width:100%;
	 height:auto; 
	 border:1px solid #fff;
	 text-align:center;
	 border-spacing:1.2em;
 }
 tr { 
	 width:100%;
	 height:auto; 
 }
 td{
	 background:#fff;
	 height:auto;
	 width:10%;
	 font-size:16px; 
 }
 .openlink{
	cursor:pointer;
	 color:blue;
 } 
 .fhigh{  
 padding-bottom: 0.2em;
 padding-top: 0.2em;
 text-decoration:underline;
	 margin-top:5px; 
	 font-size:22px;
	 color:black;
 } 
 .expanded{
	 width:40%;
 }
 .serial{
	 width:5%;
 }
				</style> 
			</head>
		<body> 
	<header> 
<?php echo $title.$an ; ?></header> 
		<table id="main_table">
			<tr>
				<td class="fhigh serial">Serial</td>
				<td class="fhigh">Name</td>
				<td class="fhigh expanded">Address</td>
				<td class="fhigh">Email</td> 
				<td class="fhigh">Phone</td>
				<td class="fhigh">Order Date</td>  
			</tr> 
<?php 
$filler=mysqli_query($GLOBALS['conn2'],"SELECT * FROM needfiller WHERE needFillerId IN (SELECT DISTINCT needFillerId FROM currfillmethod WHERE customNeedId='$otherid')");
$n=mysqli_num_rows($filler); 
if($n>=1){ 
$i=0;
	while($row=mysqli_fetch_assoc($filler)){
		$i=$i+1;
		$name=$row['name']; 
		$email=$row['email'];
		$phone=$row['phone'];
		$state=$row['state'];
		$city=$row['city'];
		$address=$row['address']; 
		$near=$row['near'];		$zip=$row['zip']; 		$date=$row['date']; 
		//$from=$row['from_'];
		//$before=$row['before_']; 
		//$desc=$row['text_asdesc'];
		//$bgift=$row['biggift'];
		//Grouping
		
		if(empty($email)){
			$email=" - ";
		} 
		if(empty($phone)){
			$phone=" - ";
		}  
		 
		if(empty($name)){
			$name="Anonymous";
		} 
		if(empty($address)){
			$address=" - ";
		}
		if(empty($near)){
			$near=" - ";
		}
		if(empty($city)){
			$city=" - ";
		} 
		if(empty($state)){
			$state=" - ";
		}
		if(empty($zip)){
			$zip=" - ";
		}
		$complete_addr=$address.', NEAR:'.$near.', CITY:'.$city.', STATE:'.$state.', ZIP:'.$zip;
		
		if(empty($date)){
			$date=" - ";
		} 
		//echo data here..
			
	echo '<tr>'
	,'	<td class="serial'.$i.'">'.$i.'</td>'
	,'	<td>'.$name.'</td>'
	,'	<td class="expanded">'.$complete_addr.'</td>'
	,'	<td>'.$email.'</td>'
	,'	<td>'.$phone.'</td>'
	,'	<td>'.$date.'</td>' 
	,'	</tr>'
	;
	}
}//n 
?>
	</body>
 </html>  
<?php
}else if($str==='vocat'){ 
//catfilledid
$otherid= Sanitize($_POST['ai']);   

$fill1=mysqli_query($GLOBALS['conn2'],"SELECT categoryNeed_typeId FROM categoryneedsfilled WHERE catfilledId='$otherid'");
$parentname= ' - ';
$childname= ' - ';
$n1=mysqli_num_rows($fill1);
if($n1>0){
	$rowt=mysqli_fetch_assoc($fill1);
	$typeid=$rowt['categoryNeed_typeId'];
	
	$fill2=mysqli_query($GLOBALS['conn2'],"SELECT categoryNeedId,categoryNeed_typeName FROM categoryneedtypes WHERE categoryNeed_typeId='$typeid'"); 
	$n2=mysqli_num_rows($fill2);
	if($n2>0){
	$rowt2=mysqli_fetch_assoc($fill2);
	$cneedid=$rowt2['categoryNeedId'];
	$childname=$rowt2['categoryNeed_typeName'];
	
		$fill3=mysqli_query($GLOBALS['conn2'],"SELECT categoryNeedName FROM categoryneeds WHERE categoryNeedId='$cneedid'"); 
		$n3=mysqli_num_rows($fill3);
		if($n3>0){
		$rowt3=mysqli_fetch_assoc($fill3);
		$parentname=$rowt3['categoryNeedName']; 
		
		} 
	} 
}
  
$title=$parentname.' | '.$childname;
$an=null; 

?>

<!DOCTYPE html>
	<html>
		<head>		 
 <title>CURRENT NEEDS FILLER PRINT</title>
 <meta charset="UTF-8"> 
	 <script src="../js/jquery.min.js" type="text/javascript"></script>
	   
 <style type="text/css">
 header{
	 font-size:30px;
	 padding-top:5px;
	 padding-bottom:5px;
	 color:#fff;
	 text-align:center;
	 width:100%;
	 background:skyblue;
 }
 #main_table{
	 width:100%;
	 height:auto; 
	 border:1px solid #fff;
	 text-align:center;
	 border-spacing:1.2em;
 }
 tr { 
	 width:100%;
	 height:auto; 
 }
 td{
	 background:#fff;
	 height:auto;
	 width:10%;
	 font-size:16px; 
 }
 .openlink{
	cursor:pointer;
	 color:blue;
 } 
 .fhigh{  
 padding-bottom: 0.2em;
 padding-top: 0.2em;
 text-decoration:underline;
	 margin-top:5px; 
	 font-size:22px;
	 color:black;
 } 
 .expanded{
	 width:40%;
 }
 .serial{
	 width:5%;
 }
				</style> 
			</head>
		<body> 
	<header> 
<?php echo $title.$an ; ?></header> 
		<table id="main_table">
			<tr>
				<td class="fhigh serial">Serial</td>
				<td class="fhigh">Name</td>
				<td class="fhigh expanded">Address</td>
				<td class="fhigh">Email</td> 
				<td class="fhigh">Phone</td>
				<td class="fhigh">Period</td> 
				<td class="fhigh">Description</td> 
				<td class="fhigh serial">Biggift</td> 
			</tr> 
<?php 
$filler=mysqli_query($GLOBALS['conn2'],"SELECT * FROM needfiller WHERE needFillerId IN (SELECT DISTINCT needFillerId FROM currfillmethod WHERE catfilledId='$otherid')");
$n=mysqli_num_rows($filler); 
if($n>=1){ 
$i=0;
	while($row=mysqli_fetch_assoc($filler)){
		$i=$i+1;
		$fName=$row['fName'];
		$lName=$row['lName'];
		$email=$row['email'];
		$phone=$row['phone'];
		$state=$row['state'];
		$city=$row['city'];
		$address=$row['address']; 
		$near=$row['near'];
		$zip=$row['zip']; 
		//$from=$row['from_'];
		//$before=$row['before_']; 
		//$desc=$row['text_asdesc'];
		//$bgift=$row['biggift'];
		//Grouping
		
		if(empty($email)){
			$email=" - ";
		} 
		if(empty($phone)){
			$phone=" - ";
		} 
		if(empty($bgift)){
			$bgift=" - ";
		} 
		if(empty($desc)){
			$desc=" - ";
		} 
		
		if($bgift==1){
			$bgift="YES";
		}else if($bgift==0){
			$bgift="NO";
		}else{
			$bgift=" - ";
		}  
		if(empty($fName) || empty($lName)){
			$name="Anonymous";
		}else{
			$name=$fName.' '.$lName;
		}
		if(empty($address)){
			$address=" - ";
		}
		if(empty($near)){
			$near=" - ";
		}
		if(empty($city)){
			$city=" - ";
		} 
		if(empty($state)){
			$state=" - ";
		}
		if(empty($zip)){
			$zip=" - ";
		}
		$complete_addr=$address.', NEAR:'.$near.', CITY:'.$city.', STATE:'.$state.', ZIP:'.$zip;
		
		if(empty($from)){
			$from=" - ";
		}
		if(empty($before)){
			$before=" - ";
		}  
		$period=$from.' to '.$before;
		
		//echo data here..
			
	echo '<tr>'
	,'	<td class="serial'.$i.'">'.$i.'</td>'
	,'	<td>'.$name.'</td>'
	,'	<td class="expanded">'.$complete_addr.'</td>'
	,'	<td>'.$email.'</td>'
	,'	<td>'.$phone.'</td>'
	,'	<td>'.$period.'</td>'
	,'	<td>'.$desc.'</td>'
	,'	<td class="serial">'.$bgift.'</td>'
	,'	</tr>'
	;
	}
}//n 
?>
	</body>
 </html>  
<?php
}else if($str==='PC'){
$areaid= Sanitize($_POST['ai']);   
$title="Processed Current Needs";
$an=null;
 
$areaname=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE areaId='$areaid'");
$n1=mysqli_num_rows($areaname);
if($n1==1){
	$row=mysqli_fetch_assoc($areaname);
	$an=$row['areaName'];
	$an=" | ".$an;
}
$data=null; 
$cns=mysqli_query($GLOBALS['conn2'],"SELECT * FROM currentneeds WHERE localityId IN(
SELECT DISTINCT localityId from daanvaq7_vifixes_daanvir.areas WHERE areaId='$areaid'
) AND freeze=0");
?>
<!DOCTYPE html>
	<html>
		<head>		 
 <title>PROCESSED CURRENT NEEDS PRINT</title>
 <meta charset="UTF-8"> 
	 <script src="../js/jquery.min.js" type="text/javascript"></script>
	  
<?php 
//include 'advfn.php';
 ?>
 <style type="text/css">
 header{
	 font-size:30px;
	 padding-top:5px;
	 padding-bottom:5px;
	 color:#fff;
	 text-align:center;
	 width:100%;
	 background:skyblue;
 }
 #main_table{
	 width:100%;
	 height:auto; 
	 border:1px solid #fff;
	 text-align:center;
	 border-spacing:1.2em;
 }
 tr { 
	 width:100%;
	 height:auto; 
 }
 td{
	 background:#fff;
	 height:auto;
	 width:20%;
	 font-size:18px; 
 }
 .openlink{
	cursor:pointer;
	 color:blue;
 } 
 .fhigh{  
 padding-bottom: 0.2em;
 padding-top: 0.2em;
 text-decoration:underline;
	 margin-top:5px; 
	 font-size:25px;
	 color:black;
 } 
 .expanded{
	 width:45.5%;
 }
 .serial{
	 width:12%;
 }
		</style> 
	</head>
		<body> 
	<header><?php echo $title.$an ; ?></header> 
		<table id="main_table">
			<tr>
				<td class="fhigh serial">Serial</td>
				<td class="fhigh">Localities</td>
				<td class="fhigh expanded">Current Needs</td>
				<td class="fhigh">Available</td> 
			</tr> 
<?php 
$nt=mysqli_num_rows($cns);
$i=0;
if($nt>=1){
	while($rowt=mysqli_fetch_assoc($cns)){
		$desc=$rowt['currentNeedDesc'];
		$currId=$rowt['currentNeedId'];
		$lId=$rowt['localityId']; 
		$qnty=$rowt['qnty']; 
		$unit=$rowt['qnty_unit']; 
		$ln=mysqli_query($GLOBALS['conn'],"SELECT localityName FROM localities WHERE localityId='$lId'");
	$nt1=mysqli_num_rows($ln);
	if($nt1==1){
		$rowl=mysqli_fetch_assoc($ln);
		$lname=$rowl['localityName'];
	}
	$fillers=mysqli_query($GLOBALS['conn2'],"SELECT * FROM currfillmethod WHERE currentNeedId='$currId' AND processed=1");
	$filled=mysqli_num_rows($fillers);
	$bluer=null;
	$ext=null;
	if($filled>0){
		$bluer='class="openlink"';
		$ext=1;
	} 
	$i=$i+1;
if($ext==1){ 
	
	echo '<tr>'
	,'	<td class="serial'.$i.'">'.$i.'</td>'
	,'	<td>'.$lname.'</td>'
	,'	<td class="expanded">'.$desc.'</td>'
	,'	<td '.$bluer.'>';
	//use opener. to call a parent window function
	echo '<button type="button" id="getUser00X'.$i.'" onclick="opener.advanced('.$currId.',\'vcs\');window.close();';

	echo '">'.$filled.' / '.$qnty.' '.$unit.'</button>'
		,' </td>'
	,'	</tr>';
	
	//onclick="advanced('.$currId.',\'vcs\')"
	//advanced('.$currId.',\'vcs\')
	//getUser($i);
	//<a href="javascript:advanced('.$currId.',\'vcs\')"></a>;
}else{ }	    
	}
} 
?> 
 </table>
<?php
	//<script src='../js/advn.js'></script>
	//echo file_get_contents("advfn.php"); ?> 
	</body>
 </html>  
 <?php
}else if($str==='PO'){ 
$areaId= Sanitize($_POST['ai']);   
 $title="PROCESSED Other Needs";
 $an=null;
 
 $cns=mysqli_query($GLOBALS['conn2'],"SELECT * FROM customneeds WHERE customNeedId IN (
 SELECT DISTINCT customNeedId FROM currfillmethod WHERE  processed=1)"); 

?>
<!DOCTYPE html>
	<html>
		<head>		 
 <title>PROCESSED OTHER NE EDS PRINT</title>
 <meta charset="UTF-8"> 
	 <script src="../js/jquery.min.js" type="text/javascript"></script>
	  
<?php 
//include 'advfn.php';
 ?>
 <style type="text/css">
 header{
	 font-size:30px;
	 padding-top:5px;
	 padding-bottom:5px;
	 color:#fff;
	 text-align:center;
	 width:100%;
	 background:skyblue;
 }
 #main_table{
	 width:100%;
	 height:auto; 
	 border:1px solid #fff;
	 text-align:center;
	 border-spacing:1.2em;
 }
 tr { 
	 width:100%;
	 height:auto; 
 }
 td{
	 background:#fff;
	 height:auto;
	 width:20%;
	 font-size:18px; 
 }
 .openlink{
	cursor:pointer;
	 color:blue;
 } 
 .fhigh{  
 padding-bottom: 0.2em;
 padding-top: 0.2em;
 text-decoration:underline;
	 margin-top:5px; 
	 font-size:25px;
	 color:black;
 } 
 .expanded{
	 width:45.5%;
 }
 .serial{
	 width:12%;
 }
		</style> 
	</head>
		<body> 
	<header><?php echo $title.$an ; ?></header> 
		<table id="main_table">
			<tr>
				<td class="fhigh serial">Serial</td>
				<td class="fhigh">Name</td>
				<td class="fhigh expanded">Description</td>
				<td class="fhigh">Qnty</td> 
			</tr> 
<?php 
$cnscat=mysqli_query($GLOBALS['conn2'],"SELECT * FROM categoryneedsfilled WHERE catfilledId IN (
 SELECT DISTINCT catfilledId FROM currfillmethod WHERE processed=1)"); 

$j=0;
$ntcat=mysqli_num_rows($cnscat);
if($ntcat>0){
	while($rowc=mysqli_fetch_assoc($cnscat)){ 
	$j=$j+1;
		$typeid=$rowc['categoryNeed_typeId'];
		$catid=$rowc['catfilledId'];
		$sex=$rowc['sex'];
		$size=$rowc['size'];
		$qnty=$rowc['qnty'];
		$desc=$rowc['t_desc'];
		if(empty($sex)){
			$sex=' - ';
		}
		if(empty($size)){
			$size=' - ';
		}
		if(empty($desc)){
			$desc=' - ';
		}
		if(empty($qnty)){
			$qnty=' - ';
		}
	
$cnscat1=mysqli_query($GLOBALS['conn2'],"SELECT categoryNeed_typeName,categoryNeedId  FROM categoryneedtypes WHERE categoryNeed_typeId='$typeid'");

//child cat name   
$childcat=null;
$idgetchild=null;
$ntcat1=mysqli_num_rows($cnscat1);
if($ntcat1>=1){
	$rowc1=mysqli_fetch_assoc($cnscat1); 
	$childcat=$rowc1['categoryNeed_typeName'];
	$idgetchild=$rowc1['categoryNeedId']; 
	}
//parent cat name	  
$parentcat=null; 
if($idgetchild!=null){
$cnscat2=mysqli_query($GLOBALS['conn2'],"SELECT categoryNeedName FROM categoryneeds WHERE categoryNeedId='$idgetchild'");
$ntcat2=mysqli_num_rows($cnscat2);
if($ntcat2>=1){
	$rowc2=mysqli_fetch_assoc($cnscat2); 
	$parentcat=$rowc2['categoryNeedName'];
			}
		}
	//echo data now	
		echo '<tr>'
	,'	<td class="serial'.$j.'">'.$j.'</td>'
	,'	<td>'.$parentcat.' > '.$childcat.'</td>'
	,'	<td class="expanded"> SEX:'.$sex.' | SIZE:'.$size.' | '.$desc.'</td>'
	,'	<td class="openlink">';
	//use opener. to call a parent window function
	echo '<button type="button" id="getUser00O'.$j.'" onclick="opener.advanced('.$catid.',\'vocat\');window.close();';

	echo '">  '.$qnty.'  </button>'
		,' </td>'
	,'	</tr>'; 
	}
}
$nt=mysqli_num_rows($cns);
$i=$j;
if($nt>=1){
	while($rowt=mysqli_fetch_assoc($cns)){
		$desc=$rowt['customNeedDesc'];
		$nname=$rowt['customNeedName'];
		$qy=$rowt['customNeedQnty']; 
		$nid=$rowt['customNeedId'];  
		   
		$bluer='class="openlink"';  
	$i=$i+1; 
	echo '<tr>'
	,'	<td class="serial'.$i.'">'.$i.'</td>'
	,'	<td>'.$nname.'</td>'
	,'	<td class="expanded">'.$desc.'</td>'
	,'	<td '.$bluer.'>';
	//use opener. to call a parent window function
	echo '<button type="button" id="getUser00O'.$i.'" onclick="opener.advanced('.$nid.',\'vos\');window.close();';

	echo '">  '.$qy.'  </button>'
		,' </td>'
	,'	</tr>';
	  
	}
} 
?> 
 </table>   
	</body>
 </html>  
 <?php

}else if($str==='vt'){ 
$teamId= Sanitize($_POST['ai']);

$fill=mysqli_query($GLOBALS['conn2'],"SELECT teamName FROM 
teams WHERE entryID='$teamId'");

$srow=mysqli_fetch_assoc($fill); 
$title=$srow['teamName'];
 $an=null; 
?> 
<!DOCTYPE html>
			<html>
		<head>		 
 <title>TEAM MEMBERS PRINT</title>
 <meta charset="UTF-8"> 
	 <script src="../js/jquery.min.js" type="text/javascript"></script>
	   
 <style type="text/css">
 header{
	 font-size:30px;
	 padding-top:5px;
	 padding-bottom:5px;
	 color:#fff;
	 text-align:center;
	 width:100%;
	 background:skyblue;
 }
 #main_table{
	 width:100%;
	 height:auto; 
	 border:1px solid #fff;
	 text-align:center;
	 border-spacing:1.2em;
 }
 tr { 
	 width:100%;
	 height:auto; 
 }
 td{
	 background:#fff;
	 height:auto;
	 width:10%;
	 font-size:16px; 
 }
 .openlink{
	cursor:pointer;
	 color:blue;
 } 
 .fhigh{  
 padding-bottom: 0.2em;
 padding-top: 0.2em;
 text-decoration:underline;
	 margin-top:5px; 
	 font-size:22px;
	 color:black;
 } 
 .expanded{
	 width:30%;
 }
 .serial{
	 width:10%;
 }
		</style> 
	</head>
		<body> 
	<header>
	
<?php echo $title.$an ; ?></header> 
		<table id="main_table">
			<tr>
				<td class="fhigh serial">Photo</td>
				<td class="fhigh">Name</td>
				<td class="fhigh expanded">Address</td>
				<td class="fhigh">Email</td> 
				<td class="fhigh">Phone</td>
				<td class="fhigh">Occupation</td>
				<td class="fhigh">Started</td>  
				<td class="fhigh">Age | Sex</td>  
			</tr> 
<?php
$filler=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE userId IN (SELECT DISTINCT member_userId FROM daanvaq7_vifixes_needs.team_members WHERE entryID='$teamId')");
$n=mysqli_num_rows($filler); 
if($n>=1){ 
$i=0;
	while($row=mysqli_fetch_assoc($filler)){
		$i=$i+1;
		$fName=$row['fName'];
		$lName=$row['lName'];
		$email=$row['email'];
		$phone=$row['phone'];
		$state=$row['state'];
		$city=$row['city'];
		$address=$row['address']; 
		$zip=$row['zip']; 
		$started=$row['started']; 
		$age=$row['age'];
		$sex=$row['sex'];
		$pic=$row['profilePic'];
		$occupation=$row['occupation'];
		//Grouping
		
		if(empty($email)){
			$email=" - ";
		} 
		if(empty($phone)){
			$phone=" - ";
		} 
		if(empty($occupation)){
			$occupation=" - ";
		} 
		if(empty($age)){
			$age=" - ";
		} 
		if(empty($sex)){
			$sex=" - ";
		} 
		 
		if(empty($fName) || empty($lName)){
			$name="Anonymous";
		}else{
			$name=$fName.' '.$lName;
		}
		if(empty($address)){
			$address=" - ";
		} 
		if(empty($city)){
			$city=" - ";
		} 
		if(empty($state)){
			$state=" - ";
		}
		if(empty($zip)){
			$zip=" - ";
		}
		$complete_addr=$address.', CITY:'.$city.', STATE:'.$state.', ZIP:'.$zip;
		
		if(empty($started)){
			$started=" - ";
		}else{
			$started=date('d-m-Y',strtotime($started));
		}
		//echo data here..
			$pic=substr($pic,2,strlen($pic));
		//echo $pic;
		//We need to display src in proper format here with http:localhost .. 
	echo '<tr>'
	,'	<td class="serial'.$i.'"> '
	,'<img src="http://daanvir.org/main/'.$pic.'" style="border:0px;height:50px;width:50px;" width="50px" height="50px">'
	,'</td>'
	,'	<td>'.$name.'</td>'
	,'	<td class="expanded">'.$complete_addr.'</td>'
	,'	<td>'.$email.'</td>'
	,'	<td>'.$phone.'</td>'
	,'	<td>'.$occupation.'</td>'
	,'	<td>'.$started.'</td>'
	,'	<td class="serial">'.$age.' | '.$sex.'</td>'
	,'	</tr>'
	; 
	}
}//n 
?>
	</body>
 </html>  
<?php
}else if($str==='selnd'){ 
$locId= Sanitize($_POST['ai']); 
//$fill=mysqli_query($GLOBALS['conn2'],"SELECT teamName FROM teams WHERE entryID='$teamId'");
?>

<div id="needform"> 
	<div id="needformin1">		<h2 id="cneedh">Name of Need:</h2> 		<input id="name_need" type="text" placeholder="ex. Books"/>
		<h2 id="cneedh">Describe a little:</h2> 
		<textarea id="tacneeds" placeholder="ex. Education :  Books for 10th class | Total 100 children"></textarea>
		<h2 id="cneedh">Select a quantity:</h2> 
		<input id="qntycneeds" type="number"  min="0" placeholder="ex. 10"/>		<h2 id="cneedh">Unit of quantity:</h2> 		<input id="qunitcneeds" type="text" placeholder="ex. books"/>		<h2 id="cneedh" class="select_icon">Select an icon (optional):</h2> 		<form id="sel_ineed"><input id="icon_need" type="file"/></form>		<input id="img_ned" type="hidden" value="" readonly="readonly"><input id="img_ned_f" type="hidden" value="0" readonly="readonly">
	</div>	<br>	<div id="err1" style="height:40px;bottom:-160px; position:absolute;width:100%;"></div>
	<div id="needformin2">
		<input id="addcneed" type="button" value="Add / Continue" onclick="advanced( <?php echo $locId; ?>,'addcn')" />
		<input id="addcneed" type="button" value="Others" onclick="advanced(' <?php echo $locId; ?>','hitcn')" />
	</div>
</div>  
<?php 
}else if($str==='addcn'){ $image= Sanitize($_POST['image']); $name= Sanitize($_POST['name']); $locId= Sanitize($_POST['ai']); 
$desc= Sanitize($_POST['desc']); 
$qy= Sanitize($_POST['qy']); 
$qyu= Sanitize($_POST['qyu']); 
if(empty($image) || empty($name) || empty($desc) || empty($locId) || empty($qy)|| $qy<1 || empty($qyu)){
	echo 'f';	exit();
}else{$qyy=mysqli_query($GLOBALS['conn2'],"SELECT * FROM currentneeds WHERE freeze=0 AND currentNeedDesc='$desc' AND currentNeedName='$name' AND localityId='$locId'");$nqyy=mysqli_num_rows($qyy);if($nqyy>0){	echo 'f';	exit;}$query=mysqli_query($GLOBALS['conn2'],"SELECT * FROM currentneeds WHERE freeze=0");
$prev_num=mysqli_num_rows($query);
$q=mysqli_query($GLOBALS['conn2'],"INSERT INTO currentneeds(localityId,currentNeedDesc,qnty,qnty_unit,currentNeedName,currentNeedPic) VALUES('$locId','$desc','$qy','$qyu','$name','$image')");
$query=mysqli_query($GLOBALS['conn2'],"SELECT * FROM currentneeds");
$next_num=mysqli_num_rows($query);
if($next_num=$prev_num+1){	echo 1;	exit();}else{
	echo 'f';	exit();
		}
	}
}else if($str==='hitcn'){ 
$locId= Sanitize($_POST['i']); 
?><!DOCTYPE html>
		<html>
		<head>		 
 <title>CREATE A HITLIST</title>
 <meta charset="UTF-8"> 
<link rel="stylesheet" type="text/css" href="http://daanvir.org/main/css/acc.css">
<script src="../js/jquery.min.js" type="text/javascript"></script>
	   </head>
	   <body>
<div id="needform"> 
	<div id="needformin1" style="overflow-y:auto;">	<h2 style="color:gray;font-size:15px"><strong>P.s.</strong> <i>You are going to overwrite the previous. Please click on Full description below to update / complete your article and make the link alive.</i></h2> 		<h2 id="cneedh">Enter a tagline:</h2> 		<input id="hit_tag" type="text" placeholder="ex. Need Books and Clothes"/>		<h2 id="cneedh">About:</h2> 		<input id="hit_about" type="text" placeholder="ex. These children are striving for both books and clothes. Help their dreams."/>				<h2 id="cneedh">Location:</h2> 		<input id="hit_location" type="text" placeholder="ex. Behind Akshardham Temple"/>		<h2 id="cneedh">Small Description (For opened page):</h2> 
		<textarea style="height:80px;width:100%;" id="hitdesc" placeholder="Why is this important?"></textarea>  		<h2 id="cneedh">Select Picture 1:</h2> 		<input id="hitimage1" type="file" value="Choose Image"/>		<h2 id="cneedh">Select Picture 2:</h2> 		<input id="hitimage2" type="file" value="Choose Image"/>		<h2 id="cneedh">Select Picture 3 (optional):</h2> 		<input id="hitimage3" type="file" value="Choose Image"/>		<h2 id="cneedh">Select Picture 4 (optional):</h2> 		<input id="hitimage4" type="file" value="Choose Image"/>		<h2 id="cneedh">Select Picture 5 (optional):</h2> 		<input id="hitimage5" type="file" value="Choose Image"/>
		<h2 id="cneedh">Select Needs:</h2> 
<?php   
$q=mysqli_query($GLOBALS['conn2'],"SELECT * FROM currentneeds WHERE localityId='$locId' AND freeze=0");
	$num_rows=mysqli_num_rows($q); 
		if($num_rows> 0){ 
		while($fetch= mysqli_fetch_assoc($q)){
		echo '<input class="check-custom2" id="hitcneed0045511'.$fetch['currentNeedId'].'" type="checkbox" name="hitvalues"><label for="hitcneed0045511'.$fetch['currentNeedId'].'">'.$fetch['currentNeedDesc'].' > '.$fetch['qnty'].' units </label>'; 
		}
	}

?>		
	</div><br>
	<div id="needformin2" style="background:#fff;">
		<input id="addcneed" type="button" value="Hit Visible!" onclick="opener.advanced( <?php echo $locId; ?>,'hitv')" /> 
		<input id="addcneed" type="button" value="Soft Remove" onclick="opener.advanced( <?php echo $locId; ?>,'hitv1')" /> 
		<input id="addcneed" type="button" value="Add Full Description" onclick="opener.fulldesc( <?php echo $locId; ?>,1)" /> 
		<input id="addcneed" type="button" value="Do Nothing" onclick="window.close();" /> 
				</div>
			</div> 
		</body>
	</html>
<?php
}else if($str=='hitv'){ 
$locId= Sanitize($_POST['i']);$tag= Sanitize($_POST['tag']); $about= Sanitize($_POST['about']); $location= Sanitize($_POST['location']); $desc= Sanitize($_POST['desc']); 
$checks=Sanitize($_POST['checks']); $img1="";$img2="";$img3="";$img4="";$img5="";//isset doesn't work since data sent is not in required formif($_FILES['img1']['error'][0] > 0){    //file not selected	echo 'Please select image 1';	exit();}else if($_FILES['img1']['error'][0] == 0){ //this is just to check if isset($_FILE). Not required.    //file selected$img1=Sanitize($_FILES['img1']['name']);$file_tmp1=$_FILES['img1']['tmp_name']; $size1=$_FILES['img1']['size']; $image1=''; $file_ext1=explode('.',$img1);$file_ext1=strtolower(end($file_ext1));} if($_FILES['img2']['error'][0] > 0){    //file not selected	echo 'Please select image 2';	exit();}else if($_FILES['img2']['error'][0] == 0){ //this is just to check if isset($_FILE). Not required.    //file selected$img2=Sanitize($_FILES['img2']['name']);$file_tmp2=$_FILES['img2']['tmp_name']; $size2=$_FILES['img2']['size']; $image2=''; $file_ext2=explode('.',$img2);$file_ext2=strtolower(end($file_ext2));}  if($_FILES['img3']['error'][0] > 0){    //file not selected	echo 'Please select image 3';	exit();}else if($_FILES['img3']['error'][0] == 0){ //this is just to check if isset($_FILE). Not required.    //file selected$img3=Sanitize($_FILES['img3']['name']);$file_tmp3=$_FILES['img3']['tmp_name']; $size3=$_FILES['img3']['size']; $image3=''; $file_ext3=explode('.',$img3);$file_ext3=strtolower(end($file_ext3));}  if($_FILES['img4']['error'][0] > 0){    //file not selected	echo 'Please select image 4';	exit();}else if($_FILES['img4']['error'][0] == 0){ //this is just to check if isset($_FILE). Not required.    //file selected$img4=Sanitize($_FILES['img4']['name']);$file_tmp4=$_FILES['img4']['tmp_name']; $size4=$_FILES['img4']['size']; $image4=''; $file_ext4=explode('.',$img4);$file_ext4=strtolower(end($file_ext4));}  if($_FILES['img5']['error'][0] > 0){    //file not selected	echo 'Please select image 5';	exit();}else if($_FILES['img5']['error'][0] == 0){ //this is just to check if isset($_FILE). Not required.    //file selected$img5=Sanitize($_FILES['img5']['name']);$file_tmp5=$_FILES['img5']['tmp_name']; $size5=$_FILES['img5']['size']; $image5=''; $file_ext5=explode('.',$img5);$file_ext5=strtolower(end($file_ext5));}   //Sanitize Wont work here for tmp_name.
if($checks=='null' || empty($tag) || empty($about) || empty($location) || empty($desc) || empty($img1) || empty($img2)){ 
	echo 'f'; 	exit();
}else{ 
//First delete the previous hitlist	 
$check=mysqli_query($GLOBALS['conn2'],"SELECT * FROM currentneeds WHERE includeinhit=1 AND localityId='$locId' AND freeze=0");
	$num=mysqli_num_rows($check); 
	if($num>0){
		while($row=mysqli_fetch_assoc($check)){
		$cnid=$row['currentNeedId']; 
		//$getimg=mysqli_query($GLOBALS['conn2'],"SELECT img FROM `hitlist` WHERE `localityId`='$locId'");
	//$numimg=mysqli_num_rows($getimg); 
	//if($numimg>0){
	//$ims=mysqli_fetch_assoc($getimg);
	//$delimg=$ims['img'];
		////unlink('../'.$delimg);
	//}
	$del=mysqli_query($GLOBALS['conn2'],"DELETE FROM daanvaq7_vifixes_needs.hitlist WHERE localityId='$locId'"); 
	$update=mysqli_query($GLOBALS['conn2'],"UPDATE currentneeds SET includeinhit=0 WHERE currentNeedId='$cnid' AND freeze=0"); 
		}
	}
//Now, overwrite/fresh create the hitlist	
//upload image
$expensions=array("jpeg","jpg","png"); if(!empty($img3)){if((in_array($file_ext3,$expensions)==false)||($size3 > 2097152)){		echo 'Error: Invalid files were uploaded';	exit();}	}if(!empty($img4)){	if((in_array($file_ext4,$expensions)==false)||($size4 > 2097152)){		echo 'Error: Invalid files were uploaded';	exit();}}if(!empty($img5)){	if((in_array($file_ext5,$expensions)==false)||($size5 > 2097152)){		echo 'Error: Invalid files were uploaded';	exit();}}
if((in_array($file_ext1,$expensions)==false)||($size1 > 2097152) || (in_array($file_ext2,$expensions)===false)||($size2 > 2097152)){ 	echo 'Error: Invalid files were uploaded';	exit();
	//print_r($errors); 
}else{
	 $uID=$userData['userId'];
			$path="Traversal";
			//$_SERVER['DOCUMENT_ROOT']
			$target="../".$path."/images/".$uID;  			$image1=$path."/images/".$uID."/".$img1;			$image2=$path."/images/".$uID."/".$img2;				if(!empty($img3)){			$image3=$path."/images/".$uID."/".$img3;			$vr3=$target."/".$img3;  			}		if(!empty($img4)){			$image4=$path."/images/".$uID."/".$img4;			$vr4=$target."/".$img4; 			}				if(!empty($img5)){			$image5=$path."/images/".$uID."/".$img5;			$vr5=$target."/".$img5;			}
			if(!is_dir($target)){ 
				mkdir($target,0777,true); 
			}  						$vr1=$target."/".$img1;			$vr2=$target."/".$img2; 						if(is_writable($target)){			if(!file_exists($vr1)){  					if(move_uploaded_file($file_tmp1,$vr1)==FALSE){						echo 'Image 1 could not be uploaded';					}				}			if(!file_exists($vr2)){  					if(move_uploaded_file($file_tmp2,$vr2)==FALSE){						echo 'Image 2 could not be uploaded';					}				}			if(!empty($img3))				if(!file_exists($vr3)){  					if(move_uploaded_file($file_tmp3,$vr3)==FALSE){						echo 'Image 3 could not be uploaded';					}				}			if(!empty($img4))			if(!file_exists($vr4)){  					if(move_uploaded_file($file_tmp4,$vr4)==FALSE){						echo 'Image 4 could not be uploaded';					}				}						if(!empty($img5))			if(!file_exists($vr5)){  					if(move_uploaded_file($file_tmp5,$vr5)==FALSE){						echo 'Image 5 could not be uploaded';					}				}			 			 			 }else{
				 echo 'Protected Or No Directory.';
			 }
}$image=$image1.','.$image2;if($image==","){	echo 'Error: Internal Error.';	exit();}if(!empty($img3)){	$image=$image.','.$image3;}if(!empty($img4)){	$image=$image.','.$image4;}if(!empty($img5)){	$image=$image.','.$image5;}
//done..next:
$checkboxes= explode(",", $checks); 
$len=sizeof($checkboxes); 
$check1=mysqli_query($GLOBALS['conn2'],"SELECT * FROM hitlist");
	$n_prev=mysqli_num_rows($check1); 
$q=mysqli_query($GLOBALS['conn2'],"INSERT INTO hitlist (`localityId`, `majorhit_desc`,`img`,`headline`,`tagline`,`location`) VALUES ('$locId','$desc','$image','$tag','$about','$location')");
$check2=mysqli_query($GLOBALS['conn2'],"SELECT * FROM hitlist");
	$n_next=mysqli_num_rows($check2); 
for($i=0;$i<$len;$i++){
$checkboxes[$i]=substr($checkboxes[$i],15);  
	if($n_next == $n_prev+1){ 
$q2=mysqli_query($GLOBALS['conn2'],"UPDATE currentneeds SET includeinhit=1 WHERE currentNeedId='$checkboxes[$i]' AND localityId='$locId' AND freeze=0");
	}else{
			echo 'f';
			exit();
		}
	} 
	echo '<div style="margin:auto;color:green;font-size:80px;padding:65px;padding-top:150px;">Hit is Now Visible!</div>'; 
}
}else if($str==='hitv1'){ 
$locId= Sanitize($_POST['i']); 
$checks=Sanitize($_POST['checks']);   
if($checks=='null'){
	echo 'f'; 	exit();
}else{  
//done..next:
$checkboxes= explode(",", $checks); 
$len=sizeof($checkboxes);  
   
for($i=0; $i<$len;$i++){
$checkboxes[$i]=substr($checkboxes[$i],15);   
$q2=mysqli_query($GLOBALS['conn2'],"UPDATE currentneeds SET freeze=1 WHERE currentNeedId='$checkboxes[$i]' AND localityId='$locId' AND freeze=0"); 
	} 
echo '<div style="margin:auto;color:green;font-size:80px;padding:65px;padding-top:150px;">NEEDS WERE REMOVED!</div>'; 
}
}else if($str=='unit1'){ 
$s= Sanitize($_POST['s']);
$l= Sanitize($_POST['l']);  ?>
<div id="notice" style="width:80%;height:80%;margin:auto;text-align:center;vertical-align:middle;padding:2%;">
	<h2 style="font-size:30px;color:#000;">Thank You For Your Concern :) </h2>
	<h3 style="font-size:22px;color:#000;">Please go to <br><br>
	&nbsp;&nbsp;<em style="font-size:28px;color:green;">Goodwill > <?php echo $s; ?> > <?php echo $l; ?></em></h3>
	<h3 style="font-size:22px;color:#000;"> and select the needs you wish to help fulfill.</h3>
</div> 
<?php 
} 
 ?>        