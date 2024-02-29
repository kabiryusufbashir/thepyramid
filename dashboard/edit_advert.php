<? session_start(); ?>

<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<?php
	if($_GET['advert_id']){
		$advert_id = $_GET['advert_id'];
			include '../includes/connect.inc.php';
				$sql = $handler->query("SELECT * FROM `pn_adverts_photo` WHERE `id`='$advert_id'");
					$sql_row = $sql->fetch();
					$id = $sql_row['id'];
					$title = $sql_row['title'];
					$category = $sql_row['category'];
					$media = $sql_row['path'];
					$advert_time = $sql_row['advert_time'];
					$advert_ends = $sql_row['advert_ends'];
					$status = $sql_row['post_status'];
	}else{
		include '../includes/redirect.inc.php';
	}
?>

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
							
						</div>
						<span class="act_head">Edit Advert</span><hr />
						<div class="act_body">
							<form action="../functions/change_media_advert.php" method="POST" enctype="multipart/form-data">
								<?php echo '<img id="change_image" title="Change Media" style="width:40%; cursor:pointer;" src=".'.$media.'">';?>
								<input name="post_media" type="input" value="<?php echo $media;?>" style="display:none;">
								<input name="advert_id" type="input" value="<?php echo $advert_id;?>" style="display:none;">
								<input name="c_image" id="file_tri" type="file" style="display:none;">
								<input name="submit" id="submit_tri" type="submit"  style="display:none;">
							</form>
							
							<form action="../functions/edit_advert_2.php" name="myform" id="myform" method="POST">
								<input style="display:none;" name="post_id" class="act_title_text" type="text" value="<?php echo $id; ?>"><br />
								
								<input name="post_title" class="act_title_text" type="text" value="<?php echo $title; ?>"><br />
								
								<span class="act_head">Category</span> &nbsp;&nbsp;&nbsp; 
									<select id="cate_select" name="category" class="cate_select">
										<option><?php echo $category; ?></option>
										<option>Below Navigation Bar</option>
										<option>Below Latest Update</option>
										<option>Below Columns</option>
										<option>Below Columns II</option>
									</select>
									<br /><br />
								<span class="act_head">Date Start</span> &nbsp;&nbsp;&nbsp; 
									<input name="date_start" class="act_title_text" type="date" value="<?php echo $advert_time; ?>"><br />
									<br /><br />
								<span class="act_head">Date Expiration</span> &nbsp;&nbsp;&nbsp; 
									<input name="date_expiry" class="act_title_text" type="date" value="<?php echo $advert_ends; ?>"><br />
									<br /><br />
								
								<span class="act_head">Post Status</span> 
									<select name="post_status" class="cate_select">
										<option><?php echo $status; ?></option>
										<option>Publish</option>
										<option>Save as Draft</option>
									</select>
									<br />
								<input name="myBtn" type="submit" class="act_pub" value="Edit" />
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
	<script type="text/javascript">
		$('#change_image').click(function(){
			$('#file_tri').trigger('click');
				$('#file_tri').change(function(){
					var file_name = $('#file_tri').val();
						if(file_name != ''){
							$('#submit_tri').trigger('click');	
						}else{
							$('#check').html('<b>Please try using another Image</b><hr />');
						}
				});
		});
		
	</script>
</html>