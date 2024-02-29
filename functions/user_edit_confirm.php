<?php
	if(isset($_POST['user_id'], $_POST['email'], $_POST['username'], $_POST['status'])){
		$user_id = htmlentities($_POST['user_id']);
		$email = htmlentities($_POST['email']);
		$username = htmlentities($_POST['username']);
		$status = htmlentities($_POST['status']);
			if($status == 'Active'){
				$status = 1;
			}else if($status == 'De-active'){
				$status = 0;
			}
			
			include '../includes/connect.inc.php';
				if($query = $handler->query("UPDATE `pn_users` SET `user_email`='$email', `user_name`='$username', `user_status`='$status' WHERE `id`='$user_id'")){
					echo 'Updated';
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