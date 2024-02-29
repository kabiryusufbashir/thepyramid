<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">

	<?php include './includes/head.inc.php';?>
	
	<body>
		<?php include './includes/slogan.inc.php'; ?>
		
		<?php include './includes/nav.inc.php'; ?>
		
		<?php include './includes/connect.inc.php'; ?>
		
		<div class="col-half">
			<?php
				$sql = $handler->query("SELECT `content` FROM `pn_adverts`");
					$sql_row = $sql->fetch();
					$content = $sql_row['content'];
						echo $content;
			?>
		</div>
		
		<?php include './includes/view_story_advert.php'; ?>
		
		<?php include './includes/footer.inc.php'; ?>
		
		<?php include './includes/script_link.inc.php'; ?>
		
	</body>
</html>