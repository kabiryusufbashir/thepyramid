<?php
	if($pages >= 1 && $pages != 1){
		for($x=1; $x <=$pages; $x++){
			echo '<div style="float:left; margin-bottom:18px; position:relative; top:5px;"><a style="background:#666; border-right:1px solid #f6f6f6; text-decoration:none; color:#fff; padding:7px 15px;" href="?page='.$x.'">'.$x.'</a></div>';
		}
	}
?>