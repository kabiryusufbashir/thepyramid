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
		
		<div id="news_content">
			<div style="border-top:1px solid #666;"><br /></div>
			<?php
				include './includes/connect.inc.php';
				$sql = $handler->query("SELECT * FROM `pn_photo_news` ORDER BY `id` DESC LIMIT 12");
						if($sql->rowCount() > 0){
							while($sql_run = $sql->fetch()){
								$post_id = $sql_run['id'];
								$post_title = $sql_run['title'];
								$post_media = $sql_run['image'];
									echo '<a title="'.$post_title.'" href="#">';
									echo '<div class="col-one-three">';
									echo	'<img src="'.$post_media.'">';
									echo '<div class="title">'.$post_title.'</div>';
									echo '</div>';
									echo '</a>';
							}
						
					$last_id = $handler->query("SELECT `id` FROM `pn_photo_news` ORDER BY `id` ASC LIMIT 1");
						$id_no = $last_id->fetch();
							$last_id_no = $id_no['id'];
							$post_id;	
								if($post_id > $last_id_no){
							?>
							
			<input class="more_stories" post_id="<?php echo $post_id;?>" type="button" value="More Stories">
			
			<?php
								}
						}else{
							echo '<span class="post_title">No post found...</span>';
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
			?>
		</div>
		
		<?php include './includes/footer.inc.php'; ?>
		
		<?php include './includes/script_link.inc.php'; ?>
		
		<script type="text/javascript">
			//MORE STORIES	
			$(document).on('click', '.more_stories', function(){
				var post_id = $(this).attr('post_id');
					$('.more_stories').attr('Value', 'Loading...');
						$.ajax({
							url:'./includes/more_stories_photo_news.php',
							method:'POST',
							data:{post_id:post_id},
							dataType:'text',
							success:function(data){
								if(data != null){
									$('.more_stories').remove();
									$('#news_content').append(data);
								}else{
									$('.more_stories').attr('Value', 'No more news');
								}
							}
						});
		   });
		//END OF MORE STORIES	
		</script>	
	</body>
</html>