<?php
	include 'function-login.php';
	
	function createSession()
	{
		if(session_start() && isLoged());
		else
			session_destroy();
	}
?>
