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
						All User
						<?php
							include '../includes/connect.inc.php';
							$query = $handler->query("SELECT * FROM `pn_users` WHERE `user_status` != 'Trash' ORDER BY `id` DESC");
								$count = $query->rowCount();
									if($count > 1){
										echo '<span class="tb_count">'.$count .' Users</span>';	
									}else{
										echo '<span class="tb_count">'.$count .' User</span>';
									}
						?>
					</span>
						<div class="act_body">
							<hr />
							<table class="all_post">
								<tr>
									<th>Action</th>
									<th>Email</th>
									<th>Username</th>
									<th>Status</th>
									<th>Category</th>
								</tr>
								<?php
									if($query->rowCount() > 0){
										while($query_row = $query->fetch()){
											$user_id = $query_row['id'];	
											$email = $query_row['user_email'];	
											$username = $query_row['user_name'];	
											$status = $query_row['user_status'];	
											$category = $query_row['user_category'];	
												echo '
												<tr>
													<td>
														<a id="user_edit" user_id="'.$user_id.'">Edit</a> | <a id="user_trash" user_id="'.$user_id.'">Trash</a> 
													</td>
													<td>'.$email.'</td>
													<td>'.$username.'</td>';
													if($status == 1){
														echo '<td>Activate</td>';
													}else{
														echo '<td>De-activate</td>';
													}
													if($category == 1){
														echo '<td>Admin</td>';
													}else{
														echo '<td>Others</td>';
													}
												'</tr>';
										}
									}else{
										echo '<b>No Post Published...</b>';
									}
								?>
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