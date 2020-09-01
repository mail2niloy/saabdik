<?php
 
/*
	Template Name: Page With Featured & No Sidebar
*/
	
?>
<?php get_header(); ?>

	<?php get_template_part('inc/featured/featured'); ?>

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
