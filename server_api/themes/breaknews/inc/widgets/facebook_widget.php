<?php 

class milliomola_facebook_widget extends WP_Widget {

	// Widget Setup
	function __construct() {
		parent::__construct(
			// widget ID
			'milliomola_facebook_widget',

			// widget name
			esc_html__( 'milliomola facebook widget', 'breaknews' ),

			// widget options
			array( 'description' => esc_html__( 'Display Facebook page with many options' , 'breaknews' ) ),

			// control options
			array( 'id_base' => 'milliomola_facebook_widget', 'width' => 250, 'height' => 350 )
		);
	}

	// widget frontend
	public function widget( $args, $instance ) {

		// widget settings variables
		$title    =   apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'] );
		$appid    = ! empty( $instance['appid'] ) ?  $instance['appid'] : '';
		$url      = ! empty( $instance['url'] ) ?  $instance['url'] : '';
		$timeline = ! empty( $instance['timeline'] ) ? '1' : '0';
		$events   = ! empty( $instance['events'] ) ? '1' : '0';
		$messages = ! empty( $instance['messages'] ) ? '1' : '0';
		$header   = ! empty( $instance['header'] ) ? 'true' : 'false';
		$cover    = ! empty( $instance['cover'] ) ? 'true' : 'false';
		$faces    = ! empty( $instance['faces'] ) ? 'true' : 'false';
		$height   = ! empty( $instance['height'] ) ? $instance['height'] : '400';

		$frame_height = $height + 16;

		$tabs = '';
		if( $timeline ) {
			$tabs .= 'timeline';
		}
		if( $messages == '1' ) {
			$tabs .= ',messages';
		}
		if( $events == '1' ) {
			$tabs .= ',events';
		}

	    wp_enqueue_script( 'widget_facebook_script', get_template_directory_uri() . '/js/widget_facebook_script.js', array('jquery') );
		wp_localize_script( 'widget_facebook_script', 'milliomola', array('app_id' => $appid ) );

		echo $args['before_widget'];

		if( !empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
			?>

			<div class="widget_facebook" style="height: <?php echo $frame_height.'px'; ?>">

			<div class="loader-cont">
				<div class="loader">
					<div class="cube1"></div>
					<div class="cube2"></div>
					<div class="cube4"></div>
					<div class="cube3"></div>
				</div>
			</div>

			<div class="facebook-timeline">
				<div id="fb-root"></div>
				<div 
					class="fb-page" 
					data-href= "<?php echo esc_url($url); ?>" 
					data-tabs="<?php echo $tabs; ?>" 
					data-width="500" 
					data-height="<?php echo esc_html($height); ?>" 
					data-small-header="<?php echo $header ?>" 
					data-adapt-container-width="true" 
					data-hide-cover="<?php echo $cover; ?>" 
					data-show-facepile="<?php echo $faces; ?>">
				</div>
			</div>

			</div>

			<?php
		}
		echo $args['after_widget'];
	}

	// widget backend
	public function form( $instance ) {

		// Default widget values
		$defaults = array(
			'title'	    => 'Facebook Page',
			'appid'		=> '',
			'url'		=> '',
			'timeline'	=> '1',
			'events'	=> '1',
			'messages'	=> '1',
			'header'	=> '1',
			'cover'		=> '1',
			'faces'		=> '1',
			'fitwidth'	=> '1',
			'height'	=> '350'
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );

		// widget settings variables
		$title    = $instance['title'];
		$appid    = $instance['appid'];
		$url      = $instance['url'];
		$timeline = $instance['timeline'];
		$events   = $instance['events'];
		$messages = $instance['messages'];
		$header   = $instance['header'];
		$cover    = $instance['cover'];
		$faces    = $instance['faces'];
		$height   = $instance['height'];

		// admin form
		?>
		<div class="mm-widget">

		<!-- Widget Title -->
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title :', 'breaknews'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>">
		</p>

		<!-- App ID -->
		<p>
			<label for="<?php echo $this->get_field_id('appid'); ?>"><?php esc_html_e('Facebook Application ID :', 'breaknews'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('appid'); ?>" name="<?php echo $this->get_field_name('appid'); ?>" value="<?php echo esc_attr($appid); ?>">
		</p>

		<!-- Page URL -->
		<p>
			<label for="<?php echo $this->get_field_id('url'); ?>"><?php esc_html_e('Page URL :', 'breaknews'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('url'); ?>" name="<?php echo $this->get_field_name('url'); ?>" value="<?php echo esc_attr($url); ?>">
		</p>

		<!-- Show Timeline Tab -->
		<p>
			<label for="<?php echo $this->get_field_id( 'timeline' ); ?>"><?php esc_html_e( 'Show Timeline Tab', 'breaknews' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'timeline' ); ?>" name="<?php echo $this->get_field_name( 'timeline' ); ?>" <?php checked( (bool) $timeline, true ); ?>>
		</p>

		<!-- Show Events Tab -->
		<p>
			<label for="<?php echo $this->get_field_id( 'events' ); ?>"><?php esc_html_e( 'Show Events Tab', 'breaknews' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'events' ); ?>" name="<?php echo $this->get_field_name( 'events' ); ?>" <?php checked( $events, '1' ); ?>>
		</p>

		<!-- Show Messages Tab -->
		<p>
			<label for="<?php echo $this->get_field_id( 'messages' ); ?>"><?php esc_html_e( 'Show Messages Tab', 'breaknews' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'messages' ); ?>" name="<?php echo $this->get_field_name( 'messages' ); ?>" <?php checked( $messages, '1' ); ?>>
		</p>

		<!-- Show Small Header -->
		<p>
			<label for="<?php echo $this->get_field_id( 'header' ); ?>"><?php esc_html_e( 'Show Small Header', 'breaknews' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'header' ); ?>" name="<?php echo $this->get_field_name( 'header' ); ?>" <?php checked( $header, '1' ); ?>>
		</p>

		<!-- Hide Page Cover -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cover' ); ?>"><?php esc_html_e( 'Hide Page Cover', 'breaknews' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'cover' ); ?>" name="<?php echo $this->get_field_name( 'cover' ); ?>" <?php checked( $cover, '1' ); ?>>
		</p>


		<!-- Show Friends Faces -->
		<p>
			<label for="<?php echo $this->get_field_id( 'faces' ); ?>"><?php esc_html_e( 'Show Friends Faces', 'breaknews' ); ?></label>
			<input type="checkbox" id="<?php echo $this->get_field_id( 'faces' ); ?>" name="<?php echo $this->get_field_name( 'faces' ); ?>" <?php checked( $faces, '1' ); ?>>
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

		$instance['title']    = sanitize_text_field( strip_tags( $new_instance['title'] ) );
		$instance['appid']    = sanitize_text_field( strip_tags( $new_instance['appid'] ) );
		$instance['url']      = sanitize_text_field( strip_tags( $new_instance['url'] ) );
		$instance['timeline'] = isset( $new_instance['timeline'] ) ? (bool) $new_instance['timeline'] : false;
		$instance['events']   = isset( $new_instance['events'] ) ? (bool) $new_instance['events'] : false;
		$instance['messages'] = isset( $new_instance['messages'] ) ? (bool) $new_instance['messages'] : false;
		$instance['header']   = isset( $new_instance['header'] ) ? (bool) $new_instance['header'] : false;
		$instance['cover']    = isset( $new_instance['cover'] ) ? (bool) $new_instance['cover'] : false;
		$instance['faces']    = isset( $new_instance['faces'] ) ? (bool) $new_instance['faces'] : false;
		$instance['height']   = sanitize_text_field( strip_tags( $new_instance['height'] ) );

		return $instance;
	}
}


function milliomola_load_facebook_widget() {
	register_widget( 'milliomola_facebook_widget' );
}

add_action( 'widgets_init', 'milliomola_load_facebook_widget' );