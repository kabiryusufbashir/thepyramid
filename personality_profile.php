<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">

	<?php include './includes/head.inc.php';?>
	
	<body>
		<?php include './includes/slogan.inc.php'; ?>
		
		<?php include './includes/nav.inc.php'; ?>
		<div id="news_content">
			<div style="border-top:1px solid #666;"><br /></div>
			<?php 
				include './functions/load_category.php'; 
					loadCategory('Personality Profile');
			?>
			
		</div>
		<?php include './includes/footer.inc.php'; ?>
		
		<?php include './includes/script_link.inc.php'; ?>
		
		<script type="text/javascript">
			//MORE STORIES	
			$(document).on('click', '.more_stories', function(){
				var post_id = $(this).attr('post_id');
					$('.more_stories').attr('Value', 'Loading...');
						$.ajax({
							url:'./includes/more_stories_personality_profile.php',
							method:'POST',
							data:{post_id:post_id},
							dataType:'text',
							success:function(data){
								if(data != null){
									$('.more_stories').remove();
									$('#news_content').append(data);
								}else{
									$('.more_stories').attr('Value', 'No more news');
								}
							}
						});
		   });
		//END OF MORE STORIES	
		</script>	
	</body>
</html>