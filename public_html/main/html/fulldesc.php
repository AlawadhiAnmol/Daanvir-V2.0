<?php 
opcache_reset();
require '../db/init.php'; 
$id= Sanitize($_POST['id']); 
$locid= Sanitize($_POST['i']); 
if($id==1){
?>
<style type="text/css">

#art-ext-ta{
	font-size:16px;
	line-height:20px;
	padding:15px;
	width:100%;
	margin-top:2%;
	height:60%;
	vertical-align:top;
	color:#fff;
	background:#000;
}

#art-ext-det{
	vertical-align:top;
	display:inline-block; 
	width:98%;
	margin:auto;
	height:500px;
	
}
#art-ext-det input{
	cursor:pointer;
	padding:10px;
	width:100%;
	margin:auto;
	font-size:22px;
	color:red;
	border:1px solid gray;
	background:#fff;
	margin-top:20px;
}

#head-adv-ext{
color:#ccc;
font-size:18px;
padding:4px;

}
</style>
<div id="head-adv-ext">
<h2>Complete your article</h2> 
</div> 
<div id="art-ext-det"> 
<textarea name="art-ext-ta" id="art-ext-ta" Placeholder="Here you can add full description to your hitlist item. Please note that the item must be visible already. Please use /b to start a highlighting pen and /B to close the pen. Similarly use /p to start a paragraph and /P to end a paragraph. "></textarea><br>
<input type="button" id="art-ext-ud" value="Update" onclick="opener.fulldesc(<?php echo $locid; ?>,2);" />
 </div> 
<?php
}
else if($id==2){ 
$t= $_POST['t']; 
  
	$tag='';
	$head='';
	$location='';
	$check1=mysqli_query($GLOBALS['conn2'],"SELECT * FROM hitlist WHERE localityId='$locid'");   
	$num1=mysqli_num_rows($check1);  
	if($num1==1){
		$result=mysqli_fetch_assoc($check1);  
		$desc=$result['majorhit_desc']; 
		$tempImg=explode(",",$result['img']);
		$img="../../../".$tempImg[0];  
		$img2="../../../".$tempImg[1]; 
		$head=$result['tagline'];
		$tag=$result['headline']; 
		$location=$result['location']; 
	$check2=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE localityId='$locid'");   
	$num2=mysqli_num_rows($check2); 
	if($num2==1){ 
		$res=mysqli_fetch_assoc($check2);  
		$locn=$res['localityName']; 
		$stid=$res['stateId']; 
		$areaid=$res['areaId']; 
	$state=mysqli_query($GLOBALS['conn'],"SELECT * FROM states WHERE stateId='$stid'");  
		$s=mysqli_fetch_assoc($state);
		$stn=$s['stateName']; 
	$area=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE areaId='$areaid'");  
		$a=mysqli_fetch_assoc($area);
		$arn=$a['areaName'];  
		
//
	$data1=null;
	$data2=null;$l=0;
	$r=0;
	$count=0; 
	$qy=0;
	if($locn!=null){   
	$check1=mysqli_query($GLOBALS['conn2'],"SELECT `currentNeedId`,`currentNeedDesc`,`qnty`, `qnty_unit` FROM currentneeds WHERE `includeinhit`=1 AND `localityId`='$locid' AND freeze=0");  
	
	$num1=mysqli_num_rows($check1);  
	if($num1>0){
	while($row1=mysqli_fetch_assoc($check1)){ 
		$cnid=$row1['currentNeedId']; 
		$cndsc=$row1['currentNeedDesc']; 
		$qy=$row1['qnty'];    
//print needs
		$check2=mysqli_query($GLOBALS['conn2'],"SELECT `needFillerId` FROM `fillmethod` WHERE `currentNeedId`='$cnid' AND `confirmed`=1");  
		$count=mysqli_num_rows($check2); 
//%age
	$l+=$count;
	$r+=$qy;
		$pc_q=round(($count/$qy)*100,1);
	$need=$cndsc.' ( '.$pc_q.'% )';
	$data1.='<p>'.$need.'</p>';
	if($count>0){
	while($kind=mysqli_fetch_assoc($check2)){ 
	$filler=$kind['needFillerId'];  
	$details=mysqli_query($GLOBALS['conn2'],"SELECT `name`,`state` FROM `needfiller` WHERE `needFillerId`='$filler'");  
	$n=mysqli_num_rows($details);  
	if($n==1){
	$rdet=mysqli_fetch_assoc($details);  
	$name=$rdet['name'];   
	$state=$rdet['state']; 	
	 	
	if(!empty($state)){
		$state=' | '.$state;
	}	
	$person=$name.$state;

	$data2.='<p>'.$person.'</p>';	 					}						
							}
						}
		
					}
				}
if($r!=0)
	$bar=round(($l/$r)*100,1); 
$bcopy=$bar;
if($bar<10){
	$bcopy=10;
} 
	$bar_=floor(($l/$r)*100); 
if($bar_<10){
	$bar_=10;
} 
$color="";
if($bar<20){ 
$color="red";
}else if($bar<60){ 
$color="orange";
}else if($bar<100 && $bar>60){ 
$color="green";
}
	$find=array('/b','/B','/p','/P');
	$replace=array('<b>','</b>','<p>','</p>');
	$t=str_replace($find,$replace,$t); 
		/*Hide fb share and use custom clicks to press it*/
	ob_start();
	$text="<!DOCTYPE html>
<html> 
<head><title>Daanvir - The brave steps that lead the nation</title><meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no\"><link rel=\"stylesheet\" href=\"../../../normalize.css\"><script src='../../../js/jquery.min.js'></script><link rel=\"shortcut icon\" href=\"../../../images/favicon.png\" type=\"image/x-icon\"><link rel=\"stylesheet\" href=\"../../../css/orton.css\"><meta property=\"og:url\"           content=\"http://daanvir.org/main/Traversal/Articles/".$stn."/".$locn.".php\" />
	<meta property=\"og:type\"          content=\"website\" />
	<meta property=\"og:title\"         content=\"Daanvir | ".$tag." ".$location."\" />
	<meta property=\"og:description\"   content=\"".$head."\" />
	<meta property=\"og:image\"         content=\"http://daanvir.org/".$img."\" />
</head>
<body>
<div id=\"fb-root\"></div>
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
  js.src = \"//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8\";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

});

</script>

<div id=\"hitlist_expand\">
	<article id=\"hitlist_article\">
		<div id=\"hitlist_image_logo\"> 
		<header id=\"logo_header\">
		<h1 id=\"H1_2\">
			Daanvir <span id=\"SPAN_3\">India</span>
		</h1>
		<h2 id=\"H2_4\">
			The brave steps that lead the nation
		</h2> 
		</header>  
		</div>
		<div id=\"hitlist_image_cover\">
			  <img src=\"".$img."\" alt=\"Loading Image..\" id=\"hitlist_image\" class=\"image1\"/> 
		</div>
		<header id=\"hitlist_header\">
			<div id=\"hitlist_id\">
				 <a href=\"\" id=\"hitlist_id_a\">".$stn." - ".$arn." - ".$locn."</a>
			</div> 
			<div id=\"hitlist_id\">
				 <a href=\"\" id=\"hitlist_id_a\" class=\"hit_location\">".$location."</a>
			</div> 
				<div style=\"background-color: #4267b2;
    border-color: #4267b2;\" id=\"hitlist_id\">
				 <a class=\"fbshare1\"  href=\"javascript:fShare();\"  id=\"hitlist_id_a\">
				 Share</a>
				</div>
			<h2 id=\"H2_10\" class=\"hit_tag\">
				".$tag."
			</h2>
		</header>
		<div id=\"hitlist_expand1\">
			<p id=\"hitlist_expand_p\" class=\"hit_head\">
				".$head."
			</p>
		</div>
		<div id=\"hitlist_link_button\">
			 <a href=\"javascript:void(0)\" id=\"hitlist_link\">Our Research</a>
		</div> 
		<div id=\"hitlist_expand1\">
			<p id=\"hitlist_expand_p\" class=\"ext-des\">
				".$desc."
			</p>
		</div>
		<div id=\"hitlist_image_cover\">
			  <img  src=\"".$img2."\" alt=\"Loading Image..\" id=\"hitlist_image\"  class=\"image2\"/> 
		</div> 
		<div id=\"hitlist_expand1\">
			<div id=\"hitlist_expand_p\">
				".$t."
			</div>
		</div>
		<header id=\"hitlist_header\">
			
			<h2 id=\"H2_10\" style=\"min-height:44px\">
				Filled..
			</h2>
			<div id=\"Per_DIV_1\">
				<div id=\"Per_DIV_2\" class=\"body-adv-ext-bar-in\" style=\"width:".$bar_."%;color:".$color."\">
					<h2 id=\"Per_H2_3\" class=\"ext-bar\">
						".$bar."%
					</h2>
			</div>
</div>
		</header>
		<div id=\"Recommended_DIV_1\">
	 <div id=\"hitlist_link_button\">
			 <a href=\"javascript:void(0)\" id=\"hitlist_link\">Related</a>
		</div>  
	<div id=\"Recommended_DIV_3\">
	<div id=\"related\"></div>
 
		<div id=\"Recommended_DIV_103\" style=\"margin-top:0px\">
			<div id=\"Recommended_DIV_104\">
			</div>
		</div>
		
		<div id=\"commenting\">  
		<div id=\"hitlist_link_button\">
			 <a href=\"javascript:void(0)\" id=\"hitlist_link\" style=\"margin-top:20px;\">Comment</a>
		</div>
		<div id=\"hitlist_link_button\" class=\"commenting_share\" style=\"margin-left: 215px;
    margin-top: -67px;\">
			 <a class=\"fbshare2\" href=\"javascript:fShare();\"  id=\"hitlist_link\" style=\"margin-top:20px;background-color: #4267b2;
    border-color: #4267b2;\"> 
			 Share</a>
		</div>
		<div id=\"Recommended_DIV_103\" style=\"margin-top:70px\">
			<div id=\"Recommended_DIV_104\">
			</div>
		</div> 
		<div class=\"fb-comments\" style=\"margin:auto\" data-adapt-container-width=\"true\" data-href=\"http://daanvir.org/main/Traversal/Articles/".$stn."/".$locn.".php\" data-width=\"100%\" data-numposts=\"5\" data-colorscheme=\"dark\"></div>
		</div> 
	</div>
</div>
	<div id=\"last\"> Please enable cookies and other site data in order to comment. <br> For Chrome: Go to Settings > Show Advanced Settings (at the bottom) > Content Settings
> Uncheck: Block third-party cookies and site data. </div>
	</article>
	<article id=\"hitlist_side\"> 
		<div id=\"hitlist_link_button\" style=\"margin-left:80px;\">
			 <a href=\"javascript:void(0)\" id=\"hitlist_link\">Needs</a>
		</div>
		<ul id=\"need_ul\" class=\"ext-needs\">
		".$data1."
		</ul>
		 
		<div id=\"hitlist_link_button\" style=\"margin-left:80px;margin-top:40px;\">
			 <a href=\"javascript:void(0)\" id=\"hitlist_link\">Supporting</a>
		</div> 
		
		<ul id=\"need_ul\" class=\"ext-supp\">
		".$data2."
		</ul>
		
		<div  id=\"hitlist_link_button\" style=\"margin-left:80px;margin-top:40px;\">
			 <a class=\"fbshare3\" href=\"javascript:fShare();\" id=\"hitlist_link\"  style=\"background-color: #4267b2;
    border-color: #4267b2;\">Share Now!</a>
		</div>  
	</article>
</div>
<script language=\"javascript\">
	
function fShare() { 
var obj = {method: 'feed', link: 'http://www.daanvir.org/Traversal/Articles/".$stn."/".$locn.".php', picture: 'http://daanvir.org/main/".$tempImg[0]."',name: 'Daanvir - ".$tag."',description: '".$head.". ".$desc."'};
function callback(response){}
FB.ui(obj, callback);

}
	
	
    var cookieEnabled = navigator.cookieEnabled;
    if (cookieEnabled){ document.getElementById(\"last\").style.display=\"none\";}
function Load(){
	var g='i='+".$locid."+'&id='+3; $.ajax({type:\"POST\",url:\"../../../html/fulldesc.php\",data:g,dataType:\"json\",cache:false,success:function(n){ if(n.a!=null){
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

<div id=\"Ft_DIV_1\">
	<hr id=\"Ft_HR_2\" />
	<h2 id=\"Ft_H2_3\">
		Facebook / Google / Twitter / Terms of Service
	</h2>
	<h4 id=\"Ft_H4_4\">
		&copy; 2017 - All Rights Reserved
	</h4>
</div>
</body></html>";
	//$locn_=str_replace(" ","%20",$locn);
	$path="../Traversal/Articles/".$stn;
	$fileName=$locn.".php";	
	
	if(!is_dir($path)){ 
		mkdir($path,0777,true); 
	}
	
	if(file_exists($path."/".$fileName)){  
	unlink($path."/".$fileName);
	} 
	$file=fopen($path."/".$fileName,"w");		
	fwrite($file,$text);
	fclose($file); 
$op="<div id='op_text' style=\"width:100%;height:100%;
padding:10px;text-align:center;
\"><h3 style=\"font-size:20px;margin:auto;color:green\">Updated successfully!</h3><br>
<input type='button' style='height:40px;padding:10px;width:100px;' value='Close' onclick='window.close();'/>
</div>
";	flush();
	echo $op;
	ob_end_flush();
	}		
	}
	}else{
$nop="<div id='op_text' style=\"width:100%;height:100%;
padding:10px;text-align:center;
\"><h3 style=\"font-size:20px;margin:auto;color:red\">Please make hit visible first!</h3><br>
<input type='button' style='height:40px;padding:10px;width:100px;' value='Close' onclick='window.close();'/>
</div>
";
	echo $nop;
	}
}else if($id==3){ 
	$check1=mysqli_query($GLOBALS['conn2'],"SELECT * FROM hitlist WHERE localityId='$locid'");   
	$num1=mysqli_num_rows($check1);  
	if($num1==1){
		$result=mysqli_fetch_assoc($check1);  
		$desc=$result['majorhit_desc'];
		$tempImg=explode(",",$result['img']);
		$img="../../../".$tempImg[0];  
		$img2="../../../".$tempImg[1];  
		$head=$result['tagline'];
		$tag=$result['headline']; 
		$location=$result['location'];
		
	$check2=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE localityId='$locid'");   
	$num2=mysqli_num_rows($check2); 
	if($num2==1){  
	$rs=mysqli_fetch_assoc($check2);
	$stid=$rs['stateId'];
	$data1=null;
	$data2=null;$l=0;
	$r=0;
	$count=0; 
	$qy=0; 
	
	$check1=mysqli_query($GLOBALS['conn2'],"SELECT `currentNeedId`,`currentNeedDesc`,`qnty`, `qnty_unit` FROM currentneeds WHERE `includeinhit`=1 AND `localityId`='$locid' AND freeze=0");  
	
	$num1=mysqli_num_rows($check1);  
	if($num1>0){
	while($row1=mysqli_fetch_assoc($check1)){ 
		$cnid=$row1['currentNeedId']; 
		$cndsc=$row1['currentNeedDesc']; 
		$qy=$row1['qnty'];  
//print needs
		$check2=mysqli_query($GLOBALS['conn2'],"SELECT `needFillerId` FROM `currfillmethod` WHERE `currentNeedId`='$cnid' AND `confirmed`=1");  
		$count=mysqli_num_rows($check2); 
//%age
	$l+=$count;
	$r+=$qy;
		$pc_q=round(($count/$qy)*100,1);
	$need=$cndsc.' ( '.$pc_q.'% )';
	$data1.='<p>'.$need.'</p>';
	if($count>0){
	while($kind=mysqli_fetch_assoc($check2)){ 
	$filler=$kind['needFillerId'];  
	$details=mysqli_query($GLOBALS['conn2'],"SELECT `name`,`state` FROM `needfiller` WHERE `needFillerId`='$filler'");  
	$n=mysqli_num_rows($details);  
	if($n==1){
	$rdet=mysqli_fetch_assoc($details);  
	$name=$rdet['name'];   
	$state=$rdet['state']; 	
	 
	if(!empty($state)){
		$state=' | '.$state;
	}	
	$person=$name.$state;

	$data2.='<p>'.$person.'</p>';	 					}						
							}
						}
		
					}
				}
if($r!=0)
	$bar=round(($l/$r)*100,1); 
$bcopy=$bar;
if($bar<10){
	$bcopy=10;
} 
	$bar_=floor(($l/$r)*100); 
if($bar_<10){
	$bar_=10;
} 
$color="";
if($bar<20){ 
$color="red";
}else if($bar<60){ 
$color="orange";
}else if($bar<100 && $bar>60){ 
$color="green";
}  
	
//FIND RELATED Here
$relatedData="";
$relLocs=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE stateId='$stid'");  
 $rel=mysqli_num_rows($relLocs); 
 if($rel>0){ 
	while($rows=mysqli_fetch_assoc($relLocs)){ 
		$lid=$rows['localityId'];  
	$relRetrieve=mysqli_query($GLOBALS['conn2'],"SELECT * FROM hitlist WHERE localityId='$lid'"); 
	$numget=mysqli_num_rows($relRetrieve);  
	if($numget==1){
		$resget=mysqli_fetch_assoc($relRetrieve);  
		$desc=$result['majorhit_desc']; 
		$tempImg=explode(",",$result['img']);
		$relimg="../../../".$tempImg[0];  
		$relimg2="../../../".$tempImg[1]; 
		if(rand(1,2)==1){
			$relimg=$relimg2;
		}
		$relhead=$resget['tagline'];
		$reltag=$resget['headline']; 
		$rellocation=$resget['location']; 
			$relcheck2=mysqli_query($GLOBALS['conn'],"SELECT * FROM localities WHERE localityId='$lid'");   
	$relnum2=mysqli_num_rows($relcheck2); 
	if($relnum2==1){ 
		$relres=mysqli_fetch_assoc($relcheck2);  
		$rellocn=$relres['localityName']; 
		$relstid=$relres['stateId']; 
		$relareaid=$relres['areaId']; 
	$relstate=mysqli_query($GLOBALS['conn'],"SELECT * FROM states WHERE stateId='$relstid'");  
		$rels=mysqli_fetch_assoc($relstate);
		$relstn=$rels['stateName']; 
	$relarea=mysqli_query($GLOBALS['conn'],"SELECT * FROM areas WHERE areaId='$relareaid'");  
		$rela=mysqli_fetch_assoc($relarea);
		$relarn=$rela['areaName'];  
$rell=0;
	$relr=0;
	$relcount=0; 
	$relqy=0;
	if($rellocn!=null){   
	$relcheck1=mysqli_query($GLOBALS['conn2'],"SELECT `currentNeedId`,`currentNeedDesc`,`qnty`, `qnty_unit` FROM currentneeds WHERE `includeinhit`=1 AND `localityId`='$lid' AND freeze=0");  
	
	$relnum1=mysqli_num_rows($relcheck1);  
	if($relnum1>0){
	while($relrow1=mysqli_fetch_assoc($relcheck1)){ 
		$relcnid=$relrow1['currentNeedId']; 
		$relcndsc=$relrow1['currentNeedDesc']; 
		$relqy=$relrow1['qnty'];    
 $relcheck2=mysqli_query($GLOBALS['conn2'],"SELECT `needFillerId` FROM `fillmethod` WHERE `currentNeedId`='$relcnid' AND `confirmed`=1");  
		$relcount=mysqli_num_rows($relcheck2); 
//%age
	$rell+=$relcount;
	$relr+=$relqy;
			}
		}
	}	
		if($relr!=0)
	$relbar=round(($rell/$relr)*100,1); 
$relbcopy=$relbar;
if($relbar<10){
	$relbcopy=10;
} 
	$relbar_=floor(($rell/$relr)*100); 
if($relbar_<10){
	$relbar_=10;
} 
$relcolor="";
if($relbar<20){ 
$relcolor="red";
}else if($relbar<60){ 
$relcolor="orange";
}else if($relbar<100 && $relbar>60){ 
$relcolor="green";
}
	//DATA here	
	$relatedData.="
		<article id=\"Recommended_ARTICLE_4\">
			<div id=\"Recommended_DIV_5\">
				 <a  href=\"../".$relstn."/".$rellocn.".php\"><img src=\"".$relimg."\" alt=\"Loading Image ..\" id=\"IMG_7\" /></a>
			</div>
			<header id=\"Recommended_HEADER_8\">
				<div id=\"hitlist_id\">
				 <a href=\"../".$relstn."/".$rellocn.".php\" id=\"hitlist_id_a\">".$relstn." - ".$relarn." - ".$rellocn."</a>
				</div>
				<div id=\"hitlist_id\">
				 <a  href=\"../".$relstn."/".$rellocn.".php\" id=\"hitlist_id_a\">Near ".$rellocation."</a>
				</div>
			<a  href=\"../".$relstn."/".$rellocn.".php\" id=\"Recommended_A_11\"></a>
				<h2 id=\"Recommended_H2_12\">
					".$reltag.": ".$relhead."
				</h2>
					
			<h2 id=\"H2_10\" style=\"min-height:44px;max-width:300px;font-size:22px\">
				Filled..
			</h2>
				<div id=\"Per_DIV_1\" style=\"width: 587px;\">
					<div id=\"Per_DIV_2\" style=\"width:".$relbar_."%;color:".$relcolor."\">
					<h2 id=\"Per_H2_3\">
						".$relbar."%
					</h2>
					</div>
				</div>
			</header>
		</article>
	 	<div id=\"Recommended_DIV_103\">
			<div id=\"Recommended_DIV_104\">
			</div>
		</div>
	 
";	
		
	}
		
	}
	
	}
 }
	
//echo 'TEST';	
echo json_encode(array("a" => $desc,"b" => $data1,"c" => $data2,"d" => $bar."%","e" => $bar_,"f" => $color,"g" => $img,"h" => $img2,"i" => $head,"j" => $tag,"k" => $location,"l" =>  $relatedData));
	}
	}
	}
?>










