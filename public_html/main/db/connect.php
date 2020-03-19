<?php 
$servername = "localhost";
$username="daanvaq7";
$password="Ankit@123@";
//$username="tempedit@daanvir.org";
//$password="tempedit@123";
 
//$password="arvin@167";
 
$conn = mysqli_connect($servername, $username, $password); 
$conn2 = mysqli_connect($servername, $username, $password); 

mysqli_select_db( $conn, 'daanvaq7_vifixes_daanvir'); 
mysqli_select_db( $conn2, 'daanvaq7_vifixes_needs');
//check
if(!'conn' || !'conn2')
	die("Connection Unsuccessful: ".mysqli_connect_error());

?>