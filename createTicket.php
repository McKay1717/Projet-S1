<?php
  include 'function.php'
  
//Fonction pour créer un nouvel article :
  function newArticle($titre, $contenu)
  {
    qweryDB("INSERT INTO Article(nom_Article, contenu_Article) VALUES (".$titre.",".$contenu.")");
  }
  
//Fonction pour éditer un article :
  function editArticle($titre, $newct)
  {
    qweryDB("UPDATE Article SET contenu_Article =".$newct." WHERE nom_Article = ".$titre);
  }
  
//Fonction pour catégoriser un article :
  function getArticleCT($id, $categorie)
  {
    qweryDB("UPDATE Article SET Categorie_Article =".$categorie."WHERE id_Article =".$id);
  }
  
//Fonction pour supprimer un article :
  function deleteArticle($id)
  {
    qweryDB("DELETE FROM Article WHERE id_Article = ".$id.");
  }
?>
