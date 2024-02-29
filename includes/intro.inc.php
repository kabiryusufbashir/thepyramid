<?php
	include './includes/connect.inc.php';
?>
<div id="intro">
	<div class="container">
		<?php
			$sql = $handler->query("SELECT `content` FROM `pn_about_us`");
				$sql_row = $sql->fetch();
				$content = $sql_row['content'];
					$half = substr($content, 0, 1437);
					echo $half;
		?>
		<a style="text-decoration:none;" href="./intro_complete.php">Read More...</a>
		<div class="clear"></div>
	</div>
</div>