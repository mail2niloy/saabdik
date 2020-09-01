<?php

//wp_head();
		$email_id=$_POST["email_id"];
		$exists = email_exists($email_id);
		if($exists)
		{
			 $user = get_user_by( 'email', $email_id);
			$userId = $user->ID;
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		    $result = '';
		    for ($i = 0; $i < 15; $i++)
		        $result .= $characters[mt_rand(0, 61)];
		    //echo $result;
		    $key="user_token";
		    $single=false;
		    $prev_value="";
		    $token_id=get_user_meta($userId,$key,$single);
		    if($token_id==null)
		    {
		    	//echo "blank";
		    	$unique = true;
		    	add_user_meta( $userId,$key, $result);
		    }
		    else
		    {
		    	update_user_meta($userId,$key, $result,$prev_value );
		    	//echo "not";
		    }
		   /* $email="suranjanpaul1997@gmail.com";
		    $to = $email_id;
				$subject = 'reset your password';
				$sender = get_option('saabdik');
				$url=	home_url()."/email=".$email_id."&token=".$result;
				$message = 'Your link is: '.$url;

				$headers[] = 'MIME-Version: 1.0' . "\r\n";
				$headers[] = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers[] = "X-Mailer: PHP \r\n";
				$headers[] = 'From: '.$sender.' < '.$email_id.'>' . "\r\n";

				$mail = wp_mail( $to, $subject, $message, $headers );
				if( $mail )
					echo 'Check your email address for you new password.';

				} else {
					echo 'Oops something went wrong updaing your account.';
				}*/
				$to = $email_id;
				$subject = 'reset your password';
				$url=	home_url()."/change-password?email=".$email_id."&token=".$result;
				$message = 'Your link is: '.$url;
				wp_mail( $to, $subject, $message );

				//$rederect_url=home_url()."/reset-password/?error=2";
				//wp_redirect( network_home_url( '/reset-password' ) );
				//exit;
				header("Location:saabdik.com/reset-password/?error=2");


		}
		else{
			//$rederect_url=home_url()."/reset-password/?error=1";
				//wp_redirect( network_home_url( '/reset-password' ));
				//exit;
		header("Location:saabdik.com/reset-password/?error=1");
		}

?>