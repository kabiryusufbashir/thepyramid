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
						<div id="feed_back"></div>
						Recycle Bin
						<?php
							include '../includes/connect.inc.php';
							$per_page = 15;
							$pages_query = $handler->query("SELECT * FROM `pn_post` WHERE `post_status` = 'Trash' ORDER BY `id` DESC");
							$pages = ceil($pages_query->rowCount() / $per_page);
							$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
							$start = ($page - 1) * $per_page;
							
							$query_2 = $handler->query("SELECT * FROM `pn_post` WHERE `post_status` = 'Trash' ORDER BY `id` DESC");
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
									$query = $handler->query("SELECT * FROM `pn_post` WHERE `post_status` = 'Trash' ORDER BY `id` DESC LIMIT $start, $per_page");
									?>
									<?php
										if($sql_count = $query->rowCount() > 0){
											?>
											<table class="all_post">
												<tr>
													<th>Title</th>
													<th>Author</th>
													<th>Category</th>
													<th>Date</th>
												</tr>
												<?php
													for($i = 1; $array[$i] = $query->fetch(); $i++){
														$post_id = $array[$i]['id'];	
														$title = $array[$i]['post_title'];	
														$author = $array[$i]['post_author'];	
														$category = $array[$i]['post_category'];	
														$date = $array[$i]['post_date'];
														$time = date("j F", strtotime($date)) .' at ' .date("G:i", strtotime($date));
															echo '
															<tr>
																<td>'.$title.
																'<br />
																	<span class="tb_act">';
																	echo '<a id="restore" post_id="'.$post_id.'">Restore</a> | <a href="post_view.php?post_id='.$post_id.'">View</a>
																	</span>
																</td>
																<td>'.$author.'</td>
																<td>'.$category.'</td>
																<td>'.$time.' GMT</td>
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
									echo '<b>Recycle Bin empty...</b>';
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