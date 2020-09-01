<?php get_header(); ?>

<!-- Start Featured Area -->
<?php if( $breaknews['bn-featured'] ) : ?>
	<?php get_template_part('inc/featured/featured'); ?>
<?php endif; ?>
<!-- End Featured Area -->

<?php
	$home_sidebar = $breaknews['bn-home-sidebar'];
	$posts_layout = $breaknews['bn-home-posts-layout'];
	$posts_count  = $breaknews['bn-home-posts-count'];
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
	$args = array(
		'posts_per_page' => $posts_count,
		'paged' => $paged
	);
	$home_posts = new WP_Query( $args );
?>

<div class="container">
	<div id="content">
		<div id="main" class="<?php if( !$breaknews['bn-home-sidebar'] ) : ?>fullwidth<?php else: ?>have-sidebar<?php endif; ?>">
			<?php if ($home_posts->have_posts()) : ?>
				<div class="<?php echo esc_attr($breaknews['bn-home-posts-layout']); ?>-layout">

					<?php while ($home_posts->have_posts()) : $home_posts->the_post(); ?>

						<?php get_template_part('template-parts/content'); ?>

					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
					<?php if( $breaknews['bn-home-pagination'] === '1' ) : ?>

						<?php breaknews_pagination_numbers(); ?>
						
					<?php elseif( $breaknews['bn-home-pagination'] === '2' ) : ?>

						<?php breaknews_pagination_next_prev(); ?>
						
					<?php else : ?>

						<?php breaknews_pagination_numbers(); ?>
						
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php if( $breaknews['bn-home-sidebar'] ) : ?>
		<div id="sidebar">
			<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>