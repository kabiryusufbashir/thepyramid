<div id="latest_update">
	<span class="update_head">Latest Update</span>
	<span class="update_content">
		<marquee scrollamount="3">
			<?php
				include './includes/connect.inc.php';
				$sql = $handler->query("SELECT `id`, `post_title` FROM `pn_post` WHERE `post_status`='Publish' ORDER BY `id` DESC LIMIT 10");
					while($title_row = $sql->fetch()){
						$id = $title_row['id'];
						$title = $title_row['post_title'];
							echo '<a href="./view_story.php?post_id='.$id.'">'.$title .'...</a> &nbsp;&nbsp; 
							';
					} 
			?>
		</marquee>
	</span>
</div>