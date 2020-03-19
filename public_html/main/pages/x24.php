<?php require_once '../db/init.php'; ?>
<?php protectPage(); ?> 
<button id="sclk" onclick="open_page(7);open_page(25);">Go to Support Others</button>
	<div id="grid-gallery-3" class="grid-gallery">
		<?php support($userData['userId'],$userData['city'],$userData['state'],$userData['country'],'supps');	?>	
		</div><!-- // grid-gallery -->
		<div class="clearfix"></div> 
	
