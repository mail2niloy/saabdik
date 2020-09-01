<?php
get_header(); 
?>

<div class="container">
	<div class="row" style="margin-top:55px; ">
		<div class="col-md-5 dtl_left_div">
			<div class=" dtl_img_div ">
			 	<?php the_post_thumbnail('breaknews-full-thumb',array('class' => 'img-responsive')); ?>
			</div>
			<div class="col-md-12 book-title">
				<h3><?php the_title(); 
				$post_author_id = get_post_field( 'post_author', $post_id );

				

				?></h3>
        		<a href="<?php echo site_url();?>/author-details?id=<?php echo $post_author_id; ?>" class="author_name_link"><?php the_author_meta('display_name', $post->post_author);?></a>
			</div>
			<div class="row book-title title_btn">
		       <!-- <button type="button" class="btn btn-rating btn-sm">
		          <span class="glyphicon glyphicon-star"></span> 4.5 
		        </button>-->
	        	<span class="ratingCount">
	        		<?php
	        		require_once( ABSPATH . 'wp-admin/includes/template.php' );
	        		//ini_set('display_errors', 1); 
					the_tags();
					?></span> 
	      	</div>
	      	<?php 
	      		$post_id = get_the_ID();
	      		$reading_tyme = get_post_meta( $post_id, 'reading_time', true );
	      		
			 	//echo $my_meta["reading_time"];
			 ?>
			 
	     	<!--<div class="row book-title">
	        	<span class="ratingCount">পঠন সময় : <time><?php //echo $reading_tyme["reading_time"]; ?> মিনিট</time></span>
	     	</div>-->
			<div class="row book-title">
	        	<span class="ratingCount">পাঠ সংখ্যা : <?php echo getPostViews(get_the_ID()); ?></span>
	        	
	        	<!--<span class="ratingCount">প্রকাশনার তারিখ : <time><?php //the_time('j F, Y'); ?></time></span>
	        	<span class="ratingCount">পঠন সময় : <time><?php //echo $reading_tyme["reading_time"]; ?> মিনিট</time></span>-->
	        	 
        	</div>
        	<div class="row button_div">
		        <!--<div class="col-md-6 button_div">
		          <button type="button" class="btn btn-default btn-block"> লাইব্রেরী</button>
		        </div>-->
		        <div class="col-md-12">
		        	<?php 
	        	 		
		        	$slug = get_post_field( 'post_name', get_post() );
   				 	?>
   				 	
		        	<a href="<?php echo site_url();?>/read?action=<?php echo $slug; ?>" class="btn btn_post btn-block " role="button">পড়ুন</a>
		          <!--<button type="button" class="btn btn-danger btn-block">পড়ুন</button>-->
		        </div>
		    </div>
		    <div class="row book-title">
		       <span class="ratingCount">আপনার বন্ধুদের সাথে শেয়ার করুন: </span>
		       <div class="button_div">
		       	<a href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink($post->ID)); ?>&t=<?php echo urlencode($post->post_title); ?>" target="blank"><i class="fa fa-facebook icon_facebook" aria-hidden="true"></i></a>
		       	<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ) ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>" title="Tweet Me" target="blank"><i class="fa fa-twitter icon_twitter" aria-hidden="true"></i></a>
		       	<!--<a href="#"><img src="http://www.saabdik.com/wp-content/uploads/2018/08/images-2.png" alt="pinterest" height="35" width="35"></a><a href="#"><img src="http://www.saabdik.com/wp-content/uploads/2018/08/images-1.jpg" alt="pinterest" height="35" width="35"></a>-->
		       </div>
		     </div> 

		</div>

		<div class="col-md-7">
	      <div class="col-md-12 author_div">
	       	<div class="head_line_div">
	        	<h3>লেখক পরিচিতি</h3>
	    	</div>
	         <div class="col-md-8  auth_img_div">
	         	
		        <a href="<?php echo site_url();?>/author-details?id=<?php echo $post_author_id; ?>">
		          <!--<img src="<?php //echo esc_url( get_avatar_url( $post_author_id ) );?>&amp;quality=low&amp;type=jpg&amp;width=50" class="author-img">-->
		          <?php echo get_avatar($post->post_author,60,array('class'=>'author-img'));
		          //echo $post->post_author;
		          	 ?>
		          <div class="auth-name">
		            <?php the_author_meta('display_name', $post->post_author); ?>
		          </div>
		        </a>

	        </div>
	        <!--<div class="col-md-4 auth_btn_div">
		        <button type="button" class="btn btn-default auth_flw_btn">
		          <span class="glyphicon glyphicon-user"></span>  অনুসরণ 
		        </button>
		        <button type="button" class="btn btn-default auth_msg_btn">
		          <span class="glyphicon glyphicon-envelope"></span> মেসেজ
		        </button>
	        </div>-->
	      </div>
	      <?php if( $breaknews['bn-post-author-box'] ) : ?>
		      <div class="col-md-12 col-xs-12 col-sm-12 author_desc_div">
		      	<p><?php the_author_meta('description', $post->post_author); ?></p>
		      </div>
	      <?php endif; ?>
	      <div class="col-md-12 col-xs-12 col-sm-12">
	      	<div class="head_line_div">
	      	 <h3>রিভিউসমূহ</h3>
	      	</div>
	      	<!--<?php //if( $breaknews['bn-post-author-box'] ) : ?>
				<?php //get_template_part('inc/templates/about_author'); ?>
			<?php //endif; ?>-->
			
			<!--<?php //if( $breaknews['bn-related-posts'] ) : ?>
				<?php //get_template_part('inc/templates/related_posts'); ?>
			<?php //endif; ?>-->
			<?php //echo $breaknews['bn-post-comments']; ?>
			<?php 
			//ini_set('display_errors', 1);
					//echo csr_get_rating_star_form();
					//echo csr_get_rating_star_form();
			if( $breaknews['bn-post-comments'] != 0 ) : ?>
					<?php comments_template();  ?>
			<?php endif; ?>
			<?php //echo do_shortcode('[RICH_REVIEWS_SHOW num="8"]'); ?>
			<?php //echo do_shortcode('[RICH_REVIEWS_FORM]'); ?>
	      	
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			
			<!--<h3 align="center">আপনার রিভিউ জানান</h3>-->
			<?php //echo do_shortcode('[RICH_REVIEWS_FORM]'); ?>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php //if(function_exists('the_ratings')) { the_ratings(); }
		 ?>
		<?php if( $breaknews['bn-related-posts'] ) : ?>
				<?php get_template_part('inc/templates/related_posts'); ?>
			<?php endif; ?>
		
	</div>
</div>
</div>
<?php
get_footer();
?>