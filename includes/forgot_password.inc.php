<? session_start(); ?>

<!--
	Name: Pyramid NewsPaper
	Author (s): teampiccolo
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="en">

	<head>
		<title>
			Pyramid Newspaper
		</title>
		<link rel="stylesheet" type="text/css" href="../css/index.css" />
		<link rel="Icon" type="image/ico" href="../images/favicon.ico" />
		<meta charset="utf-8">
		
		<script type="text/javascript">
			var myVar=setInterval(function(){myTimer()},1000);
			function myTimer(){
				var d=new Date();
				var t="Time: " +d.toLocaleTimeString();
				document.getElementById("time").innerHTML=t;
			}
		</script>
	</head>
	
	<body>
		
		<div id="form_login">	
			<img src="../images/banner.png" />
				<form>
				<div id="feed_back"></div>
					<b>Forgot Password</b><hr /><br />
					<b>Email Address:</b><br />
					<input id="email_address" class="input" type="text" placeholder="Enter your Email Address Here"><br /><br />
					<b>First Name:</b><br />
					<input id="full_name" class="input" type="text" placeholder="Enter your Full Name Here"><br /><br />
					<b>Phone No:</b><br />
					<input id="phone_no" class="input" type="text" placeholder="Enter your Phone No Here"><br /><br />
					<input id="check_details" class="submit_login" type="button" value="Confirm">
					<label id="login"><a href="../login.php">Login</a></label>
				</form>
		</div>	
		
		<script type="text/javascript" src="../scripts/jquery.js"></script>
		<script type="text/javascript">
			$('#check_details').click(function(){
				var email_address = $('#email_address').val();
				var full_name = $('#full_name').val();
				var phone_no = $('#phone_no').val();
				var email_length = $('#email_address').val().length;
				var name_length = $('#full_name').val().length;
				var phone_length = $('#phone_no').val().length;
					if(email_length > 0){
						if(name_length > 0){
							if(phone_length > 0){
								$('#check_details').remove();
									$.post('../functions/forgot_pass.php', {email_address:email_address, full_name:full_name, phone_no:phone_no},
										function(data){
											$('#feed_back').html(data+'<hr />');
										}
									);
							}else{
								$('#feed_back').html('<b>Phone No field empty...</b><hr />');
							}	
						}else{
							$('#feed_back').html('<b>First Name field empty...</b><hr />');
						}
					}else{
						$('#feed_back').html('<b>Email Address field empty...</b><hr />');
					}
			});
		</script>
		
	</body>
</html>