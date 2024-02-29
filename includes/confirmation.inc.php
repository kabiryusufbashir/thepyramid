<?php
	$query = $handler->query("SELECT * FROM `pn_users`");
		$row_count = $query->rowCount();
			if($row_count == 0){
				include './includes/create_user.inc.php';	
			}else if($row_count > 0){
				include './includes/logging_form.inc.php';
			}
?>