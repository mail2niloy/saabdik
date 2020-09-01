<?php
get_header(); 
?>
<div class="container-fluid">
	<div class="row " style="margin-top:55px; ">
		<div class="col-md-12 col-sm-12 col-xs-12 single_pg_img">
		<?php the_post_thumbnail('breaknews-full-thumb',array('class' => 'img-responsive single-img-responsive')); ?>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12 book-title">
		<h3><?php 
		$post_id=get_the_ID();
		setPostViews($post_id);
		the_title(); 
		$post_author_id = get_post_field( 'post_author', $post_id );
		$user_login_name = get_the_author_meta('user_login',$post_author_id);
		?></h3>
		<a href="<?php echo site_url();?>/author-details?a=<?php echo $user_login_name; ?>" class="author_name_link"><span class="fa fa-pencil"></span> <?php the_author_meta('display_name', $post->post_author);?></a>
		
	</div>
			<div class="row ">
				<?php
				require_once( ABSPATH . 'wp-admin/includes/template.php' );
				//ini_set('display_errors', 1); 
					$args = array('post_id' => get_the_ID());
					/*rating show*/
					//echo $wpdb;
					//print_r($wpdb);
					$fivesdrafts = $wpdb->get_results( 
						"
						SELECT * 
						FROM wp_yasr_log
						WHERE post_id='$post_id'
						"
					);

					
					//var_dump($fivesdrafts);
					/*echo "<pre>";
					print_r($fivesdrafts);
					echo "<pre>";*/
					 $comments = get_comments($args);
					//var_dump($comments);
					$sum = 0;
					$count=0;

					foreach($fivesdrafts as $fivesdraf) :
						//print_r($fivesdraf);
						$vote=$fivesdraf->vote;
						$sum = $sum + (int)$vote;
							 $count++; 
					endforeach;


						//echo $comment->comment_ID;
					/*foreach($comments as $comment) :
						
						 $approvedComment = $comment->comment_approved; 
						
						 if($approvedComment > 0){  
						 $rates = get_comment_meta( $comment->comment_ID, 'rating', true );
						 }
						 if($rates){
							 $sum = $sum + (int)$rates;
							 $count++;
					 	}
					    
						endforeach;*/
						if($count != 0){ 
							$rating_result=$sum/$count;
						}else {
							$rating_result= 0;
						}
				
				?>
				<div class="col-md-4 col-xs-4 col-sm-4 singlepg_meta_div"><span class="fa fa-star"></span> <?php echo round($rating_result, 1); //$post_meta_value = get_post_meta( $post_id, '_kksr_avg', true ); ?> রেটিং</div>
				<div class="col-md-4 col-xs-4 col-sm-4 singlepg_meta_div"><span class="fa fa-folder-open"></span> <?php the_category(' / '); ?></div>
				<div class="col-md-4 col-xs-4 col-sm-4 singlepg_meta_div"><span class="fa fa-eye"></span> <?php echo getPostViews(get_the_ID()); ?> পাঠক</div>
			</div>
			<?php
				$post_id=get_the_ID();
				$url = get_permalink($post_id);
         		$url = esc_url($url);			
			?>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 ">
					<div class="reading_div">
					<?php
					//$post_id=get_the_ID();

					$post = get_post($post_id); 
					$content = apply_filters('the_content', $post->post_content); 
					
				   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
				   $replacement = '<img$1class="$2 img-responsive"$3>';
				   $content = preg_replace($pattern, $replacement, $content);


					echo $content;
					
					//the_content();
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );

					?>
				<div class="row book-title">
					<div class="center-block">
					<span class="ratingCount"><b>আপনার রেটিং দিন:</b></span>
					<?php //if(function_exists("kk_star_ratings")) : echo kk_star_ratings($post_id); endif; 
					//echo $post_id;
					echo do_shortcode('[yasr_visitor_votes]');
					?>
					</div>

		       <span class="ratingCount">আপনার বন্ধুদের সাথে শেয়ার করুন: </span>
		       <div class="button_div">
		       		<?php
		       			//$url = get_permalink($post_id);
         				//$url = esc_url($url);
		       		?>
		        <a data-text='<?php echo get_the_title( $post_id ); ?>' data-link='<?php echo $url; ?>' class='whatsapp-button whatsapp-share'><i class="fa fa-whatsapp icon_facebook" aria-hidden="true"></i></a>

		       	<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="blank"><i class="fa fa-facebook icon_facebook" aria-hidden="true"></i>
		       	</a>
		       	<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ) ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>"><i class="fa fa-twitter icon_twitter" aria-hidden="true"></i></a>
		       	<!--<a href="#"><img src="http://www.saabdik.com/wp-content/uploads/2018/08/images-2.png" alt="pinterest" height="35" width="35"></a><a href="#"><img src="http://www.saabdik.com/wp-content/uploads/2018/08/images-1.jpg" alt="pinterest" height="35" width="35"></a>-->
		</div>
			       <span class="ratingCount">
			          <?php
			          require_once( ABSPATH . 'wp-admin/includes/template.php' );
			          //ini_set('display_errors', 1); 
			      //the_tags();
			      ?></span> 

     </div> 
				
					<!--<button type="button" id="comment_btn" class="btn btn-primary center-block">মন্তব্য দিন</button>-->
					</div>
				</div>
			</div>
			
			
				<?php if( $breaknews['bn-post-comments'] != '0' ) : ?>
					<?php comments_template();  ?>
				<?php endif; ?>

			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="head_line_div">
						<h2>নতুন প্রকাশিত</h2>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
				<?php echo do_shortcode('[wcp-carousel id="898" order="DESC" orderby="date" count="10"]  '); ?>
				</div>
			</div>

			<div class="row line-space"></div>
			
			<div class="row">
				<!-- <div class="col-md-6 col-sm-6 col-xs-6">
					<?php  
						$prev_post = get_previous_post($in_same_term = false,$excluded_terms = '',$taxonomy = 'category');
		           //echo $prev_post->post_author;
		          //print_r($prev_post)
		           //$prev_user = the_author_meta('display_name', $prev_post->post_author);
		            if (!empty( $prev_post )): ?>
		             <span class="fa fa-long-arrow-left"></span> <a  href="<?php echo $prev_post->guid ?>"><?php echo $prev_post->post_title ?></a>
		            <?php endif
					?>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 next_link_div">
					<?php  
						$next_post = get_next_post($in_same_term = false,$excluded_terms = '',$taxonomy = 'category');
		            if (!empty( $next_post )): ?>
		              <a  href="<?php echo $next_post->guid ?>"><?php echo $next_post->post_title ?></a> <span class="fa fa-long-arrow-right"></span>
		            <?php endif
					?>
				</div> -->
				<div class="col-md-12 col-sm-12 col-xs-12">
					<?php //if(function_exists('the_ratings')) { the_ratings(); }
					 ?>
					<?php if( $breaknews['bn-related-posts'] ) : ?>
						<?php get_template_part('inc/templates/related_posts'); ?>
					<?php endif; ?>
					
				</div>
			</div>
			
</div>
<script type="text/javascript">
	/*jQuery(document).ready(function(){
		$('#comment_div').hide();
		jQuery('#comment_btn').click(function(){
			//alert("hi");
			$('#comment_div').show();
		});

	});*/

jQuery(document).ready(function() {
  jQuery('.whatsapp-button').on("click", function(e) {
    if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    var article = jQuery(this).attr("data-text");
    var weburl = jQuery(this).attr("data-link");
    var whats_app_message = article+" - "+weburl;
    var whatsapp_url = "whatsapp://send?text="+whats_app_message;
    window.location.href= whatsapp_url;
    }else{
     alert('you are not on mobile device.');
    }
  });
});
</script>
<?php
get_footer();
?>