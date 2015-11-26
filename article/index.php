<?php
include('../include/createTicket.php');

function displayArticle($id)
{
	$title = getArticleTitle($id);
	$content = getArticleCT($id);

	echo '<h1>' . $title . '</h1>';
	echo $content;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/article.css">
	</head>
	<body>
		<div id="container">
			<?php require('../head.php'); ?>
			<div id="main">
				<section>
				<h1>Titre</h1>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
				sed do eiusmod tempor incididunt ut labore et dolore magna 
				aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
				ullamco laboris nisi ut aliquip ex ea commodo consequat. 
				Duis aute irure dolor in reprehende rit in voluptate velit 
				esse cillum dolore eu fugiat nulla pariatur. Excepteur 
				sint occaecat cupidatat non proident, sunt in culpa qui 
				officia deserunt mollit anim id est laborum
				</p>

				<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
				sed do eiusmod tempor incididunt ut labore et dolore magna 
				aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
				ullamco laboris nisi ut aliquip ex ea commodo consequat. 
				Duis aute irure dolor in reprehende rit in voluptate velit 
				esse cillum dolore eu fugiat nulla pariatur. Excepteur 
				sint occaecat cupidatat non proident, sunt in culpa qui 
				officia deserunt mollit anim id est laborum
				</p>

				<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
				sed do eiusmod tempor incididunt ut labore et dolore magna 
				aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
				ullamco laboris nisi ut aliquip ex ea commodo consequat. 
				Duis aute irure dolor in reprehende rit in voluptate velit 
				esse cillum dolore eu fugiat nulla pariatur. Excepteur 
				sint occaecat cupidatat non proident, sunt in culpa qui 
				officia deserunt mollit anim id est laborum
				</p>
				</section>
			</div>
		<?php
		require('../foot.php');
		?>
		</div>
	</body>
</html>
