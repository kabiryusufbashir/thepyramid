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
					<span class="act_head">
						Change Password
					</span>	
						<div class="act_body">
							<div id="feed_back"></div>
							<hr />
							<table>
								<tr>
									<th>Old Password</th>
									<td><input user_id="<?php echo $user_id;?>" id="old_pass" class="act_title_text" type="password"></td>
								</tr>
								<tr>
									<th>New Password</th>
									<td><input id="new_pass" class="act_title_text" type="password"></td>
								</tr>
								<tr>
									<th>Confirm Password</th>
									<td><input id="confirm_pass" class="act_title_text" type="password"></td>
								</tr>
								<tr>
									<th style="color:#fff;">Confirm Password</th>
									<td><input id="change_password" class="act_pub" type="button" value="Change Password"></td>
								</tr>
							</table>		
						</div>
				</div>	
			</div>
				<div class="clear"></div>
		</div>
		
		<?php include '../includes/footer_2.inc.php'; ?>
		
		<?php include '../includes/script_link_2.inc.php'; ?>
		
	</body>
</html>