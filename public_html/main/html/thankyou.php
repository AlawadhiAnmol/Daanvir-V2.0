<?php 
require '../db/init.php';
$u=$userData['userId'];
$date=$_POST['b'];
$pickup=$_POST['c'];
$ad=strip_tags($_POST['a']);
$name=$userData['fName'];

$day= date("D", strtotime($date));
$daynum= date("d", strtotime($date));
$mon= date("F", strtotime($date)); 
$pickline='';


date_default_timezone_set('Asia/Calcutta');
$today=time(); 
//$today= date("Y-m-d", strtotime($today));

$future = strtotime($date); 
//$today = strtotime($date);  
 
$timeleft = $future-$today;
$daysleft = round((($timeleft/24)/60)/60);  

if($pickup==0){
	$pickline='
<p>Pickup Scheduled for : </p>
<h4>'.$day.', '.$mon.' <strong>'.$daynum.'</strong></h4>
<p>We will reach you in:</p>
<h4><strong>'.$daysleft.'</strong> days</h4> ';
}else{
	$pickline='
<p>Donation confirmed for : </p>
<h4>'.$day.', '.$mon.' <strong>'.$daynum.'</strong></h4>
<p>You may want to note down this address for donation:</p>
<h4><strong style="color:tan;font-size:18px">'.$ad.'</strong></h4>';
}
$tag='Its not just charity, its a feel.';
$desc='Daanvir.org is a platform that helps you reinstate your neighbourhood by promoting support in its favour throughout the country. Not only you can donate to support the locality you believe in , but also you get a free opportunity to shift the flow of global sympathy from virtual reality to a real development of localities.';
$printed='
<div id="fb-root"></div>
<script> 
 $(function(){
 window.fbAsyncInit = function() {
            FB.init({
              appId      : \'1807657979451474\',
              xfbml      : true, cookie: true,status: true,
              version    : \'v2.2\'
            });
        };

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));

});

</script>
<div id="cover-articles">
<section id="thankyou-f">
<h2><strong>Thankyou</strong>! '.$name.'<br>For being a Daanvir</h2>
</section>
<section id="thankyou-l">
<!-- Or save address if pickup not available --> '.$pickline.'
<p>Add to your calendar:</p><br>
<b id="cal">'.$daynum.'</b><br>
<p>Would you like to share for a good thing:</p>
<!--Share button-->
<button onclick="fShare();">Share this moment on facebook</button>
<p>We would love if you add us in your connections:</p>
<!--Like button-->
<button>Connect with us on facebook</button>
</section>
</div>
<script type="text/javascript">
function fShare(){ 
var obj = {method: \'feed\', link: \'http://www.daanvir.org\', picture: \'http://daanvir.org/images/5.jpg\',name: \'Daanvir - '.$tag.'\',description: \''.$desc.'\'};
function callback(response){}
FB.ui(obj, callback);

}
</script>
	
';
echo $printed; 
?>

