<?php global $breaknews; ?>

<!-- Start Fixed Elements 
<div class="fixed-buttons">
	
	 Scroll Button 
	<?php if( $breaknews['bn-scroll-btn'] ) { ?>
		<div class="scroll-up-btn fa fa-arrow-up"></div>
	<?php } ?>

	Contact Button 
	<?php if( $breaknews['bn-contact-btn'] ) { ?>
		<div class="contact-btn fa fa-envelope"></div>
	<?php } ?>
	
	 Social Button 
	<?php if( $breaknews['bn-social-btn'] ) { ?>
		<div class="social-btn">
		    <span class="toggle fa fa-share-alt"></span>
			<div class="social-icons">
				<?php breaknews_social_links(); ?>
			</div>
		</div>
	<?php } ?>

</div>

Contact Us Popup 
<div id="body_overlay">

	<div class="overlay"></div>

	<div class="contact-popup popup">
		<div class="header">
			<span class="fa fa-envelope"></span>
			<div><?php esc_html_e('Contact Us', 'rewaia'); ?></div>
		</div>
		<?php echo do_shortcode(htmlspecialchars_decode(esc_html($breaknews['bn-contact-shortcode']))); ?>
	</div>

</div>

<div id="instagram-footer">
	<?php
		if ( is_active_sidebar( 'sidebar-5' ) ) {
			dynamic_sidebar( 'sidebar-5' );
		}
	?>
</div>-->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<?php
				if ( is_active_sidebar( 'sidebar-2' ) ) {
					dynamic_sidebar( 'sidebar-2' );
				}
			?>

			</div>
			<div class="col-sm-3">
				<?php
				if ( is_active_sidebar( 'sidebar-3' ) ) {
					dynamic_sidebar( 'sidebar-3' );
				}
				?>
			</div>
			<div class="col-sm-3">
				<?php
				if ( is_active_sidebar( 'sidebar-4' ) ) {
					dynamic_sidebar( 'sidebar-4' );
				}
			?>
			</div>
		</div>
		
			
		
	</div>
	<?php if( $breaknews['bn-show-small-footer'] ) : ?>
		<div class="small-footer">
			<div class="container">
				<div class="copyright">
					<?php if($breaknews['bn-copyright']) : ?>
						<?php echo esc_attr($breaknews['bn-copyright']); ?>
					<?php endif; ?>
				</div>
				<?php
					if( $breaknews['bn-show-footer-menu'] ) {
						wp_nav_menu( array( 'container' => false, 'theme_location' => 'footer-menu', 'menu_class' => 'menu', 'after' => '<span class="del"></span>' ) );
					}
				?>
			</div>
		</div>
	<?php endif; ?>
		
</footer>

<?php wp_footer(); ?>

</body>
</html>
