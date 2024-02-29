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
					<div class="activity">
						<span class="act_head">Add New User</span><hr />
						<div id="feed_back"></div>
						<div class="act_body">
							<form>
								<input id="first_name" class="act_input" type="text" placeholder="First Name">
								<input id="last_name" class="act_input" type="text" placeholder="Last Name">
								<input id="other_name" class="act_input" type="text" placeholder="Other Name"><br />
								<input id="username" class="act_input" type="text" placeholder="Username *">
								<input id="email" class="act_input" type="text" placeholder="Email *">
								<input id="phone" class="act_input" type="text" placeholder="Phone">
								<textarea id="address" class="act_addr" placeholder="Address"></textarea><br />
								<input id="password" class="act_input" type="password" placeholder="Password *"><br /><br />
								<span class="act_head">Gender</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
									<select id="gender" class="cate_select">
										<option></option>
										<option>Male</option>
										<option>Female</option>
									</select>
									<br /><br />
								<span class="act_head">User Category *</span> &nbsp;&nbsp;&nbsp; 
									<select id="user_category" class="cate_select">
										<option></option>
										<option>Admin</option>
										<option>Other User</option>
									</select>
									<br /><br />
								<span class="act_head">User Status *</span> 
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<select id="user_status" class="cate_select">
										<option></option>
										<option>Active</option>
										<option>De-active</option>
									</select>
									<br />
								<input id="add_user" class="act_pub" type="button" value="Add User">
							</form>
						</div>
					</div>
				</div>	
			</div>
				<div class="clear"></div>
		</div>
		
		<?php include '../includes/footer_2.inc.php'; ?>
		
		<?php include '../includes/script_link_2.inc.php'; ?>
		
	</body>
</html>