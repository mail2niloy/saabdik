<?php
/*
*Template Name: profile img upload
*/
wp_head();
//print_r($_REQUEST);
$user_id=$_POST["user_id"];
 $allowedExts = array("jpg", "jpeg", "gif", "png");
 $extension = end(explode(".", $_FILES["ad_image"]["name"]));
 if ((($_FILES["ad_image"]["type"] == "image/gif")||($_FILES["ad_image"]["type"] == "image/jpeg")|| ($_FILES["ad_image"]["type"] == "image/png")|| ($_FILES["ad_image"]["type"] == "image/pjpeg"))&& in_array($extension, $allowedExts))
 {
 	 $upload_dir = wp_upload_dir();
 echo  $file_tmp =$_FILES['ad_image']['tmp_name'];
 	  $upload_path = $upload_dir['baseurl'].'/';
 	  $timestamp=strtotime("now");

 	$file_name = $_FILES["ad_image"]["name"]."_".$timestamp.".jpg";
 
  $uploadfile = $upload_path . $file_name;
  //wp_handle_upload($file_name);
//echo $uploadfile;
 	 //move_uploaded_file($file_tmp, $upload_path);
   if (@move_uploaded_file($file_tmp, $uploadfile)) 
   {
    echo 'success';
    } 
 	 
 	 	/*update_user_meta( $user_id, 'userphoto_thumb_height', 59);
		update_user_meta( $user_id, 'userphoto_thumb_width', 80 );
		update_user_meta( $user_id, 'userphoto_thumb_file', $file_name );
   		echo "success";*/
    	
    	
 	//$path=dirname(__FILE__) . '/content/uploads'.base64_encode($user_id).'/';
 	//mkdir($path);
 	/*$timestamp=strtotime("now");
 	$file_name = $_FILES["ad_image"]["name"]."_".$timestamp.".jpg";
 	echo $file_name;
 	echo $your_image = new _image;
 	echo "break";
    $upload_dir = wp_upload_dir();
    echo "break";
   echo $your_image->uploadTo = $upload_dir['basedir'].'/';
   echo "break";
   echo $upload = $your_image->upload($file_name);
print_r($your_image);*/
    /* $your_image->newPath = $upload_dir['basedir'].'/thumbs/';
      $your_image->newWidth = 150;
    $your_image->newHeight = 200;
    $resized = $your_image->resize();
     $profilePicture=str_replace($upload_dir['basedir'].'/thumbs/', "", $resized );
    unlink($upload);*/

    //update_user_meta( $user_id, 'userphoto_thumb_height', 59);
	//update_user_meta( $user_id, 'userphoto_thumb_width', 80 );
	//update_user_meta( $user_id, 'userphoto_thumb_file', $profilePicture );
 }
 else
 {
 	echo "some error";
 }
//echo $_FILES['ad_image']['name'];

//echo $file_size =$_FILES['ad_image']['size'];

   //echo $file_tmp =$_FILES['ad_image']['tmp_name'];

   //echo $file_type=$_FILES['ad_image']['type'];
?>
