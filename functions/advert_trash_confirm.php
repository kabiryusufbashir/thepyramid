<?php
	if(isset($_POST['advert_id'])){
		$advert_id = htmlentities($_POST['advert_id']);
			include '../includes/connect.inc.php';
				if($query = $handler->query("UPDATE `pn_adverts_photo` SET `post_status`='Trash' WHERE `id`='$advert_id'")){
					echo 'Advert moved to recycle bin...';
					echo '<script type="text/javascript">
							function counter(time, url){
								var interval = setInterval(function(){
									time = time - 1;
											if(time == 0){
												clearInterval(interval);
												window.location = url;
											}
								}, 1000)
							}
							counter(3, "../dashboard/all_adverts.php");
						</script>';
				}else{
					echo 'Error: Please try again later...';
				}
	}
?>