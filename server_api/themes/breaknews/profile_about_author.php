<?php
/**
*Template Name: Author profile edit
*/
if($user_ID!=0)
{

get_header();

$user = get_current_user_id();

$user_info = get_userdata($user);
$msg = '';
      //$userloginname = $user_info->user_login;
      //$firstname = $user_info->user_nicename;
      $email = $user_info->user_email;
       $pass = $user_info->user_pass;

       if(isset($_POST["lakhok_des"]))
       {
       		 echo $userid = $user;
       		 $description = $_POST['lakhok_description'];
       		 
       		 update_user_meta($userid, 'description', $description);
       }


  if(isset($_POST['user_email']))
     {
     	//print_r($_POST);
     	$fname = $_POST['first_name'];
     	$lname = $_POST['last_name'];
     	$email = $_POST['user_email'];
     	$gender = $_POST['gender'];
     	$phone = $_POST['phone'];
     	//$dob = $_POST['dob'];
        $userid = $_POST['userid'];
        $description = $_POST['description'];

        $format_date=date('Y-m-d', strtotime($_POST['dob']));
		 

     	$update_user = wp_update_user(array('ID'=>$userid  , 'user_email' => $email ));

     	if ( is_wp_error( $update_user ) ) {
			echo 'can not update';
		} 
		else {
			echo 'Success!';
		}

		update_user_meta($userid, 'first_name', $fname);
		update_user_meta($userid, 'last_name', $lname);
		update_user_meta($userid, 'gender', $gender);
		update_user_meta($userid, 'phone', $phone);
		update_user_meta($userid, 'dob', $format_date);
		update_user_meta($userid, 'description', $description);


     }

//for update personal info

 //for update password

     if(isset($_POST['password_btn']))
     {
     	 $current_password=$_POST["current_pass"];
     	 $user_id_pass = $_POST['updateuserid'];
		$check_password = wp_check_password($current_password, $pass, $user);
		//echo $check_password;
     	//$old_password=$_POST["old_pass"];
     	$update_pass = $_POST['new_pass'];
     	$has_pass=wp_hash_password($current_password);
     	//echo $pass;
     	if($check_password === true) 
     	{
     		$update_user = wp_update_user(array('ID'=>$user_id_pass  , 'user_pass' => $update_pass ));
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
     		$msg= 'your given current password is wrong';
     	}     	

     }


?>
		<!--<div id="popup" class="modal-box">	
		  <header>
		    <a href="#" class="js-modal-close close">×</a>	
		    <h3>লেখক পরিচিতি</h3>	
		  </header>	
		  <div class="modal-body">	
		    <textarea  class="about_text"></textarea>	
		    <input type="button" value="Save" class=" js-modal-close about_save"><input type="button" value="Cancel" class=" js-modal-close about_cancle">
		  </div>

		</div>-->
		

		<div class="modal fade" id="popup" role="dialog">
		    <div class="modal-dialog modal-lg">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">লেখক পরিচিতি</h4>
		        </div>
		        <div class="modal-body">
			        <form action="" method="post">
			         	<textarea  class="about_text form-control" id="author_details" name="lakhok_description"></textarea>	
			    		<!--<input type="button" value="সংরক্ষণ করুন" class=" js-modal-close about_save">-->
			    		<input type="submit" value="সংরক্ষণ করুন" class=" js-modal-close about_save" name="lakhok_des">
			    	</form>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		    </div>
		 </div>


		<div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog modal-lg">
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">আপনার প্রোফাইল পিকচার পরিবর্তন করুন</h4>
		        </div>
		        <div class="modal-body">
		          <?php echo do_shortcode('[basic-user-avatars]'); ?>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		    </div>
		 </div>

<div class="container-fluid">
	<div class="row" style="margin-top:32px">
		<!-- pop up div -->
	
	
		<div class="fb-profile">
	        <img align="left" class="fb-image-lg" src="http://www.saabdik.com/wp-content/uploads/2018/09/banner-background-img-6.jpg" width="100%"/>
	        <!--<img align="left" class="fb-image-profile thumbnail" src="<?php //echo esc_url( get_avatar_url( $user ) );?>" alt="Profile image example"/>-->
	        <?php echo get_avatar($user) ?>
	        <!--<a href="" class="js-open-modal" data-modal-id="img_popup"><span class="dashicons dashicons-camera"></span></a>-->
	        <a href=""  data-toggle="modal" data-target="#myModal"><span class="dashicons dashicons-camera"></span></a>
	        <div class="fb-profile-text">

	        	
	        	<?php 

	        //echo $user;
	        	//ini_set('display_errors', 1);
	        	//echo avatar_defaults($user);
	        $upload_path      = wp_upload_dir();
			echo $avatar_full_path = str_replace( $upload_path['baseurl'], $upload_path['basedir'], $local_avatars['full'] );?>
				<br>
			<?php
				
	      //echo get_avatar($user);?>
	      
	            <!--<h1><?php //the_author_meta('display_name', $user); ?></h1>
	            <p><?php //the_author_meta('description', $user); ?></p>-->
	        </div>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="about">
				<h2>নিজের সম্পর্কে কিছু লিখুন</h2><a href="" class="js-open-modal author_popup_btn" data-toggle="modal" data-target="#popup"><span class="dashicons dashicons-edit"></span></a>
				<?php //wp_editor( $content, $editor_id ); ?>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="col-md-12">		
			<form method="post" id="profile_form">  
			  <div class="show_about_text"><?php the_author_meta('description', $user); ?></div>
		</div>
	</div>

	<div class="container profile_edit_div">
		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<div class="card">
					 <ul class="nav nav-tabs" role="tablist">
		                <li role="presentation" class="active"><a href="#profile" aria-controls="home" role="tab" data-toggle="tab">প্রোফাইল</a></li>
		                <li role="presentation"><a href="#password" aria-controls="profile" role="tab" data-toggle="tab">পাসওয়ার্ড আপডেট</a></li>
		            </ul>

				

					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="profile">

							<div class="row profile_heading">
								<h2>ব্যাক্তিগত তথ্য</h2>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6 col-xs-6 col-sm-6">
									 <form action="" method="post">
										<input type="hidden" value="<?php echo $user; ?>" name="userid">
										<input type="hidden" value="<?php the_author_meta('description', $user) ?>" name="description" id="user_desc">

									<label>নামের প্রথমাংশ*</label>
									<input type="text" class="info_text input_space" name="first_name" placeholder="নাম"  value="<?php the_author_meta('first_name', $user); ?>">
								</div>
								<div class="col-md-6 col-xs-6 col-sm-6">
									<label>নামের শেষঅংশ*</label>
									<input type="text" class="info_text input_space" name="last_name" placeholder="Lastname"  value="<?php the_author_meta('last_name', $user); ?>" >
								</div>
							</div>

							<div class="row">
								<div class="col-md-6 col-xs-6 col-sm-6">
									<label>ইমেইল প্রদান করুন</label>
									<input type="text" class="info_text input_space" name="user_email" placeholder="ইমেইল" value="<?php echo $email; ?>"></br>
									<label>লিঙ্গ</label>
									<?php $selected = get_the_author_meta('gender', $user); ?>
									<select class="info_text" id="" name="gender" value="">
									    <option value="লিঙ্গ" <?php echo ($selected == "লিঙ্গ")?  'selected="selected"' : '' ?>>
									    	লিঙ্গ
										</option>
									    <option value="নারী" <?php echo ($selected == "নারী")?  'selected="selected"' : '' ?>>
									    	নারী
										</option>
									    <option value="পুরুষ" <?php echo ($selected == "পুরুষ")?  'selected="selected"' : '' ?>>
									    	পুরুষ
										</option>
									    <option value="অন্যান্য" <?php echo ($selected == "অন্যান্য")?  'selected="selected"' : '' ?>>
									    	অন্যান্য
									    </option>
									 </select>
								</div>
								<div class="col-md-6 col-xs-6 col-sm-6">
									<label>ফোন</label>
									<input type="text" class="info_text input_space" name="phone" placeholder="ফোন" value="<?php the_author_meta('phone', $user); ?>"></br>
									<label>জন্ম তারিখ</label>
									<input type="date" class="info_text" name="dob" placeholder="YY/MM/DD" value="<?php the_author_meta('dob', $user); ?>"> 
								</div>
							</div>

							<div class="row user_save">
								<input type="submit" class="update_button" value="পরিবর্তন নিশ্চিত করুন" name="update_btn">
							</div>
						  </form>

						</div> <!-- tabpanel1 end-->
						<div role="tabpanel" class="tab-pane " id="password">
							<form method="post" id="password_from">
								<div class="row profile_heading">
									<h2>পাসওয়ার্ড আপডেট</h2>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-6 col-xs-6 col-sm-6">

										<input type="hidden" value="<?php echo $user; ?>" name="updateuserid">
										<label>বর্তমান পাসওয়ার্ড*</label>
										<input type="password" class="info_text input_space" name="current_pass" placeholder="বর্তমান পাসওয়ার্ড দিন" value="" id="old_pass" required>
										<span id="current_psw_msg"></span>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-xs-5 col-xm-6">
										<label>নতুন পাসওয়ার্ড*</label>
										<input type="password" class="info_text  input_space" value="" name="new_pass" placeholder="নতুন পাসওয়ার্ড দিন" id="new_pass">
										<span id="new_psw_msg"></span>
										<input type="hidden" value="<?php echo $pass;  ?>" id="bdpass">
									</div>
									<div class="col-md-6 col-xs-7 col-xm-6">
										<label>পাসওয়ার্ড নিশ্চিত করুন*</label>
										<input type="password" class="info_text" name="confirm_pass" placeholder="পাসওয়ার্ড নিশ্চিত করুন" id="confirm_pass">
										<span id="conf_psw_msg"></span>
									</div>

										
										
								</div>
								
								<div class="row user_save">
									<input type="submit" id="submit_btn" class="update_button" value="পাসওয়ার্ড আপডেট" name="password_btn">
								</div>
					    	</form>
						</div>

					</div><!-- tab content end-->
				</div><!-- card end-->

			</div>
		</div>
	</div><!-- container end-->
</div><!-- container fluid end-->

<script type="text/javascript">
	
	jQuery(document).ready(function(){


		/*jQuery('.about_save').on('click',function(){

		var about_text =  jQuery('.about_text').val();
		//alert(about_text);
		jQuery('.show_about_text').append(about_text);
		jQuery('#user_desc').val(about_text);

		});*/

		jQuery('.author_popup_btn').on('click',function(){
			
			var author_detais = $("#user_desc").val();
			
			$("#author_details").val(author_detais);
		});
	
		jQuery('.about_save').on('click',function(){

		var about_text =  jQuery('.about_text').val();
		//alert(about_text);
		jQuery('.show_about_text').empty();
		jQuery('.show_about_text').append(about_text);
		jQuery('#user_desc').val("");
		jQuery('#user_desc').val(about_text);

		});


		jQuery("#submit_btn").on('click',function(e){



			var new_pass= jQuery('#new_pass').val();
			var confirm_pass= jQuery('#confirm_pass').val();
			var current_password=jQuery('#old_pass').val();

			if(new_pass != confirm_pass)
			{
				e.preventDefault();
				alert('New password not matched');
			}


		});




	});
</script>


<?php  get_footer();
}
else
{
header("location:".home_url()."/signin/");
}
 ?>
