<?php
function displayMinArticle($id, $name, $content, $dir)
{
	$link = $dir . 'article/?id=' . $id;
?>
	<a href="<?php echo $link; ?>" class="pub_link">
		<h2><?php echo $name; ?></h2>
		<p><?php echo html_entity_decode($content); ?></p>
	</a>
<?php
}
?>
