<?php require_once '../db/init.php'; ?>
<?php protectPage(); ?> 
<button id="sclk" onclick="open_page(7);open_page(23);">Go to Outbox Campaigns</button>
	<div id="grid-gallery" class="grid-gallery">
		<?php campaigns_box($userData['userId'],1);	?>	
		</div><!-- // grid-gallery -->
		<div class="clearfix"></div> 
		<script>
			new CBPGridGallery( document.getElementById( 'grid-gallery' ) );
		</script>
	
