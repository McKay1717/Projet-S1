<?php
include('../minArticle.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/minArticle.css">
		<link rel="stylesheet" href="../style/defil.css">
		<link rel="stylesheet" href="../style/categorie.css">
	</head>
	<body>
		<div id="container">
			<?php require('../head.php'); ?>
			<div id="main">
				<section>

				<?php
				if(isset($_GET['id'])):
				?>
				<h1>Categorie bidule</h1>

				<?php
				for($i = 0; $i < 10; $i++):
					displayMinArticle($i, 'Post ' . ($i + 1), 'blabla bla blablabla');
				endfor;
				else:
				echo '<p style="text-align:center;">Il n\'y a aucune catégorie de sélectionnée.</p>';
				endif;
				?>
				</section>
			</div>
			<?php
			require('../foot.php');
			?>
		</div>
	</body>
</html>
