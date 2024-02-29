<?php
	if(isset($_POST['user_id'], $_POST['old_pass'], $_POST['new_pass'], $_POST['confirm_pass'])){
		$user_id = htmlentities(stripslashes($_POST['user_id']));
		$old_pass = htmlentities(stripslashes(md5(md5('qwertyuioplmnbvcxza'.$_POST['old_pass'].'asdfghjklpoiuytrewq'))));
		$new_pass = htmlentities(stripslashes(md5(md5('qwertyuioplmnbvcxza'.$_POST['new_pass'].'asdfghjklpoiuytrewq'))));
			include '../includes/connect.inc.php';
				$sql = $handler->query("SELECT `user_pass` FROM `pn_users` WHERE `id`='$user_id' && `user_pass`='$old_pass'");
					if($count = $sql->rowCount() == 1){
						if($sql_2 = $handler->query("UPDATE `pn_users` SET `user_pass`='$new_pass' WHERE `id`='$user_id'")){
							echo 'Password changed...';
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
								counter(4, "../includes/logout.inc.php");
							</script>';
						}else{
							echo 'Error: please try again...';
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
								counter(4, "../includes/logout.inc.php");
							</script>';
						}
					}else{
						echo 'Please check your credentials and try again...';
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
								counter(4, "../includes/logout.inc.php");
							</script>';
					}
	}
?>