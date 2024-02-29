<?php
	if(isset($_POST['user_id'])){
		$user_id = htmlentities($_POST['user_id']);
			include '../includes/connect.inc.php';
				if($query = $handler->query("UPDATE `pn_users` SET `user_status`='Trash' WHERE `id`='$user_id'")){
					echo 'User moved to recycle bin...';
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
							counter(3, "../dashboard/all_user.php");
						</script>';
				}else{
					echo 'Error: Please try again later...';
				}
	}
?>