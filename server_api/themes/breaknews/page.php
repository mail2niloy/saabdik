<?php get_header(); ?>

	<div class="container">

		<div id="content">

			<div id="main">

				<?php
				if( have_posts() ) :
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

					endwhile;
				endif;
				?>

			</div>
			<div id="sidebar">
				<?php get_sidebar(); ?>
			</div>
			
		</div>
		
	</div>

<?php
get_footer();
