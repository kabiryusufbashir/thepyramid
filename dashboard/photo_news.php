<? session_start(); ?>

<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">

	<?php include '../includes/head_2.inc.php';?>
	
	<body onLoad="iFrameOn();">
		<?php include '../includes/session.inc.php'; ?>
		
		<?php include '../includes/slogan_2.inc.php'; ?>
		
		<div style="background:#fff;" class="container">
			<div class="line_break" style="border-top:1px solid #666;"><br /></div>
			<div class="row">
				<div class="g-2">
					<?php include '../includes/nav_3.inc.php'; ?>
				</div>
				
				<div class="g-10">
					<div class="activity">
						<div id="feed_back">
							<?php
								include '../includes/connect.inc.php';
								if(isset($_POST['add_photo'])){
 									$post_title = stripslashes($_POST['post_title']);	
									$post_media_name = htmlentities($_FILES['post_media']['name']);	
									$post_media_size = htmlentities($_FILES['post_media']['size']);	
									$post_media_type = htmlentities($_FILES['post_media']['type']);	
									$post_media_tmp_name = htmlentities($_FILES['post_media']['tmp_name']);
									$post_media_name_ext = strtolower(substr($post_media_name, strpos($post_media_name, '.') +1));
									$new_name = date("Ynjgi").'.'.$post_media_name_ext;
									$path = './images/media/images/'.$new_name;
										if(!empty($post_title)){
											if(!empty($post_media_name)){
												if($post_media_name_ext == 'jpg' || $post_media_name_ext == 'jpeg' || $post_media_name_ext == 'png' || $post_media_name_ext == 'gif'){
													if($post_media_type == 'image/jpeg' || $post_media_type == 'image/png' || $post_media_type == 'image/jpg' || $post_media_type == 'image/gif'){
														$location = '../images/media/images/'.$new_name;
															if(move_uploaded_file($post_media_tmp_name, $location)){
																include '../includes/connect.inc.php';
																	$stmt = $handler->prepare("INSERT INTO `pn_photo_news`(title, image) VALUES(?, ?)");
																		$stmt->bindValue(1, $post_title);
																		$stmt->bindValue(2, $path);
																		$stmt->execute();
																		echo '<b>Photo posted...</b><hr />';
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
																				counter(3, "../dashboard/index.php");
																			</script>';
															}else{
																echo '<b>Error: Please try again...</b><hr />';
															}
													}else{
														echo '<b>Please choose a photo only...</b><hr />';
													}
												}else{
													echo '<b>The file must be an Image...</b><hr />';
												}
											}else{
												echo '<b>Media not selected!</b><hr />';
											}
										}else{
											echo '<b>Photo News Title empty...</b><hr />';
										}
 									}
							?>
						</div>
						<span class="act_head">Add New Photo News</span><hr />
						<div class="act_body">
							<form style="background:#fff;" action="photo_news.php" method="POST" enctype="multipart/form-data">
								<input name="post_title" class="act_title_text" type="text" placeholder="Enter title here"><br />
								<input name="post_media" class="act_title_btn" type="file"><br />
								<input name="add_photo" type="submit" class="act_pub" value="Add Photo"/>
							</form>
						</div>
					</div>
				</div>	
			</div>
				<div class="clear"></div>
		</div>
		
		<?php include '../includes/footer_2.inc.php'; ?>
		
		<?php include '../includes/script_link_2.inc.php'; ?>
		
	</body>
</html>