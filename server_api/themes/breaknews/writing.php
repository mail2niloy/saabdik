<?php

/*

Template Name: Author Writing Page
*/
if($user_ID!=0)
{

get_header();
	if(isset($_POST))
	{
		$post_categories=array($_POST["cat"]); 
		$title=$_POST["post_title"];
		$post_slug=sanitize_title( $title);
		//echo $post_slug;
		$post = array(
			
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


		


?>

<div class="container writing_div">
		<div class="row writing_main">
			<div class="container1 writing_edit_div">
				<div class="row" >
					<div class="col-md-12 col-xs-12 col-sm-12 writing_header" >
				        <img align="left" class="fb-image-lg" src="http://www.saabdik.com/wp-content/uploads/2018/09/negative-space-pen-notebook-notepadpaper-writing_gradient-e1538054152658.png" width="100%"  />
					</div>
		
				</div>
				<div class="row" >
					<div class="col-md-12 col-xs-12 col-sm-12">
						<h4 align="center">নিজের লেখোনি প্রতিভার বিকাশ ঘটান</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-xs-12 col-sm-12">
						<div class="card">
							 <ul class="nav nav-tabs writing_nav" role="tablist">
							 	<li role="presentation" class="active"><a href="#writing" aria-controls="profile" role="tab" data-toggle="tab">নতুন করে লিখুন </a></li>
				                <li role="presentation" ><a href="#list" aria-controls="home" role="tab" data-toggle="tab">প্রকাশিত লেখা</a></li>
				                <li role="presentation"><a href="#list2" aria-controls="home" role="tab" data-toggle="tab">অপ্রকাশিত লেখা</a></li>
				                
				            </ul>
				        </div>
				        <div class="tab-content">
				        	<div role="tabpanel" class="tab-pane active" id="writing">
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
												<input type="text" class="info_text" name="post_title" placeholder="শিরোনাম লিখুন"  value="">
											</div>
											<div class="col-md-6 col-xs-6 col-sm-6">
												<label>প্রকার*</label>
												<?php wp_dropdown_categories( array('class' => 'info_text','hide_empty'      => false,)); ?>
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
								<div class="row">	
								<div class="col-md-12 col-sm-12 col-xs-12">
									<?php
										/*$content   = '';
										$editor_id = 'content';
										$settings  = array( 'media_buttons' => false );
										
										 
										wp_editor( $content, $editor_id, $settings);*/
										$content='';
										$id = 'content';
										$prev_id = 'title';
										$media_buttons = true;
										$tab_index = 2;
										$extended = true;
										$settings = array(
											    //'quicktags' => array('buttons' => 'em,strong,link',),
											    //'quicktags' => true,
											    'tinymce' => array(
											    	'toolbar1'      => 'bold,italic,underline,separator,alignleft,aligncenter,alignright,separator,link,unlink,undo,redo',
											        'toolbar2'      => '',
											        'toolbar3'      => '',
											    ),
											    //'textarea_rows' => 20,
											);

										the_editor($content,$id,$prev_id,$media_buttons,$tab_index,$extended,$settings);
										

									?>

								</div>	
								
								
								<div class="col-md-12 col-sm-12 col-xs-12">
									<br>
									<input type="submit" name="submit" class="btn btn-primary" value="সংরক্ষণ করুন">
								</div>
								</div>
								</form>
				        	</div>
				        	<div role="tabpanel" class="tab-pane " id="list">
				        		<table class="table table-hover">
				        			 <thead>
								      <tr>
								        <th>লেখার নাম</th>
								      </tr>
								    </thead>
								    <tbody>
								    	<?php
								    	//echo $user_ID;
										 $args=array(
								 			'post_status' => 'publish',
								 			'author' => $user_ID,
								 			'post_type'      => 'post',
								 			
										 );
										$wp_query = new WP_Query($args);
										while ( have_posts() ) : the_post();
										 ?>
								    	<tr>
								    		<td>
								    			<?php the_title(); ?>
								    				<?php $post_id = get_the_ID();?>
								    			
								    		</td>
								    		
								    	</tr>
								    	<?php
												
											endwhile;
										
										?>
								    </tbody>
				        		</table>
				        		
								 <h4></h4>
								 
				        	</div>

				        	<div role="tabpanel" class="tab-pane" id="list2">
				        		<table class="table table-hover">
				        			 <thead>
								      <tr>
								        <th>লেখার নাম</th>
								        <th>অ্যাকশন </th>
								      </tr>
								    </thead>
								    <tbody>
								    	<?php
								    	//echo $user_ID;
										 $args=array(
								 			'post_status' => 'pending',
								 			'author' => $user_ID,
								 			'post_type'      => 'post',
										 );
										$wp_query = new WP_Query($args);
										while ( have_posts() ) : the_post();
										 ?>
								    	<tr>
								    		<td>
								    			<?php the_title(); ?>
								    				<?php $post_id = get_the_ID();?>
								    			
								    		</td>
								    		<td>
								    			<a href="<?php home_url(); ?>/edit-post?post_id=<?php echo $post_id; ?>">এডিট করুন</a>
								    		</td>
								    	</tr>
								    	<?php
												
											endwhile;
										
										?>
								    </tbody>
				        		</table>
				        		
								 <h4></h4>
								 
				        	</div>
				        	
				        </div>
				    </div>
				</div>
			</div>
		</div>
</div>



<?php
get_footer();
}
else
{
header("location:".home_url()."/signin/");
}
   


 ?>

