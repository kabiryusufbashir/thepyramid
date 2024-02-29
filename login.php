<? session_start(); ?>

<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Pyramid Newspaper</title>
		<link rel="stylesheet" type="text/css" href="./css/dashboard.css" />
		<link rel="Icon" type="image/ico" href="./images/favicon.ico" />
	</head>
	<body>
		
		<div id="form_login">	
			<?php
				include'./includes/connect.inc.php';
				include'./includes/confirmation.inc.php';
			?>
		</div>	
		
		<?php include './includes/script_link.inc.php'; ?>
		
	</body>
</html>