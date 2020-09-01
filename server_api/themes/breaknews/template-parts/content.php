<?php global $breaknews; ?>

<article <?php post_class('post custom_post'); ?>>
	<header class="post-header <?php if(!has_post_thumbnail()) : ?>no-image<?php endif; ?>">
		<?php if(has_post_thumbnail()) : ?>
			<a class="post-img img-light" href="<?php echo esc_url( get_permalink() ); ?>">
			
				<?php the_post_thumbnail('breaknews-misc-thumb',array('style'=>"width:100%;height:260px;overflow:hidden;")); ?>
			
			</a>
		<?php endif; ?>
		<?php if($breaknews['bn-post-meta-cat'] && $breaknews['bn-cat-style'] === 'on') : ?>
		<div class="post-cat"><?php the_category(' '); ?></div>
		<?php endif; ?>
		<?php if( is_sticky() ) : ?>
			<div class="sticky-post fa fa-thumb-tack"></div>
		<?php endif; ?>
	
	<?php the_title( '<h2 class="post-title "><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></header>
	<?php if($breaknews['bn-post-meta-cat'] && $breaknews['bn-cat-style'] === 'under') : ?>
		<div class="post-cat-o"><?php the_category(', '); ?></div>
	<?php endif; ?>
	<div class="post-meta custom_post_meta">
		<?php if( $breaknews['bn-post-meta-author'] ) : ?>
			<div><span class="fa fa-user"></span><a href="<?php echo get_author_posts_url(get_the_author_id()); ?>"><?php the_author(); ?></a></div>
		<?php endif; ?>
		<!--<?php //if( $breaknews['bn-post-meta-date'] ) : ?>
			<div><span class="fa fa-clock-o"></span><?php //the_time( get_option('date_format') ); ?></div>
		<?php //endif; ?>-->
		<?php if( $breaknews['bn-post-meta-comments'] ) : ?>
			<div><span class="fa fa-comment"></span><?php comments_number(); ?></div>
		<?php endif; ?>
	</div>
	<div class="post-excerpt">
		<p><?php echo breaknews_limit_excerpt_words( get_the_excerpt(), 25 ); ?>&hellip;</p>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div>
	<?php if($breaknews['bn-post-meta-tags']) : ?>
	<div class="post-tags">
		<?php //the_tags('', ' '); ?>
	</div>
	<?php endif; ?>
	<?php if(!get_the_title()) : ?>
		<a class="read-more-link" href="<?php esc_url( the_permalink() ); ?>"><?php esc_html_e('Continue Reading ..', 'breaknews'); ?></a>
	<?php endif; ?>
</article>

<span class="clearfix"></span>
