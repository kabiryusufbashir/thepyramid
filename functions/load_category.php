<?php
	function loadCategory($newsCategory){
		include './includes/connect.inc.php';
			$sql = $handler->query("SELECT * FROM `pn_post` WHERE `post_status` !='Trash' && `post_category`='$newsCategory' ORDER BY `id` DESC LIMIT 8");
					if($sql->rowCount() > 0){
						while($sql_run = $sql->fetch()){
							$post_id = $sql_run['id'];
							$post_title = $sql_run['post_title'];
							$post_content = $sql_run['post_content'];
							$post_media = $sql_run['post_media'];
							$post_category = strtoupper($sql_run['post_category']);
								echo '<a title="'.$post_title.'" href="./view_story.php?post_id='.$post_id.'">';
								echo '<div class="col-quarter">';
								echo '<div class="head">'.$post_category.'</div>';
								echo	'<img src="'.$post_media.'">';
								echo '<div class="title">'.$post_title.'</div>';
								echo '</div>';
								echo '</a>';
						}
					
				$last_id = $handler->query("SELECT `id` FROM `pn_post` WHERE `post_status` !='Trash' && `post_category`='$newsCategory' ORDER BY `id` ASC LIMIT 1");
					$id_no = $last_id->fetch();
						$last_id_no = $id_no['id'];
						$post_id;	
							if($post_id > $last_id_no){
						?>
						
		<input class="more_stories" post_id="<?php echo $post_id;?>" type="button" value="More Stories">

		<?php
							}
					}else{
						echo '<h1 class="post_title"><center>No Post Found...</center></h1>';
							echo '<script type="text/javascript">
									function counter(time, url){
										var interval = setInterval(function(){
											time = time - 1;
													if(time == 0){
														clearInterval(interval);
														window.location = url;
													}
										}, 1000)
									}
									counter(5, "./index.php");
								</script>';
					}	
	}
?>