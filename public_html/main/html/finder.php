<?php require_once '../db/init.php'; ?>
<?php protectPage(); 
 
$w=Sanitize($_POST['w']);  
if($w==1 || $w==2){
$zip=Sanitize($_POST['s']); 
if(strlen($zip)!=6){
	echo '<div id="p_div" >Error:Invalid ZIP provided!</div>';
	exit();
}
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
//$locality_details1 = $row['Locality_Details1'];
//$locality_details2 = $row['Locality_Details2'];
//$locality_details3 = $row['Locality_Details3'];
if($w==1){
	$cls='thisadd1';
	$nxt='next(1,2);';
}else if($w==2){ 
	$cls='thisadd2';
	$nxt='check(0);';
}
$address= "<h4>Select area</h4><p class=\"select_area\">Please click on the following address to select</p>
<div id=\"p_div\" onclick=\"add('".$cls."');\" class=\"".$cls."\">Village: ".$village."
		  <br>Sub-District: ".$sub_district."
		  <br>District: ".$district."
		  <br>State: ".$state."
		  <br>INDIA</div>
		   
			<ul id=\"fields-donation\">
					<li id=\"field-donation\" class=\"register_don_2\">
						<div id=\"partof-field-donation\">
							<button style=\"background:#2196f3\" id=\"buttonof-partof\" onclick=\"".$nxt."\">Next</button>
						</div>
					</li>
			</ul>
			<script>add('".$cls."');".$nxt."</script>
			";
echo $address; 
} 

?> 
