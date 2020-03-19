<?php require_once( '../db/init.php'); ?>
<div id="floating-panel">
   <!--   <button onclick="toggleHeatmap()">Toggle Heatmap</button>
      <button onclick="changeGradient()">Change gradient</button>
      <button onclick="changeRadius()">Change radius</button>
      <button onclick="changeOpacity()">Change opacity</button>-->
</div>
<div id="vmap"></div>
<?php
$latIN = 26.238894;
$lonIN = 78.7683128;
$zIN = 5;

$dataLive = "";  
$dataPast = "";   
$markersL = "";
$markersP= "";
$contentL= "";
$contentP= "";
$i=0;
$locs=mysqli_query($GLOBALS['conn'],"SELECT localityName,localityId FROM localities");
while($fetch_=mysqli_fetch_assoc($locs)){ 
	   $locId=$fetch_['localityId'];
	   $locn=$fetch_['localityName'];
// GROUP BY hitId,ZIP1
	$Hits='';
	$HitCover='';
	$j=0; $i++;
	$oall1=0;//atleast one non-successful campaign
	$oall2=0;//atleast one successful campaign
	$zip=null;
$zips=mysqli_query($GLOBALS['conn2'],"SELECT ZIP1, hitId FROM hitlist WHERE localityId={$locId}");
while($fetch=mysqli_fetch_assoc($zips)){ 
	   if($j==0){
	   $zip=$fetch['ZIP1']; 
	   }
	   $hitID=$fetch['hitId']; 
	   $bar= getBar($hitID); 
		if($bar<100){
			$oall1=1; 
		//live campaign
		//show hit marker on map with yellow trail  
 $Hits.= getHIT($hitID);
		}else{
			$oall2=1; 
		//successful campaign
		//show marker with a blue trail 
 $Hits.= getHIT($hitID);
		}  
		$j=1;
	}
	if($zip!=null){
	$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$zip."&sensor=false";
	   $details=file_get_contents($url);
 	   $result = json_decode($details,true); 
 	   $lat=$result['results'][0]['geometry']['location']['lat']; 
 	   $lng=$result['results'][0]['geometry']['location']['lng']; 
  $HitCover='<div id="wrap-boxes-hitlist" style="min-width: 320px;height: 100%;text-align: left;"><div id="loadMoreH">'.$Hits.'</div></div>';
  if($oall1==1){
   $dataLive.='{location: new google.maps.LatLng('.($latIN).', '.($lonIN).'), weight: 5},';
  $markersL.='[`'.$locn.'`, '.($lat).', '.($lng).', '.$i.', `'.$HitCover.'`],';  
	}
	else if($oall2==1){
 $dataPast.='{location: new google.maps.LatLng('.($latIN).', '.($lonIN).'), weight: 4},'; 
  $markersP.='[`'.$locn.'`, '.($latIN).', '.($lonIN).', '.$i.', `'.$HitCover.'`],';  
	} 
 } 
 
}
//` should encode string for js
 $dataLive=rtrim( $dataLive, ",");
 $dataPast=rtrim( $dataPast, ","); 
 $markersL=rtrim( $markersL, ",");
 $markersP=rtrim( $markersP, ","); 

$map='
<script type="text/javascript">
 var map0, heatmap1, heatmap2;
 var heatmapData1 = [  '.$dataLive.' ], heatmapData2 = [  '.$dataPast.' ];
var area = new google.maps.LatLng('.$latIN.', '.$lonIN.');
map0 = new google.maps.Map(document.getElementById(\'vmap\'), {
  center: area,
  zoom:'.$zIN.',
  mapTypeId: \'roadmap\'
});
if(heatmapData1[0]!=null){
heatmap1 = new google.maps.visualization.HeatmapLayer({
  data: heatmapData1,
  map:map0
}); 
var image1 = `http://daanvir.org/images/marker3.png`;
var beaches1 = ['.$markersL.']; 
heatmap1.setMap(map0);
heatmap1.set(\'radius\',30);
heatmap1.set(\'opacity\',0.3);
 
 var infowindow = new google.maps.InfoWindow({
          maxWidth: 330});
 for (var i = 0; i < beaches1.length; i++) {
          var beach = beaches1[i]; 
		  var markerLatlng = new google.maps.LatLng(beach[1], beach[2]); 
          newMarker(markerLatlng ,beach[0],beach[4],image1,beach[3],infowindow);  
	}
}

if(heatmapData2[0]!=null){
heatmap2 = new google.maps.visualization.HeatmapLayer({
  data: heatmapData2,
  map:map0
});

var image2 = `http://daanvir.org/images/marker4.png`;  
var beaches2 = ['.$markersP.'];   
var gradient = [
          \'rgba(0, 255, 255, 0)\',
          \'rgba(0, 255, 255, 1)\',
          \'rgba(0, 191, 255, 1)\',
          \'rgba(0, 127, 255, 1)\',
          \'rgba(0, 63, 255, 1)\',
          \'rgba(0, 0, 255, 1)\',
          \'rgba(0, 0, 223, 1)\',
          \'rgba(0, 0, 191, 1)\',
          \'rgba(0, 0, 159, 1)\',
          \'rgba(0, 0, 127, 1)\',
          \'rgba(63, 0, 91, 1)\',
          \'rgba(127, 0, 63, 1)\',
          \'rgba(191, 0, 31, 1)\',
          \'rgba(255, 0, 0, 1)\'
        ];
heatmap2.setMap(map0);
heatmap2.set(\'radius\',30);
heatmap2.set(\'opacity\',0.2);  
heatmap2.set(\'gradient\',gradient);
 
var infowindow2 = new google.maps.InfoWindow({
          maxWidth: 330});
for (var i = 0; i < beaches2.length; i++) { 
          var beach = beaches2[i]; 
		  var markerLatlng = new google.maps.LatLng(beach[1], beach[2]); 
          newMarker(markerLatlng ,beach[0],beach[4],image2,beach[3],infowindow2); 
	}
} 

  function newMarker(position,title,iwData,icon,zI,iw) {
      var marker = new google.maps.Marker({
          position: position,
          title: title,
          icon: icon,
          zIndex: zI,
          map: map0
    }); 

google.maps.event.addListener(marker, \'click\', function () {
    iw.setContent(iwData);
    iw.open(map0, marker);
	bindOwl();
    }); 
	
    }
</script>';

echo $map;
?>