<?php
	include '../includes/connect.inc.php';
?>

<?php
	//CREATING SYSTEM
	if(isset($_POST['email_address'], $_POST['username'], $_POST['password'] , $_POST['confirm_password'])){
		$email_address = stripslashes(htmlentities($_POST['email_address']));
		$username = stripslashes(htmlentities($_POST['username']));
		$password = stripslashes(htmlentities(md5(md5('qwertyuioplmnbvcxza'.$_POST['password'].'asdfghjklpoiuytrewq'))));
		$confirm_password = stripslashes(htmlentities(md5(md5('qwertyuioplmnbvcxza'.$_POST['confirm_password'].'asdfghjklpoiuytrewq'))));
			if(!empty($email_address)){
				if(filter_var($email_address, FILTER_VALIDATE_EMAIL) == true){
					$sql = $handler->query("SELECT `user_email` FROM `pn_users` WHERE `user_email`='$email_address'");
						if($sql->rowCount() == 0){
							$sql_2 = $handler->query("SELECT `user_name` FROM `pn_users` WHERE `user_name`='$username'");
								if($sql_2->rowCount() == 0){
									try{$stmt = $handler->prepare("INSERT INTO `pn_users`(user_email, user_name, user_pass, user_status, user_category) VALUES(?, ?, ?, ?, ?)");
										$stmt->bindValue(1, $email_address);
										$stmt->bindValue(2, $username);
										$stmt->bindValue(3, $confirm_password);
										$stmt->bindValue(4, '1');
										$stmt->bindValue(5, '1');
										$stmt->execute();
											$stmt_2 = $handler->prepare("INSERT INTO `pn_users_bio`(email) VALUES(?)");
												$stmt_2->bindValue(1, $email_address);
												$stmt_2->execute();
											$handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
												echo 'Account created successfully...';
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
															counter(3, "./login.php");
														</script>';
									}catch(PDOException $e){
										echo 'Error: server problem, please try again later... ' .$e->getMessage();
									}
								}else{
									echo $username .' already exists...';
								}
						}else{
							echo $email_address .' already exists...';
						}
				}else{
					echo 'Invalid email address...';
				}
			}else{
				echo 'Email address field empty...';
			}
	}else{
		echo 'Error: Please contact your database administrator';
	}
	//END OF CREATING SYSTEM
	
?>