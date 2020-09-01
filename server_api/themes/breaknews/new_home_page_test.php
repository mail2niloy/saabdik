<?php
/*
*Template Name: New home page test
*/
get_header();
?>
<div id="slider_contaner">
<?php echo do_shortcode('[jssor-slider alias="full-width-slider.slider"]');?>
</div>

	<!--<div class="row"style="margin-top:60px">
		<div class="col-md-12 col-sm-12 col-xs-12">-->
		
		<!--</div>
	</div>-->
	<?php
/*query_posts( array ( 'category_name' => 'কবিতা', 'posts_per_page' => -1 ) );
$a=0;
while ( have_posts() ) : the_post();
	echo '<li>';
	$a++;
	get_the_ID();

	the_title();
	$args = array('post_id' => get_the_ID());
	
	 $comments = get_comments($args);
	//var_dump($comments);
	$sum = 0;
	$count=0;
	//echo $comment->comment_ID;
foreach($comments as $comment) :
	
	 $approvedComment = $comment->comment_approved; 
	
	 if($approvedComment > 0){  
	 $rates = get_comment_meta( $comment->comment_ID, 'rating', true );
	 }
	 if($rates){
		 $sum = $sum + (int)$rates;
		 $count++;
 	}
    
	endforeach;
		if($count != 0){ 
			echo $result=   $sum/$count;
		}else {
			echo $result= 0;
		}
	//the_content();
	//the_permalink();
	//the_post_thumbnail('thumbnail');
	//echo $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'thumbnail' );
	//the_tags();
	//echo "may a=".$a;
	//echo getPostViews(get_the_ID());
	echo '</li>';

endwhile;
 
// Reset Query
wp_reset_query();*/
?>
		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<h2 class="head_line_home"> <i>কবিতা </i></h2>
		</div>
		
		<div class="carousel slide " data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel_kobita">
	  		<div class="carousel-inner">
	  			<?php
	  				query_posts( array ( 'category_name' => 'কবিতা', 'posts_per_page' => -1 ) );
	  				
	  				$a=0;
	  				while ( have_posts() ) : the_post();
	  					$a++;
	  					//$url = the_post_thumbnail_url( 'thumbnail' );   
	  					$post_author_id = get_post_field( 'post_author', get_the_ID() );
	  					$args = array('post_id' => get_the_ID());
	
						/*rating show*/
						 $comments = get_comments($args);
						//var_dump($comments);
						$sum = 0;
						$count=0;
						//echo $comment->comment_ID;
					foreach($comments as $comment) :
						
						 $approvedComment = $comment->comment_approved; 
						
						 if($approvedComment > 0){  
						 $rates = get_comment_meta( $comment->comment_ID, 'rating', true );
						 }
						 if($rates){
							 $sum = $sum + (int)$rates;
							 $count++;
					 	}
					    
						endforeach;
							if($count != 0){ 
								$rating_result=   $sum/$count;
							}else {
								$rating_result= 0;
							}


	  					if($a==1)
	  					{
	  			?>
	  					<div class="item active">
	  			<?php
	  					}
	  					else
	  					{
	  			?>
	  					<div class="item  slider_item_div">
	  			<?php
	  					}
	  			?>      
	      			<div class="col-md-3 col-sm-4 col-xs-6">
	      				<div class="thumbnail">
			          <a href="<?php the_permalink(); ?>" class="img_link_home">
			           
			            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="img-responsive ">
			           <div class="caption">		      
		          			<div class="col-md-12 col-sm-12 col-xs-12 details_div ellipsis">
				              <p class="title"><?php //echo wp_trim_words( get_the_title(), 3 ); ?><?php the_title(); ?>
				              <?php 
								/*$title  = the_title('','',false);
								$str=strlen($title);
								if(strlen($title) >30):
								    echo trim(substr($title, 0, 35)).'...';
								else:
								    echo $title;
								endif;*/
								?>
        </p><p class="author"><?php the_author_meta('display_name',$post_author_id);  ?></p>
				              <p class="description_text"><?php echo breaknews_limit_excerpt_words( get_the_excerpt(), 20 ); ?>...</p>
				           </div>
				           
				          <div class="row">
				            <div class="col-md-6 col-sm-6 col-xs-6 stats">
				              <span class="fa fa-star"> <?php echo $rating_result; ?></span>
				            </div>
				            <div class="col-md-6 col-sm-6 col-xs-6 views">
				              <span class="fa fa-eye"> <?php echo getPostViews(get_the_ID()); ?> </span>
				            </div>
				          </div>
				          
				      </div>
				    </a>
	      			</div>
	    		</div>
	    		</div>
	   			<?php 
	   				endwhile;
					// Reset Query
					wp_reset_query();
	   			?>
	  		</div>
			  <a class="left carousel-control" href="#myCarousel_kobita" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
			  <a class="right carousel-control" href="#myCarousel_kobita" data-slide="next"><i class="fa fa-chevron-right"></i></a>
	  		</div>
		</div>
	
		<div class="col-md-12 col-sm-12 col-xs-12 ">
			
			<h2 class="head_line_home"> <i>ছোটগল্প </i></h2>
			
		</div>
		
		<div class="carousel slide " data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel_chotogolpo">
	  		<div class="carousel-inner">
	  			<?php
	  				query_posts( array ( 'category_name' => 'ছোটগল্প', 'posts_per_page' => -1 ) );
	  				
	  				$a=0;
	  				while ( have_posts() ) : the_post();
	  					$a++;
	  					
	  					$post_author_id = get_post_field( 'post_author', get_the_ID() );
	  					$args = array('post_id' => get_the_ID());
	
						/*rating show*/
						 $comments = get_comments($args);
						//var_dump($comments);
						$sum = 0;
						$count=0;
						//echo $comment->comment_ID;
					foreach($comments as $comment) :
						
						 $approvedComment = $comment->comment_approved; 
						
						 if($approvedComment > 0){  
						 $rates = get_comment_meta( $comment->comment_ID, 'rating', true );
						 }
						 if($rates){
							 $sum = $sum + (int)$rates;
							 $count++;
					 	}
					    
						endforeach;
							if($count != 0){ 
								$rating_result=   $sum/$count;
							}else {
								$rating_result= 0;
							}


	  					if($a==1)
	  					{
	  			?>
	  					<div class="item active">
	  			<?php
	  					}
	  					else
	  					{
	  			?>
	  					<div class="item  slider_item_div">
	  			<?php
	  					}
	  			?>      
	      			<div class="col-md-3 col-sm-4 col-xs-6">
	      				<div class="thumbnail">
			          <a href="<?php the_permalink(); ?>" class="img_link_home">
			            
			            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="img-responsive ">
			           <div class="caption">		      
		          			<div class="col-md-12 col-sm-12 col-xs-12 details_div">
				              <p class="title"><?php //echo wp_trim_words( get_the_title(), 3 ); ?><?php the_title(); ?>
				              <?php 
								/*$title  = the_title('','',false);
								$str=strlen($title);
								if(strlen($title) >30):
								    echo trim(substr($title, 0, 35)).'...';
								else:
								    echo $title;
								endif;*/
								?>
        </p><p class="author"><?php the_author_meta('display_name',$post_author_id);  ?></p>
				              <p class="description_text"><?php echo breaknews_limit_excerpt_words( get_the_excerpt(), 20 ); ?>...</p>
				           </div>
				           
				          <div class="row">
				            <div class="col-md-6 col-sm-6 col-xs-6 stats">
				              <span class="fa fa-star"> <?php echo $rating_result; ?></span>
				            </div>
				            <div class="col-md-6 col-sm-6 col-xs-6 views">
				              <span class="fa fa-eye"> <?php echo getPostViews(get_the_ID()); ?> </span>
				            </div>
				          </div>
				          
				      </div>
				    </a>
	      			</div>
	    		</div>
	    		</div>
	   			<?php 
	   				endwhile;
					// Reset Query
					wp_reset_query();
	   			?>
	  		</div>
			  <a class="left carousel-control" href="#myCarousel_chotogolpo" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
			  <a class="right carousel-control" href="#myCarousel_chotogolpo" data-slide="next"><i class="fa fa-chevron-right"></i></a>
	  		</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<div class="">
			<h2 class="head_line_home"> <i>ইতিহাসে খুঁজি </i></h2>
			</div>
		</div>
		
		<div class="carousel slide " data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel_history">
	  		<div class="carousel-inner">
	  			<?php
	  				query_posts( array ( 'category_name' => 'ইতিহাসে খুঁজি', 'posts_per_page' => -1 ) );
	  				
	  				$a=0;
	  				while ( have_posts() ) : the_post();
	  					$a++;
	  					
	  					$post_author_id = get_post_field( 'post_author', get_the_ID() );
	  					$args = array('post_id' => get_the_ID());
	
						/*rating show*/
						 $comments = get_comments($args);
						//var_dump($comments);
						$sum = 0;
						$count=0;
						//echo $comment->comment_ID;
					foreach($comments as $comment) :
						
						 $approvedComment = $comment->comment_approved; 
						
						 if($approvedComment > 0){  
						 $rates = get_comment_meta( $comment->comment_ID, 'rating', true );
						 }
						 if($rates){
							 $sum = $sum + (int)$rates;
							 $count++;
					 	}
					    
						endforeach;
							if($count != 0){ 
								$rating_result=   $sum/$count;
							}else {
								$rating_result= 0;
							}


	  					if($a==1)
	  					{
	  			?>
	  					<div class="item active">
	  			<?php
	  					}
	  					else
	  					{
	  			?>
	  					<div class="item  slider_item_div">
	  			<?php
	  					}
	  			?>      
	      			<div class="col-md-3 col-sm-4 col-xs-6">
	      				<div class="thumbnail">
			          <a href="<?php the_permalink(); ?>" class="img_link_home">
			            
			            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="img-responsive ">
			           <div class="caption">		      
		          			<div class="col-md-12 col-sm-12 col-xs-12 details_div">
				              <p class="title"><?php //echo wp_trim_words( get_the_title(), 3 ); ?><?php the_title(); ?>
				              <?php 
								/*$title  = the_title('','',false);
								$str=strlen($title);
								if(strlen($title) >30):
								    echo trim(substr($title, 0, 35)).'...';
								else:
								    echo $title;
								endif;*/
								?>
        </p><p class="author"><?php the_author_meta('display_name',$post_author_id);  ?></p>
				              <p class="description_text"><?php echo breaknews_limit_excerpt_words( get_the_excerpt(), 20 ); ?>...</p>
				           </div>
				           
				          <div class="row">
				            <div class="col-md-6 col-sm-6 col-xs-6 stats">
				              <span class="fa fa-star"> <?php echo $rating_result; ?></span>
				            </div>
				            <div class="col-md-6 col-sm-6 col-xs-6 views">
				              <span class="fa fa-eye"> <?php echo getPostViews(get_the_ID()); ?> </span>
				            </div>
				          </div>
				          
				      </div>
				    </a>
	      			</div>
	    		</div>
	    		</div>
	   			<?php 
	   				endwhile;
					// Reset Query
					wp_reset_query();
	   			?>
	  		</div>
			  <a class="left carousel-control" href="#myCarousel_history" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
			  <a class="right carousel-control" href="#myCarousel_history" data-slide="next"><i class="fa fa-chevron-right"></i></a>
	  		</div>
		</div>
	
		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<div class="">
			<h2 class="head_line_home"> <i>বিশেষ রচনা</i></h2>
			</div>
		</div>
		
		<div class="carousel slide " data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel_rachona">
	  		<div class="carousel-inner">
	  			<?php
	  				query_posts( array ( 'category_name' => 'বিশেষ রচনা', 'posts_per_page' => -1 ) );
	  				
	  				$a=0;
	  				while ( have_posts() ) : the_post();
	  					$a++;
	  					$post_author_id = get_post_field( 'post_author', get_the_ID() );
	  					$args = array('post_id' => get_the_ID());
	
						/*rating show*/
						 $comments = get_comments($args);
						//var_dump($comments);
						$sum = 0;
						$count=0;
						//echo $comment->comment_ID;
					foreach($comments as $comment) :
						
						 $approvedComment = $comment->comment_approved; 
						
						 if($approvedComment > 0){  
						 $rates = get_comment_meta( $comment->comment_ID, 'rating', true );
						 }
						 if($rates){
							 $sum = $sum + (int)$rates;
							 $count++;
					 	}
					    
						endforeach;
							if($count != 0){ 
								$rating_result=   $sum/$count;
							}else {
								$rating_result= 0;
							}


	  					if($a==1)
	  					{
	  			?>
	  					<div class="item active">
	  			<?php
	  					}
	  					else
	  					{
	  			?>
	  					<div class="item  slider_item_div">
	  			<?php
	  					}
	  			?>      
	      			<div class="col-md-3 col-sm-4 col-xs-6">
	      				<div class="thumbnail">
			          <a href="<?php the_permalink(); ?>" class="img_link_home">
			            
			            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="img-responsive ">
			           <div class="caption">		      
		          			<div class="col-md-12 col-sm-12 col-xs-12 details_div">
				              <p class="title"><?php //echo wp_trim_words( get_the_title(), 3 ); ?><?php the_title(); ?>
				              <?php 
								/*$title  = the_title('','',false);
								$str=strlen($title);
								if(strlen($title) >30):
								    echo trim(substr($title, 0, 35)).'...';
								else:
								    echo $title;
								endif;*/
								?>
        </p><p class="author"><?php the_author_meta('display_name',$post_author_id);  ?></p>
				              <p class="description_text"><?php echo breaknews_limit_excerpt_words( get_the_excerpt(), 20 ); ?>...</p>
				           </div>
				           
				          <div class="row">
				            <div class="col-md-6 col-sm-6 col-xs-6 stats">
				              <span class="fa fa-star"> <?php echo $rating_result; ?></span>
				            </div>
				            <div class="col-md-6 col-sm-6 col-xs-6 views">
				              <span class="fa fa-eye"> <?php echo getPostViews(get_the_ID()); ?> </span>
				            </div>
				          </div>
				          
				      </div>
				    </a>
	      			</div>
	    		</div>
	    		</div>
	   			<?php 
	   				endwhile;
					// Reset Query
					wp_reset_query();
	   			?>
	  		</div>
			  <a class="left carousel-control" href="#myCarousel_rachona" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
			  <a class="right carousel-control" href="#myCarousel_rachona" data-slide="next"><i class="fa fa-chevron-right"></i></a>
	  		</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<div class="">
			<h2 class="head_line_home"> <i>ভ্ৰমণ কাহিনী</i></h2>
			</div>
		</div>
		
		<div class="carousel slide " data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel_vroman">
	  		<div class="carousel-inner">
	  			<?php
	  				query_posts( array ( 'category_name' => 'ভ্রমণ', 'posts_per_page' => -1 ) );
	  				
	  				$a=0;
	  				while ( have_posts() ) : the_post();
	  					$a++;
	  					
	  					$post_author_id = get_post_field( 'post_author', get_the_ID() );
	  					$args = array('post_id' => get_the_ID());
	
						/*rating show*/
						 $comments = get_comments($args);
						//var_dump($comments);
						$sum = 0;
						$count=0;
						//echo $comment->comment_ID;
					foreach($comments as $comment) :
						
						 $approvedComment = $comment->comment_approved; 
						
						 if($approvedComment > 0){  
						 $rates = get_comment_meta( $comment->comment_ID, 'rating', true );
						 }
						 if($rates){
							 $sum = $sum + (int)$rates;
							 $count++;
					 	}
					    
						endforeach;
							if($count != 0){ 
								$rating_result=   $sum/$count;
							}else {
								$rating_result= 0;
							}


	  					if($a==1)
	  					{
	  			?>
	  					<div class="item active">
	  			<?php
	  					}
	  					else
	  					{
	  			?>
	  					<div class="item  slider_item_div">
	  			<?php
	  					}
	  			?>      
	      			<div class="col-md-3 col-sm-4 col-xs-6">
	      				<div class="thumbnail">
			          <a href="<?php the_permalink(); ?>" class="img_link_home">
			            
			            <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="img-responsive ">
			           <div class="caption">		      
		          			<div class="col-md-12 col-sm-12 col-xs-12 details_div">
				              <p class="title"><?php //echo wp_trim_words( get_the_title(), 3 ); ?><?php the_title(); ?>
				              <?php 
								/*$title  = the_title('','',false);
								$str=strlen($title);
								if(strlen($title) >30):
								    echo trim(substr($title, 0, 35)).'...';
								else:
								    echo $title;
								endif;*/
								?>
        </p><p class="author"><?php the_author_meta('display_name',$post_author_id);  ?></p>
				              <p class="description_text"><?php echo breaknews_limit_excerpt_words( get_the_excerpt(), 20 ); ?>...</p>
				           </div>
				           
				          <div class="row">
				            <div class="col-md-6 col-sm-6 col-xs-6 stats">
				              <span class="fa fa-star"> <?php echo $rating_result; ?></span>
				            </div>
				            <div class="col-md-6 col-sm-6 col-xs-6 views">
				              <span class="fa fa-eye"> <?php echo getPostViews(get_the_ID()); ?> </span>
				            </div>
				          </div>
				          
				      </div>
				    </a>
	      			</div>
	    		</div>
	    		</div>
	   			<?php 
	   				endwhile;
					// Reset Query
					wp_reset_query();
	   			?>
	  		</div>
			  <a class="left carousel-control" href="#myCarousel_vroman" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
			  <a class="right carousel-control" href="#myCarousel_vroman" data-slide="next"><i class="fa fa-chevron-right"></i></a>
	  		</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<div class="">
			<h2 class="head_line_home"> <i>চিত্রকলা</i></h2>
			</div>
		</div>
		
		<div class="carousel slide " data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel_chetrakala">
	  		<div class="carousel-inner">
	  			<?php
	  				query_posts( array ( 'category_name' => 'চিত্রকলা', 'posts_per_page' => -1 ) );
	  				
	  				$a=0;
	  				while ( have_posts() ) : the_post();
	  					$a++;
	  					$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()),'thumbnail');
	  					$post_author_id = get_post_field( 'post_author', get_the_ID() );
	  					$args = array('post_id' => get_the_ID());
	
						/*rating show*/
						 $comments = get_comments($args);
						//var_dump($comments);
						$sum = 0;
						$count=0;
						//echo $comment->comment_ID;
					foreach($comments as $comment) :
						
						 $approvedComment = $comment->comment_approved; 
						
						 if($approvedComment > 0){  
						 $rates = get_comment_meta( $comment->comment_ID, 'rating', true );
						 }
						 if($rates){
							 $sum = $sum + (int)$rates;
							 $count++;
					 	}
					    
						endforeach;
							if($count != 0){ 
								$rating_result=   $sum/$count;
							}else {
								$rating_result= 0;
							}


	  					if($a==1)
	  					{
	  			?>
	  					<div class="item active">
	  			<?php
	  					}
	  					else
	  					{
	  			?>
	  					<div class="item  slider_item_div">
	  			<?php
	  					}
	  			?>      
	      			<div class="col-md-3 col-sm-4 col-xs-6">
	      				<div class="thumbnail">
			          <a href="<?php the_permalink(); ?>" class="img_link_home">
			            
			            <img src="<?php echo $url; ?>" class="img-responsive ">
			           <div class="caption">		      
		          			<div class="col-md-12 col-sm-12 col-xs-12 details_div">
				              <p class="title"><?php //echo wp_trim_words( get_the_title(), 3 ); ?><?php the_title(); ?>
				              <?php 
								/*$title  = the_title('','',false);
								$str=strlen($title);
								if(strlen($title) >30):
								    echo trim(substr($title, 0, 35)).'...';
								else:
								    echo $title;
								endif;*/
								?>
        </p><p class="author"><?php the_author_meta('display_name',$post_author_id);  ?></p>
				              <p class="description_text"><?php echo breaknews_limit_excerpt_words( get_the_excerpt(), 10 ); ?>...</p>
				           </div>
				           
				          <div class="row">
				            <div class="col-md-6 col-sm-6 col-xs-6 stats">
				              <span class="fa fa-star"> <?php echo $rating_result; ?></span>
				            </div>
				            <div class="col-md-6 col-sm-6 col-xs-6 views">
				              <span class="fa fa-eye"> <?php echo getPostViews(get_the_ID()); ?> </span>
				            </div>
				          </div>
				          
				      </div>
				    </a>
	      			</div>
	    		</div>
	    		</div>
	   			<?php 
	   				endwhile;
					// Reset Query
					wp_reset_query();
	   			?>
	  		</div>
			  <a class="left carousel-control" href="#myCarousel_chetrakala" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
			  <a class="right carousel-control" href="#myCarousel_chetrakala" data-slide="next"><i class="fa fa-chevron-right"></i></a>
	  		</div>
		</div>

		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<div class="">
			<h2 class="head_line_home"> <i>খেলার দুনিয়া</i></h2>
			</div>
		</div>
		
		<div class="carousel slide " data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel_khalar_dunia">
	  		<div class="carousel-inner">
	  			<?php
	  				query_posts( array ( 'category_name' => 'খেলার দুনিয়া', 'posts_per_page' => -1 ) );
	  				
	  				$a=0;
	  				while ( have_posts() ) : the_post();
	  					$a++;
	  					$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()),'thumbnail');
	  					$post_author_id = get_post_field( 'post_author', get_the_ID() );
	  					$args = array('post_id' => get_the_ID());
	
						/*rating show*/
						 $comments = get_comments($args);
						//var_dump($comments);
						$sum = 0;
						$count=0;
						//echo $comment->comment_ID;
					foreach($comments as $comment) :
						
						 $approvedComment = $comment->comment_approved; 
						
						 if($approvedComment > 0){  
						 $rates = get_comment_meta( $comment->comment_ID, 'rating', true );
						 }
						 if($rates){
							 $sum = $sum + (int)$rates;
							 $count++;
					 	}
					    
						endforeach;
							if($count != 0){ 
								$rating_result=   $sum/$count;
							}else {
								$rating_result= 0;
							}


	  					if($a==1)
	  					{
	  			?>
	  					<div class="item active">
	  			<?php
	  					}
	  					else
	  					{
	  			?>
	  					<div class="item  slider_item_div">
	  			<?php
	  					}
	  			?>      
	      			<div class="col-md-3 col-sm-4 col-xs-6">
	      				<div class="thumbnail">
			          <a href="<?php the_permalink(); ?>" class="img_link_home">
			            
			            <img src="<?php echo $url; ?>" class="img-responsive ">
			           <div class="caption">		      
		          			<div class="col-md-12 col-sm-12 col-xs-12 details_div">
				              <p class="title"><?php //echo wp_trim_words( get_the_title(), 3 ); ?><?php the_title(); ?>
				              <?php 
								/*$title  = the_title('','',false);
								$str=strlen($title);
								if(strlen($title) >30):
								    echo trim(substr($title, 0, 35)).'...';
								else:
								    echo $title;
								endif;*/
								?>
        </p><p class="author"><?php the_author_meta('display_name',$post_author_id);  ?></p>
				              <p class="description_text"><?php echo breaknews_limit_excerpt_words( get_the_excerpt(), 10 ); ?>...</p>
				           </div>
				           
				          <div class="row">
				            <div class="col-md-6 col-sm-6 col-xs-6 stats">
				              <span class="fa fa-star"> <?php echo $rating_result; ?></span>
				            </div>
				            <div class="col-md-6 col-sm-6 col-xs-6 views">
				              <span class="fa fa-eye"> <?php echo getPostViews(get_the_ID()); ?> </span>
				            </div>
				          </div>
				          
				      </div>
				    </a>
	      			</div>
	    		</div>
	    		</div>
	   			<?php 
	   				endwhile;
					// Reset Query
					wp_reset_query();
	   			?>
	  		</div>
			  <a class="left carousel-control" href="#myCarousel_khalar_dunia" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
			  <a class="right carousel-control" href="#myCarousel_khalar_dunia" data-slide="next"><i class="fa fa-chevron-right"></i></a>
	  		</div>
		</div>
<script type="text/javascript">
	$(document).ready(function($){
		$('.carousel[data-type="multi"] .item').each(function(){
			//alert("hi");
		  var next = $(this).next();
		  if (!next.length) {
		    next = $(this).siblings(':first');
		  }
		  next.children(':first-child').clone().appendTo($(this));
		  
		  for (var i=0;i<2;i++) {
		    next=next.next();
		    if (!next.length) {
		        next = $(this).siblings(':first');
		    }
		    next.children(':first-child').clone().appendTo($(this));
		  }
		});

		$('.carousel[data-type="multi"] .item').swiperight(function(){
			alert("hi");

		  /*var next = $(this).next();
		  if (!next.length) {
		    next = $(this).siblings(':first');
		  }
		  next.children(':first-child').clone().appendTo($(this));
		  
		  for (var i=0;i<2;i++) {
		    next=next.next();
		    if (!next.length) {
		        next = $(this).siblings(':first');
		    }
		    next.children(':first-child').clone().appendTo($(this));
		  }*/
		});

	});
</script>
<?php

get_footer(); 
?>