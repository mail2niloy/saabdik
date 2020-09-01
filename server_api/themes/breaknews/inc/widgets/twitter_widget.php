<?php 

class milliomola_twitter_widget extends WP_Widget {

	// Widget Setup
	function __construct() {
		parent::__construct(
			// widget ID
			'milliomola_twitter_widget',

			// widget name
			esc_html__( 'milliomola twitter widget', 'breaknews' ),

			// widget options
			array( 'description' => esc_html__( 'Display Facebook page with many options' , 'breaknews' ) ),

			// control options
			array( 'id_base' => 'milliomola_twitter_widget', 'width' => 250, 'height' => 350 )
		);
	}

	// widget frontend
	public function widget( $args, $instance ) {

		global $breaknews;

		// widget settings variables
		$title       =   apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'] );
		$username    = ! empty( $instance['username'] ) ?  $instance['username'] : '';
		$link_color  = ! empty( $instance['link_color'] ) ?  $instance['link_color'] : '';
		$height      = ! empty( $instance['height'] ) ? $instance['height'] : '400';
		$hide_header = ! empty( $instance['hide_header'] ) ? '1' : '0';
		$hide_footer = ! empty( $instance['hide_footer'] ) ? '1' : '0';
		$transparent = ! empty( $instance['transparent'] ) ? '1' : '0';

		$frame_height = $height + 16;

		$chrome = '';
		if( $hide_header ) {
			$chrome .= 'noheader';
		}
		if( $hide_footer == '1' ) {
			$chrome .= ' nofooter';
		}
		if( $transparent == '1' ) {
			$chrome .= ' transparent';
		}

		echo $args['before_widget'];

		if( !empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
			?>

			<div class="widget_twitter" style="height: <?php echo $frame_height.'px'; ?>">

			<div class="loader-cont">
				<div class="loader">
					<div class="cube1"></div>
					<div class="cube2"></div>
					<div class="cube4"></div>
					<div class="cube3"></div>
				</div>	
			</div>

			<a 
				class="twitter-timeline" 
				href="https://twitter.com/<?php echo $username; ?>" 
				data-width="300" 
				data-height="<?php echo $height; ?>" 
				data-link-color="<?php echo $link_color; ?>" 
				data-chrome="<?php echo $chrome; ?>"
				data-aria-polite="assertive">
			</a> 
			<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

			</div>

			<?php
		}
		echo $args['after_widget'];
	}

	// widget backend
	public function form( $instance ) {

		// Default widget values
		$defaults = array(
			'title'	    	=> 'Twitter Timeline',
			'username'		=> 'milliomola',
			'link_color'	=> '#36a3e5',
			'hide_header'	=> '0',
			'hide_footer'	=> '1',
			'transparent'	=> '0',
			'height'	    => '400'
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		// widget settings variables
		$title       = $instance['title'];
		$username    = $instance['username'];
		$link_color  = $instance['link_color'];
		$hide_header = $instance['hide_header'];
		$hide_footer = $instance['hide_footer'];
		$transparent = $instance['transparent'];
		$height      = $instance['height'];

		// admin form
		?>
		<div class="mm-widget">

		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title :', 'breaknews'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
		</p>

		<!-- Username -->
		<p>
			<label for="<?php echo $this->get_field_id('username'); ?>"><?php esc_html_e('Username :', 'breaknews'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('username'); ?>" name="<?php echo $this->get_field_name('username'); ?>" value="<?php echo esc_attr($username); ?>">
		</p>

		<!-- Link Color -->
		<p>
			<label for="<?php echo $this->get_field_id('link_color'); ?>"><?php esc_html_e('Link Color :', 'breaknews'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('link_color'); ?>" name="<?php echo $this->get_field_name('link_color'); ?>" value="<?php echo esc_attr($link_color); ?>">
		</p>

		<!-- Hide Header -->
		<p>
			<label for="<?php echo $this->get_field_id( 'hide_header' ); ?>"><?php esc_html_e( 'Hide Header', 'breaknews' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'hide_header' ); ?>" name="<?php echo $this->get_field_name( 'hide_header' ); ?>" <?php checked( (bool) $hide_header, true ); ?>>
		</p>

		<!-- Hide Footer -->
		<p>
			<label for="<?php echo $this->get_field_id( 'hide_footer' ); ?>"><?php esc_html_e( 'Hide Footer', 'breaknews' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'hide_footer' ); ?>" name="<?php echo $this->get_field_name( 'hide_footer' ); ?>" <?php checked( $hide_footer, '1' ); ?>>
		</p>

		<!-- Make Transparent -->
		<p>
			<label for="<?php echo $this->get_field_id( 'transparent' ); ?>"><?php esc_html_e( 'Make Transparent', 'breaknews' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'transparent' ); ?>" name="<?php echo $this->get_field_name( 'transparent' ); ?>" <?php checked( $transparent, '1' ); ?>>
		</p>

		<!-- Height -->
		<p>
			<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php esc_html_e( 'Height', 'breaknews' ); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo esc_html($height); ?>">
		</p>

		</div>
		<?php
	}

	// update widget information
	function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']       = sanitize_text_field( strip_tags( $new_instance['title'] ) );
		$instance['username']    = sanitize_text_field( strip_tags( $new_instance['username'] ) );
		$instance['link_color']  = sanitize_text_field( strip_tags( $new_instance['link_color'] ) );
		$instance['hide_header'] = isset( $new_instance['hide_header'] ) ? (bool) $new_instance['hide_header'] : false;
		$instance['hide_footer'] = isset( $new_instance['hide_footer'] ) ? (bool) $new_instance['hide_footer'] : false;
		$instance['transparent'] = isset( $new_instance['transparent'] ) ? (bool) $new_instance['transparent'] : false;
		$instance['height']      = sanitize_text_field( strip_tags( $new_instance['height'] ) );

		return $instance;
	}
}


function milliomola_load_twitter_widget() {
	register_widget( 'milliomola_twitter_widget' );
}

add_action( 'widgets_init', 'milliomola_load_twitter_widget' );