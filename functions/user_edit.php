<head>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
</head>
<?php
	if(isset($_POST['user_id'])){
		$user_id = htmlentities(($_POST['user_id']));
			include '../includes/connect.inc.php'?>
				<div id="dialogoverlay"></div>
				<div id="dlgbox">
					<div id="dlg_header">
						Edit User
						<span title="close" class="close">×</span>
					</div>
					<div id="dlg_body">
						<div id="check"></div>
						
						<?php
							$query = $handler->query("SELECT * FROM `pn_users` WHERE `id`='$user_id'");
								$query_row = $query->fetch();
									$user_id = $query_row['id'];	
									$email = $query_row['user_email'];	
									$username = $query_row['user_name'];	
									$status = $query_row['user_status'];
										if($status == 1){
											$status = 'Active';
										}else if($status == 0){
											$status = 'De-active';
										}
						?>
							Email: <input id="email" title="Email" user_id="<?php echo $user_id;?>" class="act_title_text" type="text" value="<?php echo $email; ?>"><br />
							Username: <input id="username" title="Username" class="act_title_text" type="text" value="<?php echo $username; ?>"><br />
							Status: <input id="status" title="Status" class="act_title_text" type="text" value="<?php echo $status; ?>"><br />
							
							
					</div>
					<div id="dlg_footer">
						<button onclick="dlgLogYes()">Edit</button>
						<button onclick="dlgLogNo()">Cancel</button>
					</div>
				</div>
	<?php
	}
	?>
<script type="text/javascript">
	var dlg = document.getElementById("dlgbox");
	var span = document.getElementsByClassName("close")[0];
	var dialogoverlay = document.getElementById("dialogoverlay");
	var winWidth = window.innerWidth;
	var winHeight = window.innerHeight;
		dialogoverlay.style.display = "block";
		dialogoverlay.style.height = winHeight +"px";
	
	$('.close').click(function(){
		dlg.style.display = "none";
		dialogoverlay.style.display = "none";
	});
	
	
	function dlgLogNo(){
		dlg.style.display = "none";
		dialogoverlay.style.display = "none";
	}
	
	function dlgLogYes(){
		user_id = $('#email').attr('user_id');
		email = $('#email').val();
		username = $('#username').val();
		status = $('#status').val();
			$.post('../functions/user_edit_confirm.php', {user_id:user_id, email:email, username:username, status:status},
				function(data){
					$('#check').html('<b>'+data+'</b><hr />');
				});
	}
	
	function change_image(){
		user_id = $('#post_title').attr('user_id');
			alert();
	}

</script>