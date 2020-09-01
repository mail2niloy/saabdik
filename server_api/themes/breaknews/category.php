<?php get_header(); ?>

	<!--<div class="container">

		<div id="content" class="content-area">

			<div id="main" class="site-main">
				<header class="page-header">
					<h1 class="page-title">
						<?php

							/*if ( have_posts() ) : 
								?>
								<span class="fa fa-file-text-o"></span>
								<span><?php printf( esc_html__( 'Category : %s', 'breaknews' ), single_cat_title( '', false ) ); ?></span>
								<?php

							endif;*/
						?>
					</h1>
				</header>

			<?php

			/*if ( have_posts() ) : ?>


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

			endif; */?>
			</div>-->
			<!--<div id="sidebar">
				<?php //get_sidebar(); ?>
			</div>
		</div>
	</div>-->

	<div class="container-fluid">

		<div style="margin-top:55px;">

			<!--<div id="main" class="site-main">-->
				<header class="page-header">
					<h1 class="page-title">
						<?php

							if ( have_posts() ) : 
								?>
								<span class="fa fa-file-text-o"></span>
								<span><?php printf( esc_html__( 'শ্রেণী : %s', 'breaknews' ), single_cat_title( '', false ) ); ?></span>
								<?php

							endif;
						?>
					</h1>
				</header>
			<?php

			if ( have_posts() ) : ?>


				<div class="row">
				<?php
				
				while ( have_posts() ) : the_post();
					echo '<div class="col-md-3 col-sm-6 col-xs-12 custom_cat_list_div">';
					echo '<div class=" custom_cat_list_inner_div">';
					get_template_part( 'template-parts/content' );
					echo '</div>';
					echo '</div>';
				
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
			<!--<div id="sidebar">
				<?php //get_sidebar(); ?>
			</div>
		</div>-->
	</div>
<?php
get_footer();
