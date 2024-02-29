<head>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
</head>
<?php
	if(isset($_POST['user_id'])){
		$user_id = htmlentities(($_POST['user_id']));
			include '../includes/connect.inc.php'?>
				<?php
					if($query = $handler->query("SELECT `user_name` FROM `pn_users` WHERE `id`='$user_id'")){
						$query_row = $query->fetch();
							$user_name = $query_row['user_name'];
					}else{
						echo 'Error: Please try again...';
					}
				?>
				<div id="dialogoverlay"></div>
				<div id="dlgbox">
					<div id="dlg_header">
						User Trash
						<span title="close" class="close">×</span>
					</div>
					<div id="dlg_body">
						<div id="check"></div>
						Are you sure you want to trash this user <?php echo ' <b id="user_name" user_id="'.$user_id.'">'.$user_name.'?</b>'?>
					</div>
					<div id="dlg_footer">
						<button onclick="dlgLogYes()">Yes</button>
						<button onclick="dlgLogNo()">No</button>
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
		user_id = $('#user_name').attr('user_id');
			$.post('../functions/user_trash_confirm.php', {user_id:user_id},
				function(data){
					$('#check').html('<b>'+data+'</b><hr />');
				});
	}

</script>