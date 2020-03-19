<?php 

//load connection

require '../db/init.php';  
//data = a 
//could be a localityname state name
$a= Sanitize($_POST['a']);
$str= Sanitize($_POST['b']); 
//if($str===1){
//search campaigns only	
//}

$hint = "";
if(!empty($a)){
$i=0;  
//first select locality name, then state name 
$a=strtolower($a);
$qu=mysqli_query($GLOBALS['conn'],"SELECT DISTINCT(localityId) FROM localities WHERE localityName lIKE('%".$a."%') ORDER BY localityName");
$num=mysqli_num_rows($qu);
if($num>0){
	$array = array();
while ($row = mysqli_fetch_array($qu)) {
    $array[]= "locality07311".$row['localityId']; 
} 
	 echo json_encode(array('data' => $array, 'status' => 1));
}else{
$qu1=mysqli_query($GLOBALS['conn'],"SELECT DISTINCT(stateId) FROM states WHERE stateName LIKE ('%".$a."%') ORDER BY stateName");

$num2=mysqli_num_rows($qu1); 
if($num2>0){
	$array = array();
while ($row = mysqli_fetch_array($qu1)) { 
    $temp = $row['stateId'];
$qu2=mysqli_query($GLOBALS['conn'],"SELECT localityId FROM localities WHERE stateId='$temp'");
$num3=mysqli_num_rows($qu2); 
if($num3>0){ 
while ($row = mysqli_fetch_array($qu2)) {  
    $array[]= "locality07311".$row['localityId']; 
}
} 
}
	 echo json_encode(array('data' => $array, 'status' => 1));
}else{ 
	$ey='<h2 id="not_found">We could not find any such terms in our records!<h2>';
	 echo json_encode(array('data' => $ey, 'status' => 0));
}
}
}

?>