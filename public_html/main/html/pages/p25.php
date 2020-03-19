<?php require_once '../../db/init.php'; ?>
<?php protectPage(); ?>
<div id="lcampaigns" class="supps"> 

<div id="nots1">
<?php //Function To Support
support($userData['userId'],$userData['city'],$userData['state'],$userData['country'],'left','supps');
?>	 
</div>
<div id="nots2"> 
<?php //Function To Support
support($userData['userId'],$userData['city'],$userData['state'],$userData['country'],'right','supps');
?>	
</div>
</div>