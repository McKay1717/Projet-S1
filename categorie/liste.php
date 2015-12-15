<?php
include_once('../include/session.php');
include_once('../include/functionCatego.php');

createSession();



?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/categorie.css">
		<link rel="stylesheet" href="../style/input.css">
		<title>
			Liste des catégories
		</title>
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

				$ListCategoID = categoryIdList();
				$tmp = array();
				foreach ($ListCategoID as $value)
				{
					array_push($tmp, $value['id_Categorie']);
				}
				$ListCategoID = $tmp;
				unset($tmp);
				foreach ($ListCategoID as $id)
				{
					echo "<a href=\".?id=".$id."\">".GetCategoryNameByiD($id)."</a> ";
					echo '<br>';
				}
				?>
				</section>
			</div>
			<?php
			require('../include/foot.php');
			?>
		</div>
	</body>
</html>
