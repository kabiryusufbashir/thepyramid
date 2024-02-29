<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
	Date:->Edited 13th of July 2019
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">
	
	<?php include './includes/head.inc.php';?>
	
	<?php
		include './includes/connect.inc.php';
		include './includes/browser_name.inc.php';
		include './includes/os_name.inc.php';
		include './includes/ip_add.inc.php';
		$stmt = $handler->prepare("INSERT INTO `pn_visit_log`(os_name, browser_name, ip_address) VALUES(?,?,?)");
			$stmt->bindValue(1, $os_name);
			$stmt->bindValue(2, $browser_name);
			$stmt->bindValue(3, $ip_address);
			$stmt->execute();
	
	?>
	
	<body>
		<?php include './includes/slogan.inc.php'; ?>
		
		<?php include './includes/nav.inc.php'; ?>
			
		<?php include './includes/latest_update.inc.php'; ?>
		
		<?php include './includes/top_stories.inc.php'; ?>	
		
		<?php include './includes/news.inc.php'; ?>
		
		<?php include './includes/column.inc.php'; ?>
		
		<?php include './includes/photo_gallery.inc.php'; ?>
		
		<?php include './includes/footer.inc.php'; ?>
		
		<?php include './includes/script_link.inc.php'; ?>
		
	</body>
</html>