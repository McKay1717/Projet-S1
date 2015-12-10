<?php
include_once('include/createTicket.php');
include_once('include/functionCatego.php');
include_once('include/minArticle.php');
include_once('include/session.php');

createSession();

function homeMainCategory($id, $dir)
{
?>
	<div class="category">
		<h2><a href="categorie/?id=<?php echo $id; ?>"><?php echo GetCategoryNameByiD($id);?></a></h2>
	<?php
	$postList = getArticleByCategory($id);
	if(count($postList) < 3)
	{
		$nb = count($postList);
		
	}else
	{
		$nb = 3;
	}
	for($i = 0; $i < $nb; $i++):
		displayMinArticle($postList[$i]['id_Article'], $postList[$i]['nom_article'], $postList[$i]['contenu_article'], $dir);
	endfor;
	?>
	</div>
<?php
}

function homeMainHead2($dir)
{
	for($i = 0; $i < 2; $i++):
		displayMinArticle($i, 'Head Post ' . ($i + 1), 'Blabla blablabla blabla blablabla bla', $dir);
	endfor;
}

function homeMain($dir)
{
?>
	<div id="home_main">
		
		<?php
		$ListCategoID = categoryIdList();
		$tmp = array();
		foreach ($ListCategoID as $value)
		{
			array_push($tmp, $value['id_Categorie']);
		}
		$ListCategoID = $tmp;
		unset($tmp);
		foreach ($ListCategoID as $id)
		{
			homeMainCategory($id, $dir);
		}?>
		<a href="categorie/liste.php">Voir toutes les catégories disponibles</a>
	</div>
<?php
}

function homeLastPost($dir)
{
?>
	<div id="recent_post">
		<h2><a href="recents/">Récent</a></h2>

		<?php

		$lastArticle = GetLastTenArticle();
		for($i = 0; $i < count($lastArticle); $i++):
			displayMinArticle($lastArticle[$i]['id_Article'], $lastArticle[$i]['nom_article'], $lastArticle[$i]['contenu_article'], $dir);
		endfor;
		?>
	</div>
<?php
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/base.css">
		<link rel="stylesheet" href="style/minArticle.css">
		<link rel="stylesheet" href="style/home.css">
		<link rel="stylesheet" href="style/input.css">


	</head>
	<body>
		<div id="container">
			<?php require('include/head.php') ;?>
			<div id="main">
				<section>
					<?php
					homeMain($dir);
					homeLastPost($dir);
					?>
				</section>
			</div>
		<?php
		require('include/foot.php');
		?>
		</div>
	</body>
</html>
