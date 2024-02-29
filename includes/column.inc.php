<div id="news_content">
			
	<?php
		echo '<div id="photo_news">Column</div>';
	?>
	
	<?php
		echo '<div class="col-one-three">';
		echo '<div class="head">Letters to the Editor</div>';
		include './includes/connect.inc.php';
			$sql = $handler->query("SELECT * FROM `pn_post` WHERE `post_category`='Letter to the Editor' && `post_status` !='Trash' ORDER BY `id` DESC LIMIT 1");
				$sql_run = $sql->fetch();
				$letter_id = $sql_run['id'];
				$letter_title = $sql_run['post_title'];
				$letter_image = $sql_run['post_media'];
		echo '<a style="text-decoration:none;" href="./encounters_with_kmg.php"><img title="'.$letter_title.'" src="'.$letter_image.'">';
		echo '<div class="title">'.$letter_title.'</div></a>';
		echo '</div>';
		
		echo '<div class="col-one-three">';
		echo '<div class="head">The Pyramid Editorial</div>';
			$sql_2 = $handler->query("SELECT * FROM `pn_post` WHERE `post_category`='The Pyramid Editorial' && `post_status` !='Trash' ORDER BY `id` DESC LIMIT 1");
				$sql_run_2 = $sql_2->fetch();
				$editorial_id = $sql_run_2['id'];
				$editorial_title = $sql_run_2['post_title'];
				$editorial_image = $sql_run_2['post_media'];
		echo '<a style="text-decoration:none;" href="./encounters_with_kmg.php"><img title="'.$editorial_title.'" src="'.$editorial_image.'">';
		echo '<div class="title">'.$editorial_title.'</div></a>';echo '</div>';
		
		echo '<div class="col-one-three">';
		echo '<div class="head">Encounters with KMG</div>';
			$sql_3 = $handler->query("SELECT * FROM `pn_post` WHERE `post_category`='Encounters with KMG' && `post_status` !='Trash' ORDER BY `id` DESC LIMIT 1");
				$sql_run_3 = $sql_3->fetch();
				$encounters_id = $sql_run_3['id'];
				$encounters_title = $sql_run_3['post_title'];
				$encounters_image = $sql_run_3['post_media'];
		echo '<a style="text-decoration:none;" href="./encounters_with_kmg.php"><img title="'.$encounters_title.'" src="'.$encounters_image.'">';
		echo '<div class="title">'.$encounters_title.'</div></a>';
		echo '</div>';
	?>	
</div>