<div class="wrapper">
	<div class="container">
		<div id="search_content">
			<?php
				if(isset($_POST['search_box'])){
					$search_box = htmlentities(stripslashes($_POST['search_box']));
					$search = '%'.$search_box.'%';
						if(strlen($search_box) > 3){
							include './includes/connect.inc.php';
								if($sql = $handler->query("SELECT * FROM `pn_post` WHERE `post_title` LIKE '$search' && `post_status`='Publish' ORDER BY `id` DESC")){
									if($sql->rowCount() > 0){
										echo '<hr /><h1><u>Search Result</u></h1>';
										while($query_run = $sql->fetch()){
											$post_id = $query_run['id'];
											$post_title = $query_run['post_title'];
											$post_content = $query_run['post_content'];
											$post_media = $query_run['post_media'];
											$post_category = strtoupper($query_run['post_category']);
												echo '<a title="'.$post_title.'" href="./view_story.php?post_id='.$post_id.'">';
												echo '<div class="col-full">';
												echo '<div class="head"><u>'.$post_category.'</u></div>';
												echo '<div class="title">'.$post_title.'</div>';
												echo '</div>';
												echo '</a>';
										}
									}else{
										echo '<hr />';
										echo '<h1>No Match found...</h1>';
									}
								}else{
									echo 'Error: please try again...';
								}	
						}else{
							echo '<hr />';
							echo '<h1>Search Box empty...</h1>';
						}
				}
			?>
		</div>
	</div>
	<div class="clear"></div>
</div>

<script type="text/javascript" src="./scripts/jquery.js"></script>