<?php
include_once('../include/createTicket.php');
include_once('../include/session.php');

createSession();
$title = "";
function displayArticle($DoOutput)
{
	if(isset($_GET['id']))
	{
		$title = getArticleTitle(htmlentities($_GET['id']));
		$content = getArticleCT(htmlentities($_GET['id']));

		$article = getArticle(htmlentities($_GET['id']));

		if($article)
		{
			if($DoOutput)
			{
            	echo '<h1>' . $title . '</h1>';
            	echo html_entity_decode($content);
			}

		}
		else
		{
			http_response_code(404);
			if($DoOutput) echo '<p>Erreur 404 : Le contenu demandé n\'a pas été trouvé.</p>';
		}
	}
	else
	{
		http_response_code(404);
		if($DoOutput) echo '<p>Aucun contenu n\'a été démandé.</p>';
	}
}
displayArticle(false);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/article.css">
		<link rel="stylesheet" href="../style/input.css">
		<title><?php echo $title;?></title>
	</head>
	<body>
		<div id="container">
			<?php require('../include/head.php'); ?>
			<div id="main">
				<?php if(isLoged()):?>
				<a href=<?php  echo $dir."article/edit.php?id=".htmlentities($_GET['id']);?>>Editer</a>
				<?php endif;?>
				<section>
				<?php displayArticle(true); ?>
				</section>
			</div>
		<?php
		require('../include/foot.php');
		?>
		</div>
	</body>
</html>
