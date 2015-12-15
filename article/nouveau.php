<?php
include_once("../include/createTicket.php");
include_once("../include/functionCatego.php");
include_once('../include/session.php');

createSession();

//	header('Location: ../');

if(isset($_POST['title']) && isset($_POST['article_content']))
{
	newArticle(htmlentities($_POST['title']), htmlentities($_POST['article_content']), htmlentities($_POST['category_select']));
	header('Location: ../recents/');
}

function categorySelect()
{
	$c_name = categoryNameList();
	$c_id = categoryIdList();

	echo '<br>';
?>
	Categorie :
	<select name="category_select">
<?php



	for($i = 0; $i < count($c_id); $i++)
	{
		echo '<option value="' . $c_id[$i]['id_Categorie']. '">' . $c_name[$i]['intitule_Categorie'] . '</option>';
	}

?>
	</select>
<?php	
}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/input.css">

		<script src="/ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<div id="container">
			<?php require('../include/head.php'); ?>
			<div id="main">
				<?php if(isLoged()): ?>
				<section>
					<form action="nouveau.php" method="POST">
						Titre :<br>
						<input type="text"
							   name="title">

						<br><br>Contenu :<br>
						<textarea name="article_content"
								  class="ckeditor"
								  id="article_content"
								  required">
                		</textarea>
							<div>
								<?php categorySelect(); ?>
							</div>

						<br><br>
						<input type="submit"
							   value="Valider">
					</form>
				</section>
				<?php else: ?>
				<section>
					<h1>
					Vous devez être connecté.
					</h1>
				</section>

				<?php endif; ?>
			</div>
		<?php
			require('../include/foot.php');
		?>
		</div>
	</body>
</html>
