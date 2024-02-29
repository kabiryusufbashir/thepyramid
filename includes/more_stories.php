<?php
	if(isset($_POST['post_id'])){
		$post_id = $_POST['post_id'];
		include '../includes/connect.inc.php';
		$query = $handler->query("SELECT * FROM `pn_post` WHERE `post_status` ='Publish'   && `id` < '$post_id' ORDER BY `id` DESC LIMIT 8");
			while($query_run = $query->fetch()){
					$post_id = $query_run['id'];
					$post_title = $query_run['post_title'];
					$post_content = $query_run['post_content'];
					$post_media = $query_run['post_media'];
					$post_category = strtoupper($query_run['post_category']);
						echo '<a title="'.$post_title.'" href="./view_story.php?post_id='.$post_id.'">';
						echo '<div class="col-quarter">';
						echo '<div class="head">'.$post_category.'</div>';
						echo	'<img src="'.$post_media.'">';
						echo '<div class="title">'.$post_title.'</div>';
						echo '</div>';
						echo '</a>';
			}
				$last_id = $handler->query("SELECT `id` FROM `pn_post` WHERE `post_status` ='Publish'  ORDER BY `id` ASC LIMIT 1");
						$id_no = $last_id->fetch();
							$last_id_no = $id_no['id'];
							$post_id;	
								if($post_id > $last_id_no){
							?>
							
			<input class="more_stories" post_id="<?php echo $post_id;?>" type="button" value="More Stories">
			<br /><br />
			<?php
								}
	}	
		?>