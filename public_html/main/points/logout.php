<?php  
/*			ORIGINAL CODE
	session_start();
	if(session_destroy())
		header('Location:http://daanvir.org');
*/
 ?>

<?php  
	session_start();
	if(session_destroy())
		header('Location:'.$_SERVER['HTTP_REFERER']);
 ?>