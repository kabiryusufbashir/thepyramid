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
		if(isset($_POST['content'], $_POST['id'])){
			$id = stripslashes($_POST['id']);	
			$post_content = stripslashes($_POST['content']);
				if(!empty($post_content)){
					if($sql = $handler->query("DELETE FROM `pn_contact_us` WHERE `id`='$id'")){
						$stmt = $handler->prepare("INSERT INTO `pn_contact_us`(id, content) VALUES(?, ?)");
							$stmt->bindValue(1, $id);
							$stmt->bindValue(2, $post_content);
							$stmt->execute();
							echo '<b>Contact Us edited...</b><hr />';
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
									counter(3, "../dashboard/contact.php");
								</script>';
					}else{
						echo 'Error: please try again...';
					}
				}else{
					echo '<b>Content field empty...</b><hr />';
				}
					
				
		}
	?>
</body>
</html>