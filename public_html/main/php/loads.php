<?php require '../db/init.php';
$u=$userData['userId'];?>

<div id="nots1" class="filterbysms"> 
				<?php 
				filter($u,'sms','notsel');
				?>   	 
				</div>
<div id="nots1" class="filterbyemail">  
				<?php 
				filter($u,'email','notsel');
				?>  	 
				</div>
<div id="nots1" class="sfilterspread">  
					<?php 
					filter($u,'sms','sel');
					?>
					
</div> 
<div id="nots1" class="efilterspread">  
					<?php 
					filter($u,'email','sel');
					?>   
						 
</div>
<div id="nots1" class="ffilterspread">  
					<?php 
					ffilter($u);
					?>   
						 
</div>
<div class="midload">
			<div id="headin-head">
				<h2>Saved Templates<br><hr></h2>
			</div> 
			<div id="conbody" class="loadtemplates">
			<div id="nots1" class="templates"> 
					<?php
						loadTemps($u);
					?>   
				</div>
		<button id="deltemp" onclick="delete_temp();">Delete This!</button>
				</div>
			</div>