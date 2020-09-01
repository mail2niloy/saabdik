<?php get_header(); ?>

	<div class="container">
		<div id="content" class="content-area">
			<div id="main">
			<header class="archive-header">
				<h1 class="archive-title">
				
				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title">
							<span class="fa fa-search"></span>
							<?php printf( esc_html__( 'Search Results for: %s', 'breaknews' ), '<span>' . get_search_query() . '</span>' ); ?>
						</h1>
					</header>
				
				<?php endif; ?>

				</h1>
			</header>
			<?php

			if ( have_posts() ) : ?>

				<div class="<?php echo esc_attr($breaknews['bn-search-posts-layout']); ?>-layout">

				<?php

				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content' );

				endwhile;

				echo '</div>';

				if( $breaknews['bn-search-pagination'] === '1' ) {

					breaknews_pagination_numbers();

				} elseif ( $breaknews['bn-search-pagination']  === '2' ) {

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
