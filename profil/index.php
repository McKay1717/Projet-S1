<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="../style/base.css">
		<link rel="stylesheet" href="../style/profil.css">
	</head>
	<body>
		<div id="container">
			<?php
			require('../head.php');
//			require('../nav.php');
			?>
			<div id="main">
				<section>
					<div id="profil">
						<h2>Pierre-Paul Jacques</h2>
						<img src="../img/user.png" />
					</div>

					<hr />

					<div id="publications">
						<h3>Publications</h3>

<?php
for($i = 0; $i < 10; $i++):
?>
						<a href="../article">
							<h1>Article <?php echo ($i + 1)?></h1>
							<p>Blabla blablabla blabla blablabla bla blablabla bla</p>
						</a>
<?php
endfor;
?>
					</div>
				</section>
			</div>
			<?php
			require('../foot.php');
			?>
		</div>
	</body>
</html>
