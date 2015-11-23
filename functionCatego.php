<?php
  	//fonction get: recuperer la categorie d'un article
  	function categoGet($id_Article)
	{
		//variable associer au tableaux d'information sur l' article 
		$article = queryDB("SELECT id_Categorie 
                             FROM Categorie
                            WHERE Categorie_article = " . $id_Article); 
    	return $article;
  	}


  	//foncton set: definit la cateorie d'un article
  	function categoSet($id_Article,$nom_CategoString)
  	{
	$selectQuery = "SELECT id_Categorie 
				FROM Categorie 
				WHERE intitule_Categorie = " . $nom_CategoString;
	
	//variable associer a la mise a jour de la categorie
    	$updateQuery = "UPDATE Article 
		 	SET Categorie_article = " . $id_Article;
		 	
	//tableau d'information sur le nom de la categorie	 	
	queryDB($id_Article);
		 	
    	//tableaux d'information sur la categorie
    	queryDB($updateQuery);
   
    	//verification booleen de validation (inutile)
    	//return !($article == $string);
  	}

?>
