<?php
require '../db/init.php';
$email=Sanitize($_POST['email']);

$chk=mysqli_query($GLOBALS['conn'],"SELECT * FROM contacts WHERE email = '$email'");
$num_rows=mysqli_num_rows($chk);
if($num_rows>0){    
	$row=mysqli_fetch_assoc($chk);
	$delID=$row['contactId'];
	$piCID=$row['profilePic'];
 
$h=mysqli_query($GLOBALS['conn'],"SELECT t.profilePic
    FROM contacts t
	WHERE t.profilePic= '$piCID' 
	GROUP BY t.profilePic
	HAVING COUNT(t.profilePic) > 1"); 
$num_pics=mysqli_num_rows($h);
if($num_rows>0){ 
//Another user has also set this pic   
$row=mysqli_fetch_assoc($chk);

}else{
//This pic is unique 
if (!unlink(".".$piCID)){}else{}
}

$c=mysqli_query($GLOBALS['conn'],"DELETE c.*, gc.* 
FROM contacts c 
LEFT JOIN get_contacts gc 
ON gc.contactId = c.contactId 
WHERE c.contactId = '$delID'");

	echo 'Success!';
}
?>