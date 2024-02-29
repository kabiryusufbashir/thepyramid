<? session_start(); ?>

<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<?php
	if($_GET['post_id']){
		$post_id = $_GET['post_id'];
			include '../includes/connect.inc.php';
				$sql = $handler->query("SELECT * FROM `pn_post` WHERE `id`='$post_id'");
					$sql_row = $sql->fetch();
					$id = $sql_row['id'];
					$title = $sql_row['post_title'];
					$content = $sql_row['post_content'];
					$category = $sql_row['post_category'];
					$media = $sql_row['post_media'];
					$author = $sql_row['post_author'];
					$status = $sql_row['post_status'];
					$date = $sql_row['post_date'];
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
						<span class="act_head">Edit Post</span><hr />
						<div class="act_body">
							<form action="../functions/change_media.php" method="POST" enctype="multipart/form-data">
								<?php echo '<img id="change_image" title="Change Media" style="width:40%; cursor:pointer;" src=".'.$media.'">';?>
								<input name="post_media" type="input" value="<?php echo $media;?>" style="display:none;">
								<input name="post_id" type="input" value="<?php echo $post_id;?>" style="display:none;">
								<input name="c_image" id="file_tri" type="file" style="display:none;">
								<input name="submit" id="submit_tri" type="submit"  style="display:none;">
							</form>
							
							<form action="../functions/edit_post.php" name="myform" id="myform" method="POST">
								<input name="post_title" class="act_title_text" type="text" value="<?php echo $title; ?>"><br />
								
								<p>
									<div id="wysiwyg_cp">
									  <input class="btn" type="button" onClick="iBold()" value="Bold"> 
									  <input class="btn" type="button" onClick="iUnderline()" value="Underline">
									  <input class="btn" type="button" onClick="iItalic()" value="Italic">
									  <input class="btn" type="button" onClick="iFontSize()" value="Font Size">
									  <input class="btn" type="button" onClick="iForeColor()" value="Font Color">
									  <input class="btn" type="button" onClick="iHorizontalRule()" value="Horizontal Rule">
									  <input class="btn" type="button" onClick="iUnorderedList()" value="Unorder List">
									  <input class="btn" type="button" onClick="iOrderedList()" value="Order List">
									</div>
									<!-- Hide(but keep)your normal textarea and place in the iFrame replacement for it -->
									<textarea style="display:none;" name="post" id="myTextArea" cols="100" rows="14"></textarea>
									<textarea style="display:none;" id="content" cols="100" rows="14"><?php echo $content;?></textarea>
									<textarea style="display:none;" name="id" cols="100" rows="14"><?php echo $id;?></textarea>
									<textarea style="display:none;" name="media" cols="100" rows="14"><?php echo $media;?></textarea>
									<textarea style="display:none;" name="author" cols="100" rows="14"><?php echo $author;?></textarea>
									<textarea style="display:none;" name="date" cols="100" rows="14"><?php echo $date;?></textarea>
									<iframe name="richTextField" id="richTextField"></iframe>
									<!-- End replacing your normal textarea -->
								</p>
								
								<span class="act_head">Category</span> &nbsp;&nbsp;&nbsp; 
									<select id="cate_select" name="category" class="cate_select">
										<option><?php echo $category; ?></option>
										<option>Analysis</option>
										<option>Economy</option>
										<option>Encounters with KMG</option>
										<option>Education</option>
										<option>Guest Column</option>
										<option>Health</option>
										<option>International</option>
										<option>Letter to the Editor</option>
										<option>News</option>
										<option>Opinions</option>
										<option>Politics</option>
										<option>Views</option>
										<option>Religion & Culture</option>
										<option>Sport</option>
										<option>Technology</option>
										<option>The Pyramid Editorial</option>
										<option>Top Stories</option>
									</select>
									<br /><br />
								<span class="act_head">Post Status</span> 
									<select name="post_status" class="cate_select">
										<option><?php echo $status; ?></option>
										<option>Publish</option>
										<option>Save as Draft</option>
									</select>
									<br />
								<input name="myBtn" type="button" class="act_pub" value="Edit" onClick="javascript:submit_form();"/>
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
		
		function iFrameOn(){
			richTextField.document.designMode = 'On'; 
			var cate = $('#content').val();
			richTextField.document.write(cate);
		}
		
		function iBold(){
			richTextField.document.execCommand('bold',false,null); 
		}
		
		function iUnderline(){
			richTextField.document.execCommand('underline',false,null);
		}
		
		function iItalic(){
			richTextField.document.execCommand('italic',false,null); 
		}
		
		function iFontSize(){
			var size = prompt('Enter a size 1 - 7', '');
			richTextField.document.execCommand('FontSize',false,size);
		}
		
		function iForeColor(){
			var color = prompt('Define a basic color or apply a hexadecimal color code for advanced colors:', '');
			richTextField.document.execCommand('ForeColor',false,color);
		}
		
		function iHorizontalRule(){
			richTextField.document.execCommand('inserthorizontalrule',false,null);
		}
		
		function iUnorderedList(){
			richTextField.document.execCommand("InsertOrderedList", false,"newOL");
		}
		
		function iOrderedList(){
			richTextField.document.execCommand("InsertUnorderedList", false,"newUL");
		}
		
		function submit_form(){
			var theForm = document.getElementById("myform");
			theForm.elements["myTextArea"].value = window.frames['richTextField'].document.body.innerHTML;
			theForm.submit();
		}
	</script>
</html>