<?php
    include_once 'functions.php';
    include_once 'function-login.php';
    
    //Créer une entré de modification et retourne son identifiant
    function CreateAndGetModificationID()
    {
    	$ret = null;
    	if(isLoged())
    	{
    		$req = 'INSERT INTO Modification() VALUES ()';
    		$pdo = connectDB();
    		$prepare = $pdo->prepare($req);
    		$prepare->execute();
    		$id = $pdo->lastInsertId();
    		$ret = $id;
    
    	}
    	return  $ret;
    }

    //Fonction pour créer un nouvel article :
    function newArticle($titre, $contenu, $categorie)
    {
        // Si un utilisateur est connecté
        if (isLoged())
        {
            // Requête pour inserer un article dans la table article
            // (contenu, nom, catégorie, auteur)
            $req = 'INSERT INTO Article
                    (
                        contenu_Article,
                        nom_Article,
                        Categorie_Article,
                        Auteur_Article,
            			last_modification_Article
                    )
                    VALUES
                    (
                        "'.$contenu.'",
                        "'.$titre.'",
                        "'.$categorie.'",
                        "'.GetUserID().'",
                        "'.CreateAndGetModificationID().'"
                    )';

            queryDB($req);
        }
    }


    //Fonction pour éditer un article d'après son id:
    function editArticle($id_article, $newct)
    {
        // Si un utilisateur est connecté
        if (isLoged())
        {
            // Met à jour le contenu d'un article dans la
            // table article depuis son id
            $req = 'UPDATE Article
                    SET contenu_Article = "'.$newct.'",
                    		last_modification_Article='.CreateAndGetModificationID().'
                    WHERE id_Article = "'.$id_article.'"';

            queryDB($req);
        }
    }

    // Fonction qui retourne la liste des id de tous les articles
    function getArticleIdList()
    {
        $req = 'SELECT id_Article
                FROM Article 
                ORDER BY date_parution_Article DESC';

        return queryDB($req);
    }


    //Fonction pour retourner le contenu d'un article depuis son id.
    function getArticleCT($id_article)
    {
        // Requete pour récuperer le contenu d'un article par son id
        $req = 'SELECT contenu_Article
                FROM Article
                WHERE id_Article = "'.$id_article.'"';

        return queryDB($req)[0]['contenu_Article'];
    }


    //Fonction pour retourner le titre d'un article depuis son id.
    function getArticleTitle($id_article)
    {
        // Requete pour récuperer le titre d'un article par son id
        $req = 'SELECT nom_Article
                FROM Article
                WHERE id_Article = "'.$id_article.'"';

        return queryDB($req)[0]['nom_Article'];
    }


	//Récupère un article
	function getArticle($id_article)
	{
		$req = 'SELECT nom_article, contenu_article
				FROM Article
				WHERE id_Article = "' . $id_article . '"';

		return queryDB($req);
	}

	//Récupère un article selon une catégorie
	function getArticleByCategory($id_category)
    {
		$req = 'SELECT id_Article, nom_article, contenu_article
				From Article
				WHERE Categorie_Article = "' . $id_category . '"';

		return queryDB($req);
    }
    
    //Récupère un article selon une catégorie dans la page d'accueil
    function getArticleByCategoryHome($id_category)
    {
    	$req = 'SELECT id_Article, nom_article, contenu_article
    			From Article
				WHERE Categorie_Article = "' . $id_category . '"
				ORDER BY date_parution_Article DESC
				LIMIT 3';

        return queryDB($req);
    }

    //Fonction pour retourner la date d'un article depuis son id.
    function getArticleDate($id_article)
    {
        // Requete pour récuperer la date d'un article par son id
        $req = 'SELECT date_parution_Article
                FROM Article
                WHERE id_Article = "'.$id_article.'"';

        return queryDB($req);
    }


    //Fonction pour retourner l'auteur d'un article depuis son id.
    function getArticleAuthor($id_article)
    {
        // Requete pour récuperer l'auteur d'un article par son id
        $req = 'SELECT Auteur_Article
                FROM Article
                WHERE id_Article = "'.$id_article.'"';

        return queryDB($req);
    }
    //Fonction pour retourner les articles d'un auteur depuis son id.
    function getArticleByAuthor($id_user)
    {
    	$req = 'SELECT id_Article, nom_article, contenu_article
                FROM Article
                WHERE Auteur_Article  = "'.$id_user.'"';
    
    	return queryDB($req);
    }
    //Fonction pour retourner les 10 derniers article
    function GetLastTenArticle()
    {
    	$req = 'SELECT id_Article, nom_article, contenu_article
                FROM Article
                ORDER BY date_parution_Article DESC LIMIT 0, 10';
    
    	return queryDB($req);
    }


    //Fonction pour supprimer un article :
    function deleteArticle($id_article)
    {
        // Si un utilisateur est connecté
        if (isLoged())
        {
            // Requete pour effacer un article par son id
            $req = 'DELETE FROM Article
                    WHERE id_Article = "'.$id_article.'"';

            queryDB($req);
        }
    }

