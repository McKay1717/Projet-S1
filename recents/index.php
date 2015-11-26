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
	</head>
	<body>
		<div id="container">
			<?php require('../head.php'); ?>
			<div id="main">
				<section>
				<h1>Articles récents</h1>

				<?php
				for($i = 0; $i < 10; $i++):
					displayMinArticle($i, 'Article ' . ($i + 1), 'Blabla blablabla blabla blablabla bla blablabla bla');
				endfor;
				?>
				</section>
			</div>
			<?php
			require('../foot.php');
			?>
		</div>
	</body>
</html>
