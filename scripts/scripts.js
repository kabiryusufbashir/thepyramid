$('#click_me_btn').click(function(){
	$('#nav_hide').toggle();
});

//SEARCH BOX
	$('#search_box').keypress(function(e){
		if(e.keyCode == 13){
			$('#search').html('Searching...');
			var search_box = $('#search_box').val();
				$.post('./search.php', {search_box:search_box}, function(data){
					$('#search').html(data);
				});
		}	
	});
//END OF SEARCH BOX

//SHOW PASSWORD BOX
	$('.show_password').after('<input style="margin-top:8px" class="sp_checkbox" type="checkbox" /> Show Password');
		$('.sp_checkbox').change(function(){
				var prev = $(this).prev();
				var value = prev.val();
				var type = prev.attr('type');
				var id = prev.attr('id');
				var clas = prev.attr('class');
				var new_type = (type == 'password') ? 'text' : 'password';
				prev.remove();
		$(this).before('<input type="'+ new_type +'" value="'+ value +'" class="'+ clas +'" id="'+ id +'">');
	});
	
//END OF SHOW PASSWORD BOX

//FORGET PASSWORD
	$('#forget_password').click(function(){
		window.location = 'includes/forgot_password.inc.php';
	});
	
	$('#check_details').click(function(){
		var email_address = $('#email_address').val();
		var full_name = $('#first_name').val();
		var phone_no = $('#phone_no').val();
		var email_length = $('#email_address').val().length;
		var name_length = $('#full_name').val().length;
		var phone_length = $('#phone_no').val().length;
		var designation_length = $('#designation').val().length;
			if(email_length > 0){
				if(name_length > 0){
					if(phone_length > 0){
						$('#check_details').remove();
							$.post('../functions/forgot_password.php', {email_address:email_address, full_name:full_name, phone_no:phone_no},
								function(data){
									$('#feed_back').html(data+'<hr />');
								}
							);
					}else{
						$('#feed_back').html('<b>Phone No field empty...</b><hr />');
					}	
				}else{
					$('#feed_back').html('<b>Full Name field empty...</b><hr />');
				}
			}else{
				$('#feed_back').html('<b>Email Address field empty...</b><hr />');
			}
	});
//END OF FORGET PASSWORD

//LOGIN AUTHENTICATION
	$('#password_login').keypress(function(e){
		if(e.keyCode == 13){
			$('#submit_login').trigger('click');	
		}
	});
	
	$('#submit_login').click(function(){
		$('#feedback_login').css('display', 'block').html('<p style="color:#36ef6a;">Authenticating Credentials...</p>');
		var email_address_login = $('#email_address_login').val();
		var password_login = $('#password_login').val();
			if(email_address_login != ''){
				if(password_login != ''){
					$.post('./functions/logging.php', {email_address_login:email_address_login, password_login:password_login},
						function(data){
							$('#feedback_login').css('display', 'block').html('<p>' +data +'</p>');
						});
				}else{
					$('#feedback_login').css('display', 'block').html('<p>Password field empty...</p>');
				}
			}else{
				$('#feedback_login').css('display', 'block').html('<p>Email address field empty...</p>');
			}
});//END OF LOGIN AUTHENTICATION

//CREATING SYSTEM

	//PASSWORD AUTHENTICATION
		var password_max = 16;
		$('#password_create').focus(function(){
				$('#feedback_login').css('display', 'block').html('<p>Minimun of 8 characters and Maximun of 15 characters</p>');
		}).blur(function(){
				$('#feedback_login').css('display', 'none');
		}).keyup(function(){
				var password_length = $('#password_create').val().length;
				var password_length_remaining = password_max - password_length;
						if(password_length_remaining <= 0){
								$('#feedback_login').css('display', 'block').html('<p>Characters length exceed...</p>');
						}else{
								if(password_length < 4){
										$('#feedback_login').css('display', 'block').html('<p>Password strength is <i style="color:#ff9090;">Weak...</i></p>');
								}else if(password_length >= 4 && password_length < 8){
										$('#feedback_login').css('display', 'block').html('<p>Password strength is <i style="color:#fffa78;">Good...</i></p>');
								}else if(password_length >= 8 && password_length <= 15){
										$('#feedback_login').css('display', 'block').html('<p>Password strength is <i style="color:#36ef6a;">Strong...</i></p>');
								}
						}
		});


		$('#confirm_password_create').focus(function(){
				$('#feedback_login').css('display', 'none');
		}).blur(function(){
				$('#feedback_login').css('display', 'none');
		}).keyup(function(){
				var password_create_user = $('#password_create').val();
				var password_confirm_user = $('#confirm_password_create').val();
						if(password_confirm_user == password_create_user){
							$('#feedback_login').css('display', 'block').html('<p style="color:#36ef6a;">Password matched...</p>');
						}else{
							$('#feedback_login').css('display', 'block').html('<p>Password not matched...</p>');
						}
		});
		//END OF PASSWORD AUTHENTICATION

		$('#submit_create_user').click(function(){
			var email_address = $('#email_address_create').val();
			var username = $('#username_create').val();
			var password = $('#password_create').val();
			var confirm_password = $('#confirm_password_create').val();
					if(email_address != ''){
						if(username != ''){
							if(password != ''){
									if(password.length >= 8 || password.length <= 15){
											if(confirm_password != ''){
													if(confirm_password == password){
														$.post('./functions/setup.php', {email_address:email_address, username:username, password:password, confirm_password:confirm_password},
																function(data){
																	$('#feedback_login').css('display', 'block').html('<p>' +data +'</p>');
																});
													}else{
														$('#feedback_login').css('display', 'block').html('<p>Password not matched...</p>');
													}
											}else{
												$('#feedback_login').css('display', 'block').html('<p>Confirm password field empty...</p>');
											}
									}else{
										$('#feedback_login').css('display', 'block').html('<p>Minimun of 8 characters and Maximun of 15 characters</p>');
									}
							}else{
									
									$('#feedback_login').css('display', 'block').html('<p>Password field empty...</p>');
							}
						}else{
							$('#feedback_login').css('display', 'block').html('<p>Username field empty...</p>');
						}	
					}else{
						$('#feedback_login').css('display', 'block').html('<p>Email address field empty...</p>');
					}
});//END OF CREATING SYSTEM

//END OF SMALL NAVIGATION(TABLET && < )
$('.bg_menu').click(function(){
	$('.nav_small').css('display', 'block');
});

$('.close').click(function(){
	$('.nav_small').css('display', 'none');
});
//END OF SMALL NAVIGATION(TABLET && < )

//POST
	
	//POST EDIT
	$(document).on('click', '#post_edit', function(){
		var post_id = $(this).attr('post_id');
			$.post('../functions/post_edit.php', {post_id:post_id},
				function(data){
					$('#feed_back').html(data);
				});
	});
	//END OF POST EDIT 
	
	//POST CHANGE IMAGE
	$(document).on('click', '#c_image', function(){
		alert();
	});
	//END OF POST CHANGE IMAGE
	
	//POST TRASH
	$(document).on('click', '#post_trash', function(){
		var post_id = $(this).attr('post_id');
			$.post('../functions/post_trash.php', {post_id:post_id},
				function(data){
					$('#feed_back').html(data);
				});
	});
	//END OF POST TRASH
	
	//POST RESTORE
	$(document).on('click', '#restore', function(){
		var post_id = $(this).attr('post_id');
			$.post('../functions/post_restore.php', {post_id:post_id},
				function(data){
					$('#feed_back').html(data+'<hr />');
				});
	});
	//END OF POST RESTORE
//END OF POST

//ADDING USER
	$('#add_user').click(function(){
		var first_name = $('#first_name').val();
		var last_name = $('#last_name').val();
		var other_name = $('#other_name').val();
		var username = $('#username').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		var address = $('#address').val();
		var password = $('#password').val();
		var gender = $('#gender').val();
		var user_category = $('#user_category').val();
		var user_status = $('#user_status').val();
			if(username != ''){
				if(email != ''){
					if(password != ''){
						if(user_category != ''){
							if(user_status != ''){
								$.post('../functions/new_user_add.php', {first_name:first_name, last_name:last_name, other_name:other_name, username:username, email:email, phone:phone, address:address, password:password, gender:gender, user_category:user_category, user_status:user_status}, function(data){
									$('#feed_back').html('<b>'+data+'</b><hr />');
								});
							}else{
								$('#feed_back').html('<b>User Status field empty...</b><hr />');
							}
						}else{
							$('#feed_back').html('<b>User Category field empty...</b><hr />');
						}
					}else{
						$('#feed_back').html('<b>Password field empty...</b><hr />');
					}
				}else{
					$('#feed_back').html('<b>Email Address field empty...</b><hr />');
				}
			}else{
				$('#feed_back').html('<b>Username field empty...</b><hr />');
			}
	});
//END OF ADDING USER

//USER EDIT
	$(document).on('click', '#user_edit', function(){
		var user_id = $(this).attr('user_id');
			$.post('../functions/user_edit.php', {user_id:user_id},
				function(data){
					$('#feed_back').html(data);
				});
	});
	//END OF USER EDIT 
	
	
	//USER TRASH
	$(document).on('click', '#user_trash', function(){
		var user_id = $(this).attr('user_id');
			$.post('../functions/user_trash.php', {user_id:user_id},
				function(data){
					$('#feed_back').html(data);
				});
	});
	//END OF USER TRASH
//END OF USER EDIT
		
//CHANGE PASSWORD
	//PASSWORD AUTHENTICATION
		var password_max = 16;
		$('#new_pass').focus(function(){
				$('#feed_back').html('Minimun of 8 characters and Maximun of 15 characters<hr />');
		}).blur(function(){
				$('#feed_back').css('display', 'none');
		}).keyup(function(){
				var password_length = $('#new_pass').val().length;
				var password_length_remaining = password_max - password_length;
						if(password_length_remaining <= 0){
								$('#feed_back').html('Characters length exceed...<hr />');
						}else{
								if(password_length < 4){
										$('#feed_back').html('Password strength is <i style="color:#ff9090;">Weak...</i><hr />');
								}else if(password_length >= 4 && password_length < 8){
										$('#feed_back').html('Password strength is <i style="color:#fffa78;">Good...</i><hr />');
								}else if(password_length >= 8 && password_length <= 15){
										$('#feed_back').html('<p>Password strength is <i style="color:#36ef6a;">Strong...</i></p>');
								}
						}
		});


		$('#confirm_pass').focus(function(){
				$('#feed_back').css('display', 'none');
		}).blur(function(){
				$('#feed_back').css('display', 'none');
		}).keyup(function(){
				var password_create = $('#new_pass').val();
				var password_confirm = $('#confirm_pass').val();
						if(password_confirm == password_create){
							$('#feed_back').css('display', 'block').html('<p style="color:#36ef6a;">Password matched...</p>');
						}else{
							$('#feed_back').css('display', 'block').html('<p>Password not matched...</p>');
						}
		});
		//END OF PASSWORD AUTHENTICATION

	$('#change_password').click(function(){
		var user_id = $('#old_pass').attr('user_id');
		var old_pass = $('#old_pass').val();
		var new_pass = $('#new_pass').val();
		var confirm_pass = $('#confirm_pass').val();
				if(old_pass != ''){
					if(new_pass != ''){
						if(new_pass.length >= 8 || new_pass.length <= 15){
							if(confirm_pass != ''){
								if(confirm_pass == new_pass){
									$.post('../functions/change_pass.php', {user_id:user_id, old_pass:old_pass, new_pass:new_pass, confirm_pass:confirm_pass},
										function(data){
											$('#feed_back').css('display', 'block').html(data +'<hr />');
										});
								}else{
									$('#feed_back').html('Password not matched...<hr />');
								}
							}else{
								$('#feed_back').html('Confirm password field empty...<hr />');
							}
						}else{
							$('#feed_back').html('Minimun of 8 characters and Maximun of 15 characters...<hr />');
						}
					}else{
						$('#feed_back').html('New Password field empty...<hr />');
					}
				}else{
					$('#feed_back').html('Old Password field empty...<hr />');
				}
	});	
//END OF CHANGE PASSWORD

//PHOTO NEWS TRASH
	$(document).on('click', '#photo_news_trash', function(){
		var post_id = $(this).attr('post_id');
			$.post('../functions/photo_news_trash.php', {post_id:post_id},
				function(data){
					$('#feed_back').html(data);
				});
	});
//END OF PHOTO NEWS TRASH

//ADVERT
	
	//ADVERT EDIT
	$(document).on('click', '#advert_edit', function(){
		var advert_id = $(this).attr('advert_id');
			$.post('../functions/advert_edit.php', {advert_id:advert_id},
				function(data){
					$('#feed_back').html(data);
				});
	});
	//END OF ADVERT EDIT 
	
	//ADVERT CHANGE IMAGE
	$(document).on('click', '#c_image', function(){
		alert();
	});
	//END OF ADVERT CHANGE IMAGE
	
	//ADVERT TRASH
	$(document).on('click', '#advert_trash', function(){
		var advert_id = $(this).attr('advert_id');
			$.post('../functions/advert_trash.php', {advert_id:advert_id},
				function(data){
					$('#feed_back').html(data);
				});
	});
	//END OF ADVERT TRASH
	
	//ADVERT RESTORE
	$(document).on('click', '#restore', function(){
		var advert_id = $(this).attr('advert_id');
			$.post('../functions/advert_restore.php', {advert_id:advert_id},
				function(data){
					$('#feed_back').html(data+'<hr />');
				});
	});
	//END OF ADVERT RESTORE
//END OF ADVERT