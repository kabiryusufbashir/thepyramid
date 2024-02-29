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
	if(isset($_POST['submit'])){
		if(isset($_POST['post_id'], $_POST['post_media'])){
			$post_id = $_POST['post_id'];
			$post_media = '.'.$_POST['post_media'];
			$post_media_name = htmlentities($_FILES['c_image']['name']);
			$post_media_size = htmlentities($_FILES['c_image']['size']);	
			$post_media_type = htmlentities($_FILES['c_image']['type']);	
			$post_media_tmp_name = htmlentities($_FILES['c_image']['tmp_name']);
			$post_media_name_ext = strtolower(substr($post_media_name, strpos($post_media_name, '.') +1));
			$new_name = date("Ynjgi").'.'.$post_media_name_ext;
			$path = './images/media/images/'.$new_name;
				if($post_media_name_ext == 'jpg' || $post_media_name_ext == 'jpeg' || $post_media_name_ext == 'png' || $post_media_name_ext == 'gif'){
					if($post_media_type == 'image/jpeg' || $post_media_type == 'image/png' || $post_media_type == 'image/jpg' || $post_media_type == 'image/gif'){
						$location = '../images/media/images/'.$new_name;
							if(move_uploaded_file($post_media_tmp_name, $location)){
								include '../includes/connect.inc.php';
									unlink($post_media);
									if($query = $handler->query("UPDATE `pn_photo_news` SET `image`='$path' WHERE `id`='$post_id'")){
										echo '<b>Image Changed successfully...</b><hr />';
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
												counter(3, "../dashboard/all_photo_news.php");
											</script>';	
									}else{
										echo 'Error: Please try again...';
									}
							}else{
								echo '<b>Error: Please try again...</b><hr />';
							}
					}else{
						echo '<b>Please choose a photo only...</b><hr />';
					}
				}else{
					echo '<b>The file must be an Image...</b><hr />';
				}
		}
	}
?>
</body>
</html>