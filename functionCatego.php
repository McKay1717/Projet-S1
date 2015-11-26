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



  	//fonction set: definit la categorie d'un article
  	function categoSet($id_Article,$nom_CategoString)
  	{
		$selectQuery = "SELECT id_Categorie 
				FROM Categorie 
				WHERE intitule_Categorie = " . $nom_CategoString;
				
		//tableau d'information sur le nom de la categorie	 	
		$catego = queryDB($selectQuery)['id_Categorie'];
		
		//variable associer a la mise a jour de la categorie
    		$updateQuery = "UPDATE Article
		 	SET Categorie_article = " . $catego .
		 	"WHERE id_Article = " . $id_Article;
		 	
    		//tableaux d'information sur la categorie
    		queryDB($updateQuery);
  	}



  	//fonction retournant la liste de tout les IDs des categories
  	function listIDcatego()
  	{
  		$categorie= queryDB("SELECT id_Categorie
  			FROM Categorie
  			 ");
  		return $categorie;
  	}



  	//fonction retournant la liste de tout les noms des categories
  	function listNOMcatego()
  	{
  		$categorie= queryDB("SELECT intitule_Categorie
  			FROM Categorie
  			 ");
  		return $categorie;
  	}



    //fonction retournant la liste de tout les Articles dans une categorie
    function listArticlINcatego($id_Categorie)
    {
      $listAtricl= queryDB("SELECT id_Article
        FROM Article
        WHERE Categorie_article = " . $id_Categorie
          );
      return $listAtricl;
    }


?>
