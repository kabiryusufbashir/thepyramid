<? session_start(); ?>

<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">

	<?php include '../includes/head_2.inc.php';?>
	
	<body>
		<?php include '../includes/session.inc.php'; ?>
		
		<?php include '../includes/slogan_2.inc.php'; ?>
		
		<div style="background:#fff;" class="container">
			<div class="line_break" style="border-top:1px solid #666;"><br /></div>
			<div class="row">
				<div class="g-2">
					<?php include '../includes/nav_3.inc.php'; ?>
				</div>
				<div class="g-10">
					<div id="feed_back"></div>
					<span class="act_head">
						<h4>Profile</h4>
						<?php
							if(isset($_POST['submit'])){
								if(isset($_POST['id'], $_POST['first_name'], $_POST['last_name'], $_POST['other_name'], $_POST['email'], $_POST['phone'], $_POST['gender'], $_POST['address'])){
									$id = $_POST['id'];
									$first_name = $_POST['first_name'];
									$last_name = $_POST['last_name'];
									$other_name = $_POST['other_name'];
									$email = $_POST['email'];
									$phone = $_POST['phone'];
									$gender = $_POST['gender'];
									$address = $_POST['address'];
										include '../includes/connect.inc.php';
											if($sql = $handler->query("UPDATE `pn_users_bio` SET `first_name`='$first_name', `last_name`='$last_name', `other_name`='$other_name', `email`='$email', `phone`='$phone', `gender`='$gender', `address`='$address' WHERE `id`='$id'"))
											{
												echo 'Profile updated...<hr />';
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
															counter(3, "./view_profile.php");
														</script>';
											}else
											{
												echo 'Error: please try again...<hr />';
											}
										
								}
							}
						?>
					</span>	
						<div class="act_body">
							<hr />
						
							<?php
								$query = $handler->query("SELECT * FROM `pn_users_bio` WHERE `email`='$user_email'");
								if($sql_count = $query->rowCount() > 0){
									$sql_row = $query->fetch();
										$id = $sql_row['id'];
										$first_name = $sql_row['first_name'];
										$last_name = $sql_row['last_name'];
										$other_name = $sql_row['other_name'];
										$email = $sql_row['email'];
										$phone = $sql_row['phone'];
										$address = $sql_row['address'];
										$gender = $sql_row['gender'];
											echo '<form action="edit_profile.php" method="POST">';
												echo '<br />';
												echo '<input type="text" value="'.$id.'" name="id" style="display:none;">';
												echo '<span style="font-size:16px;">First Name: &nbsp;&nbsp;&nbsp; <input name="first_name" class="act_input" type="text" value="'.$first_name.'"></span><br />';
												echo '<span style="font-size:16px;">Last Name:  &nbsp;&nbsp;&nbsp; <input name="last_name" class="act_input" type="text" value="'.$last_name.'"></span><br />';
												echo '<span style="font-size:16px;">Other Name: &nbsp; <input name="other_name" class="act_input" type="text" value="'.$other_name.'"></span><br />';
												echo '<span style="font-size:16px;">Gender: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select name="gender" class="act_input"><option>'.$gender.'</option><option>Male</option><option>Female</option></select></span><br />';
												echo '<span style="font-size:16px;">Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="email" class="act_input" type="text" value="'.$email.'"></span><br />';
												echo '<span style="font-size:16px;">Phone: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name="phone" class="act_input" type="text" value="'.$phone.'"></span><br />';
												echo '<span name="address" style="font-size:16px;">Address: <textarea name="address" class="act_addr">'.$address.'</textarea></span><br />';
												echo '<input name="submit" type="submit" class="act_pub" value="Edit profile"><br /><br /><br />';
											echo '</form>';
								}else{
									include '../includes/redirect.inc.php';
								}
							?>		
						</div>
				</div>	
			</div>
				<div class="clear"></div>
		</div>
		
		<?php include '../includes/footer_2.inc.php'; ?>
		
		<?php include '../includes/script_link_2.inc.php'; ?>
		
	</body>
</html>