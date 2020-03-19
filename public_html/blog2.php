<?php
require_once 'main/db/init.php';
require 'main/db/connect.php';

$id1 = Sanitize($_GET['id1']);
$id1 = substr($id1, -2);
$help=array();
$need_ids=array();
$query = "SELECT * FROM hitlist WHERE hitId=$id1";
$result = mysqli_fetch_assoc( mysqli_query($conn2, $query) );

$title = $result['headline'];
$detail = $result['detail'];
$overview = $result['overview'];
$about = $result['tagline'];
$location = $result['location'];
$need_ids=explode(',',$result['need_ids']); 



$img_src = 'main/'.explode(',', $result['img'])[0];
$img_src2 = 'main/'.explode(',', $result['img'])[1];

$query = "SELECT * FROM currentneeds c inner join hitlist h on h.localityid=c.localityid  WHERE hitId=$id1";
$result = mysqli_fetch_assoc( mysqli_query($conn2, $query) );
$needsname = $result['currentNeedName'];
$needs = $result['currentNeedDesc'];
$quantity = $result['qnty'];
$unit = $result['qnty_unit'];



$query = "SELECT statename
FROM daanvaq7_vifixes_daanvir.localities c
INNER JOIN hitlist h ON h.localityid = c.localityid inner join daanvaq7_vifixes_daanvir.states s on s.stateid=c.stateid  
WHERE h.hitId=$id1";
$result = mysqli_fetch_assoc( mysqli_query($conn2, $query) );

$locality=$result['statename'];
echo "<script>console.log(".json_encode($result).");</script>";




$supporters = "NO SUPPORTERS SPECIFIED.";
?>

<!DOCTYPE html>
<html> 
<head><title>Daanvir - The brave steps that lead the nation</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no">
<link rel="stylesheet" href="main/normalize.css">
<script src='main/js/jquery.min.js'></script>
<link rel="shortcut icon" href="main/images/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="main/css/orton.css">
	<meta property="og:url"           content="<?php echo $_SERVER['PHP_SELF']; ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="<?php echo $detail; ?>" />
	<meta property="og:description"   content="<?php echo $title; ?> " />
	<meta property="og:image"         content="<?php echo $img_src; ?>" />
</head>
<body>
    
    <!-- Go to www.addthis.com/dashboard to customize your tools --> 
    <script type="text/javascript">
var addthis_share = {
    url: "<?php echo $_SERVER['SCRIPT_URI']; ?>",
   title: "THE TITLE",
   description: "THE DESCRIPTION",
   media: "http://lorempixel.com/400/200/"
}
</script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b388a07fc715149"></script>
<div id="fb-root"></div>
<script>

 $(function(){
 window.fbAsyncInit = function() {
            FB.init({
              appId      : '1807657979451474',
              xfbml      : true, cookie: true,status: true,
              version    : 'v2.2'
            });
        };

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

});

</script>

<div id="hitlist_expand">
	<article id="hitlist_article">
		<div id="hitlist_image_logo"> 
		<header id="logo_header">
		<h1 id="H1_2">
			Daanvir <span id="SPAN_3">India</span>
		</h1>
		<h2 id="H2_4">
			The brave steps that lead the nation
		</h2> 
		</header>  
		</div>
        <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_follow_toolbox_1vtl"></div>
		<div id="hitlist_image_cover">
			  <img src="<?php echo $img_src; ?>" alt="Loading Image.." id="hitlist_image" class="image1"/> 
		</div>
		<header id="hitlist_header">
			<div id="hitlist_id">
				 <a href="" id="hitlist_id_a"><?php echo $location; ?></a>
			</div> 
			<div id="hitlist_id">
				 <a href="" id="hitlist_id_a" class="hit_location"><?php echo $locality; ?></a>
			</div> 
				<div style="background-color: #4267b2;
    border-color: #4267b2;" id="hitlist_id">
				 <a class="fbshare1"  href="javascript:fShare();"  id="hitlist_id_a">
				 Share</a>
				</div>
			<h2 id="H2_10" class="hit_tag">
				<?php echo $title; ?>
			</h2>
		</header>
		<div id="hitlist_expand1">
			<p id="hitlist_expand_p" class="hit_head">
				<?php echo $about; ?>
			</p>
		</div>
		<div id="hitlist_link_button">
			 <a href="javascript:void(0)" id="hitlist_link">Our Research</a>
		</div> 
		<div id="hitlist_expand1">
			<p id="hitlist_expand_p" class="ext-des">
				<?php echo $overview; ?>
			</p>
		</div>
		<div id="hitlist_image_cover">
			  <img  src="<?php echo $img_src2; ?>" alt="Loading Image.." id="hitlist_image"  class="image2"/> 
		</div> 
		<div id="hitlist_expand1">
			<div id="hitlist_expand_p">
				<?php echo $detail; ?>
			</div>
		</div>
		<header id="hitlist_header">
			
			<h2 id="H2_10" style="min-height:44px">
				Filled..
			</h2>
			<div id="Per_DIV_1">
				<div id="Per_DIV_2" class="body-adv-ext-bar-in" style="width:10%;color:red">
					<h2 id="Per_H2_3" class="ext-bar">
						7.1%
					</h2>
			</div>
</div>
		</header>
		<div id="Recommended_DIV_1">
	 <div id="hitlist_link_button">
			 <a href="javascript:void(0)" id="hitlist_link">Related</a>
		</div> <br> 
	<div id="Recommended_DIV_3">
	<div id="related"></div>
 
		<div id="Recommended_DIV_103" style="margin-top:70px">
			<div id="Recommended_DIV_104">
			</div>
		</div>
		
		<div id="commenting">  
		<div id="hitlist_link_button">
			 <a href="javascript:void(0)" id="hitlist_link" style="margin-top:20px;">Comment</a>
		</div>
		<div id="hitlist_link_button" style="margin-left: 215px;
    margin-top: -67px;">
			 <a class="fbshare2" href="javascript:fShare();"  id="hitlist_link" style="margin-top:20px;background-color: #4267b2;
    border-color: #4267b2;"> 
			 Share</a>
		</div>
		<div id="Recommended_DIV_103" style="margin-top:70px">
			<div id="Recommended_DIV_104">
			</div>
		</div> 
		<div class="fb-comments" style="margin:auto" data-adapt-container-width="true" data-href="http://daanvir.org/main/Traversal/Articles/Delhi/South Block.php" data-width="100%" data-numposts="5" data-colorscheme="dark"></div>
		</div> 
	</div>
</div>
	<div id="last"> Please enable cookies and other site data in order to comment. <br> For Chrome: Go to Settings > Show Advanced Settings (at the bottom) > Content Settings
> Uncheck: Block third-party cookies and site data. </div>
	</article>
	<article id="hitlist_side"> 
		<div id="hitlist_link_button" style="margin-left:80px;">
			 <a href="javascript:void(0)" id="hitlist_link">Needs</a>
		</div>
		<ul id="need_ul" class="ext-needs">
			<p><?php echo $needsname.'|'.$needs.'|'.$quantity.$unit; ?></p>
		</ul>
		 
		<div id="hitlist_link_button" style="margin-left:80px;margin-top:40px;">
			 <a href="javascript:void(0)" id="hitlist_link">Supporting</a>
		</div> 
		
		<ul id="need_ul" class="ext-supp">
		<p><?php echo $supporters; ?></p>
		</ul>
		
		<div  id="hitlist_link_button" style="margin-left:80px;margin-top:40px;">
			 <a class="fbshare3" href="javascript:fShare();" id="hitlist_link"  style="background-color: #4267b2;
    border-color: #4267b2;">Share Now!</a>
		</div> 
		<div style="visibility:hidden;opacity:0;height:2px;overflow:hidden" class="fb-share-button" data-href="http://daanvir.org/main/Traversal/Articles/Delhi/South Block.php" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" id="fbshare" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdaanvir.org%2Fmain%2FTraversal%2FArticles%2FDelhi%2FSouth Block.php;src=sdkpreparse">Share</a></div>
				 
	</article>
</div>
<script language="javascript">
	
function fShare() { 
var obj = {method: 'feed', link: 'http://www.daanvir.org/Traversal/Articles/Delhi/South Block.php', picture: 'http://daanvir.org/main/Hitlist/images/2/wallpaper5.jpg',name: 'Daanvir - Winter is poisonous',description: '<?php echo $title; ?>. A minimum of 50% tax may be levied on unexplained bank deposits made using the banned currency notes up to December 30 along with a 4-year lock in period for half of the remaining amount under the amendments to tax law the government plans to bring in Parliament shortly.'};
function callback(response){}
FB.ui(obj, callback);

}
	
	
    var cookieEnabled = navigator.cookieEnabled;
    if (cookieEnabled){ document.getElementById("last").style.display="none";}
function Load(){
	var g='i='+2+'&id='+3; $.ajax({type:"POST",url:"main/html/fulldesc.php",data:g,dataType:"json",cache:false,success:function(n){ if(n.a!=null){
		document.getElementsByClassName('ext-des')[0].innerHTML=n.a;
	}
	if(n.b!=null){
		document.getElementsByClassName('ext-needs')[0].innerHTML=n.b;
	}
	if(n.c!=null){
		document.getElementsByClassName('ext-supp')[0].innerHTML=n.c;
	}
	if(n.d!=null){
		document.getElementsByClassName('ext-bar')[0].innerHTML=n.d;
	}
	if(n.e!=null){
		document.getElementsByClassName('body-adv-ext-bar-in')[0].style.width=n.e+'%';
	}
	if(n.f!=null){
		document.getElementsByClassName('body-adv-ext-bar-in')[0].style.background=n.f;
	}
	if(n.g!=null){
		document.getElementsByClassName('image1')[0].src=n.g;
	}
	if(n.h!=null){
		document.getElementsByClassName('image2')[0].src=n.h;
	}
	if(n.i!=null){
		document.getElementsByClassName('hit_head')[0].innerHTML=n.i;
	}
	if(n.j!=null){
		document.getElementsByClassName('hit_tag')[0].innerHTML=n.j;
	}
	if(n.k!=null){
		document.getElementsByClassName('hit_location')[0].innerHTML=n.k;
	}
	if(n.l!=null){
		document.getElementById('related').innerHTML=n.l;
	}
	
} 

}) 
}
window.addEventListener('load',Load,false);
</script>

<div id="Ft_DIV_1">
	<hr id="Ft_HR_2" />
	<h2 id="Ft_H2_3">
		Facebook / Google / Twitter / Terms of Service
	</h2>
	<h4 id="Ft_H4_4">
		&copy; 2017 - All Rights Reserved
	</h4>
</div>
    <!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b388a07fc715149"></script>
</body></html>