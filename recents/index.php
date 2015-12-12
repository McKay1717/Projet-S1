<?php
include_once('../include/minArticle.php');
include_once('../include/session.php');
include_once('../include/createTicket.php');

createSession();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/minArticle.css">
		<link rel="stylesheet" href="../style/defil.css">
		<link rel="stylesheet" href="../style/input.css">
		<title>Dernier article</title>
	</head>
	<body>
		<div id="container">
			<?php require('../include/head.php'); ?>
			<div id="main">
				<section>
				<h1>Articles récents</h1>

				<?php
				$lastArticle = GetLastTenArticle();
				for($i = 0; $i < count($lastArticle); $i++):
					displayMinArticle($lastArticle[$i]['id_Article'], $lastArticle[$i]['nom_article'], $lastArticle[$i]['contenu_article'], $dir);
				endfor;
				?>
				</section>
			</div>
			<?php
			require('../include/foot.php');
			?>
		</div>
	</body>
</html>
