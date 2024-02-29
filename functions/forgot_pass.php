<?php
	include '../includes/connect.inc.php';
?>

<?php
	if(isset($_POST['email_address'], $_POST['full_name'], $_POST['phone_no'])){
		$email_address = htmlentities(stripslashes($_POST['email_address']));
		$full_name = htmlentities(stripslashes($_POST['full_name']));
		$phone_no = htmlentities(stripslashes($_POST['phone_no']));
			if(!empty($email_address)){
				if(!empty($full_name)){
					if(!empty($phone_no)){
						if(filter_var($email_address, FILTER_VALIDATE_EMAIL) == true){
							$sql = $handler->query("SELECT `email`, `first_name`, `phone` FROM `pn_users_bio` WHERE `email`='$email_address' && `first_name`='$full_name' && `phone`='$phone_no'");
								$sql_count = $sql->rowCount();
									if($sql_count == 1){
										echo '<div id="check"></div>';
										echo '<b>New Password:</b><br />
										<input id="new_password" class="input" type="password" placeholder="Enter your New Password Here"><br /><br />';
										echo '<b>Confirm Password:</b><br />
										<input email="'.$email_address.'" name="'.$full_name.'" no="'.$phone_no.'" id="confirm_password" class="input" type="password" placeholder="Confirm your New Password Here"><br /><br />';
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
												counter(3, "../includes/forgot_password.inc.php");
											</script>';
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

<script type="text/javascript">
	//PASSWORD AUTHENTICATION
		var password_max = 16;
		$('#new_password').focus(function(){
				$('#check').html('<b>Minimun of 8 characters and Maximun of 15 characters...</b><hr />');
		}).blur(function(){
				$('#check').html('');
		}).keyup(function(){
				var password_length = $('#new_password').val().length;
				var password_length_remaining = password_max - password_length;
						if(password_length_remaining <= 0){
								$('#check').html('<b>Characters length exceed...</b><hr />');
						}else{
								if(password_length < 4){
										$('#check').html('<b>Password strength is <i style="color:#ff9090;">Weak...</i></b><hr />');
								}else if(password_length >= 4 && password_length < 8){
										$('#check').html('<b>Password strength is <i style="color:#fffa78;">Good...</i></b><hr />');
								}else if(password_length >= 8 && password_length <= 15){
										$('#check').html('<b>Password strength is <i style="color:#36ef6a;">Strong...</i></b><hr />');
								}
						}
		});
		
		var new_password = $('#new_password').val();
		
		$('#confirm_password').keyup(function(){
			var confirm_password = $('#confirm_password').val();
				
				if($('#confirm_password').val() == $('#new_password').val()){
					$('#check').html('<b style="color:#36ef6a;">Password Matched</b><hr />');
					$('#confirm_password').after('<input id="confirm_pass_change" class="submit_login" type="button" value="Change Password">');
						$('#confirm_pass_change').click(function(){
							var email = $('#confirm_password').attr('email');
							var name = $('#confirm_password').attr('name');
							var no = $('#confirm_password').attr('no');
							var pass = $('#confirm_password').val();
								$.post('../functions/forgot_pass_confirm.php', {email:email, name:name, no:no, pass:pass},
									function(data){
										$('#check').html('<b> '+data +'</b><hr />');
									}
								);
						});
				}else{
					$('#check').html('<b style="color:#ff9090;">Password Not Matched</b><hr />');
				}
				
		});
	//END OF PASSWORD AUTHENTICATION
	
</script>