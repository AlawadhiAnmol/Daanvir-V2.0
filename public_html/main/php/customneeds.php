 <?php  
require '../db/init.php';
$set=Sanitize($_POST['set']);
if($set=='n'){ 
$name=Sanitize($_POST['name']);
$desc=Sanitize($_POST['desc']);
$qy=Sanitize($_POST['qnty']);   
$f=1;  
  if (empty($name) || empty($desc) || empty($qy) || !preg_match("/^[a-zA-Z ]*$/",$name) || !preg_match("/^[a-zA-Z ]*$/",$desc) || !preg_match("/^[0-9]*$/",$qy)){
	  $f=0;
  }
if($f==0){
  echo 'f'; 
  }else{ 
$q=mysqli_query($GLOBALS['conn2'],"SELECT * FROM customneeds WHERE customNeedName='$name' AND customNeedDesc='$desc' AND customNeedQnty='$qy'");
$num=mysqli_num_rows($q);
if($num==0){
$q=mysqli_query($GLOBALS['conn2'],"INSERT INTO customneeds (customNeedName,customNeedDesc,customNeedQnty) VALUES ('$name','$desc','$qy')");
$q1=mysqli_query($GLOBALS['conn2'],"SELECT customNeedId FROM customneeds WHERE customNeedName='$name' AND customNeedDesc='$desc' AND customNeedQnty='$qy'");
$num_r=mysqli_num_rows($q1);
if($num_r>1){
$fet=mysqli_fetch_assoc($q1);
$fe=$fet['customNeedId'];
$size=sizeof($fe);
$fe=$fe[$size];
	$r=1;
}else if($num_r==1){
$fet=mysqli_fetch_assoc($q1);
$fe=$fet['customNeedId'];
	$r=1;
}
if($r==1){
$u=$userData['userId'];
$q2=mysqli_query($GLOBALS['conn2'],"INSERT INTO fillmethod (userId,customNeedId) VALUES ('$u','$fe')");
echo 'y';
}
}
  }
}else if($set=='m'){ 
$av1=Sanitize($_POST['av1']); 
$av2=Sanitize($_POST['av2']); 
$av3=Sanitize($_POST['av3']); 
$av4=Sanitize($_POST['av4']); 

$val=Sanitize($_POST['val']); 
$t=substr($val,19); 
$f=1;  
$ser=array($av1,$av2,$av3,$av4);
for($i=0;$i<4;$i++){
	if($ser[$i]!=null && empty($ser[$i])){
		$f=0;
	}
}
  if ( !preg_match("/^[a-zA-Z ]*$/",$av1) || !preg_match("/^[a-zA-Z ]*$/",$av4) || !preg_match("/^[0-9]*$/",$av2) || !preg_match("/^[0-9]*$/",$av3)){
	  $f=0;
  }
if($f==0){
  echo 'f'; 
  }else{ 
$q=mysqli_query($GLOBALS['conn2'],"SELECT * FROM categoryneedsfilled WHERE categoryNeed_typeId='$t' AND sex='$av1' AND size='$av2' AND qnty='$av3' AND t_desc='$av4'");
$num=mysqli_num_rows($q);
if($num==0){
$q=mysqli_query($GLOBALS['conn2'],"INSERT INTO categoryneedsfilled (categoryNeed_typeId,sex,size,qnty,t_desc) VALUES ('$t','$av1','$av2','$av3','$av4')"); 
$q1=mysqli_query($GLOBALS['conn2'],"SELECT catfilledId FROM categoryneedsfilled WHERE categoryNeed_typeId='$t' AND sex='$av1'  AND size='$av2' AND qnty='$av3' AND t_desc='$av4'");
$num_r=mysqli_num_rows($q1);
if($num_r>1){
$fet=mysqli_fetch_assoc($q1);
$fe=$fet['catfilledId'];
$size=sizeof($fe);
$fe=$fe[$size];
	$r=1;
}else if($num_r==1){
$fet=mysqli_fetch_assoc($q1);
$fe=$fet['catfilledId'];
	$r=1;
}
if($r==1){
$u=$userData['userId'];
$q2=mysqli_query($GLOBALS['conn2'],"INSERT INTO fillmethod (userId,catfilledId) VALUES ('$u','$fe')");
echo 'y';
}
}
  }
}
?>