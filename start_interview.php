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
		
		<?php //include './includes/intro.inc.php'; ?>
		
		<?php include './includes/advert.inc.php'; ?>
		
		<div class="wrapper" style="background:#fff;">
			<div class="container">
				<div class="top_stories_2">
					<div id="top_stories_2">
						<?php
							include './includes/connect.inc.php';
								$query = $handler->query("SELECT * FROM `pn_post` WHERE `post_category`='Star Interview' && `post_status`!='Trash' ORDER BY `id` DESC LIMIT 1");
									if($query->rowCount() > 0){
										$query_run = $query->fetch();
										$post_id = $query_run['id'];
										$post_title = $query_run['post_title'];
										$post_content = $query_run['post_content'];
										$post_media = $query_run['post_media'];
										$post_author = strtoupper($query_run['post_author']);
											echo '<a title="'.$post_title.'" href="./view_story.php?post_id='.$post_id.'">';
											echo '<img title="'.$post_title.'" src="'.$post_media.'">';
											echo '<span style="position:relative; top:-5px;" class="post_title">'.$post_title .'</span>';
											echo '</a>';
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
				</div>
				
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="wrapper">
			<div class="container">
				<div id="news_content">
				<div style="border-top:1px solid #666;"><br /></div>
					<?php
						include './includes/connect.inc.php';
						$sql = $handler->query("SELECT * FROM `pn_post` WHERE `post_status` !='Trash' && `post_category`='Star Interview' ORDER BY `id` DESC LIMIT 6");
								if($sql->rowCount() > 0){
									while($sql_run = $sql->fetch()){
										$post_id = $sql_run['id'];
										$post_title = $sql_run['post_title'];
										$post_content = $sql_run['post_content'];
										$post_media = $sql_run['post_media'];
										$post_category = strtoupper($sql_run['post_category']);
											echo '<a title="'.$post_title.'" href="./view_story.php?post_id='.$post_id.'">';
											echo '<div id="middle_bar">';
											echo '<div class="head">'.$post_category.'</div>';
											echo	'<img src="'.$post_media.'">';
											echo '<div class="title">'.$post_title.'</div>';
											echo '</div>';
											echo '</a>';
									}
								
							$last_id = $handler->query("SELECT `id` FROM `pn_post` WHERE `post_status` !='Trash' && `post_category`='Star Interview' ORDER BY `id` ASC LIMIT 1");
								$id_no = $last_id->fetch();
									$last_id_no = $id_no['id'];
									$post_id;	
										if($post_id > $last_id_no){
									?>
									
					<input class="more_stories" post_id="<?php echo $post_id;?>" type="button" value="More Stories">
					
					<?php
										}
								}
					?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<?php include './includes/advert_2.inc.php'; ?>
		
		<?php include './includes/footer.inc.php'; ?>
		
		<?php include './includes/script_link.inc.php'; ?>
		
		<script type="text/javascript">
			//MORE STORIES	
			$(document).on('click', '.more_stories', function(){
				var post_id = $(this).attr('post_id');
					$('.more_stories').attr('Value', 'Loading...');
						$.ajax({
							url:'./includes/more_stories_star_interview.php',
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