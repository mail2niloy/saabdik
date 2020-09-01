<?php
/*
*Template Name: Sadhinota Sonkhya Home
*/
get_header();
require_once( ABSPATH . 'wp-admin/includes/template.php' );
?>

<div class="container-fluid">
	<!--<div class="row"style="margin-top:30px">
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php //echo do_shortcode('[jssor-slider alias="full-width-slider.slider"]');?>
		</div>
	</div>-->

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="head_line_div">
				<h2>বিশেষ আকর্ষণ   </h2>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo do_shortcode('[wcp-carousel id="4207" order="DESC" orderby="date" count="10"]  '); ?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="head_line_div">
				<h2>স্বাধীনতার সেরা</h2>
			</div>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
		<?php echo do_shortcode('[wcp-carousel id="4133" order="DESC" orderby="date" count="10"]  '); ?>
		</div>
	</div>
	
	<div class="row line-space"></div>

	
	
	<div class="row line-space"></div>
	
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<h2 class="head_line_home"> <i>প্রবন্ধ </i></h2>
		</div>
		<?php
			query_posts( array ( 'orderby'=>'rand','tag' => 'sadhinota-sankhya-2020','post_type' => 'post','category_name' => 'probondho'));
			while ( have_posts() ) : the_post();
				$post_author_id = get_post_field( 'post_author', get_the_ID() );
				$post_id = get_the_ID();

					$args = array('post_id' => get_the_ID());
					$fivesdrafts = $wpdb->get_results( 
						"
						SELECT * 
						FROM wp_yasr_log
						WHERE post_id='$post_id'
						"
					);
					$sum = 0;
					$count=0;

					foreach($fivesdrafts as $fivesdraf) :
						//print_r($fivesdraf);
						$vote=$fivesdraf->vote;
						$sum = $sum + (int)$vote;
							 $count++; 
					endforeach;

					if($count != 0){ 
						$rating_result=$sum/$count;
					}else {
						$rating_result= 0;
					}
			
		?>
		<div class="col-sm-12 col-md-6 col-xs-12 slider_container">
			<div class="col-xs-12 col-sm-12 col-md-12 list_content">
			<a href="<?php the_permalink(); ?>"  class="home3_link">
				<div class="row">
					<div class="col-md-3 col-xs-4 col-sm-4 img-container">
						
						<img class="img-responsive" src="<?php the_post_thumbnail_url('thumbnail'); ?>">
						
					</div>

					<div class="col-md-9 col-xs-8 col-sm-8 text-container">
						<p class="title_home3"><?php the_title(); ?></p>
						<p class="author_home3"><?php the_author_meta('display_name',$post_author_id);  ?></p>
						<p class="description_text_home3"><?php echo breaknews_limit_excerpt_words( get_the_excerpt(), 20 ); ?>...<a class="home3_read_more_link" href="<?php the_permalink(); ?>">আরো পড়ুন</a></p>
						<div class="row">
					        <div class="col-md-6 col-sm-6 col-xs-6 stats">
					          <span class="fa fa-star"><?php echo round($rating_result, 1);?> রেটিং</span>
					        </div>
					        <div class="col-md-6 col-sm-6 col-xs-6 views">
					          <span class="fa fa-eye"> <?php echo getPostViews(get_the_ID()); ?> পাঠক</span>
					        </div>
			    		</div>
					</div>
					
				</div>
				
			</div>
			</a>
		</div>
		<?php
			endwhile;
			wp_reset_query();
		?>
	</div>	

	
	<div class="row line-space"></div>

	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<h2 class="head_line_home"> <i>ছোটগল্প </i></h2>
		</div>
		<?php
			query_posts( array ( 'orderby'=>'rand','tag' => 'sadhinota-sankhya-2020','post_type' => 'post','category_name' => 'chotogolpo'));
			while ( have_posts() ) : the_post();
				$post_author_id = get_post_field( 'post_author', get_the_ID() );
				$post_id = get_the_ID();

					$args = array('post_id' => get_the_ID());
					$fivesdrafts = $wpdb->get_results( 
						"
						SELECT * 
						FROM wp_yasr_log
						WHERE post_id='$post_id'
						"
					);
					$sum = 0;
					$count=0;

					foreach($fivesdrafts as $fivesdraf) :
						//print_r($fivesdraf);
						$vote=$fivesdraf->vote;
						$sum = $sum + (int)$vote;
							 $count++; 
					endforeach;

					if($count != 0){ 
						$rating_result=$sum/$count;
					}else {
						$rating_result= 0;
					}
			
		?>
		<div class="col-sm-12 col-md-6 col-xs-12 slider_container">
			<div class="col-xs-12 col-sm-12 col-md-12 list_content">
			<a href="<?php the_permalink(); ?>"  class="home3_link">
				<div class="row">
					<div class="col-md-3 col-xs-4 col-sm-4 img-container">
						
						<img class="img-responsive" src="<?php the_post_thumbnail_url('thumbnail'); ?>">
						
					</div>

					<div class="col-md-9 col-xs-8 col-sm-8 text-container">
						<p class="title_home3"><?php the_title(); ?></p>
						<p class="author_home3"><?php the_author_meta('display_name',$post_author_id);  ?></p>
						<p class="description_text_home3"><?php echo breaknews_limit_excerpt_words( get_the_excerpt(), 20 ); ?>...<a class="home3_read_more_link" href="<?php the_permalink(); ?>">আরো পড়ুন</a></p>
						<div class="row">
					        <div class="col-md-6 col-sm-6 col-xs-6 stats">
					          <span class="fa fa-star"><?php echo round($rating_result, 1);?> রেটিং</span>
					        </div>
					        <div class="col-md-6 col-sm-6 col-xs-6 views">
					          <span class="fa fa-eye"> <?php echo getPostViews(get_the_ID()); ?> পাঠক</span>
					        </div>
			    		</div>
					</div>
					
				</div>
				
			</div>
			</a>
		</div>
		<?php
			endwhile;
			wp_reset_query();
		?>
	</div>	

	
	<div class="row line-space"></div>
	
	
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<h2 class="head_line_home"> <i>কবিতা </i></h2>
		</div>
		<?php
		
			query_posts( array ( 'orderby'=>'rand','tag' => 'sadhinota-sankhya-2020','post_type' => 'post','category_name' => 'kobita'));
			while ( have_posts() ) : the_post();
				$post_author_id = get_post_field( 'post_author', get_the_ID() );

				$post_id = get_the_ID();

					$args = array('post_id' => get_the_ID());
					$fivesdrafts = $wpdb->get_results( 
						"
						SELECT * 
						FROM wp_yasr_log
						WHERE post_id='$post_id'
						"
					);
					$sum = 0;
					$count=0;

					foreach($fivesdrafts as $fivesdraf) :
						//print_r($fivesdraf);
						$vote=$fivesdraf->vote;
						$sum = $sum + (int)$vote;
							 $count++; 
					endforeach;

					if($count != 0){ 
						$rating_result=$sum/$count;
					}else {
						$rating_result= 0;
					}
		?>
		<div class="col-sm-12 col-md-6 col-xs-12 slider_container">
			<div class="col-xs-12 col-sm-12 col-md-12 list_content">
			<a href="<?php the_permalink(); ?>"  class="home3_link">
				<div class="row">
					<div class="col-md-3 col-xs-4 col-sm-4 img-container">
						<img class="img-responsive" src="<?php the_post_thumbnail_url('thumbnail'); ?>">
					</div>

					<div class="col-md-9 col-xs-8 col-sm-8 text-container">
						<p class="title_home3"><?php the_title(); ?></p>
						<p class="author_home3"><?php the_author_meta('display_name',$post_author_id);  ?></p>
						<p class="description_text_home3"><?php echo breaknews_limit_excerpt_words( get_the_excerpt(), 20 ); ?>...<a class="home3_read_more_link" href="<?php the_permalink(); ?>">আরো পড়ুন</a></p>
						<div class="row">
					        <div class="col-md-6 col-sm-6 col-xs-6 stats">
					          <span class="fa fa-star"> <?php echo round($rating_result, 1);?> রেটিং</span>
					        </div>
					        <div class="col-md-6 col-sm-6 col-xs-6 views">
					          <span class="fa fa-eye"> <?php echo getPostViews(get_the_ID()); ?> পাঠক</span>
					        </div>
			    		</div>
					</div>
					
				</div>
				
			</div>
			</a>
		</div>
		<?php
			endwhile;
			wp_reset_query();
		?>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 ">
			<a href="<?php home_url();?>/category/kobita/" class="btn btn-primary read_more" role="button">আরো কবিতা ...</a>
		</div>
	</div>

	
					
				


	


	
	


	




	
	

	

</div>
<!--<div id="slider_contaner">
<?php //echo do_shortcode('[jssor-slider alias="full-width-slider.slider"]');?>
</div>-->
<script type="text/javascript">
	
	/*$(document).ready(function($){
		var flag=0;

			$("#sampadakio_heading").on("click", function(){
				if(flag==0)
				{
					$(".sampadakio_heading").html('');
    				$(".sampadakio_heading").html('সম্পাদকীয় <i class="fa fa-angle-up" aria-hidden="true"></i>');
    				//alert(flag+"if");
    				flag=1;
    				//return flag;
				}else{
					$(".sampadakio_heading").html('');
    				$(".sampadakio_heading").html('সম্পাদকীয় <i class="fa fa-angle-down" aria-hidden="true"></i>');
  				 	 flag=0;
  				 	 //alert(flag+"else");
  				 	 
				}
				//alert(flag+"u");
				return flag;
  			});
  			//return flag;
  			//alert(flag);
		
		
		if(flag==1){
			$("#sampadakio_heading").on("click", function(){
				$(".sampadakio_heading").html('');
    			$(".sampadakio_heading").html('সম্পাদকীয় <i class="fa fa-angle-down" aria-hidden="true"></i>');
  				  flag=0;
  				  alert(flag+"else");
  				  
  			});
  			//return flag;
		}
		 
  		
	});*/
</script>
<?php
get_footer(); 
?>