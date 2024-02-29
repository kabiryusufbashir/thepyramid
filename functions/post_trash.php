<head>
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
</head>
<?php
	if(isset($_POST['post_id'])){
		$post_id = htmlentities(($_POST['post_id']));
			include '../includes/connect.inc.php'?>
				<?php
					if($query = $handler->query("SELECT `post_title` FROM `pn_post` WHERE `id`='$post_id'")){
						$query_row = $query->fetch();
							$post_title = $query_row['post_title'];
					}else{
						echo 'Error: Please try again...';
					}
				?>
				<div id="dialogoverlay"></div>
				<div id="dlgbox">
					<div id="dlg_header">
						Post Trash
						<span title="close" class="close">×</span>
					</div>
					<div id="dlg_body">
						<div id="check"></div>
						Are you sure you want to trash this post <?php echo ' <b id="post_title" post_id="'.$post_id.'">'.$post_title.'?</b>'?>
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
		post_id = $('#post_title').attr('post_id');
			$.post('../functions/post_trash_confirm.php', {post_id:post_id},
				function(data){
					$('#check').html('<b>'+data+'</b><hr />');
				});
	}

</script>