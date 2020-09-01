<?php
/*
*Template Name: new password check
*/
		
		
		
		if(isset($_POST["submit_password"]))
		{
			$user_id=$_POST["user_id"];
			//echo $user_id;
			$new_password=$_POST["new_password"];
			//echo $new_password;
			$update_user = wp_update_user(array('ID'=>$user_id  , 'user_pass' => $new_password ));
     		if ( is_wp_error( $update_user ) ) 
     		{
				//echo 'can not update';
				header("location:".home_url()."/signin/?error=1");
				//$msg='password can not update';
			} 
			else 
			{	//echo 'update';
				header("location:".home_url()."/signin/?error=2");
				//$msg='Success';
			}
		}


		$email_id=$_REQUEST["email"];
		$url_token=$_REQUEST["token"];
		$user = get_user_by( 'email', $email_id);
		$userId = $user->ID;
		$key="user_token";
	    $single=true; 
	    $get_token=get_user_meta($userId,$key,$single);
	   
		if(strcmp($get_token, $url_token) == 0)
		{
			get_header();
			
?>
<div class="container-fluid">
	<div class="row login" style="margin-top:100px">
		<div class="col-md-12 col-xs-12 col-sm-12">
			<div class="new_register_div">
					<form id="password_form" name="password_form" action="" method="post"> 
						<div id="feedback"></div>
						<input type="hidden" name="user_id" value="<?php echo $userId; ?>">
						<input type="password" name="new_password" class="text" value="" placeholder="নতুন পাসওয়ার্ড লিখুন" id="new_password"  required><br>  
						<input type="password" name="conform_password" class="text" value="" placeholder="নতুন পাসওয়ার্ড পুনরায় লিখুন " id="conform_password"  required> 
						<span id="error_msg"></span>
						<br> 

						<input type="submit" id="submit" name="submit_password" value="সাবমিট করুন " class="register_btn">
					</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function($){
			jQuery("#password_form").submit(function(){
				//e.preventDefault();
				var password=jQuery("#new_password").val();
				var con_password=jQuery("#conform_password").val();
				//alert(password+" "+con_password);
				if(password!=con_password)
				{
					jQuery("#error_msg").html("কনফার্ম পাসওয়ার্ড ঠিক করে লিখুন ");
					return false;
				}
				return true;
			});
			
			jQuery("#conform_password").on('keyup',function(){
				jQuery("#error_msg").html("");
			})
		});
	</script>
</div>
<?php
}else{
	header("location:".home_url()."/reset-password?error=1");
}
get_footer();
?>