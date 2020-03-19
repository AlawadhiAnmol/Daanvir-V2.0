<?php  
require '../db/init.php';   

$its=Sanitize($_POST['t']);  
$id=Sanitize($_POST['id']);     
if($id==2){ 
$data=Sanitize($_POST['data']); 
$data=explode(',',$data);  
$size=count($data);
	//loc ids 
if($size>0){   
for($i=0;$i<$size;$i++){  
$locid=substr($data[$i],13);  

$checkpre=mysqli_query($GLOBALS["conn2"],"SELECT hitId FROM hitlist WHERE localityId = '$locid'") ;
$numpre=mysqli_num_rows($checkpre);  
	if($numpre>0){  
		while($rows=mysqli_fetch_assoc($checkpre)){
		$hitId = $rows['hitId'];
	print_hit($hitId); }
}
} 
}
}else{ 
$checkpre=mysqli_query($GLOBALS["conn2"],"SELECT hitId FROM hitlist WHERE hitId>'$its' ORDER BY hitId LIMIT 6") ;
$numpre=mysqli_num_rows($checkpre);  
	if($numpre>0){ 
	$more=$numpre; 
		while($rows=mysqli_fetch_assoc($checkpre)){
			$hitId = $rows['hitId'];
//$check=mysqli_query($GLOBALS["conn2"],"SELECT DISTINCT localityId FROM currentneeds WHERE includeinhit=1 AND freeze=0 AND localityId>'$its' ORDER BY localityId LIMIT 8") ; 
//$check=mysqli_query($GLOBALS["conn2"],"SELECT localityId FROM hitlist WHERE hitId='$hitId'") ; 
// or die(mysqli_error($GLOBALS["conn2"]))
//$num=mysqli_num_rows($check);  
	//if($num==1){
	//echo '<ul class="owl-carousel1">';
	//while($row=mysqli_fetch_assoc($check)){ 
	//	$locid=$row['localityId'];
		//echo '<div>';
		print_hit($hitId);  
		//echo '</div>';
		 	$more--;  
	//	} 
	//}
}
	//echo '</ul>';	
	
	$prev=0;
	if($its >=8){
		$prev=$its-8;
	}
if($more==0 && $its>0){
	
	echo '  
	<div id="bottom-line">
	<button id="bottom-line-more" onclick="loadMore('.$prev.',\'null\',1);">Prev</button> <button id="bottom-line-more" onclick="loadMore('.$hitId.',\'null\',1);">More</button>
	</div>';
	
}else{ 
	echo ' 
	<div id="bottom-line">
	<button id="bottom-line-more" onclick="loadMore('.
$hitId.',\'null\',1);">More</button>
	</div>';
} 
	}else{
	echo '<br><p style="margin-bottom:170px;
    font-size: 16px;margin-top:170px; padding:15px;color:#333">Could not Find More Results<p> <br><br><br>';
		
	echo ' 
	<div id="bottom-line">
	<button id="bottom-line-more" onclick="loadMore(0,\'null\',1);">Back</button>
	</div>'; 
}
}
 

?>