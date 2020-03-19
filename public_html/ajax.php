<?php
require 'main/db/connect.php';
if( $_POST['id'] != "" ) {
	$answer=array();
	$result = mysqli_query($conn, "SELECT * FROM users");
	while( $temp_ans = mysqli_fetch_assoc($result) )
		array_push($answer, $temp_ans);
	echo json_encode($answer);
	die();
}
?>

<html>
	<head>
        <meta charset="UTF-8" />
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Daanvir - Every life is vulnerable</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no">
        <meta name="description" content="Be a part of the social transformation. This new initiative lets you contribute simple reliefs that fetch both exquisite happiness and transparent control over the change that you brought" />
        <meta name="keywords" content="daanvir,daanvir.org,crowdfunding,donations,relief,donation,daan,vir,org,simplified,hassle-free,transparency,control,contribute,help,poverty,India,remove poverty, connect, social" />
        <meta name="author" content="Daanvir.org" />

		<link rel="shortcut icon" href="images/daanvir_logo.png" type="image/x-icon">
		<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
        <link rel="stylesheet" type="text/css" href="css/style2_m.css" />
        <!--<link rel="stylesheet" type="text/css" href="css/style2_small.css" /> -->
        <link rel="stylesheet" type="text/css" href="custom.css" /> 
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
		<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
        <link rel="stylesheet" media="only screen and (max-device-width:480px)" href="css/style2_small.css"/>
        
<!--<link rel="stylesheet" type="text/css" href="css/jquery.fullpage.min.css" />

-->

		<script src="js/jquery.min.js"></script> 
		<script src="js/typed.min.js"></script>  
		<script src="js/owl.carousel.min.js" type="text/javascript"></script>
		<script src="js/navigator-detect.min.js"></script>
		<script type="text/javascript" async defer  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8fz_GTPq7uPnoHc6zFmTzNcNRRqKbwO8&libraries=visualization"></script>	 
<noscript>
    <style type="text/css">
        #page, #part-2,#part-3,#part-4,#part-5,#part-6{display:none;}
    </style>
    <div class="noscriptmsg" style="margin-top:50px;font-size:22px;
	margin:auto;text-align:center;">
    Sorry, this browser is not supported. We recommend upgrading to Chrome or some other modern browser.
    </div>
</noscript> 

</head>
<body>
<div id="leaflet">
	<div id="div-title" style="height:30px; width:500px; background:aliceblue;"></div>
	<div id="div-body" style="background:antiquewhite; height:500px; width:500px;"></div>
</div>
<input type="button" id="request-button" value="Dump">
</body>
<script src="js/jquery.min.js"></script>
<script>
	$("#request-button").click(function(){
		head="sample-head";
		body="sample-body";
		$.ajax({
			url:"main/points/blog.php",
			data:{id:"1", limit:"10", offset:"0"},
			type:"POST",
			success: function(result) {
				$("#div-title").text(head);
				$("#div-body").html(result);
			}
		})
	})
function fullView(c,a,d,e){if(e==2){var g="t="+d+"&c="+encodeURIComponent(c)+"&a="+a;$.ajax({type:"POST",url:"main/points/turnlink2.php",data:g,cache:!1,success:function(n){console.log(n);if(n=="login"){$('.bringme').click();return}

var na=n.split(',');if(na.length==2){var w=window.open(na[1]+"",'Daanvir');w.focus()}}})}else{open_page(29);$(function(){wait()});function wait(){if(typeof(promote_ls)==='undefined'){setTimeout(wait,100);return}

promote_ls(c,a,d)}}

return}
</script>
</html>