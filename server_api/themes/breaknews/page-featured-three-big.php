<?php
 
/*
	Template Name: Featured Three Big
*/
	
?>
<?php get_header(); ?>

	<div class="featured-area">
		<?php get_template_part('inc/featured/layouts/three-big'); ?>
	</div>

	<div class="container">

		<div id="content">

			<div id="main" class="fullwidth">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

				endwhile; 
				?>

			</div>

		</div>

	</div>

<?php
get_footer();
