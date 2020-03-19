<?php 
include '../db/init.php'; 
require_once 'src/Facebook/autoload.php';
$fName=Sanitize($_POST['fname']);
$lName=Sanitize($_POST['lname']);
$uId=Sanitize($_POST['id']);
$eMail=Sanitize($_POST['email']); 
$p=Sanitize($_POST['set']); 
$token=Sanitize($_POST['chk']); 
$a=0;
$tl=trim($fName) ;
$tl2=trim($lName) ;
$uId=trim($uId) ;
$em=trim($eMail) ;

//Verify id with cookie data
$fb = new Facebook\Facebook([
  'app_id' => '1807657979451474',
  'app_secret' => '735835453ee2f659275cc1262efec7a1',
  'default_graph_version' => 'v2.2',
  ]);
 
$helper = $fb->getJavaScriptHelper();
 
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage(); 
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  echo 'No cookie set or no OAuth data could be obtained from cookie.';
  exit;
}

// Logged in
//echo '<h3>Access Token</h3>';
//var_dump($accessToken->getValue());

//$_SESSION['fb_access_token'] = (string) $accessToken;

// User is logged in!
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');

// It should work now
$c=0;
//$u=$fb->getUser();
//if($u){
	try{	

//$user_details = "https://graph.facebook.com/me?fields=email,name,id,access_token=" .$accessToken;
//$response = file_get_contents($user_details);
//$u_profile = json_decode($response,true);  
		//$u_profile=$fb->api('/me');
		
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,first_name,email', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$u_profile = $response->getGraphUser(); 
//echo $eMail.'=='.$u_profile['email'].', '.$uId.'=='.$u_profile['id'].', '.$fName.'=='.$u_profile['first_name'];
//echo $eMail.'=='.$u_profile['email'];
$el=$u_profile['email'];
//$t1=gettype($eMail);
//$t2=gettype($el);
if (!filter_var($eMail, FILTER_VALIDATE_EMAIL)){
echo 'Error! User Not Registered Using an Email.';
exit();
}
if($eMail==$u_profile['email'] && $uId==$u_profile['id'] && $fName==$u_profile['first_name'])$c=1;
	}catch(FacebookApiException $e){
		$u_profile=null;
}
//}
if($c==1){//1
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$p=generateRandomString(10);
$p=md5($p);
$username=$fName.generateRandomString(4);
$qu=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE username='$username'");
$num=mysqli_num_rows($qu);
while($num==1){ 
$username=generateRandomString();
$qu=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE username='$username'");
$num=mysqli_num_rows($qu);
}
if(empty($tl) || (!preg_match("/^[a-zA-Z]*$/",$fName))){
	$a=1;
} 
if(empty($tl2) || (!preg_match("/^[a-zA-Z]*$/",$lName))){
	$a=1;
}  
if(empty($em) || (!filter_var($eMail,FILTER_VALIDATE_EMAIL))){
	$a=1;
}
if(loggedIn()==true){
	$a=1;
}
if((!preg_match('/^[0-9]*$/',$uId)) && strlen($uId)!=0){
	$a=1;
} 
if((!preg_match('/^[0-9]*$/',$p)) && strlen($p)<6){
	$a=1;
} 
if($a==0){
	$b=0; 
$query=mysqli_query($GLOBALS['conn'],"SELECT * FROM fblogin WHERE fb_id= '$uId' AND email='$eMail' AND fName= '$fName'");
$num=mysqli_num_rows($query);
//echo $uId.', ',$eMail.', '.$fName.', '.$num;
if($num!=1){
//echo 'b changed to one';
	$b=1;
	} 
	if($b==0){
		//user exists  
			$row=mysqli_fetch_assoc($query);
			$ud=$row['userId'];
			fbLogin($ud);
			//echo 'user exists'; 
		}else{
		//add user  
		$query4=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE email='$eMail'");
		$num4=mysqli_num_rows($query4);
		if($num4>0){
			//echo 'email registered';
		//user registered using that email  
			$row=mysqli_fetch_assoc($query4);
			$ud=$row['userId'];
		$query5=mysqli_query($GLOBALS['conn'],"INSERT INTO fblogin (fb_id,email,fName,userId) VALUES('$uId','$eMail','$fName','$ud')"); 
			fbLogin($ud); 
		}else{
		//new user 
			//echo 'add user';
		$query2=mysqli_query($GLOBALS['conn'],"INSERT INTO users (username,email,password,fname,lname,active) VALUES('$username','$eMail','$p','$fName','$lName',1)");
		$query3=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE email='$eMail' AND fName='$fName'");
		$num2=mysqli_num_rows($query3);
		if($num2==1){
			$row=mysqli_fetch_assoc($query3);
			$ud=$row['userId'];
		$query5=mysqli_query($GLOBALS['conn'],"INSERT INTO fblogin (fb_id,email,fName,userId) VALUES('$uId','$eMail','$fName','$ud')");
		fbLogin($ud);
		}}
	} 
}}else{ 
  echo 'Something went wrong!';
  exit;
} 
?>