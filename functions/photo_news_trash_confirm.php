<?php
	if(isset($_POST['post_id'])){
		$post_id = htmlentities($_POST['post_id']);
			include '../includes/connect.inc.php';
				$sql = $handler->query("SELECT `image` FROM `pn_photo_news` WHERE `id`='$post_id'");
					$sql_row = $sql->fetch();
					$image = '.'.$sql_row['image'];
						unlink($image);
							if($query = $handler->query("DELETE FROM `pn_photo_news` WHERE `id`='$post_id'")){
								echo 'Photo News deleted...';
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
								echo 'Error: Please try again later...';
							}
	}
?>