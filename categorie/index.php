<?php
include_once('../include/minArticle.php');
include_once('../include/session.php');
include_once('../include/functionCatego.php');
include_once('../include/createTicket.php');

createSession();

if(isset($_GET['id']))
{
	$id = htmlentities($_GET['id']);
	$name = GetCategoryNameByiD($id);
	if(empty($name))
	{
		http_response_code(404);
	}
		
}else
{
	http_response_code(404);
}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/minArticle.css">
		<link rel="stylesheet" href="../style/defil.css">
		<link rel="stylesheet" href="../style/categorie.css">
		<link rel="stylesheet" href="../style/input.css">
		<title>
			Liste des articles de <?php echo $name;?>
		</title>
	</head>
	<body>
		<div id="container">
			<?php require('../include/head.php'); ?>
			<div id="main">
				<section>

				<?php
				if(isset($_GET['id'])):
				$id = htmlentities($_GET['id']);
				$name = GetCategoryNameByiD($id);
				if(!empty($name)):
				?>
				<h1><?php echo $name;?></h1>

				<?php
				$postList = getArticleByCategory($id);
				if(count($postList) < 10)
				{
					$nb = count($postList);
				
				}else
				{
					$nb = 10;
				}
				for($i = 0; $i < $nb; $i++)
				{
					displayMinArticle($postList[$i]['id_Article'], $postList[$i]['nom_article'], $postList[$i]['contenu_article'], $dir);
				}
				else:
				echo '<p style="text-align:center;">404 cette catégorie n\'éxite pas.</p>';
				http_response_code(404);
				endif;
				else:
				echo '<p style="text-align:center;">Il n\'y a aucune catégorie de sélectionnée.</p>';
				http_response_code(404);
				endif;
				?>
				</section>
			</div>
			<?php
			require('../include/foot.php');
			?>
		</div>
	</body>
</html>
