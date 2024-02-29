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
								if(isset($_POST['post_title'], $_POST['post'], $_POST['post_status'], $_POST['post_category'])){
										$post_title = stripslashes($_POST['post_title']);	
										$post = stripslashes($_POST['post']);
										$post_status = htmlentities($_POST['post_status']);	
										$post_category = stripslashes($_POST['post_category']);
										$post_media_name = htmlentities($_FILES['post_media']['name']);	
										$post_media_size = htmlentities($_FILES['post_media']['size']);	
										$post_media_type = htmlentities($_FILES['post_media']['type']);	
										$post_media_tmp_name = htmlentities($_FILES['post_media']['tmp_name']);
										$post_media_name_ext = strtolower(substr($post_media_name, strpos($post_media_name, '.') +1));
										$new_name = date("Ynjgi").'.'.$post_media_name_ext;
										$path = './images/media/images/'.$new_name;
											if(!empty($post_title)){
												if(!empty($post_media_name)){
													if(!empty($post)){
														if(!empty($post_category)){
															if(!empty($post_status)){
																if($post_media_name_ext == 'jpg' || $post_media_name_ext == 'jpeg' || $post_media_name_ext == 'png' || $post_media_name_ext == 'gif'){
																	if($post_media_type == 'image/jpeg' || $post_media_type == 'image/png' || $post_media_type == 'image/jpg' || $post_media_type == 'image/gif'){
																		$location = '../images/media/images/'.$new_name;
																			if(move_uploaded_file($post_media_tmp_name, $location)){
																				include '../includes/connect.inc.php';
																					$stmt = $handler->prepare("INSERT INTO `pn_post`(post_title, post_content, post_category, post_media, post_author, post_status) VALUES(?, ?, ?, ?, ?, ?)");
																						$stmt->bindValue(1, $post_title);
																						$stmt->bindValue(2, $post);
																						$stmt->bindValue(3, $post_category);
																						$stmt->bindValue(4, $path);
																						$stmt->bindValue(5, $user_name);
																						$stmt->bindValue(6, $post_status);
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
																								counter(3, "../dashboard/new_post.php");
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
																echo '<b>Post status not selected!</b><hr />';
															}
														}else{
															echo '<b>Post category not selected!</b><hr />';
														}
													}else{
														echo '<b>Post field empty...</b><hr />';
													}
												}else{
													echo '<b>Media not selected!</b><hr />';
												}
											}else{
												echo '<b>Post title field empty...</b><hr />';
											}
									}
							?>
						</div>
						<span class="act_head">Add New Post</span><hr />
						<div class="act_body">
							<form  style="background:#fff;" action="new_post.php" name="myform" id="myform" method="POST" enctype="multipart/form-data">
								<input name="post_title" class="act_title_text" type="text" placeholder="Enter title here"><br />
								<input name="post_media" class="act_title_btn" type="file"><br />
								
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
									<iframe name="richTextField" id="richTextField"></iframe>
									<!-- End replacing your normal textarea -->
								</p>
								
								<span class="act_head">Category</span> &nbsp;&nbsp;&nbsp; 
									<select name="post_category" class="cate_select">
										<option></option>
										<option>Advertorial</option>
										<option>Analysis</option>
										<option>Community</option>
										<option>Dan Cikin Gida</option>
										<option>Dan Dala</option>
										<option>Economy</option>
										<option>Editorial Comments</option>
										<option>Encounters with KMG</option>
										<option>Education</option>
										<option>Guest Column</option>
										<option>Guest Editor</option>
										<option>Health</option>
										<option>International</option>
										<option>Judiciary</option>
										<option>Letter to the Editor</option>
										<option>News</option>
										<option>Opinions</option>
										<option>Parliament</option>
										<option>Personality Profile</option>
										<option>Politics</option>
										<option>Views</option>
										<option>Religion & Culture</option>
										<option>Special Interview</option>
										<option>Sponsored Content</option>
										<option>Sport</option>
										<option>Star Interview</option>
										<option>Stories</option>
										<option>Supplements</option>
										<option>Technology</option>
										<option>The Pyramid Editorial</option>
										<option>Top Stories</option>
										<option>Women</option>
									</select>
									<br /><br />
								<span class="act_head">Post Status</span> 
									<select name="post_status" class="cate_select">
										<option></option>
										<option>Publish</option>
										<option>Save as Draft</option>
									</select>
									<br />
								<input name="myBtn" type="button" class="act_pub" value="Post" onClick="javascript:submit_form();"/>
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
		function iFrameOn(){
			richTextField.document.designMode = 'On';
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