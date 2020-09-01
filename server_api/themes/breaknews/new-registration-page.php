<?php
/*
*Template Name: New registration page
*/

global $user_ID;
global $wpdb;
if($user_ID)
{
	 header( 'Location:' . home_url() ); 
}
else
{
	if($_POST)
	{
		$username=$wpdb->escape($_POST["userEmail"]);
		$password=$wpdb->escape($_POST["userPass"]);
		$login_array=array();
		$login_array["user_login"]=$username;
		$login_array["user_password"]=$password;
		$login_array['remember'] = true;
		$verify_user = wp_signon($login_array,true);
		if(!is_wp_error($verify_user))
		{
			//echo "<script>window.location='".site_url()."'</script>";
			header("location:http://www.saabdik.com");
		}
		else{
			//echo "invalid";
				$msg=" লগ ইন অসফল,অনুগ্রহ করে পুনরায় প্রচেষ্টা করুন";
		}
	}
?>
	<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_bloginfo('url');?>/wp-includes/css/dashicons.css" />

	<script src="https://apis.google.com/js/platform.js"" async defer></script>

	<meta name="google-signin-client_id" content="261285694182-3v9v8eq2v9q081e4868p8r3kiflk9u9u.apps.googleusercontent.com">
	<?php 
		get_header();
	?>
</head>
<body <?php body_class(); ?>>
	<nav class="navbar navbar-findcond navbar-fixed-top">
	    <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="http://www.saabdik.com/"><img src="http://www.saabdik.com/wp-content/uploads/2018/09/logo-sabdik1.png" width="90">
		      </a>
		    </div>
		    <div class="collapse navbar-collapse" id="navbar">
		      <ul class="nav navbar-nav navbar-right">
		       
		        <li class="active"><a href="http://www.saabdik.com/"> হোম <span class="sr-only">(current)</span></a></li>
		        <li class="active"><a href=" http://www.saabdik.com/categories/"> শ্রেণী <span class="sr-only">(current)</span></a></li>
		        <li class="active"><a href="#">লিখুন <span class="sr-only">(current)</span></a></li>
		        <li class="active"><a href="http://www.saabdik.com/signin/">সাইন ইন <span class="sr-only">(current)</span></a></li>
		        <li class="active"><a href="http://www.saabdik.com/signup/">একাউন্ট বানান<span class="sr-only">(current)</span></a></li>
		        <!--<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Geri bildirim</a></li>
		          </ul>
		        </li>-->

		        <?php //wp_nav_menu( array( 'container' => false, 'theme_location' => 'main-menu', 'menu_class' => 'active sr-only' ) ); ?>
		      </ul>
		    </div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row login" style="margin-top:100px">
			<div class="col-md-4 col-sm-3"></div>
			<div class="col-md-4 col-xs-12 col-sm-6">
				<div class="new_register_div">
					<form id="registration" action="" method="post"> 

						<!--<label for="tab-1" class="tab">New User Register</label><br> -->
						<div id="feedback"></div>
						<input type="text" name="full_name" class="text" value="" placeholder="আপনার পুরো নাম লিখুন" id="fullname"  required><br>  
						<input type="text" name="email_id" class="text" value="" placeholder="ইমেইল আইডি" id="emailid"  required><br>
						<input type="password" name="password" class="text" value="" placeholder="পাসওয়ার্ড" id="password"  required> <br> 

						<input type="submit" id="registerbtn" name="new_account_btn" value="নতুন একাউন্ট বানান" class="register_btn">
					</form>
					<h3>অথবা</h3>
					<input type="submit" id="loginbutton" name="reg_submit" value="লগইন করুন" class="login_btn">

				</div>
				<div class="login_div">
					<form id="user_login" action="" method="post"> 

						<!--<label for="tab-1" class="tab">New User Register</label><br> -->
						<div id="error"></div>
						  
						<input type="text" name="userEmail" id="user_email" class="text" value="" placeholder="ইমেইল আইডি" class="input_box" required><br>
						<input type="password" name="userPass" class="text" value="" id="user_pass" placeholder="পাসওয়ার্ড" class="input_box" required> <br> 
						<a href="<?php home_url() ?>/reset-password"><h4>যদি আপনি পাসওয়ার্ড ভুলে গিয়ে থাকেন</h4></a>
						<input type="submit" id="loginbtn" name="login_submit" value=" লগইন করুন" class="register_btn">
						<?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
					</form>
					<h3>অথবা</h3>
					<input type="button" id="newaccoutbtn" name="submit" value="নতুন একাউন্ট বানান" class="login_btn">

				</div>


				</div>
			<div class="col-md-4 col-sm-3"></div>
				

		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function($){
				//$(".new_register_div").hide();
				$(".login_div").hide();

				$("#loginbutton").on('click',function(){
					//alert('123');
					//window.location.replace("http://www.saabdik.com/signin/");
					$(".new_register_div").hide();
					//$(".signup_div").hide();
					$(".login_div").show(); 
				});

				$("#newaccoutbtn").on('click',function(){

					//alert('123');

					$(".new_register_div").show();
					//$(".signup_div").hide();
					$(".login_div").hide();
				});


			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
				//jQuery('#registerbtn').on('click',function(){
				jQuery('#registration').submit(ajaxSubmit);
				function ajaxSubmit() {
					//alert(ajaxurl);
				    //var registrationForm = $("#registration").serialize();
				    var fullname = jQuery('#fullname').val();

					var email = jQuery('#emailid').val();
					var password = jQuery('#password').val();
					//alert(fullname+email+password);
				    jQuery.ajax({
				      	type:    "POST",
				     	url: ajaxurl,
				      	data : {
					        action : 'custom_user_registration',
					        fullname : fullname,
					        email : email,
					        password : password
					    },
						success: function(response) {
						 jQuery("#feedback").html(response);
						 //alert('123');
						  $('#registration')[0].reset();
						}
				    });
				    return false;
				  }	
				});
	</script>
</body>
<?php
}
get_footer();
?>