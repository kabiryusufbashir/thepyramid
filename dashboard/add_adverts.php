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
									if(isset($_POST['add_advert_btn'])){
										if(isset($_POST['post_title'], $_POST['post_category'], $_POST['date_start'], $_POST['date_expiry'], $_POST['post_status'])){
											$post_title = stripslashes($_POST['post_title']);
											$post_category = stripslashes($_POST['post_category']);
											$date_start = stripslashes($_POST['date_start']);
											$date_expiry = stripslashes($_POST['date_expiry']);
											$post_status = stripslashes($_POST['post_status']);
											$post_media_name = htmlentities($_FILES['post_media']['name']);	
											$post_media_size = htmlentities($_FILES['post_media']['size']);	
											$post_media_type = htmlentities($_FILES['post_media']['type']);	
											$post_media_tmp_name = htmlentities($_FILES['post_media']['tmp_name']);
											$post_media_name_ext = strtolower(substr($post_media_name, strpos($post_media_name, '.') +1));
											$new_name = date("Ynjgi").'.'.$post_media_name_ext;
											$path = './images/media/adverts/'.$new_name;
												if(!empty($post_media_name)){
													if(!empty($post_title)){
														if(!empty($post_category)){
															if(!empty($date_start)){
																if(!empty($date_expiry)){
																	if(!empty($post_status)){
																		if($post_media_name_ext == 'jpg' || $post_media_name_ext == 'jpeg' || $post_media_name_ext == 'png' || $post_media_name_ext == 'gif'){
																			if($post_media_type == 'image/jpeg' || $post_media_type == 'image/png' || $post_media_type == 'image/jpg' || $post_media_type == 'image/gif'){
																				$location = '../images/media/adverts/'.$new_name;
																					if(move_uploaded_file($post_media_tmp_name, $location)){
																						include '../includes/connect.inc.php';
																							$stmt = $handler->prepare("INSERT INTO `pn_adverts_photo`(category, path, advert_time, advert_ends, post_status, title) VALUES(?, ?, ?, ?, ?, ?)");
																								$stmt->bindValue(1, $post_category);
																								$stmt->bindValue(2, $path);
																								$stmt->bindValue(3, $date_start);
																								$stmt->bindValue(4, $date_expiry);
																								$stmt->bindValue(5, $post_status);
																								$stmt->bindValue(6, $post_title);
																								$stmt->execute();
																								echo '<b>Post published...</b><hr />';
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
																										counter(3, "../dashboard/add_adverts.php");
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
																		echo '<b>Advert Status not selected!</b><hr />';
																	}	
																}else{
																	echo '<b>Date Expiration not selected!</b><hr />';
																}
															}else{
																echo '<b>Date Start not selected!</b><hr />';
															}
														}else{
															echo '<b>Post category not selected!</b><hr />';
														}
													}else{
														echo 'Advert Title field empty';
													}
												}else{
													echo '<b>Photo not selected!</b><hr />';
												}
										}
									}
							?>
						</div>
						<span class="act_head">Add New Advert</span><hr />
						<div class="act_body">
							<form  style="background:#fff;" action="add_adverts.php" name="myform" id="myform" method="POST" enctype="multipart/form-data">
								
								<label for="advert_title"><span class="act_head">Advert Title</span></label>
								
								<input name="post_title" class="act_title_text" type="text"><br /><br />
								
								<span class="act_head">Select Photo</span> &nbsp;&nbsp;&nbsp; 
								
								<input name="post_media" class="act_title_btn" type="file"><br /><br />
								
								<span class="act_head">Category</span> &nbsp;&nbsp;&nbsp; 
									<select name="post_category" class="cate_select">
										<option></option>
										<option>Below Navigation Bar</option>
										<option>Below Latest Update</option>
										<option>Below Columns</option>
										<option>Below Columns II</option>
									</select>
									<br /><br />
								<span class="act_head">Date Start</span> &nbsp;&nbsp;&nbsp; 
									<input name="date_start" class="act_title_text" type="date"><br />
									<br /><br />
								<span class="act_head">Date Expiration</span> &nbsp;&nbsp;&nbsp; 
									<input name="date_expiry" class="act_title_text" type="date"><br />
									<br /><br />
								<span class="act_head">Advert Status</span> 
									<select name="post_status" class="cate_select">
										<option></option>
										<option>Publish</option>
										<option>Save as Draft</option>
									</select>
									<br />
								<input name="add_advert_btn" type="submit" class="act_pub" value="Post"/>
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