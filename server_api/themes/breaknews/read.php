<?php
/**
*Template Name: read page
*/
get_header(); 
$slug = $_REQUEST["action"];
$args = array(
  'name'           => $slug,
  'post_type'      => 'post',
  'post_status'    => 'publish',
  'posts_per_page' => 1
);
$post = get_posts( $args );
$post_id=$post[0]->ID;

setPostViews($post_id);

?>
<style type="text/css">
	footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
}
</style>
<div class="container">
	<div class="row" style="margin-top:55px; ">
		<h2 align="center"><?php echo get_the_title( $post_id ); ?></h2>
		<div class="col-md-12 col-xs-12 col-sm-12 reading_div">
			<?php 
				$post = get_post($post_id); 
				$content = apply_filters('the_content', $post->post_content); 
				echo $content;
        $url = get_permalink($post_id);
         $url = esc_url($url);   
			?>	

		</div>
	</div>
	<div class="row book-title">
        
       <span class="ratingCount">আপনার বন্ধুদের সাথে শেয়ার করুন: </span>
       <div class="button_div">

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
     <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
         <?php
          $post_author_id = get_post_field( 'post_author', $post_id );
           $prev_post = get_previous_post('post_author',$post_author_id);
           //echo $prev_post->post_title;
          //print_r($prev_post)
           /* $prev_user = get_user_by( 'id', $prev_post->post_author );
            if (!empty( $prev_post )): ?>
              <a href="<?php echo $prev_post->guid ?>"><?php echo $prev_post->post_title ?> (<?php echo $prev_user->first_name . ' ' . $prev_user->last_name; ?>)</a>
            <?php endif */
         ?>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <?php

            $next_post = get_next_post('post_author',$post_author_id);
            // echo $next_post->post_title;
            /*$next_user = get_user_by( 'id', $next_post->post_author );
            if (!empty( $prev_post )): ?>
              <a href="<?php echo $next_post->guid ?>"><?php echo $next_post->post_title ?> (<?php echo $next_user->first_name . ' ' . $next_user->last_name; ?>)</a>
            <?php endif */
          ?>
        </div>
     </div>

	<div class="col-md-12">
	<?php if( $breaknews['bn-related-posts'] ) : ?>
		<?php get_template_part('inc/templates/related_posts'); ?>
	<?php endif; ?>
	</div>
</div>
<script type="text/javascript">
	jQuery(document).ready(function ($) {
    //Disable cut copy paste
    jQuery('body').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
   
    //Disable mouse right click
    jQuery("body").on("contextmenu",function(e){
        return false;
    });
});
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
