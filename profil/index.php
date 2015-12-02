<?php
include('../include/minArticle.php');
include('../include/session.php');

createSession();

function displayUsrProfil()
{

}

function displayUsrInfo()
{
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/profil.css">
		<link rel="stylesheet" href="../style/minArticle.css">
		<link rel="stylesheet" href="../style/input.css">
	</head>
	<body>
		<div id="container">
			<?php require('../include/head.php'); ?>

			<div id="main">
				<section>
					<div id="profil">
						<h2>Pierre-Paul Jacques</h2>
						<img src="../img/user.png" />
					</div>

					<hr />

					<div id="publications">
						<h3>Publications</h3>

					<?php
					for($i = 0; $i < 10; $i++):
						displayMinArticle($i, 'Post ' . ($i + 1), 'blabla bla blablabla', $dir);
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
