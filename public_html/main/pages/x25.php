<?php require_once '../db/init.php'; ?>
<?php protectPage(); ?>
<button id="sclk" class="sclk-2" onclick="open_page(7);open_page(24);">Go to My Support</button>
	<div id="grid-gallery-4" class="grid-gallery">
		<?php support($userData['userId'],$userData['city'],$userData['state'],$userData['country'],'supp'); 
		?>	
		</div><!-- // grid-gallery -->
		<div class="clearfix"></div> 

<script language="javascript">
function support(b,c){var a="obj="+b+"&c="+c;$.ajax({type:"POST",url:"main/php/validate_support.php",data:a,cache:!1,success:function(d){if(d==1){open_page(7);open_page(25)}else if(d==0){}else{}}})}
</script>		
	
 