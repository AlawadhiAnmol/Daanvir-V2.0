<?php 
require '../main/db/init.php'; 
protectPage();
if(admin($userData['userId']) !== true){
	header('Location:http://daanvir.org');
	exit();
} 
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daanvir : Admin Portal</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href="assets/css/overview.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>    
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="fa fa-square-o "></i>&nbsp;DAANVIR</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="http://daanvir.org">See Website</a></li> 
                        <li><a href="#" onclick="logout();">Log out</a></li> 
                    </ul>
						<script type="text/javascript">  
						function logout(){ 
						$('.logout').css("display","none");
						window.location="../main/points/logout.php";  
						}   
						</script>
                </div> 
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center user-image-back">
                        <img src="../main/<?php echo $userData['profilePic']?>" class="img-responsive" /> 
                    </li> 
                    <li>
                        <a href="#" onclick="switchTo('dashboard');"><i class="fa fa-desktop "></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o "></i>Donation Posts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            
                            <li>
                                <a href="#" onclick="switchTo('money');">Money Gatherings</a>
                            </li>
                            <li>
                                <a href="#" onclick="switchTo('pickup');">Pickup Requests</a>
                            </li>
                            <li>
                                <a href="#" onclick="switchTo('address');">Donating at Address</a>
                            </li>
							<li>
                                <a href="#" style="color:crimson" onclick="switchTo('sdelete');">Soft Delete</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" onclick="switchTo('videos');"><i class="fa fa-qrcode "></i>Videography</a>
                    </li>
                    <li>
                        <a href="#" onclick="switchTo('faccount');"><i class="fa fa-edit "></i>Freeze Account </a>
                    </li> 
                    <li>
                        <a href="#" onclick="switchTo('access_log');"><i class="fa fa-table "></i>Admin Access Log </a>
                    </li> 	
				</ul>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner" class="dashboard">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
				     <hr />
<?php  
$chk_reg=mysqli_query($GLOBALS['conn'],"SELECT * FROM users WHERE freeze = 0"); 
$registered=mysqli_num_rows($chk_reg); 
?>					 
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Population</h5>
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <h3><?php echo $registered;?></h3>
                            </div>
                            <div class="panel-footer back-footer-blue">
                                Registered Users
                            
                            </div>
                        </div>
                    </div>
<?php  
$chk_tr=mysqli_query($GLOBALS['conn2'],"SELECT SUM(amount) as total FROM `transac` WHERE 1"); 
$trans=mysqli_fetch_assoc($chk_tr); 
$transactions=$trans['total']; 
?>	                  
				  <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Transactions</h5>
                        <div class="alert alert-info text-center">
                            <i class="fa fa-desktop fa-5x"></i>
                            <h3><?php echo $transactions;?> INR </h3>
                            Through Paytm Payments
                        </div>
                    </div>

<?php  
$chk_dona=mysqli_query($GLOBALS['conn2'],"SELECT * FROM `currfillmethod` WHERE 1"); 
$donations=mysqli_num_rows($chk_dona); 
?>	 					
                <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Donations</h5>
                        <div class="alert alert-info text-center">
                            <i class="fa fa-desktop fa-5x"></i>
                            <h3><?php echo $donations;?>  items </h3>
                            Registered at Daanvir
                        </div>
                    </div>
<?php  
$chk_posts=mysqli_query($GLOBALS['conn2'],"SELECT * FROM `hitlist` WHERE freeze=0"); 
$posts=mysqli_num_rows($chk_posts); 
?>	             
                <div class="col-md-3 col-sm-3 col-xs-6">
                        <h5>Donation Posts</h5>
                        <div class="alert alert-info text-center">
                            <i class="fa fa-desktop fa-5x"></i>
                            <h3><?php echo $posts;?>   posts </h3>
                            Created at Daanvir
                        </div>
                    </div>
             
                </div>
				  <hr />
				<div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Find Donation Posts</label>
                            <input id="search_all1" class="form-control" />
                            <p class="help-block">Type in a city name.</p>
                        </div> <a href="#" onclick="express(1);" class="btn btn-primary">Search ALL</a> 
                    </div> 
                </div>
				   <hr /> 
                 <!-- /. ROW  -->  
				<div id="loadata1" class="row"> 	 
                </div>  			 
    </div>
   
            <div id="page-inner" class="money" style="display:none"> 
				<div class="row">
                    <div class="col-md-12">
                     <h2>Transactions through Paytm</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
				     <hr />
				<div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Find Donation Posts</label>
                            <input id="search_all2" class="form-control" />
                            <p class="help-block">Type in a city name.</p>
                        </div> <a href="#" onclick="express(2);"  class="btn btn-success">Search Money</a> 
                    </div>  
                </div>
				<hr /> 
				<div id="loadata2" class="row"> 	 
                </div>  
 
			</div>
			<div id="page-inner" class="pickup" style="display:none"> 
				<div class="row">
                    <div class="col-md-12">
                     <h2>Requests for Pickup</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
				     <hr />  
				
				<div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Find Donation Posts</label>
                            <input id="search_all3" class="form-control" />
                            <p class="help-block">Type in a city name.</p>
                        </div> <a href="#" class="btn btn-info" onclick="express(3);" >Search Pickups</a> 
                    </div>  
                </div>
				<hr />	  
				<div id="loadata3" class="row"> 	 
                </div>  
					 
			</div>	 
			<div id="page-inner" class="address" style="display:none"> 
				<div class="row">
                    <div class="col-md-12">
                     <h2>Donating at Address Provided</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
				     <hr />
				
				<div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Find Donation Posts</label>
                            <input id="search_all4" class="form-control" />
                            <p class="help-block">Type in a city name.</p>
                        </div> <a href="#" class="btn btn-info" onclick="express(4);" >Search Donations at Address</a> 
                    </div>  
                </div>
				<hr />	  
				<div id="loadata4" class="row"> 	 
                </div> 
					 
			</div>	
			<div id="page-inner" class="videos" style="display:none"> 
				<div class="row">
                    <div class="col-md-12">
                     <h2>Video Panel</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
					<div class="row">
                    <div class="col-md-4">
					
					<div id="regBody">
<div id="adv-vid-main"> <div id="thumb-preview"></div>
<h4>Send videos to people directly.</h4><hr> 
<div id="adv-v-p">
<input type="text" id="email" Placeholder="Type Email here."/><br>
<input type="text" id="title" Placeholder="Type Title here."/><br>
<input type="text" id="locality" Placeholder="Type Locality here."/>
<h5>Select .mp4 Video:</h5>
<input type="file" accept=".mp4" id="vfile" onchange="setI(this.files);"/>
<h5>Select .jpg or .png (320x240) Thumbnail:</h5>
<input type="file" accept=".jpg,.png" id="ifile" />
<input type="button" id="vsend" onclick="javascript:vS(1);" value="Send!"/>
<input type="button" id="vlist" onclick="javascript:vS(2);" value="List All"/>
<br>
<h6 style="color:#f0ad4e;text-align:left;margin:10px 40px;">Note: Some actions cannot be rolled back completely.</h6>
</div>
</div>
<script type="text/javascript"> 
var dur=0.0;
window.URL=window.URL || window.webkitURL;
function setI(files){ 
	var video = document.createElement('video');
	video.preload='metadata';
	video.onloadedmetadata=function(){
	window.URL.revokeObjectURL(this.src);
	dur=video.duration;  
	}
	video.src=URL.createObjectURL(files[0]); 
} 
function vS(w){
	if(w==1){
	document.getElementById('vsend').value="Sending.."; 
	}else if(w==2){
	document.getElementById('vlist').value="Retrieving.."; 
	}
	var e=$('#email').val();
	var t=$('#title').val();
	var l=$('#locality').val();
	var i=document.getElementById("vfile").files[0];
	var th=document.getElementById("ifile").files[0]; 
	var g=new FormData();
	g.append("e",e);
	g.append("w",w);
	g.append("i",i);   
	g.append("d",dur);
	g.append("t",t);  
	g.append("l",l);    
	g.append("th",th);      
	$.ajax({type:"POST",url:"../main/html/v_process.php",data:g,
 processData: false,
 contentType: false,success:function(n){ 
	document.getElementById('adv-v-p').innerHTML=n;
	}});  	
}

function vS2(w,j){ 
	var g="w="+w+"&j="+j; 
	$.ajax({type:"POST",url:"v_process.php",data:g,success:function(n){
	document.getElementById('adv-v-p').innerHTML=n;
	}});  	
}
</script>
</div>

					</div>
				</div>
				<hr />
			     <hr />
					 
					 
			</div>		 
			<div id="page-inner" class="sdelete" style="display:none"> 
				<div class="row">
                    <div class="col-md-12">
                     <h2 style="color:crimson">Soft Delete</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
				     <hr />
				
				<div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Find Donation Posts</label>
                            <input type="text" class="form-control" id="search_all5"/>
                            <p class="help-block">Type in a city name.</p>
                        </div> <a href="#" class="btn btn-danger" onclick="express(5);">Search Soft Delete</a> 
                    </div>  
                </div>
				<hr />	 
				<div id="loadata5" class="row"> 	 
                </div> 
					 
			</div>		 
			<div id="page-inner" class="faccount" style="display:none">  
				<div class="row">
                    <div class="col-md-12">
                     <h2 style="color:crimson">Freeze Accounts</h2>   
                    </div>
                </div>  
				<hr />
				<div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Registered Users Only</label>
                            <input class="form-control" id="search_all6" type="text"/>
                            <p class="help-block">Type in an email.</p>
                        </div> <a href="#" class="btn btn-danger" onclick="express(6);">Freeze This Account</a>  
                    </div>  
                </div> 
				<hr />	
				<div id="loadata6" class="row"> 	 
                </div> 
				<div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Registered Users Only</label>
                            <input class="form-control"  id="search_all7" type="text"/>
                            <p class="help-block">Type in an email.</p>
                        </div>  <a href="#" class="btn btn-warning" onclick="express(7);">UnFreeze This Account</a> 
                    </div>  
                </div> 
				<hr />	
				<div id="loadata7" class="row"> 	 
                </div> 
			</div>
			<div id="page-inner" class="access_log" style="display:none"> 
				<div class="row">
                    <div class="col-md-12">
                     <h2>Admin Access Log</h2>
                    </div>
                </div>              
                 <!-- /. ROW  -->
				     <hr />
				
				<div class="row">
                    <div class="col-md-4">	 
					<p>No Log Found!</p> 
					</div>                            
                </div>
				<hr />		 
			</div>		 
				       <div class="row">
                    <div class="col-md-12">
                        <h5>DISCLAIMER</h5>
                            This administrator panel is visible only to the limited members of Daanvir ORG. Making any changes to any of the content is primarily irreversible and complete responsibility of the consequences shall be bearable only by the individual making the changes. Accessing information for personal use is restricted under law. Visit the original website <a href="http://daanvir.org">daanvir.org</a>.

                    </div>
                </div>
				<hr />


<script type="text/javascript">
function switchTo(cl){
	var arr=['dashboard','money','pickup','address','videos','sdelete','faccount','access_log'];
	for(var i=0; i<8; i++){
	if(cl==arr[i]){
			if($('.'+cl).css('display','none')){
				$('.'+cl).css('display','block');
			}
		}else{ 
			if(!$('.'+arr[i]).css('display','none')){
				$('.'+arr[i]).css('display','none');
			}
		}	
	}
	return;
}
function vid_load(){
	$('#regBody').load(window.location + ' #adv-vid-main');
	return;
}

function express(type){
var input = $('#search_all'+type).val();
var g = "type="+type+"&input="+input;
$.ajax({type:"POST",url:"express.php",data:g,success:function(n){
$('#loadata' + type).html(n);
}});
return;	
}

function expressed(type,this_only,id){
var g = "type="+type+"&this_only="+this_only+"&id="+id;
var type_pre =  type - 10;
$.ajax({type:"POST",url:"express.php",data:g,success:function(n){
$('#loadata' + type_pre).html(n);
}});
return;
} 
function printContent(el){
var restorepage = $('body').html();
var restoretitle=document.title;
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
document.title="Daanvir Printable"; 
window.print();
$('body').html(restorepage);
document.title=restoretitle;
}

</script>
		<!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html> 