<?php 
	if(isset($_SESSION['user_id'], $_SESSION['user_name'])){
		$user_id = $_SESSION['user_id']; 
		$user_name = $_SESSION['user_name']; 
			include '../includes/connect.inc.php';
				$sql = $handler->query("SELECT `user_email` FROM `pn_users` WHERE `id`='$user_id'");
					$sql_row = $sql->fetch();
					$user_email = $sql_row['user_email'];
	}else{
		include '../includes/redirect.inc.php';
	}
?>