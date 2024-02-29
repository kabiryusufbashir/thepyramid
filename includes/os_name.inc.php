<?php
	$os_name = $_SERVER['HTTP_USER_AGENT'];
		if(strpos($os_name, 'Windows')){
			$os_name = 'Windows';
		}else if(strpos($os_name, 'Macintosh')){
			$os_name = 'Macintosh';
		}else if(strpos($os_name, 'Linux')){
			$os_name = 'Linux or Android';
		}else if(strpos($os_name, 'iPhone')){
			$os_name = 'iPhone';
		}else{
			$os_name = 'Others';
		}
?>