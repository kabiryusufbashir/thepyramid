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
							All Adverts
							<?php
								include '../includes/connect.inc.php';
								$per_page = 15;
								$pages_query = $handler->query("SELECT * FROM `pn_adverts_photo` WHERE `post_status` != 'Trash' ORDER BY `id` DESC");
								$pages = ceil($pages_query->rowCount() / $per_page);
								$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
								$start = ($page - 1) * $per_page;
								
								$query_2 = $handler->query("SELECT * FROM `pn_adverts_photo` WHERE `post_status` != 'Trash' ORDER BY `id` DESC");
									$count = $query_2->rowCount();
										if($count > 1){
											echo '<span class="tb_count">'.$count .' Posts</span>';	
										}else{
											echo '<span class="tb_count">'.$count .' Post</span>';
										}
							?>
						</span>
							<div class="act_body">
								<hr />
								<?php
									if($count > 0){
										$query = $handler->query("SELECT * FROM `pn_adverts_photo` WHERE `post_status` != 'Trash' ORDER BY `id` DESC LIMIT $start, $per_page");
										?>
										<?php
											if($sql_count = $query->rowCount() > 0){
												?>
												<table class="all_post">
													<tr>
														<th>Title</th>
														<th>Category</th>
														<th>Advert Start</th>
														<th>Advert Ends</th>
														<th>Date</th>
													</tr>
													<?php
														for($i = 1; $array[$i] = $query->fetch(); $i++){
															$post_id = $array[$i]['id'];	
															$title = $array[$i]['title'];	
															$advert_time = $array[$i]['advert_time'];
															$advert_time_to = strtotime($advert_time) + 3600;
															$advert_time_to = date('j F, Y', $advert_time_to);	
															$advert_ends = $array[$i]['advert_ends'];	
															$advert_ends_to = strtotime($advert_ends) + 3600;
															$advert_ends_to = date('j F, Y', $advert_ends_to);$category = $array[$i]['category'];	
															$date = $array[$i]['time_created'];
															$to_time = strtotime($date) + 3600;
															$time = date("j F", $to_time) .' at ' .date("g:i a", $to_time);
																echo '
																<tr>
																	<td>'.$title.
																	'<br />
																		<span class="tb_act">';
																		echo '<a id="advert_edit" href="./edit_advert.php?advert_id='.$post_id.'">Edit</a> |'; 
																		echo '<a id="advert_trash" advert_id="'.$post_id.'">Trash</a> | <a href="advert_view.php?post_id='.$post_id.'">View</a>
																		</span>
																	</td>
																	<td>'.$category.'</td>
																	<td>'.$advert_time_to.'</td>
																	<td>'.$advert_ends_to.'</td>
																	<td>'.$time.'</td>
																</tr>';
														}
													?>
												</table>
												<?php	
											}else{
												echo '<script type="text/javascript">
														window.location = "./index.php";
													  </script>';
											}
										?>
										<?php include '../includes/pagination.inc.php'; ?>
									<?php
									}else{
										echo '<b>No Advert Placed...</b>';
									}
								?>
							</div>
					</div>	
				</div>
					<div class="clear"></div>
			<br /><br /><br />
			</div>
		</div>
		<?php include '../includes/footer_2.inc.php'; ?>
		
		<?php include '../includes/script_link_2.inc.php'; ?>
		
	</body>
</html>