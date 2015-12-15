<?php
	// Fonction de connexion à la BDD
	function connectDB()
	{
		// Inclusion des paramètres de config de la BDD locale
		include("config.php");

		// Connection à la BDD 
		// $link => Lien vers la BDD (Objet PDO), variable retounée
		$link = new PDO('mysql:host='.$config['mysql']['host'].';port='.$config['mysql']['port'].';dbname='.$config['mysql']['db'].';charset=UTF8;',$config['mysql']['user'],$config['mysql']['password'], array(PDO::ATTR_PERSISTENT=>true));

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
		$que = $link->query($req) or die($req);

		// on retourne le contenu de la requête
		// (tableau associatif) dans une variable
		$ret = $que->fetchAll();


		// Retourne le contenu du tableau simple
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
