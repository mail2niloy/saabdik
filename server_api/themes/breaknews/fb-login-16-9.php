<?php

/*
Template Name: Fb login

*/

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


	<script>
		/*
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '286403768857934',
	      cookie     : true,
	      xfbml      : true,
	      version    : 'v3.1'
	    });
	      
	    FB.AppEvents.logPageView(); 

	   
	      
	  };

	  function checkLoginState() {
		  FB.getLoginStatus(function(response) {
		    statusChangeCallback(response);
		  });
		}

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "https://connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	  */
	</script>

		

	
			<nav class="navbar navbar-findcond navbar-fixed-top">
			    <div class="container">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="http://www.saabdik.com/"><img src="http://www.saabdik.com/wp-content/uploads/2018/09/logo-sabdik11.png">
				      </a>
				    </div>
				    <div class="collapse navbar-collapse" id="navbar">
				      <ul class="nav navbar-nav navbar-right">
				       
				        <li class="active"><a href="http://www.saabdik.com/"> হোম <span class="sr-only">(current)</span></a></li>
				        <li class="active"><a href=" http://www.saabdik.com/categories/"> শ্রেণী <span class="sr-only">(current)</span></a></li>
				        <li class="active"><a href="#">লিখুন <span class="sr-only">(current)</span></a></li>
				        <li class="active"><a href="#">সাইন ইন <span class="sr-only">(current)</span></a></li>
				        <!--<li class="dropdown">
				          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin <span class="caret"></span></a>
				          <ul class="dropdown-menu" role="menu">
				            <li><a href="#">Geri bildirim</a></li>
				          </ul>
				        </li>-->

				        <?php //wp_nav_menu( array( 'container' => false, 'theme_location' => 'main-menu', 'menu_class' => 'active sr-only' ) ); ?>
				      </ul>
				      <form class="navbar-form navbar-right search-form" role="search">
				        <input type="text" class="form-control" placeholder="টাইপ করুন" />
				      </form>
				    </div>
				</div>
			</nav>
			
			<div class="container-fluid">
				<div class="row login" style="margin-top:100px">
					<div class="col-md-3"></div>
						<div class="col-md-6 signup_form">
								<div class="login_form">
									<form id="" action="" method="post"> 
										<label for="tab-1" class="tab">Sign In</label><br>

										<label class="my-username" >Username</label><br> 
										<input type="text" name="username" class="text" value=""><br> 
										<label class="my-password" >Password</label><br>

										<input type="password" name="password" class="text" value=""> <br> 
										<label> 
										<input class="myremember" name="rememberme" type="checkbox" value="forever"><span class="hey">Remember me</span></label> 
										<br><br> 
										<input type="submit" id="loginbtn" name="submit" value="Login"> </form>


										<div class="g-signin2 gbtn" data-width="238" data-height="45" data-longtitle="true" data-onsuccess="onSignIn">
										</div>

								</div>

						</div>
					<div class="col-md-3"></div>
				</div>

					
			</div>
		</div>

		<?php get_footer();  ?>



