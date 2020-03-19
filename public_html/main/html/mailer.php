<?php 

require_once('class.phpmailer.php');

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'support@daanvir.org';                 // SMTP username
$mail->Password = 'Daanvir@2018';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
//or 25/587, ssl on 465 
//$mail->Host = gethostbyname('server.elysium.com');
$mail->Host = gethostbyname('md-in-63.webhostbox.net');  // Specify main and backup SMTP servers
//$mail->Host = '184.154.163.210';
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
?>