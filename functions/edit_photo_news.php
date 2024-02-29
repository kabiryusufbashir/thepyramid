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
		if(isset($_POST['id'], $_POST['title'], $_POST['date'], $_POST['media'])){
			$id = stripslashes($_POST['id']);	
			$post_title = htmlentities(stripslashes($_POST['title']));	
			$date = htmlentities(stripslashes($_POST['date']));	
			$image = htmlentities(stripslashes($_POST['media']));	
				if(!empty($post_title)){
					if($sql = $handler->query("DELETE FROM `pn_photo_news` WHERE `id`='$id'")){
						$stmt = $handler->prepare("INSERT INTO `pn_photo_news`(id, title, image, time_added) VALUES(?, ?, ?, ?)");
							$stmt->bindValue(1, $id);
							$stmt->bindValue(2, $post_title);
							$stmt->bindValue(3, $image);
							$stmt->bindValue(4, $date);
							$stmt->execute();
							echo '<b>Photo News Edited...</b><hr />';
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
						echo 'Error: please try again...';
					}
				}else{
					echo '<b>Photo News title empty...</b><hr />';
				}
		}else{
			echo 'No';
		}
	?>
</body>
</html>