<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
 
require_once("../main/db/init.php");

$MERCHANT_KEY = "hDkYGPQe";
$SALT = "yIEkykqEH3";

$PAYU_BASE_URL = "https://test.payu.in/_payment";

$paramList = array();

//https://secure.payu.in/_payment	
//https://test.payu.in/_payment
 
if(!isset($_SESSION['ordr_id'])){ 
echo 'Code: XX01: We are Sorry, Something went wrong!';
exit();	
}

$ORDER_ID = $_SESSION['ordr_id'];
$CUST_ID = $_SESSION['cust_id']; 
$TXN_AMOUNT = $_SESSION['total_amount'];
$CALLBACK_URL_S="http://daanvir.org/PayumoneyKit/pgResponse.php";
$CALLBACK_URL_F="http://daanvir.org/PayumoneyKit/pgResponse.php";
$SERVICE_PROVIDER="payu_paisa";

if(array_key_exists($ORDER_ID,$_SESSION) && !empty($_SESSION[$ORDER_ID])) { 
}else{
echo 'Code: XY02: We are Sorry, Something went wrong!';
exit();	
}
$session_arr = $_SESSION[$ORDER_ID];
$session_arr = explode("/", $session_arr); 

$firstname = $session_arr[0];
$email = $session_arr[2];
$phone = $session_arr[1]; 
$service_provider = $SERVICE_PROVIDER;
$amount = $TXN_AMOUNT;
$txnid = $ORDER_ID;
$productinfo = $CUST_ID;
$surl = $CALLBACK_URL_S;
$furl = $CALLBACK_URL_F;
 
//Checksum 
$Checksum=$MERCHANT_KEY.'|'.$txnid.'|'.$amount.'|'.
$productinfo.'|'.$firstname.'|'.$email.'|||||||||||'.$SALT;
$hash =strtolower(hash("sha512", $Checksum)); 

$paramList["key"] = $MERCHANT_KEY;
$paramList["hash"] = $hash;
$paramList["txnid"] = $txnid;
$paramList["amount"] = $amount;
$paramList["firstname"] = $firstname;
$paramList["email"] = $email;
$paramList["phone"] = $phone;
$paramList["productinfo"] = $productinfo;
$paramList["service_provider"] = $service_provider;
$paramList["surl"] = $surl;
$paramList["furl"] = $furl;

?>
<html>
<head>
<title>Daanvir Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo $PAYU_BASE_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php 
			foreach($paramList as $name => $value){
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">'; 
			} 
			?> 
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>





