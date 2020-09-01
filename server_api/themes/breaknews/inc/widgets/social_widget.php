<?php 

class milliomola_social_widget extends WP_Widget {

	// Widget Setup
	function __construct() {
		parent::__construct(
			// widget ID
			'milliomola_social_widget',

			// widget name
			esc_html__( 'milliomola social widget', 'breaknews' ),

			// widget options
			array( 'description' => esc_html__( 'Show Your Social Media Icons' , 'breaknews' ) ),

			// control options
			array( 'id_base' => 'milliomola_social_widget', 'width' => 250, 'height' => 350 )
		);
	}

	// widget frontend
	public function widget( $args, $instance ) {

		global $breaknews;

		// widget settings variables
		$title      =   apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'] );
		$facebook   = ! empty( $instance['facebook'] ) ? '1' : '0';
		$twitter    = ! empty( $instance['twitter'] ) ? '1' : '0';
		$googleplus = ! empty( $instance['googleplus'] ) ? '1' : '0';
		$linkedin   = ! empty( $instance['linkedin'] ) ? '1' : '0';
		$pinterest  = ! empty( $instance['pinterest'] ) ? '1' : '0';
		$instagram  = ! empty( $instance['instagram'] ) ? '1' : '0';
		$tumblr     = ! empty( $instance['tumblr'] ) ? '1' : '0';
		$youtube    = ! empty( $instance['youtube'] ) ? '1' : '0';
		$vimeo      = ! empty( $instance['vimeo'] ) ? '1' : '0';
		$soundcloud = ! empty( $instance['soundcloud'] ) ? '1' : '0';
		$dribbble   = ! empty( $instance['dribbble'] ) ? '1' : '0';
		$reddit     = ! empty( $instance['reddit'] ) ? '1' : '0';
		$rss        = ! empty( $instance['rss'] ) ? '1' : '0';
		$style 		= ! empty( $instance['style'] ) ? $instance['style'] : 'square';

		echo $args['before_widget'];

		if( !empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
			?>

			<div class="widget_social <?php echo $style; ?>">

				<?php if($facebook): ?><a href="<?php echo esc_url($breaknews['bn-facebook-link']); ?>" class="smoth" target="_blank"><i class="fa fa-facebook colored-facebook"></i><span class="colored-facebook"><?php esc_html_e('Facebook', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($twitter): ?><a href="<?php echo esc_url($breaknews['bn-twitter-link']); ?>" class="smoth" target="_blank"><i class="fa fa-twitter colored-twitter"></i><span class="colored-twitter"><?php esc_html_e('Twitter', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($googleplus): ?><a href="<?php echo esc_url($breaknews['bn-google-plus-link']); ?>" class="smoth" target="_blank"><i class="fa fa-google-plus colored-googleplus"></i><span class="colored-googleplus"><?php esc_html_e('Google+', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($linkedin): ?><a href="<?php echo esc_url($breaknews['bn-linked-in-link']); ?>" class="smoth" target="_blank"><i class="fa fa-linkedin colored-linkedin"></i><span class="colored-linkedin"><?php esc_html_e('Linkedin', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($pinterest): ?><a href="<?php echo esc_url($breaknews['bn-pinterest-link']); ?>" class="smoth" target="_blank"><i class="fa fa-pinterest-p colored-pinterest"></i><span class="colored-pinterest"><?php esc_html_e('Pinterest', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($instagram): ?><a href="<?php echo esc_url($breaknews['bn-instagram-link']); ?>" class="smoth" target="_blank"><i class="fa fa-instagram colored-instagram"></i><span class="colored-instagram"><?php esc_html_e('Instagram', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($tumblr): ?><a href="<?php echo esc_url( $breaknews['bn-tumblr-link']); ?>" class="smoth" target="_blank"><i class="fa fa-tumblr colored-tumblr"></i><span class="colored-tumblr"><?php esc_html_e('Tumblr', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($youtube): ?><a href="<?php echo esc_url($breaknews['bn-youtube-link']); ?>" class="smoth" target="_blank"><i class="fa fa-youtube-play colored-youtube"></i><span class="colored-youtube"><?php esc_html_e('Youtube', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($vimeo): ?><a href="<?php echo esc_url($breaknews['bn-vimeo-link']); ?>" class="smoth" target="_blank"><i class="fa fa-vimeo colored-vimeo"></i><span class="colored-vimeo"><?php esc_html_e('Vimeo', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($soundcloud): ?><a href="<?php echo esc_url($breaknews['bn-soundcloud-link']); ?>" class="smoth" target="_blank"><i class="fa fa-soundcloud colored-soundcloud"></i><span class="colored-soundcloud"><?php esc_html_e('Soundcloud', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($dribbble): ?><a href="<?php echo esc_url($breaknews['bn-dribbble-link']); ?>" class="smoth" target="_blank"><i class="fa fa-dribbble colored-dribbble"></i><span class="colored-dribbble"><?php esc_html_e('Dribbble', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($reddit): ?><a href="<?php echo esc_url($breaknews['bn-reddit-link']); ?>" class="smoth" target="_blank"><i class="fa fa-reddit colored-reddit"></i><span class="colored-reddit"><?php esc_html_e('Reddit', 'breaknews'); ?></span></a><?php endif; ?>
				<?php if($rss): ?><a href="<?php echo esc_url($breaknews['bn-rss-link']); ?>" class="smoth" target="_blank"><i class="fa fa-rss colored-rss"></i><span class="colored-rss"><?php esc_html_e('RSS', 'breaknews'); ?></span></a><?php endif; ?>

			</div>

			<?php
		}
		echo $args['after_widget'];
	}

	// widget backend
	public function form( $instance ) {

		// Default widget values
		$defaults = array(
			'title'		  => 'Social Links',
			'facebook'	  => '',
			'twitter'	  => '',
			'googleplus'  => '',
			'linkedin'	  => '',
			'pinterest'	  => '',
			'instagram'	  => '',
			'tumblr'	  => '',
			'youtube'	  => '',
			'vimeo'		  => '',
			'soundcloud'  => '',
			'dribbble'    => '',
			'reddit'      => '',
			'rss'		  => '',
			'style'		  => 'square'
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		// widget settings variables
		$title      = $instance['title'];
		$facebook   = $instance['facebook'];
		$twitter    = $instance['twitter'];
		$googleplus = $instance['googleplus'];
		$linkedin   = $instance['linkedin'];
		$pinterest  = $instance['pinterest'];
		$instagram  = $instance['instagram'];
		$tumblr     = $instance['tumblr'];
		$youtube    = $instance['youtube'];
		$vimeo      = $instance['vimeo'];
		$soundcloud = $instance['soundcloud'];
		$dribbble   = $instance['dribbble'];
		$reddit     = $instance['reddit'];
		$rss        = $instance['rss'];

		$style		= $instance['style'];

		// admin form
		?>
		<div class="mm-widget">

		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title :', 'breaknews'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
		</p>

		<!-- Facebook Link -->
		<p>
			<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php esc_html_e('Show Facebook :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" <?php checked( (bool) $facebook, true ); ?>>
		</p>

		<!-- Twitter Link -->
		<p>
			<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php esc_html_e('Show Twitter :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" <?php checked( (bool) $twitter, true ); ?>>
		</p>

		<!-- Google+ Link -->
		<p>
			<label for="<?php echo $this->get_field_id('googleplus'); ?>"><?php esc_html_e('Show Google+ :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('googleplus'); ?>" name="<?php echo $this->get_field_name('googleplus'); ?>" <?php checked( (bool) $googleplus, true ); ?>>
		</p>

		<!-- Linkedin Link -->
		<p>
			<label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php esc_html_e('Show Linkedin :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" <?php checked( (bool) $linkedin, true ); ?>>
		</p>

		<!-- Pinterest Link -->
		<p>
			<label for="<?php echo $this->get_field_id('pinterest'); ?>"><?php esc_html_e('Show Pinterest :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('pinterest'); ?>" name="<?php echo $this->get_field_name('pinterest'); ?>" <?php checked( (bool) $pinterest, true ); ?>>
		</p>

		<!-- Instagram Link -->
		<p>
			<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php esc_html_e('Show Instagram :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" <?php checked( (bool) $instagram, true ); ?>>
		</p>

		<!-- Tumblr Link -->
		<p>
			<label for="<?php echo $this->get_field_id('tumblr'); ?>"><?php esc_html_e('Show Tumblr :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('tumblr'); ?>" name="<?php echo $this->get_field_name('tumblr'); ?>" <?php checked( (bool) $tumblr, true ); ?>>
		</p>

		<!-- Youtube Link -->
		<p>
			<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php esc_html_e('Show Youtube :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" <?php checked( (bool) $youtube, true ); ?>>
		</p>

		<!-- Vimeo Link -->
		<p>
			<label for="<?php echo $this->get_field_id('vimeo'); ?>"><?php esc_html_e('Show Vimeo :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('vimeo'); ?>" name="<?php echo $this->get_field_name('vimeo'); ?>" <?php checked( (bool) $vimeo, true ); ?>>
		</p>

		<!-- Soundcloud Link -->
		<p>
			<label for="<?php echo $this->get_field_id('soundcloud'); ?>"><?php esc_html_e('Show Soundcloud :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('soundcloud'); ?>" name="<?php echo $this->get_field_name('soundcloud'); ?>" <?php checked( (bool) $soundcloud, true ); ?>>
		</p>

		<!-- Dribbble Link -->
		<p>
			<label for="<?php echo $this->get_field_id('dribbble'); ?>"><?php esc_html_e('Show Dribbble :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('dribbble'); ?>" name="<?php echo $this->get_field_name('dribbble'); ?>" <?php checked( (bool) $dribbble, true ); ?>>
		</p>

		<!-- Reddit Link -->
		<p>
			<label for="<?php echo $this->get_field_id('reddit'); ?>"><?php esc_html_e('Show Reddit :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('reddit'); ?>" name="<?php echo $this->get_field_name('reddit'); ?>" <?php checked( (bool) $reddit, true ); ?>>
		</p>

		<!-- RSS Link -->
		<p>
			<label for="<?php echo $this->get_field_id('rss'); ?>"><?php esc_html_e('Show RSS :', 'breaknews'); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id('rss'); ?>" name="<?php echo $this->get_field_name('rss'); ?>" <?php checked( (bool) $rss, true ); ?>>
		</p>

		<!-- Icons Style -->
		<label for="<?php echo $this->get_field_id('style') ?>"><?php esc_html_e('Icons Style :', 'breaknews'); ?></label>
		<p>
			<input type="radio" id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>" value="square" <?php checked( $style, 'square' ); ?>>
			<?php esc_html_e('Square', 'breaknews'); ?>
		</p>

		<p>
			<input type="radio" id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>" value="circle" <?php checked( $style, 'circle' ); ?>>
			<?php esc_html_e('Circle', 'breaknews'); ?>
		</p>

		<p>
			<input type="radio" id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>" value="colored-square" <?php checked( $style, 'colored-square' ); ?>>
			<?php esc_html_e('Colored Square', 'breaknews'); ?>
		</p>

		<p>
			<input type="radio" id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>" value="colored-reactangle" <?php checked( $style, 'colored-reactangle' ); ?>>
			<?php esc_html_e('Colored Reactangle', 'breaknews'); ?>
		</p>

		</div>

		<?php
	}

	// update widget information
	function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']       =  strip_tags( $new_instance['title'] );
		$instance['facebook']    =  strip_tags( $new_instance['facebook'] );
		$instance['twitter']     =  strip_tags( $new_instance['twitter'] );
		$instance['googleplus']  =  strip_tags( $new_instance['googleplus'] );
		$instance['linkedin']    =  strip_tags( $new_instance['linkedin'] );
		$instance['pinterest']   =  strip_tags( $new_instance['pinterest'] );
		$instance['instagram']   =  strip_tags( $new_instance['instagram'] );
		$instance['tumblr']      =  strip_tags( $new_instance['tumblr'] );
		$instance['youtube']     =  strip_tags( $new_instance['youtube'] );
		$instance['vimeo']       =  strip_tags( $new_instance['vimeo'] );
		$instance['soundcloud']  =  strip_tags( $new_instance['soundcloud'] );
		$instance['dribbble']    =  strip_tags( $new_instance['dribbble'] );
		$instance['reddit']      =  strip_tags( $new_instance['reddit'] );
		$instance['rss']         =  strip_tags( $new_instance['rss'] );

		$instance['style']       =  strip_tags( $new_instance['style'] );

		return $instance;
	}
}


function milliomola_load_social_widget() {
	register_widget( 'milliomola_social_widget' );
}

add_action( 'widgets_init', 'milliomola_load_social_widget' );