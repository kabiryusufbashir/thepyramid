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
		
		<?php
			include '../includes/connect.inc.php';
				$sql = $handler->query("SELECT * FROM `pn_visit_log`");
					$visit = $sql->rowCount();
		?>
		<div style="background:#fff;" class="container">
			<div class="line_break" style="border-top:1px solid #666;"><br /></div>
			<div class="row">
				<div class="g-2">
					<?php include '../includes/nav_3.inc.php'; ?>
				</div>
				
				<div class="row">
					<div class="g-10">
						<div class="activity">
							<span class="act_head">
								Dashboard <?php echo '<span style="float:right;">Hits: ' .$visit .'</span>';?>
							</span><hr />
							<div class="act_body">
								<div class="contain">
									<a href="./index.php">
										<div class="bars">
											<p>
												<img src="../images/home_icon.png" /><br />
													Home
											</p>
										</div>
									</a>
									
									<a href="./new_post.php">
										<div class="bars">
											<p>
												<img src="../images/new_post_icon.png" /><br />
													New Post
											</p>
										</div>
									</a>
									
									<a href="./all_post.php">
										<div class="bars">
											<p>
												<img src="../images/all_post_icon.png" /><br />
													All Posts
											</p>
										</div>
									</a>
									
									<a href="./photo_news.php">
										<div class="bars">
											<p>
												<img src="../images/new_post_icon.png" /><br />
													Photo News Gallery
											</p>
										</div>
									</a>
									
									<a href="./all_photo_news.php">
										<div class="bars">
											<p>
												<img src="../images/all_post_icon.png" /><br />
													All Photo News
											</p>
										</div>
									</a>
									
									<a href="./new_user.php">
										<div class="bars">
											<p>
												<img src="../images/new_user_icon.png" /><br />
													New User
											</p>
										</div>
									</a>
									
									<a href="./all_user.php">
										<div class="bars">
											<p>
												<img src="../images/all_user_icon.png" /><br />
													All Users
											</p>
										</div>
									</a>
									
									<a href="./trash.php">
										<div class="bars">
											<p>
												<img src="../images/trash_icon.png" /><br />
													Trash
											</p>
										</div>
									</a>
									
									<a href="./view_profile.php">
										<div class="bars">
											<p>
												<img src="../images/view_profile_icon.png" /><br />
													View Profile
											</p>
										</div>
									</a>
									
									<a href="./edit_profile.php">
										<div class="bars">
											<p>
												<img src="../images/edit_profile_icon.png" /><br />
													Edit Profile
											</p>
										</div>
									</a>
									
									<a href="./log_book.php">
										<div class="bars">
											<p>
												<img src="../images/visit_icon.png" /><br />
													Log Book
											</p>
										</div>
									</a>
									
									<a href="./system.php">
										<div class="bars">
											<p>
												<img src="../images/about_us.png" /><br />
													About Us
											</p>
										</div>
									</a>
									
									
									<a href="./adverts.php">
										<div class="bars">
											<p>
												<img src="../images/adverts.png" /><br />
													Adverts
											</p>
										</div>
									</a>
									
									<a href="./add_adverts.php">
										<div class="bars">
											<p>
												<img src="../images/adverts.png" /><br />
													Add Adverts
											</p>
										</div>
									</a>
									
									<a href="./all_adverts.php">
										<div class="bars">
											<p>
												<img src="../images/adverts.png" /><br />
													All Adverts
											</p>
										</div>
									</a>
									
									<a href="./contact.php">
										<div class="bars">
											<p>
												<img src="../images/contact_us_icon.png" /><br />
													Contact Us
											</p>
										</div>
									</a>
									
									<a href="./change_pass.php">
										<div class="bars">
											<p>
												<img src="../images/change_pass_icon.png" /><br />
													Change Password
											</p>
										</div>
									</a>
									
									<a href="../includes/logout.inc.php">
										<div class="bars">
											<p>
												<img src="../images/logout_icon.png" /><br />
													Logout
											</p>
										</div>
									</a>
									
								</div>
							</div>
						</div>
					</div>	
					<div class="clear">
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>	
		
		<?php include '../includes/footer_2.inc.php'; ?>
		
		<?php include '../includes/script_link_2.inc.php'; ?>
		
	</body>
</html>