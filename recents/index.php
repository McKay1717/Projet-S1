<?php
include_once('../include/minArticle.php');
include_once('../include/session.php');

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
	</head>
	<body>
		<div id="container">
			<?php require('../include/head.php'); ?>
			<div id="main">
				<section>
				<h1>Articles récents</h1>

				<?php
				for($i = 0; $i < 10; $i++):
					displayMinArticle($i, 'Article ' . ($i + 1), 'Blabla blablabla blabla blablabla bla blablabla bla', $dir);
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
