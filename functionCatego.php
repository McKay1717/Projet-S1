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
  	function categoSet()
  	{
		//variable associer au tableaux d'information sur la categorie
    	$string = "UPDATE id_Categorie, intitule_Categorie, description_Categorie,  
		 			FROM Categorie
		 			WHERE Categorie_article
                "; 
    	//variable associer au tableaux d'information sur la categorie
    	$article = queryDB($string);
    	
    	//verification booleen de validation (inutile)
    	//return !($article == $string);
  	}

?>
