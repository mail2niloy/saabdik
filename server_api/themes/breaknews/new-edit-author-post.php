<?php
/**
*Template Name: New edit author post

*/
get_header();
$get_post_id=$_REQUEST["post_id"];
if(isset($_POST))
	{
		$post_categories=array($_POST["cat"]); 
		$title=$_POST["post_title"];
		$post_slug=sanitize_title( $title);
		//echo $post_slug;
		$post = array(
		'ID'			=>	$get_post_id,
		'post_author'		=>	$_POST["userid"],
		'comment_status'    =>  'open',
		'post_content'      =>  $_POST["content"],
		'post_name'         =>  $post_slug,
		'post_status'       =>  $_POST["post_status"],
		'post_title'        =>  $title,
		'post_type'         =>  'post',
		'post_category'		=> $post_categories,
		);  
		 $post_id = wp_insert_post($post);
		
	}

$queried_post = get_post($get_post_id);
$title = $queried_post->post_title;
 $post_categories = wp_get_post_categories( $get_post_id );

 
?>
<div class="container-fluid ">
	<div class="row" style="margin-top:42px">
		<div class="col-md-12 col-xs-12 col-sm-12">
			<div class="row profile_heading">
				<h2>শিরোনাম যুক্ত করুন</h2>
			</div>
			<hr>
			<div class="row">
				<form action="" method="post">
						<div class="col-md-6 col-xs-6 col-sm-6 input_space">
						
							<input type="hidden" value="<?php echo $user_ID; ?>" name="userid">
							<input type="hidden" value="pending" name="post_status">
						<label>শিরোনাম লিখুন*</label>
							<input type="text" class="info_text" name="post_title" placeholder="শিরোনাম লিখুন"  value="<?php echo $title; ?>">
						</div>
						<div class="col-md-6 col-xs-6 col-sm-6">
							<label>প্রকার*</label>
							<?php wp_dropdown_categories( array('class' => 'info_text','selected'=>$post_categories[0],)); ?>
							<!--<select class="info_text">
								<option value="গল্প">গল্প</option>
								<option value="কবিতা">কবিতা</option>
								<option value="প্রবন্ধ">প্রবন্ধ</option>
							</select>-->
						</div>
						
						
					
				</div>
				<!--<div class="col-md-6 col-xs-6 col-sm-6">
					<input type="checkbox" name="" value=""> আমি কপিরাইট নীতি ও পরিষেবার শর্তাদি স্বীকার করলাম<br>
					<a href="#">এখানে কপিরাইট নীতি পড়ুন</a>
				</div>-->
			</div>	
			<div class="col-md-12 col-sm-12 col-xs-12">
				<?php
					/*$content   = '';
					$editor_id = 'content';
					$settings  = array( 'media_buttons' => false );
					
					 
					wp_editor( $content, $editor_id, $settings);*/
					$content= $queried_post->post_content;
					$id = 'content';
					$prev_id = 'title';
					$media_buttons = true;
					$tab_index = 2;
					$extended = true;
					the_editor($content,$id,$prev_id,$media_buttons,$tab_index,$extended);
				?>

			</div>	
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<br>
				<input type="submit" name="submit" class="btn btn-primary" value="আপডেট করুন">
			</div>
			</form>

		</div>
		<br>
			<br>
	</div>
</div>
<?php
 get_footer();  
?>