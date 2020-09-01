<?php

/*
Template Name: Fb login

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

	<?php wp_head(); ?>



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
				
				<!--<div class="signup_div">
					<img src="<?php //echo get_template_directory_uri(); ?>/images/logo.png" >
					<h2><?php //echo $msg; ?></h2>
					<h2>নিজে পড়ুন ও অন্যের সাথে শেয়ার করুন</h2>
					<div class="g-signin2 "  data-longtitle="true" data-onsuccess="onSignIn"></div>

					<h3>অথবা</h3>
					<input type="button" id="signupbtn" name="submit" value="লগইন করুন" class="signup_btn">

				</div>-->
				
				<div class="login_div">
					<?php echo do_shortcode( '[nextend_social_login provider="google"]' ); ?>
					<?php echo do_shortcode( '[nextend_social_login provider="facebook"]' ); ?>
					
				</div>
			</div>
			<div class="col-md-4 col-sm-3"></div>
				

		</div>
	</div>


		

<?php 

get_footer();
}
?>
		



