<?php
	include_once 'functions.php';
	include_once 'function-login.php';


	// Fonction pour retourner l'id d'une catégorie
	// d'un article grace à l'id de celui-ci
  	function getArticleCategory($id_article)
	{
		// Requête pour récuperer l'id de la catégorie
		// d'un article par l'id de celui-ci
		$req = 'SELECT Categorie_Article
                FROM Article
                WHERE id_Article = "'.$id_article.'"';

		// On retourne l'id
		return queryDB($req);
  	}


  	// Fonction pour changer la catégorie d'un article
  	function setArticleCategory($id_article, $id_categorie)
  	{
		// Requête pour changer la catégorie
		$req = 'UPDATE Article
				SET Categorie_Article = "'.$id_categorie.'"
				WHERE id_Article = "'.$id_article.'"';

		queryDB($req);
  	}
  	
  	// Fonction retournant la liste des IDs des categories
  	function categoryIdList()
  	{
		// Requête pour recuperer la liste des
		// id des catégories
		$req = 'SELECT id_Categorie
  				FROM Categorie';


		// On retourne la liste
  		return queryDB($req);
  	}
  	function GetCategoryNameByiD($id)
  	{
  		$req = 'SELECT intitule_Categorie
  				FROM Categorie WHERE id_Categorie ='.$id;
  		return queryDB($req)[0]['intitule_Categorie'];
  	}
  	
  	// Fonction retournant la liste des noms des categories
  	function categoryNameList()
  	{
		// Requête pour récuperer la liste de noms
		$req = 'SELECT intitule_Categorie
  				FROM Categorie';

		// On retourne la liste
		return queryDB($req);
  	}