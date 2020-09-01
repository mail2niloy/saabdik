<div class="featured-area">

	<?php
		global $breaknews;
		$featured_layout = $breaknews['bn-featured-layout'];
	?>

	<?php if( $featured_layout == 'slider' ) : ?>

		<?php get_template_part( 'inc/featured/layouts/slider' ); ?>

	<?php elseif( $featured_layout == 'slider-two-small' ) : ?>

		<?php get_template_part( 'inc/featured/layouts/slider-two-small' ); ?>

	<?php elseif( $featured_layout == 'slider-four-small' ) : ?>

		<?php get_template_part( 'inc/featured/layouts/slider-four-small' ); ?>

	<?php elseif( $featured_layout == 'full-two-small' ) : ?>

		<?php get_template_part( 'inc/featured/layouts/full-two-small' ); ?>

	<?php elseif( $featured_layout == 'three-big' ) : ?>

		<?php get_template_part( 'inc/featured/layouts/three-big' ); ?>

	<?php endif; ?>

</div>