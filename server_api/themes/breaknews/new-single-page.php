<?php
/**
*Template Name: New single page
*Template Post Type:post
*/
get_header(); 
?>
<div class="container">
	<div class="row " style="margin-top:55px; ">
		<div class="col-md-12 single_pg_img">
		<?php the_post_thumbnail('breaknews-full-thumb',array('class' => 'img-responsive single-img-responsive')); ?>
		</div>
	</div>
	<div class="col-md-12 book-title">
		<h3><?php the_title(); 
		$post_author_id = get_post_field( 'post_author', $post_id );
		?></h3>
		<a href="<?php echo site_url();?>/author-details?id=<?php echo $post_author_id; ?>" class="author_name_link"><?php the_author_meta('display_name', $post->post_author);?></a>
		<?php
		the_content();
		?>
	</div>
	
</div>
<?php
get_footer();
?>