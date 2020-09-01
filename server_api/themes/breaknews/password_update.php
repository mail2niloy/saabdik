<?php
/**
*Template Name: Author password update
*/
get_header();

$user = get_current_user_id();

$user_info = get_userdata($user);
      //$userloginname = $user_info->user_login;
      //$firstname = $user_info->user_nicename;
      $pass = $user_info->user_pass;

  if(isset($_POST['update_btn']))
     {
     	$old_password=$_POST["old_pass"];
		$check_password = wp_check_password($old_password, $pass, $user);
	
     	$old_password=$_POST["old_pass"];
     	$update_pass = $_POST['new_pass'];
     	$has_pass=wp_hash_password($old_password);
     	if($check_password==$user) 
     	{
     		$update_user = wp_update_user(array('ID'=>$user  , 'user_pass' => $update_pass ));
     		if ( is_wp_error( $update_user ) ) 
     		{
				//echo 'can not update';
				$msg='password can not update';
			} 
			else 
			{
				//echo 'Success!';
				$msg='Success';
			}
     	}
     	else
     	{
     		$msg='your given current password is wrong';
     	}
     	
     	

     	

     	

     }

?>
	
<div class="container-fluid">
	<div class="row" style="margin-top:32px">
		<!-- pop up div -->
	
	
		<div class="fb-profile">
	        <img align="left" class="fb-image-lg" src="http://www.saabdik.com/wp-content/uploads/2018/09/banner-background-img-6.jpg" width="100%"/>
	        <img align="left" class="fb-image-profile thumbnail" src="<?php echo esc_url( get_avatar_url( $id ) );?>" alt="Profile image example"/>
	        <div class="fb-profile-text">
	            <h1><?php the_author_meta('display_name', $id); ?></h1>
	            <p><?php the_author_meta('description', $id); ?></p>
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="about">
				<h2><?php echo $msg; ?></h2>
				<?php //wp_editor( $content, $editor_id ); ?>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="col-md-12">		  
			<div class="show_about_text"><?php //the_author_meta('description', $user); ?></div>
		</div>
	</div>
</div>




	<div class="container profile_edit_div">
		
		
		<div class="row section1">
			<div class="col-md-12 col-xs-12 col-sm-12">
			<form method="post" id="password_from">
				<div class="row profile_heading">
					<h2>পাসওয়ার্ড আপডেট</h2>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-6 col-xs-6 col-sm-6">
						<label>বর্তমান পাসওয়ার্ড*</label>
						<input type="password" class="info_text " name="old_pass" placeholder="Enter Current Password" value="" id="old_pass">
						<span id="current_psw_msg"></span>
						
						
						
					</div>
					<div class="col-md-6 col-xs-6 col-xm-6">
					  
						<label>নতুন পাসওয়ার্ড*</label>
						<input type="password" class="info_text  input_space" value="" name="new_pass" placeholder="New Password" id="new_pass">
						<span id="new_psw_msg"></span>
						<input type="hidden" value="<?php echo $pass;  ?>" id="bdpass">
						<label>পাসওয়ার্ড নিশ্চিত করুন*</label>
						<input type="password" class="info_text" name="confirm_pass" placeholder="Confirm Password" id="confirm_pass">
						<span id="conf_psw_msg"></span>
					</div>
				</div>
			</div>
		</div>
		<div class="row user_save">
			<input type="submit" id="submit_btn" class="update_button" value="পাসওয়ার্ড আপডেট" name="update_btn">
		</div>
		</form>
	</div>


<script type="text/javascript">


	
	jQuery(document).ready(function(){

		/*jQuery('#new_pass').on('click',function(){

		var hashpass =  CryptoJS.MD5(jQuery("#old_pass").val());
		//if(CryptoJS.MD5($("#txtOldPassword").val())) != oldPassword) {

		jQuery('.show_about_text').append(about_text);
		jQuery('#user_desc').val(about_text);

		});*/

		jQuery("#password_from").submit(function(){

			var new_pass= jQuery('#new_pass').val();
			var confirm_pass= jQuery('#confirm_pass').val();
			var current_password=jQuery('#old_pass').val();
			alert(new_pass+'   '+confirm_pass+' '+current_password);

			/*if(new_pass == confirm_pass)

				//if(CryptoJS.MD5(jQuery("#txtOldPassword").val())) != oldPassword)
			{
				alert(' Updated');
				window.location.href="http://www.saabdik.com/%E0%A6%AA%E0%A7%8D%E0%A6%B0%E0%A7%8B%E0%A6%AB%E0%A6%BE%E0%A6%87%E0%A6%B2/";
			}
			else
			{
				alert('Password doesn\'s match');	
			}*/
 			/*if(new_pass==""||new_pass==null )
 			{
 				alert("hi");
 				jQuery("#current_psw_msg").html("দয়া করে বর্তমান পাসওয়ার্ড লিখুন ");
 				return false;
 			}
 			else{
 				alert("hiii");
 				 check=1;
 				validation();
 			}

 			if(confirm_pass=="" || confirm_pass==null)
 			{
 				jQuery("#new_psw_msg").html("দয়া করে নতুন পাসওয়ার্ড লিখুন ");
 				return false;
 			}
 			else{

 				
 				 check=1;
 				validation();
 			}
 			
 			if(current_password=="" || current_password==null)
 			{
 				
 				jQuery("#conf_psw_msg").html("দয়া করে নতুন পাসওয়ার্ড আবার লিখুন ");
 				return false;
 			}
 			else{
 				check=1;
 				validation();
 			}

 			if(new_pass!=current_password)
 			{
 				jQuery("#conf_psw_msg").html("দয়া করে পাসওয়ার্ড ঠিক মতো লিখুন");
 				return false;
 			}
 			else{
 				 check=1;
 				validation();
 			}

 			function validation()
 			{
 				if(check==1)
					{
						//alert("success");
						return true;
					}
					else{
						return false;
					}
				}
 			

		});*/


	});
</script>


<?php  get_footer(); ?>
