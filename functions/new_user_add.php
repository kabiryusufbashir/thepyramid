<?php
	if(isset($_POST['first_name'], $_POST['last_name'], $_POST['other_name'], $_POST['username'], $_POST['email'], $_POST['phone'], $_POST['address'], $_POST['password'], $_POST['gender'], $_POST['user_category'], $_POST['user_status'])){
		$first_name = stripslashes(htmlentities($_POST['first_name']));
		$last_name = stripslashes(htmlentities($_POST['last_name']));
		$other_name = stripslashes(htmlentities($_POST['other_name']));
		$username = stripslashes(htmlentities($_POST['username']));
		$email = stripslashes(htmlentities($_POST['email']));
		$phone = stripslashes(htmlentities($_POST['phone']));
		$address = stripslashes(htmlentities($_POST['address']));
		$password = stripslashes(htmlentities($_POST['password']));
		$password_hash = stripslashes(htmlentities(md5(md5('qwertyuioplmnbvcxza'.$_POST['password'].'asdfghjklpoiuytrewq'))));
		$gender = stripslashes(htmlentities($_POST['gender']));
		$user_category = stripslashes(htmlentities($_POST['user_category']));
		$user_status = stripslashes(htmlentities($_POST['user_status']));
			if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){
				if(strlen($password) >= 8 && strlen($password) <= 15){
					$user_status = ($user_status == 'Active') ? '1' : '0';
					$user_category = ($user_category == 'Admin') ? '1' : '2';
						include '../includes/connect.inc.php';
							$sql = $handler->query("SELECT `user_name` FROM `pn_users` WHERE `user_name`='$username'");
								if($sql->rowCount() == 0){
									$sql_2 = $handler->query("SELECT `user_email` FROM `pn_users` WHERE `user_email`='$email'");
										if($sql_2->rowCount() == 0){
											if($stmt = $handler->prepare("INSERT INTO `pn_users_bio`(first_name, last_name, other_name, email, phone, address, gender) VALUES(?, ?, ?, ?, ?, ?, ?)")){
												$stmt->bindValue(1, $first_name);
												$stmt->bindValue(2, $last_name);
												$stmt->bindValue(3, $other_name);
												$stmt->bindValue(4, $email);
												$stmt->bindValue(5, $phone);
												$stmt->bindValue(6, $address);
												$stmt->bindValue(7, $gender);
													if($stmt->execute()){
														if($stmt_2 = $handler->prepare("INSERT INTO `pn_users`(user_email, user_name, user_pass, user_status, user_category) VALUES(?, ?, ?, ?, ?)")){
															$stmt_2->bindValue(1, $email);
															$stmt_2->bindValue(2, $username);
															$stmt_2->bindValue(3, $password_hash);
															$stmt_2->bindValue(4, $user_status);
															$stmt_2->bindValue(5, $user_category);
																if($stmt_2->execute()){
																	echo 'Data saved...';
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
																	echo 'Error: please contact your database administrator...';
																}
														}else{
															echo 'Error: please try again...';	
														}
													}else{
														echo 'Error: please contact your database administrator...';
													}
											}else{
												echo 'Error: please try again...';
											}
										}else{
											echo $email .' already exists...';
										}
								}else{
									echo $username .' already exists...';
								}
				}else{
					echo 'Password minimun of 8 characters or maximun of 15 characters';
				}
			}else{
				echo 'Invalid email address...';
			}
	}
?>