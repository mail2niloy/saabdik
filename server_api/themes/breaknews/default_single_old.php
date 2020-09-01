<?php get_header(); ?>
<div class="container">
	<div id="content" class="single-page">
		<div id="main" <?php if( !$breaknews['bn-single-sidebar'] ) : ?>class="fullwidth"<?php endif; ?>>
		<?php if(have_posts()) : ?>
			<?php while(have_posts()) : the_post() ; ?>

				<?php setPostViews(get_the_ID()); ?>
	
			<!-- Gallery Post Featured  -->
			<?php if(has_post_format('gallery')) : ?>
			
				<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>
				
				
				<?php if($images) : ?>
				<div class="post-img">
					<ul class="bxslider">
					<?php foreach( $images as $image ) : ?>
						
						<?php $gallery_image = wp_get_attachment_image_src( $image, 'breaknews-full-thumb' ); ?> 
						<li><img src="<?php echo esc_url($gallery_image[0]); ?>"/></li>
						
					<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
			
			<!-- Video Post Featured  -->
			<?php elseif(has_post_format('video')) : ?>
			
				<div class="post-img">
					<?php $mm_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
					<?php if(wp_oembed_get( $mm_video )) : ?>
						<?php echo wp_oembed_get($mm_video); ?>
					<?php else : ?>
						<?php echo esc_url($mm_video); ?>
					<?php endif; ?>
				</div>

				
			
			<!-- Audio Post Featured  -->
			<?php elseif(has_post_format('audio')) : ?>
			
				<div class="post-img audio">
					<?php $mm_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
					<?php if(wp_oembed_get( $mm_audio )) : ?>
						<?php echo wp_oembed_get($mm_audio); ?>
					<?php else : ?>
						<?php echo esc_url($mm_audio); ?>
					<?php endif; ?>
				</div>

				
			
			<!-- Standard Post Featured  -->
			<?php else : ?>
				
				<?php if(has_post_thumbnail()) : ?>
				<div class="post-img">
					<?php the_post_thumbnail('breaknews-full-thumb'); ?>
				</div>
				<?php endif; ?>
				
			<?php endif; ?>

			<?php echo getPostViews(get_the_ID()); ?>

			<h1 class="post-title"><?php the_title(); ?></h1>

			<div class="post-meta">
				<div><span class="fa fa-user"></span><?php the_author_meta('display_name', $post->post_author); ?></div>
				<div><span class="fa fa-clock-o"></span><?php the_time(); ?></div>
				<div><span class="fa fa-comment"></span><?php comments_number(); ?></div>
				<div><span class="fa fa-folder-open"></span><?php the_category(' / '); ?></div>
			</div>
			
			<div class="post-entry">
								
				<?php

				the_content();

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );

				?>
				
				
				<?php if( $breaknews['bn-post-tags'] != '0' ) : ?>
					<div class="post-tags">
						<?php the_tags("",""); ?>
					</div>
				<?php endif; ?>	
								
			</div>
			<?php if( $breaknews['bn-post-share-btns'] ) : ?>
			<div class="post-share">
				
				<span><?php esc_html_e( 'share post :', 'breaknews' ); ?></span>
				
				<div class="share-btns">
					<?php if( $breaknews['bn-sharing-facebook-btn'] ) : ?>
					<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php esc_url( the_permalink() ); ?>"><span class="fa fa-facebook"></span></a>
					<?php endif; ?>
					<?php if( $breaknews['bn-sharing-twitter-btn'] ) : ?>
					<a target="_blank" href="https://twitter.com/home?status=Check%20out%20this%20article:%20<?php the_title(); ?>%20-%20<?php esc_url( the_permalink() ); ?>"><span class="fa fa-twitter"></span></a>
					<?php endif; ?>
					<?php if( $breaknews['bn-sharing-google-plus-btn'] ) : ?>
					<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
					<a target="_blank" href="https://plus.google.com/share?url=<?php esc_url( the_permalink() ); ?>"><span class="fa fa-google-plus"></span></a>
					<?php endif; ?>
					<?php if( $breaknews['bn-sharing-pinterest-btn'] ) : ?>
					<a data-pin-do="skipLink" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php esc_url( the_permalink() ); ?>&media=<?php echo esc_url($pin_image); ?>&description=<?php the_title(); ?>"><span class="fa fa-pinterest"></span></a>
					<?php endif; ?>
				</div>
				
			</div>
			<?php endif; ?>
			
			<?php if( $breaknews['bn-post-author-box'] ) : ?>
				<?php get_template_part('inc/templates/about_author'); ?>
			<?php endif; ?>
			
			<?php if( $breaknews['bn-related-posts'] ) : ?>
				<?php get_template_part('inc/templates/related_posts'); ?>
			<?php endif; ?>
			
			<?php if( $breaknews['bn-post-comments'] != '0' ) : ?>
					<?php comments_template();  ?>
			<?php endif; ?>

			<?php endwhile; ?>

		<?php endif ?>
		</div>
		<?php if( $breaknews['bn-single-sidebar'] ) : ?>
		<div id="sidebar">
			<?php get_sidebar(); ?>
		</div>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
