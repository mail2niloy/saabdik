<?php
	global $breaknews;

	$feat_count   = $breaknews['bn-featured-count'];
	$hover_effect = $breaknews['bn-featured-hover-effect'];

	if( $hover_effect === '1' ) {
		$hover_class = 'img-zoom';
	} elseif( $hover_effect === '2' ) {
		$hover_class = 'img-light';
	} else {
		$hover_class = 'img-dark';
	}
?>
<div class="container">
	<div class="slider-ratio-holder">
		<div class="ratio"></div>
		<ul class="featured-slider">
			<?php $feat_query = breaknews_featured_query($feat_count); ?>
			<?php if( $feat_query->have_posts() ) : ?>
				<?php while( $feat_query->have_posts() ) : $feat_query->the_post() ; ?>
					<li>

						<div class="feat-item">
							<a class="feat-img <?php echo esc_attr($hover_class); ?>" href="<?php echo esc_url( get_permalink() ); ?>" style="background-image:url(<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'breaknews-full-thumb' ); echo esc_url($image[0]); ?>);"></a>
							<div class="feat-header">
								<span class="f-cat"><?php the_category(' / '); ?></span>
							</div>
							<div class="feat-content">
								<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
								<div class="f-date"><span class="fa fa-clock-o"></span><?php the_time( get_option('date_format') ); ?></div>
								<div class="f-comments"><span class="fa fa-comment"></span><?php comments_number(); ?></div>
							</div>					
						</div>
				
					</li>
				<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</ul>
	</div>
</div>

