<div class="slideshow-container">
	<?php
		include './includes/connect.inc.php';
			$query = $handler->query("SELECT * FROM `pn_adverts_photo` WHERE `category`='Below Navigation Bar' && `post_status` !='Trash' ORDER BY `id` DESC");
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
								echo '<div class="mySlidesNavBar fade">';
								echo '<a href="#"><img title="'.$post_title.'" src="'.$post_media.'" /></a>';
								echo '</div>';
								echo '<div style="text-align:center;">
										<span class="dotNavBar"></span>
									</div>';
							}else{
								echo '<div class="mySlidesNavBar fade">';
								echo '<a href="#">
										<img title="AgriCo Urban Farming" src="./images/advert_nav.jpg" /></a>';
								echo '</div>';
								echo '<div class="mySlidesNavBar fade">';
								echo '<a href="#">
										<img title="Team Piccolo Website Advert" src="./images/advert_nav_2.jpg" /></a>';
								echo '</div>';
								echo '<div style="text-align:center;">
										<span class="dotNavBar"></span>
										<span class="dotNavBar"></span>
									</div>';
							}
							
						}
				}else{
					echo '<div class="mySlidesNavBar fade">';
					echo '<a href="#">
							<img title="AgriCo Urban Farming" src="./images/advert_nav.jpg" /></a>';
					echo '</div>';
					echo '<div class="mySlidesNavBar fade">';
					echo '<a href="#">
							<img title="Team Piccolo Website Advert" src="./images/advert_nav_2.jpg" /></a>';
					echo '</div>';
					echo '<div style="text-align:center;">
							<span class="dotNavBar"></span>
							<span class="dotNavBar"></span>
						</div>';
				}
				
	?>
</div>

<script>
	
	var slideIndexNavBar = 0;
	showSlidesNavBar();
	
	function showSlidesNavBar() {
		var i;
		var slides = document.getElementsByClassName("mySlidesNavBar");
		var dots = document.getElementsByClassName("dotNavBar");
		for (i = 0; i < slides.length; i++) {
		   slides[i].style.display = "none";  
		}
		slideIndexNavBar++;
		if (slideIndexNavBar > slides.length) {slideIndexNavBar = 1}    
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndexNavBar-1].style.display = "block";  
		dots[slideIndexNavBar-1].className += " active";
		setTimeout(showSlidesNavBar, 3000); // Change image every 7 seconds
	}
</script>