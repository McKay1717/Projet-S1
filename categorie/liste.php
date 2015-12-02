<?php
include('../include/session.php');

createSession();

function listCategory()
{
	$c_list = categoryNameList();
	$c_id = categoryIdList();
	$i = 0;

	foreach($c_list as $c_key => $c_value)
	{
		echo '<a href=".?id=' . $c_id[$i] . '">' . $c_value . '</a>';
		$i++;
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/categorie.css">
		<link rel="stylesheet" href="../style/input.css">
	</head>
	<body>
		<div id="container">
			<?php require('../include/head.php'); ?>
			<div id="main">
				<section>
				<?php
				if(isset($_SESSION['islogged'])):
				?>
					<form action="liste.php" method="POST">
						Ajouter une catégorie : 
						<input type="text" name="category_name" />
						<input type="submit" value="Ajouter" />
					</form>
					<br />
				<?php
				endif;

				for($i = 0; $i < 10; $i++):
				?>
					<a href=".?id=1">Categorie</a> 
				<?php
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
