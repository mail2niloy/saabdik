<?php get_header(); ?>

	<div class="container">
		<div id="content" class="content-area">
			<div id="main" class="site-main" role="main">

				<section class="error-404 not-found">

					<p><?php esc_html_e( 'It looks like nothing was found at this location, Perhaps searching can help', 'breaknews' ); ?></p>

					<?php get_search_form(); ?>

				</section>


			</div>
			<div id="sidebar">
			<?php

				the_widget( 'WP_Widget_Recent_Posts' );

				the_widget( 'WP_Widget_Tag_Cloud' );

				// Only show the widget if site has multiple categories.
				if ( breaknews_categorized_blog() ) :
				?>

					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'breaknews' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div>

				<?php
				endif;
				$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'breaknews' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

			?>
			</div>
		</div>
	</div>

<?php
get_footer();
