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
						Profile
					</span>	
						<div class="act_body">
							<?php
								include '../includes/connect.inc.php';
								$query = $handler->query("SELECT * FROM `pn_users_bio` WHERE `email`='$user_email'");
								if($sql_count = $query->rowCount() > 0){
									$sql_row = $query->fetch();
										$first_name = $sql_row['first_name'];
										$last_name = $sql_row['last_name'];
										$other_name = $sql_row['other_name'];
										$email = $sql_row['email'];
										$phone = $sql_row['phone'];
										$address = $sql_row['address'];
										$gender = $sql_row['gender'];
											echo '<hr /><br /><br />';
											echo '<span style="font-size:16px;">First Name: <b>'.$first_name.'</b></span>';
											echo '<span style="margin-left:150px; font-size:16px;">Last Name: <b>'.$last_name.'</b></span>';
											echo '<span style="margin-left:150px; font-size:16px;">Other Name: <b>'.$other_name.'</b></span>';
											echo '<br /><br /><br />';
											echo '<span style="font-size:16px;">Gender: <b>'.$gender.'</b></span>';
											echo '<span style="margin-left:180px; font-size:16px;">Email: <b>'.$email.'</b></span>';
											echo '<br /><br /><br />';
											echo '<span style="font-size:16px;">Phone: <b>'.$phone.'</b></span>';
											echo '<br /><br /><br />';
											echo '<span style="font-size:16px;">Address: <b>'.$address.'</b></span>';
											echo '<br /><br /><br />';
								}else{
									echo 'Sorry you can\'t view this profile...';
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