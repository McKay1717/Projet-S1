<?php
include('../include/createTicket.php');
include('../include/session.php');

createSession();

function displayArticle()
{
	if(isset($_GET['id']))
	{
		$article = getArticle($_GET['id']);

		if($article)
		{
			echo '<h1>' . $article['nom_article'] . '</h1>';
			echo $article['contenu_article'];
		}
		else
			echo '<p>Erreur 404 : Le contenu demandé n\'a pas été trouvé.</p>';
	}
	else
		echo '<p>Aucun contenu n\'a été démandé.</p>';
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/article.css">
		<link rel="stylesheet" href="../style/input.css">
	</head>
	<body>
		<div id="container">
			<?php require('../include/head.php'); ?>
			<div id="main">
				<section>
				<?php displayArticle(); ?>
				</section>
			</div>
		<?php
		require('../include/foot.php');
		?>
		</div>
	</body>
</html>
