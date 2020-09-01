<?php
/*
*Template Name: new reset password
*/


global $wpdb, $user_ID;
if (!$user_ID) {
	if(isset($_REQUEST["error"]))
	{
		$error_val=$_REQUEST["error"];
		if($error_val==1)
		{
			$msg="Enter a valid email id";
		}
		else{
			$msg="check your mail";
		}
	}
	get_header();
?>
<div class="container-fluid">
	<div class="row login" style="margin-top:100px">
		<div class="col-md-12 col-xs-12 col-sm-12">
			<div class="signup_div">
				<img src="<?php echo get_template_directory_uri(); ?>/images/logo1.png" width="90">
				<h2><?php echo $msg; ?></h2>
				<h2>আপনার ইমেইল ইডি লিখুন</h2>
				<form id="emailcheckform" name="emailcheckform" action="<?php home_url();?>/send-mail" method="post"> 
					<input type="email" name="email_id" class="text" value="" placeholder="" id="email_id"  required>
					<br>
					<input type="submit" id="signupbtn" name="submit" value="সাবমিট  করুন" class="register_btn">
				</form>
			</div>
		</div>
	</div>
</div>
<?php
}
else {
wp_redirect( home_url() ); exit;

}
get_footer();
?>