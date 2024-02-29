<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">

	<head>
		<title>
			Pyramid Newspaper
		</title>
		<link rel="stylesheet" type="text/css" href="../css/index.css" />
		<link rel="Icon" type="image/ico" href="../images/favicon.ico" />
		<meta charset="utf-8">
		
		<script type="text/javascript">
			var myVar=setInterval(function(){myTimer()},1000);
			function myTimer(){
				var d=new Date();
				var t="Time: " +d.toLocaleTimeString();
				document.getElementById("time").innerHTML=t;
			}
		</script>
	</head>

<body>
	<?php
		include '../includes/connect.inc.php';
		if(isset($_POST['id'], $_POST['post_title'], $_POST['post'], $_POST['category'], $_POST['media'], $_POST['author'], $_POST['post_status'], $_POST['date'])){
			$id = stripslashes($_POST['id']);	
			$post_title = stripslashes($_POST['post_title']);	
			$post_content = stripslashes($_POST['post']);
			$post_category = htmlentities($_POST['category']);
			$post_media = htmlentities($_POST['media']);
			$post_author = htmlentities($_POST['author']);
			$post_status = htmlentities($_POST['post_status']);	
			$post_date = htmlentities($_POST['date']);	
				if(!empty($post_title)){
					if(!empty($post_media)){
						if(!empty($post_content)){
							if(!empty($post_category)){
								if(!empty($post_status)){
									if($sql = $handler->query("DELETE FROM `pn_post` WHERE `id`='$id'")){
										$stmt = $handler->prepare("INSERT INTO `pn_post`(id, post_title, post_content, post_category, post_media, post_author, post_status, post_date) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
											$stmt->bindValue(1, $id);
											$stmt->bindValue(2, $post_title);
											$stmt->bindValue(3, $post_content);
											$stmt->bindValue(4, $post_category);
											$stmt->bindValue(5, $post_media);
											$stmt->bindValue(6, $post_author);
											$stmt->bindValue(7, $post_status);
											$stmt->bindValue(8, $post_date);
											$stmt->execute();
											echo '<b>Post Edited...</b><hr />';
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
													counter(3, "../dashboard/all_post.php");
												</script>';
									}else{
										echo 'Error: please try again...';
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
</body>
</html>