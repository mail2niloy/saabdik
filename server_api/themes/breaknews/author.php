<?php get_header(); ?>

	<div class="container">

		<div id="content">
			<div id="main">

			<header class="page-header">
				<h1 class="page-title">
					<?php

						if ( have_posts() ) : 
							?>
							<span class="fa fa-user"></span>
							<span><?php esc_html_e( 'Posts By : ', 'breaknews' ); ?></span>
							<span><?php the_post(); echo get_the_author(); ?></span>
							<?php

						endif;
					?>
				</h1>
			</header>

			<?php

			rewind_posts();

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
