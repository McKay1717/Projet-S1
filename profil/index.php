<?php
include_once('../include/minArticle.php');
include_once('../include/session.php');
include_once '../include/function-login.php';
include_once('../include/createTicket.php');

createSession();

function displayUsrProfil()
{

}

function displayUsrInfo()
{
}

?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/profil.css">
		<link rel="stylesheet" href="../style/minArticle.css">
		<link rel="stylesheet" href="../style/input.css">
		<title>Liste des articles de <?php echo GetUsername();?></title>
	</head>
	<body>
		<div id="container">
			<?php require('../include/head.php'); ?>

			<div id="main">
				<section>
					<div id="profil">
						<h2><?php echo GetUsername();?></h2>
						<img src="../img/user.png" />
					</div>

					<hr />

					<div id="publications">
						<h3>Publications</h3>

					<?php
					$ListArticle = getArticleByAuthor(GetUserID());
					for($i = 0; $i < count($ListArticle); $i++):
						displayMinArticle($ListArticle[$i]['id_Article'], $ListArticle[$i]['nom_article'], $ListArticle[$i]['contenu_article'], $dir);
					endfor;
					?>
					</div>
				</section>
			</div>
			<?php
			require('../include/foot.php');
			?>
		</div>
	</body>
</html>
