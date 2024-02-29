<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<?php
	if(isset($_GET['post_id'])){
		$post_id_view_story = $_GET['post_id'];
			include './includes/connect.inc.php';
			$count = $handler->query("SELECT * FROM `pn_post` WHERE `id`='$post_id_view_story'");
				if($count->rowCount() > 0){}else{
					echo '<script type="text/javascript">
						window.location = "./index.php";
					</script>';
				}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">

	<?php include './includes/head.inc.php';?>
	
	<body>
		<?php include './includes/slogan.inc.php'; ?>
		
		<?php include './includes/nav.inc.php'; ?>
		
		<?php include './includes/top_stories_2.inc.php'; ?>	
		
		<?php include './includes/news.inc.php'; ?>
		
		<?php include './includes/footer.inc.php'; ?>
		
		<?php include './includes/script_link.inc.php'; ?>
		
	</body>
</html>