<?php global $breaknews; ?>
<article id="post-<?php the_ID(); ?>">

	<div class="post-img">
		
		<a href="<?php echo esc_url( get_permalink() ) ?>"><?php the_post_thumbnail('breaknews-full-thumb'); ?></a>

	</div>

	<header class="post-title">

		<?php the_title( '<h1>', '</h1>' ); ?>

	</header>

	<div class="post-entry">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'breaknews' ),
				'after'  => '</div>',
			) );
		?>
	</div>

	<?php if ( get_edit_post_link() ) : ?>
	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'breaknews' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer>
	<?php endif; ?>
	<?php
		// if comments enabled for pages
		if( $breaknews['bn-pages-show-comments'] ) {
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		};
	?>

</article>
