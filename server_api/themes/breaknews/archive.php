<?php get_header(); ?>

	<div class="container">

		<div id="content" class="content-area">

			<div id="main" class="site-main" role="main">
			<header class="page-header">
				<h1 class="page-title">
					<?php



						if ( have_posts() ) : 
							
							echo '<span class="fa fa-calendar"></span>';

							echo '<span>';

							if ( is_day() ) :
								printf( esc_html__( 'Daily Archives: %s', 'breaknews' ), get_the_date() );

							elseif ( is_month() ) :
								printf( esc_html__( 'Monthly Archives: %s', 'breaknews' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'breaknews' ) ) );

							elseif ( is_year() ) :
								printf( esc_html__( 'Yearly Archives: %s', 'breaknews' ), get_the_date( _x( 'Y', 'yearly archives date format', 'breaknews' ) ) );

							else :
								the_archive_title();

							endif;
							
							echo '<span>';

						endif;
					?>
				</h1>
			</header>

			<?php

			if ( have_posts() ) : ?>

				<div class="<?php echo esc_attr($breaknews['bn-archive-posts-layout']); ?>-layout">
				<?php
				
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content' );

				endwhile;

				echo '</div>';

				if( $breaknews['bn-archive-pagination'] === '1' ) {

					breaknews_pagination_numbers();

				} elseif ( $breaknews['bn-archive-pagination']  === '2' ) {

					breaknews_pagination_next_prev();

				};

				wp_reset_postdata();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>
			</div>
			<div id="sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php
get_footer();
