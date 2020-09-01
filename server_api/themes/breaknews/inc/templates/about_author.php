<?php if(get_the_author_meta('description', $post->post_author)) : ?>
	<div class="post-author">
		
		<div class="author-img">
			<?php echo get_avatar( get_the_author_meta('email', $post->post_author), '90' ); ?>
		</div>
		
		<div class="author-content">
			<h5 class="author-name"><?php the_author_meta('display_name', $post->post_author); ?></h5>
				<p><?php the_author_meta('description', $post->post_author); ?></p>
			
			<?php if ( function_exists('milliomola_author_links') ) {	milliomola_author_links(); } ?>

		</div>
		
	</div>
<?php endif; ?>