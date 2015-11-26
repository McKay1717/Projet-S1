<?php
if(preg_match('#/Projet-S1$#', getcwd()))
	$dir = '';
else
	$dir = '../';

if(preg_match('#/Projet-S1/(.+)\.php$#', $_SERVER['REQUEST_URI']) && 
!preg_match('#/Projet-S1/(.+)/(.+)\.php#', $_SERVER['REQUEST_URI']))
	$home_link = '.';
else
	$home_link = $dir;

include ($dir . 'include/function-login.php');

function usrProfil($dir)
{
	if(isLoged())
	{
		$link = $dir . 'profil/';
		$img = $dir . 'img/user.png';
	}
	else
	{
		$link = $dir . 'connect.php';
		$img = $dir . 'img/login.png';
	}
?>
	<a href="<?php echo $link; ?>">
		<img id="usr_img" src="<?php echo $img; ?>">
	</a>
<?php
}
?>

<header>
	<script language="javascript" type="text/javascript" src="js/nav.js"></script>

	<div id="usr">
		<?php usrProfil($dir); ?>
	</div>
	<div id="site_title">
		<h1><a href="<?php echo $home_link; ?>">Titre du blog</a></h1>
	</div>
	<div id="search">
		<form action="<?php echo $dir; ?>recherche.php">
			<input type="text" name="search" />
			<input type="submit" value="OK" />
		</form>
	</div>
</header>

