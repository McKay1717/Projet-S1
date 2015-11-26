<?php
function searchResult()
{
	if(!isset($_GET['search']))
		echo '<p style="text-align:center;">Pas de recherche.</p>';
	else
	{
		echo '<p style="text-align:center;">Résultats de recherche pour : ' . $_GET['search'] . '</p>';
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/base.css">
		<link rel="stylesheet" href="style/home.css">
	</head>
	<body>
		<div id="container">
			<?php
			require('head.php');
//			require('nav.php');
			?>
			<div id="main">
				<section>
				<?php searchResult(); ?>
				</section>
			</div>
		<?php
		require('foot.php');
		?>
		</div>
	</body>
</html>
