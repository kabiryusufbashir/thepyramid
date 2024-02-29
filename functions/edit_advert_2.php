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
		if(isset($_POST['post_id'], $_POST['post_title'], $_POST['category'], $_POST['date_start'], $_POST['date_expiry'], $_POST['post_status'])){
			$post_id = stripslashes($_POST['post_id']);	
			$post_title = stripslashes($_POST['post_title']);	
			$post_category = htmlentities($_POST['category']);
			$date_start = htmlentities($_POST['date_start']);
			$date_expiry = htmlentities($_POST['date_expiry']);
			$post_status = htmlentities($_POST['post_status']);	
				if(!empty($post_title)){
					if(!empty($post_category)){
						if(!empty($date_start)){
							if(!empty($date_expiry)){
								if(!empty($post_status)){
									if($sql = $handler->query("UPDATE `pn_adverts_photo` SET `title`='$post_title', `category`='$post_category', `advert_time`='$date_start', `advert_ends`='$date_expiry', `post_status`='$post_status' WHERE `id`='$post_id'")){
										echo '<b>Advert Edited...</b><hr />';
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
												counter(3, "../dashboard/all_adverts.php");
											</script>';
									}else{
										echo 'Error: please try again...';
									}
								}else{
									echo '<b>Post status not selected!</b><hr />';
								}
							}else{
								echo '<b>Advert Expiration Date Empty</b><hr />';
							}
						}else{
							echo '<b>Advert Commencement Date Empty</b><hr />';
						}
					}else{
						echo '<b>Advert Category not Selected</b><hr />';
					}
				}else{
					echo '<b>Advert title field empty</b><hr />';
				}
		}
	?>
</body>
</html>