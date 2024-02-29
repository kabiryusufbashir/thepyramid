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
								if($query = $handler->query("SELECT * FROM `pn_adverts_photo` WHERE `id`='$post_id'")){
									$count = $query->rowCount();
										if($count > 0){
											$query_row = $query->fetch();
											$post_title = $query_row['title'];
											$advert_time = $query_row['advert_time'];
											$advert_time_to = strtotime($advert_time) + 3600;
											$advert_time_to = date('j F, Y', $advert_time_to);
											$advert_ends = $query_row['advert_ends'];
											$advert_ends_to = strtotime($advert_ends) + 3600;
											$advert_ends_to = date('j F, Y', $advert_ends_to);
											$post_media = $query_row['path'];
												echo 
													'<div id="post_view">
														<div class="heading">'.$post_title.'</div>
														<h2>Adverts Start: '.$advert_time_to.'</h2>
														<h2>Adverts Ends: '.$advert_ends_to.'</h2>
												
														<center><img style="width:50%;" src=".'.$post_media.'"></center><br />';
												echo '<br />';
												echo '<span><a class="view_story_back" href="./all_adverts.php">Back</a><span>';
												echo '</div>';	
										}else{
											echo '<script type="text/javascript">
													window.location = "./all_adverts.php";
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