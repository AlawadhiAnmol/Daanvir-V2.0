<?php 
require '../main/db/init.php'; 
protectPage();
if(admin($userData['userId']) !== true){
	header('Location:http://daanvir.org');
	exit();
} 
$type  = Sanitize($_POST['type']);
if($type<10){   
$a = Sanitize($_POST['input']); 
if($type==6){ 
$qu=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE email='$a'");
$num=mysqli_num_rows($qu);
if($num>0){
$qu2=mysqli_query($GLOBALS['conn'],"UPDATE users SET freeze=1 WHERE email = '$a'");
echo '&nbsp;&nbsp;&nbsp;Freezing email... Done!<br><br>'; 
}else{
echo '&nbsp;&nbsp;&nbsp;'.$a.': Email not Found..<br><br>';
	
}
exit();	
}
if($type==7){ 
$qu=mysqli_query($GLOBALS['conn'],"SELECT userId FROM users WHERE email = '$a'");
$num=mysqli_num_rows($qu);
if($num>0){
$qu2=mysqli_query($GLOBALS['conn'],"UPDATE users SET freeze=0 WHERE email = '$a'");
echo '&nbsp;&nbsp;&nbsp;UnFreezing email... Done!';
 
}else{
echo '&nbsp;&nbsp;&nbsp'.$a.';: Email not Found..';
	
}
exit();	
}
//Search All 
	echo '<div class="col-md-6">
                        <h5>Search Results!</h5>
                        <div class="panel-group" id="accordion'.$type.'">';
$hint = "";
if(!empty($a)){ 
//first select locality name, then state name 
$a=strtolower($a);
$qu=mysqli_query($GLOBALS['conn'],"SELECT DISTINCT(localityId),localityName FROM localities WHERE localityName lIKE('%".$a."%') ORDER BY localityName");
$num=mysqli_num_rows($qu);
if($num>0){
	$i=0;
while ($row = mysqli_fetch_array($qu)) {
	  $i++;  
	  show_hit($type, $row['localityId'],$i,0);
} 
}else{
$qu1=mysqli_query($GLOBALS['conn'],"SELECT DISTINCT(stateId) FROM states WHERE stateName LIKE ('%".$a."%') ORDER BY stateName");

$num2=mysqli_num_rows($qu1); 
if($num2>0){
	$i=0;
while ($row = mysqli_fetch_array($qu1)) { 
	
    $temp = $row['stateId'];
$qu2=mysqli_query($GLOBALS['conn'],"SELECT localityId FROM localities WHERE stateId='$temp'");
$num3=mysqli_num_rows($qu2); 
if($num3>0){  
while ($row = mysqli_fetch_array($qu2)) {  
	$i++;
	show_hit($type, $row['localityId'],$i,1);
}
} 
}
 }else{ 
	$ey='<h2 id="not_found">We could not find any such terms in our records!<h2>';  
}
}
}
echo '
                                </div>
                            </div>';
}else if($type>10 && $type<15){ 
$this_only = Sanitize($_POST['this_only']); 
$id        = Sanitize($_POST['id']);
if($this_only==1){
show_table(1,$id);
show_table(2,$id);
show_table(3,$id);
}else{
show_table($type-11,$id);
}
}else if($type==15){
$id        = Sanitize($_POST['id']); 

	$check_status=mysqli_query($GLOBALS['conn2'],"SELECT userId FROM hitlist WHERE hitId={$id} AND freeze=0");
	$status=mysqli_num_rows($check_status);
	if($status==1){
	$headdsc=mysqli_query($GLOBALS['conn2'],"UPDATE hitlist SET freeze=1 WHERE hitId={$id}");
	echo '&nbsp;&nbsp;&nbsp;Freezing Post.... Done!';	
		
	}else{
	$headdsc=mysqli_query($GLOBALS['conn2'],"UPDATE hitlist SET freeze=0 WHERE hitId={$id}");
	echo '&nbsp;&nbsp;&nbsp;UnFreezing Post... Done!';	
	}
} 
?>

<?php 
function show_hit($type,$val,$i,$j){
	$all=0;
	if($type==1)
	$all=1;
	$suf="";
	if($j===0){
		$suf="X";
	}else{
		$suf="Y";
	}
	$checkpre=mysqli_query($GLOBALS["conn2"],"SELECT hitId FROM hitlist WHERE localityId = {$val}");
$numpre=mysqli_num_rows($checkpre);  
	if($numpre>0){  
		while($rows=mysqli_fetch_assoc($checkpre)){
		$hitId = $rows['hitId'];
	 
		$headdsc=mysqli_query($GLOBALS['conn2'],"SELECT userId,majorhit_desc,localityId,headline,tagline,location FROM hitlist WHERE hitId={$hitId}"); 
	$ndsc=mysqli_num_rows($headdsc); 
	if($ndsc==1){
	$rdsc=mysqli_fetch_assoc($headdsc);  
	$dsc=$rdsc['majorhit_desc'];   
	$user=$rdsc['userId'];  
	$locid=$rdsc['localityId']; 
	$location=$rdsc['location']; 
	$headline=$rdsc['headline']; 
	$tagline=$rdsc['tagline']; 
	$st="";
	$locn="";
	$userDet="";
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
		$st=$r2['stateName'].', ';
			}
		}
		$headdsc_=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,state,city FROM users WHERE userId='$user'"); 
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
		if($type<5){
			$open="Open";
		}else if($type==5){ 
		$h_dsc=mysqli_query($GLOBALS['conn2'],"SELECT userId FROM hitlist WHERE hitId=".$hitId." AND freeze=0"); 
		$n_dsc=mysqli_num_rows($h_dsc); 
		if($n_dsc==1){ 
			$open="Freeze";
		}else{ 
			$open="UnFreeze";
			}	 
		}
		$raa = rand(10,1000000);
	  echo '<div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion'.$type.'" href="#collapse'.$type.$i.$suf.$raa.'" class="collapsed">'.$tagline.': '.$st.''.$locn.'</a>
                                    </h4>
                                </div>
                                <div id="collapse'.$type.$i.$suf.$raa.'" class="panel-collapse collapse" style="height: 0px;">
                                    <div class="panel-body">
                                       <b><i>'.$headline.'</i></b><br/><br/> '.$tagline.'<br/><br/>'.$dsc.'<br/><br/>Location: '.$location.'<br><br/><em style="padding:2px 6px;background-color:#2381d2;color:#fff;">'.$userDet.'</em><br/><br/>
									   <a href="#" onclick="expressed('.($type+10).','.$all.','.$hitId.');" class="btn btn-primary">'.$open.'</a>
                                    </div>
                                </div>
                            </div>';
	    	}	
    	}
	}
}
function show_table($t,$id){
	if($t==1){
	echo '<div class="col-md-12" id="print_transactions">
                        <h5>Transactions</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Order ID</th>
                                    <th>Date</th> <th>Amount</th></tr>
                            </thead>
                            <tbody>';
	$i = 0;						
$checkpre=mysqli_query($GLOBALS["conn2"],"SELECT * FROM transac WHERE hitId = ".$id." ORDER BY date DESC");
$numpre=mysqli_num_rows($checkpre);  
	if($numpre>0){ 
		while($rows = mysqli_fetch_assoc($checkpre)){ 
		$i++;
		$userId = $rows['cust_id'];
		$orderId = $rows['ordr_id'];
		$date = $rows['date'];
		$amount = $rows['amount'];
	    $headdsc_=mysqli_query($GLOBALS['conn'],"SELECT fName,lName,email,phone,state,city FROM users WHERE userId= ".$userId); 
	$ndsc_=mysqli_num_rows($headdsc_); 
	if($ndsc_==1){
	$rdsc_=mysqli_fetch_assoc($headdsc_);  
	$name = $rdsc_['fName'].' '.$rdsc_['lName'];     
	$city = $rdsc_['city']; 
	$state = $rdsc_['state'];
	$email = $rdsc_['email'];
	$phone = $rdsc_['phone']; 
	
	echo '
                                <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$name.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$phone.'</td>
                                    <td>'.$state.'</td>
                                    <td>'.$city.'</td>
                                    <td>'.$orderId.'</td>
                                    <td>'.$date.'</td>
                                    <td>'.$amount.'</td> 
                                </tr>';
	
	
		   }    					 
		}
	}
	echo '
							</tbody>
                        </table>
<a href="#" class="btn btn-info" onclick="printContent(\'print_transactions\');">Print document</a> 
                   <br><label>Please uncheck \'headers and footers\' option in print settings.</label> 
					</div><hr />';
	
	}else if($t==2 || $t==3){ 
	if($t==2){
	$header='Pickup Requests'; 
	}else{ 
	$header='Donating at Address';	
	}
	echo '<div class="col-md-12" id="print_transactions'.$t.'">
                        <h5>'.$header.'</h5>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Item</th>
                                    <th>Qnty</th>';
									
    if($t==2)
	echo '							<th>Address</th>';
    echo '                                
									<th>Date</th>
                                    <th>Scheduled</th> 
                                </tr>
                            </thead> 
                            <tbody>'; 
	$check=mysqli_query($GLOBALS["conn2"],"SELECT need_ids FROM hitlist WHERE hitId = ".$id);	
	if(mysqli_num_rows($check)==1){
		$r = mysqli_fetch_assoc($check);	
		$need_ids = explode(',',$r['need_ids']);
		$len= sizeof($need_ids);
		$j=0;
		for($i=0;$i<$len;$i++){ 
		if($t==2){
		$checked=mysqli_query($GLOBALS["conn2"],"SELECT fillmethodId, userId, dated, processed, currNeedFillNum, schedule_date FROM currfillmethod WHERE currentNeedId = ".$need_ids[$i]." AND confirmed=1 AND pickup=1 ORDER BY schedule_date");
		}else{
		$checked=mysqli_query($GLOBALS["conn2"],"SELECT fillmethodId, userId, dated, processed, currNeedFillNum, schedule_date FROM currfillmethod WHERE currentNeedId = ".$need_ids[$i]." AND confirmed=1 AND pickup=0 ORDER BY schedule_date");
			
		}
		if(mysqli_num_rows($checked)==1){
		$method=mysqli_fetch_assoc($checked);
		//$fillId=$method['fillmethodId'];
		$u=$method['userId'];
		$dated=$method['dated'];
		$processed=$method['processed'];
		$num=$method['currNeedFillNum'];
		$scheduled=$method['schedule_date'];
		$checkedin=mysqli_query($GLOBALS["conn2"],"SELECT currentNeedName, currentNeedDesc, qnty, qnty_unit FROM currentneeds WHERE currentNeedId = ".$need_ids[$i]);	
	    if(mysqli_num_rows($checkedin)==1){
		$method2=mysqli_fetch_assoc($checkedin);
		$need_name=$method2['currentNeedName'];
		if(!empty($method2['currentNeedDesc'])){
		$need_name.=': '.$method2['currentNeedDesc'];	
		}
		$qnty=$method2['qnty'].' '.$method2['qnty_unit'];
		$checkedin2=mysqli_query($GLOBALS["conn2"],"SELECT name,email,phone,state,city,address,zip FROM needfiller WHERE userId = ".$u." ORDER BY date DESC LIMIT 1");
	    if(mysqli_num_rows($checkedin2)==1){
		$method3   = mysqli_fetch_assoc($checkedin2);
		$name = $method3['name'];
		$email = $method3['email'];
		$phone = $method3['phone'];
		$address = $method3['address'].' '.$method3['city'].' '.$method3['state'].'- '.$method3['zip'];
		$j++;
		echo '
                                <tr>
                                    <td>'.$j.'</td>
                                    <td>'.$name.'</td>
                                    <td>'.$email.'</td>
                                    <td>'.$phone.'</td>
                                    <td>'.$need_name.'</td>
                                    <td>'.$qnty.'</td>';
		if($t==2)							
        echo '                      <td>'.$address.'</td>';
		
		echo '                      <td>'.$dated.'</td>
                                    <td>'.$scheduled.'</td> 
                                </tr>';
						}
					}
				}
			}
		}  
			echo '
							</tbody>
                        </table>
<a href="#" class="btn btn-info" onclick="printContent(\'print_transactions'.$t.'\');">Print document</a> 
                   <br><label>Please uncheck \'headers and footers\' option in print settings.</label> 
					</div><hr />';
	}
}
?>



