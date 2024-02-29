<?php
	$browser_name = $_SERVER['HTTP_USER_AGENT'];
		if(strpos($browser_name, 'Firefox')){
			$browser_name = 'Firefox'; 
		}else if(strpos($browser_name, 'Chrome')){
			$browser_name = 'Chrome';
		}else if(strpos($browser_name, 'MSIE')){
			$browser_name = 'Internet Explorer';
		}else if(strpos($browser_name, 'Safari')){
			$browser_name = 'Safari';
		}else{
			$browser_name = 'Others';
		}
?>