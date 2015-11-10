<?php
	

	// Fonction BDD ($req ==> requete à la BDD)
	function connectDB($req)
	{
		// Inclusion des paramètres de config de la BDD locale
		include("config.php");

		// Lien vers et connection à la BDD 
		$link = mysqli_connect($config['mysql']['host'], 
			      	   		   $config['mysql']['user'], 
			      	   		   $config['mysql']['password'], 
			      	   		   $config['mysql']['db'],
			      	   		   $config['mysql']['port']);

		// Envoie de la requete à la BDD 
		// $que ==> enregistrement de ce que retourne la requete
		// Arrête l'éxecution du bouzin et indique la requete qui a foiré
		$que = mysqli_query($link, $req) or die($req);

		// Récupère une ligne de résultat sous forme de tableau associatif
		// $ret ==> variable qui sera retournée
		$ret = mysqli_fetch_assoc($que)

		// Fermeture de l'accès à la BDD
		mysqli_close($link);

		// Retourne le contenu de la requete
		return $ret;
	}

?>