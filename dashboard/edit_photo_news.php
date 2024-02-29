<? session_start(); ?>

<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<?php
	if($_GET['post_id']){
		$post_id = $_GET['post_id'];
			include '../includes/connect.inc.php';
				$sql = $handler->query("SELECT * FROM `pn_photo_news` WHERE `id`='$post_id'");
					$sql_row = $sql->fetch();
					$id = $sql_row['id'];
					$title = $sql_row['title'];
					$media = $sql_row['image'];
					$date = $sql_row['time_added'];
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
						<span class="act_head">Edit Photo News</span><hr />
						<div class="act_body">
							<form action="../functions/change_photo_news.php" method="POST" enctype="multipart/form-data">
								<?php echo '<img id="change_image" title="Change Media" style="width:40%; cursor:pointer;" src=".'.$media.'">';?>
								<input name="post_media" type="input" value="<?php echo $media;?>" style="display:none;">
								<input name="post_id" type="input" value="<?php echo $post_id;?>" style="display:none;">
								<input name="c_image" id="file_tri" type="file" style="display:none;">
								<input name="submit" id="submit_tri" type="submit"  style="display:none;">
							</form>
							
							<form action="../functions/edit_photo_news.php" name="myform" id="myform" method="POST">
								<input name="title" class="act_title_text" type="text" value="<?php echo $title; ?>"><br />
								<input name="id" class="act_title_text" type="text" value="<?php echo $id; ?>" style="display:none;"><br />
								<input name="date" class="act_title_text" type="text" value="<?php echo $date; ?>" style="display:none;"><br />
								<input name="media" class="act_title_text" type="text" value="<?php echo $media; ?>" style="display:none;"><br />
								<input name="myBtn" type="submit" class="act_pub" value="Edit" onClick="javascript:submit_form();"/>
							</form>
						</div>
					</div>
				</div>	
			</div>
				<div class="clear"></div>
		</div>
		
		<?php include '../includes/footer_2.inc.php'; ?>
		
		<?php include '../includes/script_link_2.inc.php'; ?>
		
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
		
	</body>
</html>