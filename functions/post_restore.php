<?php
	if(isset($_POST['post_id'])){
		$post_id = htmlentities($_POST['post_id']);
			include '../includes/connect.inc.php';
				if($query = $handler->query("UPDATE `pn_post` SET `post_status`='Publish' WHERE `id`='$post_id'")){
					echo 'Post restored...';
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
							counter(3, "../dashboard/trash.php");
						</script>';
				}else{
					echo 'Error: Please try again later...';
				}
	}
?>