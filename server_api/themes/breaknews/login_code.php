<?php
print_r($_POST);
	
			/*$err = '';
			$success = '';

			global $wpdb;
			$tablename = $wpdb->prefix."users";


			if(isset($_POST['new_account_btn'])) {
				
				$name = esc_attr($_POST['fullname']);
			    $email = esc_attr($_POST['emailid']);
			    $password = esc_attr($_POST['password']);

				//$check_email ="SELECT * FROM $wpdb->users WHERE user_email=" .$email  ;

				$datum = $wpdb->get_results("SELECT * FROM $tablename WHERE user_email = '".$email."'");

				if($wpdb->num_rows > 0) {
			        echo "email id exist" ;
			    }
			    else
			    {			    

			    	 $user_id = $wpdb->insert('wp_users',array('user_nicename' => $name, 'user_email' => $email, 'user_pass' => wp_hash_password($password)));

			    	 echo 'successful' ;
			    }		


			}*/
	?>
		