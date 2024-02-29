<div id="news_content">
	<div id="photo_news">Photo News Gallery</div>
	<div class="col-half">
		<?php
			include './includes/connect.inc.php';
				$query = $handler->query("SELECT * FROM `pn_photo_news` ORDER BY `id` DESC LIMIT 3");
					while($query_row = $query->fetch()){
						$photo = $query_row['image'];
						$title = $query_row['title'];
							echo '<div class="col-full">';
							echo	'<img src="'.$photo.'">';
							echo '<div style="background:#f6f6f6; color:#000;" class="title">'.$title.'</div>';
							echo '</div>';
					}
		?>
	</div>
	<div class="col-half">
		<div class="col-half">
			<?php
				include './includes/adverts_below_columns.php';
			?>
		</div>
		<div class="col-half">
			<?php
				include './includes/adverts_below_columns_2.php';
			?>
		</div>
	</div>	
</div>