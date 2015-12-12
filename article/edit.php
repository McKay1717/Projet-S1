<?php
include_once("../include/createTicket.php");
include_once("../include/functionCatego.php");
include_once('../include/session.php');

createSession();

//	header('Location: ../');

if (isset($_POST['article_content']) && isset($_GET['id']))
{
	editArticle(htmlentities($_GET['id']), htmlentities($_POST['article_content']));
	setArticleCategory(htmlentities($_GET['id']), htmlentities($_POST['category_select']));
	header('Location: ../article/?id='.htmlentities($_GET['id']));
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

	$currentCatego = getArticleCategory(htmlentities($_GET['id']))[0]['Categorie_Article'];
	for($i = 0; $i < count($c_id); $i++)
	{
		if($currentCatego != $c_id[$i]['id_Categorie'])
		{
			echo '<option value="' . $c_id[$i]['id_Categorie']. '">' . $c_name[$i]['intitule_Categorie'] . '</option>';
		}else {
			echo '<option selected value="' . $c_id[$i]['id_Categorie']. '">' . $c_name[$i]['intitule_Categorie'] . '</option>';
		}
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
				<?php if(isLoged() && isset($_GET['id'])): ?>
				<section>
					<form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
						Titre :<br>
						<?php echo getArticleTitle(htmlentities($_GET['id']));?>

						<br><br>Contenu :<br>
						<textarea name="article_content"
								  class="ckeditor"
								  id="article_content"
								  required">
							<?php echo html_entity_decode(getArticleCT(htmlentities($_GET['id'])));?>
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
					Une erreur est survenu
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
