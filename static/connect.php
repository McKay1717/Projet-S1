<?php
include_once('include/function-login.php');

if(isset($_POST['usr_name']) && isset($_POST['pass']) && 
login(htmlentities($_POST['usr_name']), htmlentities($_POST['pass'])))
	header('Location: .');

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/input.css">
		<title>Connexion</title>
	</head>
	<body>
		<div id="container">
			<?php require('../include/head.php'); ?>
			<div id="main">
				<section>
					<form id="connect" action="connect.php" method="POST">
						Nom d'utilisateur :<br />
						<input type="text" name="usr_name" />

						<br /><br />
						Mot de passe :<br />
						<input type="password" name="pass" />

						<br /><br />
						<input type="submit" value="Connexion" />
					</form>
				</section>
			</div>
		<?php
		require('../include/foot.php');
		?>
		</div>
	</body>
</html>
