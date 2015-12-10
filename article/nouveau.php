<?php
include_once_once("../include/createTicket.php");
include_once_once("../include/functionCatego.php");
include_once('../include/session.php');

createSession();

//	header('Location: ../');

if(isset($_POST['title']) && isset($_POST['article_content']))
{
	echo $_POST['title'].'  '.$_POST['article_content'].'  '.$_POST['category_select'];
	newArticle($_POST['title'], $_POST['article_content'], $_POST['category_select']);
	header('Location: ../recent/');
}

function categorySelect()
{
	$c_name = categoryNameList();
	$c_id = categoryIdList();
	$i = 0;

	echo '<br>';
?>
	Categorie :
	<select name="category_select">
		<option value="">Pas de catégorie</option>
<?php



	foreach($c_name as $c_key => $c_value)
	{
		echo '<option value="' . $c_id[$i] . '">' . $c_value . '</option>';
		$i++;
	}

?>
	</select>
<?php	
}
?>

<!DOCTYPE html>
<html>
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
