<?php
	// Fonction de connexion à la BDD
	function connectDB()
	{
		// Inclusion des paramètres de config de la BDD locale
		include("config.php");

		// Connection à la BDD 
		// $link => Lien vers la BDD, variable retounée
		$link = mysqli_connect($config['mysql']['host'], 
			      	   		   $config['mysql']['user'], 
			      	   		   $config['mysql']['password'], 
			      	   		   $config['mysql']['db'],
			      	   		   $config['mysql']['port']);

		// Retourne le lien à la BDD
		return $link;
	}
	// Fonction de requête à la BDD
	// $req ==> requete à envoyer
	function queryDB($req)
	{
		$link = connectDB();

		// Envoie de la requete à la BDD 
		// $que ==> enregistrement de ce que retourne la requete
		// Arrête l'éxecution du bouzin et indique la requete qui a foiré
		$que = mysqli_query($link, $req) or die($req);

		// Récupère une ligne de résultat sous forme de tableau associatif
		// $ret ==> variable qui sera retournée
		$ret = mysqli_fetch_assoc($que);

		// Fermeture de l'accès à la BDD
		mysqli_close($link);

		// Retourne le contenu de la requete
		return $ret;
	}
    
     
    
    // Chargement de l'url indiquée ($url) sur timer ($timer, millisecondes)
    function goPageTimer($url,$timer)
    {
        echo '
        <script type="text/javascript">
          	window.setTimeout("location=(\''.$url.'\');",'.$timer.');
        </script>
        ';
    }