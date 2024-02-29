<?php
	include '../includes/connect.inc.php';
?>

<?php
	if(isset($_POST['email'], $_POST['name'], $_POST['no'], $_POST['pass'])){
		$email = htmlentities(stripslashes($_POST['email']));
		$name = htmlentities(stripslashes($_POST['name']));
		$no = htmlentities(stripslashes($_POST['no']));
		$pass = htmlentities(stripslashes($_POST['pass']));
		$pass_hash = htmlentities(stripslashes(md5(md5('qwertyuioplmnbvcxza'.$_POST['pass'].'asdfghjklpoiuytrewq'))));
			if(!empty($email)){
				if(!empty($name)){
					if(!empty($no)){
						if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){
							if(!empty($pass)){
								if(strlen($_POST['pass']) >= 8 || strlen($_POST['pass']) <= 15){
									$sql = $handler->query("SELECT `email` FROM `pn_users_bio` WHERE `email`='$email' && `first_name`='$name' && `phone`='$no'");
										$sql_count = $sql->rowCount();
										$sql_row = $sql->fetch();
										$email = $sql_row['email'];
											if($sql_count == 1){
												$sql_2 = $handler->query("UPDATE `pn_users` SET `user_pass`='$pass_hash' WHERE `user_email`='$email'");
												$sql_2->execute();
												echo 'Password Changed...';
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
														counter(3, "../index.php");
													</script>';	
											}else{
												echo 'Please check your credentials and try again...';
											}	
								}else{
									echo 'Minimun of 8 characters and Maximun of 15 characters...';
								}
							}else{
								echo 'Password field empty...';
							}
						}else{
							echo 'Invalid Email Address...';
						}
					}else{
						echo 'Phone No field empty...';
					}	
				}else{
					echo 'Last Name field empty...';
				}
			}else{
				echo 'Email Address field empty...';
			}
	}
?>