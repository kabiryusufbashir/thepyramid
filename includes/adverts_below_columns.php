<div class="slideshow-container">
	<?php
		include './includes/connect.inc.php';
			$query = $handler->query("SELECT * FROM `pn_adverts_photo` WHERE `category`='Below Columns' && `post_status` !='Trash' ORDER BY `id` DESC");
				if($query->rowCount() > 0){
					while($query_run = $query->fetch()){
						$post_id = $query_run['id'];
						$post_title = $query_run['title'];
						$advert_time = $query_run['advert_time'];
						$advert_ends = $query_run['advert_ends'];
						$post_media = $query_run['path'];
						$current_date = strtotime(date('j F, Y'));
						$advert_ends_to_date = strtotime($advert_ends);
							if($current_date <= $advert_ends_to_date){
								echo '<div class="mySlidesCols fade">';
								echo '<a href="#"><img title="'.$post_title.'" src="'.$post_media.'" /></a>';
								echo '</div>';
								echo '<div style="text-align:center;">
										<span class="dotCols"></span>
									</div>';
							}else{
								echo '<div class="mySlidesCols fade">';
								echo '<a href="#">
										<img title="SK delight Kitchen" src="./images/advert_top_stories.jpg" /></a>';
								echo '</div>';
								echo '<div class="mySlidesCols fade">';
								echo '<a href="#">
										<img title="Team Piccolo Website Advert" src="./images/advert_top_stories_2.jpg" /></a>';
								echo '</div>';
								echo '<div style="text-align:center;">
										<span class="dotCols"></span>
										<span class="dotCols"></span>
									</div>';
							}
						}
				}else{
					echo '<div class="mySlidesCols fade">';
					echo '<a href="#">
							<img title="SK delight Kitchen" src="./images/advert_top_stories.jpg" /></a>';
					echo '</div>';
					echo '<div class="mySlidesCols fade">';
					echo '<a href="#">
							<img title="Team Piccolo Website Advert" src="./images/advert_top_stories_2.jpg" /></a>';
					echo '</div>';
					echo '<div style="text-align:center;">
							<span class="dotCols"></span>
							<span class="dotCols"></span>
						</div>';
				}
				
	?>
</div>
<script>
	
	var slideIndexCols = 0;
	showSlidesCols();
	
	function showSlidesCols() {
		var i;
		var slides = document.getElementsByClassName("mySlidesCols");
		var dots = document.getElementsByClassName("dotCols");
		for (i = 0; i < slides.length; i++) {
		   slides[i].style.display = "none";  
		}
		slideIndexCols++;
		if (slideIndexCols > slides.length) {slideIndexCols = 1}    
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndexCols-1].style.display = "block";  
		dots[slideIndexCols-1].className += " active";
		setTimeout(showSlidesCols, 3000); // Change image every 7 seconds
	}
</script>