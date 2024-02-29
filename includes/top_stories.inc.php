<div id="content_top_stories">
	
	<div id="top_stories_advert">
		<div class="slideshow-container">
			<?php
				include './includes/adverts_below_latest_update.php';
			?>
		</div>
	</div>
	
	<div id="top_stories">
		<div id="gallery" class="slideshow-container">
			
			<?php
				include './includes/connect.inc.php';
					$query = $handler->query("SELECT * FROM `pn_post` WHERE `post_category`='Top Stories' && `post_status` !='Trash' ORDER BY `id` DESC LIMIT 3");
						while($query_run = $query->fetch()){
						$post_id = $query_run['id'];
						$post_title = $query_run['post_title'];
						$post_content = $query_run['post_content'];
						$post_media = $query_run['post_media'];
							echo '<div class="mySlides fade">';
							echo '<a href="./view_story.php?post_id='.$post_id.'"><img title="'.$post_title.'" src="'.$post_media.'">';
							echo '<span class="post_title">'.$post_title .'</span></a>';
							echo '</div>';
							echo '<div style="text-align:center;">
									<span class="dot"></span>
								</div>';
						}
			?>
		</div>
	</div>
	
	<div class="side_stories">
		<?php
			$sql = $handler->query("SELECT * FROM `pn_post` WHERE `post_category`='Top Stories' && `post_status` !='Trash' ORDER BY `id` DESC LIMIT 2");
				while($sql_run = $sql->fetch()){
					$post_id = $sql_run['id'];
					$post_title = $sql_run['post_title'];
					$post_content = $sql_run['post_content'];
					$post_media = $sql_run['post_media'];
						echo '<a href="./view_story.php?post_id='.$post_id.'">';
						echo '<div class="side_photo" style="margin-bottom:14px;">';
							echo '<img title="'.$post_title.'" src="'.$post_media.'">';
						echo '</div>';
						echo '<div class="side_title">';
							echo '<span class="post_title">'.$post_title .'</span>';
						echo '<hr /></div>';
						echo '</a>';
				}
		?>
	</div>
	
</div>

<script>
	var slideIndex = 0;
	showSlides();

	function showSlides() {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("dot");
		for (i = 0; i < slides.length; i++) {
		   slides[i].style.display = "none";  
		}
		slideIndex++;
		if (slideIndex > slides.length) {slideIndex = 1}    
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex-1].style.display = "block";  
		dots[slideIndex-1].className += " active";
		setTimeout(showSlides, 4000); // Change image every 4 seconds
	}
</script>