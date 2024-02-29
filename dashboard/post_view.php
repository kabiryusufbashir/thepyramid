<? session_start(); ?>

<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">

	<?php include '../includes/head_2.inc.php';?>
	
	<body>
		<?php include '../includes/session.inc.php'; ?>
			
		<?php include '../includes/slogan_2.inc.php'; ?>
		
		<div style="background:#fff;" class="container">
			<div class="line_break" style="border-top:1px solid #666;"><br /></div>
				<div class="row">
				<div class="g-2">
					<?php include '../includes/nav_3.inc.php'; ?>
				</div>
				<div class="g-10">
					<?php
						include '../includes/connect.inc.php';
					?>

					<?php
						if(isset($_GET['post_id'])){
							$post_id = htmlentities($_GET['post_id']);
								if($query = $handler->query("SELECT * FROM `pn_post` WHERE `id`='$post_id'")){
									$count = $query->rowCount();
										if($count > 0){
											$query_row = $query->fetch();
											$post_title = $query_row['post_title'];
											$post_media = $query_row['post_media'];
											$post_content = stripslashes($query_row['post_content']);
											$post_author = $query_row['post_author'];
												echo 
													'<div id="post_view">
														<div class="heading">'.$post_title.'</div>
														<img src=".'.$post_media.'"><br />
														<div class="post_content" style="background:#fff; margin-top:-4px; padding:5px 0px;">'.$post_content.'</div><br />';
												echo '<br />';
												echo '<span><a class="view_story_back" href="./all_post.php">News</a><span>';
												echo '<span class="view_story_author">Posted by '.$post_author.'<span>';		
												echo	'</div>';	
										}else{
											echo '<script type="text/javascript">
													window.location = "./all_post.php";
												</script>';	
										}
								}else{
									echo 'Error: please try again...';
								}
						}
					?>	
				</div>	
			</div>
				<div class="clear"></div>
		</div>
		
		<?php include '../includes/footer_2.inc.php'; ?>
		
		<?php include '../includes/script_link_2.inc.php'; ?>
		
	</body>
</html>

<script type="text/javascript">
	$('.post_content').each(function () {
		$(this).css('height', + this.scrollHeight + 'px');
		$(this).css('max-height', + this.scrollHeight + 'px');
	});
</script>