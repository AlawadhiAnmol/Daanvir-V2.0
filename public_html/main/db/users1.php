<?php // error_reporting(E_ALL); ini_set('display_errors', '1'); ?>
<?php  
function Sanitize($data){
	$data=trim($data);
return htmlentities(strip_tags(mysqli_real_escape_string($GLOBALS['conn'],$data)));

}
 
function arraySanitize(&$data){
$data=htmlentities(strip_tags(mysqli_real_escape_string($data)));
return $data;
}

function fbLogin($login){   
$_SESSION['userId']=$login;
//echo 'loggedIn';     
return;
}
function protectPage(){
	if(loggedIn()===false){  
	header('Location:http://daanvir.org');
	session_destroy();  
	exit();
	}
	return;
} 
function registerProtect(){
	if(loggedIn()===true){  
	header('Location:http://daanvir.org'); 
	exit();
	} 
	return;
}
function logout(){
	if(isset($_POST["logout"])){  
	unset($_SESSION['userId']);
	session_destroy(); 
	//header('Location:http://daanvir.org');
	
	exit();
	} 
	return;
}

function outError($errors){
	return 
	'ul li'.implode('</li><li>',$errors).'</li></ul>';
}

//include this on login page
function logger(){ 
$loginAttempt=0;
$apc_key = "{$_SERVER['SERVER_NAME']}~login:{$_SERVER['REMOTE_ADDR']}";
$apc_blocked_key = "{$_SERVER['SERVER_NAME']}~login-blocked:{$_SERVER['REMOTE_ADDR']}";
$tries = (int)apc_fetch($apc_key);
 
if ($tries >= 10) {
    header("HTTP/1.1 429 Too Many Requests");
    echo "<h1 style=\"
    color: #ccc;
    font-size: 30px;
    width: calc(100%-200px);
    margin: auto;
    margin-top: 26px;
    padding: 100px;
    background: black;\">You've exceeded the number of login attempts. We've blocked IP address {$_SERVER['REMOTE_ADDR']} for a few minutes.</h1>";
    exit();
 }
if(empty($_POST)===false){ 
	$username= $_POST['username_login'];
	$password=$_POST['password_login'];
	$token=$_POST['token'];
	if (!empty($_POST['token'])) {
	 if (hash_equals($_SESSION['token'], $token)) {
			// Proceed to process the form data 
		
		if(filter_var($username,FILTER_VALIDATE_EMAIL)){ 
		$query1=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE email= '$username'");
		$num=mysqli_num_rows($query1);
		if($num==1){ 
		$row=mysqli_fetch_assoc($query1); 
		$username=$row['userName'];	
		}else{
		$blocked = (int)apc_fetch($apc_blocked_key);
		apc_store($apc_key, $tries+1, pow(2, $blocked+1)*60);  # store tries for 2^(x+1) minutes: 2, 4, 8, 16, ...
		apc_store($apc_blocked_key, $blocked+1, 86400);  # store number of times blocked for 24 hours
		return;
		//exit();
		}
		}
	if(empty($username)||empty($password)){
		$errors[]='Fill Required Fields.';
	}else if(userExists($username)===false){
		$errors[]='Invalid Username';
		$blocked = (int)apc_fetch($apc_blocked_key);
		apc_store($apc_key, $tries+1, pow(2, $blocked+1)*60);  # store tries for 2^(x+1) minutes: 2, 4, 8, 16, ...
		apc_store($apc_blocked_key, $blocked+1, 86400);  # store number of times blocked for 24 hours
 
		//exit();
	}else{
		if(strlen($password)>32){
			$errors[]='Password Exceeds 32 Characters';
			//exit();
		}
		$login=logIn($username,$password);
		if($login===false){
			$errors[]='Incorrect Information';
		$blocked = (int)apc_fetch($apc_blocked_key);
		apc_store($apc_key, $tries+1, pow(2, $blocked+1)*60);  # store tries for 2^(x+1) minutes: 2, 4, 8, 16, ...
		apc_store($apc_blocked_key, $blocked+1, 86400);  # store number of times blocked for 24 hours
		header('Location:http://www.daanvir.org/index2.php');
		exit();
		}else{ 
		apc_delete($apc_key);
		apc_delete($apc_blocked_key);
			$_SESSION['userId']=$login; 
		   // echo  'Hi '.$username; 
		  if(userActive($username)===true){
			echo "<script language=\"javascript\">
			window.location=\"http://daanvir.org/\";
			</script>";
              //echo "You are an authentic user";
		  }else{
			echo "<script language=\"javascript\">
			logout();
			alert('Please Activate your Account!');
			open_page(1);
			</script>"; 
		  }
		  //use Ajax here..
		  	exit();
			}	
		} 
		$loginAttempt=0;
		
	} else {
		
		$loginAttempt++;
		// Log this as a warning and keep an eye on these attempts
		$ip_real=$_SERVER['REMOTE_ADDR'];
		$ip_proxy=$_SERVER['HTTP_X_FORWARDED_FOR'];
		date_default_timezone_set('Asia/Calcutta');
		$time=time();
		if($loginAttempt>3){
			mail_admin($ip_real,$ip_proxy,$time,$loginAttempt);
		}  
		$blocked = (int)apc_fetch($apc_blocked_key);
		apc_store($apc_key, $tries+1, pow(2, $blocked+1)*60);  # store tries for 2^(x+1) minutes: 2, 4, 8, 16, ...
		apc_store($apc_blocked_key, $blocked+1, 86400);  # store number of times blocked for 24 hours
 
		exit();
	}
  }
}else{
        /*echo "Error!!!";*/
	}
	return;
  }
  
function block_ip($ip) {
    $deny = array("$ip");
                if (in_array ($_SERVER['REMOTE_ADDR'], $deny)) {
                    header("HTTP/1.1 403 Forbidden");
                    exit();
                }
            }
			
function mail_admin($a,$b,$c,$d){
include '../html/mailer.php';
$mail->setFrom('noreply@daanvir.org', 'daanvir.org');
$mail->addAddress('kumararvind5233@gmail.com', 'Admin'); 
$mail->Subject = "Warning!!! Alarming activity on the website";   
$m="Hi Arvin,\n\n\rI hope you are doing fine. I have found some suspicious activity on Daanvir.org. Someone is trying to crack the login form. I have traced the following details related to the suspect:\n\nREAL IP:".$a."\nFORWARDED IP:".$b."\nTIME OF ATTEMPT:".$c."\nNUMBER OF ATTEMPTS:".$d; 
$mail->Body = $m; 
if(!$mail->send()) {
}else{
//echo 1;
} 
}
function loggedIn(){
	return
	(isset($_SESSION['userId']))?true:false;
}
//get user data for userId
function userData($userId){
	$data =array();
	$userId=(int)$userId; 
	$func_num_args= func_num_args();
	$func_get_args= func_get_args(); 
	if($func_num_args>1){
		unset($func_get_args[0]);
		$fields=''.implode(',',$func_get_args).'';
		$data=mysqli_fetch_assoc(mysqli_query($GLOBALS['conn'],"SELECT ".$fields." FROM users WHERE userId = ".$userId)); 	
		return $data;
	} 
}
//check if user exists
function userExists($username){
	$username=Sanitize($username);
	$query=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE userName = '$username' AND freeze=0"); 
	return ((mysqli_num_rows($query))==1? true:false);	
}
	
//check if user has activated email
function userActive($username){
	$username=Sanitize($username);
	$query=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE userName = '$username' AND active = 1");
	/*echo "<script language=\"javascript\">
	alert(\" ".$username." , ".mysqli_num_rows($query)." \");	</script>"; 
	*/
	return 
	(mysqli_num_rows($query)==1)? true:false;
}
//get userid from username
function userId($username){
	$username=Sanitize($username);
	$query=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE userName ='$username'");
	$row=mysqli_fetch_assoc($query);
	return ($row['userId']);
}
//get userId on login
function logIn($username,$password){
	$userId= userId($username);
	$username=Sanitize($username);    
	$password=md5($password);
	$query=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE userName= '$username' AND password ='$password' AND freeze=0");
	$rows=mysqli_num_rows($query);
	return ($rows==1)?($userId):false;
}

function loadNewCamps($userId,$type){ 
$campId=null;
if($type==1){
$campId=mysqli_query($GLOBALS['conn'],"SELECT campId FROM camp_table WHERE targetId = ".$userId." ORDER BY auto_inc,campId DESC");
}else if($type==2){
$campId=mysqli_query($GLOBALS['conn'],"SELECT campId FROM camps WHERE source_user = ".$userId." ORDER BY date DESC");
} 
	$num_rows=mysqli_num_rows($campId); 
	if($num_rows>0){
	$newcamps=array();
	while($row=mysqli_fetch_assoc($campId)){  
	$newcamps[]=$row['campId'];
	}
	$newcamps=array_reverse($newcamps); 
	return ($newcamps);
	}else{ 
	echo '<h2 id="not_found">You do not have any campaigns yet.<h2>';
	exit();
	}
	return;
}
 
function print_camps($loaded){ 
	$loaded=array_reverse($loaded);
	$num_camps=sizeof($loaded); 
	$section1='<section class="grid-wrap">
					<ul class="grid">
						<li class="grid-sizer"></li>';
	$section2='
				<section class="slideshow">
					<ul>';
	for($i=0;$i<$num_camps;$i++){ 	
	$campInfo=mysqli_query($GLOBALS['conn'],"SELECT * FROM camps WHERE campId = ".$loaded[$i]);
	$n=mysqli_num_rows($campInfo);
	if($n==1){
	$r=mysqli_fetch_assoc($campInfo);
	$mainline=$r['mainline'];
	$text=$r['text'];
	$pic=$r['pic'];
	$date=$r['date'];
	$num_target=$r['num_target'];
	$date=print_Date($date);
	$section1.='
						<li>
							<figure>
								<img src="'.$pic.'" alt="Loading Image.."/>
								<figcaption><h3>'.$date.'</h3><p>'.$mainline.'</p></figcaption>
							</figure>
						</li>';
	$section2.='
						<li>
							<figure>
								<figcaption>
									<h3>'.$date.'</h3>
									<p>'.$text.'</p><p>This campaign has reached '.$num_target.' people successfully.</p>
								</figcaption>
								<img src="'.$pic.'" alt="Loading Image.."/>
							</figure>
						</li>';
		}
	}
	$section1.='</ul>
				</section>';
	$section2.='</ul>
					<nav>
						<span class="icon nav-prev"></span>
						<span class="icon nav-next"></span>
						<span class="icon nav-close"></span>
					</nav> 
				</section>';
	echo $section1.$section2;
return;
}
function campaigns_box($userId,$type){
		//type: 1= in, 2= out. 
		$loaded =loadNewCamps($userId,$type); 
		print_camps($loaded); 
} 
function print_Date($temp){ 
	$temp=date('D d-M Y',strtotime($temp));
	//This avoids errors in timezone
	date_default_timezone_set('Asia/Calcutta');
	$today=time();
	$today=date('D d-M Y',$today);
	$yest=time()-(24*60*60);
	$yest=date('D d-M Y',$yest);
	//echo $today;
	if($today === $temp){
		return 'Today';
	}else if($yest === $temp){
		return 'Yesterday';
	}else{
	return $temp;
	}
}

//SUPPORT FUNCTION
function support($userId,$city,$state,$country,$purpose){
	$people_Ids=getPeople($userId,$purpose);
	//$cities is a multi-dimensional array 
	$people_details=getDetails($people_Ids);
	$population=sizeof($people_Ids); 
	print_Supps($userId,$people_Ids,$people_details,$population,$city,$state,$country,$purpose);
	return;
} 
function getPeople($userId,$purpose){ 
	$temp=array();
	if($purpose=='supp'){
	$q=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE userId!=".$userId); 
	//$q=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users u WHERE  NOT EXISTS (SELECT  myId FROM supports s WHERE suppId = ".$userId." AND u.userId = s.myId) AND userId!=".$userId); 
	$num_rows=mysqli_num_rows($q);
		if($num_rows>0){
		while($row=mysqli_fetch_assoc($q)){	
		$temp[]=$row['userId'];
		}		
		} 
	}else if($purpose=='supps'){
//little confusing but works good		
	$q=mysqli_query($GLOBALS['conn'],"SELECT myId FROM supports WHERE suppId = ".$userId);
	$num_rows=mysqli_num_rows($q);
		if($num_rows>0){
		while($row=mysqli_fetch_assoc($q)){	
		$temp[]=$row['myId'];
		}		
		} 
	}else{}
	return $temp;
}
function getDetails($pl_Ids){
	$details=array(array(),array(),array(),array(),array(),array(),array(),array(),array(),array(),array(),array(),array());
	$population=sizeof($pl_Ids);
	for($i=0;$i<$population;$i++){ 
		$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE userId = ".$pl_Ids[$i]);
		$num_rows=mysqli_num_rows($q);
		if($num_rows==1){
		$row=mysqli_fetch_assoc($q);	
		$details[0][$i] = $row['fName'];			
		$details[1][$i]=$row['lName'];		
		$details[2][$i]=$row['email'];	
		$details[3][$i]=$row['city'];	
		$details[4][$i]=$row['state'];	
		$details[5][$i]=$row['country'];
		$details[6][$i]=$row['profilePic'];	
		$details[7][$i]=$row['bestQuality'];	
		$details[8][$i]=$row['sex'];		
		$details[9][$i]=$row['age'];	
		$details[10][$i]=$row['education'];	
		$details[11][$i]=$row['institution'];	
		$details[12][$i]=$row['occupation'];
		$details[13][$i]=$row['started'];	 
	}}
		//print_r($details);
		return $details;
}
function print_Supps($userId,$pl_Ids,$people_details,$population,$city,$state,$country,$purpose){
	$condition=0;	 
	if($population ==0 && $purpose=="supps"){ 
	echo '<h2 id="not_found">You do not have any supporters yet.<h2>';
		return;
	} 
		
	$section1='<section class="grid-wrap">
					<ul class="grid">
						<li class="grid-sizer"></li>';
	for($i=0;$i<$population;$i=$i+1){  
		$userInfo="";
		$from='';
		if($people_details[3][$i]==$city && $people_details[4][$i]==$state && $people_details[3][$i]!='' && $people_details[4][$i]!=''){
			$from=$city;
		}else if($people_details[3][$i]!=$city && $people_details[4][$i]==$state && $people_details[3][$i]!='' && $people_details[4][$i]!=''){ 
			$from=$state;
		}else if($people_details[3][$i]!=$city && $people_details[4][$i]!=$state && $people_details[3][$i]!='' && $people_details[4][$i]!=''){
			$from=$people_details[3][$i].", ".$people_details[4][$i];
		}else if($people_details[3][$i]=='' && $people_details[4][$i]=='' && $people_details[5][$i]=='' ){
			$from="";
		}else{
			$from=$people_details[4][$i];
		}
		$sex='';
		$age='';
		//
		$em=$people_details[2][$i];
		if((!empty($em)) && (filter_var($em,FILTER_VALIDATE_EMAIL))){
		$userInfo.="Email : ".$em."<br>";
		} 
		if($people_details[8][$i]!=''){
		$sex=$people_details[8][$i];
		$userInfo.="Sex : ".$sex."<br>";
		}else{ 
		$sex='';
		}  
		if($people_details[9][$i]!='' && $people_details[9][$i]!=0){
		$age=$people_details[9][$i];
		$userInfo.="Age : ".$age."<br>";
		}else{ 
		$age='';
		} 
		
		$edu='';
		$inst='';
		if($people_details[10][$i]!=''){
		$edu=$people_details[10][$i];
		$userInfo.="Graduated in : ".$edu."<br>";
		}else{ 
		$edu='';
		}  
		if($people_details[11][$i]!=''){
		$inst=$people_details[11][$i];
		$userInfo.="Graduated from : ".$inst."<br>";
		}else{ 
		$inst='';
		} 
		$occ='';
		$str='';
		if($people_details[12][$i]!=''){
		$occ=$people_details[12][$i];
		$userInfo.="Working as : ".$occ."<br>";
		}else{ 
		$occ='';
		}  
		if($people_details[13][$i]!=''){
		$str=$people_details[13][$i];
		$str=date('D d-M Y',strtotime($str));
		}else{ 
		$str='';
		}
		$pic=$people_details[6][$i];
		if($pic==''){
			//$pic='images/userpic.png';
		}
		$bQ=$people_details[7][$i];
		if($bQ==''){
			$bQ='';
		}
		$fN=$people_details[0][$i];
		$lN=$people_details[1][$i];
		if($fN==''){
			$fN='Anonymous';
		}
		if($lN==''){
			$lN='';
		} 	 
		$s1num=supp_num($pl_Ids[$i],1);
		if($s1num!='error'){ 
		$userInfo.="Supporters : ".$s1num."<br>";
		}
		$s2num=supp_num($pl_Ids[$i],2);
		if($s2num!='error'){ 
		$userInfo.="Supporting : ".$s2num."<br>";
		}
		$s3num=supp_num($pl_Ids[$i],3);
		if($s3num!='error'){ 
		$userInfo.="Campaigns : ".$s3num."<br>";
		}
		$status=supp_status($userId,$pl_Ids[$i]);
		$r=($pl_Ids[$i])+451; 
		$o='';
		if($sex=='M' || $sex=='m' || $sex=='Male' || $sex=='male')
			$o=' him';
		else if($sex=='F' || $sex=='f' || $sex=='Female' || $sex=='female')
			$o=' her';
			$button=""; 
			if($userId!=$pl_Ids[$i]){
			if($purpose=="supp"){
				if($status==false){
				$button='<p id="connection" style="background:yellowgreen" onclick="javascript:support(\'Xnum0'.$r.'\',1)">Support'.$o.'</p>';
				}else{
				$button='<p id="connection" onclick="javascript:support(\'Xnum0'.$r.'\',2)">Remove'.$o.'</p>'; 
				}
			}
			}
			$image="";
			if($pic!='')
			$image=	'<img src="main/'.$pic.'" alt="Loading Image.."/>';
			else $image ='';
	$section1.='
						<li>
							<figure>'.$image.'
								<figcaption><h3>'.$fN.' '.$lN.'</h3><p>'.$from.'</p><p>'.$userInfo.'</p>'.$button.'</figcaption>
							</figure>
						</li>';
			}
	$section1.='</ul>
				</section>';
	echo $section1;
	return;
}
function supp_status($userId,$pl_Id){
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM supports WHERE myId = ".$userId." AND suppId = ".$pl_Id);
	$num_rows=mysqli_num_rows($q);
	if($num_rows==1){
		return 'true';
	}else if($num_rows==0){
		return false;
	}else{
		return 'error';
	}
	return;
}
function supp_num($pl_Id,$id){
	//$id=1 gives supporters
	//$id=2 gives supporting
	if($id==1)
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM supports WHERE suppId = ".$pl_Id);
	else if($id==2)
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM supports WHERE myId = ".$pl_Id);
	else if($id==3)
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM camps WHERE source_user = ".$pl_Id);	
	$num_rows=mysqli_num_rows($q);
	if($num_rows>=0){
		return $num_rows;
	}else{
		return 'error';
	}
	return;
}
?>
<?php 

function safe_($c){
	//$c=decbin($c);
	$c=shiftleft($c, 25);
	return $c;
}
function unsafe_($c){
	$c=rightshift($c, 25);
	//$c=bindec($c);
	return $c;
}
function dec2bin($dec) {
    // Better function for dec to bin. Support much bigger values, but doesn’t support signs
    for ($b = '', $r = $dec; $r >1;) {
        $n = floor($r / 2);
        $b = ($r - $n * 2) . $b;
        $r = $n; // $r%2 is inaccurate when using bigger values (like 11.435.168.214)!
    }
    return ($r % 2) . $b;
}
function shiftleft($num, $bits) {
    return bcmul($num, bcpow('2', $bits));
}
function rightshift($num, $bits) {
    return bcdiv($num, bcpow('2', $bits));
}

function filter($userId,$filterby,$sel){ 
	$que=null;
if($filterby=='sms'){
		$has='hasSms'; 
$que=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,contactId,phone,email,profilePic
FROM daanvaq7_vifixes_daanvir.contacts 
WHERE EXISTS(
	SELECT contactId 
    FROM   daanvaq7_vifixes_daanvir.get_contacts
    WHERE  contacts.contactId = get_contacts.contactId AND get_contacts.hasSms= 1 AND get_contacts.userId='$userId')");
		}else{ 
		$has='hasEmail'; 
		//avoid subquery
		/*
$que=mysqli_query($GLOBALS['conn'],"
SELECT contacts.fName,contacts.lName,contacts.contactId,contacts.phone,contacts.email,contacts.profilePic
FROM vifixes_daanvir.contacts 
INNER JOIN vifixes_daanvir.get_contacts 
  ON (contacts.contactId=get_contacts.contactId) 
  WHERE get_contacts.hasEmail=1 AND get_contacts.userId='$userId'");
  */
$que=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,contactId,phone,email,profilePic
FROM daanvaq7_vifixes_daanvir.contacts 
WHERE EXISTS(
	SELECT contactId 
    FROM   daanvaq7_vifixes_daanvir.get_contacts
    WHERE  contacts.contactId = get_contacts.contactId AND get_contacts.hasEmail= 1 AND get_contacts.userId='$userId')");
	
	}
$num_rows=0;		
$num_rows=mysqli_num_rows($que); 
if($num_rows>0){
	while($row=mysqli_fetch_assoc($que)){ 
$print="";
		$fName=$row['fName'];
		$lName=$row['lName'];
		//updated later
		if(strlen($fName)>6){
			$fName=substr($fName,0,5).'.';
		} 
		if(strlen($lName)>6){
			$lName=substr($lName,0,5).'.';
		}
		$contactId=$row['contactId'];
	if($filterby=='sms'){
	$lighter=$row['phone'];
	}else{ 
	$lighter=$row['email'];
	
		if(strlen($lighter)>21){
			$lighter=substr($lighter,0,20).'..';
		}
	}  
		if($row['profilePic']==''){
			$pic='images/userpic.png';
		}else{ 
			$pic=$row['profilePic'];
		}
//Complex values maybe alter in processing time
//echo '<script>alert('.$contactId.');</script>';
$cryptedId=$contactId+5185985; 
//changes in editcontactondemand.php
$c=$contactId+4484568;
$scryptedId=safe_($c);

//echo '<script>alert('.$cryptedId.');</script>';
		//echo $fName.$lName.$phone.$pic;
if($filterby=='sms'){
		$Ph='class="Ph'.$cryptedId.'"';
	}else{ 
		$Ph='';
	}
if($sel=='notsel'){
$print='<div id="not"> 
	<div id="cover-notin">
		<div id="notpic"><img class="Cls'.$cryptedId.'" src="'.$pic.'"/></div>
		<div id="notdet" onclick="javascript:changeContact(\''.$cryptedId.'\');">
			<h2 class="Nm'.$cryptedId.'">'.$fName.' '.$lName.'</h2> 
			<p '.$Ph.'>'.$lighter.'</p>
		</div> 
			</div> 
		</div>'; 
		}else{ 
		
if($filterby=='sms'){
		$Ph='class="Phn'.$scryptedId.'"';
		$sec='sms';
		$Cls='SelCntrls';
		$el='notsels';
	}else{ 
		$Ph='';
		$sec='email';
		$Cls='SelCntrle';
		$el='notsele';
	}  
$print='<div id="not"> 
	<div id="cover-notin" class="'.$Cls.$scryptedId.' '.$el.'">
		<div id="notpic"><img class="Sel'.$scryptedId.'" src="'.$pic.'"/></div>
		<div id="notdet" onclick="javascript:selcntrl(\''.$scryptedId.'\',\''.$sec.'\');">
			<h2 class="Na'.$scryptedId.'">'.$fName.' '.$lName.'</h2> 
			<p '.$Ph.'>'.$lighter.'</p>
		</div> 
			</div> 
		</div>';
		}
		
		echo $print;
	}
}else{
	echo '<div id="notavl">Please add some contacts here.</div>';
}
 
	return;
}
//For followers
function ffilter($userId){ 
$q=mysqli_query($GLOBALS['conn'],"SELECT *
FROM users u 
WHERE EXISTS(
	SELECT suppId      
    FROM   supports s
    WHERE  u.userId = s.mYId AND s.suppId ='$userId')");
$num_rows=mysqli_num_rows($q); 
if($num_rows>0){ 
	$section1='<section class="grid-wrap">
					<ul class="grid">
						<li class="grid-sizer"></li>';
	while($row=mysqli_fetch_assoc($q)){
		$fName=$row['fName'];
		$lName=' '.$row['lName'];
	if($fName===''){
		$fName='Anonymous';
		}
		$contactId=$row['userId']; 
		$em=$row['email']; 
		$ph=$row['phone']; 
		$cy=$row['city'];  
		$pic=$row['profilePic'];
	$userInfo='';
		if(filter_var($em,FILTER_VALIDATE_EMAIL)) 
	$userInfo.='Email : '.$em.'<br>';
		if(preg_match('/^[0-9]{10}$/',$ph)) 
	$userInfo.='Tel : '.$ph.'<br>';
		if(strlen($cy)>2) 
	$userInfo.='City : '.$cy.'<br>';
		
$c=$contactId+448;
//Arithmetic errors are inevitable or unavoidable in any programming language where floats arise, we can use either round(result,upto_num) or we can use bc math
//but here, only add works
$cryptedId=safe_($c); 
		$Ph='class="Phf'.$cryptedId.' pelong"';
		$sec='fol';
		$Cls='SelCntrlf';
		if($ph==='' || $ph=== '0'){ 
		if($cy===''){
			$lighter=$em; 
		}else{
			$lighter=$em.' , '.$cy;
		}
		}else{
		$lighter=$em.' , '.$ph;
		} 
		if($pic!='')
		$image=	'<img src="main/'.$pic.'" alt="Loading Image.."/>';
		else $image ='';
		$button='<p id="connection">SELECT</p>';
		$section1.='
						<li  onclick="javascript:selcntrl(\''.$cryptedId.'\',\''.$sec.'\');" class="'.$Cls.$cryptedId.' notsel elong">
							<figure>'.$image.'
								<figcaption><h3>'.$fName.$lName.'</h3><p>'.$userInfo.'</p>'.$button.'</figcaption>
							</figure>
						</li>';
 
	}
	$section1.='</ul>
				</section>';
	echo $section1;
}else{ 
	echo '<h2 id="not_found">You do not have any followers yet.<h2>';
}	 
	return;
}
?>
<?php 
function loadTemps($userId){ 
$q=mysqli_query($GLOBALS['conn'],"Select * FROM templates WHERE userId = '$userId'"); 
$num_rows=mysqli_num_rows($q); 
if($num_rows>0){
while($row=mysqli_fetch_assoc($q)){
		$pic='images/speech.png';
		$head=$row['tempName'];
		$class="Tem".($row['tempCode']);
		
		$print='
				<div id="not" class="'.$class.'"> 
					<div id="cover-notin">
						<div id="notpic"><img src="'.$pic.'"/></div>
						<div id="notdet" onclick="loadt(\''.$class.'\')">
							<h2>'.$head.'</h2>  
						</div> 
					</div> 
				</div> 
';
		echo $print;
		}
	}else{
	
	echo '<div id="notavl">You have not saved any templates.</div> ';
	}
	return;
}
function refer($val,$userId){
	$curr= 0;
	if($val=='wnew'){ 
		$q=mysqli_query($GLOBALS['conn'],"SELECT Voted FROM whatsnew WHERE myId = '$userId' ORDER BY campId DESC");
		$num_rows=mysqli_num_rows($q); 
		if($num_rows> 0){ 
			$i=1;
			while($r=mysqli_fetch_assoc($q)){
				if($r['Voted']=='0'){ 
					$i = $i+1;
				}else{   
					 echo $i;
					 return;
				}
			}
		}else{
			echo 0;
		}
		 
	}else 
	if($val=='mcmp'){  
		$q=mysqli_query($GLOBALS['conn'],"SELECT Voted FROM whatsnew WHERE myId = '$userId'");
		$num_rows=mysqli_num_rows($q); 
		if($num_rows> -1){ 
			 echo $num_rows;
	} }
	if($val=='msup'){  
		$q=mysqli_query($GLOBALS['conn'],"SELECT myId FROM supports WHERE suppId = '$userId'");
		$num_rows=mysqli_num_rows($q); 
		if($num_rows> -1){ 
			 echo $num_rows;
	} }
	return;
}
?>
<?php  
function choose_state(){
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM states");
	$section1='<section class="grid-wrap">
					<ul class="grid">
						<li class="grid-sizer"></li>';
		while($fetch= mysqli_fetch_assoc($q)){
		$button='<p id="connection">SELECT</p>';
		$image='';
		//Use this code for localities too
		if($fetch['statePic']!=""){
		$image='<img src="main/'.$fetch['statePic'].'" alt="Loading Image.."/>';
		}else{ 
		$image='';
		}
	$section1.='
						<li  onclick="locs(\'s\',\'state904825'.$fetch['stateId'].'\');" class="state904825'.$fetch['stateId'].' notsel1">
							<figure> '.$image.'
								<figcaption><h3>'.$fetch['stateName'].'</h3><p>INDIA</p>'.$button.'</figcaption>
							</figure>
						</li>'; 
		}
	$section1.='</ul>
				</section>';
	echo $section1;
	return;
}
function getcatneeds(){
$q=mysqli_query($GLOBALS['conn2'],"SELECT * FROM categoryneeds");
		while($fetch= mysqli_fetch_assoc($q)){
			echo '<input class="check-custom3" id="cnee7504'.$fetch['categoryNeedId'].'" type="checkbox" name="cats"><label for="cnee7504'.$fetch['categoryNeedId'].'">'.$fetch['categoryNeedName'].'</label>';
		}
return;
}
function advanced($id){
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM administrator WHERE userId = '$id'");
	$num=mysqli_num_rows($q);
	if($num==1){
	echo '<li><a href="javascript:adv()">Advanced</a></li>';
	}
	return;
}
function print_adv($id,$type){
	if($type=='1'){
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM administrator WHERE userId = '$id'");
	$num=mysqli_num_rows($q);
	if($num==1){
	echo '<div id="acc-control"> 
			<div id="acc-control-body" class="height-more">
				<div id="optionbox" onclick="access(\'admin\');access(\'contains_teams\');">
					<div id="optionbox-icon" class="optionicon11">
				
					</div>
					<div id="optionbox-info">
						<h2>Teams</h2>
						<h5>Manage Various Teams</h5>
					</div>
				</div><div id="optionbox" onclick="access(\'admin\');access(\'contains_locs\');">
					<div id="optionbox-icon" class="optionicon12"> 
					</div>
					<div id="optionbox-info">
						<h2>Localities</h2>
						<h5>Add/ Remove Options</h5>
					</div>
				</div><div id="optionbox" onclick="access(\'admin\');access(\'contains_gath\');">
					<div id="optionbox-icon" class="optionicon13">
				
					</div>
					<div id="optionbox-info">
						<h2>Gatherings</h2>
						<h5>View incomplete matches</h5>
					</div>
				</div><div id="optionbox" onclick="access(\'admin\');access(\'contains_ser\');">
					<div id="optionbox-icon" class="optionicon14">
				
					</div>
					<div id="optionbox-info">
						<h2>Overview</h2>
						<h5>Info about served areas</h5>
					</div>
				</div> 
			</div>
			<div id="acc-control-pull" onclick="toggle();">
			<hr>
			</div> 
		</div>';
	 
	}
}else if($type=='2'){
	
	
	
} 
	return;
}
function advanced_controls($id,$mode){ 
if($mode==1){
	$q=mysqli_query($GLOBALS['conn2'],"SELECT * FROM teams");
	$num=mysqli_num_rows($q); 
	if($num>0){
		while($q_r=mysqli_fetch_assoc($q)){
			$tname=$q_r['teamName'];
			$locId=$q_r['localityId']; 
			$entryId=$q_r['entryID']; 
	$qin=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE localityId='$locId'");
	$numin=mysqli_num_rows($qin); 
	if($numin==1){
		$q_rin=mysqli_fetch_assoc($qin);
		$locId=$q_rin['localityName']; 
		$stId=$q_rin['stateId']; 
	$qin1=mysqli_query($GLOBALS['conn'],"SELECT * FROM states WHERE stateId='$stId'");
	$numin1=mysqli_num_rows($qin1); 
	if($numin1==1){
		$q_rin1=mysqli_fetch_assoc($qin1);
		$st=$q_rin1['stateName']; 
	echo '<div id="tbox" onclick="advanced(\''.$entryId.'\',\'mem\');"><h3><br><strong>'.$tname.'</strong></h3><p>'.$locId.'</p><p id="sub_p">'.$st.'</p></div>';
	}
	 }
		}
	}
	echo '<div id="tbox_nor" onclick="advanced(null,\'addmb\');"><h3>Add<br><strong>+</strong></h3><p>New Team</p></div>';
	
	}else if($mode=='2'){ 
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM states");
	$num=mysqli_num_rows($q); 
	if($num>0){
		while($q_r=mysqli_fetch_assoc($q)){
			$tname=$q_r['stateName'];
			$stId=$q_r['stateId']; 
	$q1=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE stateId='$stId'");
	$num1=mysqli_num_rows($q1);  
	if(strlen($tname)>45){
			$tname=substr($tname,0,45).'...';
		}
	$u="Areas";
	if($num1==1){
	$u="Area";
	}
	echo '<div id="tbox" onclick="advanced(\''.$stId.'\',\'areas\');"><h3><br><strong class="smstrong">'.$tname.'</strong></h3><p>'.$num1.'</p><p id="sub_p">'.$u.'</p></div>';
	 }
	}
	echo '<div id="tbox_nor" onclick="advanced(null,\'addst\');"><h3>Add<br><strong>+</strong></h3><p>New State</p></div>'; 
	}else if($mode=='3'){
		//stuff here..  
	$q=mysqli_query($GLOBALS['conn'],"SELECT * FROM states");
	$num=mysqli_num_rows($q); 
	if($num>0){
		while($q_r=mysqli_fetch_assoc($q)){
			$tname=$q_r['stateName'];
			$stId=$q_r['stateId']; 
	$q1=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE stateId='$stId'");
	$num1=mysqli_num_rows($q1);  
	if(strlen($tname)>45){
			$tname=substr($tname,0,45).'...';
		}
	$u="Areas";
	if($num1==1){
	$u="Area";
	}
	echo '<div id="tbox" onclick="advanced(\''.$stId.'\',\'areas1\');"><h3><br><strong class="smstrong">'.$tname.'</strong></h3><p>'.$num1.'</p><p id="sub_p">'.$u.'</p></div>';
	 }
	} 
   }
  return;
}
function admin($id){ 
$check=mysqli_query($GLOBALS['conn'],"SELECT * FROM administrator WHERE userId='$id'"); 
$num=mysqli_num_rows($check);  
	if($num==1){ 
		return true;
	}else{
	//header('Location:http://daanvir.org');
	//session_destroy();
	//exit(); 
	}
}
function myV($id){
	$check=mysqli_query($GLOBALS['conn'],"SELECT * FROM videos WHERE userId='$id'"); 
$num=mysqli_num_rows($check);  
	if($num>0){   
	$in=0;
while($r=mysqli_fetch_assoc($check)){
	$src=''.$r['video_link'];
	//Cannot pass directory 
	$path=explode("/",$src);
	$path=implode(",",$path);
	$in++;
	/*
	<span id="views"> 360 views</span>
	*/  
  echo '<li>
			<div id="view" style="background:url(\'main/'.$r['thumb_link'].'\');background-size:320px 240px;background-position:center center;background-repeat:no-repeat" class="expandview'.$in.'">  
				<div id="notallowed'.$in.'" class="mask mask-1"></div>
				<div id="notallowed_'.$in.'" class="mask mask-2"></div>
				<div class="notallowed'.$in.'" id="over">
				<h2>'.$r['locality'].'</h2>
				<p>'.$r['title'].'
				<br> '.$r['date_mission'].' <br>
				<a class="info" href="javascript:" onclick="play('.$in.',\''.$path.'\');"> <img id="thumbnail'.$in.'" src="main/images/view-more-icon.png" alt="Loading Image.."></a>
				<span id="time">'.$r['duration'].'</span></p>
					</div> 
			</div>
		</li>'; 
		}
	}else{
	echo '<h2 id="not_found">You do not have any videos.<h2>';
	}
}
function numV($u){ 
$check=mysqli_query($GLOBALS['conn'],"SELECT * FROM videos WHERE userId='$u'"); 
$num=mysqli_num_rows($check);  
	echo $num; 
}
function timeAgo($time_ago){
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
} 
 
function print_hit($loi){
	$hitId=$loi;
//def:true, then load on page else load in search
//load on page: include outer-sl as well
//$ifexists=mysqli_query($GLOBALS['conn2'],"SELECT hitId FROM hitlist WHERE localityId ='$locid'");
//$nif=mysqli_num_rows($ifexists);
//if($nif!=1)return;
	$data1=null; 
	$data2=null; 
	$l=0;
	$r=0;
	$qy=0; 
	$bar=0;
	$sumt=0;
	$count=0; 
		$stn=null;
		$st=null;
		$locn=null;
		$pic="";
		$tstamp='';
		$date='';
		$location="Not Specified";
		$headline="";
		$tagline="";
		$dsc=null;  
		$lc="locality108202".$hitId;
	
	$userDet='';
	$headdsc=mysqli_query($GLOBALS['conn2'],"SELECT userId,localityId,majorhit_desc,img,headline,tagline,location,need_ids FROM hitlist WHERE hitId='$hitId' AND freeze=0"); 
	$ndsc=mysqli_num_rows($headdsc); 
	$need_ids=array();
	if($ndsc==1){
	$rdsc=mysqli_fetch_assoc($headdsc);  
	$dsc=$rdsc['majorhit_desc'];   
	$user=$rdsc['userId']; 
	$pic=$rdsc['img'];
	$locid=$rdsc['localityId'];
	$pic=explode(',',$pic);	
	$location=$rdsc['location']; 
	$headline=$rdsc['headline']; 
	$tagline=$rdsc['tagline']; 
	$need_ids=explode(',',$rdsc['need_ids']); 
	 
	 $headq=mysqli_query($GLOBALS['conn'],"SELECT stateId,localityName FROM localities WHERE localityId='$locid'"); 
	$n1=mysqli_num_rows($headq); 
	if($n1==1){
		$r1=mysqli_fetch_assoc($headq); 
		$stid=$r1['stateId']; 
		$locn=$r1['localityName'];  
	$headq1=mysqli_query($GLOBALS['conn'],"SELECT stateName FROM states WHERE stateId='$stid'"); 
	$n2=mysqli_num_rows($headq1); 
	if($n2==1){
		$r2=mysqli_fetch_assoc($headq1);  
		$st=$stn=$r2['stateName'];
			}
		}
	
	$headdsc_=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,state,city FROM users WHERE userId='$user'"); 
	$ndsc_=mysqli_num_rows($headdsc_); 
	if($ndsc_==1){
	$rdsc_=mysqli_fetch_assoc($headdsc_);  
	$userDet.=' '.$rdsc_['fName'];   
	if($rdsc_['lName']!="")
	$userDet.=' '.$rdsc_['lName'];  
	if($rdsc_['city']!="")
	$userDet.=', '.$rdsc_['city']; 
	if($rdsc_['state']!="")
	$userDet.=', '.$rdsc_['state']; 	
		}
	}  
	if(array_key_exists(0,$pic)==false){
		$pic[0]='http://daanvir.org/images/picture0001.png';
	}
	//desc, locname and statename retrieved
	//Calculating class...
	$val=((rand(10,1000000))*242)+456;
	$cls1='details'.($val);
	$cls2='needs'.($val);
	$cls3='supports'.($val);
	//count total items and filled items			
	if($locn!=null){
		$s_curr=sizeof($need_ids);
	for($g=0;$g<$s_curr;$g++){
	//$target=mysqli_query($GLOBALS['conn2'],"SELECT qnty FROM currentneeds WHERE currentNeedId='$need_ids[$g]' AND includeinhit=1 AND freeze=0");
	//$number=mysqli_num_rows($target);
	//if($number==1){
	//	$res=mysqli_fetch_assoc($target);  
	//	$sumt.=$res['qnty']; 
	//}
	$achieved=0;
	//$filled=mysqli_query($GLOBALS['conn2'],"SELECT SUM(currNeedFillNum) as sum FROM currfillmethod WHERE currentNeedId='$need_ids[$g]'");  
	//$achieved_num=mysqli_num_rows($filled);
	//if($achieved_num==1){
	//	$row_achieved=mysqli_fetch_assoc($filled);
	//	$achieved=$row_achieved['sum'];
	//	}  
	$check1=mysqli_query($GLOBALS['conn2'],"SELECT  currentNeedDesc,qnty, qnty_unit FROM currentneeds WHERE includeinhit=1 AND currentNeedId='$need_ids[$g]' AND freeze=0");
	$num1=mysqli_num_rows($check1);  
	if($num1==1){
		$row1=mysqli_fetch_assoc($check1);
		$cnid = $need_ids[$g]; 
		$cndsc=$row1['currentNeedDesc']; 
		$qy=$row1['qnty']; 
		$qu=$row1['qnty_unit'];
		$sumt+=$qy;  
//print needs
		$check2=mysqli_query($GLOBALS['conn2'],"SELECT SUM(currNeedFillNum) as sum FROM currfillmethod WHERE currentNeedId='$need_ids[$g]' AND confirmed=1 ORDER BY fillmethodId DESC");  
		$count=mysqli_num_rows($check2); 
		$needqy=0;
		if($count==1){
		$r_count=mysqli_fetch_assoc($check2);
		$needqy=$r_count['sum'];
		$achieved+=$needqy;
		}
//%age
//	$l+=$count;
	
	$l+=$needqy;
	$r+=$qy;
	if($qy!=0)
	$pc_q=round(($needqy/$qy)*100,1);
	$need=$cndsc.'- ('.$pc_q.'% filled)';
	//$need=$cndsc;
	$data1.='<li id="H_LI_19">'.$need.'
			</li>';
	if($count>0){
        $check22=mysqli_query($GLOBALS['conn2'],"SELECT DISTINCT userId FROM currfillmethod WHERE currentNeedId='$cnid' AND confirmed=1 ORDER BY fillmethodId DESC"); 
	while($kind=mysqli_fetch_assoc($check22)){ 
	$filler=$kind['userId'];  
	$details=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,state FROM users WHERE userId='$filler'"); 
	$details2=mysqli_query($GLOBALS['conn2'],"SELECT dated FROM currfillmethod WHERE currentNeedId='$cnid' AND userId='$filler' ORDER BY dated DESC LIMIT 1");  
	$details2_=mysqli_query($GLOBALS['conn2'],"SELECT * FROM transac WHERE cust_id='$filler' AND hitId='$hitId'");  
	
	$n=mysqli_num_rows($details);
	$n_=mysqli_num_rows($details2);
	 if($n==1 && $n_==1){
	$rdet=mysqli_fetch_assoc($details); 
	$rdet2=mysqli_fetch_assoc($details2);  
	$n_2=mysqli_num_rows($details2_);
	if($n_2>0){
		//$m_curr=mysqli_fetch_assoc($details2_);
		//$money_=$m_curr['amount'];
		//currency donated 
		$currency='<i id="currency"></i>';
	}else{
		$currency='';
	}
	$name=$rdet['fName'].' '.$rdet['lName'];  
	$state=$rdet['state']; 	 
	$tstamp=$rdet2['dated']; 
	$date = ' - <strong style="font-size:12px">'.timeAgo($tstamp).'</strong>';	 
	if(!empty($state)){
		$state=', '.$state;
	}	
	$person=$name.$state;

	$data2.='<li id="H_LI_20">'.$person.$date.$currency.'</li>';	
//print donators for each need id	 							
								}						
							}
						}
		
					//} 
				}
	}//new
if($r!=0)
	$bar=round(($l/$r)*100,1); 
$bcopy=$bar;
if($bar<10){
	$bcopy=10;
}
if($bar>100){
	$bcopy=100;
}
//lc is hitid
$clk='fullView(\''.$st.'\',\''.$locn.'\',\''.$lc.'\',2);';
// $clk2='fullView(\''.$st.'\',\''.$locn.'\',\''.$lc.'\',2);';  
if(!isset($_SESSION['userId'])){
$clk='clk();';	
}	
$btn='<button id="H_H_BUTTON_29" onclick="'.$clk.'">
						HELP THEM
					</button>';
$btn2='';
/*
 if($dsc!="")					
$btn2='<button id="expand" onclick="'.$clk2.'">In-depth Analysis</button>';

*/			
if($bar>100){
//$bar="%100+";
$bar="100+";
}else{
//$bar="%".$bar;
$bar=$bar;
}				
if($bar>=100){ 
$btn='<button id="H_H_BUTTON_29" style="background:#acdf3d" onclick="'.$clk.'">
						SUCCESSFUL!
					</button>';
}
if($achieved==null)$achieved=0;
//pics
$pics="";
$num_pics=count($pic);
for($ipic=0;$ipic<$num_pics;$ipic++){
	$pics=$pics.'
	<div>
	<img src="main/'.$pic[$ipic].'" id="IMG_8" alt="Loading Image.." />
	</div>';
}
        
        
        
$userDet_="";
if($userDet!="")
$userDet_='
							<li id="H_LI_20">
								'.$userDet.'.
							</li>';
	echo 	'<li id="H_LI_4">
				<h1 id="H1_5">
                <img src="/img/map-icon.png" style="width:20px;height:20px;float:left"/>
					'.$stn.','.$locn.'
				</h1> 
                <h1 id="H1_6">
                <img src="user.png" style="float:left;margin-left:7px;margin-top:3px"/>
					60 Supporters
				</h1> 
<hr class="style13"> 
				<figcaption id="FIGCAH_PTION_9">
							<h3 id="H3_12">
								<font style="font-weight:bolder;font-size:20px">'.$headline.'</font><br>
							</h3><span style="color:#494949;margin-left:10px">-by</span>
                            <font style="color:#2196F3">'.$userDet.'</font>
					<div id="H_DIV_17" class="details '.$cls1.'">
						<ul id="H_UL_18">
							<li id="H_LI_19">
							'.$tagline.'
                            <br>....<a onclick="'.$clk.'" style="color:#2196F3">more</a>
							</li>
						</ul>
				</figcaption>
				<figure id="FIGURE_6"> 
					<div class="owl-carousel">
					'.$pics.'</div>
				</figure>
				
					
                <div style="float:right;margin-top:-70px;">
                <a href="https://www.facebook.com/daanvir.org/"><img src="img/fbicon.png" style="padding-right
                 :-2px;height:30px;width:30px;"/></a>
                <a><img src="img/twittericon.png" style="padding-right:-2px;height:32px;width:32px;"/></a>
                <a href="https://www.instagram.com/daanvir_india/"><img src="img/g+.png" style="padding-right
                :-2px;height:30px;width:30px;"/></a>
                </div>
                
					</div>
					<div id="inline">
					<div id="H_DIV_23">
						<h2 id="H_H2_24">
							Target
						</h2>
						<p id="H_P_25">
							'.$sumt.'
						</p>
					</div>
					<div id="H_DIV_26">
						<h2 id="H_H2_27">
							Achieved
						</h2>
						<p id="H_P_28">
							'.$achieved.'
						</p>
					</div> </div>'.$btn.'
					
				<div id="H_DIV_30">
					<div id="H_DIV_31" style="height:'.$bcopy.'%">
						</b></div>
					</div>
                    <div id="rtd"><b id="H_B_32">'.$bar.'%
				</div>
				'.$btn2.'
			</li>
		';			 
}	
} 
function handle_smart_quotes($string)
{
	if ( !preg_match('/^\\X*$/u', $string)) {
    $string = utf8_encode($string);
}
    $quotes = array(
	 
   "\xC2\x82" 	   => 	"'",
   "\xC2\x84" 	   => 	'"',
   "\xC2\x8B" 	   => 	"'",
   "\xC2\x91" 	   => 	"'",
   "\xC2\x92" 	   => 	"'",
   "\xC2\x93" 	   => 	'"',
   "\xC2\x94" 	   => 	'"',
   "\xC2\x9B" 	   =>   "'",
   
   "\xC2\xAB"      =>   '"',
   "\xC2\xBB"      =>   '"',
   "\xE2\x80\x98"  =>   "'",
   "\xE2\x80\x99"  =>   "'",
   "\xE2\x80\x9A"  =>   "'",
   "\xE2\x80\x9B"  =>   "'",
   "\xE2\x80\x9C"  =>   '"',
   "\xE2\x80\x9D"  =>   '"',
   "\xE2\x80\x9E"  =>   '"',
   "\xE2\x80\x9F"  =>   '"',
   "\xE2\x80\xB9"  =>   "'",
   "\xE2\x80\xBA"  => 	"'",
   
    chr(145)       => 	"'",
    chr(146)       => 	"'",
    chr(147)       => 	'"',
    chr(148)       => 	'"',
    chr(151)       => 	' - ',
	
	'&#8216;'      => 	 "'",
	'&#8217;'      =>	 "'",
	'&#8220;'      =>	 '"',
	'&#8221;'      =>  	 '"',
	
    '&lsquo;'      => 	 "'",
    '&rsquo;'      =>	 "'",
    '&ldquo;'      =>	 '"',
    '&rdquo;'      =>	 '"',
    '&mdash;'      =>	 ' - ',
    '&ndash;'      =>	 '-'
	
    );
	 
$smartq = array_keys  ($quotes); // but: for efficiency you should
$normalq = array_values($quotes); // pre-calculate these two arrays
$string = str_replace($smartq, $normalq, html_entity_decode($string, ENT_QUOTES, "UTF-8")); 
    return $string;
}

function handle_data($data){ 
$data = str_replace('</fcollected>', ' ',$data);
$data=handle_smart_quotes($data);
$data=strip_tags(mysqli_real_escape_string($GLOBALS['conn'],$data),'<br>');      
return stripslashes($data);
}

function print_addr($zip){ 
$retrieve=mysqli_query($GLOBALS['conn'],"SELECT * FROM map WHERE pincode= '$zip' ORDER BY pincode LIMIT 1"); 
$num=mysqli_num_rows($retrieve);
if($num<1){
	echo '<div id="p_div" >Error: No Results Found!</div>';
	exit();
}

$row= mysqli_fetch_assoc($retrieve); 
$state = $row['State'];
$district = $row['District'];
$sub_district = $row['SubDistrict'];
$village = $row['Village'];
return  "<p id=\"hitlist_expand_p\" style=\"padding:20px 25px;
    z-index: 0; position:absolute;top:0;left:0\">
		  <br>Sub-District: ".$sub_district."
		  <br>District: ".$district."
		  <br>State: ".$state."
		  <br>INDIA
		  <br> - ".$zip."</p>"; 
}

function getMap($zip){ 
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$zip."&sensor=false";
    $details=file_get_contents($url);
    $result = json_decode($details,true); 
    $lat=$result['results'][0]['geometry']['location']['lat']; 
    $lng=$result['results'][0]['geometry']['location']['lng'];
 
 $map='<div id="hmap" style="height:360px"></div>';
 $map.='
 <script type="text/javascript">
 
 var map, heatmap;
';


$map.="
var styles = {
        default: null,
        silver: [
          {
            elementType: 'geometry',
            stylers: [{color: '#f5f5f5'}]
          },
          {
            elementType: 'labels.icon',
            stylers: [{visibility: 'off'}]
          },
          {
            elementType: 'labels.text.fill',
            stylers: [{color: '#616161'}]
          },
          {
            elementType: 'labels.text.stroke',
            stylers: [{color: '#f5f5f5'}]
          },
          {
            featureType: 'administrative.land_parcel',
            elementType: 'labels.text.fill',
            stylers: [{color: '#bdbdbd'}]
          },
          {
            featureType: 'poi',
            elementType: 'geometry',
            stylers: [{color: '#eeeeee'}]
          },
          {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [{color: '#757575'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'geometry',
            stylers: [{color: '#e5e5e5'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#9e9e9e'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#ffffff'}]
          },
          {
            featureType: 'road.arterial',
            elementType: 'labels.text.fill',
            stylers: [{color: '#757575'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: '#dadada'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'labels.text.fill',
            stylers: [{color: '#616161'}]
          },
          {
            featureType: 'road.local',
            elementType: 'labels.text.fill',
            stylers: [{color: '#9e9e9e'}]
          },
          {
            featureType: 'transit.line',
            elementType: 'geometry',
            stylers: [{color: '#e5e5e5'}]
          },
          {
            featureType: 'transit.station',
            elementType: 'geometry',
            stylers: [{color: '#eeeeee'}]
          },
          {
            featureType: 'water',
            elementType: 'geometry',
            stylers: [{color: '#c9c9c9'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#9e9e9e'}]
          }
        ],

        night: [
          {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
          {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
          {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
          {
            featureType: 'administrative.locality',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
          },
          {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'geometry',
            stylers: [{color: '#263c3f'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#6b9a76'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#38414e'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry.stroke',
            stylers: [{color: '#212a37'}]
          },
          {
            featureType: 'road',
            elementType: 'labels.text.fill',
            stylers: [{color: '#9ca5b3'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: '#746855'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [{color: '#1f2835'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'labels.text.fill',
            stylers: [{color: '#f3d19c'}]
          },
          {
            featureType: 'transit',
            elementType: 'geometry',
            stylers: [{color: '#2f3948'}]
          },
          {
            featureType: 'transit.station',
            elementType: 'labels.text.fill',
            stylers: [{color: '#d59563'}]
          },
          {
            featureType: 'water',
            elementType: 'geometry',
            stylers: [{color: '#17263c'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#515c6d'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.stroke',
            stylers: [{color: '#17263c'}]
          }
        ],

        retro: [
          {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
          {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
          {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
          {
            featureType: 'administrative',
            elementType: 'geometry.stroke',
            stylers: [{color: '#c9b2a6'}]
          },
          {
            featureType: 'administrative.land_parcel',
            elementType: 'geometry.stroke',
            stylers: [{color: '#dcd2be'}]
          },
          {
            featureType: 'administrative.land_parcel',
            elementType: 'labels.text.fill',
            stylers: [{color: '#ae9e90'}]
          },
          {
            featureType: 'landscape.natural',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'poi',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'poi',
            elementType: 'labels.text.fill',
            stylers: [{color: '#93817c'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'geometry.fill',
            stylers: [{color: '#a5b076'}]
          },
          {
            featureType: 'poi.park',
            elementType: 'labels.text.fill',
            stylers: [{color: '#447530'}]
          },
          {
            featureType: 'road',
            elementType: 'geometry',
            stylers: [{color: '#f5f1e6'}]
          },
          {
            featureType: 'road.arterial',
            elementType: 'geometry',
            stylers: [{color: '#fdfcf8'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry',
            stylers: [{color: '#f8c967'}]
          },
          {
            featureType: 'road.highway',
            elementType: 'geometry.stroke',
            stylers: [{color: '#e9bc62'}]
          },
          {
            featureType: 'road.highway.controlled_access',
            elementType: 'geometry',
            stylers: [{color: '#e98d58'}]
          },
          {
            featureType: 'road.highway.controlled_access',
            elementType: 'geometry.stroke',
            stylers: [{color: '#db8555'}]
          },
          {
            featureType: 'road.local',
            elementType: 'labels.text.fill',
            stylers: [{color: '#806b63'}]
          },
          {
            featureType: 'transit.line',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'transit.line',
            elementType: 'labels.text.fill',
            stylers: [{color: '#8f7d77'}]
          },
          {
            featureType: 'transit.line',
            elementType: 'labels.text.stroke',
            stylers: [{color: '#ebe3cd'}]
          },
          {
            featureType: 'transit.station',
            elementType: 'geometry',
            stylers: [{color: '#dfd2ae'}]
          },
          {
            featureType: 'water',
            elementType: 'geometry.fill',
            stylers: [{color: '#b9d3c2'}]
          },
          {
            featureType: 'water',
            elementType: 'labels.text.fill',
            stylers: [{color: '#92998d'}]
          }
        ],

        hiding: [
          {
            featureType: 'poi.business',
            stylers: [{visibility: 'off'}]
          },
          {
            featureType: 'transit',
            elementType: 'labels.icon',
            stylers: [{visibility: 'off'}]
          }
        ]
      };";
	

$map.='
 var heatmapData = [  
 {location: new google.maps.LatLng('.($lat).', '.($lng).'), weight: 7}
 
];
var area = new google.maps.LatLng('.($lat+0.063981).', '.($lng-0.107984).');
var pt = new google.maps.LatLng('.$lat.', '.$lng.');
map = new google.maps.Map(document.getElementById(\'hmap\'), {
  center: area,
  zoom: 12,
  mapTypeId: \'roadmap\'
});

 heatmap = new google.maps.visualization.HeatmapLayer({
  data: heatmapData,
  map:map
});
heatmap.setMap(map);
heatmap.set(\'radius\',50);
heatmap.set(\'opacity\',0.4); 
//heatmap.set(\'dissipating\',false); 
map.setOptions({styles: styles[\'retro\']});	  
var image = \'http://daanvir.org/images/marker.png\';
var beachMarker = new google.maps.Marker({
          position: {lat: '.$lat.', lng: '.$lng.'},
          map: map,
          icon: image
	  });
/*var cityCircle = new google.maps.Circle({
            strokeColor: \'#ff6633\',
            strokeOpacity: 0.3,
            strokeWeight: 2,
            fillColor: \'#ffcc00\',
            fillOpacity: 0.25,
            map: map,
            center: pt,
            radius: Math.sqrt(30) * 100
          });
          */
$("#hmap").css("overflow","visible");
';
// default, silver, night, retro, hiding 
  
$map.='	  
   function toggleHeatmap() {
        heatmap.setMap(heatmap.getMap() ? null : map);
      } 

      function changeGradient() {
        var gradient = [
          \'rgba(0, 255, 255, 0)\',
          \'rgba(0, 255, 255, 1)\',
          \'rgba(0, 191, 255, 1)\',
          \'rgba(0, 127, 255, 1)\',
          \'rgba(0, 63, 255, 1)\',
          \'rgba(0, 0, 255, 1)\',
          \'rgba(0, 0, 223, 1)\',
          \'rgba(0, 0, 191, 1)\',
          \'rgba(0, 0, 159, 1)\',
          \'rgba(0, 0, 127, 1)\',
          \'rgba(63, 0, 91, 1)\',
          \'rgba(127, 0, 63, 1)\',
          \'rgba(191, 0, 31, 1)\',
          \'rgba(255, 0, 0, 1)\'
        ]
        heatmap.set(\'gradient\', heatmap.get(\'gradient\') ? null : gradient);
      }

      function changeRadius() {
        heatmap.set(\'radius\', heatmap.get(\'radius\') ? null : 20);
      }

      function changeOpacity() {
        heatmap.set(\'opacity\', heatmap.get(\'opacity\') ? null : 0.2);
      }
 </script>
 '; 
return $map;
}

function getHIT($hID){ 
    ob_start();
	print_hit($hID);
    return ob_get_clean();
}

function getBar($hitId){ 
	$check1=mysqli_query($GLOBALS['conn2'],"SELECT need_ids FROM hitlist WHERE hitId='$hitId'");   
	$num1=mysqli_num_rows($check1); 
	if($num1==1){ 
		$result=mysqli_fetch_assoc($check1); 
		$need_ids=explode(',',$result['need_ids']);
		$l=0;
	    $r=0;
	    $count=0; 
	    $qy=0;   
		$s_curr=sizeof($need_ids);
		//$sumt=0;
	    //$achieved=0;
	for($g=0;$g<$s_curr;$g++){
	$check1=mysqli_query($GLOBALS['conn2'],"SELECT `qnty` FROM currentneeds WHERE `includeinhit`=1 AND `currentNeedId`='$need_ids[$g]' AND freeze=0");  
	
	$num1=mysqli_num_rows($check1);  
	if($num1>0){
	$row1=mysqli_fetch_assoc($check1);
		$cnid = $need_ids[$g];  
		$qy=$row1['qnty'];  
		//$sumt+=$qy;  
$check2=mysqli_query($GLOBALS['conn2'],"SELECT SUM(`currNeedFillNum`) as sum FROM `currfillmethod` WHERE currentNeedId='$need_ids[$g]' AND `confirmed`=1 ORDER BY fillmethodId DESC");  
		$count=mysqli_num_rows($check2); 
		$needqy=0;
		if($count==1){
		$r_count=mysqli_fetch_assoc($check2);
		$needqy=$r_count['sum'];
		//$achieved+=$needqy;
		} 
//%age 
	$l+=$needqy;
	$r+=$qy;
	if($qy!=0)
	$pc_q=round(($needqy/$qy)*100,1); 
	 	}
	}
$bar=0;
$bar_=0;
if($r!=0)
$bar=round(($l/$r)*100,1);   
return $bar;
	} 
}

function print_blog($loi){
    $hitId=$loi;
//def:true, then load on page else load in search
//load on page: include outer-sl as well
//$ifexists=mysqli_query($GLOBALS['conn2'],"SELECT hitId FROM hitlist WHERE localityId ='$locid'");
//$nif=mysqli_num_rows($ifexists);
//if($nif!=1)return;
    $data1=null; 
    $data2=null; 
    $l=0;
    $r=0;
    $qy=0; 
    $bar=0;
    $sumt=0;
    $count=0; 
        $stn=null;
        $st=null;
        $locn=null;
        $pic="";
        $tstamp='';
        $date='';
        $location="Not Specified";
        $headline="";
        $tagline="";
        $dsc=null;  
        $lc="locality108202".$hitId;
    	$hashtag="";
    $userDet='';
    $query = "SELECT userId,localityId,majorhit_desc,img,headline,tagline,location,need_ids,hashtag FROM hitlist WHERE hitId='$hitId'";
    $headdsc=mysqli_query($GLOBALS['conn2'],$query); 
    $ndsc=mysqli_num_rows($headdsc); 
    $need_ids=array();
    if($ndsc==1){
    $rdsc=mysqli_fetch_assoc($headdsc);  
    $dsc=$rdsc['majorhit_desc'];   
    $user=$rdsc['userId']; 
    $pic=$rdsc['img'];
    $locid=$rdsc['localityId'];
    $pic=explode(',',$pic);    
    $location=$rdsc['location']; 
    $headline=$rdsc['headline']; 
    $tagline=$rdsc['tagline']; 
    $hashtag=$rdsc['hashtag'];
    $need_ids=explode(',',$rdsc['need_ids']); 
     
     $headq=mysqli_query($GLOBALS['conn'],"SELECT stateId,localityName FROM localities WHERE localityId='$locid'"); 
    $n1=mysqli_num_rows($headq); 
    if($n1==1){
        $r1=mysqli_fetch_assoc($headq); 
        $stid=$r1['stateId']; 
        $locn=$r1['localityName'];  
    $headq1=mysqli_query($GLOBALS['conn'],"SELECT stateName FROM states WHERE stateId='$stid'"); 
    $n2=mysqli_num_rows($headq1); 
    if($n2==1){
        $r2=mysqli_fetch_assoc($headq1);  
        $st=$stn=$r2['stateName'];
            }
        }
    
    $headdsc_=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,state,city FROM users WHERE userId='$user'"); 
    $ndsc_=mysqli_num_rows($headdsc_); 
    if($ndsc_==1){
    $rdsc_=mysqli_fetch_assoc($headdsc_);  
    $userDet.=' '.$rdsc_['fName'];   
    if($rdsc_['lName']!="")
    $userDet.=' '.$rdsc_['lName'];  
    if($rdsc_['city']!="")
    $userDet.=', '.$rdsc_['city']; 
    if($rdsc_['state']!="")
    $userDet.=', '.$rdsc_['state'];     
        }
    }  
    if(array_key_exists(0,$pic)==false){
        $pic[0]='http://daanvir.org/images/picture0001.png';
    }
    //desc, locname and statename retrieved
    //Calculating class...
    $val=((rand(10,1000000))*242)+456;
    $cls1='details'.($val);
    $cls2='needs'.($val);
    $cls3='supports'.($val);
    //count total items and filled items            
    if($locn!=null){
        $s_curr=sizeof($need_ids);
    for($g=0;$g<$s_curr;$g++){
    //$target=mysqli_query($GLOBALS['conn2'],"SELECT qnty FROM currentneeds WHERE currentNeedId='$need_ids[$g]' AND includeinhit=1 AND freeze=0");
    //$number=mysqli_num_rows($target);
    //if($number==1){
    //    $res=mysqli_fetch_assoc($target);  
    //    $sumt.=$res['qnty']; 
    //}
    $achieved=0;
    //$filled=mysqli_query($GLOBALS['conn2'],"SELECT SUM(currNeedFillNum) as sum FROM currfillmethod WHERE currentNeedId='$need_ids[$g]'");  
    //$achieved_num=mysqli_num_rows($filled);
    //if($achieved_num==1){
    //    $row_achieved=mysqli_fetch_assoc($filled);
    //    $achieved=$row_achieved['sum'];
    //    }  
    $check1=mysqli_query($GLOBALS['conn2'],"SELECT  currentNeedDesc,qnty, qnty_unit FROM currentneeds WHERE includeinhit=1 AND currentNeedId='$need_ids[$g]' AND freeze=0");
    $num1=mysqli_num_rows($check1);  
    if($num1==1){
        $row1=mysqli_fetch_assoc($check1);
        $cnid = $need_ids[$g]; 
        $cndsc=$row1['currentNeedDesc']; 
        $qy=$row1['qnty']; 
        $qu=$row1['qnty_unit'];
        $sumt+=$qy;  
//print needs
        $check2=mysqli_query($GLOBALS['conn2'],"SELECT SUM(currNeedFillNum) as sum FROM currfillmethod WHERE currentNeedId='$need_ids[$g]' AND confirmed=1 ORDER BY fillmethodId DESC");  
        $count=mysqli_num_rows($check2); 
        $needqy=0;
        if($count==1){
        $r_count=mysqli_fetch_assoc($check2);
        $needqy=$r_count['sum'];
        $achieved+=$needqy;
        }
//%age
//    $l+=$count;
    
    $l+=$needqy;
    $r+=$qy;
    if($qy!=0)
    $pc_q=round(($needqy/$qy)*100,1);
    $need=$cndsc.'- ('.$pc_q.'% filled)';
    //$need=$cndsc;
    $data1.='<li id="H_LI_19">'.$need.'
            </li>';
    if($count>0){
        $check22=mysqli_query($GLOBALS['conn2'],"SELECT DISTINCT userId FROM currfillmethod WHERE currentNeedId='$cnid' AND confirmed=1 ORDER BY fillmethodId DESC"); 
    while($kind=mysqli_fetch_assoc($check22)){ 
    $filler=$kind['userId'];  
    $details=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,state FROM users WHERE userId='$filler'"); 
    $details2=mysqli_query($GLOBALS['conn2'],"SELECT dated FROM currfillmethod WHERE currentNeedId='$cnid' AND userId='$filler' ORDER BY dated DESC LIMIT 1");  
    $details2_=mysqli_query($GLOBALS['conn2'],"SELECT * FROM transac WHERE cust_id='$filler' AND hitId='$hitId'");  
    
    $n=mysqli_num_rows($details);
    $n_=mysqli_num_rows($details2);
     if($n==1 && $n_==1){
    $rdet=mysqli_fetch_assoc($details); 
    $rdet2=mysqli_fetch_assoc($details2);  
    $n_2=mysqli_num_rows($details2_);
    if($n_2>0){
        //$m_curr=mysqli_fetch_assoc($details2_);
        //$money_=$m_curr['amount'];
        //currency donated 
        $currency='<i id="currency"></i>';
    }else{
        $currency='';
    }
    $name=$rdet['fName'].' '.$rdet['lName'];  
    $state=$rdet['state'];      
    $tstamp=$rdet2['dated']; 
    $date = ' - <strong style="font-size:12px">'.timeAgo($tstamp).'</strong>';     
    if(!empty($state)){
        $state=', '.$state;
    }    
    $person=$name.$state;

        
//print donators for each need id                                 
                                }                        
                            }
                        }
        
                    //} 
                }
    }//new
if($r!=0)
    $bar=round(($l/$r)*100,1); 
$bcopy=$bar;
if($bar<10){
    $bcopy=10;
}
if($bar>100){
    $bcopy=100;
}
//lc is hitid
$clk='fullView2(\''.$st.'\',\''.$locn.'\',\''.$lc.'\',2);';
// $clk2='fullView(\''.$st.'\',\''.$locn.'\',\''.$lc.'\',2);';  
if(!isset($_SESSION['userId'])){
//$clk='clk();';    
}    
$btn='<button id="H_H_BUTTON_29" onclick="'.$clk.'">
                        READ THEM
                    </button>';
$btn2='';

 if($dsc!="")                    
$btn2='<button id="expand" onclick="'.$clk2.'">In-depth Analysis</button>';

           
if($bar>100){
//$bar="%100+";
$bar="100+";
}else{
//$bar="%".$bar;
$bar=$bar;
}                
if($bar>=100){ 
$btn='<button id="H_H_BUTTON_29" style="background:#acdf3d" onclick="'.$clk.'">
                        SUCCESSFUL!
                    </button>';
}
if($achieved==null)$achieved=0;
//pics
$pics="";
$num_pics=count($pic);
    
        
        
$userDet_="";
    echo     ' <div id="box">
         <img src="main/'.$pic[1].'" id="image" style="height: 180px; width: 200px">
</div>
        <div>
        <p id="hashtag">hello world</p>
        <p>this is a tagline</p>';             
}    
}	
 

 
?>