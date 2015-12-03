<?php
include_once("../include/functionCatego.php");
include('../include/session.php');

createSession();

//if(!isLoged())
//	header('Location: ../');

if(isset($_POST['title']) && isset($_POST['article_content']))
{
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
				<section>
					<form action="nouveau.php" method="POST">
						Titre :<br>
						<input type="text" name="title">

						<br><br>Contenu :<br>
						<textarea name="message"
								  class="ckeditor"
								  id="message"
								  required">
                		</textarea>
							<div>
							<?php
							categorySelect(); ?>
							</div>

						<br><br>
						<input type="submit" value="Valider">
					</form>
				</section>
			</div>
		<?php
		require('../include/foot.php');
		?>
		</div>
	</body>
</html>
