<?php 

$orignal_post = $post;

global $post;
global $breaknews;

$posts_in = $breaknews['bn-related-posts-in'];
$order_by = $breaknews['bn-related-posts-order'];

$args = array(
	'post__not_in'     => array($post->ID),
	'posts_per_page'   => 3,
	'ignore_sticky_posts' => 1
);

if( $order_by == '1' ) {
	$args['orderby'] = 'date';
} elseif( $order_by == '2' ) {
	$args['orderby'] = 'rand';
}

if( $posts_in == '1' ) {
	// get related by category
	$cats = get_the_category( $post->ID );
	$cat_ids = array();
	foreach( $cats as $cat ) $cat_ids[] = $cat->term_id;

	$args['category__in'] = $cat_ids;

} elseif( $posts_in == '2' ) {
	// get related by tags
	if( get_the_tags( $post->ID ) ) {

		$tag_objects = get_the_tags( $post->ID );
		foreach( $tag_objects as $object ) $tags_ids[] = $object->term_taxonomy_id;

		$args['tag__in'] = $tags_ids;
	}
}


$breaknews_related_query = new wp_query( $args );
if( $breaknews_related_query->have_posts() ) : ?>
	<div class="related-posts">
		<div class="related-heading">
			<h3 class="related-title"><?php esc_html_e('এই লেখা গুলো আপনার ভাল লাগতে পারে', 'breaknews'); ?></h3>
		</div>
		<?php while( $breaknews_related_query->have_posts() ) :
			$breaknews_related_query->the_post(); ?>
			<div class="item-related">
				
				<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="related-img">
					<div class="related-ratio"></div>
					<div class="thumbnail">
					<?php the_post_thumbnail('breaknews-misc-thumb',array('style'=>"width:100%;height:260px;overflow:hidden;")); ?>
					<div class="caption">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
				<!--<span class="date"><?php //the_time( get_option('date_format') ); ?></span>-->
					</div>
					</div>
				</a>
				<?php endif; ?>
				
			</div>
		<?php endwhile; ?>
	</div>
<?php endif; 


$post = $orignal_post;
wp_reset_postdata();

?>