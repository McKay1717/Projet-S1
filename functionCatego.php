<?php
  	//fonction get: recuperer la categorie d'un article
  	function categoGet($id_Article)
	{
		//variable associer au tableaux d'information sur l' article 
		$article = queryDB("SELECT id_Categorie 
                             FROM intitule_Categorie
                            WHERE Categorie_article = " . $id_Article); 
    		return $article;
  	}


  	//foncton set: definit la categolol d'un article
  	function categoSet($id_Article,$nom_CategoString)
  	{
		$selectQuery = "SELECT id_Categorie 
				FROM Categorie 
				WHERE intitule_Categorie = " . $nom_CategoString;
				
		//tableau d'information sur le nom de la categolol	 	
		$catego = queryDB($selectQuery)['id_Categorie'];
		
		//variable associer a la mise a jour de la categolol
    		$updateQuery = "UPDATE Article
		 	SET Categorie_article = " . $catego .
		 	"WHERE id_Article = " . $id_Article;
		 	
    		//tableaux d'information sur la categolol
    		queryDB($updateQuery);
   
    		//verification booleen de validation (inutile)
    		//return !($article == $string);
  	}
  	
  	//fonction retournant la liste de toutes les categories
  	function listcatego()
  	{
  		
  		$categorie= "SELECT intitule_Categorie
  			FROM Categorie
  			 ";
  		return $categoris;
  	}

?>
