<?php
include("include/function-login.php");
if(isset($_POST['user']) && isset($_POST['pass']) && 
login($_POST['user'], $_POST['pass']))
	header('Location: .');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/base.css">
		<link rel="stylesheet" href="style/input.css">
	</head>
	<body>
		<div id="container">
			<?php require('head.php'); ?>
			<div id="main">
				<section>
					<form id="connect" action="connect.php" method="POST">
						Nom d'utilisateur :<br />
						<input type="text" name="user" />

						<br /><br />
						Mot de passe :<br />
						<input type="password" name="pass" />

						<br /><br />
						<input type="submit" value="Connexion" />
					</form>
				</section>
			</div>
		<?php
		require('foot.php');
		?>
		</div>
	</body>
</html>
