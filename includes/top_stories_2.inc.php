<div id="view_story">
	<?php
		include './includes/connect.inc.php';
			$query = $handler->query("SELECT * FROM `pn_post` WHERE `id`='$post_id_view_story'");
				$query_run = $query->fetch();
				$post_id = $query_run['id'];
				$post_title = $query_run['post_title'];
				$post_content = $query_run['post_content'];
				$post_media = $query_run['post_media'];
				$post_author = strtoupper($query_run['post_author']);
				$post_date = strtotime($query_run['post_date']) + 3600;
				$date = date("g:i a", $post_date) .' on ' .date("j F Y", $post_date);
					echo '<img title="'.$post_title.'" src="'.$post_media.'">';
					echo '<span class="post_title">'.$post_title .'</span>';
					echo '<div class="post_content" style="background:#fff; margin-top:-4px; padding:5px 5px;">'.$post_content.'<br /><br />
						<span class="view_story_author">Posted by <b>ADMIN</b> at <b>'.$date.'</b><span>
						<a class="view_story_back" href="./index.php">HOME</a>
					</div>';
	?>
</div>

<?php include './includes/view_story_advert.php'; ?>
		