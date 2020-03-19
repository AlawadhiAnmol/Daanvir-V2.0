<?php require_once '../../db/init.php'; ?>
<?php protectPage(); ?>
<div id="lcampaigns" class="suppss"> 
	<?php myCamps($userData['userId']); ?>  
</div>