<?php
include('minArticle.php');

function homeMainCategory($id)
{
?>
	<div class="category">
		<h2><a href="categorie/?id=<?php echo $id; ?>">Catégorie 1</a></h2>
	<?php
	for($i = 0; $i < 3; $i++):
		displayMinArticle($i, 'Post ' . ($i + 1), 'Blabla blablabla blabla blablabla bla');
	endfor;
	?>
	</div>
<?php
}

function homeMainHead2()
{
	for($i = 0; $i < 2; $i++):
		displayMinArticle($i, 'Head Post ' . ($i + 1), 'Blabla blablabla blabla blablabla bla');
	endfor;
}

function homeMain()
{
?>
	<div id="home_main">
		<a id="head_post" class="pub_link" href="article/">
			<h2>Head Post</h1>
			<p>Blabla blablabla blabla blablabla bla</p>
		</a>
		<div id="head_post2">
		<?php homeMainHead2(); ?>
		</div>
		<?php homeMainCategory(1); ?>
		<?php homeMainCategory(2); ?>
		<?php homeMainCategory(3); ?>
		<a href="categorie/liste.php">Voir toutes les catégories disponibles</a>
	</div>
<?php
}

function homeLastPost()
{
?>
	<div id="recent_post">
		<h2><a href="recents/">Récent</a></h2>

		<?php
		for($i = 0; $i < 6; $i++):
		displayMinArticle($i, 'Recent Post ' . ($i + 1), 'Blabla blablabla blabla blablabla bla');
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
	</head>
	<body>
		<div id="container">
			<?php require('head.php') ;?>
			<div id="main">
				<section>
					<?php
					homeMain();
					homeLastPost();
					?>
				</section>
			</div>
		<?php
		require('foot.php');
		?>
		</div>
	</body>
</html>
