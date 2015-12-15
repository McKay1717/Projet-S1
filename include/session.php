<?php
	include_once 'function-login.php';
	
	//Créee la session si l'utilisateur est connecté
	
	function createSession()
	{
		if(session_start() && isLoged());
		else
			session_destroy();
	}
?>
