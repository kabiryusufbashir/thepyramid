<? session_start(); ?>

<?php
	include '../includes/connect.inc.php';
	include '../includes/browser_name.inc.php';
	include '../includes/os_name.inc.php';
	include '../includes/ip_add.inc.php';
?>

<?php
	if(isset($_POST['email_address_login'], $_POST['password_login'])){
		$email_address_login = stripslashes(htmlentities($_POST['email_address_login'])); 
		$password_login = stripslashes(htmlentities(md5(md5('qwertyuioplmnbvcxza'.$_POST['password_login'].'asdfghjklpoiuytrewq'))));
			if(!empty($email_address_login)){
				if(!empty($password_login)){
					$query = $handler->query("SELECT `id`, `user_name` FROM `pn_users` WHERE `user_name`='$email_address_login' && `user_pass`='$password_login'");
						if($query->rowCount() == 1){
							$query_row = $query->fetch();
								$user_id = $query_row['id'];
								$user_name = $query_row['user_name'];
								$_SESSION['user_id'] = $user_id;
									$_SESSION['user_name'] = $user_name;
										if(isset($_SESSION['user_id'])){
											$stmt = $handler->prepare("INSERT INTO `pn_login_log_book`(user_email, os_name, browser_name, ip_address) VALUES(?,?,?,?)");
													$stmt->bindValue(1, $email_address_login);
													$stmt->bindValue(2, $os_name);
													$stmt->bindValue(3, $browser_name);
													$stmt->bindValue(4, $ip_address);
													$stmt->execute();
													echo '<script type="text/javascript">
														window.location = "./dashboard/index.php";
													  </script>';
									}else{
											echo '<b>ERROR</b>: Please check your login details and try again';	
										}
						}else{
							echo '<b>ERROR</b>: The password you entered for the username <b>'.$email_address_login.'</b> is incorrect';
						}
				}else{
					echo 'Password field empty...';
				}
			}else{
				echo 'Email address | Username field empty...';
			}
	}else{
		echo 'Error: Please contact your database administrator';
	}
?>