<?php require_once '../db/init.php'; ?>
<?php protectPage(); ?> 
<button id="sclk" onclick="open_page(7);open_page(22);">Go to Inbox Campaigns</button>
	<div id="grid-gallery-2" class="grid-gallery">
		<?php campaigns_box($userData['userId'],2);	?>	
		</div><!-- // grid-gallery -->
		<div class="clearfix"></div>
		<script>
			new CBPGridGallery( document.getElementById( 'grid-gallery-2' ) );
		</script>
	
